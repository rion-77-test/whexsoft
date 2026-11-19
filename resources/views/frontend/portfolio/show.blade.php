@extends('layouts.frontend') 
@section('title', $project->tr('title') . ' | WhexSoft')
@section('description', $project->tr('summary') ?: __('portfolio.meta.show_description', ['project' => $projectTitle]))
@section('page', 'portfolio')
@section('og_image', $project->getFirstMediaUrl('project-image') ?:
asset('assets/frontend/images/project-ecommerce.jpg')) @section('content')

    @php
        $fallbackImage = asset('assets/frontend/images/project-ecommerce.jpg');

        // Real cover image only. The collection has a fallback URL, so check hasMedia() first
        $heroImage = $project->hasMedia('project-image') ? $project->getFirstMediaUrl('project-image') : null;

        $description = (string) $project->tr('description');
        $isHtml = strip_tags($description) !== $description;

        // Gallery images only (the cover now lives in the hero)
        $gallerySlides = $project->getMedia('project-gallery')->map(fn($media) => $media->getUrl())->values();

        $projectTitle = $project->tr('title');
        $projectSummary = $project->tr('summary');
    @endphp

    <x-frontend.page>
        {{-- Hero --}}
        <section
            class="w-100 position-relative overflow-hidden site-spacing-pt-32 site-responsive-md-spacing-pt-40 pb-5 site-responsive-md-spacing-pb-16 site-section site-section--dark">
            <div
                class="position-absolute site-style-top-32 end-0 site-dimension-w-arbitrary-600px site-dimension-h-arbitrary-400px bg-primary bg-opacity-10 site-effect-blur-arbitrary-120px rounded-pill pe-none">
            </div>
            <div
                class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <div
                    class="position-relative d-grid site-layout-grid-cols-1 {{ $heroImage ? 'site-responsive-lg-layout-grid-cols-2' : '' }} site-spacing-gap-10 site-responsive-lg-spacing-gap-16 align-items-center">
                    <div>
                        <nav aria-label="{{ __('portfolio.show.breadcrumb_label') }}"
                            class="d-flex flex-wrap align-items-center gap-2 site-type-text-sm site-color-text-slate-400 mb-4 text-secondary fs-6 fw-medium">
                            <a class="site-state-hover-color-text-white"
                                href="{{ route('home') }}">{{ __('portfolio.show.breadcrumb_home') }}</a>
                            <span class="material-symbols-outlined fs-6">chevron_right</span>
                            <a class="site-state-hover-color-text-white"
                                href="{{ route('portfolio.index') }}">{{ __('portfolio.show.breadcrumb_portfolio') }}</a>
                            <span class="material-symbols-outlined fs-6">chevron_right</span>
                            <span class="text-primary text-dark">{{ $projectTitle }}</span>
                        </nav>

                        @if ($project->projectCategory)
                            <x-frontend.eyebrow
                                class="d-inline-block">{{ $project->projectCategory->tr('name') }}</x-frontend.eyebrow>
                        @endif

                        <h1
                            class="site-type-font-heading site-type-text-4xl site-responsive-md-type-text-6xl site-type-font-extrabold text-white site-type-tracking-tight lh-sm site-spacing-mt-5 site-heading text-white">
                            {{ $projectTitle }}</h1>

                        @if ($project->summary)
                            <p
                                class="site-color-text-slate-300 fs-6 site-responsive-md-type-text-xl mt-4 site-type-leading-relaxed site-copy text-secondary">
                                {{ $projectSummary }}</p>
                        @endif

                        <div class="d-flex flex-column flex-sm-row site-spacing-gap-3 gap-sm-3 site-spacing-mt-8">
                            @if ($project->live_url)
                                <a class="d-inline-flex align-items-center justify-content-center gap-2 site-dimension-h-12 site-spacing-px-7 rounded-pill bg-primary site-color-text-arbitrary-hex-070a0e site-type-font-heading fw-bold site-state-hover-surface-bg-primary-fixed-dim site-motion-transition-all site-elevation-shadow-arbitrary-0-0-30px-rgba-197-243-49-0-25"
                                    href="{{ $project->live_url }}" rel="noopener noreferrer"
                                    target="_blank">{{ __('portfolio.show.live_site') }}<span
                                        class="material-symbols-outlined fs-5">open_in_new</span></a>
                            @endif
                            <a class="d-inline-flex align-items-center justify-content-center gap-2 site-dimension-h-12 site-spacing-px-7 rounded-pill site-surface-bg-white-opacity-5 border site-border-border-white-opacity-20 text-white site-type-font-heading fw-semibold site-state-hover-surface-bg-white-opacity-10 site-motion-transition-all site-white-tint site-soft-border text-white"
                                href="{{ route('contact') }}">{{ __('portfolio.show.talk_project') }}<span
                                    class="material-symbols-outlined fs-5 text-primary text-dark">arrow_forward</span></a>
                        </div>
                    </div>

                    @if ($heroImage)
                        <div class="position-relative">
                            <div
                                class="position-relative site-shape-rounded-3xl overflow-hidden border border-white border-opacity-10 site-surface-bg-arbitrary-hex-111722 site-elevation-shadow-2xl site-media-aspect-arbitrary-4-opacity-3 bg-white site-soft-border">
                                <img alt="{{ $projectTitle }}" class="w-100 h-100 object-fit-cover site-media-object-top"
                                    src="{{ $heroImage }}" />
                                <div
                                    class="position-absolute top-0 end-0 bottom-0 start-0 site-surface-bg-gradient-to-t site-surface-from-arbitrary-hex-070a0e-opacity-70 site-surface-via-transparent site-surface-to-transparent site-gradient-background">
                                </div>
                                <div
                                    class="position-absolute site-position-bottom-4 site-position-left-4 site-position-right-4 d-flex flex-wrap gap-2">
                                    <span
                                        class="d-inline-flex align-items-center gap-1-5 site-spacing-px-3 site-spacing-py-1-5 rounded-pill site-surface-bg-arbitrary-hex-070a0e-opacity-85 site-effect-backdrop-blur-md border site-border-border-primary-fixed-opacity-30 text-primary site-type-text-xs fw-medium bg-white text-dark small">
                                        <span
                                            class="material-symbols-outlined site-type-text-arbitrary-15px">verified</span>{{ $project->is_real_client ? __('portfolio.show.real_client') : __('portfolio.show.demo_concept') }}
                                    </span>
                                    @if ($project->service)
                                        <span
                                            class="d-inline-flex align-items-center gap-1-5 site-spacing-px-3 site-spacing-py-1-5 rounded-pill site-surface-bg-arbitrary-hex-070a0e-opacity-85 site-effect-backdrop-blur-md border site-border-border-primary-fixed-opacity-30 text-primary site-type-text-xs fw-medium bg-white text-dark small">
                                            <span
                                                class="material-symbols-outlined site-type-text-arbitrary-15px">check_circle</span>{{ $project->service->tr('title') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        @if ($gallerySlides->isNotEmpty())
            {{-- Project image gallery --}}
            <section class="w-100 position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--light">
                <div
                    class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                    <div class="project-gallery" data-project-gallery>

                        {{-- Main carousel --}}
                        <div class="project-main">
                            <div class="swiper project-main-swiper">
                                <div class="swiper-wrapper">
                                    @foreach ($gallerySlides as $url)
                                        <div class="swiper-slide">
                                            <button type="button" class="project-slide-btn"
                                                data-lightbox-open="{{ $loop->index }}"
                                                aria-label="{{ __('portfolio.show.gallery_zoom') }}">
                                                <img src="{{ $url }}"
                                                    alt="{{ __('portfolio.show.image_alt', ['project' => $projectTitle, 'number' => $loop->iteration]) }}"
                                                    @if (!$loop->first) loading="lazy" @endif>
                                                <span class="project-zoom-hint material-symbols-outlined">zoom_in</span>
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            @if ($gallerySlides->count() > 1)
                                <button type="button" class="project-nav project-nav-prev"
                                    aria-label="{{ __('portfolio.show.previous_image') }}">
                                    <span class="material-symbols-outlined">arrow_back</span>
                                </button>
                                <button type="button" class="project-nav project-nav-next"
                                    aria-label="{{ __('portfolio.show.next_image') }}">
                                    <span class="material-symbols-outlined">arrow_forward</span>
                                </button>

                                {{-- Thumbnails --}}
                                <div class="project-thumbs-wrap">
                                    <div class="swiper project-thumbs-swiper">
                                        <div class="swiper-wrapper">
                                            @foreach ($gallerySlides as $url)
                                                <div class="swiper-slide">
                                                    <img src="{{ $url }}"
                                                        alt="{{ __('portfolio.show.thumbnail_alt', ['number' => $loop->iteration]) }}"
                                                        loading="lazy">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>

            {{-- Lightbox --}}
            <div class="project-lightbox" id="project-lightbox" role="dialog" aria-modal="true"
                aria-label="{{ __('portfolio.show.lightbox_label') }}" hidden>
                <div class="project-lightbox-bar">
                    <span class="project-lightbox-count" data-lb-count></span>
                    <div class="d-flex gap-2">
                        <button type="button" class="lb-btn" data-lb-zoom-out
                            aria-label="{{ __('portfolio.show.zoom_out') }}">
                            <span class="material-symbols-outlined">zoom_out</span>
                        </button>
                        <button type="button" class="lb-btn" data-lb-zoom-in
                            aria-label="{{ __('portfolio.show.zoom_in') }}">
                            <span class="material-symbols-outlined">zoom_in</span>
                        </button>
                        <button type="button" class="lb-btn" data-lb-close aria-label="{{ __('portfolio.show.close') }}">
                            <span class="material-symbols-outlined">close</span>
                        </button>
                    </div>
                </div>

                <div class="swiper project-lightbox-swiper">
                    <div class="swiper-wrapper">
                        @foreach ($gallerySlides as $url)
                            <div class="swiper-slide">
                                <div class="swiper-zoom-container">
                                    <img src="{{ $url }}"
                                        alt="{{ __('portfolio.show.image_alt', ['project' => $projectTitle, 'number' => $loop->iteration]) }}"
                                        loading="lazy">
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if ($gallerySlides->count() > 1)
                        <button type="button" class="lb-btn lb-nav lb-nav-prev"
                            aria-label="{{ __('portfolio.show.previous_image') }}">
                            <span class="material-symbols-outlined">arrow_back</span>
                        </button>
                        <button type="button" class="lb-btn lb-nav lb-nav-next"
                            aria-label="{{ __('portfolio.show.next_image') }}">
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </button>
                    @endif
                </div>
            </div>
        @endif

        {{-- Walkthrough video --}}
        @if ($project->walkthrough_embed_url)
            <section class="w-100 position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--dark">
                <div
                    class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                    <div
                        class="site-shape-rounded-3xl site-surface-bg-arbitrary-hex-111722 border border-white border-opacity-10 site-spacing-p-5 site-responsive-sm-spacing-p-8 site-elevation-shadow-2xl bg-white site-soft-border">
                        <div class="d-flex flex-wrap align-items-start justify-content-between gap-3 site-spacing-mb-5">
                            <div>
                                <span
                                    class="d-inline-flex align-items-center gap-2 site-type-text-xs site-type-font-mono text-uppercase site-type-tracking-widest text-primary bg-primary bg-opacity-10 border site-border-border-primary-fixed-opacity-30 site-spacing-px-3-5 py-1 rounded-pill site-accent-component text-dark small fw-medium"><span
                                        class="material-symbols-outlined fs-6">play_circle</span>{{ __('portfolio.show.walkthrough_badge') }}</span>
                                <h2
                                    class="site-type-font-heading fs-4 lh-lg site-responsive-md-type-text-3xl site-type-font-extrabold text-white site-spacing-mt-3 site-heading text-white">
                                    {{ __('portfolio.show.walkthrough_title') }}</h2>
                                <p
                                    class="site-type-text-sm site-color-text-slate-300 mt-2 site-dimension-max-w-2xl site-copy text-secondary fs-6 fw-medium">
                                    {{ __('portfolio.show.walkthrough_description') }}</p>
                            </div>
                            <x-frontend.buttons.section :href="$project->project_walkthrough_url" :text="__('portfolio.show.watch_youtube')" rel="noopener noreferrer"
                                target="_blank" />
                        </div>

                        <div
                            class="ratio ratio-16x9 rounded-4 overflow-hidden border border-white border-opacity-10 site-surface-bg-arbitrary-hex-0a0e13 bg-white site-soft-border">
                            <iframe class="w-100 h-100" src="{{ $project->walkthrough_embed_url }}"
                                title="{{ __('portfolio.show.walkthrough_iframe_title', ['project' => $projectTitle]) }}"
                                loading="lazy"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        {{-- Details --}}
        <section class="w-100 position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--light">
            <div
                class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <div
                    class="d-grid site-layout-grid-cols-1 site-responsive-lg-layout-grid-cols-12 site-spacing-gap-8 align-items-start">

                    <div class="site-responsive-lg-layout-col-span-8 d-flex flex-column gap-4">
                        <div
                            class="rounded-4 site-surface-bg-arbitrary-hex-111722 border border-white border-opacity-10 p-4 site-responsive-sm-spacing-p-8 bg-white site-soft-border">
                            <h2
                                class="site-type-font-heading fs-4 lh-lg fw-bold text-white mb-3 d-flex align-items-center gap-2 site-heading text-white">
                                <span class="material-symbols-outlined text-primary text-dark">description</span>
                                {{ __('portfolio.show.description_heading') }}
                            </h2>
                            @if (filled($description))
                                <div
                                    class="site-color-text-slate-300 site-type-leading-relaxed site-spacing-space-y-4 site-state-arbitrary-h2-color-text-white site-state-arbitrary-h3-color-text-white site-state-arbitrary-h2-type-font-heading site-state-arbitrary-h3-type-font-heading site-state-arbitrary-a-color-text-primary-fixed site-state-arbitrary-ul-type-list-disc site-state-arbitrary-ul-spacing-pl-5 site-state-arbitrary-ol-type-list-decimal site-state-arbitrary-ol-spacing-pl-5 text-secondary">
                                    @if ($isHtml)
                                        {!! $description !!}
                                    @else
                                        {!! nl2br(e($description)) !!}
                                    @endif
                                </div>
                            @else
                                <p class="site-color-text-slate-300 site-type-leading-relaxed site-copy text-secondary">
                                    {{ $projectSummary ?: __('portfolio.show.description_empty') }}</p>
                            @endif
                        </div>

                    </div>

                    <aside class="site-responsive-lg-layout-col-span-4 d-flex flex-column gap-4">
                        <div
                            class="rounded-4 site-surface-bg-arbitrary-hex-111722 border border-white border-opacity-10 p-4 bg-white site-soft-border">
                            <h3
                                class="site-type-font-heading site-type-text-lg fw-bold text-white site-spacing-mb-5 site-heading text-white">
                                {{ __('portfolio.show.info_heading') }}</h3>
                            <dl class="site-spacing-space-y-4 site-type-text-sm fs-6 fw-medium mb-0">
                                <div
                                    class="d-flex align-items-start justify-content-between gap-3 border-bottom border-white border-opacity-10 site-spacing-pb-3 site-soft-border">
                                    <dt class="site-color-text-slate-400 text-secondary">
                                        {{ __('portfolio.show.info_category') }}</dt>
                                    <dd class="site-color-text-slate-100 text-end text-white mb-0">
                                        {{ $project->projectCategory?->tr('name') ?: '—' }}</dd>
                                </div>
                                <div
                                    class="d-flex align-items-start justify-content-between gap-3 border-bottom border-white border-opacity-10 site-spacing-pb-3 site-soft-border">
                                    <dt class="site-color-text-slate-400 text-secondary">
                                        {{ __('portfolio.show.info_service') }}</dt>
                                    <dd class="site-color-text-slate-100 text-end text-white mb-0">
                                        {{ $project->service?->tr('title') ?: '—' }}</dd>
                                </div>
                                <div
                                    class="d-flex align-items-start justify-content-between gap-3 border-bottom border-white border-opacity-10 site-spacing-pb-3 site-soft-border">
                                    <dt class="site-color-text-slate-400 text-secondary">
                                        {{ __('portfolio.show.info_client') }}</dt>
                                    <dd class="site-color-text-slate-100 text-end text-white mb-0">
                                        {{ $project->is_real_client ? __('portfolio.show.real_project') : __('portfolio.show.demo_concept') }}
                                    </dd>
                                </div>
                                <div class="d-flex align-items-start justify-content-between gap-3">
                                    <dt class="site-color-text-slate-400 text-secondary">
                                        {{ __('portfolio.show.info_live_site') }}</dt>
                                    <dd class="text-end mb-0">
                                        @if ($project->live_url)
                                            <a class="text-primary site-state-hover-type-underline text-dark"
                                                href="{{ $project->live_url }}" rel="noopener noreferrer"
                                                target="_blank">{{ __('portfolio.show.visit') }}</a>
                                        @else
                                            <span class="site-color-text-slate-100 text-white">—</span>
                                        @endif
                                    </dd>
                                </div>
                            </dl>
                        </div>

                        <div
                            class="rounded-4 site-surface-bg-gradient-to-b site-surface-from-arbitrary-hex-122218 site-surface-to-arbitrary-hex-0c1510 border site-border-border-primary-fixed-opacity-30 p-4 site-gradient-background">
                            <span
                                class="d-inline-flex align-items-center gap-2 text-primary site-type-font-mono site-type-text-xs text-uppercase site-type-tracking-widest text-dark small fw-medium"><span
                                    class="site-dimension-w-2 site-dimension-h-2 rounded-pill bg-primary site-motion-animate-pulse"></span>
                                {{ __('portfolio.show.quote_label') }}</span>
                            <h3
                                class="site-type-font-heading site-type-text-xl fw-bold text-white site-spacing-mt-3 site-heading text-white">
                                {{ __('portfolio.show.quote_title') }}</h3>
                            <p
                                class="site-type-text-sm site-color-text-slate-300 mt-2 site-type-leading-relaxed site-copy text-secondary fs-6 fw-medium">
                                {{ __('portfolio.show.quote_description') }}</p>
                            <div class="d-flex flex-column gap-2 site-spacing-mt-5">
                                <a class="d-inline-flex align-items-center justify-content-center gap-2 site-dimension-h-11 rounded-4 bg-primary site-color-text-arbitrary-hex-070a0e site-type-text-sm fw-bold site-state-hover-surface-bg-primary-fixed-dim site-motion-transition-all fs-6"
                                    href="{{ route('contact') }}">{{ __('portfolio.show.quote_cta') }}<span
                                        class="material-symbols-outlined site-type-text-arbitrary-18px">arrow_forward</span></a>
                                <a class="d-inline-flex align-items-center justify-content-center gap-2 site-dimension-h-11 rounded-4 site-surface-bg-arbitrary-hex-25d366 site-color-text-arbitrary-hex-070a0e site-type-text-sm fw-bold site-state-hover-style-brightness-110 site-motion-transition-all fs-6"
                                    href="https://wa.me/8801335198859" rel="noopener noreferrer" target="_blank"><span
                                        class="material-symbols-outlined site-type-text-arbitrary-18px">chat</span>{{ __('portfolio.show.whatsapp') }}</a>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </section>

        {{-- Related projects --}}
        @if ($relatedProjects->isNotEmpty())
            <section
                class="w-100 site-surface-bg-arbitrary-hex-0b0f14-opacity-70 border-top border-bottom border-white border-opacity-10 position-relative py-5 site-responsive-md-spacing-py-16 bg-white site-soft-border site-section site-section--dark">
                <div
                    class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                    <div
                        class="d-flex flex-column flex-sm-row align-items-sm-end justify-content-between gap-3 site-spacing-mb-10">
                        <div>
                            <x-frontend.eyebrow
                                class="d-inline-block">{{ __('portfolio.show.related_eyebrow') }}</x-frontend.eyebrow>
                            <h2
                                class="site-type-font-heading site-type-text-3xl site-responsive-md-type-text-4xl site-type-font-extrabold text-white mt-3 site-type-tracking-tight site-heading text-white">
                                {{ __('portfolio.show.related_title') }}</h2>
                        </div>
                        <x-frontend.buttons.section :href="route('portfolio.index')" :text="__('portfolio.show.related_view_all')" />
                    </div>

                    <div class="d-grid site-layout-grid-cols-1 site-responsive-md-layout-grid-cols-3 gap-4">
                        @foreach ($relatedProjects as $related)
                            <x-frontend.card.project :project="$related" />
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    </x-frontend.page>
@endsection
