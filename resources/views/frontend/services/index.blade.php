@extends('layouts.frontend') @section('title', __('services.meta.title'))

@section('description', $services->map(fn($service) => $service->tr('short_description') ?:
    $service->tr('title'))->take(3)->implode(' '))

    @section('page', 'services') @section('content')

    <x-frontend.page>
        <section
            class="w-100 site-surface-bg-arbitrary-hex-0b0f14-opacity-70 border-top border-bottom border-white border-opacity-10 position-relative site-spacing-py-16 site-responsive-md-spacing-py-24 bg-white site-soft-border site-section site-section--dark"
            id="all-services">
            <div
                class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <div class="site-dimension-max-w-3xl text-center mx-auto mb-5 site-responsive-md-spacing-mb-14">
                    <x-frontend.eyebrow class="d-inline-block">{{ __('services.index.eyebrow') }}</x-frontend.eyebrow>
                    <h1
                        class="site-type-font-heading site-type-text-3xl site-responsive-md-type-text-4xl site-type-font-extrabold text-white mt-3 site-type-tracking-tight site-heading text-white">
                        {{ __('services.index.title') }}</h1>
                    <p
                        class="site-color-text-slate-300 fs-6 site-responsive-md-type-text-lg mt-3 site-type-leading-relaxed site-copy text-secondary">
                        {{ __('services.index.description') }}</p>

                    {{-- Filter Buttons --}}
                    <div id="service-filters"
                        class="site-spacing-mt-10 d-flex flex-wrap align-items-center justify-content-center gap-2-5 site-responsive-sm-spacing-gap-3">
                        <a href="{{ route('services.index') }}" data-service-filter data-category=""
                            class="service-filter site-spacing-px-5 py-2 rounded-pill fw-semibold border small site-motion-transition-all {{ $activeCategory === '' ? 'is-active' : '' }}">
                            {{ __('services.index.filter_all') }}</a>

                        @foreach ($categories as $category)
                            <a href="{{ route('services.index', ['category' => $category->slug]) }}" data-service-filter
                                data-category="{{ $category->slug }}"
                                class="service-filter site-spacing-px-5 py-2 rounded-pill fw-semibold border small site-motion-transition-all {{ $activeCategory === $category->slug ? 'is-active' : '' }}">
                                {{ $category->tr('name') }}</a>
                        @endforeach
                    </div>

                </div>
                <div id="services-results">
                    @include('frontend.services.partials.grid')
                </div>
            </div>
        </section>




        {{-- Contact Section --}}
        @include('partials.frontend.contact-section')


    </x-frontend.page>
@endsection
