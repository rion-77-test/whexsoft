@extends('layouts.frontend') @section('title', __('blog.meta.title'))
@section('description', __('blog.meta.description'))
@section('page', 'blog') @section('content')
@php
    $blogImages = [
        asset('assets/frontend/images/blog-featured.jpg'),
        asset('assets/frontend/images/blog-1.jpg'),
        asset('assets/frontend/images/blog-2.jpg'),
        asset('assets/frontend/images/blog-3.jpg'),
        asset('assets/frontend/images/blog-4.jpg'),
        asset('assets/frontend/images/blog-5.jpg'),
        asset('assets/frontend/images/blog-6.jpg'),
        asset('assets/frontend/images/blog-cost.jpg'),
        asset('assets/frontend/images/blog-comparison.jpg'),
        asset('assets/frontend/images/blog-speed.jpg'),
    ];
    $isFiltered = $search !== '' || $activeCategory !== '';
    $featured = !$isFiltered && $posts->currentPage() === 1 ? $posts->first() : null;
    $gridPosts = $featured ? $posts->getCollection()->slice(1) : $posts->getCollection();
    $categoryLabels = $categories->mapWithKeys(fn ($c) => [$c->name => $c->tr('name')]);
@endphp
<x-frontend.page>
    <div
        class="position-absolute site-style-top-32 start-50 translate-middle-x site-dimension-w-arbitrary-850px site-dimension-h-arbitrary-450px bg-primary bg-opacity-10 site-effect-blur-arbitrary-130px rounded-pill pe-none site-style-z-10">
    </div>
    <div
        class="position-absolute site-position-top-arbitrary-35-percent site-style-right-48 site-dimension-w-arbitrary-600px site-dimension-h-arbitrary-500px site-surface-bg-tertiary-fixed-dim-opacity-5 site-effect-blur-arbitrary-150px rounded-pill pe-none site-style-z-10">
    </div>
    <div
        class="position-absolute site-position-bottom-20 site-style-left-48 site-dimension-w-arbitrary-650px site-dimension-h-arbitrary-550px site-surface-bg-primary-container-opacity-5 site-effect-blur-arbitrary-160px rounded-pill pe-none site-style-z-10">
    </div>
    <section
        class="w-100 position-relative site-spacing-pt-32 site-responsive-md-spacing-pt-40 pb-5 site-responsive-md-spacing-pb-16 site-section site-section--dark">
        <div
            class="site-dimension-max-w-7xl mx-auto d-flex flex-column align-items-center text-center w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
            <div
                class="d-inline-flex align-items-center gap-2 px-3 site-spacing-py-1-5 rounded-pill site-surface-bg-surface-card-elevated site-elevation-shadow-sm mb-3 bg-white">
                <span
                    class="site-dimension-w-2-5 site-dimension-h-2-5 rounded-pill bg-primary site-elevation-shadow-arbitrary-0-0-10px-hex-c6f432"></span>
                <span
                    class="site-type-font-label-md site-type-text-label-md text-primary site-type-tracking-wider text-uppercase text-dark small fw-medium">{{ __('blog.index.badge') }}</span>
            </div>
            <h1
                class="site-type-font-display-xl site-type-text-display-xl site-color-text-primary site-dimension-max-w-4xl site-type-tracking-tight mb-3 site-heading text-white">
                {{ __('blog.index.title') }}</h1>
            <p
                class="site-type-font-body-lg site-type-text-body-lg text-body-secondary site-dimension-max-w-2xl site-type-leading-relaxed site-spacing-mb-space-xl site-copy text-secondary">
                {{ __('blog.index.description') }}</p>
            <div class="w-100 site-dimension-max-w-4xl d-flex flex-column gap-3 align-items-center">
                <form class="w-100 position-relative" action="{{ route('blog.index') }}" method="GET">
                    @if ($activeCategory !== '')
                        <input name="category" type="hidden" value="{{ $activeCategory }}" />
                    @endif
                    <span
                        class="material-symbols-outlined position-absolute site-position-left-4 top-50 translate-middle-y text-body-secondary site-type-text-arbitrary-22px text-secondary">search</span>
                    <input
                        class="w-100 site-dimension-h-arbitrary-54px site-spacing-pl-12 site-spacing-pr-28 rounded-4 site-surface-bg-surface-default text-light site-state-placeholder-color-text-text-muted site-type-font-body-md site-type-text-body-md site-elevation-shadow-md site-state-focus-style-outline-none site-state-focus-surface-bg-surface-card site-motion-transition-all text-white"
                        name="q" value="{{ $search }}"
                        placeholder="{{ __('blog.index.search_placeholder') }}" type="text" />
                    <button
                        class="position-absolute site-position-right-2 top-50 translate-middle-y site-dimension-h-10 site-spacing-px-5 rounded-3 bg-primary site-color-text-text-inverse site-type-font-label-md site-type-text-label-md fw-bold site-state-hover-surface-bg-primary-fixed-dim site-motion-transition-colors text-black small"
                        type="submit">{{ __('blog.index.search_button') }}</button>
                </form>
                <div class="d-flex flex-wrap align-items-center justify-content-center gap-2 site-spacing-pt-space-xs">
                    <a class="site-spacing-px-5 py-2 rounded-pill site-type-font-label-lg site-type-text-label-lg site-motion-transition-all {{ $activeCategory === '' ? 'bg-primary site-color-text-text-inverse site-elevation-shadow-md' : 'site-surface-bg-surface-card text-body-secondary site-state-hover-color-text-text-primary site-state-hover-surface-bg-surface-card-elevated' }} site-accent-component text-black fs-6"
                        href="{{ route('blog.index', array_filter(['q' => $search])) }}">{{ __('blog.index.all_articles') }}</a>
                    @foreach ($categories as $category)
                        <a class="site-spacing-px-5 py-2 rounded-pill site-type-font-label-lg site-type-text-label-lg site-motion-transition-all {{ $activeCategory === $category->name ? 'bg-primary site-color-text-text-inverse site-elevation-shadow-md' : 'site-surface-bg-surface-card text-body-secondary site-state-hover-color-text-text-primary site-state-hover-surface-bg-surface-card-elevated' }} site-accent-component text-black fs-6"
                            href="{{ route('blog.index', array_filter(['category' => $category->name, 'q' => $search])) }}">{{ $category->tr('name') }}</a>
                    @endforeach
                </div>
                @if ($isFiltered)
                    <p class="site-type-text-xs text-body-secondary site-copy text-secondary small fw-medium">
                        @if ($search !== '')
                            «{{ $search }}»
                            @endif @if ($activeCategory !== '')
                                {{ __('blog.index.filter_category', ['category' => $categoryLabels[$activeCategory] ?? $activeCategory]) }}
                            @endif —
                            {{ __('blog.index.filter_count', ['count' => $posts->total()]) }}
                            <a class="text-primary site-state-hover-type-underline site-spacing-ml-1 text-dark"
                                href="{{ route('blog.index') }}">{{ __('blog.index.clear_filters') }}</a>
                    </p>
                @endif
            </div>
        </div>
    </section>
    @if ($featured)
        <section class="w-100 position-relative site-spacing-py-8 py-md-5 site-section site-section--light">
            <div
                class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <div
                    class="position-relative rounded-4 site-surface-bg-surface-card overflow-hidden site-elevation-shadow-xl site-style-group site-state-hover-elevation-shadow-2xl site-motion-transition-all site-motion-duration-300 bg-white">
                    <div
                        class="d-grid site-layout-grid-cols-1 site-responsive-lg-layout-grid-cols-12 align-items-stretch">
                        <div
                            class="site-responsive-lg-layout-col-span-7 p-4 site-responsive-lg-spacing-p-space-2xl d-flex flex-column justify-content-between site-position-z-10">
                            <div>
                                <div class="d-flex flex-wrap align-items-center gap-2-5 mb-3">
                                    <span
                                        class="d-inline-flex align-items-center gap-1-5 site-spacing-px-3 py-1 rounded-2 bg-primary site-color-text-text-inverse site-type-font-label-md site-type-text-label-md fw-bold text-uppercase site-type-tracking-wider text-black small">
                                        <span
                                            class="material-symbols-outlined site-type-text-arbitrary-15px">article</span>
                                        {{ __('blog.index.featured_badge') }}
                                    </span>
                                    @if ($featured->category)
                                        <span
                                            class="site-spacing-px-3 py-1 rounded-2 site-surface-bg-surface-card-elevated text-primary site-type-font-label-md site-type-text-label-md bg-white text-dark small fw-medium">{{ $categoryLabels[$featured->category] ?? $featured->category }}</span>
                                    @endif
                                </div>
                                <a class="d-block site-state-group-hover-color-text-primary-container site-motion-transition-colors"
                                    href="{{ route('blog.show', $featured) }}">
                                    <h2
                                        class="site-type-font-headline-lg site-type-text-headline-lg site-color-text-primary site-type-tracking-tight mb-3 lh-sm site-heading text-white">
                                        {{ $featured->tr('title') }}</h2>
                                </a>
                                <p
                                    class="site-type-font-body-lg site-type-text-body-lg text-body-secondary site-type-leading-relaxed mb-4 site-copy text-secondary">
                                    {{ \Illuminate\Support\Str::limit($featured->tr('excerpt') ?: strip_tags((string) $featured->tr('content')), 240) }}
                                </p>
                            </div>
                            <div class="pt-3 d-flex flex-wrap align-items-center justify-content-between gap-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div
                                        class="site-dimension-w-10 site-dimension-h-10 rounded-pill site-surface-bg-surface-card-elevated d-flex align-items-center justify-content-center text-primary site-type-font-title-md site-type-text-title-md bg-white text-dark">
                                        W</div>
                                    <div class="d-flex flex-column">
                                        <span
                                            class="site-type-font-title-md site-type-text-title-md text-light lh-sm text-white">{{ __('blog.index.team') }}</span>
                                        <span
                                            class="site-type-font-caption site-type-text-caption text-body-secondary text-secondary small fw-medium">{{ optional($featured->published_at)->format('d M Y') ?: __('blog.index.draft') }}
                                            •
                                            {{ __('blog.index.featured_read_time', ['minutes' => $featured->read_time]) }}</span>
                                    </div>
                                </div>
                                <a class="d-inline-flex align-items-center gap-2 site-dimension-h-11 px-4 rounded-4 bg-primary site-color-text-text-inverse site-type-font-label-lg site-type-text-label-lg fw-bold site-state-hover-surface-bg-primary-fixed-dim site-motion-transition-all site-elevation-shadow-md site-style-group-opacity-btn text-black fs-6"
                                    href="{{ route('blog.show', $featured) }}">
                                    <span>{{ __('blog.index.read_full') }}</span>
                                    <span
                                        class="material-symbols-outlined site-type-text-arbitrary-18px site-state-group-hover-opacity-btn-motion-translate-x-1 site-motion-transition-transform">arrow_forward</span>
                                </a>
                            </div>
                        </div>
                        <div
                            class="site-responsive-lg-layout-col-span-5 position-relative site-surface-bg-surface-card-elevated d-flex align-items-center justify-content-center p-4 overflow-hidden site-dimension-min-h-arbitrary-340px bg-white">
                            <div
                                class="position-absolute top-0 end-0 bottom-0 start-0 site-surface-bg-gradient-to-t site-surface-from-surface-card-opacity-90 site-surface-via-transparent site-surface-to-transparent site-position-z-10 d-lg-none site-gradient-background">
                            </div>
                            <a class="position-relative w-100 h-100 rounded-4 overflow-hidden site-elevation-shadow-lg site-state-group-hover-motion-scale-arbitrary-1-02 site-motion-transition-transform site-motion-duration-500 d-block"
                                href="{{ route('blog.show', $featured) }}">
                                <img alt="{{ $featured->tr('title') }}"
                                    class="w-100 h-100 site-dimension-min-h-arbitrary-300px object-fit-cover"
                                    src="{{ $featured->getFirstMediaUrl('featured-image') ?: ($featured->featured_image ?: $blogImages[0]) }}" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <section class="w-100 position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--dark">
        <div
            class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
            <div
                class="d-flex flex-column flex-md-row align-items-md-end justify-content-between gap-3 site-spacing-mb-space-xl">
                <div>
                    <span
                        class="site-type-font-label-md site-type-text-label-md text-primary text-uppercase site-type-tracking-wider text-dark small fw-medium">{{ __('blog.index.list_label') }}</span>
                    <h2
                        class="site-type-font-headline-md site-type-text-headline-md site-color-text-primary site-type-tracking-tight mt-1 site-heading text-white">
                        {{ $isFiltered ? __('blog.index.list_title_filtered') : __('blog.index.list_title_recent') }}
                    </h2>
                </div>
                <p
                    class="site-type-font-body-sm site-type-text-body-sm text-body-secondary site-dimension-max-w-md site-copy text-secondary fs-6 fw-medium">
                    {{ __('blog.index.list_description') }}</p>
            </div>
            @if ($gridPosts->isEmpty())
                <div
                    class="rounded-4 site-surface-bg-surface-card site-spacing-p-10 text-center text-body-secondary bg-white text-secondary">
                    {{ __('blog.index.empty') }}</div>
            @else
                <div
                    class="d-grid site-layout-grid-cols-1 site-responsive-md-layout-grid-cols-2 site-responsive-lg-layout-grid-cols-3 gap-4">
                    @foreach ($gridPosts as $post)
                        @php $image = $post->getFirstMediaUrl('featured-image') ?: ($post->featured_image ?: $blogImages[($loop->index + 1) % count($blogImages)]); @endphp
                        <article
                            class="d-flex flex-column site-surface-bg-surface-card rounded-4 overflow-hidden site-elevation-shadow-md site-state-hover-elevation-shadow-xl site-state-hover-style-translate-y-1 site-motion-transition-all site-motion-duration-300 site-style-group bg-white">
                            <div
                                class="position-relative w-100 site-media-aspect-arbitrary-16-opacity-10 site-surface-bg-surface-default overflow-hidden">
                                <a href="{{ route('blog.show', $post) }}">
                                    <img class="w-100 h-100 object-fit-cover site-state-group-hover-motion-scale-105 site-motion-transition-transform site-motion-duration-500"
                                        alt="{{ $post->tr('title') }}" src="{{ $image }}" />
                                </a>
                                @if ($post->category)
                                    <div
                                        class="position-absolute site-position-top-4 site-position-left-4 site-position-z-10">
                                        <span
                                            class="site-spacing-px-3 py-1 rounded-pill site-surface-bg-surface-card-elevated-opacity-90 site-effect-backdrop-blur-md text-primary site-type-font-label-md site-type-text-label-md site-elevation-shadow-sm bg-white text-dark small fw-medium">{{ $categoryLabels[$post->category] ?? $post->category }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="p-4 d-flex flex-column site-layout-flex-1 justify-content-between">
                                <div>
                                    <a class="d-block site-state-group-hover-color-text-primary-container site-motion-transition-colors"
                                        href="{{ route('blog.show', $post) }}">
                                        <h3
                                            class="site-type-font-headline-sm site-type-text-headline-sm site-color-text-primary site-type-tracking-tight site-spacing-mb-space-xs site-type-leading-snug site-heading text-white">
                                            {{ $post->tr('title') }}</h3>
                                    </a>
                                    <p
                                        class="site-type-font-body-sm site-type-text-body-sm text-body-secondary site-type-leading-relaxed mb-3 site-copy text-secondary fs-6 fw-medium">
                                        {{ \Illuminate\Support\Str::limit($post->tr('excerpt') ?: strip_tags((string) $post->tr('content')), 150) }}
                                    </p>
                                </div>
                                <div
                                    class="pt-2 d-flex align-items-center justify-content-between site-type-font-caption site-type-text-caption text-body-secondary text-secondary small fw-medium">
                                    <span class="d-flex align-items-center gap-1"><span
                                            class="material-symbols-outlined fs-6">schedule</span>
                                        {{ __('site.read_time', ['minutes' => $post->read_time]) }}</span>
                                    <span>{{ optional($post->published_at)->format('d M Y') }}</span>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div> {{ $posts->links('partials.frontend.pagination') }}
            @endif
        </div>
    </section>
    <section class="w-100 position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--light">
        <div
            class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
            <div
                class="site-surface-bg-gradient-to-r site-surface-from-surface-card-elevated site-surface-via-surface-card site-surface-to-surface-card-elevated site-spacing-p-8 p-lg-5 site-shape-rounded-3xl site-elevation-shadow-2xl position-relative overflow-hidden d-flex flex-column flex-md-row align-items-center justify-content-between site-spacing-gap-8 site-gradient-background">
                <div
                    class="position-absolute site-style-left-16 site-style-top-16 site-dimension-w-60 site-dimension-h-60 bg-primary bg-opacity-10 site-effect-blur-arbitrary-80px pe-none rounded-pill">
                </div>
                <div
                    class="d-flex flex-column gap-2 site-dimension-max-w-xl text-center text-md-start position-relative">
                    <span
                        class="site-type-font-label-md text-primary text-uppercase site-type-tracking-wider text-dark">{{ __('blog.index.cta_label') }}</span>
                    <h3 class="site-type-font-headline-md text-light site-heading text-white">
                        {{ __('blog.index.cta_title') }}</h3>
                    <p class="site-type-font-body-sm text-body-secondary site-copy text-secondary">
                        {{ __('blog.index.cta_description') }}</p>
                </div>
                <div
                    class="d-flex flex-column flex-sm-row align-items-center gap-3 flex-shrink-0 w-100 site-responsive-sm-dimension-w-auto position-relative">
                    <a class="w-100 site-responsive-sm-dimension-w-auto site-spacing-px-8 py-3 bg-primary site-color-text-text-inverse site-type-font-headline-sm fw-bold rounded-4 site-elevation-shadow-arbitrary-0-0-25px-rgba-197-243-49-0-3 site-state-hover-surface-bg-primary-fixed-dim site-state-hover-motion-scale-105 site-state-active-motion-scale-95 site-motion-transition-all text-center d-flex align-items-center justify-content-center gap-2 text-black"
                        href="{{ route('contact') }}">
                        <span class="material-symbols-outlined fs-5">calculate</span>
                        <span>{{ __('blog.index.cta_quote') }}</span>
                    </a>
                    <a class="w-100 site-responsive-sm-dimension-w-auto px-4 py-3 site-surface-bg-surface-card-elevated text-light site-type-font-headline-sm fw-semibold rounded-4 site-state-hover-surface-bg-surface-container-high site-motion-transition-all text-center d-flex align-items-center justify-content-center gap-2 bg-white text-white"
                        href="https://wa.me/8801335198859" rel="noopener noreferrer" target="_blank">
                        <span class="material-symbols-outlined fs-5 site-color-text-success-whatsapp">chat</span>
                        <span>{{ __('blog.index.cta_whatsapp') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-frontend.page>
@endsection
