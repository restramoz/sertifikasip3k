<?php

namespace Tests\Unit;

use App\Services\OllamaService;
use Tests\TestCase;

class OllamaServiceTest extends TestCase
{
    /**
     * Test OllamaService returns clear error when config is missing without sending HTTP request.
     */
    public function test_missing_config_returns_clean_error(): void
    {
        config(['services.ollama.base_url' => '']);
        config(['services.ollama.model' => '']);

        $service = new OllamaService;
        $result = $service->generateArticle(['city_name' => 'Surabaya']);

        $this->assertFalse($result['success']);
        $this->assertStringContainsString('OLLAMA_BASE_URL', $result['error']);
    }

    /**
     * Test pickTopicForRegion selects a core Pelatihan P3K service topic.
     */
    public function test_pick_topic_for_region_chooses_p3k_core_topic(): void
    {
        $service = new OllamaService;
        $selected = $service->pickTopicForRegion('Kota Bandung');

        $this->assertNotEmpty($selected['topic']);
        $this->assertNotEmpty($selected['focus']);
        $this->assertStringContainsString('Kota Bandung', $selected['topic']);
        $this->assertStringContainsString('P3K', $selected['topic']);
    }

    /**
     * Test resolveWordCount correctly returns the integer word count.
     */
    public function test_resolve_word_count(): void
    {
        $service = new OllamaService;

        $this->assertEquals(500, $service->resolveWordCount(500));
        $this->assertEquals(1000, $service->resolveWordCount(1000));
        $this->assertEquals(1500, $service->resolveWordCount(1500));
        $this->assertEquals(300, $service->resolveWordCount(300));
        $this->assertEquals(3000, $service->resolveWordCount(3000));
    }

    /**
     * Test parsing clean JSON response and isolating image_brief.
     */
    public function test_parse_response_with_valid_json(): void
    {
        $service = new OllamaService;
        $json = json_encode([
            'title' => 'Panduan CPR Tempat Kerja di Semarang',
            'slug' => 'panduan-cpr-semarang',
            'excerpt' => 'Teknik kompresi dada dan resusitasi darurat medis.',
            'content' => '<h2>Resusitasi Jantung Paru</h2><p>Langkah kompresi dada 100-120 bpm.</p>',
            'seo_title' => 'Panduan CPR Semarang | Pelatihan P3K',
            'meta_description' => 'Pelatihan CPR in-house di Semarang.',
            'suggested_faqs' => [
                ['q' => 'Berapa rasio kompresi CPR?', 'a' => '30 kompresi berbanding 2 napas buatan.'],
            ],
            'image_brief' => [
                'concept' => 'Foto dokumenter simulasi CPR di pabrik Semarang.',
                'english_prompt' => 'Realistic photo of CPR training on mannequin in Semarang industrial warehouse, natural lighting, no text, 8k',
                'aspect_ratio' => '16:9',
                'recommended_alt' => 'Pelatihan CPR Tempat Kerja di Semarang',
            ],
        ]);

        $result = $service->parseResponse($json, 'Fallback Topic', 'Semarang', 1000);

        $this->assertTrue($result['success']);
        $this->assertEquals('Panduan CPR Tempat Kerja di Semarang', $result['title']);
        $this->assertEquals('panduan-cpr-semarang', $result['slug']);
        $this->assertArrayHasKey('image_brief', $result);
        $this->assertEquals('16:9', $result['image_brief']['aspect_ratio']);
        $this->assertStringContainsString('Semarang', $result['image_brief']['english_prompt']);
        $this->assertCount(1, $result['suggested_faqs']);
    }

    /**
     * Test parsing markdown code fenced JSON.
     */
    public function test_parse_response_with_fenced_markdown(): void
    {
        $service = new OllamaService;
        $fenced = "```json\n".json_encode([
            'title' => 'Manajemen Kotak P3K di Medan',
            'content' => '<p>Daftar obat wajib kotak P3K tipe A, B, C.</p>',
            'image_brief' => [
                'concept' => 'Inspeksi kotak P3K',
                'english_prompt' => 'HSE manager inspecting standard first aid kit box in corporate office, realistic, 8k, no text',
            ],
        ])."\n```";

        $result = $service->parseResponse($fenced, 'Fallback Topic', 'Medan', 1000);

        $this->assertTrue($result['success']);
        $this->assertEquals('Manajemen Kotak P3K di Medan', $result['title']);
        $this->assertEquals('16:9', $result['image_brief']['aspect_ratio']);
    }
}
