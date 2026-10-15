@extends('layouts.app')

@section('title', 'Artikel & Panduan P3K Tempat Kerja')
@section('meta_description', 'Kumpulan artikel edukatif, panduan regulasi K3, dan tips pertolongan pertama pada kecelakaan (P3K) di lingkungan industri dan perkantoran.')

@section('content')
<!-- Header Section -->
<section class="py-14 lg:py-18 bg-gradient-to-b from-[var(--color-surface)] to-[var(--color-background)] border-b border-[var(--color-border)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl space-y-4">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[var(--color-primary-soft)] border border-[#C2E4D8] text-[var(--color-primary)] text-xs font-heading font-semibold uppercase tracking-wider">
                Edukasi &amp; Literasi K3
            </span>
            <h1 class="font-heading font-bold text-3xl sm:text-4xl lg:text-5xl text-[var(--color-secondary)] leading-tight">
                Artikel &amp; Panduan P3K Tempat Kerja
            </h1>
            <p class="text-base text-[var(--color-text-muted)] leading-relaxed">
                Informasi otoritatif mengenai standar keselamatan kerja, pertolongan pertama medis darurat, kepatuhan regulasi Kemnaker RI, dan studi kasus penanganan insiden lapangan.
            </p>
        </div>
    </div>
</section>

<!-- Articles Grid Section -->
<section class="py-14 bg-[var(--color-background)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($articles as $article)
                <article class="card-premium flex flex-col justify-between overflow-hidden bg-white hover:shadow-md transition">
                    <div>
                        @if($article->featured_image)
                            <a href="{{ route('articles.show', $article->slug) }}" class="block h-48 overflow-hidden bg-slate-100">
                                <img
                                    src="/{{ ltrim($article->featured_image, '/') }}"
                                    alt="{{ $article->title }}"
                                    class="w-full h-full object-cover hover:scale-105 transition duration-300"
                                    loading="lazy"
                                >
                            </a>
                        @else
                            <div class="h-32 bg-gradient-to-br from-[var(--color-surface-muted)] to-[#E2E8F0] flex items-center justify-center text-[var(--color-primary)]">
                                <span class="font-heading font-bold text-2xl">+</span>
                            </div>
                        @endif

                        <div class="p-6 space-y-3">
                            <div class="flex items-center justify-between text-[11px] text-[var(--color-text-muted)]">
                                <span>{{ $article->published_at ? $article->published_at->format('d M Y') : $article->created_at->format('d M Y') }}</span>
                                @if($article->target_city_slug)
                                    <span class="px-2 py-0.5 rounded-full bg-[var(--color-primary-soft)] text-[var(--color-primary)] font-semibold font-heading">
                                        {{ $article->target_city_slug }}
                                    </span>
                                @endif
                            </div>

                            <h2 class="font-heading font-bold text-lg text-[var(--color-secondary)] hover:text-[var(--color-primary)] transition leading-snug">
                                <a href="{{ route('articles.show', $article->slug) }}">
                                    {{ $article->title }}
                                </a>
                            </h2>

                            @if($article->excerpt)
                                <p class="text-xs text-[var(--color-text-muted)] leading-relaxed line-clamp-3">
                                    {{ $article->excerpt }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="p-6 pt-0">
                        <a href="{{ route('articles.show', $article->slug) }}" class="text-xs font-heading font-bold text-[var(--color-primary)] hover:underline inline-flex items-center gap-1">
                            <span>Baca Selengkapnya</span>
                            <span>&rarr;</span>
                        </a>
                    </div>
                </article>
            @empty
                <div class="col-span-3 py-16 text-center text-[var(--color-text-muted)] space-y-3">
                    <p class="text-base font-heading font-semibold text-[var(--color-secondary)]">Belum ada artikel publik yang diterbitkan.</p>
                    <p class="text-xs">Silakan kunjungi kembali nanti untuk mendapatkan panduan dan informasi terkini seputar P3K.</p>
                    <a href="{{ route('home') }}" class="btn-primary text-xs py-2.5 px-5 inline-block">
                        Kembali ke Beranda
                    </a>
                </div>
            @endforelse
        </div>

        @if($articles->hasPages())
            <div class="mt-10">
                {{ $articles->links() }}
            </div>
        @endif
    </div>
</section>
@endsection
