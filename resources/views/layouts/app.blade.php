<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @hasSection('title')
            @yield('title') - {{ config('app.name', 'Pelatihan P3K') }}
        @else
            {{ config('app.name', 'Pelatihan P3K') }} - Layanan Pelatihan Pertolongan Pertama Tempat Kerja
        @endif
    </title>
    <meta name="description" content="@yield('meta_description', 'Layanan pelatihan P3K bersertifikasi untuk kesiapsiagaan darurat medis, sertifikasi kepatuhan K3, dan keselamatan kerja perusahaan.')">
    
    @hasSection('canonical')
    <link rel="canonical" href="@yield('canonical')">
    @endif

    <meta property="og:site_name" content="{{ config('app.name', 'Pelatihan P3K') }}">
    <meta property="og:title" content="@yield('title', config('app.name', 'Pelatihan P3K'))">
    <meta property="og:description" content="@yield('meta_description', 'Layanan pelatihan P3K bersertifikasi untuk kesiapsiagaan darurat medis di lingkungan kerja.')">
    <meta property="og:type" content="website">

    <!-- Preconnect & Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('schema')
</head>
<body class="bg-[var(--color-background)] text-[var(--color-text)] font-sans antialiased min-h-screen flex flex-col selection:bg-[var(--color-primary-soft)] selection:text-[var(--color-primary)]">
    <!-- Accessible Skip Link -->
    <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-50 focus:px-4 focus:py-2 focus:bg-[var(--color-primary)] focus:text-white focus:rounded-[18px] focus:shadow-md">
        Menuju ke konten utama
    </a>

    <!-- Top Navigation Header -->
    <header class="bg-[var(--color-surface)] border-b border-[var(--color-border)] sticky top-0 z-40 backdrop-blur-md bg-opacity-95" aria-label="Header Navigasi Utama">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Brand Identity -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group focus:outline-none focus-visible:ring-2 focus-visible:ring-[var(--color-primary)] rounded-lg p-1">
                    <span class="w-10 h-10 rounded-[12px] bg-[var(--color-primary)] text-white flex items-center justify-center font-heading font-bold text-xl shadow-sm group-hover:bg-[var(--color-primary-hover)] transition-colors">
                        +
                    </span>
                    <div class="flex flex-col text-left">
                        <span class="font-heading font-bold text-xl tracking-tight text-[var(--color-secondary)] group-hover:text-[var(--color-primary)] transition-colors">
                            PELATIHAN P3K
                        </span>
                        <span class="text-[11px] font-sans font-medium uppercase tracking-wider text-[var(--color-text-muted)]">
                            Tanggap Darurat Medis K3
                        </span>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden md:flex items-center space-x-7" aria-label="Navigasi Menu">
                    <a href="{{ route('home') }}#manfaat" class="text-sm font-medium text-[var(--color-text)] hover:text-[var(--color-primary)] transition-colors">Manfaat</a>
                    <a href="{{ route('home') }}#materi" class="text-sm font-medium text-[var(--color-text)] hover:text-[var(--color-primary)] transition-colors">Materi</a>
                    <a href="{{ route('home') }}#target" class="text-sm font-medium text-[var(--color-text)] hover:text-[var(--color-primary)] transition-colors">Peserta</a>
                    <a href="{{ route('home') }}#proses" class="text-sm font-medium text-[var(--color-text)] hover:text-[var(--color-primary)] transition-colors">Alur</a>
                    <a href="{{ route('home') }}#wilayah" class="text-sm font-medium text-[var(--color-text)] hover:text-[var(--color-primary)] transition-colors">Cakupan Wilayah</a>
                    <a href="{{ route('articles.index') }}" class="text-sm font-medium text-[var(--color-text)] hover:text-[var(--color-primary)] transition-colors">Artikel</a>
                    <a href="{{ route('home') }}#faq" class="text-sm font-medium text-[var(--color-text)] hover:text-[var(--color-primary)] transition-colors">FAQ</a>
                </nav>

                <!-- Desktop CTA -->
                <div class="hidden md:flex items-center gap-3">
                    <a href="{{ route('home') }}#konsultasi" class="btn-primary text-sm py-2.5 px-5">
                        Konsultasi Tim
                    </a>
                </div>

                <!-- Mobile Menu Toggle Button -->
                <button id="mobile-menu-btn" type="button" class="md:hidden p-2 rounded-lg text-[var(--color-secondary)] hover:bg-[var(--color-surface-muted)] focus:outline-none focus:ring-2 focus:ring-[var(--color-primary)]" aria-expanded="false" aria-controls="mobile-menu" aria-label="Buka menu navigasi">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path id="menu-icon-bars" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path id="menu-icon-close" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Dropdown Navigation -->
        <nav id="mobile-menu" class="hidden md:hidden border-t border-[var(--color-border)] bg-[var(--color-surface)] px-4 pt-3 pb-6 space-y-2 shadow-lg" aria-label="Navigasi Menu Mobile">
            <a href="{{ route('home') }}#manfaat" class="block py-2.5 px-3 rounded-lg text-base font-medium text-[var(--color-text)] hover:bg-[var(--color-surface-muted)] hover:text-[var(--color-primary)]">Manfaat</a>
            <a href="{{ route('home') }}#materi" class="block py-2.5 px-3 rounded-lg text-base font-medium text-[var(--color-text)] hover:bg-[var(--color-surface-muted)] hover:text-[var(--color-primary)]">Materi Pelatihan</a>
            <a href="{{ route('home') }}#target" class="block py-2.5 px-3 rounded-lg text-base font-medium text-[var(--color-text)] hover:bg-[var(--color-surface-muted)] hover:text-[var(--color-primary)]">Target Peserta</a>
            <a href="{{ route('home') }}#proses" class="block py-2.5 px-3 rounded-lg text-base font-medium text-[var(--color-text)] hover:bg-[var(--color-surface-muted)] hover:text-[var(--color-primary)]">Proses Pelatihan</a>
            <a href="{{ route('home') }}#wilayah" class="block py-2.5 px-3 rounded-lg text-base font-medium text-[var(--color-text)] hover:bg-[var(--color-surface-muted)] hover:text-[var(--color-primary)]">Cakupan Wilayah</a>
            <a href="{{ route('articles.index') }}" class="block py-2.5 px-3 rounded-lg text-base font-medium text-[var(--color-text)] hover:bg-[var(--color-surface-muted)] hover:text-[var(--color-primary)]">Artikel &amp; Panduan</a>
            <a href="{{ route('home') }}#faq" class="block py-2.5 px-3 rounded-lg text-base font-medium text-[var(--color-text)] hover:bg-[var(--color-surface-muted)] hover:text-[var(--color-primary)]">FAQ</a>
            <div class="pt-3 border-t border-[var(--color-border)]">
                <a href="{{ route('home') }}#konsultasi" class="btn-primary w-full text-center py-3 text-sm">
                    Konsultasi Tim Sekarang
                </a>
            </div>
        </nav>
    </header>

    <!-- Main Content Landmark -->
    <main id="main-content" class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[var(--color-secondary)] text-[#EAF0F6] border-t border-[var(--color-border)] pt-14 pb-8" aria-label="Footer Informasi">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 pb-12 border-b border-[#2A3B52]">
                <!-- Brand Info -->
                <div class="md:col-span-5 space-y-4">
                    <div class="flex items-center gap-3">
                        <span class="w-9 h-9 rounded-[10px] bg-[var(--color-primary)] text-white flex items-center justify-center font-heading font-bold text-lg">
                            +
                        </span>
                        <span class="font-heading font-bold text-xl text-white tracking-tight">
                            PELATIHAN P3K
                        </span>
                    </div>
                    <p class="text-sm text-[#94A3B8] leading-relaxed max-w-sm font-sans">
                        Penyelenggara program pembinaan dan pelatihan Pertolongan Pertama Pada Kecelakaan (P3K) di lingkungan kerja, pabrik, fasilitas publik, dan perkantoran sesuai standar keselamatan kerja.
                    </p>
                    <div class="flex items-center gap-2 text-xs text-[#94A3B8]">
                        <span class="inline-block w-2 h-2 rounded-full bg-[var(--color-whatsapp)]"></span>
                        <span>Konsultasi &amp; Koordinasi In-House Tersedia</span>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="md:col-span-3 space-y-3">
                    <h3 class="font-heading font-semibold text-sm uppercase tracking-wider text-white">Navigasi</h3>
                    <ul class="space-y-2 text-sm text-[#94A3B8]">
                        <li><a href="{{ route('home') }}#manfaat" class="hover:text-white transition-colors">Manfaat Pelatihan</a></li>
                        <li><a href="{{ route('home') }}#materi" class="hover:text-white transition-colors">Silabus Materi</a></li>
                        <li><a href="{{ route('home') }}#target" class="hover:text-white transition-colors">Target Peserta</a></li>
                        <li><a href="{{ route('home') }}#proses" class="hover:text-white transition-colors">Alur Pelaksanaan</a></li>
                        <li><a href="{{ route('home') }}#wilayah" class="hover:text-white transition-colors">Cakupan Wilayah Regional</a></li>
                        <li><a href="{{ route('articles.index') }}" class="hover:text-white transition-colors">Artikel &amp; Panduan</a></li>
                    </ul>
                </div>

                <!-- Inquiry Status Notice -->
                <div class="md:col-span-4 space-y-3">
                    <h3 class="font-heading font-semibold text-sm uppercase tracking-wider text-white">Konsultasi Resmi</h3>
                    <p class="text-xs text-[#94A3B8] leading-relaxed">
                        Untuk konsultasi in-house training perusahaan, penyesuaian kurikulum risiko kerja, dan perencanaan jadwal, silakan ajukan permohonan melalui formulir kebutuhan atau hubungi tim koordinator.
                    </p>
                    <div class="p-3.5 bg-[#0F1B2B] rounded-[12px] border border-[#2A3B52] text-xs space-y-1.5">
                        <span class="font-heading font-semibold text-[var(--color-primary-soft)] block">Pelayanan Terbuka:</span>
                        <span class="text-[#94A3B8] block">Senin – Jumat: 08:30 – 17:00 WIB</span>
                        <span class="text-[#94A3B8] block">Melayani pelatihan in-house di seluruh wilayah Indonesia</span>
                    </div>
                </div>
            </div>

            <!-- Bottom Disclaimer & Copyright -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-[#94A3B8]">
                <p>© {{ date('Y') }} {{ config('app.name', 'Pelatihan P3K') }}. Hak Cipta Dilindungi.</p>
                <p class="text-center sm:text-right">Program pembinaan P3K tempat kerja berlandaskan keselamatan dan kesehatan kerja nasional.</p>
            </div>
        </div>
    </footer>

    <!-- Interactive script for mobile menu -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btn = document.getElementById('mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');
            const bars = document.getElementById('menu-icon-bars');
            const close = document.getElementById('menu-icon-close');

            if (btn && menu) {
                btn.addEventListener('click', function () {
                    const isExpanded = btn.getAttribute('aria-expanded') === 'true';
                    btn.setAttribute('aria-expanded', !isExpanded);
                    menu.classList.toggle('hidden');
                    if (bars && close) {
                        bars.classList.toggle('hidden');
                        close.classList.toggle('hidden');
                    }
                });

                // Close mobile menu when a link is clicked
                menu.querySelectorAll('a').forEach(function (link) {
                    link.addEventListener('click', function () {
                        menu.classList.add('hidden');
                        btn.setAttribute('aria-expanded', 'false');
                        if (bars && close) {
                            bars.classList.remove('hidden');
                            close.classList.add('hidden');
                        }
                    });
                });
            }
        });
    </script>
</body>
</html>
