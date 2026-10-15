<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class OllamaService
{
    protected ?string $apiKey;

    protected ?string $baseUrl;

    protected ?string $model;

    protected int $timeout;

    /**
     * Standard Pelatihan P3K core topics.
     *
     * @var array<int, array{name: string, focus: string}>
     */
    public const CORE_TOPICS = [
        [
            'name' => 'Pembinaan & Sertifikasi Petugas P3K Tempat Kerja',
            'focus' => 'Kepatuhan regulasi keselamatan kerja Kemnaker, rasio petugas P3K, dan lisensi resmi',
        ],
        [
            'name' => 'Bantuan Hidup Dasar (BHD) & Resusitasi Jantung Paru (CPR) Perusahaan',
            'focus' => 'Teknik kompresi dada manekin, AED, dan penanganan henti napas darurat',
        ],
        [
            'name' => 'Penanganan Medis Darurat Cedera Industri, Pembalutan & Pembidaian',
            'focus' => 'Penghentian perdarahan masif, mitela, fiksasi patah tulang, dan dislokasi',
        ],
        [
            'name' => 'Pertolongan Pertama Luka Bakar, Sengatan Listrik & Paparan Zat Kimia',
            'focus' => 'Klasifikasi luka bakar, dekontaminasi bahan berbahaya, dan sengatan tegangan listrik',
        ],
        [
            'name' => 'Standarisasi, Audit Kelayakan & Manajemen Kotak P3K Tempat Kerja',
            'focus' => 'Penyediaan kotak P3K Tipe A/B/C, daftar obat wajib, dan pencatatan log insiden',
        ],
        [
            'name' => 'Evakuasi Medis Cepat & Stabilisasi Korban Cedera Lapangan',
            'focus' => 'Pemindahan korban aman, tandu darurat, imobilisasi leher dan tulang belakang',
        ],
    ];

    public function __construct()
    {
        $this->apiKey = config('services.ollama.key');
        $this->baseUrl = config('services.ollama.base_url');
        $this->model = config('services.ollama.model');
        $this->timeout = (int) config('services.ollama.timeout', 120);
    }

    /**
     * Resolve chat endpoint URL safely.
     */
    public function getChatEndpoint(): string
    {
        $base = rtrim((string) $this->baseUrl, '/');

        if (str_ends_with($base, '/api/chat')) {
            return $base;
        }

        return "{$base}/api/chat";
    }

    /**
     * Select a relevant topic automatically based on region and existing articles.
     *
     * @return array{topic: string, focus: string}
     */
    public function pickTopicForRegion(string $cityName, ?string $citySlug = null): array
    {
        $existingTitles = [];
        if ($citySlug) {
            $existingTitles = Article::where('target_city_slug', $citySlug)
                ->pluck('title')
                ->toArray();
        }

        // Find first unused core topic
        foreach (self::CORE_TOPICS as $core) {
            $isUsed = false;
            foreach ($existingTitles as $title) {
                if (stripos($title, $core['name']) !== false) {
                    $isUsed = true;
                    break;
                }
            }

            if (! $isUsed) {
                return [
                    'topic' => "Panduan {$core['name']} di {$cityName}",
                    'focus' => $core['focus'],
                ];
            }
        }

        // If all core topics are covered, return an advanced operational angle
        $count = count($existingTitles) + 1;

        return [
            'topic' => "Manajemen Kesiapsiagaan Tanggap Darurat P3K Lanjutan di {$cityName} (Bagian {$count})",
            'focus' => 'Audit simulasi tanggap darurat komprehensif, sertifikasi berkala, dan mitigasi risiko fasilitas industri',
        ];
    }

    /**
     * Resolve word count from direct input (already validated as integer 300-3000).
     */
    public function resolveWordCount(int $wordCount): int
    {
        return $wordCount;
    }

    /**
     * Generate an article draft via Ollama.
     *
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     */
    public function generateArticle(array $params): array
    {
        // 1. Verifikasi kelengkapan konfigurasi tanpa memanggil API
        if (empty($this->baseUrl)) {
            return [
                'success' => false,
                'error' => 'Konfigurasi OLLAMA_BASE_URL belum diatur di file .env.',
            ];
        }

        if (empty($this->model)) {
            return [
                'success' => false,
                'error' => 'Konfigurasi OLLAMA_MODEL belum diatur di file .env.',
            ];
        }

        $cityName = trim((string) ($params['city_name'] ?? 'Indonesia'));
        $districtName = ! empty($params['district_name']) ? trim((string) $params['district_name']) : null;
        $citySlug = $params['city_slug'] ?? null;
        $wordCount = $this->resolveWordCount($params['word_count'] ?? 1000);

        // Auto topic selection if not manually provided
        if (empty($params['topic'])) {
            $selected = $this->pickTopicForRegion($cityName, $citySlug);
            $topic = $selected['topic'];
            $focus = $selected['focus'];
        } else {
            $topic = trim((string) $params['topic']);
            $focus = $params['focus'] ?? 'Pembinaan P3K tempat kerja dan penanganan darurat medis';
        }

        $locationContext = $districtName ? "Kecamatan {$districtName}, {$cityName}" : $cityName;

        $systemPrompt = <<<PROMPT
Anda adalah Lead Specialist Keselamatan & Kesehatan Kerja (K3) dan Instruktur Senior Pertolongan Pertama Pada Kecelakaan (P3K) di Indonesia.
Tugas Anda adalah menulis artikel edukatif dan otoritatif berstandar industri B2B dalam Bahasa Indonesia formal mengenai Pelatihan P3K Tempat Kerja.

ATURAN KUALITAS & GAYA PENULISAN:
1. Nada bahasa: Profesional, lugas, mengalir alami, berbobot untuk pengambil keputusan (HSE Manager, HRD, Direktur Operasional).
2. Dilarang menggunakan filler AI klise seperti "Di era modern saat ini", "Tak dapat dipungkiri", atau kalimat berulang.
3. Rujuk regulasi nyata Indonesia: UU No. 1 Tahun 1970 tentang Keselamatan Kerja, Peraturan Menteri Tenaga Kerja dan Transmigrasi No. PER.15/MEN/VIII/2008 tentang Pertolongan Pertama Pada Kecelakaan di Tempat Kerja, dan pedoman tanggap darurat medis standar Kemnaker RI.
4. Gunakan tag HTML semantik: <h2>, <h3>, <p>, <ul>, <ol>, <li>, <strong>, <blockquote>, <table><thead><tr><th>...</th></tr></thead><tbody><tr><td>...</td></tr></tbody></table>.
5. Panjang target: Sekitar {$wordCount} kata.
6. Buat image_brief terpisah yang siap digunakan oleh desainer di Google Flow untuk menghasilkan gambar fotografi realistis beresolusi tinggi TANPA teks di gambar.

OUTPUT WAJIB:
Kembalikan HANYA dokumen JSON murni tanpa pembungkus markdown ```json ```.
Format skema JSON yang wajib dipatuhi:
{
  "title": "Judul Artikel Informatif dan Otoritatif",
  "slug": "slug-url-ramah-seo",
  "excerpt": "Ringkasan eksekutif 2-3 kalimat mengenai intisari artikel.",
  "content": "<p>Isi artikel lengkap dalam HTML semantik...</p>",
  "seo_title": "SEO Title Max 60 Karakter | Pelatihan P3K",
  "meta_description": "Meta description persuasif max 155 karakter.",
  "suggested_faqs": [
    {"q": "Pertanyaan 1...", "a": "Jawaban ringkas 1..."},
    {"q": "Pertanyaan 2...", "a": "Jawaban ringkas 2..."}
  ],
  "image_brief": {
    "concept": "Konsep visual foto dalam Bahasa Indonesia",
    "english_prompt": "Detailed descriptive photo prompt in English for Google Flow: realistic photography, workplace setting, emergency simulation, natural lighting, high detail, no text overlays, 8k",
    "aspect_ratio": "16:9",
    "recommended_alt": "Alt text ramah SEO dalam Bahasa Indonesia"
  }
}
PROMPT;

        $userPrompt = <<<PROMPT
Silakan buat artikel P3K lengkap dengan rincian berikut:
- Topik Artikel: {$topic}
- Fokus Materi: {$focus}
- Lokasi Target: {$locationContext}
- Target Jumlah Kata: ~{$wordCount} kata (perkiraan, tidak jaminan pasti)

Keluarkan HANYA JSON valid.
PROMPT;

        try {
            $endpoint = $this->getChatEndpoint();

            $client = Http::timeout($this->timeout);

            // Jika API key tersedia, gunakan Bearer token (Ollama Cloud / remote proxy)
            if (! empty($this->apiKey)) {
                $client = $client->withToken($this->apiKey);
            }

            $response = $client->post($endpoint, [
                'model' => $this->model,
                'messages' => [
                    ['role' => 'system', 'content' => $systemPrompt],
                    ['role' => 'user', 'content' => $userPrompt],
                ],
                'stream' => false,
            ]);

            if (! $response->successful()) {
                // Log safe error without printing API key
                Log::error('Ollama API error response', [
                    'status' => $response->status(),
                    'endpoint' => $endpoint,
                    'model' => $this->model,
                ]);

                return [
                    'success' => false,
                    'error' => "Ollama merespons dengan status HTTP {$response->status()}: ".Str::limit($response->body(), 200),
                ];
            }

            $data = $response->json();
            $rawContent = $data['message']['content'] ?? '';

            if (empty(trim($rawContent))) {
                return [
                    'success' => false,
                    'error' => 'Ollama mengembalikan respons konten kosong.',
                ];
            }

            $result = $this->parseResponse($rawContent, $topic, $cityName, $wordCount);
            $result = $this->addPhoneNumbers($result);

            return $result;
        } catch (ConnectionException $e) {
            Log::error('Ollama connection timeout or unreachable: '.$e->getMessage());

            return [
                'success' => false,
                'error' => 'Koneksi ke Ollama gagal atau timeout setelah '.$this->timeout.' detik. Pastikan layanan Ollama aktif dan endpoint dapat dijangkau.',
            ];
        } catch (\Throwable $e) {
            Log::error('OllamaService Exception: '.$e->getMessage());

            return [
                'success' => false,
                'error' => 'Terjadi kesalahan saat memproses permintaan artikel: '.$e->getMessage(),
            ];
        }
    }

    /**
     * Robust JSON parsing and fallback structure.
     *
     * @return array<string, mixed>
     */
    public function parseResponse(string $rawContent, string $fallbackTopic, string $cityName, int $wordCount): array
    {
        $cleaned = trim($rawContent);

        // Strip markdown code fences if present
        if (preg_match('/^```(?:json)?\s*(.*?)\s*```$/s', $cleaned, $matches)) {
            $cleaned = trim($matches[1]);
        } elseif (str_starts_with($cleaned, '```json')) {
            $cleaned = trim(substr($cleaned, 7));
            if (str_ends_with($cleaned, '```')) {
                $cleaned = trim(substr($cleaned, 0, -3));
            }
        } elseif (str_starts_with($cleaned, '```')) {
            $cleaned = trim(substr($cleaned, 3));
            if (str_ends_with($cleaned, '```')) {
                $cleaned = trim(substr($cleaned, 0, -3));
            }
        }

        $decoded = json_decode($cleaned, true);

        // If direct parse failed, attempt to extract JSON object with regex
        if (! is_array($decoded)) {
            if (preg_match('/\{[\s\S]*\}/', $cleaned, $extracted)) {
                $decoded = json_decode($extracted[0], true);
            }
        }

        if (is_array($decoded) && ! empty($decoded['title'])) {
            // Ensure structured image_brief is properly isolated
            $imageBrief = $decoded['image_brief'] ?? [];
            if (! is_array($imageBrief)) {
                $imageBrief = [];
            }

            $concept = $imageBrief['concept'] ?? "Sesi simulasi praktik pelatihan P3K di {$cityName}";
            $englishPrompt = $imageBrief['english_prompt'] ?? 'Professional corporate photograph of first aid training session in an industrial facility in Indonesia, certified trainer guiding participants practicing CPR on mannequin, realistic lighting, high resolution, no text overlay';
            $aspectRatio = $imageBrief['aspect_ratio'] ?? '16:9';
            $recommendedAlt = $imageBrief['recommended_alt'] ?? "Pelatihan P3K Tempat Kerja di {$cityName}";

            return [
                'success' => true,
                'title' => (string) $decoded['title'],
                'slug' => ! empty($decoded['slug']) ? Str::slug($decoded['slug']) : Str::slug($decoded['title']),
                'excerpt' => (string) ($decoded['excerpt'] ?? Str::limit(strip_tags($decoded['content'] ?? ''), 180)),
                'content' => (string) ($decoded['content'] ?? ''),
                'seo_title' => (string) ($decoded['seo_title'] ?? Str::limit($decoded['title'].' | Pelatihan P3K', 60)),
                'meta_description' => (string) ($decoded['meta_description'] ?? Str::limit($decoded['excerpt'] ?? '', 155)),
                'suggested_faqs' => is_array($decoded['suggested_faqs'] ?? null) ? $decoded['suggested_faqs'] : [],
                'image_brief' => [
                    'concept' => $concept,
                    'english_prompt' => $englishPrompt,
                    'aspect_ratio' => $aspectRatio,
                    'recommended_alt' => $recommendedAlt,
                ],
            ];
        }

        // Fallback if model responded with conversational text instead of JSON
        $slug = Str::slug($fallbackTopic);
        $excerpt = Str::limit(strip_tags($rawContent), 180);

        return [
            'success' => true,
            'title' => $fallbackTopic,
            'slug' => $slug,
            'excerpt' => $excerpt,
            'content' => nl2br(e($rawContent)),
            'seo_title' => Str::limit("{$fallbackTopic} | Pelatihan P3K", 60),
            'meta_description' => Str::limit("Panduan {$fallbackTopic} untuk kesiapsiagaan darurat medis dan kepatuhan K3 di {$cityName}.", 155),
            'suggested_faqs' => [],
            'image_brief' => [
                'concept' => "Pelatihan pertolongan pertama pada kecelakaan di {$cityName}",
                'english_prompt' => 'High quality corporate documentary photography of occupational first aid training in Indonesia, certified instructor, emergency response simulation, authentic warehouse setting, realistic lighting, 8k, no text',
                'aspect_ratio' => '16:9',
                'recommended_alt' => "Pelatihan P3K Tempat Kerja - {$fallbackTopic}",
            ],
            'raw' => $rawContent,
        ];
    }

    /**
     * Insert phone numbers into article content at top, middle, and bottom.
     *
     * @param  array<string, mixed>  $result
     * @return array<string, mixed>
     */
    protected function addPhoneNumbers(array $result): array
    {
        $phones = ['08118500177', '081399810272', '087894580806', '087894580649'];
        $times = random_int(3, 7);
        // Sanitize content to remove unwanted LaTeX arrows or stray $ symbols.
        $content = $this->sanitizeContent($result['content'] ?? '');
        $fragments = [];
        for ($i = 0; $i < $times; $i++) {
            $phone = $phones[array_rand($phones)];
            // WhatsApp CTA link with optional pre-filled message.
            $waLink = 'https://wa.me/'.$phone.'?text='.urlencode('Halo, saya ingin bertanya mengenai layanan P3K.');
            $fragments[] = '<p class="contact-number"><a href="'.$waLink.'" target="_blank" class="whatsapp-cta">'.$phone.'</a></p>';
        }
        // Top, middle, bottom placements
        $top = $fragments[0] ?? '';
        $bottom = $fragments[1] ?? '';
        $middle = $fragments[2] ?? '';
        $newContent = $top.$content.$bottom;
        $midPos = (int) floor(strlen($newContent) / 2);
        $newContent = substr_replace($newContent, $middle, $midPos, 0);
        if (count($fragments) > 3) {
            $extra = implode('', array_slice($fragments, 3));
            $newContent .= $extra;
        }
        $result['content'] = $newContent;

        return $result;
    }

    protected function sanitizeContent(string $content): string
    {
        // Replace LaTeX arrow patterns like "$ \\rightarrow$" or "$ ightarrow$" with a proper arrow.
        $patterns = [
            '/\$\s*\\\\?rightarrow\s*\$/i',
            '/\$\s*ightarrow\s*\$/i',
        ];
        foreach ($patterns as $pattern) {
            $content = preg_replace($pattern, '→', $content);
        }

        // Remove any remaining stray dollar signs.
        $content = str_replace('$', '', $content);

        return $content;
    }
}
