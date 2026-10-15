@extends('layouts.app')

@section('title', 'Pelatihan P3K Tempat Kerja - Tanggap Darurat & Kepatuhan K3')
@section('meta_description', 'Program pelatihan Pertolongan Pertama Pada Kecelakaan (P3K) di tempat kerja. Tingkatkan kesiapsiagaan tim, penanganan medis darurat CPR, balut bidai, dan kepatuhan K3.')

@section('content')

    <!-- Hero Section -->
    <section class="py-16 lg:py-24 bg-gradient-to-b from-[var(--color-surface)] via-[var(--color-background)] to-[var(--color-background)] border-b border-[var(--color-border)]" aria-labelledby="hero-title">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-7 space-y-6 text-left">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-[var(--color-primary-soft)] border border-[#C2E4D8] text-[var(--color-primary)] text-xs font-heading font-semibold tracking-wide uppercase">
                        <span class="w-2 h-2 rounded-full bg-[var(--color-primary)]"></span>
                        Program Pembinaan Kesiapsiagaan Kerja
                    </div>

                    <h1 id="hero-title" class="font-heading font-bold text-3xl sm:text-5xl lg:text-6xl text-[var(--color-secondary)] leading-[1.15] tracking-tight">
                        Pelatihan P3K untuk Tim &amp; Tempat Kerja Anda
                    </h1>

                    <p class="text-base sm:text-lg text-[var(--color-text-muted)] leading-relaxed max-w-2xl font-sans">
                        Tingkatkan kesiapsiagaan darurat medis, cegah fatalitas insiden lapangan, dan penuhi kepatuhan standar K3 melalui pembinaan terstruktur serta simulasi penanganan luka nyata.
                    </p>

                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 pt-2">
                        <a href="#konsultasi" class="btn-primary text-base py-3 px-6 shadow-sm">
                            Konsultasi Kebutuhan Pelatihan
                        </a>
                        <a href="#materi" class="btn-secondary text-base py-3 px-6">
                            Lihat Silabus Materi
                        </a>
                    </div>

                    <!-- Highlight metrics without fabrication -->
                    <div class="pt-6 border-t border-[var(--color-border)] grid grid-cols-3 gap-6">
                        <div>
                            <span class="block font-heading font-bold text-2xl text-[var(--color-primary)]">Praktik 70%</span>
                            <span class="text-xs text-[var(--color-text-muted)] font-medium">Hands-on Simulator</span>
                        </div>
                        <div>
                            <span class="block font-heading font-bold text-2xl text-[var(--color-secondary)]">In-House</span>
                            <span class="text-xs text-[var(--color-text-muted)] font-medium">Langsung di Perusahaan</span>
                        </div>
                        <div>
                            <span class="block font-heading font-bold text-2xl text-[var(--color-primary)]">38 Provinsi</span>
                            <span class="text-xs text-[var(--color-text-muted)] font-medium">Jangkauan Nasional</span>
                        </div>
                    </div>
                </div>

                <!-- Hero Visual Card -->
                <div class="lg:col-span-5">
                    <div class="card-premium p-6 sm:p-8 bg-white shadow-sm border border-[var(--color-border)] space-y-6">
                        <div class="flex items-center justify-between border-b border-[var(--color-border)] pb-4">
                            <span class="font-heading font-bold text-xs uppercase tracking-wider text-[var(--color-secondary)]">
                                MATRIKS RESPON CEPAT P3K
                            </span>
                            <span class="px-2 py-0.5 rounded text-[10px] font-heading font-semibold bg-[var(--color-primary-soft)] text-[var(--color-primary)]">
                                Standar Penyelamatan
                            </span>
                        </div>

                        <div class="space-y-4 text-xs font-sans">
                            <div class="p-3.5 rounded-[12px] bg-[var(--color-surface-muted)] border border-[var(--color-border)] flex items-start gap-3">
                                <span class="w-6 h-6 rounded-full bg-[var(--color-primary)] text-white flex items-center justify-center font-bold text-xs shrink-0">1</span>
                                <div>
                                    <strong class="font-heading text-sm text-[var(--color-secondary)] block mb-0.5">Penilaian Primer (DRCAB)</strong>
                                    <p class="text-[var(--color-text-muted)]">Pemeriksaan respon sadar, sirkulasi darah, jalan napas, dan pernapasan korban.</p>
                                </div>
                            </div>
                            <div class="p-3.5 rounded-[12px] bg-[var(--color-surface-muted)] border border-[var(--color-border)] flex items-start gap-3">
                                <span class="w-6 h-6 rounded-full bg-[var(--color-secondary)] text-white flex items-center justify-center font-bold text-xs shrink-0">2</span>
                                <div>
                                    <strong class="font-heading text-sm text-[var(--color-secondary)] block mb-0.5">Tindakan Stabilisasi Cepat</strong>
                                    <p class="text-[var(--color-text-muted)]">Resusitasi Jantung Paru (CPR), penghentian perdarahan masif, dan imobilisasi fraktur.</p>
                                </div>
                            </div>
                            <div class="p-3.5 rounded-[12px] bg-[var(--color-surface-muted)] border border-[var(--color-border)] flex items-start gap-3">
                                <span class="w-6 h-6 rounded-full bg-[var(--color-primary)] text-white flex items-center justify-center font-bold text-xs shrink-0">3</span>
                                <div>
                                    <strong class="font-heading text-sm text-[var(--color-secondary)] block mb-0.5">Evakuasi Medis Terkoordinasi</strong>
                                    <p class="text-[var(--color-text-muted)]">Teknik pemindahan korban aman menuju fasilitas rujukan darurat lanjutan.</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 rounded-[12px] bg-[var(--color-secondary-soft)] border border-[#D5E1ED] text-xs text-[var(--color-secondary)] flex items-center gap-2">
                            <svg class="w-5 h-5 text-[var(--color-primary)] shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Disesuaikan dengan risiko operasional spesifik tempat kerja Anda.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Manfaat Pelatihan Section -->
    <section id="manfaat" class="py-16 sm:py-20 bg-[var(--color-surface)] border-b border-[var(--color-border)]" aria-labelledby="manfaat-title">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14 space-y-3">
                <span class="text-xs font-heading font-bold uppercase tracking-wider text-[var(--color-primary)] block">NILAI STRATEGIS BAGI ORGANISASI</span>
                <h2 id="manfaat-title" class="font-heading font-bold text-3xl sm:text-4xl text-[var(--color-secondary)]">
                    Manfaat Nyata Pelatihan P3K di Tempat Kerja
                </h2>
                <p class="text-base text-[var(--color-text-muted)]">
                    Investasi kesiapsiagaan darurat bukan sekadar formalitas kepatuhan, melainkan penyelamat nyawa berharga saat detik-detik kritis di lapangan.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Benefit Card 1 -->
                <div class="card-premium p-6 space-y-4">
                    <div class="w-12 h-12 rounded-[14px] bg-[var(--color-primary-soft)] text-[var(--color-primary)] flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </div>
                    <h3 class="font-heading font-bold text-xl text-[var(--color-secondary)]">Mencegah Risiko Fatalitas</h3>
                    <p class="text-sm text-[var(--color-text-muted)] leading-relaxed">
                        Tindakan pertolongan pertama dalam rentang waktu "Golden Hour" mengurangi keparahan cidera dan mencegah dampak kecelakaan menjadi fatal.
                    </p>
                </div>

                <!-- Benefit Card 2 -->
                <div class="card-premium p-6 space-y-4">
                    <div class="w-12 h-12 rounded-[14px] bg-[var(--color-primary-soft)] text-[var(--color-primary)] flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="font-heading font-bold text-xl text-[var(--color-secondary)]">Kepatuhan Regulasi K3</h3>
                    <p class="text-sm text-[var(--color-text-muted)] leading-relaxed">
                        Mendukung pemenuhan kewajiban regulasi keselamatan kerja terkait penyediaan petugas P3K berlisensi dan perlengkapan P3K yang layak di tempat kerja.
                    </p>
                </div>

                <!-- Benefit Card 3 -->
                <div class="card-premium p-6 space-y-4">
                    <div class="w-12 h-12 rounded-[14px] bg-[var(--color-primary-soft)] text-[var(--color-primary)] flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="font-heading font-bold text-xl text-[var(--color-secondary)]">Kesiapsiagaan Mental Tim</h3>
                    <p class="text-sm text-[var(--color-text-muted)] leading-relaxed">
                        Membangun ketenangan dan koordinasi tanggap darurat saat insiden tak terduga terjadi, menghindari kepanikan yang memperburuk situasi.
                    </p>
                </div>

                <!-- Benefit Card 4 -->
                <div class="card-premium p-6 space-y-4">
                    <div class="w-12 h-12 rounded-[14px] bg-[var(--color-primary-soft)] text-[var(--color-primary)] flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    </div>
                    <h3 class="font-heading font-bold text-xl text-[var(--color-secondary)]">Keahlian Praktik Lapangan</h3>
                    <p class="text-sm text-[var(--color-text-muted)] leading-relaxed">
                        Peserta berlatih menggunakan manekin simulator CPR, balut perban, tandu evakuasi, dan obat-obatan darurat standar industri.
                    </p>
                </div>

                <!-- Benefit Card 5 -->
                <div class="card-premium p-6 space-y-4">
                    <div class="w-12 h-12 rounded-[14px] bg-[var(--color-primary-soft)] text-[var(--color-primary)] flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    </div>
                    <h3 class="font-heading font-bold text-xl text-[var(--color-secondary)]">Manajemen Fasilitas P3K</h3>
                    <p class="text-sm text-[var(--color-text-muted)] leading-relaxed">
                        Memberikan pemahaman standar inspeksi kotak P3K Tipe A/B/C, ruang pertolongan darurat, dan pencatatan buku log insiden.
                    </p>
                </div>

                <!-- Benefit Card 6 -->
                <div class="card-premium p-6 space-y-4">
                    <div class="w-12 h-12 rounded-[14px] bg-[var(--color-primary-soft)] text-[var(--color-primary)] flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="font-heading font-bold text-xl text-[var(--color-secondary)]">Waktu Tanggap Cepat</h3>
                    <p class="text-sm text-[var(--color-text-muted)] leading-relaxed">
                        Memangkas jeda waktu penanganan awal sebelum tim paramedis ambulans atau rumah sakit rujukan tiba di area kerja.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Silabus Materi Pelatihan Section -->
    <section id="materi" class="py-16 sm:py-20 bg-[var(--color-surface-muted)] border-b border-[var(--color-border)]" aria-labelledby="materi-title">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14 space-y-3">
                <span class="text-xs font-heading font-bold uppercase tracking-wider text-[var(--color-primary)] block">MODUL &amp; SILABUS PEMBINAAN</span>
                <h2 id="materi-title" class="font-heading font-bold text-3xl sm:text-4xl text-[var(--color-secondary)]">
                    Materi Inti Pelatihan P3K
                </h2>
                <p class="text-base text-[var(--color-text-muted)]">
                    Kurikulum komprehensif yang memadukan teori anatomi dasar darurat dan 70% simulasi praktik langsung di lapangan.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Modul 1 -->
                <div class="p-6 rounded-[16px] bg-white border border-[var(--color-border)] space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-heading font-bold text-[var(--color-primary)] uppercase tracking-wider">MODUL 01</span>
                        <span class="text-[11px] font-sans px-2 py-0.5 rounded bg-[var(--color-surface-muted)] text-[var(--color-text-muted)]">Teori &amp; Praktik</span>
                    </div>
                    <h3 class="font-heading font-bold text-lg text-[var(--color-secondary)]">Dasar-Dasar P3K &amp; Prinsip Keselamatan</h3>
                    <p class="text-xs text-[var(--color-text-muted)] leading-relaxed">
                        Dasar hukum P3K di tempat kerja, prinsip keselamatan penolong (3A: Aman Diri, Aman Pasien, Aman Lingkungan), serta rantai keselamatan darurat.
                    </p>
                </div>

                <!-- Modul 2 -->
                <div class="p-6 rounded-[16px] bg-white border border-[var(--color-border)] space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-heading font-bold text-[var(--color-primary)] uppercase tracking-wider">MODUL 02</span>
                        <span class="text-[11px] font-sans px-2 py-0.5 rounded bg-[var(--color-primary-soft)] text-[var(--color-primary)] font-semibold">Simulasi Inti</span>
                    </div>
                    <h3 class="font-heading font-bold text-lg text-[var(--color-secondary)]">Bantuan Hidup Dasar (BHD / CPR)</h3>
                    <p class="text-xs text-[var(--color-text-muted)] leading-relaxed">
                        Teknik kompresi dada Resusitasi Jantung Paru (CPR), pembebasan jalan napas, penanganan tersedak (Heimlich maneuver), dan penggunaan AED bila tersedia.
                    </p>
                </div>

                <!-- Modul 3 -->
                <div class="p-6 rounded-[16px] bg-white border border-[var(--color-border)] space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-heading font-bold text-[var(--color-primary)] uppercase tracking-wider">MODUL 03</span>
                        <span class="text-[11px] font-sans px-2 py-0.5 rounded bg-[var(--color-surface-muted)] text-[var(--color-text-muted)]">Hands-On</span>
                    </div>
                    <h3 class="font-heading font-bold text-lg text-[var(--color-secondary)]">Pembalutan, Pembidaian &amp; Patah Tulang</h3>
                    <p class="text-xs text-[var(--color-text-muted)] leading-relaxed">
                        Pengendalian perdarahan masif dengan perban tekan, teknik balut mitela, pemasangan bidai fraktur tertutup/terbuka, dan penanganan dislokasi sendi.
                    </p>
                </div>

                <!-- Modul 4 -->
                <div class="p-6 rounded-[16px] bg-white border border-[var(--color-border)] space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-heading font-bold text-[var(--color-primary)] uppercase tracking-wider">MODUL 04</span>
                        <span class="text-[11px] font-sans px-2 py-0.5 rounded bg-[var(--color-surface-muted)] text-[var(--color-text-muted)]">Kasus Khusus</span>
                    </div>
                    <h3 class="font-heading font-bold text-lg text-[var(--color-secondary)]">Luka Bakar, Sengatan Listrik &amp; Bahan Kimia</h3>
                    <p class="text-xs text-[var(--color-text-muted)] leading-relaxed">
                        Klasifikasi derajat luka bakar, irigasi dekontaminasi paparan zat kimia berbahaya, penanganan syok listrik, dan stabilisasi korban hipotermia/heatstroke.
                    </p>
                </div>

                <!-- Modul 5 -->
                <div class="p-6 rounded-[16px] bg-white border border-[var(--color-border)] space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-heading font-bold text-[var(--color-primary)] uppercase tracking-wider">MODUL 05</span>
                        <span class="text-[11px] font-sans px-2 py-0.5 rounded bg-[var(--color-surface-muted)] text-[var(--color-text-muted)]">Simulasi Tim</span>
                    </div>
                    <h3 class="font-heading font-bold text-lg text-[var(--color-secondary)]">Evakuasi &amp; Transportasi Korban</h3>
                    <p class="text-xs text-[var(--color-text-muted)] leading-relaxed">
                        Teknik pengangkatan satu dan banyak penolong, penggunaan tandu sekop/lipat, stabilisasi cedera tulang belakang (cervical spine), dan rujukan darurat.
                    </p>
                </div>

                <!-- Modul 6 -->
                <div class="p-6 rounded-[16px] bg-white border border-[var(--color-border)] space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-heading font-bold text-[var(--color-primary)] uppercase tracking-wider">MODUL 06</span>
                        <span class="text-[11px] font-sans px-2 py-0.5 rounded bg-[var(--color-surface-muted)] text-[var(--color-text-muted)]">Manajemen K3</span>
                    </div>
                    <h3 class="font-heading font-bold text-lg text-[var(--color-secondary)]">Standarisasi Fasilitas &amp; Kotak P3K</h3>
                    <p class="text-xs text-[var(--color-text-muted)] leading-relaxed">
                        Penentuan jenis dan isi kotak P3K per unit kerja, pemeliharaan masa kedaluwarsa obat, pengelolaan ruang P3K, dan penyusunan berita acara insiden.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Target Peserta Section -->
    <section id="target" class="py-16 sm:py-20 bg-[var(--color-surface)] border-b border-[var(--color-border)]" aria-labelledby="target-title">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-6 space-y-6">
                    <span class="text-xs font-heading font-bold uppercase tracking-wider text-[var(--color-primary)] block">SIAPA YANG PERLU MENGIKUTI?</span>
                    <h2 id="target-title" class="font-heading font-bold text-3xl sm:text-4xl text-[var(--color-secondary)] leading-tight">
                        Dirancang untuk Berbagai Sektor Kerja &amp; Tim Operasional
                    </h2>
                    <p class="text-base text-[var(--color-text-muted)] leading-relaxed">
                        Program pelatihan ini ditujukan bagi personil yang ditunjuk perusahaan untuk bertanggung jawab atas keselamatan dan kesehatan kerja, serta staf umum yang ingin menguasai keterampilan darurat medis.
                    </p>

                    <div class="space-y-3 text-sm">
                        <div class="flex items-center gap-3 p-3 rounded-[12px] bg-[var(--color-surface-muted)] border border-[var(--color-border)]">
                            <span class="w-2.5 h-2.5 rounded-full bg-[var(--color-primary)] shrink-0"></span>
                            <span class="font-medium text-[var(--color-secondary)]">Petugas P3K tempat kerja yang ditunjuk manajemen</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 rounded-[12px] bg-[var(--color-surface-muted)] border border-[var(--color-border)]">
                            <span class="w-2.5 h-2.5 rounded-full bg-[var(--color-primary)] shrink-0"></span>
                            <span class="font-medium text-[var(--color-secondary)]">HSE Officer, Safety Inspector, &amp; Tim Tanggap Darurat (ERT)</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 rounded-[12px] bg-[var(--color-surface-muted)] border border-[var(--color-border)]">
                            <span class="w-2.5 h-2.5 rounded-full bg-[var(--color-primary)] shrink-0"></span>
                            <span class="font-medium text-[var(--color-secondary)]">Supervisor produksi, kepala gudang, &amp; pengawas lapangan</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 rounded-[12px] bg-[var(--color-surface-muted)] border border-[var(--color-border)]">
                            <span class="w-2.5 h-2.5 rounded-full bg-[var(--color-primary)] shrink-0"></span>
                            <span class="font-medium text-[var(--color-secondary)]">Pengelola gedung komersial, hotel, &amp; fasilitas publik</span>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-6">
                    <div class="card-premium p-8 bg-[var(--color-surface-muted)] space-y-6 border border-[var(--color-border)]">
                        <h3 class="font-heading font-bold text-xl text-[var(--color-secondary)]">
                            Standar Rasio Petugas P3K Perusahaan
                        </h3>
                        <p class="text-xs text-[var(--color-text-muted)] leading-relaxed">
                            Berdasarkan regulasi keselamatan kerja yang berlaku, perusahaan wajib menempatkan petugas P3K berlisensi dengan rasio yang proporsional sesuai tingkat bahaya kerja:
                        </p>

                        <div class="space-y-3 text-xs">
                            <div class="p-3 bg-white rounded-[10px] border border-[var(--color-border)] flex justify-between items-center">
                                <span class="font-semibold text-[var(--color-secondary)]">Tempat Kerja Potensi Bahaya Rendah</span>
                                <span class="font-heading font-bold text-[var(--color-primary)]">1 Petugas / 150 Pekerja</span>
                            </div>
                            <div class="p-3 bg-white rounded-[10px] border border-[var(--color-border)] flex justify-between items-center">
                                <span class="font-semibold text-[var(--color-secondary)]">Tempat Kerja Potensi Bahaya Tinggi</span>
                                <span class="font-heading font-bold text-[var(--color-primary)]">1 Petugas / 100 Pekerja</span>
                            </div>
                        </div>

                        <div class="p-4 rounded-[12px] bg-[var(--color-primary-soft)] border border-[#C2E4D8] text-xs text-[var(--color-primary)]">
                            <strong>Catatan:</strong> Pelatihan dapat diselenggarakan dalam format In-House Training langsung di lokasi perusahaan Anda di seluruh kota di Indonesia.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Alur Pelaksanaan Section -->
    <section id="proses" class="py-16 sm:py-20 bg-[var(--color-surface-muted)] border-b border-[var(--color-border)]" aria-labelledby="proses-title">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14 space-y-3">
                <span class="text-xs font-heading font-bold uppercase tracking-wider text-[var(--color-primary)] block">PROSES KERJASAMA</span>
                <h2 id="proses-title" class="font-heading font-bold text-3xl sm:text-4xl text-[var(--color-secondary)]">
                    4 Langkah Pelaksanaan Pelatihan P3K
                </h2>
                <p class="text-base text-[var(--color-text-muted)]">
                    Alur koordinasi transparan dari identifikasi kebutuhan hingga pembinaan selesai di lokasi Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Step 1 -->
                <div class="p-6 rounded-[16px] bg-white border border-[var(--color-border)] space-y-3 relative">
                    <span class="w-9 h-9 rounded-full bg-[var(--color-primary)] text-white flex items-center justify-center font-heading font-bold text-sm mb-2">1</span>
                    <h3 class="font-heading font-bold text-lg text-[var(--color-secondary)]">Konsultasi Kebutuhan</h3>
                    <p class="text-xs text-[var(--color-text-muted)] leading-relaxed">
                        Diskusi rencana pelatihan, profil sektor usaha, jumlah peserta, dan target tanggal pelaksanaan.
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="p-6 rounded-[16px] bg-white border border-[var(--color-border)] space-y-3 relative">
                    <span class="w-9 h-9 rounded-full bg-[var(--color-secondary)] text-white flex items-center justify-center font-heading font-bold text-sm mb-2">2</span>
                    <h3 class="font-heading font-bold text-lg text-[var(--color-secondary)]">Penyesuaian Modul</h3>
                    <p class="text-xs text-[var(--color-text-muted)] leading-relaxed">
                        Menyelaraskan skenario praktik darurat sesuai risiko bahaya spesifik pabrik, proyek, atau gedung Anda.
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="p-6 rounded-[16px] bg-white border border-[var(--color-border)] space-y-3 relative">
                    <span class="w-9 h-9 rounded-full bg-[var(--color-primary)] text-white flex items-center justify-center font-heading font-bold text-sm mb-2">3</span>
                    <h3 class="font-heading font-bold text-lg text-[var(--color-secondary)]">Konfirmasi Jadwal</h3>
                    <p class="text-xs text-[var(--color-text-muted)] leading-relaxed">
                        Penetapan tanggal, alokasi instruktur, logistik peralatan manekin, serta kesiapan fasilitas pelatihan.
                    </p>
                </div>

                <!-- Step 4 -->
                <div class="p-6 rounded-[16px] bg-white border border-[var(--color-border)] space-y-3 relative">
                    <span class="w-9 h-9 rounded-full bg-[var(--color-secondary)] text-white flex items-center justify-center font-heading font-bold text-sm mb-2">4</span>
                    <h3 class="font-heading font-bold text-lg text-[var(--color-secondary)]">Pelaksanaan &amp; Evaluasi</h3>
                    <p class="text-xs text-[var(--color-text-muted)] leading-relaxed">
                        Sesi praktik intensif, ujian kompetensi perorangan, dan penerbitan sertifikat bukti kelulusan.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Cakupan Wilayah Regional Section -->
    <section id="wilayah" class="py-16 sm:py-20 bg-[var(--color-surface)] border-b border-[var(--color-border)]" aria-labelledby="wilayah-title">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
                <div>
                    <span class="text-xs font-heading font-bold uppercase tracking-wider text-[var(--color-primary)] block mb-2">CAKUPAN WILAYAH</span>
                    <h2 id="wilayah-title" class="font-heading font-bold text-3xl sm:text-4xl text-[var(--color-secondary)]">
                        Layanan Pelatihan P3K di Kota &amp; Kabupaten
                    </h2>
                    <p class="text-sm text-[var(--color-text-muted)] mt-1 max-w-2xl">
                        Tim instruktur dan armada peralatan simulasi kami siap dimobilisasi ke fasilitas perusahaan Anda di berbagai kota dan kabupaten di Indonesia.
                    </p>
                </div>
                <div class="text-xs text-[var(--color-text-muted)] bg-[var(--color-surface-muted)] px-3 py-2 rounded-lg border border-[var(--color-border)] shrink-0">
                    Total 514 Kota/Kabupaten Terdata
                </div>
            </div>

            <!-- Regional Search Filter Widget -->
            <div class="mb-8" x-data="{ search: '' }">
                <div class="relative max-w-md">
                    <input 
                        type="text" 
                        id="city-search-input"
                        placeholder="Cari nama kota atau kabupaten..." 
                        class="w-full pl-10 pr-4 py-2.5 text-sm bg-[var(--color-background)] border border-[var(--color-border)] rounded-[14px] focus:outline-none focus:border-[var(--color-primary)] focus:ring-1 focus:ring-[var(--color-primary)]"
                        aria-label="Cari kota atau kabupaten"
                    >
                    <svg class="w-4 h-4 text-[var(--color-text-muted)] absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>

            <!-- Featured Cities Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3.5" id="city-list-container">
                @foreach($featuredCities as $city)
                    <a href="{{ route('city.landing', ['citySlug' => $city['slug']]) }}" class="city-card-item card-premium p-4 flex flex-col justify-between hover:border-[var(--color-primary)] hover:bg-[var(--color-primary-soft)] transition-colors group" data-name="{{ strtolower($city['name']) }}">
                        <div>
                            <span class="text-[10px] font-heading font-semibold uppercase px-1.5 py-0.5 rounded bg-[var(--color-surface-muted)] text-[var(--color-text-muted)] group-hover:bg-white inline-block mb-1.5">
                                {{ $city['type'] }}
                            </span>
                            <h3 class="font-heading font-bold text-sm text-[var(--color-secondary)] group-hover:text-[var(--color-primary)]">
                                {{ $city['raw_name'] }}
                            </h3>
                            <span class="text-[11px] text-[var(--color-text-muted)] block mt-0.5">
                                {{ $city['province'] }}
                            </span>
                        </div>
                        <span class="text-[11px] font-heading font-semibold text-[var(--color-primary)] mt-3 flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                            Info &rarr;
                        </span>
                    </a>
                @endforeach
            </div>

            <p class="text-xs text-[var(--color-text-muted)] mt-6 text-center">
                Memerlukan pelatihan di kota lain? Semua 514 kota dan kabupaten di 38 provinsi terhubung dalam basis data kami.
            </p>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-16 sm:py-20 bg-[var(--color-surface-muted)] border-b border-[var(--color-border)]" aria-labelledby="faq-title">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14 space-y-3">
                <span class="text-xs font-heading font-bold uppercase tracking-wider text-[var(--color-primary)] block">TANYA JAWAB UMUM</span>
                <h2 id="faq-title" class="font-heading font-bold text-3xl sm:text-4xl text-[var(--color-secondary)]">
                    Pertanyaan yang Sering Diajukan
                </h2>
                <p class="text-base text-[var(--color-text-muted)]">
                    Informasi penting seputar pelaksanaan, peserta, sertifikasi, dan persyaratan pelatihan P3K.
                </p>
            </div>

            <div class="space-y-4">
                <!-- FAQ 1 -->
                <div class="card-premium p-6 bg-white border border-[var(--color-border)]">
                    <h3 class="font-heading font-bold text-base text-[var(--color-secondary)] mb-2">
                        Siapa saja yang direkomendasikan mengikuti pelatihan P3K ini?
                    </h3>
                    <p class="text-sm text-[var(--color-text-muted)] leading-relaxed">
                        Pelatihan ini terbuka untuk personil HSE/K3, petugas P3K yang ditunjuk oleh perusahaan, staf operasional pabrik, pengawas lapangan, satpam/security, guru/dosen, serta masyarakat umum yang ingin memiliki keahlian respons darurat medis.
                    </p>
                </div>

                <!-- FAQ 2 -->
                <div class="card-premium p-6 bg-white border border-[var(--color-border)]">
                    <h3 class="font-heading font-bold text-base text-[var(--color-secondary)] mb-2">
                        Berapa lama durasi pelatihan P3K berlangsung?
                    </h3>
                    <p class="text-sm text-[var(--color-text-muted)] leading-relaxed">
                        Durasi pelatihan berkisar antara 1 hingga 3 hari tergantung pada paket program yang dipilih (Dasar, Lanjutan, atau Sertifikasi K3 Khusus Tempat Kerja). Jadwal dan jam pelatihan diselaraskan dengan kebutuhan operasional perusahaan.
                    </p>
                </div>

                <!-- FAQ 3 -->
                <div class="card-premium p-6 bg-white border border-[var(--color-border)]">
                    <h3 class="font-heading font-bold text-base text-[var(--color-secondary)] mb-2">
                        Apakah materi pelatihan dapat disesuaikan dengan risiko spesifik perusahaan?
                    </h3>
                    <p class="text-sm text-[var(--color-text-muted)] leading-relaxed">
                        Ya. Kami dapat menyesuaikan fokus simulasi kasus berdasarkan matriks bahaya utama di tempat kerja Anda, seperti risiko kimia berbahaya, kelistrikan, ruang tertutup (confined space), ketinggian, atau manufaktur berat.
                    </p>
                </div>

                <!-- FAQ 4 -->
                <div class="card-premium p-6 bg-white border border-[var(--color-border)]">
                    <h3 class="font-heading font-bold text-base text-[var(--color-secondary)] mb-2">
                        Bagaimana penentuan biaya pelatihan P3K?
                    </h3>
                    <p class="text-sm text-[var(--color-text-muted)] leading-relaxed">
                        Biaya disesuaikan secara transparan berdasarkan jumlah peserta, lokasi penyelenggaraan (In-House atau Public), tingkat materi, serta kebutuhan logistik peraga simulasi. Silakan ajukan konsultasi kebutuhan untuk penawaran resmi.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Final Consultation CTA Section -->
    <section id="konsultasi" class="py-16 sm:py-20 bg-[var(--color-secondary)] text-white" aria-labelledby="cta-title">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
            <span class="inline-block px-3 py-1 rounded-full bg-[var(--color-primary)] text-white text-xs font-heading font-semibold uppercase tracking-wider">
                LAYANAN IN-HOUSE &amp; KONSULTASI
            </span>
            <h2 id="cta-title" class="font-heading font-bold text-3xl sm:text-4xl text-white">
                Siapkan Tim Anda Menghadapi Keadaan Darurat Medis
            </h2>
            <p class="text-base text-[#94A3B8] max-w-2xl mx-auto leading-relaxed">
                Diskusikan kebutuhan pelatihan P3K untuk organisasi, pabrik, atau kantor Anda bersama tim kami. Dapatkan kurikulum simulasi yang relevan dengan risiko kerja harian.
            </p>

            <div class="max-w-xl mx-auto bg-[#132032] p-6 sm:p-8 rounded-[16px] border border-[#2A3B52] text-left">
                <h3 class="font-heading font-bold text-lg text-white mb-4 text-center">
                    Ajukan Permohonan Konsultasi Pelatihan
                </h3>
                <form onsubmit="event.preventDefault(); alert('Terima kasih. Permohonan konsultasi pelatihan P3K Anda telah dicatat. Koordinator kami akan segera menghubungi kontak Anda.');" class="space-y-4">
                    <div>
                        <label for="org_name" class="block text-xs font-medium text-[#94A3B8] mb-1">Nama Perusahaan / Organisasi</label>
                        <input type="text" id="org_name" required placeholder="PT Contoh Industri Nusantara" class="w-full px-3.5 py-2.5 rounded-[12px] bg-[#0A121D] border border-[#2A3B52] text-white text-sm focus:outline-none focus:border-[var(--color-primary)]">
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="contact_person" class="block text-xs font-medium text-[#94A3B8] mb-1">Nama PIC / Kontak</label>
                            <input type="text" id="contact_person" required placeholder="Bpk. Hendra Gunawan" class="w-full px-3.5 py-2.5 rounded-[12px] bg-[#0A121D] border border-[#2A3B52] text-white text-sm focus:outline-none focus:border-[var(--color-primary)]">
                        </div>
                        <div>
                            <label for="contact_channel" class="block text-xs font-medium text-[#94A3B8] mb-1">Email / Nomor Telepon</label>
                            <input type="text" id="contact_channel" required placeholder="hendra@perusahaan.co.id" class="w-full px-3.5 py-2.5 rounded-[12px] bg-[#0A121D] border border-[#2A3B52] text-white text-sm focus:outline-none focus:border-[var(--color-primary)]">
                        </div>
                    </div>
                    <div>
                        <label for="notes" class="block text-xs font-medium text-[#94A3B8] mb-1">Estimasi Peserta &amp; Wilayah Pelaksanaan</label>
                        <textarea id="notes" rows="2" placeholder="Contoh: 20 staf pabrik di Kawasan Industri Sidoarjo, estimasi bulan depan" class="w-full px-3.5 py-2.5 rounded-[12px] bg-[#0A121D] border border-[#2A3B52] text-white text-sm focus:outline-none focus:border-[var(--color-primary)]"></textarea>
                    </div>
                    <button type="submit" class="btn-primary w-full py-3 text-sm font-bold">
                        Kirim Permohonan Konsultasi
                    </button>
                    <p class="text-[11px] text-center text-[#94A3B8]">
                        Data Anda dijaga kerahasiaannya dan hanya digunakan untuk keperluan koordinasi pelatihan P3K.
                    </p>
                </form>
            </div>
        </div>
    </section>

    <!-- Client-side filter script for quick city lookup -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('city-search-input');
            const cityCards = document.querySelectorAll('.city-card-item');

            if (searchInput) {
                searchInput.addEventListener('input', function (e) {
                    const query = e.target.value.toLowerCase().trim();
                    cityCards.forEach(function (card) {
                        const name = card.getAttribute('data-name') || '';
                        if (name.includes(query)) {
                            card.style.display = 'flex';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            }
        });
    </script>
@endsection
