<?php

namespace App\Http\Controllers;

use App\Services\RegionalService;
use Illuminate\View\View;

class DistrictPageController extends Controller
{
    public function show(string $districtSlug, RegionalService $regionalService): View
    {
        $district = $regionalService->findDistrict($districtSlug);

        if (! $district) {
            abort(404, 'Kecamatan tidak ditemukan');
        }

        return $this->renderView($district);
    }

    public function showNested(string $citySlug, string $districtSlug, RegionalService $regionalService): View
    {
        $district = $regionalService->findDistrict($districtSlug, $citySlug);

        if (! $district) {
            abort(404, 'Kecamatan tidak ditemukan di wilayah yang ditentukan');
        }

        return $this->renderView($district);
    }

    private function renderView(array $district): View
    {
        $cityName = $district['city_name'];
        $distName = $district['name'];

        $faqItems = [
            [
                'q' => "Apakah tim instruktur dapat datang langsung ke fasilitas di Kecamatan {$distName}?",
                'a' => "Ya. Kami menyediakan layanan In-House Training P3K di mana instruktur dan perlengkapan simulasi darurat akan hadir langsung di fasilitas, pabrik, atau kantor perusahaan Anda di wilayah Kecamatan {$distName}, {$cityName}.",
            ],
            [
                'q' => "Apakah ada syarat fasilitas ruangan untuk pelatihan P3K di Kecamatan {$distName}?",
                'a' => 'Perusahaan cukup menyediakan ruangan pertemuan atau aula yang memadai untuk simulasi praktik Bantuan Hidup Dasar (CPR) dan balut bidai, serta proyektor untuk penyampaian materi visual.',
            ],
            [
                'q' => "Bagaimana cara mengajukan jadwal pelatihan untuk tim di Kecamatan {$distName}?",
                'a' => 'Silakan gunakan formulir konsultasi kebutuhan di bagian bawah halaman ini untuk menyampaikan perkiraan jumlah staf dan topik prioritas. Tim kami akan segera menindaklanjuti rencana jadwal dan teknis pelaksanaan.',
            ],
        ];

        $mapsEmbedUrl = (new RegionalService)->getGoogleMapsEmbedUrl("Kecamatan {$distName}, {$cityName}");

        return view('district-page', compact('district', 'faqItems', 'mapsEmbedUrl'));
    }
}
