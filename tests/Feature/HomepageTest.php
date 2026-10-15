<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomepageTest extends TestCase
{
    /**
     * Test the homepage loads successfully and contains all core sections.
     */
    public function test_homepage_returns_success_and_contains_content(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Pelatihan P3K untuk Tim');
        $response->assertSee('Konsultasi Kebutuhan Pelatihan');
        $response->assertSee('Manfaat Nyata Pelatihan P3K');
        $response->assertSee('Materi Inti Pelatihan P3K');
        $response->assertSee('Bantuan Hidup Dasar (BHD / CPR)');
        $response->assertSee('Target Peserta', false);
        $response->assertSee('4 Langkah Pelaksanaan Pelatihan P3K');
        $response->assertSee('Cakupan Wilayah', false);
        $response->assertSee('Pertanyaan yang Sering Diajukan');
    }
}
