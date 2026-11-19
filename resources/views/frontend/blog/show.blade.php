@extends('layouts.frontend') @section('title', $post->tr('meta_title') ?: __('blog.meta.post_title', ['title' => $post->tr('title')]))
@section('description', $post->tr('meta_description') ?: ($post->tr('excerpt') ?: \Illuminate\Support\Str::limit(strip_tags((string)
    $post->tr('content')), 160)))
@section('page', 'blog')
@section('og_image', $post->getFirstMediaUrl('featured-image') ?: ($post->featured_image ?:
    asset('assets/frontend/images/blog-featured.jpg')))
@section('content')
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

        $content = (string) $post->tr('content');
        $toc = [];

        if (preg_match_all('/<h2\b[^>]*>(.*?)<\/h2>/is', $content, $matches)) {
            foreach ($matches[1] as $index => $heading) {
                $toc[] = ['id' => 'section-' . ($index + 1), 'title' => trim(strip_tags($heading))];
            }

            $counter = 0;
            $content = preg_replace_callback(
                '/<h2\b[^>]*>(.*?)<\/h2>/is',
                function ($match) use (&$counter) {
                    $counter++;

                    return '<h2 id="section-' .
                        $counter .
                        '" class="site-style-scroll-mt-28 site-heading">' .
                        $match[1] .
                        '</h2>';
                },
                $content,
            );
        }

        $heroImage = $post->getFirstMediaUrl('featured-image') ?: ($post->featured_image ?: $blogImages[0]);
    @endphp
    <x-frontend.page>
        <div
            class="position-fixed site-position-top-20 start-0 w-100 site-dimension-h-arbitrary-3px site-surface-bg-surface-container site-position-z-40 bg-white">
            <div class="h-100 bg-primary site-motion-transition-all site-motion-duration-150 site-dimension-w-0"
                id="readProgress"></div>
        </div>
        <section
            class="position-relative w-100 overflow-hidden site-surface-bg-canvas-base site-spacing-pt-32 site-responsive-md-spacing-pt-40 pb-5 site-responsive-md-spacing-pb-16 site-section site-section--dark">
            <div
                class="position-absolute site-style-top-40 start-50 translate-middle-x site-dimension-w-arbitrary-700px site-dimension-h-arbitrary-500px bg-primary bg-opacity-10 site-effect-blur-arbitrary-130px rounded-pill pe-none site-style-z-10">
            </div>
            <div
                class="position-absolute site-position-top-1-opacity-3 site-style-right-32 site-dimension-w-arbitrary-420px site-dimension-h-arbitrary-420px site-surface-bg-primary-fixed-dim-opacity-5 site-effect-blur-arbitrary-120px rounded-pill pe-none site-style-z-10">
            </div>
            <div
                class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <nav
                    class="d-flex flex-wrap align-items-center gap-2 site-type-font-label-md site-type-text-label-md text-body-secondary mb-3 text-secondary small fw-medium">
                    <a class="site-state-hover-color-text-primary-container site-motion-transition-colors site-accent-hover"
                        href="{{ route('home') }}">{{ __('blog.show.home') }}</a>
                    <span class="site-color-text-text-muted-opacity-60">/</span>
                    <a class="site-state-hover-color-text-primary-container site-motion-transition-colors site-accent-hover"
                        href="{{ route('blog.index') }}">{{ __('blog.show.blog') }}</a>
                    <span class="site-color-text-text-muted-opacity-60">/</span>
                    <span class="text-primary fw-semibold text-dark">{{ $post->category_label ?: __('blog.show.article') }}</span>
                </nav>
                <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                    <span
                        class="d-inline-flex align-items-center gap-1-5 site-spacing-px-3 py-1 rounded-pill site-surface-bg-primary-container-opacity-15 text-primary site-type-font-label-md site-type-text-label-md site-type-tracking-wider text-dark small fw-medium site-accent-component">
                        <span class="material-symbols-outlined fs-6">article</span> {{ __('blog.show.article') }}
                    </span>
                    @if ($post->category)
                        <span
                            class="site-spacing-px-2-5 py-1 rounded-pill site-surface-bg-surface-card text-body-secondary site-type-font-label-md site-type-text-label-md bg-white text-secondary small fw-medium">{{ $post->category_label }}</span>
                    @endif
                    <span
                        class="text-body-secondary site-type-text-caption site-type-font-caption d-none d-sm-inline-block text-secondary small fw-medium">•</span>
                    <span
                        class="text-body-secondary site-type-font-caption site-type-text-caption d-flex align-items-center gap-1 text-secondary small fw-medium">
                        <span class="material-symbols-outlined site-type-text-arbitrary-15px">schedule</span>
                        {{ __('blog.show.reading_time', ['minutes' => $post->read_time]) }}
                    </span>
                </div>
                <h1
                    class="site-type-font-display-xl site-type-text-display-xl site-color-text-primary site-dimension-max-w-5xl site-type-tracking-tight mb-3 site-type-leading-arbitrary-1-15 site-heading text-white">
                    {{ $post->tr('title') }}</h1>
                @if ($post->tr('excerpt'))
                    <p
                        class="site-type-font-body-lg site-type-text-body-lg text-body-secondary site-dimension-max-w-4xl site-type-leading-relaxed mb-4 site-copy text-secondary">
                        {{ $post->tr('excerpt') }}</p>
                @endif
                <div
                    class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 py-3 site-surface-bg-surface-card-opacity-60 site-effect-backdrop-blur-md px-3 rounded-4 site-elevation-shadow-sm bg-white">
                    <div class="d-flex align-items-center site-spacing-gap-3">
                        <div
                            class="position-relative site-dimension-w-11 site-dimension-h-11 rounded-pill overflow-hidden site-surface-bg-primary-container-opacity-20 d-flex align-items-center justify-content-center flex-shrink-0 site-accent-component">
                            <span class="material-symbols-outlined text-primary fs-4 text-dark">terminal</span>
                            <div
                                class="position-absolute bottom-0 end-0 site-dimension-w-3 site-dimension-h-3 site-surface-bg-success-whatsapp rounded-pill site-border-ring-2 site-border-ring-surface-card">
                            </div>
                        </div>
                        <div>
                            <div class="d-flex align-items-center gap-2">
                                <span
                                    class="site-type-font-title-md site-type-text-title-md site-color-text-primary lh-sm text-white">
                                    {{ __('blog.show.team') }}</span>
                            </div>
                            <p
                                class="site-type-font-caption site-type-text-caption text-body-secondary site-spacing-mt-0-5 site-copy text-secondary small fw-medium">
                                {{ __('blog.show.published', ['date' => optional($post->published_at)->format('d M Y') ?: '—']) }}
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2 flex-shrink-0">
                        <button
                            class="site-dimension-h-9 site-spacing-px-3 rounded-3 site-surface-bg-surface-container-high site-state-hover-surface-bg-surface-bright text-light site-type-font-label-md site-type-text-label-md d-flex align-items-center gap-1-5 site-motion-transition-all site-elevation-shadow-sm bg-white text-white small fw-medium"
                            type="button" onclick="shareOnFB()">
                            <span
                                class="material-symbols-outlined site-type-text-arbitrary-17px site-color-text-arbitrary-hex-1877f2">share</span>
                            <span class="d-none site-responsive-md-layout-inline">{{ __('blog.show.facebook') }}</span>
                        </button>
                        <a class="site-dimension-h-9 site-spacing-px-3 rounded-3 site-surface-bg-surface-container-high site-state-hover-surface-bg-surface-bright text-light site-type-font-label-md site-type-text-label-md d-flex align-items-center gap-1-5 site-motion-transition-all site-elevation-shadow-sm bg-white text-white small fw-medium"
                            href="https://wa.me/?text={{ urlencode($post->tr('title') . ' — ' . request()->url()) }}"
                            rel="noopener noreferrer" target="_blank">
                            <span
                                class="material-symbols-outlined site-type-text-arbitrary-17px site-color-text-success-whatsapp">chat</span>
                            <span class="d-none site-responsive-md-layout-inline">{{ __('blog.show.whatsapp') }}</span>
                        </a>
                        <button
                            class="site-dimension-h-9 site-spacing-px-3 rounded-3 site-surface-bg-surface-container-high site-state-hover-surface-bg-surface-bright text-light site-type-font-label-md site-type-text-label-md d-flex align-items-center gap-1-5 site-motion-transition-all site-elevation-shadow-sm bg-white text-white small fw-medium"
                            id="copyBtn" type="button" onclick="copyArticleUrl()">
                            <span
                                class="material-symbols-outlined site-type-text-arbitrary-17px text-primary text-dark">link</span>
                            <span id="copyText">{{ __('blog.show.copy_link') }}</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <section
            class="w-100 site-surface-bg-canvas-base position-relative site-spacing-py-8 py-md-5 site-section site-section--light">
            <div
                class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <div
                    class="position-relative w-100 rounded-4 overflow-hidden site-elevation-shadow-2xl site-surface-bg-surface-card bg-white">
                    <div
                        class="position-absolute top-0 end-0 bottom-0 start-0 site-surface-bg-gradient-to-t site-surface-from-canvas-base site-surface-via-transparent site-surface-to-transparent site-position-z-10 site-gradient-background">
                    </div>
                    <img class="w-100 site-dimension-h-arbitrary-280px site-responsive-md-dimension-h-arbitrary-440px site-responsive-lg-dimension-h-arbitrary-500px object-fit-cover site-media-object-center"
                        alt="{{ $post->tr('title') }}" src="{{ $heroImage }}" />
                </div>
            </div>
        </section>
        <section
            class="w-100 site-surface-bg-canvas-base position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--dark">
            <div
                class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <div class="d-grid site-layout-grid-cols-1 site-responsive-lg-layout-grid-cols-12 gap-4">
                    <article class="site-responsive-lg-layout-col-span-8 d-flex flex-column site-spacing-space-y-space-xl">
                        <div
                            class="rounded-4 site-surface-bg-surface-card-opacity-90 site-elevation-shadow-xl p-4 position-relative overflow-hidden bg-white">
                            <div class="position-absolute top-0 start-0 site-dimension-w-2 h-100 bg-primary"></div>
                            <div class="d-flex align-items-center gap-2-5 mb-2">
                                <span class="material-symbols-outlined text-primary fs-4 text-dark">lightbulb</span>
                                <h2
                                    class="site-type-font-headline-sm site-type-text-headline-sm site-color-text-primary site-heading text-white">
                                    {{ __('blog.show.at_a_glance') }}</h2>
                            </div>
                            <p
                                class="site-type-font-body-md site-type-text-body-md text-body-secondary site-type-leading-relaxed site-copy text-secondary">
                                {{ $post->tr('excerpt') ?: \Illuminate\Support\Str::limit(strip_tags($content), 220) }}</p>
                        </div>
                        <div
                            class="article-content text-body-secondary site-type-leading-relaxed site-spacing-space-y-5 site-state-arbitrary-h2-type-font-headline-md site-state-arbitrary-h2-type-text-headline-md site-state-arbitrary-h2-color-text-primary site-state-arbitrary-h2-type-font-bold site-state-arbitrary-h2-spacing-mt-10 site-state-arbitrary-h2-spacing-mb-3 site-state-arbitrary-h3-type-font-headline-sm site-state-arbitrary-h3-type-text-headline-sm site-state-arbitrary-h3-color-text-primary site-state-arbitrary-h3-type-font-semibold site-state-arbitrary-h3-spacing-mt-8 site-state-arbitrary-h3-spacing-mb-2 site-state-arbitrary-p-type-font-body-md site-state-arbitrary-p-type-text-body-md site-state-arbitrary-p-type-leading-relaxed site-state-arbitrary-ul-type-list-disc site-state-arbitrary-ul-spacing-pl-6 site-state-arbitrary-ul-spacing-space-y-2 site-state-arbitrary-ol-type-list-decimal site-state-arbitrary-ol-spacing-pl-6 site-state-arbitrary-ol-spacing-space-y-2 site-state-arbitrary-a-color-text-primary-container site-state-arbitrary-a-type-underline site-state-arbitrary-blockquote-border-border-l-2 site-state-arbitrary-blockquote-border-border-primary-container site-state-arbitrary-blockquote-spacing-pl-4 site-state-arbitrary-blockquote-type-italic site-state-arbitrary-img-shape-rounded-xl site-state-arbitrary-img-spacing-my-6 text-secondary">
                            @if (filled($content))
                                {!! $content !!}
                            @else
                                <p class="site-copy">{{ __('blog.show.content_empty') }}</p>
                            @endif
                        </div>
                        <div
                            class="p-4 rounded-4 site-surface-bg-surface-card-opacity-70 site-effect-backdrop-blur-md site-elevation-shadow-md site-spacing-space-y-space-sm bg-white">
                            <h3
                                class="site-type-font-headline-sm site-type-text-headline-sm site-color-text-primary d-flex align-items-center gap-2 site-heading text-white">
                                <span class="material-symbols-outlined text-primary text-dark">format_quote</span>
                                {{ __('blog.show.final_words') }}
                            </h3>
                            <p
                                class="site-type-font-body-md site-type-text-body-md text-body-secondary site-type-leading-relaxed site-copy text-secondary">
                                {{ __('blog.show.final_words_text') }}</p>
                            <div
                                class="site-spacing-pt-space-xs d-flex flex-wrap align-items-center justify-content-between gap-2">
                                <span
                                    class="site-type-font-label-md site-type-text-label-md text-primary text-dark small fw-medium">{{ __('blog.show.final_cta_label') }}</span>
                                <a class="d-inline-flex align-items-center gap-2 site-type-font-label-md site-type-text-label-md site-color-text-primary site-state-hover-color-text-primary-container site-motion-transition-colors text-white small fw-medium site-accent-hover site-content-action"
                                    href="https://wa.me/8801335198859" rel="noopener noreferrer" target="_blank">
                                    <span>{{ __('blog.show.message_directly') }}</span>
                                    <span class="material-symbols-outlined fs-6">arrow_forward</span>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap align-items-center gap-2 site-spacing-pt-space-xs">
                            <span
                                class="site-type-font-label-md site-type-text-label-md text-body-secondary text-secondary small fw-medium">{{ __('blog.show.tags') }}</span>
                            @if ($post->category)
                                <a class="site-spacing-px-3 py-1 rounded-pill site-surface-bg-surface-card text-body-secondary site-type-font-label-md site-type-text-label-md site-state-hover-surface-bg-surface-card-elevated site-state-hover-color-text-primary-container site-motion-transition-colors bg-white text-secondary small fw-medium site-accent-hover"
                                    href="{{ route('blog.index', ['category' => $post->category]) }}">#{{ $post->category_label }}</a>
                            @endif
                        </div>
                    </article>
                    <aside class="site-responsive-lg-layout-col-span-4 site-spacing-space-y-space-lg">
                        <div class="position-sticky site-position-top-28 site-spacing-space-y-space-lg">
                            @if (!empty($toc))
                                <div
                                    class="p-4 rounded-4 site-surface-bg-surface-card site-elevation-shadow-xl site-spacing-space-y-space-md bg-white">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h3
                                            class="site-type-font-title-md site-type-text-title-md site-color-text-primary d-flex align-items-center gap-2 site-heading text-white">
                                            <span
                                                class="material-symbols-outlined text-primary fs-5 text-dark">menu_book</span>
                                            {{ __('blog.show.toc_title') }}
                                        </h3>
                                        <span
                                            class="site-type-text-caption site-type-font-caption text-body-secondary text-secondary small fw-medium">{{ __('blog.show.toc_count', ['count' => count($toc)]) }}</span>
                                    </div>
                                    <ul
                                        class="site-spacing-space-y-space-sm site-type-font-body-sm site-type-text-body-sm text-body-secondary text-secondary fs-6 fw-medium">
                                        @foreach ($toc as $item)
                                            <li class="site-body-text">
                                                <a class="toc-link site-style-group d-flex align-items-start gap-2-5 site-state-hover-color-text-primary-container site-motion-transition-colors site-accent-hover"
                                                    href="#{{ $item['id'] }}">
                                                    <span
                                                        class="site-type-font-label-md site-type-text-label-md site-color-text-primary-container-opacity-80 site-spacing-mt-0-5 small fw-medium">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                                    <span class="site-type-leading-snug">{{ $item['title'] }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div
                                class="position-relative p-4 rounded-4 site-surface-bg-gradient-to-b site-surface-from-surface-card-elevated site-surface-to-surface-card site-elevation-shadow-2xl overflow-hidden site-gradient-background">
                                <div
                                    class="position-absolute site-style-top-12 site-style-right-12 site-dimension-w-32 site-dimension-h-32 site-surface-bg-primary-container-opacity-20 rounded-pill site-effect-blur-2xl">
                                </div>
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <span
                                        class="site-dimension-w-2-5 site-dimension-h-2-5 rounded-pill bg-primary site-motion-animate-pulse"></span>
                                    <span
                                        class="site-type-font-label-md site-type-text-label-md text-primary fw-semibold text-uppercase site-type-tracking-wider text-dark small">{{ __('blog.show.sidebar_label') }}</span>
                                </div>
                                <h3
                                    class="site-type-font-headline-sm site-type-text-headline-sm site-color-text-primary mb-2 site-heading text-white">
                                    {{ __('blog.show.sidebar_title') }}</h3>
                                <p
                                    class="site-type-font-body-sm site-type-text-body-sm text-body-secondary mb-3 site-type-leading-relaxed site-copy text-secondary fs-6 fw-medium">
                                    {{ __('blog.show.sidebar_description') }}</p>
                                <div class="site-spacing-space-y-space-xs">
                                    <a class="w-100 site-dimension-h-12 rounded-4 bg-primary site-color-text-text-inverse site-type-font-label-lg site-type-text-label-lg fw-bold d-flex align-items-center justify-content-center gap-2 site-state-hover-surface-bg-primary-fixed-dim site-motion-transition-all site-elevation-shadow-arbitrary-0-0-20px-rgba-198-244-50-0-3 text-black fs-6"
                                        href="https://wa.me/8801335198859" rel="noopener noreferrer" target="_blank">
                                        <span class="material-symbols-outlined fs-5">chat</span>
                                        <span>{{ __('blog.show.call_cta', ['phone' => __('site.phone')]) }}</span>
                                    </a>
                                    <a class="w-100 site-dimension-h-11 rounded-4 site-surface-bg-surface-container-high site-state-hover-surface-bg-surface-bright text-light site-type-font-label-md site-type-text-label-md d-flex align-items-center justify-content-center gap-2 site-motion-transition-colors bg-white text-white small fw-medium"
                                        href="{{ route('contact') }}">
                                        <span
                                            class="material-symbols-outlined site-type-text-arbitrary-18px text-primary text-dark">calculate</span>
                                        <span>{{ __('blog.show.quote_cta') }}</span>
                                    </a>
                                </div>
                            </div>
                            @if ($recentPosts->isNotEmpty())
                                <div
                                    class="p-4 rounded-4 site-surface-bg-surface-card site-elevation-shadow-xl site-spacing-space-y-space-md bg-white">
                                    <h3
                                        class="site-type-font-title-md site-type-text-title-md site-color-text-primary d-flex align-items-center gap-2 site-heading text-white">
                                        <span
                                            class="material-symbols-outlined text-primary fs-5 text-dark">local_fire_department</span>
                                        {{ __('blog.show.popular') }}
                                    </h3>
                                    <div class="site-spacing-space-y-space-md">
                                        @foreach ($recentPosts as $recent)
                                            @php $recentImage = $recent->getFirstMediaUrl('featured-image') ?: ($recent->featured_image ?: $blogImages[($loop->index + 1) % count($blogImages)]); @endphp
                                            <a class="site-style-group d-flex site-spacing-gap-3 align-items-center"
                                                href="{{ route('blog.show', $recent) }}">
                                                <div
                                                    class="site-dimension-w-16 site-dimension-h-16 rounded-4 overflow-hidden site-surface-bg-surface-default flex-shrink-0">
                                                    <img class="w-100 h-100 object-fit-cover site-state-group-hover-motion-scale-110 site-motion-transition-transform site-motion-duration-300"
                                                        alt="{{ $recent->tr('title') }}" src="{{ $recentImage }}" />
                                                </div>
                                                <div>
                                                    <span
                                                        class="site-type-text-caption site-type-font-caption text-primary d-block text-dark small fw-medium">{{ $recent->category_label ?: __('blog.show.blog_fallback') }}</span>
                                                    <h4
                                                        class="site-type-font-body-sm site-type-text-body-sm text-light site-state-group-hover-color-text-primary-container site-motion-transition-colors site-type-line-clamp-2 fw-medium site-heading text-white fs-6 ">
                                                        {{ $recent->tr('title') }}</h4>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <div
                                class="p-3 rounded-4 site-surface-bg-surface-default text-body-secondary site-type-font-body-sm site-type-text-body-sm site-spacing-space-y-2 text-secondary fs-6 fw-medium">
                                <div class="d-flex align-items-center gap-2 site-color-text-primary fw-medium text-white">
                                    <span
                                        class="material-symbols-outlined text-primary site-type-text-arbitrary-18px text-dark">support_agent</span>
                                    <span>{{ __('blog.show.office_visit') }}</span>
                                </div>
                                <p
                                    class="site-type-font-caption site-type-text-caption text-body-secondary site-type-leading-relaxed site-copy text-secondary small fw-medium">
                                    {!! __('blog.show.office_address') !!}</p>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
        @if ($relatedPosts->isNotEmpty())
            <section
                class="w-100 site-surface-bg-surface-default position-relative site-spacing-py-16 site-responsive-md-spacing-py-24 site-section site-section--light">
                <div
                    class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                    <div
                        class="d-flex flex-column flex-sm-row align-items-sm-end justify-content-between gap-2 site-spacing-mb-space-xl">
                        <div>
                            <span
                                class="site-type-font-label-md site-type-text-label-md text-primary text-uppercase site-type-tracking-wider d-block mb-1 text-dark small fw-medium">{{ __('blog.show.related_label') }}</span>
                            <h2
                                class="site-type-font-headline-lg site-type-text-headline-lg site-color-text-primary site-type-tracking-tight site-heading text-white">
                                {{ __('blog.show.related_title') }}</h2>
                        </div>
                        <a class="d-inline-flex align-items-center gap-1-5 site-type-font-label-lg site-type-text-label-lg text-primary site-state-hover-type-underline text-dark fs-6 site-content-action"
                            href="{{ route('blog.index') }}">
                            <span>{{ __('blog.show.related_view_all') }}</span>
                            <span class="material-symbols-outlined site-type-text-arbitrary-18px">arrow_forward</span>
                        </a>
                    </div>
                    <div class="d-grid site-layout-grid-cols-1 site-responsive-md-layout-grid-cols-3 gap-4">
                        @foreach ($relatedPosts as $related)
                            @php $relatedImage = $related->getFirstMediaUrl('featured-image') ?: ($related->featured_image ?: $blogImages[($loop->index + 2) % count($blogImages)]); @endphp
                            <article
                                class="rounded-4 site-surface-bg-surface-card overflow-hidden site-elevation-shadow-lg site-style-group site-state-hover-style-translate-y-1 site-motion-transition-all site-motion-duration-300 d-flex flex-column justify-content-between bg-white">
                                <a class="d-block position-relative site-media-aspect-arbitrary-16-opacity-10 overflow-hidden"
                                    href="{{ route('blog.show', $related) }}">
                                    <img class="w-100 h-100 object-fit-cover site-state-group-hover-motion-scale-105 site-motion-transition-transform site-motion-duration-500"
                                        alt="{{ $related->tr('title') }}" src="{{ $relatedImage }}" />
                                    @if ($related->category)
                                        <span
                                            class="position-absolute site-position-top-3 site-position-left-3 site-spacing-px-2-5 py-1 rounded-pill site-surface-bg-surface-card-elevated-opacity-90 site-effect-backdrop-blur-md text-primary site-type-text-xs bg-white text-dark small fw-medium">{{ $related->category_label }}</span>
                                    @endif
                                </a>
                                <div class="p-4">
                                    <a class="d-block site-state-group-hover-color-text-primary-container site-motion-transition-colors"
                                        href="{{ route('blog.show', $related) }}">
                                        <h3
                                            class="site-type-font-headline-sm site-type-text-headline-sm site-color-text-primary site-type-tracking-tight site-type-leading-snug site-heading text-white">
                                            {{ $related->tr('title') }}</h3>
                                    </a>
                                    <p
                                        class="site-type-font-body-sm site-type-text-body-sm text-body-secondary mt-2 site-type-leading-relaxed site-copy text-secondary fs-6 fw-medium">
                                        {{ \Illuminate\Support\Str::limit($related->tr('excerpt') ?: strip_tags((string) $related->tr('content')), 120) }}
                                    </p>
                                    <div
                                        class="mt-3 d-flex align-items-center justify-content-between site-type-font-caption site-type-text-caption text-body-secondary text-secondary small fw-medium">
                                        <span class="d-flex align-items-center gap-1"><span
                                                class="material-symbols-outlined fs-6">schedule</span>
                                            {{ __('blog.show.read_time_short', ['minutes' => $related->read_time]) }}</span>
                                        <span>{{ optional($related->published_at)->format('d M Y') }}</span>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    </x-frontend.page>
@endsection
