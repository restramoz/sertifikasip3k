@extends('layouts.app')

@section('title', $article->seo_title ?: $article->title)
@section('meta_description', $article->meta_description ?: ($article->excerpt ?: Str::limit(strip_tags($article->content), 155)))

@push('schema')
{{-- Structured Article Schema --}}
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "Article",
  "headline": {{ json_encode($article->title) }},
  "description": {{ json_encode($article->meta_description ?: $article->excerpt) }},
  "datePublished": "{{ $article->published_at ? $article->published_at->toIso8601String() : $article->created_at->toIso8601String() }}",
  "dateModified": "{{ $article->updated_at->toIso8601String() }}",
  @if($article->featured_image)
  "image": ["{{ url('/' . ltrim($article->featured_image, '/')) }}"],
  @endif
  "author": {
    "@@type": "Organization",
    "name": "Tim Instruktur Pelatihan P3K"
  },
  "publisher": {
    "@@type": "Organization",
    "name": "{{ config('app.name', 'Pelatihan P3K') }}",
    "url": "{{ url('/') }}"
  }
}
</script>

@if(!empty($article->faqs) && is_array($article->faqs))
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "FAQPage",
  "mainEntity": [
    @foreach($article->faqs as $i => $faq)
    {
      "@@type": "Question",
      "name": {{ json_encode($faq['q'] ?? '') }},
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": {{ json_encode($faq['a'] ?? '') }}
      }
    }{{ !$loop->last ? ',' : '' }}
    @endforeach
  ]
}
</script>
@endif
@endpush

@section('content')
<!-- Breadcrumbs -->
<nav class="bg-[var(--color-surface)] border-b border-[var(--color-border)] py-3 text-xs font-sans text-[var(--color-text-muted)]" aria-label="Breadcrumb">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center space-x-2 flex-wrap">
        <a href="{{ route('home') }}" class="hover:text-[var(--color-primary)] transition-colors">Beranda</a>
        <span class="text-[var(--color-border)]">/</span>
        <a href="{{ route('articles.index') }}" class="hover:text-[var(--color-primary)] transition-colors">Artikel</a>
        <span class="text-[var(--color-border)]">/</span>
        <span class="text-[var(--color-secondary)] font-semibold truncate max-w-xs">{{ $article->title }}</span>
    </div>
</nav>

<!-- Article Header Section -->
<article class="py-12 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <header class="space-y-4 mb-8">
            <div class="flex items-center gap-2 flex-wrap">
                <span class="px-3 py-1 rounded-full text-xs font-heading font-semibold bg-[var(--color-primary-soft)] text-[var(--color-primary)] border border-[#C2E4D8]">
                    PANDUAN MEDIS &amp; REGULASI K3
                </span>
                @if($targetCity)
                    <a href="{{ route('city.landing', $targetCity['slug']) }}" class="px-3 py-1 rounded-full text-xs font-heading font-semibold bg-[#F1F5F9] text-[var(--color-secondary)] hover:text-[var(--color-primary)] border border-[var(--color-border)] transition">
                        Wilayah {{ $targetCity['name'] }}
                    </a>
                @endif
            </div>

            <h1 class="font-heading font-bold text-2xl sm:text-4xl text-[var(--color-secondary)] leading-tight">
                {{ $article->title }}
            </h1>

            <div class="flex items-center gap-4 text-xs text-[var(--color-text-muted)] border-b border-[var(--color-border)] pb-4">
                <span>Diterbitkan: <strong>{{ $article->published_at ? $article->published_at->format('d F Y') : $article->created_at->format('d F Y') }}</strong></span>
                <span>&bull;</span>
                <span>Oleh: <strong>Tim Ahli K3 &amp; Medis</strong></span>
            </div>

            @if($article->excerpt)
                <p class="text-sm sm:text-base text-[var(--color-secondary)] leading-relaxed italic bg-[var(--color-surface-muted)] p-4 rounded-[12px] border-l-4 border-[var(--color-primary)]">
                    {{ $article->excerpt }}
                </p>
            @endif
        </header>

        <!-- Featured Image -->
        @if($article->featured_image)
            <div class="mb-8 rounded-[16px] overflow-hidden border border-[var(--color-border)] shadow-sm bg-slate-50">
                <img
                    src="/{{ ltrim($article->featured_image, '/') }}"
                    alt="{{ $article->title }}"
                    class="w-full h-auto max-h-[480px] object-cover"
                >
            </div>
        @endif

        <!-- Main Article Body Content (Sanitized) -->
        <div class="prose prose-slate max-w-none text-sm sm:text-base text-[var(--color-text)] leading-relaxed space-y-4">
            {!! $article->content !!}
        </div>

        <!-- FAQ Section if present -->
        @if(!empty($article->faqs) && is_array($article->faqs))
            <div class="mt-12 pt-8 border-t border-[var(--color-border)] space-y-4">
                <h2 class="font-heading font-bold text-xl text-[var(--color-secondary)]">
                    Tanya Jawab Terkait
                </h2>
                <div class="space-y-3">
                    @foreach($article->faqs as $i => $faq)
                        <div class="p-4 bg-[var(--color-surface-muted)] rounded-[12px] border border-[var(--color-border)] space-y-1.5">
                            <h3 class="font-heading font-bold text-sm text-[var(--color-secondary)]">
                                {{ $faq['q'] ?? '' }}
                            </h3>
                            <p class="text-xs text-[var(--color-text-muted)] leading-relaxed">
                                {{ $faq['a'] ?? '' }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Bottom Consultation Box -->
        <div class="mt-12 p-6 sm:p-8 rounded-[18px] bg-gradient-to-br from-[var(--color-secondary)] to-[#0A121D] text-white space-y-4">
            <span class="inline-block px-3 py-1 rounded-full bg-[var(--color-primary)] text-white text-[11px] font-heading font-semibold uppercase tracking-wider">
                PROGRAM IN-HOUSE TRAINING PERUSAHAAN
            </span>
            <h3 class="font-heading font-bold text-xl sm:text-2xl text-white">
                Tingkatkan Kesiapsiagaan Tim Tanggap Darurat P3K Anda
            </h3>
            <p class="text-xs sm:text-sm text-[#94A3B8] leading-relaxed max-w-2xl">
                Kami menyediakan pelatihan in-house bersertifikasi yang diselenggarakan langsung di fasilitas operasional, pabrik, atau gedung Anda dengan materi 70% simulasi praktik langsung.
            </p>
            <div class="pt-2 flex flex-wrap gap-3">
                <a href="{{ route('home') }}#konsultasi" class="btn-primary text-xs py-2.5 px-5 shadow-sm">
                    Konsultasi Kebutuhan Pelatihan
                </a>
                <a href="{{ route('articles.index') }}" class="btn-secondary text-xs py-2.5 px-5 bg-transparent border-white/20 text-white hover:bg-white/10">
                    &larr; Lihat Artikel Lainnya
                </a>
            </div>
        </div>
    </div>
</article>

<!-- Related Articles Section -->
@if($relatedArticles->isNotEmpty())
<section class="py-12 bg-[var(--color-surface-muted)] border-t border-[var(--color-border)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="font-heading font-bold text-xl text-[var(--color-secondary)] mb-6">
            Artikel P3K Rekomendasi Lainnya
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($relatedArticles as $rel)
                <div class="card-premium p-5 bg-white space-y-2 flex flex-col justify-between">
                    <div>
                        <span class="text-[10px] text-[var(--color-text-muted)]">
                            {{ $rel->published_at ? $rel->published_at->format('d M Y') : $rel->created_at->format('d M Y') }}
                        </span>
                        <h3 class="font-heading font-bold text-sm text-[var(--color-secondary)] hover:text-[var(--color-primary)] line-clamp-2 mt-1">
                            <a href="{{ route('articles.show', $rel->slug) }}">
                                {{ $rel->title }}
                            </a>
                        </h3>
                        @if($rel->excerpt)
                            <p class="text-xs text-[var(--color-text-muted)] line-clamp-2 mt-1">
                                {{ $rel->excerpt }}
                            </p>
                        @endif
                    </div>
                    <a href="{{ route('articles.show', $rel->slug) }}" class="text-xs font-heading font-bold text-[var(--color-primary)] pt-2 inline-flex items-center gap-1">
                        <span>Baca Artikel &rarr;</span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
