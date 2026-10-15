@extends('layouts.app')

@php
    $cityName = $city['name'];
    $rawCityName = $city['raw_name'];
    $province = $city['province'];
    $island = $city['island'];
    $seoTitle = "Pelatihan P3K di {$cityName}, {$province} - Program Pembinaan Kesiapsiagaan Kerja";
    $metaDesc = "Layanan in-house pelatihan P3K bersertifikasi di {$cityName}, {$province}. Pelatihan pertolongan pertama darurat medis, CPR, penanganan luka, dan kepatuhan K3 perusahaan.";
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

    <!-- Breadcrumb -->
    <nav class="bg-[var(--color-surface)] border-b border-[var(--color-border)] py-3 text-xs font-sans text-[var(--color-text-muted)]" aria-label="Breadcrumb">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-[var(--color-primary)] transition-colors">Beranda</a>
            <span class="text-[var(--color-border)]">/</span>
            <span class="text-[var(--color-secondary)] font-semibold">{{ $cityName }}</span>
        </div>
    </nav>

    <!-- Regional City Header / Hero -->
    <section class="py-12 sm:py-16 bg-gradient-to-b from-[var(--color-surface)] to-[var(--color-background)] border-b border-[var(--color-border)]" aria-labelledby="city-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                <div class="lg:col-span-8 space-y-5">
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="px-2.5 py-1 rounded-full text-xs font-heading font-semibold bg-[var(--color-primary-soft)] text-[var(--color-primary)] border border-[#C2E4D8]">
                            LAYANAN IN-HOUSE PELATIHAN P3K
                        </span>
                        <span class="px-2.5 py-1 rounded-full text-xs font-heading font-semibold bg-[var(--color-secondary-soft)] text-[var(--color-secondary)] border border-[var(--color-border)]">
                            PROVINSI {{ strtoupper($province) }}
                        </span>
                        <span class="px-2.5 py-1 rounded-full text-xs font-heading font-semibold bg-[var(--color-surface-muted)] text-[var(--color-text-muted)]">
                            WILAYAH {{ strtoupper($island) }}
                        </span>
                    </div>

                    <h1 id="city-heading" class="font-heading font-bold text-3xl sm:text-4xl lg:text-5xl text-[var(--color-secondary)] leading-tight">
                        Pelatihan P3K di {{ $cityName }}
                    </h1>

                    <p class="text-base sm:text-lg text-[var(--color-text-muted)] leading-relaxed max-w-3xl">
                        Program pembinaan dan simulasi pertolongan pertama pada kecelakaan (P3K) di tempat kerja untuk perusahaan, pabrik, instansi, dan fasilitas operasional di area <strong class="text-[var(--color-secondary)]">{{ $cityName }}</strong> dan wilayah sekitarnya.
                    </p>

                    <div class="flex flex-wrap items-center gap-4 pt-2">
                        <a href="#inquiry" class="btn-primary text-sm py-3 px-6 shadow-sm">
                            Konsultasi In-House di {{ $rawCityName }}
                        </a>
                        <a href="#kecamatan" class="btn-secondary text-sm py-3 px-6">
                            Lihat {{ count($city['districts']) }} Kecamatan Terdata
                        </a>
                    </div>
                </div>

                <!-- Regional Meta Card -->
                <div class="lg:col-span-4">
                    <div class="card-premium p-6 bg-white space-y-4 border border-[var(--color-border)] shadow-sm">
                        <div class="border-b border-[var(--color-border)] pb-3 flex items-center justify-between">
                            <span class="font-heading font-bold text-xs uppercase text-[var(--color-secondary)] tracking-wider">
                                STATUS REGIONAL KOORDINASI
                            </span>
                            <span class="flex items-center gap-1.5 text-xs font-medium text-[var(--color-primary)]">
                                <span class="w-2 h-2 rounded-full bg-[var(--color-primary)]"></span>
                                Tersedia
                            </span>
                        </div>

                        <div class="space-y-2.5 text-xs">
                            <div class="flex justify-between py-1 border-b border-[var(--color-surface-muted)]">
                                <span class="text-[var(--color-text-muted)]">Wilayah:</span>
                                <span class="font-heading font-semibold text-[var(--color-secondary)] text-right">{{ $cityName }}</span>
                            </div>
                            <div class="flex justify-between py-1 border-b border-[var(--color-surface-muted)]">
                                <span class="text-[var(--color-text-muted)]">Provinsi:</span>
                                <span class="text-[var(--color-secondary)] text-right">{{ $province }}</span>
                            </div>
                            <div class="flex justify-between py-1 border-b border-[var(--color-surface-muted)]">
                                <span class="text-[var(--color-text-muted)]">Gugus Pulau:</span>
                                <span class="text-[var(--color-secondary)] text-right">{{ $island }}</span>
                            </div>
                            <div class="flex justify-between py-1 border-b border-[var(--color-surface-muted)]">
                                <span class="text-[var(--color-text-muted)]">Jumlah Kecamatan:</span>
                                <span class="font-heading font-semibold text-[var(--color-primary)] text-right">{{ count($city['districts']) }} Kecamatan</span>
                            </div>
                            <div class="flex justify-between py-1">
                                <span class="text-[var(--color-text-muted)]">Format Penyelenggaraan:</span>
                                <span class="font-semibold text-[var(--color-secondary)] text-right">In-House di Lokasi Perusahaan</span>
                            </div>
                        </div>

                        <div class="p-3 bg-[var(--color-surface-muted)] rounded-[10px] text-[11px] text-[var(--color-text-muted)]">
                            Pelatihan diselenggarakan secara in-house dengan mengirimkan tim instruktur dan peralatan peraga simulasi langsung ke fasilitas Anda di {{ $cityName }}.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modul Pelatihan untuk Kota Ini -->
    <section class="py-14 bg-[var(--color-surface)] border-b border-[var(--color-border)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8 max-w-2xl">
                <span class="text-xs font-heading font-bold uppercase tracking-wider text-[var(--color-primary)] block mb-1">SILABUS PRAKTIK</span>
                <h2 class="font-heading font-bold text-2xl sm:text-3xl text-[var(--color-secondary)]">
                    Materi Pelatihan P3K untuk Sektor Industri &amp; Usaha di {{ $cityName }}
                </h2>
                <p class="text-sm text-[var(--color-text-muted)] mt-1">
                    Kurikulum aplikatif yang membekali tim Anda dengan kemampuan penanganan cepat keadaan darurat medis di lingkungan kerja.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="card-premium p-5 space-y-2">
                    <span class="text-xs font-heading font-bold text-[var(--color-primary)]">MODUL 01</span>
                    <h3 class="font-heading font-bold text-base text-[var(--color-secondary)]">Bantuan Hidup Dasar (BHD &amp; CPR)</h3>
                    <p class="text-xs text-[var(--color-text-muted)] leading-relaxed">
                        Simulasi kompresi dada manekin, resusitasi henti jantung mendadak, dan manajemen tersedak sumbatan jalan napas.
                    </p>
                </div>
                <div class="card-premium p-5 space-y-2">
                    <span class="text-xs font-heading font-bold text-[var(--color-primary)]">MODUL 02</span>
                    <h3 class="font-heading font-bold text-base text-[var(--color-secondary)]">Pembalutan, Pembidaian &amp; Patah Tulang</h3>
                    <p class="text-xs text-[var(--color-text-muted)] leading-relaxed">
                        Teknik penghentian perdarahan luar, balut tekan mitela, serta imobilisasi fraktur tulang untuk mencegah cedera saraf lanjutan.
                    </p>
                </div>
                <div class="card-premium p-5 space-y-2">
                    <span class="text-xs font-heading font-bold text-[var(--color-primary)]">MODUL 03</span>
                    <h3 class="font-heading font-bold text-base text-[var(--color-secondary)]">Luka Bakar &amp; Paparan Bahan Kimia</h3>
                    <p class="text-xs text-[var(--color-text-muted)] leading-relaxed">
                        Pertolongan pertama pada luka bakar api, uap panas, cairan kimia berbahaya, dan sengatan tegangan listrik.
                    </p>
                </div>
                <div class="card-premium p-5 space-y-2">
                    <span class="text-xs font-heading font-bold text-[var(--color-primary)]">MODUL 04</span>
                    <h3 class="font-heading font-bold text-base text-[var(--color-secondary)]">Evakuasi &amp; Penanganan Cedera Spinal</h3>
                    <p class="text-xs text-[var(--color-text-muted)] leading-relaxed">
                        Teknik pemindahan korban darurat menggunakan tandu, stabilisasi leher dan tulang belakang saat kecelakaan jatuh atau tertimpa.
                    </p>
                </div>
                <div class="card-premium p-5 space-y-2">
                    <span class="text-xs font-heading font-bold text-[var(--color-primary)]">MODUL 05</span>
                    <h3 class="font-heading font-bold text-base text-[var(--color-secondary)]">Standarisasi &amp; Inspeksi Kotak P3K</h3>
                    <p class="text-xs text-[var(--color-text-muted)] leading-relaxed">
                        Penataan obat dan alat pertolongan darurat di tempat kerja, audit masa kedaluwarsa, dan pencatatan buku laporan insiden.
                    </p>
                </div>
                <div class="card-premium p-5 space-y-2">
                    <span class="text-xs font-heading font-bold text-[var(--color-primary)]">MODUL 06</span>
                    <h3 class="font-heading font-bold text-base text-[var(--color-secondary)]">Kesiapsiagaan Tim Tanggap Darurat</h3>
                    <p class="text-xs text-[var(--color-text-muted)] leading-relaxed">
                        Protokol pemanggilan ambulans rujukan, koordinasi lintas unit, dan simulasi skenario evakuasi massal.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Peta Cakupan Wilayah Google Maps Embed -->
    <section class="py-12 bg-white border-b border-[var(--color-border)]" aria-label="Peta Wilayah {{ $cityName }}">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-5 space-y-3">
                    <span class="text-xs font-heading font-bold uppercase tracking-wider text-[var(--color-primary)] block">PETA CAKUPAN WILAYAH</span>
                    <h2 class="font-heading font-bold text-2xl sm:text-3xl text-[var(--color-secondary)]">
                        Area Pelatihan P3K di {{ $cityName }}
                    </h2>
                    <p class="text-sm text-[var(--color-text-muted)] leading-relaxed">
                        Penyelenggaraan pelatihan tanggap darurat medis in-house kami menjangkau seluruh zona industri, kompleks perkantoran, dan kawasan usaha di {{ $cityName }} dan sekitarnya.
                    </p>
                    <div class="flex items-center gap-2 text-xs font-semibold text-[var(--color-primary)] pt-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span>Wilayah: {{ $cityName }}, Provinsi {{ $province }}</span>
                    </div>
                </div>
                <div class="lg:col-span-7">
                    <div class="rounded-[16px] overflow-hidden border border-[var(--color-border)] shadow-sm bg-[var(--color-surface-muted)] h-[320px]">
                        <iframe
                            src="{{ $mapsEmbedUrl }}"
                            width="100%"
                            height="100%"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            title="Peta Wilayah {{ $cityName }}"
                            class="w-full h-full"
                        ></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Daftar Kecamatan di Kota Ini -->
    <section id="kecamatan" class="py-14 bg-[var(--color-surface-muted)] border-b border-[var(--color-border)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8 gap-3">
                <div>
                    <span class="text-xs font-heading font-bold uppercase tracking-wider text-[var(--color-primary)] block mb-1">DAFTAR KECAMATAN</span>
                    <h2 class="font-heading font-bold text-2xl sm:text-3xl text-[var(--color-secondary)]">
                        Kecamatan di Wilayah {{ $cityName }}
                    </h2>
                    <p class="text-sm text-[var(--color-text-muted)] mt-1">
                        Pilih kecamatan untuk melihat rincian koordinasi pelatihan in-house di area kerja Anda:
                    </p>
                </div>
                <span class="text-xs font-heading font-semibold bg-white px-3 py-1.5 rounded-full border border-[var(--color-border)] text-[var(--color-secondary)] shrink-0">
                    {{ count($city['districts']) }} Kecamatan
                </span>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3.5">
                @foreach($city['districts'] as $dist)
                    <a href="{{ route('kecamatan.landing', ['districtSlug' => $dist['slug']]) }}" class="card-premium p-4 flex flex-col justify-between hover:border-[var(--color-primary)] hover:bg-[var(--color-primary-soft)] transition-colors group">
                        <div>
                            <span class="text-[10px] font-heading font-semibold uppercase text-[var(--color-text-muted)] block mb-1">
                                KECAMATAN
                            </span>
                            <h3 class="font-heading font-bold text-sm text-[var(--color-secondary)] group-hover:text-[var(--color-primary)]">
                                {{ $dist['name'] }}
                            </h3>
                        </div>
                        <span class="text-[11px] font-heading font-semibold text-[var(--color-primary)] mt-3 flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                            Info Layanan &rarr;
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- FAQ Accordion Khusus Kota Ini -->
    @if(!empty($faqItems))
    <section class="py-14 bg-[var(--color-surface)] border-b border-[var(--color-border)]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10 space-y-2">
                <span class="text-xs font-heading font-bold uppercase tracking-wider text-[var(--color-primary)] block">TANYA JAWAB REGIONAL</span>
                <h2 class="font-heading font-bold text-2xl sm:text-3xl text-[var(--color-secondary)]">
                    FAQ: Pelatihan P3K di {{ $cityName }}
                </h2>
                <p class="text-sm text-[var(--color-text-muted)]">
                    Pertanyaan yang sering diajukan oleh pengelola K3 dan manajemen perusahaan di {{ $cityName }}.
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

    <!-- Kota Lainnya di Wilayah / Pulau Ini -->
    @if(!empty($otherCitiesInIsland))
    <section class="py-12 bg-[var(--color-surface-muted)] border-b border-[var(--color-border)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h3 class="font-heading font-bold text-sm uppercase text-[var(--color-secondary)] mb-4 tracking-wider">
                Kota &amp; Kabupaten Lainnya di Wilayah {{ $island }}
            </h3>
            <div class="flex flex-wrap gap-2">
                @foreach($otherCitiesInIsland as $other)
                    <a href="{{ route('city.landing', ['citySlug' => $other['slug']]) }}" class="px-3 py-1.5 bg-white border border-[var(--color-border)] hover:border-[var(--color-primary)] text-xs text-[var(--color-secondary)] hover:text-[var(--color-primary)] rounded-[12px] font-heading font-medium transition-colors">
                        {{ $other['name'] }} &rarr;
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- In-Page Consultation Inquiry Form for City -->
    <section id="inquiry" class="py-16 bg-[var(--color-secondary)] text-white">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
            <span class="inline-block px-3 py-1 rounded-full bg-[var(--color-primary)] text-white text-xs font-heading font-semibold uppercase tracking-wider">
                KOORDINASI DI {{ strtoupper($cityName) }}
            </span>
            <h2 class="font-heading font-bold text-2xl sm:text-3xl text-white">
                Ajukan Pelatihan P3K untuk Perusahaan Anda di {{ $cityName }}
            </h2>
            <p class="text-sm text-[#94A3B8] max-w-xl mx-auto leading-relaxed">
                Sampaikan estimasi kebutuhan personil dan jadwal yang diinginkan. Tim kami akan menyiapkan proposal program in-house training sesuai standar K3.
            </p>

            <div class="bg-[#132032] p-6 sm:p-8 rounded-[16px] border border-[#2A3B52] text-left">
                <form onsubmit="event.preventDefault(); alert('Terima kasih. Permohonan konsultasi pelatihan P3K untuk area {{ $cityName }} telah diterima.');" class="space-y-4">
                    <div>
                        <label for="city_org_name" class="block text-xs font-medium text-[#94A3B8] mb-1">Nama Perusahaan / Unit Usaha di {{ $rawCityName }}</label>
                        <input type="text" id="city_org_name" required placeholder="PT Contoh Industri {{ $rawCityName }}" class="w-full px-3.5 py-2.5 rounded-[12px] bg-[#0A121D] border border-[#2A3B52] text-white text-sm focus:outline-none focus:border-[var(--color-primary)]">
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="city_pic" class="block text-xs font-medium text-[#94A3B8] mb-1">Nama PIC</label>
                            <input type="text" id="city_pic" required placeholder="Bpk/Ibu Koordinator K3" class="w-full px-3.5 py-2.5 rounded-[12px] bg-[#0A121D] border border-[#2A3B52] text-white text-sm focus:outline-none focus:border-[var(--color-primary)]">
                        </div>
                        <div>
                            <label for="city_contact" class="block text-xs font-medium text-[#94A3B8] mb-1">Email / Kontak</label>
                            <input type="text" id="city_contact" required placeholder="email@perusahaan.com" class="w-full px-3.5 py-2.5 rounded-[12px] bg-[#0A121D] border border-[#2A3B52] text-white text-sm focus:outline-none focus:border-[var(--color-primary)]">
                        </div>
                    </div>
                    <div>
                        <label for="city_est" class="block text-xs font-medium text-[#94A3B8] mb-1">Estimasi Peserta &amp; Alamat Fasilitas Pelatihan</label>
                        <textarea id="city_est" rows="2" placeholder="Contoh: 18 staf di fasilitas {{ $cityName }}, rencana bulan depan" class="w-full px-3.5 py-2.5 rounded-[12px] bg-[#0A121D] border border-[#2A3B52] text-white text-sm focus:outline-none focus:border-[var(--color-primary)]"></textarea>
                    </div>
                    <button type="submit" class="btn-primary w-full py-3 text-sm font-bold">
                        Kirim Permohonan Koordinasi di {{ $cityName }}
                    </button>
                </form>
            </div>
        </div>
    </section>

@endsection
