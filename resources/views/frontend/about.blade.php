@extends('layouts.frontend') @section('title', __('about.meta.title'))
@section('description', __('about.meta.description'))
@section('page', 'about') @section('content')
<x-frontend.page><section class="position-relative w-100 overflow-hidden site-responsive-md-spacing-px-margin site-responsive-md-spacing-pb-space-3xl site-spacing-pt-32 site-responsive-md-spacing-pt-40 pb-5 site-responsive-md-spacing-pb-16 site-section site-section--dark">
        <div class="position-absolute site-position-top-1-opacity-4 start-50 translate-middle-x translate-middle-y site-dimension-w-arbitrary-550px site-dimension-h-arbitrary-350px site-surface-bg-tertiary-container-opacity-10 site-effect-blur-arbitrary-130px rounded-pill pe-none"></div>
        <div class="site-dimension-max-w-7xl mx-auto d-flex flex-column align-items-center text-center position-relative site-position-z-10 w-100 site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
            <div class="d-inline-flex align-items-center gap-2 px-3 site-spacing-py-1-5 rounded-pill site-surface-bg-surface-card-elevated border site-border-border-tertiary-container-opacity-30 site-color-text-tertiary-container site-elevation-shadow-arbitrary-0-0-20px-rgba-197-243-49-0-15 mb-4 bg-white text-dark">
                <span class="material-symbols-outlined site-type-text-arbitrary-18px">lightbulb</span>
                <span class="site-type-font-label-md site-type-text-label-md text-uppercase site-type-tracking-wider small fw-medium"> {{ __('about.hero.badge') }}</span>
            </div>
            <h1 class="site-type-font-headline-lg site-type-text-headline-lg-mobile site-responsive-md-type-text-headline-lg site-dimension-max-w-4xl text-light fw-bold site-type-tracking-tight site-heading text-white"> {{ __('about.hero.title_before') }}
                <span class="site-color-text-tertiary-container site-elevation-drop-shadow-arbitrary-0-0-24px-rgba-197-243-49-0-35 text-dark">{{ __('about.hero.title_highlight') }}</span>
            </h1>
            <p class="site-type-font-body-lg site-type-text-body-md site-responsive-md-type-text-body-lg text-body-secondary site-dimension-max-w-3xl mt-3 site-type-leading-relaxed site-copy text-secondary"> {{ __('about.hero.description') }}
            </p>
            <div class="w-100 d-grid site-layout-grid-cols-1 site-responsive-sm-layout-grid-cols-3 gap-3 gap-md-4 site-spacing-mt-space-2xl">
                @foreach (__('about.hero.stats') as $stat)
                <div class="d-flex flex-column align-items-center justify-content-center p-4 rounded-4 site-surface-bg-surface-card-opacity-90 site-effect-backdrop-blur-md border site-border-border-border-subtle site-elevation-shadow-xl site-state-hover-border-border-tertiary-container-opacity-40 site-state-hover-style-translate-y-1 site-motion-transition-all bg-white site-soft-border">
                    <span class="material-symbols-outlined site-color-text-tertiary-container fs-2 mb-2 text-dark">{{ $stat['icon'] }}</span>
                    <span class="site-type-font-display-xl site-type-text-display-xl-mobile site-responsive-md-type-text-headline-lg text-light site-type-font-extrabold site-type-tracking-tight text-white">{{ $stat['value'] }}</span>
                    <span class="site-type-font-label-md site-type-text-label-md text-body-secondary mt-1 text-secondary small fw-medium">{{ $stat['label'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </section><section class="w-100 site-responsive-md-spacing-px-margin site-responsive-md-spacing-py-space-3xl position-relative site-surface-bg-surface-default-opacity-60 site-spacing-py-16 site-responsive-md-spacing-py-24 site-section site-section--light">
        <div class="site-dimension-max-w-7xl mx-auto d-grid site-layout-grid-cols-1 site-responsive-lg-layout-grid-cols-12 site-spacing-gap-space-xl align-items-center w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
            <div class="site-responsive-lg-layout-col-span-7 d-flex flex-column align-items-start">
                <div class="d-inline-flex align-items-center gap-2 site-spacing-px-3 py-1 rounded-pill site-surface-bg-surface-card site-color-text-tertiary-container border site-border-border-border-subtle site-type-font-label-md site-type-text-label-md mb-2 bg-white site-soft-border text-dark small fw-medium">
                    <span class="site-dimension-w-2 site-dimension-h-2 rounded-pill site-surface-bg-tertiary-container"></span>
                    <span>{{ __('about.story.badge') }}</span>
                </div>
                <h2 class="site-type-font-headline-lg site-type-text-headline-lg-mobile site-responsive-md-type-text-headline-lg text-light fw-bold mt-2 site-type-tracking-tight site-heading text-white"> {{ __('about.story.title_before') }}
                    <span class="site-color-text-tertiary-container text-dark">{{ __('about.story.title_highlight') }}</span>
                </h2>
                <p class="site-type-font-body-lg site-type-text-body-md site-responsive-md-type-text-body-lg text-body-secondary mt-3 site-type-leading-relaxed site-copy text-secondary"> {{ __('about.story.description') }}
                </p>
                <div class="d-flex flex-column site-spacing-gap-3-5 mt-4 w-100">
                    @foreach (__('about.story.points') as $point)
                    <div class="d-flex align-items-start site-spacing-gap-3 site-spacing-p-3-5 rounded-3 site-surface-bg-surface-card border site-border-border-border-subtle site-state-hover-border-border-tertiary-container-opacity-30 site-motion-transition-colors bg-white site-soft-border">
                        <span class="material-symbols-outlined site-color-text-tertiary-container site-type-text-arbitrary-22px flex-shrink-0 site-spacing-mt-0-5 text-dark">check_circle</span>
                        <span class="site-type-font-body-md site-type-text-body-md text-light text-white">{{ $point }}</span>
                    </div>
                    @endforeach
                </div>
                <div class="site-spacing-mt-space-xl d-flex flex-wrap gap-3">
                    <a class="d-inline-flex align-items-center gap-2 px-4 site-spacing-py-3 rounded-pill site-surface-bg-tertiary-container site-color-text-text-inverse site-type-font-headline-sm site-type-text-sm fw-semibold site-elevation-shadow-arbitrary-0-0-24px-rgba-197-243-49-0-3 site-state-hover-motion-scale-105 site-state-active-motion-scale-95 site-motion-transition-all text-black fs-6" href="#contact">
                        <span>{{ __('about.story.cta') }}</span>
                        <span class="material-symbols-outlined site-type-text-arbitrary-18px">arrow_forward</span>
                    </a>
                </div>
            </div>
            <div class="site-responsive-lg-layout-col-span-5 position-relative">
                <div class="position-absolute site-style-inset-4 site-surface-bg-tertiary-container-opacity-15 site-effect-blur-2xl rounded-4 pe-none"></div>
                <div class="position-relative rounded-4 overflow-hidden border site-border-border-tertiary-container-opacity-30 site-surface-bg-surface-card site-elevation-shadow-2xl bg-white">
                    <img alt="{{ __('about.story.image_alt') }}" class="w-100 h-auto object-fit-cover site-motion-transform site-state-hover-motion-scale-102 site-motion-transition-transform site-motion-duration-500" src="{{ asset('assets/frontend/images/about-4.jpg') }}"/>
                    <div class="position-absolute top-0 end-0 bottom-0 start-0 site-surface-bg-gradient-to-t site-surface-from-canvas-base site-surface-via-transparent site-surface-to-transparent site-effect-opacity-80 site-gradient-background"></div>
                    <div class="position-absolute site-position-bottom-4 site-position-left-4 site-position-right-4 p-3 rounded-4 site-surface-bg-surface-card-elevated-opacity-90 site-effect-backdrop-blur-md border site-border-border-border-subtle d-flex align-items-center justify-content-between bg-white site-soft-border">
                        <div>
                            <p class="site-type-font-label-md site-type-text-label-md site-color-text-tertiary-container text-uppercase site-copy text-dark small fw-medium">{{ __('about.story.image_label') }}</p>
                            <p class="site-type-font-headline-sm site-type-text-sm text-light fw-bold site-copy text-white fs-6">{{ __('about.story.image_caption') }}</p>
                        </div>
                        <span class="material-symbols-outlined site-color-text-tertiary-container fs-3 text-dark">devices</span>
                    </div>
                </div>
            </div>
        </div>
    </section><section class="w-100 site-responsive-md-spacing-px-margin site-responsive-md-spacing-py-space-3xl position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--dark">
        <div class="site-dimension-max-w-7xl mx-auto d-flex flex-column align-items-center w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
            <div class="text-center site-dimension-max-w-2xl site-spacing-mb-space-2xl">
                <div class="d-inline-flex align-items-center gap-2 site-spacing-px-3 py-1 rounded-pill site-surface-bg-surface-card site-color-text-tertiary-container border site-border-border-border-subtle site-type-font-label-md site-type-text-label-md mb-2 bg-white site-soft-border text-dark small fw-medium">
                    <span class="material-symbols-outlined fs-6">stars</span>
                    <span>{{ __('about.values.badge') }}</span>
                </div>
                <h2 class="site-type-font-headline-lg site-type-text-headline-lg-mobile site-responsive-md-type-text-headline-lg text-light fw-bold site-type-tracking-tight site-heading text-white"> {{ __('about.values.title_before') }}
                    <span class="site-color-text-tertiary-container text-dark">{{ __('about.values.title_highlight') }}</span>
                </h2>
                <p class="site-type-font-body-md site-type-text-body-md text-body-secondary mt-2 site-copy text-secondary"> {{ __('about.values.description') }}
                </p>
            </div>
            <div class="d-grid site-layout-grid-cols-1 site-responsive-md-layout-grid-cols-2 site-responsive-lg-layout-grid-cols-3 gap-4 w-100">
                @foreach (__('about.values.cards') as $card)
                <div class="site-style-group p-4 rounded-4 site-surface-bg-surface-card border site-border-border-border-subtle site-state-hover-border-border-tertiary-container-opacity-50 site-state-hover-surface-bg-surface-card-elevated site-state-hover-style-translate-y-1-5 site-motion-transition-all site-motion-duration-300 d-flex flex-column justify-content-between bg-white site-soft-border">
                    <div>
                        <div class="site-dimension-w-12 site-dimension-h-12 rounded-3 site-surface-bg-tertiary-container-opacity-10 border site-border-border-tertiary-container-opacity-30 d-flex align-items-center justify-content-center site-color-text-tertiary-container mb-3 site-state-group-hover-motion-scale-110 site-motion-transition-transform site-accent-component text-dark">
                            <span class="material-symbols-outlined site-type-text-arbitrary-26px">{{ $card['icon'] }}</span>
                        </div>
                        <h3 class="site-type-font-headline-sm site-type-text-headline-sm text-light fw-bold mb-2 site-heading text-white">{{ $card['title'] }}</h3>
                        <p class="site-type-font-body-sm site-type-text-body-sm text-body-secondary site-type-leading-relaxed site-copy text-secondary fs-6 fw-medium"> {{ $card['text'] }}
                        </p>
                    </div>
                    <div class="mt-4 pt-2 border-top site-border-border-border-subtle d-flex align-items-center gap-2 site-color-text-tertiary-container site-type-font-label-md site-type-text-label-md site-soft-border text-dark small fw-medium">
                        <span>{{ $card['footer'] }}</span>
                        <span class="material-symbols-outlined fs-6">{{ $card['footer_icon'] }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section><section class="w-100 site-responsive-md-spacing-px-margin site-responsive-md-spacing-py-space-3xl site-surface-bg-surface-default-opacity-40 position-relative site-spacing-py-16 site-responsive-md-spacing-py-24 site-section site-section--light">
        <div class="site-dimension-max-w-7xl mx-auto d-flex flex-column site-spacing-gap-space-2xl w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
            <div class="d-flex flex-column flex-lg-row align-items-lg-end justify-content-between gap-4">
                <div class="site-dimension-max-w-2xl">
                    <div class="d-inline-flex align-items-center gap-2 site-spacing-px-3 py-1 rounded-pill site-surface-bg-surface-card site-color-text-tertiary-container border site-border-border-border-subtle site-type-font-label-md site-type-text-label-md mb-2 bg-white site-soft-border text-dark small fw-medium">
                        <span class="material-symbols-outlined fs-6">groups</span>
                        <span>{{ __('about.team.badge') }}</span>
                    </div>
                    <h2 class="site-type-font-headline-lg site-type-text-headline-lg-mobile site-responsive-md-type-text-headline-lg text-light fw-bold site-type-tracking-tight site-heading text-white"> {{ __('about.team.title_before') }}
                        <span class="site-color-text-tertiary-container text-dark">{{ __('about.team.title_highlight') }}</span>
                    </h2>
                    <p class="site-type-font-body-lg site-type-text-body-md site-responsive-md-type-text-body-lg text-body-secondary mt-2 site-copy text-secondary"> {{ __('about.team.description') }}
                    </p>
                </div>
                <div class="p-3 rounded-4 site-surface-bg-surface-card border site-border-border-border-subtle d-flex align-items-center gap-3 flex-shrink-0 bg-white site-soft-border">
                    <div class="site-dimension-w-12 site-dimension-h-12 rounded-pill site-surface-bg-tertiary-container-opacity-20 border site-border-border-tertiary-container-opacity-40 d-flex align-items-center justify-content-center site-color-text-tertiary-container site-accent-component text-dark">
                        <span class="material-symbols-outlined fs-4">terminal</span>
                    </div>
                    <div>
                        <p class="site-type-font-label-md site-type-text-label-md text-body-secondary site-copy text-secondary small fw-medium">{{ __('about.team.field_label') }}</p>
                        <p class="site-type-font-headline-sm site-type-text-sm text-light fw-bold site-copy text-white fs-6">{{ __('about.team.field_value') }}</p>
                    </div>
                </div>
            </div>
            <div class="d-grid site-layout-grid-cols-1 site-responsive-md-layout-grid-cols-2 gap-4">
                <div class="position-relative site-style-group rounded-4 overflow-hidden border site-border-border-border-subtle site-surface-bg-surface-card site-elevation-shadow-2xl bg-white site-soft-border">
                    <div class="w-100 site-dimension-h-80 overflow-hidden">
                        <img alt="{{ __('about.team.image_one_alt') }}" class="w-100 h-100 object-fit-cover site-state-group-hover-motion-scale-105 site-motion-transition-transform site-motion-duration-700" src="{{ asset('assets/frontend/images/about-2.jpg') }}"/>
                    </div>
                    <div class="position-absolute top-0 end-0 bottom-0 start-0 site-surface-bg-gradient-to-t site-surface-from-canvas-base site-surface-via-canvas-base-opacity-40 site-surface-to-transparent site-gradient-background"></div>
                    <div class="position-absolute bottom-0 start-0 end-0 p-4 d-flex flex-column">
                        <span class="site-type-font-label-md site-type-text-label-md site-color-text-tertiary-container text-uppercase site-type-tracking-wider mb-1 text-dark small fw-medium">{{ __('about.team.image_one_label') }}</span>
                        <h3 class="site-type-font-headline-sm site-type-text-headline-sm text-light fw-bold site-heading text-white">{{ __('about.team.image_one_title') }}</h3>
                        <p class="site-type-font-body-sm site-type-text-body-sm text-body-secondary mt-1 site-copy text-secondary fs-6 fw-medium">{{ __('about.team.image_one_text') }}</p>
                    </div>
                </div>
                <div class="position-relative site-style-group rounded-4 overflow-hidden border site-border-border-border-subtle site-surface-bg-surface-card site-elevation-shadow-2xl bg-white site-soft-border">
                    <div class="w-100 site-dimension-h-80 overflow-hidden">
                        <img alt="{{ __('about.team.image_two_alt') }}" class="w-100 h-100 object-fit-cover site-state-group-hover-motion-scale-105 site-motion-transition-transform site-motion-duration-700" src="{{ asset('assets/frontend/images/about-1.jpg') }}"/>
                    </div>
                    <div class="position-absolute top-0 end-0 bottom-0 start-0 site-surface-bg-gradient-to-t site-surface-from-canvas-base site-surface-via-canvas-base-opacity-40 site-surface-to-transparent site-gradient-background"></div>
                    <div class="position-absolute bottom-0 start-0 end-0 p-4 d-flex flex-column">
                        <span class="site-type-font-label-md site-type-text-label-md site-color-text-tertiary-container text-uppercase site-type-tracking-wider mb-1 text-dark small fw-medium">{{ __('about.team.image_two_label') }}</span>
                        <h3 class="site-type-font-headline-sm site-type-text-headline-sm text-light fw-bold site-heading text-white">{{ __('about.team.image_two_title') }}</h3>
                        <p class="site-type-font-body-sm site-type-text-body-sm text-body-secondary mt-1 site-copy text-secondary fs-6 fw-medium">{{ __('about.team.image_two_text') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section><section class="w-100 site-responsive-md-spacing-px-margin site-responsive-md-spacing-py-space-3xl position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--dark">
        <div class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
            <div class="rounded-4 p-4 site-responsive-md-spacing-p-space-2xl site-surface-bg-surface-card border site-border-border-border-subtle position-relative overflow-hidden site-elevation-shadow-2xl bg-white site-soft-border">
                <div class="position-absolute site-style-right-20 site-style-bottom-20 site-dimension-w-80 site-dimension-h-80 site-surface-bg-tertiary-container-opacity-10 site-effect-blur-arbitrary-100px rounded-pill pe-none"></div>
                <div class="d-grid site-layout-grid-cols-1 site-responsive-lg-layout-grid-cols-12 site-spacing-gap-space-xl align-items-center position-relative site-position-z-10">
                    <div class="site-responsive-lg-layout-col-span-6 d-flex flex-column align-items-start">
                        <div class="d-inline-flex align-items-center gap-2 site-spacing-px-3 py-1 rounded-pill site-surface-bg-surface-card-elevated site-color-text-tertiary-container border site-border-border-border-subtle site-type-font-label-md site-type-text-label-md mb-2 bg-white site-soft-border text-dark small fw-medium">
                            <span class="material-symbols-outlined fs-6">domain</span>
                            <span>{{ __('about.contact.badge') }}</span>
                        </div>
                        <h3 class="site-type-font-headline-lg site-type-text-headline-lg-mobile site-responsive-md-type-text-headline-lg text-light fw-bold site-type-tracking-tight site-heading text-white"> {{ __('about.contact.title_before') }}
                            <span class="site-color-text-tertiary-container text-dark">{{ __('about.contact.title_highlight') }}</span>
                        </h3>
                        <p class="site-type-font-body-md site-type-text-body-md text-body-secondary mt-2 site-dimension-max-w-lg site-type-leading-relaxed site-copy text-secondary"> {{ __('about.contact.description') }}
                        </p>
                        <div class="d-grid site-layout-grid-cols-1 site-responsive-sm-layout-grid-cols-2 gap-3 mt-4 w-100">
                            <div class="d-flex align-items-start site-spacing-gap-3 site-spacing-p-3 rounded-3 site-surface-bg-surface-default border site-border-border-border-subtle site-soft-border">
                                <span class="material-symbols-outlined site-color-text-tertiary-container fs-5 flex-shrink-0 site-spacing-mt-0-5 text-dark">location_on</span>
                                <div>
                                    <p class="site-type-font-label-md site-type-text-label-md text-body-secondary site-copy text-secondary small fw-medium">{{ __('about.contact.address_label') }}</p>
                                    <p class="site-type-font-body-sm site-type-text-body-sm text-light fw-semibold site-copy text-white fs-6">{{ __('about.contact.address') }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start site-spacing-gap-3 site-spacing-p-3 rounded-3 site-surface-bg-surface-default border site-border-border-border-subtle site-soft-border">
                                <span class="material-symbols-outlined site-color-text-tertiary-container fs-5 flex-shrink-0 site-spacing-mt-0-5 text-dark">call</span>
                                <div>
                                    <p class="site-type-font-label-md site-type-text-label-md text-body-secondary site-copy text-secondary small fw-medium">{{ __('about.contact.phone_label') }}</p>
                                    <a class="site-type-font-body-sm site-type-text-body-sm site-color-text-tertiary-container fw-bold site-state-hover-type-underline text-dark fs-6 site-content-action" href="tel:01335198859">{{ __('site.phone') }}</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-start site-spacing-gap-3 site-spacing-p-3 rounded-3 site-surface-bg-surface-default border site-border-border-border-subtle site-soft-border">
                                <span class="material-symbols-outlined site-color-text-tertiary-container fs-5 flex-shrink-0 site-spacing-mt-0-5 text-dark">mail</span>
                                <div>
                                    <p class="site-type-font-label-md site-type-text-label-md text-body-secondary site-copy text-secondary small fw-medium">{{ __('about.contact.email_label') }}</p>
                                    <a class="site-type-font-body-sm site-type-text-body-sm text-light site-state-hover-color-text-tertiary-container site-type-break-all text-white fs-6 fw-medium site-content-action" href="mailto:contact.whexsoft@gmail.com">contact.whexsoft@gmail.com</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-start site-spacing-gap-3 site-spacing-p-3 rounded-3 site-surface-bg-surface-default border site-border-border-border-subtle site-soft-border">
                                <span class="material-symbols-outlined site-color-text-tertiary-container fs-5 flex-shrink-0 site-spacing-mt-0-5 text-dark">schedule</span>
                                <div>
                                    <p class="site-type-font-label-md site-type-text-label-md text-body-secondary site-copy text-secondary small fw-medium">{{ __('about.contact.hours_label') }}</p>
                                    <p class="site-type-font-body-sm site-type-text-body-sm text-light fw-semibold site-copy text-white fs-6">{{ __('about.contact.hours') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="site-responsive-lg-layout-col-span-6 w-100 h-100 site-dimension-min-h-arbitrary-260px rounded-4 overflow-hidden border site-border-border-border-subtle position-relative site-surface-bg-surface-default d-flex flex-column justify-content-end p-4 site-soft-border">
                        <div class="position-absolute top-0 end-0 bottom-0 start-0 site-surface-bg-cover site-surface-bg-center site-effect-opacity-60" data-location="Dhaka, Bangladesh" style="background-image: url('{{ asset('assets/frontend/images/about-2.jpg') }}')"></div>
                        <div class="position-absolute top-0 end-0 bottom-0 start-0 site-surface-bg-gradient-to-t site-surface-from-canvas-base site-surface-via-canvas-base-opacity-60 site-surface-to-transparent site-gradient-background"></div>
                        <div class="position-relative site-position-z-10 d-flex align-items-center justify-content-between">
                            <div>
                                <p class="site-type-font-label-md site-type-text-label-md site-color-text-tertiary-container text-uppercase site-type-tracking-wider site-copy text-dark small fw-medium">{{ __('about.contact.map_label') }}</p>
                                <p class="site-type-font-headline-sm site-type-text-sm text-light fw-bold site-copy text-white fs-6">{{ __('about.contact.map_title') }}</p>
                            </div>
                            <a class="px-3 py-2 rounded-pill site-surface-bg-tertiary-container site-color-text-text-inverse site-type-font-headline-sm site-type-text-xs fw-bold site-state-hover-surface-bg-tertiary-container-opacity-90 site-motion-transition-all text-black small site-accent-component" href="tel:01335198859">{{ __('about.contact.call') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><section class="w-100 site-responsive-md-spacing-px-margin position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--light">
        <div class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10"><div class="site-dimension-max-w-5xl mx-auto site-shape-rounded-3xl site-spacing-p-space-xl site-responsive-md-spacing-p-space-2xl site-surface-bg-gradient-to-br site-surface-from-surface-card-elevated site-surface-via-surface-card site-surface-to-surface-default border site-border-border-tertiary-container-opacity-30 text-center position-relative overflow-hidden site-elevation-shadow-arbitrary-0-12px-48px-rgba-0-0-0-0-8 site-gradient-background">
                <div class="position-absolute site-style-top-24 site-style-left-24 site-dimension-w-72 site-dimension-h-72 site-surface-bg-tertiary-container-opacity-15 site-effect-blur-3xl rounded-pill pe-none"></div>
                <div class="position-absolute site-style-bottom-24 site-style-right-24 site-dimension-w-72 site-dimension-h-72 site-surface-bg-tertiary-container-opacity-15 site-effect-blur-3xl rounded-pill pe-none"></div>
                <div class="position-relative site-position-z-10 d-flex flex-column align-items-center">
                    <span class="d-inline-flex align-items-center gap-1-5 site-spacing-px-3 py-1 rounded-pill site-surface-bg-surface-default border site-border-border-border-subtle site-color-text-tertiary-container site-type-font-label-md site-type-text-label-md mb-2 site-soft-border text-dark small fw-medium">
                        <span class="material-symbols-outlined fs-6">verified</span>
                        <span>{{ __('about.cta.badge') }}</span>
                    </span>
                    <h2 class="site-type-font-headline-lg site-type-text-headline-lg-mobile site-responsive-md-type-text-headline-lg text-light fw-bold site-dimension-max-w-2xl site-type-tracking-tight site-heading text-white"> {{ __('about.cta.title_before') }}
                        <span class="site-color-text-tertiary-container text-dark">{{ __('about.cta.title_highlight') }}</span>
                    </h2>
                    <p class="site-type-font-body-md site-type-text-body-md text-body-secondary site-dimension-max-w-xl mt-2 site-type-leading-relaxed site-copy text-secondary"> {{ __('about.cta.description') }}
                    </p>
                    <div class="d-flex flex-column flex-sm-row align-items-center gap-3 site-spacing-mt-space-xl">
                        <a class="w-100 site-responsive-sm-dimension-w-auto d-inline-flex align-items-center justify-content-center gap-2-5 site-spacing-px-8 site-spacing-py-3-5 rounded-pill site-surface-bg-tertiary-container site-color-text-text-inverse site-type-font-headline-sm site-type-text-sm fw-bold site-elevation-shadow-arbitrary-0-0-24px-rgba-197-243-49-0-35 site-state-hover-motion-scale-105 site-state-active-motion-scale-95 site-motion-transition-all text-black fs-6" href="#contact">
                            <span class="material-symbols-outlined fs-5">calendar_month</span>
                            <span>{{ __('about.cta.consultation') }}</span>
                        </a>
                        <a class="w-100 site-responsive-sm-dimension-w-auto d-inline-flex align-items-center justify-content-center gap-2-5 site-spacing-px-8 site-spacing-py-3-5 rounded-pill site-surface-bg-success-whatsapp site-color-text-text-inverse site-type-font-headline-sm site-type-text-sm fw-bold site-elevation-shadow-arbitrary-0-0-24px-rgba-37-211-102-0-3 site-state-hover-motion-scale-105 site-state-active-motion-scale-95 site-motion-transition-all text-black fs-6" href="https://wa.me/8801335198859" rel="noopener noreferrer" target="_blank">
                            <span class="material-symbols-outlined fs-5">chat</span>
                            <span>{{ __('about.cta.whatsapp') }}</span>
                        </a>
                    </div>
                </div>
            </div></div>
    </section></x-frontend.page>
@endsection
