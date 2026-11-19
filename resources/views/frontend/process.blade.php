@extends('layouts.frontend') @section('title', __('process.meta.title'))
@section('description', __('process.meta.description'))
@section('page', 'process') @section('content')
@php
    $navNumbers = __('process.nav.step_numbers');
@endphp
<x-frontend.page class="site-spacing-pt-20"><div class="w-100 site-surface-bg-surface-default-opacity-80 site-effect-backdrop-blur-md position-sticky site-position-top-20 site-position-z-30 site-elevation-shadow-md">
        <div class="site-dimension-max-w-7xl mx-auto site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10 site-spacing-py-3 d-flex align-items-center justify-content-sm-between gap-3 overflow-x-auto site-type-text-xs site-type-font-label-md scroll-row small fw-medium">
            <div class="d-none d-md-flex align-items-center gap-2 text-primary flex-shrink-0 text-dark">
                <span class="site-dimension-w-2 site-dimension-h-2 rounded-pill bg-primary site-motion-animate-ping"></span>
                <span class="site-type-font-headline-sm text-uppercase site-type-tracking-wider site-type-text-arbitrary-11px small fw-medium">{{ __('process.nav.progress') }}</span>
            </div>
            <div class="d-flex align-items-center gap-4 flex-shrink-0 text-body-secondary text-secondary">
                @foreach (__('process.nav.steps') as $index => $navStep)
                <a class="d-flex align-items-center gap-1-5 site-state-hover-color-text-primary-fixed site-motion-transition-colors" href="#step-{{ $index + 1 }}">
                    <span class="site-dimension-w-5 site-dimension-h-5 rounded-pill site-surface-bg-surface-container d-flex align-items-center justify-content-center site-type-text-arbitrary-10px text-primary fw-bold bg-white text-dark small">{{ $navNumbers[$index] }}</span>
                    <span>{{ $navStep }}</span>
                </a>
                @if (! $loop->last)
                <span class="text-body-secondary text-secondary">/</span>
                @endif
                @endforeach
            </div>
            <div class="d-none d-lg-flex align-items-center gap-2 text-primary flex-shrink-0 text-dark">
                <span class="material-symbols-outlined fs-6">verified</span>
                <span>{{ __('process.nav.timeline_note') }}</span>
            </div>
        </div>
    </div><section class="position-relative w-100 overflow-hidden pt-5 site-responsive-md-spacing-pt-16 pb-5 site-responsive-md-spacing-pb-16 site-section site-section--dark">
        <div class="site-dimension-max-w-7xl mx-auto position-relative site-position-z-10 d-flex flex-column align-items-center text-center w-100 site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
            <div class="d-inline-flex align-items-center gap-2 px-3 site-spacing-py-1-5 rounded-pill site-surface-bg-surface-card-elevated site-elevation-shadow-lg mb-4 bg-white">
                <span class="text-primary site-type-text-sm text-dark fs-6 fw-medium">⚡</span>
                <span class="text-primary site-type-font-label-md site-type-text-xs fw-semibold site-type-tracking-wider text-uppercase text-dark small">{{ __('process.hero.badge') }}</span>
            </div>
            <h1 class="site-type-font-display-xl site-type-text-display-xl site-dimension-max-w-4xl text-light site-type-tracking-tight mb-4 site-heading text-white">
                <span class="text-primary text-dark">{{ __('process.hero.title_highlight') }}</span> {{ __('process.hero.title_rest') }}
            </h1>
            <p class="site-type-font-body-lg site-type-text-body-lg text-body-secondary site-dimension-max-w-2xl site-type-leading-relaxed site-spacing-mb-10 site-copy text-secondary"> {{ __('process.hero.description') }}
            </p>
            <div class="d-grid site-layout-grid-cols-2 site-responsive-sm-layout-grid-cols-4 gap-3 w-100 site-dimension-max-w-3xl">
                @foreach (__('process.hero.highlights') as $highlight)
                <div class="site-surface-bg-surface-card p-3 rounded-4 site-elevation-shadow-md d-flex align-items-center site-spacing-gap-3 bg-white">
                    <span class="material-symbols-outlined text-primary fs-4 lh-lg text-dark">{{ $highlight['icon'] }}</span>
                    <div class="text-start">
                        <div class="site-type-font-headline-sm site-type-text-sm text-light text-white fs-6 fw-medium">{{ $highlight['title'] }}</div>
                        <div class="site-type-font-caption site-type-text-caption text-body-secondary text-secondary small fw-medium">{{ $highlight['text'] }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section><section class="w-100 position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--light">
        <div class="site-dimension-max-w-7xl mx-auto d-flex flex-column gap-5 w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
            @foreach (__('process.steps') as $step)
            <div class="position-relative site-style-group site-surface-bg-surface-card rounded-4 p-4 site-responsive-sm-spacing-p-10 site-elevation-shadow-xl site-motion-transition-all site-motion-duration-300 site-state-hover-surface-bg-surface-card-elevated bg-white" id="{{ $step['id'] }}">
                <div class="d-grid site-layout-grid-cols-1 site-responsive-lg-layout-grid-cols-12 site-spacing-gap-8 align-items-center">
                    <div class="site-responsive-lg-layout-col-span-7 {{ $loop->even ? 'order-1 site-responsive-lg-layout-order-2' : '' }} d-flex flex-column site-spacing-gap-5">
                        <div class="d-flex align-items-center gap-3">
                            <span class="site-spacing-px-3-5 py-1 rounded-pill bg-primary site-color-text-text-inverse site-type-font-label-lg fw-bold site-type-text-xs text-uppercase site-type-tracking-wider text-black small"> {{ $step['badge'] }}
                            </span>
                            <span class="site-spacing-px-3 py-1 rounded-pill site-surface-bg-surface-container text-primary site-type-font-label-md site-type-text-xs d-flex align-items-center gap-1-5 bg-white text-dark small fw-medium">
                                <span class="material-symbols-outlined site-type-text-arbitrary-15px">{{ $step['meta_icon'] }}</span> {{ $step['meta'] }}
                            </span>
                        </div>
                        <h2 class="site-type-font-headline-lg site-type-text-headline-lg text-light site-heading text-white"> {{ $step['title'] }}
                            <span class="site-type-font-title-md text-body-secondary d-block site-type-text-lg fw-normal mt-1 text-secondary">{{ $step['title_en'] }}</span>
                        </h2>
                        <p class="site-type-font-body-md site-type-text-body-md text-body-secondary site-type-leading-relaxed site-copy text-secondary"> {{ $step['description'] }}
                        </p>
                        <ul class="d-flex flex-column site-spacing-gap-3 site-type-font-body-sm site-type-text-body-sm site-color-text-on-surface text-white fs-6 fw-medium">
                            @foreach ($step['points'] as $point)
                            <li class="d-flex align-items-start site-spacing-gap-3 site-surface-bg-surface-container-opacity-60 site-spacing-p-3 rounded-3 site-body-text bg-white">
                                <span class="material-symbols-outlined text-primary fs-5 flex-shrink-0 site-spacing-mt-0-5 text-dark">{{ $point['icon'] }}</span>
                                <span>{{ $point['text'] }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="site-responsive-lg-layout-col-span-5 {{ $loop->even ? 'order-2 site-responsive-lg-layout-order-1' : '' }} d-flex flex-column justify-content-center">
                        <div class="position-relative overflow-hidden rounded-4 site-surface-bg-surface-default p-2 site-elevation-shadow-2xl">
                            <img class="w-100 site-dimension-h-64 site-responsive-sm-dimension-h-72 object-fit-cover rounded-3" data-alt="{{ $step['image_alt'] }}" src="{{ asset('assets/frontend/images/' . $step['image']) }}"/>
                            <div class="position-absolute site-position-bottom-4 site-position-left-4 site-position-right-4 site-surface-bg-surface-card-opacity-90 site-effect-backdrop-blur-md site-spacing-p-3-5 rounded-3 d-flex align-items-center justify-content-between bg-white">
                                <div>
                                    <div class="site-type-text-xs text-body-secondary site-type-font-label-md text-secondary small fw-medium">{{ $step['deliverable_label'] }}</div>
                                    <div class="site-type-text-sm fw-semibold text-light text-white fs-6">{{ $step['deliverable'] }}</div>
                                </div>
                                <span class="material-symbols-outlined text-primary fs-4 lh-lg text-dark">{{ $step['deliverable_icon'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section><section class="w-100 site-surface-bg-surface-default-opacity-40 position-relative site-spacing-py-16 site-responsive-md-spacing-py-24 site-section site-section--dark">
        <div class="site-dimension-max-w-7xl mx-auto d-flex flex-column align-items-center w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
            <div class="text-center site-dimension-max-w-2xl mb-5">
                <span class="text-primary site-type-font-label-md site-type-text-xs fw-semibold text-uppercase site-type-tracking-wider d-block mb-2 text-dark small">{{ __('process.why.badge') }}</span>
                <h2 class="site-type-font-headline-lg site-type-text-headline-lg text-light mb-3 site-heading text-white"> {{ __('process.why.title') }}
                </h2>
                <p class="site-type-font-body-md site-type-text-body-md text-body-secondary site-copy text-secondary"> {{ __('process.why.description') }}
                </p>
            </div>
            <div class="d-grid site-layout-grid-cols-1 site-responsive-md-layout-grid-cols-3 gap-4 w-100">
                @foreach (__('process.why.cards') as $card)
                <div class="site-surface-bg-surface-card site-spacing-p-8 rounded-4 site-elevation-shadow-xl d-flex flex-column justify-content-between site-state-hover-surface-bg-surface-card-elevated site-motion-transition-all site-motion-duration-300 bg-white">
                    <div>
                        <div class="site-dimension-w-14 site-dimension-h-14 rounded-4 bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center mb-4 text-dark site-accent-component">
                            <span class="material-symbols-outlined site-type-text-3xl">{{ $card['icon'] }}</span>
                        </div>
                        <h3 class="site-type-font-headline-sm site-type-text-headline-sm text-light site-spacing-mb-3 site-heading text-white"> {{ $card['title'] }}
                        </h3>
                        <p class="site-type-font-body-sm site-type-text-body-sm text-body-secondary site-type-leading-relaxed mb-4 site-copy text-secondary fs-6 fw-medium"> {{ $card['text'] }}
                        </p>
                    </div>
                    <div class="pt-3 border-top site-border-border-border-subtle d-flex align-items-center justify-content-between site-type-text-xs text-primary site-type-font-label-md site-soft-border text-dark small fw-medium">
                        <span>{{ $card['footer'] }}</span>
                        <span class="material-symbols-outlined site-type-text-arbitrary-18px">{{ $card['footer_icon'] }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section><section class="w-100 position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--light">
        <div class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
            <div class="position-relative overflow-hidden site-surface-bg-gradient-to-r site-surface-from-surface-card site-surface-via-surface-card-elevated site-surface-to-surface-card site-shape-rounded-3xl site-spacing-p-8 site-responsive-sm-spacing-p-14 site-elevation-shadow-2xl d-flex flex-column flex-lg-row align-items-center justify-content-between site-spacing-gap-8 site-gradient-background">
                <div class="d-flex flex-column align-items-center align-items-lg-start text-center text-lg-start gap-3 site-dimension-max-w-2xl">
                    <div class="d-inline-flex align-items-center gap-2 site-spacing-px-3 py-1 rounded-pill bg-primary bg-opacity-10 text-primary site-type-font-label-md site-type-text-xs text-dark small fw-medium site-accent-component">
                        <span class="site-dimension-w-2 site-dimension-h-2 rounded-pill bg-primary site-motion-animate-pulse"></span>
                        <span>{{ __('process.cta.badge') }}</span>
                    </div>
                    <h2 class="site-type-font-headline-lg site-type-text-headline-lg text-light site-heading text-white"> {{ __('process.cta.title') }}
                    </h2>
                    <p class="site-type-font-body-md site-type-text-body-md text-body-secondary site-type-leading-relaxed site-copy text-secondary"> {{ __('process.cta.description') }}
                    </p>
                </div>
                <div class="d-flex flex-column flex-sm-row align-items-center gap-3 flex-shrink-0 w-100 site-responsive-lg-dimension-w-auto">
                    <a class="w-100 site-responsive-sm-dimension-w-auto d-inline-flex align-items-center justify-content-center site-spacing-px-8 py-3 bg-primary site-color-text-text-inverse site-type-font-headline-sm fs-6 fw-bold rounded-pill site-elevation-shadow-arbitrary-0-0-24px-rgba-197-243-49-0-35 site-state-hover-surface-bg-primary-fixed-dim site-state-hover-motion-scale-105 site-state-active-motion-scale-95 site-motion-transition-all text-black" href="{{ route('contact') }}">
                        <span class="material-symbols-outlined site-spacing-mr-2 fs-5">{{ __('process.cta.primary_icon') }}</span> {{ __('process.cta.primary') }}
                    </a>
                    <a class="w-100 site-responsive-sm-dimension-w-auto d-inline-flex align-items-center justify-content-center site-spacing-px-8 py-3 site-surface-bg-surface-container text-light site-type-font-headline-sm fs-6 fw-semibold rounded-pill site-state-hover-color-text-primary-fixed site-state-hover-surface-bg-surface-bright site-motion-transition-all bg-white text-white" href="{{ route('contact') }}">
                        <span class="material-symbols-outlined site-spacing-mr-2 fs-5">{{ __('process.cta.secondary_icon') }}</span> {{ __('process.cta.secondary') }}
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-frontend.page>
@endsection
