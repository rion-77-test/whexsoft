@extends('layouts.frontend') @section('title', __('faq.meta.title'))
@section('description', __('faq.meta.description'))
@section('page', 'faq') @section('content')
@php
    $groups = __('faq.groups');
    $filters = __('faq.hero.filters');
@endphp
<x-frontend.page><div class="position-absolute site-position-top-10 start-50 translate-middle-x site-dimension-w-arbitrary-700px site-dimension-h-arbitrary-350px bg-primary bg-opacity-10 site-effect-blur-arbitrary-130px rounded-pill pe-none"></div><div class="position-absolute site-position-top-arbitrary-800px end-0 site-dimension-w-arbitrary-450px site-dimension-h-arbitrary-450px bg-glow-lime site-effect-blur-arbitrary-150px rounded-pill pe-none"></div><section class="position-relative w-100 site-spacing-pt-32 site-responsive-md-spacing-pt-40 pb-5 site-responsive-md-spacing-pb-16 site-section site-section--dark">
        <div class="site-dimension-max-w-4xl mx-auto text-center site-spacing-space-y-space-md w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
            <div class="d-inline-flex align-items-center gap-2 px-3 site-spacing-py-1-5 rounded-pill site-surface-bg-surface-card-elevated text-primary site-type-font-label-md site-type-text-label-md site-elevation-shadow-arbitrary-0-0-20px-rgba-198-244-50-0-15 mx-auto bg-white text-dark small fw-medium">
                <span class="material-symbols-outlined fs-6">help_center</span>
                <span>{{ __('faq.hero.badge') }}</span>
            </div>
            <h1 class="site-type-font-headline-lg site-type-text-headline-lg site-responsive-md-type-text-arbitrary-46px site-responsive-md-type-leading-arbitrary-56px text-light site-type-tracking-tight site-type-font-extrabold site-heading text-white"> {{ __('faq.hero.title') }}
            </h1>
            <p class="site-type-font-body-lg site-type-text-body-lg text-body-secondary site-dimension-max-w-2xl mx-auto site-copy text-secondary"> {{ __('faq.hero.description') }}
            </p>
            <div class="pt-3 site-dimension-max-w-2xl mx-auto">
                <div class="position-relative d-flex align-items-center site-surface-bg-surface-card rounded-4 site-elevation-shadow-xl site-motion-transition-all site-state-focus-within-elevation-shadow-arbitrary-0-0-28px-rgba-198-244-50-0-18 bg-white">
                    <div class="site-spacing-pl-space-md text-primary d-flex align-items-center justify-content-center text-dark">
                        <span class="material-symbols-outlined fs-4">search</span>
                    </div>
                    <input class="w-100 site-dimension-h-14 site-surface-bg-transparent px-3 site-type-font-body-md site-type-text-body-md text-light site-state-placeholder-color-text-text-muted site-state-focus-style-outline-none text-white" id="faqSearchInput" placeholder="{{ __('faq.hero.search_placeholder') }}" type="text"/>
                    <button class="d-none site-spacing-mr-3 site-spacing-p-1-5 rounded-3 text-body-secondary site-state-hover-color-text-text-primary site-state-hover-surface-bg-surface-card-elevated site-motion-transition-colors text-secondary" id="clearSearchBtn" type="button">
                        <span class="material-symbols-outlined site-type-text-arbitrary-18px">close</span>
                    </button>
                </div>
            </div>
            <div class="d-grid site-layout-grid-cols-2 site-responsive-sm-layout-grid-cols-4 site-spacing-gap-3 pt-4 site-dimension-max-w-3xl mx-auto">
                @foreach (__('faq.hero.chips') as $chip)
                <div class="site-spacing-p-3 rounded-4 site-surface-bg-surface-card text-start d-flex align-items-center site-spacing-gap-3 bg-white">
                    <div class="site-dimension-w-10 site-dimension-h-10 rounded-3 site-surface-bg-surface-card-elevated d-flex align-items-center justify-content-center text-primary bg-white text-dark">
                        <span class="material-symbols-outlined fs-5">{{ $chip['icon'] }}</span>
                    </div>
                    <div>
                        <div class="site-type-font-title-md site-type-text-title-md text-light fw-bold text-white">{{ $chip['title'] }}</div>
                        <div class="site-type-font-caption site-type-text-caption text-body-secondary text-secondary small fw-medium">{{ $chip['label'] }}</div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="pt-3 d-flex flex-wrap align-items-center justify-content-center gap-2">
                <button class="faq-filter-btn site-spacing-px-5 site-spacing-py-2-5 rounded-pill site-type-font-label-lg site-type-text-label-lg site-motion-transition-all site-motion-duration-200 bg-primary site-color-text-text-inverse fw-bold site-elevation-shadow-arbitrary-0-0-18px-rgba-198-244-50-0-3 text-black fs-6" data-category="all"> {{ $filters['all'] }}
                </button>
                <button class="faq-filter-btn site-spacing-px-5 site-spacing-py-2-5 rounded-pill site-type-font-label-lg site-type-text-label-lg site-motion-transition-all site-motion-duration-200 site-surface-bg-surface-card text-body-secondary site-state-hover-color-text-text-primary site-state-hover-surface-bg-surface-card-elevated bg-white text-secondary fs-6" data-category="timeline"> {{ $filters['timeline'] }}
                </button>
                <button class="faq-filter-btn site-spacing-px-5 site-spacing-py-2-5 rounded-pill site-type-font-label-lg site-type-text-label-lg site-motion-transition-all site-motion-duration-200 site-surface-bg-surface-card text-body-secondary site-state-hover-color-text-text-primary site-state-hover-surface-bg-surface-card-elevated bg-white text-secondary fs-6" data-category="pricing"> {{ $filters['pricing'] }}
                </button>
                <button class="faq-filter-btn site-spacing-px-5 site-spacing-py-2-5 rounded-pill site-type-font-label-lg site-type-text-label-lg site-motion-transition-all site-motion-duration-200 site-surface-bg-surface-card text-body-secondary site-state-hover-color-text-text-primary site-state-hover-surface-bg-surface-card-elevated bg-white text-secondary fs-6" data-category="infrastructure"> {{ $filters['infrastructure'] }}
                </button>
                <button class="faq-filter-btn site-spacing-px-5 site-spacing-py-2-5 rounded-pill site-type-font-label-lg site-type-text-label-lg site-motion-transition-all site-motion-duration-200 site-surface-bg-surface-card text-body-secondary site-state-hover-color-text-text-primary site-state-hover-surface-bg-surface-card-elevated bg-white text-secondary fs-6" data-category="support"> {{ $filters['support'] }}
                </button>
            </div>
        </div>
    </section><section class="w-100 position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--light">
        <div class="site-dimension-max-w-5xl mx-auto site-spacing-space-y-space-2xl w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10"><div class="faq-group site-spacing-space-y-space-md" data-group="timeline">
                @php $g = $groups['timeline']; $q = $g['q1']; @endphp
                <div class="d-flex align-items-center site-spacing-gap-3 pb-2">
                    <div class="site-dimension-w-8 site-dimension-h-8 rounded-3 site-surface-bg-surface-card-elevated text-primary d-flex align-items-center justify-content-center fw-bold site-type-font-label-md bg-white text-dark"> {{ $g['letter'] }}
                    </div>
                    <div class="d-flex flex-column">
                        <h2 class="site-type-font-headline-sm site-type-text-headline-sm text-light site-heading text-white">{{ $g['title'] }}</h2>
                        <span class="site-type-font-caption site-type-text-caption text-body-secondary text-secondary small fw-medium">{{ $g['description'] }}</span>
                    </div>
                </div>
                <div class="site-spacing-space-y-4">
                    <div class="faq-card site-surface-bg-surface-card rounded-4 site-motion-transition-all site-motion-duration-200 overflow-hidden bg-white" data-keywords="{{ $q['keywords'] }}">
                        <button class="faq-toggle w-100 p-4 text-start d-flex align-items-start justify-content-between gap-3 site-state-focus-style-outline-none">
                            <div class="d-flex align-items-start gap-3">
                                <span class="material-symbols-outlined text-primary fs-4 site-spacing-mt-0-5 flex-shrink-0 text-dark">{{ $q['icon'] }}</span>
                                <span class="site-type-font-title-md site-type-text-title-md text-light fw-semibold text-white">{{ $q['question'] }}</span>
                            </div>
                            <div class="site-dimension-w-8 site-dimension-h-8 rounded-pill site-surface-bg-surface-card-elevated d-flex align-items-center justify-content-center text-body-secondary flex-shrink-0 site-motion-transition-transform site-motion-duration-300 icon-arrow bg-white text-secondary">
                                <span class="material-symbols-outlined fs-5">expand_more</span>
                            </div>
                        </button>
                        <div class="faq-answer d-none px-4 pb-4 pt-0 text-body-secondary site-type-font-body-md site-type-text-body-md site-spacing-space-y-3 text-secondary">
                            <p class="site-copy"> {{ $q['lead'] }}
                            </p>
                            <div class="d-grid site-layout-grid-cols-1 site-responsive-sm-layout-grid-cols-2 site-spacing-gap-3 pt-2">
                                @foreach ($q['options'] as $option)
                                <div class="p-3 rounded-4 site-surface-bg-surface-default d-flex align-items-start site-spacing-gap-3">
                                    <span class="material-symbols-outlined text-primary fs-5 site-spacing-mt-0-5 text-dark">check_circle</span>
                                    <div>
                                        <div class="site-type-font-label-lg site-type-text-label-lg text-light fw-semibold text-white fs-6">{{ $option['title'] }}</div>
                                        <div class="site-type-font-caption site-type-text-caption text-body-secondary mt-1 text-secondary small fw-medium">{{ $option['text'] }}</div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <p class="site-type-font-body-sm site-type-text-body-sm text-body-secondary pt-1 site-copy text-secondary fs-6 fw-medium"> {{ $q['note'] }}
                            </p>
                        </div>
                    </div>
                    @php $q = $g['q2']; @endphp
                    <div class="faq-card site-surface-bg-surface-card rounded-4 site-motion-transition-all site-motion-duration-200 overflow-hidden bg-white" data-keywords="{{ $q['keywords'] }}">
                        <button class="faq-toggle w-100 p-4 text-start d-flex align-items-start justify-content-between gap-3 site-state-focus-style-outline-none">
                            <div class="d-flex align-items-start gap-3">
                                <span class="material-symbols-outlined text-primary fs-4 site-spacing-mt-0-5 flex-shrink-0 text-dark">{{ $q['icon'] }}</span>
                                <span class="site-type-font-title-md site-type-text-title-md text-light fw-semibold text-white">{{ $q['question'] }}</span>
                            </div>
                            <div class="site-dimension-w-8 site-dimension-h-8 rounded-pill site-surface-bg-surface-card-elevated d-flex align-items-center justify-content-center text-body-secondary flex-shrink-0 site-motion-transition-transform site-motion-duration-300 icon-arrow bg-white text-secondary">
                                <span class="material-symbols-outlined fs-5">expand_more</span>
                            </div>
                        </button>
                        <div class="faq-answer d-none px-4 pb-4 pt-0 text-body-secondary site-type-font-body-md site-type-text-body-md site-spacing-space-y-3 text-secondary">
                            <p class="site-copy"> {{ $q['lead'] }}
                            </p>
                            <ul class="site-spacing-space-y-2">
                                @foreach ($q['items'] as $item)
                                <li class="d-flex align-items-center site-spacing-gap-3 site-body-text">
                                    <span class="site-dimension-w-1-5 site-dimension-h-1-5 rounded-pill bg-primary"></span>
                                    <span><strong class="site-body-text">{{ $item['label'] }}</strong> {{ $item['text'] }}</span>
                                </li>
                                @endforeach
                            </ul>
                            <p class="site-type-font-body-sm site-type-text-body-sm text-body-secondary site-copy text-secondary fs-6 fw-medium"> {{ $q['note'] }}
                            </p>
                        </div>
                    </div>
                </div>
            </div><div class="faq-group site-spacing-space-y-space-md" data-group="pricing">
                @php $g = $groups['pricing']; $q = $g['q1']; @endphp
                <div class="d-flex align-items-center site-spacing-gap-3 pb-2">
                    <div class="site-dimension-w-8 site-dimension-h-8 rounded-3 site-surface-bg-surface-card-elevated text-primary d-flex align-items-center justify-content-center fw-bold site-type-font-label-md bg-white text-dark"> {{ $g['letter'] }}
                    </div>
                    <div class="d-flex flex-column">
                        <h2 class="site-type-font-headline-sm site-type-text-headline-sm text-light site-heading text-white">{{ $g['title'] }}</h2>
                        <span class="site-type-font-caption site-type-text-caption text-body-secondary text-secondary small fw-medium">{{ $g['description'] }}</span>
                    </div>
                </div>
                <div class="site-spacing-space-y-4">
                    <div class="faq-card site-surface-bg-surface-card rounded-4 site-motion-transition-all site-motion-duration-200 overflow-hidden bg-white" data-keywords="{{ $q['keywords'] }}">
                        <button class="faq-toggle w-100 p-4 text-start d-flex align-items-start justify-content-between gap-3 site-state-focus-style-outline-none">
                            <div class="d-flex align-items-start gap-3">
                                <span class="material-symbols-outlined text-primary fs-4 site-spacing-mt-0-5 flex-shrink-0 text-dark">{{ $q['icon'] }}</span>
                                <span class="site-type-font-title-md site-type-text-title-md text-light fw-semibold text-white">{{ $q['question'] }}</span>
                            </div>
                            <div class="site-dimension-w-8 site-dimension-h-8 rounded-pill site-surface-bg-surface-card-elevated d-flex align-items-center justify-content-center text-body-secondary flex-shrink-0 site-motion-transition-transform site-motion-duration-300 icon-arrow bg-white text-secondary">
                                <span class="material-symbols-outlined fs-5">expand_more</span>
                            </div>
                        </button>
                        <div class="faq-answer d-none px-4 pb-4 pt-0 text-body-secondary site-type-font-body-md site-type-text-body-md site-spacing-space-y-3 text-secondary">
                            <p class="text-light fw-medium site-copy text-white"> {{ $q['lead_bold'] }}
                            </p>
                            <p class="site-copy"> {{ $q['lead'] }}
                            </p>
                            <div class="p-3 rounded-4 site-surface-bg-surface-default d-flex align-items-center site-spacing-gap-3">
                                <span class="material-symbols-outlined text-primary text-dark">info</span>
                                <span class="site-type-font-body-sm site-type-text-body-sm text-body-secondary text-secondary fs-6 fw-medium">{{ $q['note'] }}</span>
                            </div>
                        </div>
                    </div>
                    @php $q = $g['q2']; @endphp
                    <div class="faq-card site-surface-bg-surface-card rounded-4 site-motion-transition-all site-motion-duration-200 overflow-hidden bg-white" data-keywords="{{ $q['keywords'] }}">
                        <button class="faq-toggle w-100 p-4 text-start d-flex align-items-start justify-content-between gap-3 site-state-focus-style-outline-none">
                            <div class="d-flex align-items-start gap-3">
                                <span class="material-symbols-outlined text-primary fs-4 site-spacing-mt-0-5 flex-shrink-0 text-dark">{{ $q['icon'] }}</span>
                                <span class="site-type-font-title-md site-type-text-title-md text-light fw-semibold text-white">{{ $q['question'] }}</span>
                            </div>
                            <div class="site-dimension-w-8 site-dimension-h-8 rounded-pill site-surface-bg-surface-card-elevated d-flex align-items-center justify-content-center text-body-secondary flex-shrink-0 site-motion-transition-transform site-motion-duration-300 icon-arrow bg-white text-secondary">
                                <span class="material-symbols-outlined fs-5">expand_more</span>
                            </div>
                        </button>
                        <div class="faq-answer d-none px-4 pb-4 pt-0 text-body-secondary site-type-font-body-md site-type-text-body-md site-spacing-space-y-4 text-secondary">
                            <p class="site-copy"> {{ $q['lead'] }}
                            </p>
                            <div class="d-grid site-layout-grid-cols-1 site-responsive-sm-layout-grid-cols-2 site-spacing-gap-3">
                                @foreach ($q['blocks'] as $block)
                                <div class="p-3 rounded-4 site-surface-bg-surface-default">
                                    <span class="site-type-font-label-md site-type-text-label-md text-primary text-uppercase text-dark small fw-medium">{{ $block['title'] }}</span>
                                    <p class="site-type-font-body-sm site-type-text-body-sm text-body-secondary mt-1 site-copy text-secondary fs-6 fw-medium">{{ $block['text'] }}</p>
                                </div>
                                @endforeach
                            </div>
                            <div class="d-flex flex-wrap align-items-center site-spacing-gap-3 pt-2 site-type-font-label-md site-type-text-label-md text-body-secondary text-secondary small fw-medium">
                                <span>{{ $q['methods_label'] }}</span>
                                @foreach ($q['methods'] as $method)
                                <span class="site-spacing-px-3 py-1 rounded-1 site-surface-bg-surface-card-elevated text-light bg-white text-white">{{ $method }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div><div class="faq-group site-spacing-space-y-space-md" data-group="infrastructure">
                @php $g = $groups['infrastructure']; $q = $g['q1']; @endphp
                <div class="d-flex align-items-center site-spacing-gap-3 pb-2">
                    <div class="site-dimension-w-8 site-dimension-h-8 rounded-3 site-surface-bg-surface-card-elevated text-primary d-flex align-items-center justify-content-center fw-bold site-type-font-label-md bg-white text-dark"> {{ $g['letter'] }}
                    </div>
                    <div class="d-flex flex-column">
                        <h2 class="site-type-font-headline-sm site-type-text-headline-sm text-light site-heading text-white">{{ $g['title'] }}</h2>
                        <span class="site-type-font-caption site-type-text-caption text-body-secondary text-secondary small fw-medium">{{ $g['description'] }}</span>
                    </div>
                </div>
                <div class="site-spacing-space-y-4">
                    <div class="faq-card site-surface-bg-surface-card rounded-4 site-motion-transition-all site-motion-duration-200 overflow-hidden bg-white" data-keywords="{{ $q['keywords'] }}">
                        <button class="faq-toggle w-100 p-4 text-start d-flex align-items-start justify-content-between gap-3 site-state-focus-style-outline-none">
                            <div class="d-flex align-items-start gap-3">
                                <span class="material-symbols-outlined text-primary fs-4 site-spacing-mt-0-5 flex-shrink-0 text-dark">{{ $q['icon'] }}</span>
                                <span class="site-type-font-title-md site-type-text-title-md text-light fw-semibold text-white">{{ $q['question'] }}</span>
                            </div>
                            <div class="site-dimension-w-8 site-dimension-h-8 rounded-pill site-surface-bg-surface-card-elevated d-flex align-items-center justify-content-center text-body-secondary flex-shrink-0 site-motion-transition-transform site-motion-duration-300 icon-arrow bg-white text-secondary">
                                <span class="material-symbols-outlined fs-5">expand_more</span>
                            </div>
                        </button>
                        <div class="faq-answer d-none px-4 pb-4 pt-0 text-body-secondary site-type-font-body-md site-type-text-body-md site-spacing-space-y-3 text-secondary">
                            <p class="site-copy">{{ $q['lead'] }}</p>
                            <p class="site-copy"> {{ $q['note'] }}
                            </p>
                        </div>
                    </div>
                    @php $q = $g['q2']; @endphp
                    <div class="faq-card site-surface-bg-surface-card rounded-4 site-motion-transition-all site-motion-duration-200 overflow-hidden bg-white" data-keywords="{{ $q['keywords'] }}">
                        <button class="faq-toggle w-100 p-4 text-start d-flex align-items-start justify-content-between gap-3 site-state-focus-style-outline-none">
                            <div class="d-flex align-items-start gap-3">
                                <span class="material-symbols-outlined text-primary fs-4 site-spacing-mt-0-5 flex-shrink-0 text-dark">{{ $q['icon'] }}</span>
                                <span class="site-type-font-title-md site-type-text-title-md text-light fw-semibold text-white">{{ $q['question'] }}</span>
                            </div>
                            <div class="site-dimension-w-8 site-dimension-h-8 rounded-pill site-surface-bg-surface-card-elevated d-flex align-items-center justify-content-center text-body-secondary flex-shrink-0 site-motion-transition-transform site-motion-duration-300 icon-arrow bg-white text-secondary">
                                <span class="material-symbols-outlined fs-5">expand_more</span>
                            </div>
                        </button>
                        <div class="faq-answer d-none px-4 pb-4 pt-0 text-body-secondary site-type-font-body-md site-type-text-body-md site-spacing-space-y-3 text-secondary">
                            <div class="d-flex align-items-center gap-2 text-primary fw-semibold text-dark">
                                <span class="material-symbols-outlined fs-5">task_alt</span>
                                <span>{{ $q['check'] }}</span>
                            </div>
                            <p class="site-copy"> {{ $q['lead'] }}
                            </p>
                            <div class="d-grid site-layout-grid-cols-1 site-responsive-sm-layout-grid-cols-3 site-spacing-gap-3 pt-1">
                                @foreach ($q['boxes'] as $box)
                                <div class="site-spacing-p-3 site-surface-bg-surface-default rounded-4 text-center">
                                    <span class="site-type-font-label-lg site-type-text-label-lg text-light fw-bold text-white fs-6">{{ $box['title'] }}</span>
                                    <p class="site-type-font-caption site-type-text-caption text-body-secondary site-spacing-mt-0-5 site-copy text-secondary small fw-medium">{{ $box['text'] }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div><div class="faq-group site-spacing-space-y-space-md" data-group="support">
                @php $g = $groups['support']; $q = $g['q1']; @endphp
                <div class="d-flex align-items-center site-spacing-gap-3 pb-2">
                    <div class="site-dimension-w-8 site-dimension-h-8 rounded-3 site-surface-bg-surface-card-elevated text-primary d-flex align-items-center justify-content-center fw-bold site-type-font-label-md bg-white text-dark"> {{ $g['letter'] }}
                    </div>
                    <div class="d-flex flex-column">
                        <h2 class="site-type-font-headline-sm site-type-text-headline-sm text-light site-heading text-white">{{ $g['title'] }}</h2>
                        <span class="site-type-font-caption site-type-text-caption text-body-secondary text-secondary small fw-medium">{{ $g['description'] }}</span>
                    </div>
                </div>
                <div class="site-spacing-space-y-4">
                    <div class="faq-card site-surface-bg-surface-card rounded-4 site-motion-transition-all site-motion-duration-200 overflow-hidden bg-white" data-keywords="{{ $q['keywords'] }}">
                        <button class="faq-toggle w-100 p-4 text-start d-flex align-items-start justify-content-between gap-3 site-state-focus-style-outline-none">
                            <div class="d-flex align-items-start gap-3">
                                <span class="material-symbols-outlined text-primary fs-4 site-spacing-mt-0-5 flex-shrink-0 text-dark">{{ $q['icon'] }}</span>
                                <span class="site-type-font-title-md site-type-text-title-md text-light fw-semibold text-white">{{ $q['question'] }}</span>
                            </div>
                            <div class="site-dimension-w-8 site-dimension-h-8 rounded-pill site-surface-bg-surface-card-elevated d-flex align-items-center justify-content-center text-body-secondary flex-shrink-0 site-motion-transition-transform site-motion-duration-300 icon-arrow bg-white text-secondary">
                                <span class="material-symbols-outlined fs-5">expand_more</span>
                            </div>
                        </button>
                        <div class="faq-answer d-none px-4 pb-4 pt-0 text-body-secondary site-type-font-body-md site-type-text-body-md site-spacing-space-y-3 text-secondary">
                            <p class="site-copy">{{ $q['lead'] }}</p>
                            <ul class="site-spacing-space-y-2 site-type-text-body-sm fs-6 fw-medium">
                                @foreach ($q['items'] as $item)
                                <li class="d-flex align-items-center gap-2 site-body-text">
                                    <span class="material-symbols-outlined text-primary site-type-text-arbitrary-18px text-dark">done</span>
                                    <span>
                                        @if (isset($item['text']))
                                            {{ $item['text'] }}
                                        @else
                                            {{ $item['before'] }}<strong class="site-body-text">{{ $item['strong'] }}</strong>{{ $item['after'] }}
                                        @endif
                                    </span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @php $q = $g['q2']; @endphp
                    <div class="faq-card site-surface-bg-surface-card rounded-4 site-motion-transition-all site-motion-duration-200 overflow-hidden bg-white" data-keywords="{{ $q['keywords'] }}">
                        <button class="faq-toggle w-100 p-4 text-start d-flex align-items-start justify-content-between gap-3 site-state-focus-style-outline-none">
                            <div class="d-flex align-items-start gap-3">
                                <span class="material-symbols-outlined text-primary fs-4 site-spacing-mt-0-5 flex-shrink-0 text-dark">{{ $q['icon'] }}</span>
                                <span class="site-type-font-title-md site-type-text-title-md text-light fw-semibold text-white">{{ $q['question'] }}</span>
                            </div>
                            <div class="site-dimension-w-8 site-dimension-h-8 rounded-pill site-surface-bg-surface-card-elevated d-flex align-items-center justify-content-center text-body-secondary flex-shrink-0 site-motion-transition-transform site-motion-duration-300 icon-arrow bg-white text-secondary">
                                <span class="material-symbols-outlined fs-5">expand_more</span>
                            </div>
                        </button>
                        <div class="faq-answer d-none px-4 pb-4 pt-0 text-body-secondary site-type-font-body-md site-type-text-body-md site-spacing-space-y-3 text-secondary">
                            <p class="site-copy"> {{ $q['p1'] }}
                            </p>
                            <p class="site-copy"> {{ $q['p2'] }}
                            </p>
                            <p class="site-type-font-body-sm site-type-text-body-sm text-body-secondary site-copy text-secondary fs-6 fw-medium"> {{ $q['note'] }}
                            </p>
                        </div>
                    </div>
                </div>
            </div><div class="d-none text-center site-spacing-py-space-xl site-surface-bg-surface-card rounded-4 site-spacing-p-8 site-spacing-space-y-3 bg-white" id="noFaqResults">
                <span class="material-symbols-outlined site-type-text-arbitrary-48px text-body-secondary text-secondary">search_off</span>
                <h3 class="site-type-font-title-md site-type-text-title-md text-light site-heading text-white">{{ __('faq.empty.title') }}</h3>
                <p class="site-type-font-body-sm site-type-text-body-sm text-body-secondary site-dimension-max-w-md mx-auto site-copy text-secondary fs-6 fw-medium"> {{ __('faq.empty.description') }}
                </p>
                <button class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3 site-surface-bg-surface-card-elevated text-primary site-type-font-label-md site-type-text-label-md site-state-hover-surface-bg-surface-bright site-motion-transition-colors bg-white text-dark small fw-medium" id="resetFilterAction" type="button">
                    <span class="material-symbols-outlined fs-6">refresh</span>
                    <span>{{ __('faq.empty.reset') }}</span>
                </button>
            </div></div>
    </section><section class="w-100 position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--dark">
        <div class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10"><div class="position-relative site-shape-rounded-3xl site-surface-bg-surface-card site-spacing-p-8 p-md-5 overflow-hidden site-elevation-shadow-2xl bg-white">
                <div class="position-absolute site-style-top-24 site-style-right-24 site-dimension-w-80 site-dimension-h-80 bg-primary bg-opacity-10 rounded-pill site-effect-blur-3xl pe-none"></div>
                <div class="position-relative site-position-z-10 d-grid site-layout-grid-cols-1 site-responsive-lg-layout-grid-cols-12 site-spacing-gap-8 align-items-center">
                    <div class="site-responsive-lg-layout-col-span-5 site-spacing-space-y-3">
                        <div class="d-inline-flex align-items-center gap-2 site-spacing-px-3 py-1 rounded-pill site-surface-bg-surface-card-elevated text-primary site-type-font-label-md site-type-text-label-md bg-white text-dark small fw-medium">
                            <span class="material-symbols-outlined site-type-text-arbitrary-14px">forum</span>
                            <span>{{ __('faq.contact.badge') }}</span>
                        </div>
                        <h3 class="site-type-font-headline-md site-type-text-headline-md text-light site-heading text-white"> {{ __('faq.contact.title') }}
                        </h3>
                        <p class="site-type-font-body-sm site-type-text-body-sm text-body-secondary site-copy text-secondary fs-6 fw-medium"> {{ __('faq.contact.description') }}
                        </p>
                    </div>
                    <div class="site-responsive-lg-layout-col-span-7 d-grid site-layout-grid-cols-1 site-responsive-sm-layout-grid-cols-2 gap-3">
                        <a class="site-style-group p-4 rounded-4 site-surface-bg-surface-card-elevated site-state-hover-surface-bg-surface-bright site-motion-transition-all site-motion-duration-300 d-flex flex-column justify-content-between site-elevation-shadow-lg bg-white" href="https://wa.me/8801335198859?text={{ rawurlencode(__('faq.contact.whatsapp_prefill')) }}" rel="noopener noreferrer" target="_blank">
                            <div class="site-spacing-space-y-3">
                                <div class="site-dimension-w-12 site-dimension-h-12 rounded-4 site-surface-bg-success-whatsapp-opacity-15 site-color-text-success-whatsapp d-flex align-items-center justify-content-center site-state-group-hover-motion-scale-110 site-motion-transition-transform">
                                    <span class="material-symbols-outlined site-type-text-arbitrary-26px">chat</span>
                                </div>
                                <h4 class="site-type-font-title-md site-type-text-title-md text-light fw-bold site-heading text-white">{{ __('faq.contact.whatsapp_title') }}</h4>
                                <p class="site-type-font-body-sm site-type-text-body-sm text-body-secondary site-copy text-secondary fs-6 fw-medium"> {{ __('faq.contact.whatsapp_text') }}
                                </p>
                            </div>
                            <div class="pt-3 d-flex align-items-center justify-content-between site-color-text-success-whatsapp site-type-font-label-lg site-type-text-label-lg fw-semibold fs-6">
                                <span>{{ __('faq.contact.whatsapp_number') }}</span>
                                <span class="material-symbols-outlined site-type-text-arbitrary-18px site-state-group-hover-motion-translate-x-1 site-motion-transition-transform">arrow_forward</span>
                            </div>
                        </a>
                        <a class="site-style-group p-4 rounded-4 site-surface-bg-surface-card-elevated site-state-hover-surface-bg-surface-bright site-motion-transition-all site-motion-duration-300 d-flex flex-column justify-content-between site-elevation-shadow-lg bg-white" href="tel:01335198859">
                            <div class="site-spacing-space-y-3">
                                <div class="site-dimension-w-12 site-dimension-h-12 rounded-4 site-surface-bg-primary-container-opacity-15 text-primary d-flex align-items-center justify-content-center site-state-group-hover-motion-scale-110 site-motion-transition-transform text-dark site-accent-component">
                                    <span class="material-symbols-outlined site-type-text-arbitrary-26px">phone_in_talk</span>
                                </div>
                                <h4 class="site-type-font-title-md site-type-text-title-md text-light fw-bold site-heading text-white">{{ __('faq.contact.call_title') }}</h4>
                                <p class="site-type-font-body-sm site-type-text-body-sm text-body-secondary site-copy text-secondary fs-6 fw-medium"> {{ __('faq.contact.call_text') }}
                                </p>
                            </div>
                            <div class="pt-3 d-flex align-items-center justify-content-between text-primary site-type-font-label-lg site-type-text-label-lg fw-semibold text-dark fs-6">
                                <span>{{ __('faq.contact.call_action') }}</span>
                                <span class="material-symbols-outlined site-type-text-arbitrary-18px site-state-group-hover-motion-translate-x-1 site-motion-transition-transform">call</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div></div>
    </section><section class="w-100 position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--light">
        <div class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10"><div class="position-relative site-shape-rounded-3xl site-surface-bg-surface-card-elevated site-spacing-p-8 site-responsive-md-spacing-p-14 text-center overflow-hidden site-elevation-shadow-2xl bg-white">
                <div class="site-dimension-max-w-2xl mx-auto site-spacing-space-y-space-md position-relative site-position-z-10">
                    <h2 class="site-type-font-headline-lg site-type-text-headline-lg text-light fw-bold site-heading text-white"> {{ __('faq.cta.title') }}
                    </h2>
                    <p class="site-type-font-body-md site-type-text-body-md text-body-secondary site-copy text-secondary"> {{ __('faq.cta.description') }}
                    </p>
                    <div class="pt-2 d-flex flex-column flex-sm-row align-items-center justify-content-center gap-3">
                        <a class="w-100 site-responsive-sm-dimension-w-auto d-inline-flex align-items-center justify-content-center site-dimension-h-12 site-spacing-px-8 rounded-4 bg-primary site-color-text-text-inverse site-type-font-label-lg site-type-text-label-lg fw-bold site-state-hover-surface-bg-primary-fixed-dim site-motion-transition-all site-elevation-shadow-arbitrary-0-0-24px-rgba-198-244-50-0-35 text-black fs-6" href="{{ route('contact') }}"> {{ __('faq.cta.primary') }}
                        </a>
                        <a class="w-100 site-responsive-sm-dimension-w-auto d-inline-flex align-items-center justify-content-center site-dimension-h-12 site-spacing-px-8 rounded-4 site-surface-bg-surface-card text-light site-type-font-label-lg site-type-text-label-lg fw-semibold site-state-hover-surface-bg-surface-bright site-state-hover-color-text-primary-container site-motion-transition-all bg-white text-white fs-6 site-accent-hover" href="{{ route('contact') }}"> {{ __('faq.cta.secondary') }}
                        </a>
                    </div>
                </div>
            </div></div>
    </section>
</x-frontend.page>
@endsection
