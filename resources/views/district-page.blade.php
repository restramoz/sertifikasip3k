@extends('layouts.app')

@php
    $distName = $district['name'];
    $cityName = $district['city_name'];
    $citySlug = $district['city_slug'];
    $province = $district['province'];
    $island = $district['island'];
    $seoTitle = "Pelatihan P3K di Kecamatan {$distName}, {$cityName} - Pembinaan Darurat Medis K3";
    $metaDesc = "Layanan in-house pelatihan P3K tempat kerja untuk perusahaan di Kecamatan {$distName}, {$cityName}. Pembinaan CPR, balut bidai, manajemen darurat medis sesuai standar K3.";
@endphp

@section('title', $seoTitle)
@section('meta_description', $metaDesc)

@push('schema')
{{-- Structured BreadcrumbList Schema --}}
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@@type": "ListItem",
      "position": 1,
      "name": "Beranda",
      "item": "{{ route('home') }}"
    },
    {
      "@@type": "ListItem",
      "position": 2,
      "name": "{{ $cityName }}",
      "item": "{{ route('city.landing', ['citySlug' => $citySlug]) }}"
    },
    {
      "@@type": "ListItem",
      "position": 3,
      "name": "Kecamatan {{ $distName }}",
      "item": "{{ url()->current() }}"
    }
  ]
}
</script>

{{-- FAQ Schema --}}
@if(!empty($faqItems))
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "FAQPage",
  "mainEntity": [
    @foreach($faqItems as $i => $faq)
    {
      "@@type": "Question",
      "name": {{ json_encode($faq['q']) }},
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": {{ json_encode($faq['a']) }}
      }
    }{{ !$loop->last ? ',' : '' }}
    @endforeach
  ]
}
</script>
@endif
@endpush

@section('content')

    <!-- Breadcrumbs: Homepage -> Parent City -> District -->
    <nav class="bg-[var(--color-surface)] border-b border-[var(--color-border)] py-3 text-xs font-sans text-[var(--color-text-muted)]" aria-label="Breadcrumb">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-wrap items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-[var(--color-primary)] transition-colors">Beranda</a>
            <span class="text-[var(--color-border)]">/</span>
            <a href="{{ route('city.landing', ['citySlug' => $citySlug]) }}" class="hover:text-[var(--color-primary)] transition-colors">{{ $cityName }}</a>
            <span class="text-[var(--color-border)]">/</span>
            <span class="text-[var(--color-secondary)] font-semibold">Kecamatan {{ $distName }}</span>
        </div>
    </nav>

    <!-- Hero Section for District -->
    <section class="py-12 sm:py-16 bg-gradient-to-b from-[var(--color-surface)] to-[var(--color-background)] border-b border-[var(--color-border)]" aria-labelledby="district-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                <div class="lg:col-span-8 space-y-5">
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="px-2.5 py-1 rounded-full text-xs font-heading font-semibold bg-[var(--color-primary-soft)] text-[var(--color-primary)] border border-[#C2E4D8]">
                            KECAMATAN {{ strtoupper($distName) }}
                        </span>
                        <a href="{{ route('city.landing', ['citySlug' => $citySlug]) }}" class="px-2.5 py-1 rounded-full text-xs font-heading font-semibold bg-[var(--color-secondary-soft)] text-[var(--color-secondary)] hover:border-[var(--color-primary)] border border-[var(--color-border)] transition-colors">
                            {{ strtoupper($cityName) }} &rarr;
                        </a>
                        <span class="px-2.5 py-1 rounded-full text-xs font-heading font-semibold bg-[var(--color-surface-muted)] text-[var(--color-text-muted)]">
                            {{ strtoupper($province) }}
                        </span>
                    </div>

                    <h1 id="district-heading" class="font-heading font-bold text-3xl sm:text-4xl lg:text-5xl text-[var(--color-secondary)] leading-tight">
                        Pelatihan P3K di Kecamatan {{ $distName }}, {{ $cityName }}
                    </h1>

                    <p class="text-base sm:text-lg text-[var(--color-text-muted)] leading-relaxed max-w-3xl">
                        Layanan pembinaan keselamatan kerja dan pelatihan pertolongan pertama (P3K) in-house untuk pabrik, kantor operasional, dan tempat kerja di kawasan <strong class="text-[var(--color-secondary)]">Kecamatan {{ $distName }}</strong> dan jejaring wilayah <strong class="text-[var(--color-secondary)]">{{ $cityName }}</strong>.
                    </p>

                    <div class="flex flex-wrap items-center gap-4 pt-2">
                        <a href="#inquiry-kecamatan" class="btn-primary text-sm py-3 px-6 shadow-sm">
                            Konsultasi In-House di {{ $distName }}
                        </a>
                        <a href="{{ route('city.landing', ['citySlug' => $citySlug]) }}" class="btn-secondary text-sm py-3 px-6">
                            Lihat Profil Induk {{ $cityName }}
                        </a>
                    </div>
                </div>

                <!-- Hierarchy & Dispatch Card -->
                <div class="lg:col-span-4">
                    <div class="card-premium p-6 bg-white space-y-4 border border-[var(--color-border)] shadow-sm">
                        <div class="border-b border-[var(--color-border)] pb-3 flex items-center justify-between">
                            <span class="font-heading font-bold text-xs uppercase text-[var(--color-secondary)] tracking-wider">
                                KONTEKS WILAYAH &amp; ALUR
                            </span>
                            <span class="flex items-center gap-1.5 text-xs font-medium text-[var(--color-primary)]">
                                <span class="w-2 h-2 rounded-full bg-[var(--color-primary)]"></span>
                                In-House Aktif
                            </span>
                        </div>

                        <div class="space-y-2.5 text-xs">
                            <div class="flex justify-between py-1 border-b border-[var(--color-surface-muted)]">
                                <span class="text-[var(--color-text-muted)]">Kecamatan:</span>
                                <span class="font-heading font-semibold text-[var(--color-secondary)] text-right">{{ $distName }}</span>
                            </div>
                            <div class="flex justify-between py-1 border-b border-[var(--color-surface-muted)]">
                                <span class="text-[var(--color-text-muted)]">Induk Kota/Kab:</span>
                                <span class="font-heading font-semibold text-[var(--color-secondary)] text-right">
                                    <a href="{{ route('city.landing', ['citySlug' => $citySlug]) }}" class="text-[var(--color-primary)] hover:underline">
                                        {{ $cityName }}
                                    </a>
                                </span>
                            </div>
                            <div class="flex justify-between py-1 border-b border-[var(--color-surface-muted)]">
                                <span class="text-[var(--color-text-muted)]">Provinsi:</span>
                                <span class="text-[var(--color-secondary)] text-right">{{ $province }}</span>
                            </div>
                            <div class="flex justify-between py-1">
                                <span class="text-[var(--color-text-muted)]">Penyelenggaraan:</span>
                                <span class="font-semibold text-[var(--color-secondary)] text-right">Tim Instruktur Mobilisasi ke Lokasi</span>
                            </div>
                        </div>

                        <div class="p-3 bg-[var(--color-surface-muted)] rounded-[10px] text-[11px] text-[var(--color-text-muted)] leading-relaxed">
                            Pelatihan berlangsung langsung di tempat kerja perusahaan Anda di Kecamatan {{ $distName }}. Instruktur membawa seluruh peraga manekin CPR dan perlengkapan simulasi.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fokus Kompetensi P3K Lapangan -->
    <section class="py-14 bg-[var(--color-surface)] border-b border-[var(--color-border)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8 max-w-2xl">
                <span class="text-xs font-heading font-bold uppercase tracking-wider text-[var(--color-primary)] block mb-1">KOMPETENSI PRAKTIK</span>
                <h2 class="font-heading font-bold text-2xl sm:text-3xl text-[var(--color-secondary)]">
                    Keterampilan P3K yang Dikuasai Peserta
                </h2>
                <p class="text-sm text-[var(--color-text-muted)] mt-1">
                    Setiap modul diujikan langsung secara individu agar staf memiliki refleks tanggap darurat yang tepat di tempat kerja.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="card-premium p-6 space-y-3">
                    <div class="w-10 h-10 rounded-[12px] bg-[var(--color-primary-soft)] text-[var(--color-primary)] flex items-center justify-center font-bold text-sm">
                        CPR
                    </div>
                    <h3 class="font-heading font-bold text-base text-[var(--color-secondary)]">Kompresi Dada &amp; BHD</h3>
                    <p class="text-xs text-[var(--color-text-muted)] leading-relaxed">
                        Penguasaan kedalaman kompresi, kecepatan 100–120 bpm, ventilasi bantuan napas, dan penanganan korban henti napas.
                    </p>
                </div>
                <div class="card-premium p-6 space-y-3">
                    <div class="w-10 h-10 rounded-[12px] bg-[var(--color-primary-soft)] text-[var(--color-primary)] flex items-center justify-center font-bold text-sm">
                        LUKA
                    </div>
                    <h3 class="font-heading font-bold text-base text-[var(--color-secondary)]">Hemostasis &amp; Balut Bidai</h3>
                    <p class="text-xs text-[var(--color-text-muted)] leading-relaxed">
                        Menghentikan perdarahan arteri/vena, teknik torniket bila diindikasikan, serta fiksasi patah tulang dengan bidai kayu/kawat.
                    </p>
                </div>
                <div class="card-premium p-6 space-y-3">
                    <div class="w-10 h-10 rounded-[12px] bg-[var(--color-primary-soft)] text-[var(--color-primary)] flex items-center justify-center font-bold text-sm">
                        EVAC
                    </div>
                    <h3 class="font-heading font-bold text-base text-[var(--color-secondary)]">Transportasi Korban Aman</h3>
                    <p class="text-xs text-[var(--color-text-muted)] leading-relaxed">
                        Teknik log-roll, imobilisasi leher (cervical collar), penggunaan tandu darurat, dan koordinasi menuju ambulans.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Peta Lokasi Kecamatan Google Maps Embed -->
    <section class="py-12 bg-white border-b border-[var(--color-border)]" aria-label="Peta Wilayah Kecamatan {{ $distName }}">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-5 space-y-3">
                    <span class="text-xs font-heading font-bold uppercase tracking-wider text-[var(--color-primary)] block">PETA WILAYAH KECAMATAN</span>
                    <h2 class="font-heading font-bold text-2xl sm:text-3xl text-[var(--color-secondary)]">
                        Area Layanan di Kecamatan {{ $distName }}
                    </h2>
                    <p class="text-sm text-[var(--color-text-muted)] leading-relaxed">
                        Instruktur kami hadir langsung ke lokasi operasional perusahaan Anda di kawasan Kecamatan {{ $distName }}, {{ $cityName }} dengan membawa seluruh peralatan simulasi darurat medis.
                    </p>
                    <div class="flex items-center gap-2 text-xs font-semibold text-[var(--color-primary)] pt-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span>Kecamatan {{ $distName }}, {{ $cityName }}, Provinsi {{ $province }}</span>
                    </div>
                </div>
                <div class="lg:col-span-7">
                    <div class="rounded-[16px] overflow-hidden border border-[var(--color-border)] shadow-sm bg-[var(--color-surface-muted)] h-[300px]">
                        <iframe
                            src="{{ $mapsEmbedUrl }}"
                            width="100%"
                            height="100%"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            title="Peta Wilayah Kecamatan {{ $distName }}"
                            class="w-full h-full"
                        ></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kecamatan Sibling di Wilayah yang Sama -->
    @if(!empty($district['sibling_districts']))
    <section class="py-14 bg-[var(--color-surface-muted)] border-b border-[var(--color-border)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8 gap-3">
                <div>
                    <span class="text-xs font-heading font-bold uppercase tracking-wider text-[var(--color-primary)] block mb-1">WILAYAH SEKITAR</span>
                    <h2 class="font-heading font-bold text-2xl sm:text-3xl text-[var(--color-secondary)]">
                        Kecamatan Lainnya di {{ $cityName }}
                    </h2>
                    <p class="text-sm text-[var(--color-text-muted)] mt-1">
                        Jejaring koordinasi pelatihan in-house di kecamatan sekitar {{ $distName }}:
                    </p>
                </div>
                <a href="{{ route('city.landing', ['citySlug' => $citySlug]) }}" class="text-xs font-heading font-semibold text-[var(--color-primary)] hover:underline shrink-0">
                    Lihat Semua di {{ $cityName }} &rarr;
                </a>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3">
                @foreach(array_slice($district['sibling_districts'], 0, 18) as $sib)
                    <a href="{{ route('kecamatan.landing', ['districtSlug' => $sib['slug']]) }}" class="card-premium p-3 bg-white text-center hover:border-[var(--color-primary)] hover:bg-[var(--color-primary-soft)] transition-colors group">
                        <span class="text-[10px] text-[var(--color-text-muted)] block">Kecamatan</span>
                        <span class="font-heading font-bold text-xs text-[var(--color-secondary)] group-hover:text-[var(--color-primary)] block truncate">
                            {{ $sib['name'] }}
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- FAQ Accordion Khusus Kecamatan -->
    @if(!empty($faqItems))
    <section class="py-14 bg-[var(--color-surface)] border-b border-[var(--color-border)]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10 space-y-2">
                <span class="text-xs font-heading font-bold uppercase tracking-wider text-[var(--color-primary)] block">TANYA JAWAB TEKNIS</span>
                <h2 class="font-heading font-bold text-2xl sm:text-3xl text-[var(--color-secondary)]">
                    FAQ: Pelatihan P3K di Kecamatan {{ $distName }}
                </h2>
                <p class="text-sm text-[var(--color-text-muted)]">
                    Pertanyaan umum seputar mobilisasi pelatihan ke area Kecamatan {{ $distName }}, {{ $cityName }}.
                </p>
            </div>

            <div class="space-y-3">
                @foreach($faqItems as $idx => $faq)
                    <div class="card-premium p-5 bg-white border border-[var(--color-border)]">
                        <h3 class="font-heading font-bold text-sm sm:text-base text-[var(--color-secondary)] mb-2 flex items-start gap-2">
                            <span class="text-[var(--color-primary)] font-bold shrink-0">Q{{ $idx + 1 }}:</span>
                            <span>{{ $faq['q'] }}</span>
                        </h3>
                        <p class="text-xs sm:text-sm text-[var(--color-text-muted)] leading-relaxed pl-6">
                            {{ $faq['a'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- In-Page Consultation Inquiry for District -->
    <section id="inquiry-kecamatan" class="py-16 bg-[var(--color-secondary)] text-white">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
            <span class="inline-block px-3 py-1 rounded-full bg-[var(--color-primary)] text-white text-xs font-heading font-semibold uppercase tracking-wider">
                KOORDINASI DI KECAMATAN {{ strtoupper($distName) }}
            </span>
            <h2 class="font-heading font-bold text-2xl sm:text-3xl text-white">
                Ajukan Pelatihan P3K untuk Perusahaan di Kecamatan {{ $distName }}
            </h2>
            <p class="text-sm text-[#94A3B8] max-w-xl mx-auto leading-relaxed">
                Konsultasikan jadwal pelaksanaan, penyesuaian materi risiko bahaya, dan estimasi kuota peserta tim Anda di area Kecamatan {{ $distName }}, {{ $cityName }}.
            </p>

            <div class="bg-[#132032] p-6 sm:p-8 rounded-[16px] border border-[#2A3B52] text-left">
                <form onsubmit="event.preventDefault(); alert('Terima kasih. Permohonan konsultasi pelatihan P3K untuk Kecamatan {{ $distName }} telah diterima.');" class="space-y-4">
                    <div>
                        <label for="kec_org_name" class="block text-xs font-medium text-[#94A3B8] mb-1">Nama Perusahaan / Fasilitas di Kecamatan {{ $distName }}</label>
                        <input type="text" id="kec_org_name" required placeholder="PT Contoh di Kecamatan {{ $distName }}" class="w-full px-3.5 py-2.5 rounded-[12px] bg-[#0A121D] border border-[#2A3B52] text-white text-sm focus:outline-none focus:border-[var(--color-primary)]">
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="kec_pic" class="block text-xs font-medium text-[#94A3B8] mb-1">Nama PIC</label>
                            <input type="text" id="kec_pic" required placeholder="Bpk/Ibu Koordinator K3" class="w-full px-3.5 py-2.5 rounded-[12px] bg-[#0A121D] border border-[#2A3B52] text-white text-sm focus:outline-none focus:border-[var(--color-primary)]">
                        </div>
                        <div>
                            <label for="kec_contact" class="block text-xs font-medium text-[#94A3B8] mb-1">Email / Kontak</label>
                            <input type="text" id="kec_contact" required placeholder="pic@perusahaan.co.id" class="w-full px-3.5 py-2.5 rounded-[12px] bg-[#0A121D] border border-[#2A3B52] text-white text-sm focus:outline-none focus:border-[var(--color-primary)]">
                        </div>
                    </div>
                    <div>
                        <label for="kec_notes" class="block text-xs font-medium text-[#94A3B8] mb-1">Estimasi Jumlah Peserta &amp; Alamat Fasilitas</label>
                        <textarea id="kec_notes" rows="2" placeholder="Contoh: 15 staf di area Kecamatan {{ $distName }}, {{ $cityName }}" class="w-full px-3.5 py-2.5 rounded-[12px] bg-[#0A121D] border border-[#2A3B52] text-white text-sm focus:outline-none focus:border-[var(--color-primary)]"></textarea>
                    </div>
                    <button type="submit" class="btn-primary w-full py-3 text-sm font-bold">
                        Kirim Permohonan di Kecamatan {{ $distName }}
                    </button>
                </form>
            </div>
        </div>
    </section>

@endsection
