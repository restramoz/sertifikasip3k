<?php

namespace App\Http\Controllers;

use App\Services\RegionalService;
use Illuminate\View\View;

class CityPageController extends Controller
{
    public function show(string $citySlug, RegionalService $regionalService): View
    {
        $city = $regionalService->findCity($citySlug);

        if (! $city) {
            abort(404, 'Wilayah kota/kabupaten tidak ditemukan');
        }

        $otherCitiesInIsland = $regionalService->getIslandCities($city['island'], $city['code'], 12);
        $otherCitiesInProvince = $regionalService->getProvinceCities($city['province'], $city['code'], 8);

        $faqItems = [
            [
                'q' => "Apakah pelatihan P3K dapat diselenggarakan langsung di perusahaan kami di {$city['name']}?",
                'a' => "Ya. Kami menyediakan program In-House Training P3K yang diselenggarakan langsung di lokasi pabrik, kantor, proyek, atau fasilitas operasional perusahaan Anda di {$city['name']} dan sekitarnya.",
            ],
            [
                'q' => "Berapa jumlah peserta ideal untuk sesi pelatihan P3K di {$city['name']}?",
                'a' => 'Untuk memastikan efektivitas praktik penanganan medis darurat, simulasi CPR, dan pembalutan luka, rasio ideal per kelas biasanya berkisar antara 15 hingga 25 peserta per sesi pelatihan.',
            ],
            [
                'q' => "Apakah materi pelatihan P3K dapat disesuaikan dengan profil risiko kerja di {$city['name']}?",
                'a' => 'Tentu. Modul pelatihan dapat disesuaikan berdasarkan identifikasi potensi bahaya spesifik di sektor industri Anda, seperti risiko kimia, kelistrikan, ruang terbatas (confined space), atau lingkungan manufaktur.',
            ],
            [
                'q' => "Bagaimana alur pendaftaran dan pengajuan pelatihan P3K di {$city['name']}?",
                'a' => 'Proses diawali dengan konsultasi kebutuhan dan estimasi jumlah tim, penentuan materi serta jadwal yang disepakati, penyiapan logistik simulasi, dan pelaksanaan pelatihan praktik di lokasi yang disepakati.',
            ],
        ];

        $mapsEmbedUrl = $regionalService->getGoogleMapsEmbedUrl($city['name']);

        return view('city-page', compact(
            'city',
            'otherCitiesInIsland',
            'otherCitiesInProvince',
            'faqItems',
            'mapsEmbedUrl'
        ));
    }
}
