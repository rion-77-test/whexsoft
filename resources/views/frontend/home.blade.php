@extends('layouts.frontend') @section('title', __('home.meta.title'))
@section('description', __('home.meta.description'))

@section('page', 'home')

@php
    $partners = [
        [
            'name' => 'Partner 1',
            'logo' => asset('assets/frontend/images/partners/76.png'),
        ],
        [
            'name' => 'Partner 2',
            'logo' => asset('assets/frontend/images/partners/Babycollectionbd-01.png'),
        ],
        [
            'name' => 'Partner 3',
            'logo' => asset('assets/frontend/images/partners/logo-png-1.png'),
        ],
        [
            'name' => 'Partner 4',
            'logo' => asset('assets/frontend/images/partners/Minutes-Academy-logo-blur-minutr-01.png'),
        ],
        [
            'name' => 'Partner 5',
            'logo' => asset('assets/frontend/images/partners/Screenshot-2026-02-22-160941-Copy-2.png'),
        ],
        [
            'name' => 'Partner 6',
            'logo' => asset('assets/frontend/images/partners/WhatsApp-Image-2026-04-30-at-8.59.18-PM.jpeg'),
        ],
    ];

    // Repeat so the loop always has enough slides to fill wide screens
    // Repeat until there are at least 16 slides
    $partnerSlides = $partners;
    while (count($partnerSlides) < 16) {
        $partnerSlides = array_merge($partnerSlides, $partners);
    }

@endphp

@section('content')
    <x-frontend.page class="home-page container-fluid p-0">
        {{-- Hero Section --}}
        <section
            class="home-hero position-relative w-100 site-dimension-min-h-arbitrary-100svh d-flex align-items-center overflow-hidden site-surface-bg-canvas-base site-section site-home-hero">
            <img alt="" aria-hidden="true"
                class="home-hero-image position-absolute top-0 end-0 bottom-0 start-0 w-100 h-100 object-fit-cover site-media-object-center"
                src="{{ asset('assets/frontend/images/hero.avif') }}" />
            <div
                class="position-absolute top-0 end-0 bottom-0 start-0 site-surface-bg-black-opacity-50 pe-none site-hero-overlay">
            </div>
            <div
                class="home-hero-content container-xxl position-relative site-position-z-10 w-100 site-dimension-max-w-7xl mx-auto site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10 site-spacing-pt-32 site-spacing-pb-24">
                <div class="site-dimension-max-w-3xl">
                    <div
                        class="home-hero-badge site-hero-badge d-inline-flex align-items-center gap-2-5 px-3 site-spacing-py-1-5 rounded-pill border site-border-border-border-subtle mb-4 site-soft-border">
                        <span class="site-dimension-w-2-5 site-dimension-h-2-5 rounded-pill bg-primary"></span>
                        <span
                            class="site-type-text-xs site-type-font-mono text-white fw-semibold site-type-tracking-wider text-white small">&nbsp;{{ __('home.hero.badge') }}</span>
                    </div>
                    <h1
                        class="site-type-font-heading site-type-text-4xl site-responsive-sm-type-text-5xl site-responsive-lg-type-text-7xl site-type-font-extrabold site-color-text-arbitrary-hex-070400 site-type-tracking-tight site-type-leading-arbitrary-1-15 mb-4 site-heading text-black">
                        {{ __('home.hero.title_before') }}
                        <span class="text-primary text-dark">{{ __('home.hero.title_highlight') }}</span>
                    </h1>
                    <p
                        class="fs-6 site-responsive-sm-type-text-lg site-responsive-lg-type-text-xl site-color-text-slate-200 site-dimension-max-w-2xl mb-4 site-type-leading-relaxed site-copy text-secondary">
                        {{ __('home.hero.description') }}</p>

                    {{-- Statistics --}}
                    <div class="d-flex flex-wrap gap-4 site-responsive-sm-spacing-gap-8 site-spacing-mb-8"
                        aria-label="{{ __('home.hero.stats_label') }}">
                        @foreach (__('home.hero.stats') as $stat)
                            <div>
                                <div
                                    class="site-type-font-heading site-type-text-3xl site-type-font-extrabold lh-1 text-dark">
                                    {{ $stat['number'] }}</div>
                                <div class="site-type-text-sm fw-medium mt-1 site-copy">{{ $stat['label'] }}</div>
                            </div>
                        @endforeach
                    </div>

                    <div class="d-flex flex-column flex-md-row gap-2 gap-md-4 hero-btn-wrapper">
                        <a class="justify-content-center w-100 site-responsive-sm-dimension-w-auto site-spacing-px-8 py-3 rounded-pill bg-primary site-color-text-arbitrary-hex-070a0e site-type-font-heading fs-6 fw-bold site-elevation-shadow-arbitrary-0-0-30px-rgba-197-243-49-0-35 site-state-hover-surface-bg-primary-fixed-dim site-state-hover-motion-scale-105 site-motion-transition-all d-flex align-items-center gap-2"
                            href="{{ route('contact') }}">
                            <span>{{ __('home.hero.cta_primary') }}</span>
                            <span class="material-symbols-outlined fs-5">arrow_forward</span>
                        </a>
                        <a class="justify-content-center w-100 site-responsive-sm-dimension-w-auto site-spacing-px-8 py-3 rounded-pill site-surface-bg-white-opacity-10 site-effect-backdrop-blur-md site-state-hover-surface-bg-white-opacity-15 border site-border-border-white-opacity-25 text-white site-type-font-heading fs-6 fw-semibold site-motion-transition-all d-flex align-items-center gap-2 site-white-tint site-soft-border text-white"
                            href="{{ route('portfolio.index') }}">
                            <span class="material-symbols-outlined text-primary fs-5 text-dark">play_circle</span>
                            <span>{{ __('home.hero.cta_secondary') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- Services Section --}}
        <section
            class="w-100 border-top border-bottom border-white border-opacity-10 site-surface-bg-arbitrary-hex-0b0f14-opacity-70 position-relative site-spacing-py-16 site-responsive-md-spacing-py-24 bg-white site-soft-border site-section site-section--light"
            id="services">
            <div
                class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <div
                    class="d-flex flex-column flex-md-row align-items-md-end justify-content-between site-spacing-mb-14 gap-4">
                    <div>
                        <x-frontend.eyebrow>{{ __('home.services.eyebrow') }}</x-frontend.eyebrow>
                        <h2
                            class="site-type-font-heading fs-3 lh-sm site-responsive-sm-type-text-4xl site-responsive-md-type-text-headline-lg site-type-font-extrabold text-white mt-3 site-heading text-white">
                            {{ __('home.services.title') }}</h2>
                        <p
                            class="site-color-text-slate-300 site-dimension-max-w-md site-type-text-sm site-responsive-sm-type-text-base site-copy text-secondary fs-6 fw-medium">
                            {{ __('home.services.description') }}</p>
                    </div>
                    <x-frontend.buttons.section :href="route('services.index')" :text="__('home.services.view_all')" />
                </div>
                @if ($services->isEmpty())
                    <div
                        class="rounded-4 border border-white border-opacity-10 site-surface-bg-arbitrary-hex-111722 site-spacing-p-8 text-center site-color-text-slate-300 bg-white site-soft-border text-secondary">
                        {{ __('home.services.empty') }}</div>
                @else
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach ($services as $service)
                            <x-frontend.card.service :service="$service" />
                        @endforeach
                    </div>
                @endif
            </div>
        </section>

        {{-- Latest Projects --}}
        <section
            class="w-100 border-top border-bottom border-white border-opacity-10 site-surface-bg-arbitrary-hex-0b0f14-opacity-80 position-relative site-spacing-py-16 site-responsive-md-spacing-py-24 bg-white site-soft-border site-section site-section--dark"
            id="portfolio">
            <div
                class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <div
                    class="d-flex flex-column flex-md-row align-items-md-end justify-content-between site-spacing-mb-14 gap-4">
                    <div>
                        <x-frontend.eyebrow>{{ __('home.portfolio.eyebrow') }}</x-frontend.eyebrow>
                        <h2
                            class="site-type-font-heading fs-3 lh-sm site-responsive-sm-type-text-4xl site-responsive-md-type-text-headline-lg site-type-font-extrabold text-white mt-3 site-heading text-white">
                            {{ __('home.portfolio.title') }}</h2>
                    </div>
                    <x-frontend.buttons.section :href="route('portfolio.index')" :text="__('home.portfolio.view_all')" />
                </div>
                @if ($projects->isEmpty())
                    <div
                        class="rounded-4 border border-white border-opacity-10 site-surface-bg-arbitrary-hex-111722 site-spacing-p-8 text-center site-color-text-slate-300 bg-white site-soft-border text-secondary">
                        {{ __('home.portfolio.empty') }}</div>
                @else
                    <div
                        class="d-grid site-layout-grid-cols-1 site-responsive-md-layout-grid-cols-2 site-responsive-lg-layout-grid-cols-3 site-spacing-gap-8">
                        @foreach ($projects as $project)
                            <x-frontend.card.project :project="$project" />
                        @endforeach
                    </div>
                @endif
            </div>
        </section>

        {{-- Why Choose Us --}}
        <section class="w-100 position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--light"
            id="why-us">
            <div
                class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <div><x-frontend.eyebrow>{{ __('home.why_us.eyebrow') }}</x-frontend.eyebrow>
                    <h2
                        class="site-type-font-heading fs-3 lh-sm site-responsive-sm-type-text-4xl site-responsive-md-type-text-headline-lg site-type-font-extrabold text-white mt-3 site-spacing-mb-8 site-heading text-white">
                        {{ __('home.why_us.title') }}</h2>
                </div>
                <div class="row g-4 align-items-center">
                    <div class="col-12 col-lg-7">
                        <div class="row row-cols-1 row-cols-sm-2 g-3">
                            @foreach (__('home.why_us.cards') as $card)
                                <x-frontend.card.why-us :icon="$card['icon']" :title="$card['title']"
                                    :text="$card['text']" />
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div
                            class="rounded-4 site-surface-bg-arbitrary-hex-111722 border site-border-border-white-opacity-15 p-2 site-elevation-shadow-2xl overflow-hidden site-style-group bg-white site-soft-border">
                            <div
                                class="rounded-4 overflow-hidden position-relative site-media-aspect-square site-surface-bg-arbitrary-hex-070a0e bg-white">
                                <img alt="{{ __('home.why_us.image_alt') }}"
                                    class="w-100 h-100 object-fit-cover site-state-group-hover-motion-scale-105 site-motion-transition-transform site-motion-duration-500"
                                    src="{{ asset('assets/frontend/images/brand-graphic.jpg') }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        {{-- Trusted Partners Section --}}
        <section
            class="w-100 position-relative site-spacing-py-16 site-responsive-md-spacing-py-24 site-section site-section--dark"
            id="partners">
            <div
                class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <div class="text-center site-dimension-max-w-3xl mx-auto site-spacing-mb-14">
                    <x-frontend.eyebrow>{{ __('home.partners.eyebrow') }}</x-frontend.eyebrow>
                    <h2
                        class="site-type-font-heading fs-3 lh-sm site-responsive-sm-type-text-4xl site-responsive-md-type-text-headline-lg site-type-font-extrabold mt-3 site-spacing-mb-3 site-heading">
                        {{ __('home.partners.title_before') }} <span
                            class="text-dark">{{ __('home.partners.title_highlight') }}</span>
                    </h2>
                    <p class="site-type-text-sm site-responsive-sm-type-text-base site-copy fs-6 fw-medium">
                        {{ __('home.partners.description') }}
                    </p>
                </div>
            </div>

            <div class="partners-carousel">
                <div class="swiper partners-swiper">
                    <div class="swiper-wrapper">
                        @foreach ($partnerSlides as $partner)
                            <div class="swiper-slide">
                                <div class="partner-card rounded-4 border border-white border-opacity-10 p-3">
                                    <img src="{{ $partner['logo'] }}" alt="{{ $partner['name'] }}"
                                        class="partner-logo rounded-3">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- Testimonials --}}
        @if ($testimonials->isNotEmpty())
            <section
                class="w-100 border-top border-bottom border-white border-opacity-10 site-surface-bg-arbitrary-hex-0b0f14-opacity-70 position-relative site-spacing-py-16 site-responsive-md-spacing-py-24 bg-white site-soft-border site-section site-section--light"
                id="testimonials">
                <div
                    class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                    <div class="text-center site-dimension-max-w-2xl mx-auto site-spacing-mb-14">
                        <x-frontend.eyebrow>{{ __('home.testimonials.eyebrow') }}</x-frontend.eyebrow>
                        <h2
                            class="site-type-font-heading fs-3 lh-sm site-responsive-sm-type-text-4xl site-responsive-md-type-text-headline-lg site-type-font-extrabold text-white mt-3 site-heading text-white">
                            {{ __('home.testimonials.title') }}</h2>
                    </div>
                    {{-- Carousel --}}

                    <div class="testimonial-carousel">
                        <div class="swiper testimonial-swiper">
                            <div class="swiper-wrapper">
                                @foreach ($testimonials as $testimonial)
                                    <div class="swiper-slide h-auto">
                                        <x-frontend.card.testimonial :testimonial="$testimonial" />
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="testimonial-pagination d-flex justify-content-center mt-4"></div>
                    </div>

                </div>
            </section>
        @endif

        {{-- Blog --}}
        <section
            class="w-100 border-top border-white border-opacity-10 site-surface-bg-arbitrary-hex-0b0f14-opacity-70 position-relative site-spacing-py-16 site-responsive-md-spacing-py-24 bg-white site-soft-border site-section site-section--dark"
            id="blog">
            <div
                class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-md-between gap-4 mb-5">
                    <div>
                        <x-frontend.eyebrow>{{ __('home.blog.eyebrow') }}</x-frontend.eyebrow>
                        <h2
                            class="site-type-font-heading fs-3 lh-sm site-responsive-sm-type-text-4xl site-responsive-md-type-text-headline-lg fw-bold text-white site-type-tracking-tight site-spacing-mt-3 site-heading text-white">
                            {{ __('home.blog.title') }}</h2>
                    </div>
                    <x-frontend.buttons.section :href="route('blog.index')" :text="__('home.blog.view_all')" />
                </div>
                @if ($posts->isEmpty())
                    <div
                        class="rounded-4 border border-white border-opacity-10 site-surface-bg-arbitrary-hex-111722 site-spacing-p-8 text-center site-color-text-slate-300 bg-white site-soft-border text-secondary">
                        {{ __('home.blog.empty') }}</div>
                @else
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                        @foreach ($posts as $post)
                            <x-frontend.card.blog :post="$post" />
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
        {{-- Contact Section --}}
        @include('partials.frontend.contact-section')

    </x-frontend.page>
@endsection
