@extends('layouts.frontend') @section('title', __('contact.meta.title'))
@section('description', __('contact.meta.description'))
@section('page', 'contact') @section('content')
@php
    // $selectedService = old('service_type', request('service'));
    // $selectedPackage = request('package');
    $budgetOptions = __('contact.form.budget_options');
    $budgetDefault = __('contact.form.budget_default');
@endphp
<x-frontend.page>
    <section
        class="position-relative overflow-hidden site-responsive-lg-spacing-py-24 w-100 site-spacing-pt-32 site-responsive-md-spacing-pt-40 pb-5 site-responsive-md-spacing-pb-16 site-section site-section--dark">
        <div
            class="position-absolute top-50 start-50 translate-middle-x translate-middle-y site-dimension-w-arbitrary-600px site-dimension-h-arbitrary-350px bg-primary bg-opacity-10 site-effect-blur-arbitrary-130px rounded-pill pe-none site-style-z-10">
        </div>
        <div
            class="site-dimension-max-w-7xl mx-auto d-flex flex-column align-items-center text-center w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
            <div
                class="d-inline-flex align-items-center gap-2 px-3 site-spacing-py-1-5 rounded-pill site-surface-bg-surface-card border site-border-border-border-accent mb-4 site-elevation-shadow-md bg-white">
                <span
                    class="material-symbols-outlined text-primary site-type-text-arbitrary-18px text-dark">support_agent</span>
                <span
                    class="text-primary site-type-font-label-md text-uppercase site-type-tracking-wider text-dark">{{ __('contact.hero.badge') }}</span>
            </div>
            <h1
                class="site-type-font-headline-lg text-light site-dimension-max-w-4xl site-type-tracking-tight mb-4 site-heading text-white">
                {{ __('contact.hero.title_before') }}
                <span
                    class="text-primary site-type-underline site-type-decoration-primary-fixed-opacity-40 site-type-decoration-wavy site-type-decoration-2 text-dark">{{ __('contact.hero.title_highlight') }}</span>
            </h1>
            <p
                class="site-type-font-body-lg text-body-secondary site-dimension-max-w-2xl site-type-leading-relaxed site-copy text-secondary">
                {{ __('contact.hero.description') }}</p>
            <div
                class="d-grid site-layout-grid-cols-2 site-responsive-md-layout-grid-cols-3 gap-3 mt-5 w-100 site-dimension-max-w-2xl">
                @foreach (__('contact.hero.stats') as $stat)
                    <div
                        class="site-surface-bg-surface-card-opacity-80 site-effect-backdrop-blur-md p-3 rounded-4 site-elevation-shadow-sm text-center {{ $loop->last ? 'site-layout-col-span-2 site-responsive-md-layout-col-span-1' : '' }} {{ $loop->index !== 1 ? 'bg-white' : '' }}">
                        <div
                            class="site-type-font-headline-sm fw-bold {{ $loop->index === 1 ? 'text-light text-white' : 'text-primary text-dark' }}">
                            {{ $stat['value'] }}</div>
                        <div class="site-type-font-caption text-body-secondary mt-1 text-secondary">{{ $stat['label'] }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="w-100 position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--light">
        <div
            class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
            <div
                class="d-grid site-layout-grid-cols-1 site-responsive-lg-layout-grid-cols-12 site-spacing-gap-8 align-items-start">
                <div
                    class="site-responsive-lg-layout-col-span-7 site-surface-bg-surface-card rounded-4 site-spacing-p-8 site-responsive-lg-spacing-p-10 site-elevation-shadow-xl position-relative overflow-hidden bg-white">
                    <div
                        class="position-absolute site-style-top-12 site-style-right-12 site-dimension-w-40 site-dimension-h-40 bg-primary bg-opacity-10 site-effect-blur-arbitrary-60px rounded-pill pe-none">
                    </div>
                    <div class="d-flex align-items-center justify-content-between site-spacing-mb-8 pb-3">
                        <div>
                            <h2 class="site-type-font-headline-md text-light site-heading text-white">
                                {{ __('contact.form.heading') }}
                            </h2>
                            <p class="site-type-font-body-sm text-body-secondary mt-1 site-copy text-secondary">
                                {{ __('contact.form.subheading') }}</p>
                        </div>
                        <div
                            class="site-dimension-w-10 site-dimension-h-10 rounded-pill bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center flex-shrink-0 text-dark site-accent-component">
                            <span class="material-symbols-outlined fs-5">edit_note</span>
                        </div>
                    </div>

                    {{-- Flash messages --}}

                    @if (session('success') || session('error') || $errors->any())
                        <div id="contact-feedback" class="mb-4" role="alert">
                            @if (session('success'))
                                <div class="alert alert-success mb-0">{{ session('success') }}</div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger mb-0">{{ session('error') }}</div>
                            @endif
                            @if ($errors->any() && !session('error'))
                                <div class="alert alert-danger mb-0">{{ __('contact.form.fix_errors') }}</div>
                            @endif
                        </div>
                    @endif

                    <form class="d-flex flex-column gap-4" action="{{ route('contact.store') }}" method="POST"
                        novalidate> @csrf
                        <div class="d-grid site-layout-grid-cols-1 site-responsive-md-layout-grid-cols-2 gap-4">
                            <div class="d-flex flex-column gap-2">
                                <label
                                    class="site-type-font-label-lg text-light d-flex align-items-center gap-1 text-white"
                                    for="clientName">{{ __('contact.form.name') }}
                                    <span class="text-primary text-dark">*</span></label>
                                <input
                                    class="w-100 site-dimension-h-arbitrary-52px site-surface-bg-surface-default text-light px-3 rounded-4 site-state-placeholder-color-text-text-muted site-state-focus-style-outline-none site-state-focus-border-ring-2 site-state-focus-border-ring-primary-fixed-opacity-40 site-motion-transition-all site-type-font-body-sm @error('name') site-border-ring-2 site-border-ring-red-500-opacity-60 @enderror text-white"
                                    id="clientName" name="name" value="{{ old('name') }}"
                                    placeholder="{{ __('contact.form.name_placeholder') }}" required type="text" />
                                @error('name')
                                    <p class="site-type-text-xs text-danger site-copy text-danger small fw-medium">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="d-flex flex-column gap-2">
                                <label
                                    class="site-type-font-label-lg text-light d-flex align-items-center gap-1 text-white"
                                    for="clientPhone">{{ __('contact.form.phone') }}
                                    <span class="text-primary text-dark">*</span></label>
                                <input
                                    class="w-100 site-dimension-h-arbitrary-52px site-surface-bg-surface-default text-light px-3 rounded-4 site-state-placeholder-color-text-text-muted site-state-focus-style-outline-none site-state-focus-border-ring-2 site-state-focus-border-ring-primary-fixed-opacity-40 site-motion-transition-all site-type-font-body-sm @error('phone') site-border-ring-2 site-border-ring-red-500-opacity-60 @enderror text-white"
                                    id="clientPhone" name="phone" value="{{ old('phone') }}"
                                    placeholder="{{ __('contact.form.phone_placeholder') }}" required type="tel" />
                                @error('phone')
                                    <p class="site-type-text-xs text-danger site-copy text-danger small fw-medium">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="d-grid site-layout-grid-cols-1 site-responsive-md-layout-grid-cols-2 gap-4">
                            <div class="d-flex flex-column gap-2">
                                <label class="site-type-font-label-lg text-light text-white"
                                    for="clientEmail">{{ __('contact.form.email') }}
                                    <span
                                        class="text-body-secondary site-type-font-caption text-secondary">{{ __('contact.form.optional') }}</span></label>
                                <input
                                    class="w-100 site-dimension-h-arbitrary-52px site-surface-bg-surface-default text-light px-3 rounded-4 site-state-placeholder-color-text-text-muted site-state-focus-style-outline-none site-state-focus-border-ring-2 site-state-focus-border-ring-primary-fixed-opacity-40 site-motion-transition-all site-type-font-body-sm @error('email') site-border-ring-2 site-border-ring-red-500-opacity-60 @enderror text-white"
                                    id="clientEmail" name="email" value="{{ old('email') }}"
                                    placeholder="{{ __('contact.form.email_placeholder') }}" type="email" />
                                @error('email')
                                    <p class="site-type-text-xs text-danger site-copy text-danger small fw-medium">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="d-flex flex-column gap-2">
                                <label
                                    class="site-type-font-label-lg text-light d-flex align-items-center gap-1 text-white"
                                    for="serviceType">{{ __('contact.form.service_type') }}
                                    <span class="text-primary text-dark">*</span></label>
                                <select
                                    class="w-100 site-dimension-h-arbitrary-52px site-surface-bg-surface-default text-light px-3 rounded-4 site-state-focus-style-outline-none site-state-focus-border-ring-2 site-state-focus-border-ring-primary-fixed-opacity-40 site-motion-transition-all site-type-font-body-sm site-effect-cursor-pointer text-white"
                                    id="serviceType" name="service_type" required>
                                    <option class="text-body-secondary text-secondary" disabled value=""
                                        @selected(!old('service_type'))>{{ __('contact.form.service_placeholder') }}
                                    </option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->title }}" @selected(old('service_type') === $service->title)>
                                            {{ $service->tr('title') }}</option>
                                    @endforeach
                                    @foreach (__('contact.form.extra_services') as $extra)
                                        <option value="{{ $extra }}" @selected(old('service_type') === $extra)>
                                            {{ $extra }}</option>
                                    @endforeach
                                </select> @error('service_type')
                                    <p class="site-type-text-xs text-danger site-copy text-danger small fw-medium">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <label class="site-type-font-label-lg text-light text-white"
                                for="budgetRange">{{ __('contact.form.budget') }}</label>
                            <select
                                class="w-100 site-dimension-h-arbitrary-52px site-surface-bg-surface-default text-light px-3 rounded-4 site-state-focus-style-outline-none site-state-focus-border-ring-2 site-state-focus-border-ring-primary-fixed-opacity-40 site-motion-transition-all site-type-font-body-sm site-effect-cursor-pointer text-white"
                                id="budgetRange" name="budget">
                                @foreach ($budgetOptions as $value => $label)
                                    <option value="{{ $value }}" @selected(old('budget', $budgetDefault) === $value)>
                                        {{ $label }}</option>
                                @endforeach
                            </select> @error('budget')
                                <p class="site-type-text-xs text-danger site-copy text-danger small fw-medium">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <label class="site-type-font-label-lg text-light text-white"
                                for="projectDetails">{{ __('contact.form.details') }}</label>
                            <textarea
                                class="w-100 site-surface-bg-surface-default text-light p-3 rounded-4 site-state-placeholder-color-text-text-muted site-state-focus-style-outline-none site-state-focus-border-ring-2 site-state-focus-border-ring-primary-fixed-opacity-40 site-motion-transition-all site-type-font-body-sm site-style-resize-none text-white"
                                id="projectDetails" name="message" placeholder="{{ __('contact.form.details_placeholder') }}" rows="4">{{ old('message') }}</textarea> @error('message')
                                <p class="site-type-text-xs text-danger site-copy text-danger small fw-medium">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                        <button
                            class="w-100 py-3 mt-2 bg-primary site-color-text-text-inverse site-type-font-headline-sm rounded-4 fw-bold site-elevation-shadow-arbitrary-0-0-24px-rgba-197-243-49-0-35 site-state-hover-surface-bg-primary-fixed-dim site-state-hover-motion-scale-arbitrary-1-01 site-state-active-motion-scale-arbitrary-0-99 site-motion-transition-all d-flex align-items-center justify-content-center gap-2 site-style-group site-effect-cursor-pointer text-black"
                            type="submit">
                            <span>{{ __('contact.form.submit') }}</span>
                            <span
                                class="material-symbols-outlined site-type-text-arbitrary-22px site-state-group-hover-motion-translate-x-1 site-motion-transition-transform">rocket_launch</span>
                        </button>
                        <div
                            class="d-flex align-items-center justify-content-center gap-2 text-body-secondary site-type-font-caption pt-2 text-secondary">
                            <span class="material-symbols-outlined fs-6 text-primary text-dark">lock</span>
                            <span>{{ __('contact.form.privacy') }}</span>
                        </div>
                    </form>
                </div>
                <div class="site-responsive-lg-layout-col-span-5 d-flex flex-column gap-4">
                    <div
                        class="site-surface-bg-surface-card rounded-4 p-4 site-responsive-lg-spacing-p-8 site-elevation-shadow-xl d-flex flex-column gap-4 bg-white">
                        <div class="d-flex align-items-center site-spacing-gap-3">
                            <div
                                class="site-dimension-w-12 site-dimension-h-12 rounded-4 site-surface-bg-primary-fixed-opacity-15 text-primary d-flex align-items-center justify-content-center text-dark site-accent-component">
                                <span
                                    class="material-symbols-outlined site-type-text-arbitrary-26px">headset_mic</span>
                            </div>
                            <div>
                                <h3 class="site-type-font-headline-sm text-light site-heading text-white">
                                    {{ __('contact.info.call_heading') }}</h3>
                                <p class="site-type-font-caption text-body-secondary site-copy text-secondary">
                                    {{ __('contact.info.call_text') }}</p>
                            </div>
                        </div>
                        <div
                            class="d-grid site-layout-grid-cols-1 site-responsive-sm-layout-grid-cols-2 site-spacing-gap-3">
                            <a class="d-flex align-items-center justify-content-center gap-2-5 site-spacing-py-3 px-3 rounded-4 site-surface-bg-surface-card-elevated text-primary site-type-font-headline-sm site-state-hover-surface-bg-surface-container-high site-motion-transition-all site-elevation-shadow-sm bg-white text-dark"
                                href="tel:01335198859">
                                <span class="material-symbols-outlined fs-5">call</span>
                                <span class="site-type-font-label-lg">{{ __('contact.info.call_button') }}</span>
                            </a>
                            <a class="d-flex align-items-center justify-content-center gap-2-5 site-spacing-py-3 px-3 rounded-4 site-surface-bg-success-whatsapp site-color-text-text-inverse site-type-font-headline-sm fw-bold site-state-hover-style-brightness-110 site-motion-transition-all site-elevation-shadow-md text-black"
                                href="https://wa.me/8801335198859" rel="noopener noreferrer" target="_blank">
                                <span class="material-symbols-outlined fs-5">chat</span>
                                <span class="site-type-font-label-lg">{{ __('contact.info.whatsapp_button') }}</span>
                            </a>
                        </div>
                        <div class="d-flex flex-column site-spacing-gap-3-5 pt-2">
                            <div
                                class="d-flex align-items-center site-spacing-gap-3 site-spacing-p-3 rounded-3 site-surface-bg-surface-default">
                                <span
                                    class="material-symbols-outlined text-primary fs-5 text-dark">phone_in_talk</span>
                                <div class="d-flex flex-column">
                                    <span
                                        class="site-type-font-caption text-body-secondary text-secondary">{{ __('contact.info.hotline') }}</span>
                                    <a class="site-type-font-label-lg text-light site-state-hover-color-text-primary-fixed site-motion-transition-colors text-white"
                                        href="tel:01335198859">{{ __('site.phone') }}</a>
                                </div>
                            </div>
                            <div
                                class="d-flex align-items-center site-spacing-gap-3 site-spacing-p-3 rounded-3 site-surface-bg-surface-default">
                                <span class="material-symbols-outlined text-primary fs-5 text-dark">mail</span>
                                <div class="d-flex flex-column">
                                    <span
                                        class="site-type-font-caption text-body-secondary text-secondary">{{ __('contact.info.email') }}</span>
                                    <a class="site-type-font-label-lg text-light site-state-hover-color-text-primary-fixed site-motion-transition-colors text-white"
                                        href="mailto:contact.whexsoft@gmail.com">contact.whexsoft@gmail.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="site-surface-bg-surface-card rounded-4 p-4 site-responsive-lg-spacing-p-8 site-elevation-shadow-xl d-flex flex-column gap-3 bg-white">
                        <div class="d-flex align-items-start site-spacing-gap-3">
                            <div
                                class="site-dimension-w-10 site-dimension-h-10 rounded-3 site-surface-bg-primary-fixed-opacity-15 text-primary d-flex align-items-center justify-content-center flex-shrink-0 site-spacing-mt-0-5 text-dark site-accent-component">
                                <span
                                    class="material-symbols-outlined site-type-text-arbitrary-22px">location_on</span>
                            </div>
                            <div>
                                <h4 class="site-type-font-title-md text-light site-heading text-white">
                                    {{ __('contact.info.office_heading') }}</h4>
                                <p class="site-type-font-body-sm text-body-secondary mt-1 site-copy text-secondary">
                                    {{ __('contact.info.office_address') }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start site-spacing-gap-3 pt-2">
                            <div
                                class="site-dimension-w-10 site-dimension-h-10 rounded-3 site-surface-bg-surface-card-elevated text-body-secondary d-flex align-items-center justify-content-center flex-shrink-0 site-spacing-mt-0-5 bg-white text-secondary">
                                <span class="material-symbols-outlined site-type-text-arbitrary-22px">schedule</span>
                            </div>
                            <div>
                                <h4 class="site-type-font-title-md text-light site-heading text-white">
                                    {{ __('contact.info.hours_heading') }}</h4>
                                <p class="site-type-font-body-sm text-body-secondary mt-1 site-copy text-secondary">
                                    {{ __('contact.info.hours') }}</p>
                                <span
                                    class="d-inline-block mt-1 text-primary site-type-font-caption text-dark">{{ __('contact.info.closed') }}</span>
                            </div>
                        </div>
                        <div
                            class="w-100 mt-2 rounded-4 overflow-hidden site-elevation-shadow-inner position-relative site-style-group site-dimension-h-52 site-surface-bg-surface-card-elevated bg-white">
                            <div class="w-100 h-100 site-surface-bg-cover site-surface-bg-center site-motion-transition-transform site-motion-duration-700 site-state-group-hover-motion-scale-105"
                                style="background-image: url('{{ asset('assets/frontend/images/office-map.jpg') }}')">
                            </div>
                            <div
                                class="position-absolute top-0 end-0 bottom-0 start-0 site-surface-bg-gradient-to-t site-surface-from-surface-card site-surface-via-transparent site-surface-to-black-opacity-30 pe-none site-gradient-background">
                            </div>
                            <div
                                class="position-absolute site-position-bottom-3 site-position-left-3 site-position-right-3 site-spacing-p-3 rounded-3 site-surface-bg-surface-card-opacity-95 site-effect-backdrop-blur-md d-flex align-items-center justify-content-between site-elevation-shadow-lg bg-white">
                                <div class="d-flex align-items-center gap-2">
                                    <span
                                        class="site-dimension-w-2-5 site-dimension-h-2-5 rounded-pill bg-primary site-motion-animate-ping"></span>
                                    <span class="site-type-font-label-lg text-light text-white">WhexSoft Dhaka
                                        Studio</span>
                                </div>
                                <a class="site-type-font-caption text-primary site-state-hover-type-underline d-flex align-items-center gap-1 text-dark"
                                    href="https://maps.google.com/?q=Sonir+Akhra,+Jatrabari,+Dhaka"
                                    rel="noopener noreferrer" target="_blank">
                                    <span>{{ __('contact.info.map_link') }}</span>
                                    <span
                                        class="material-symbols-outlined site-type-text-arbitrary-14px">open_in_new</span>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between pt-3">
                            <span
                                class="site-type-font-caption text-body-secondary text-uppercase site-type-tracking-wider text-secondary">{{ __('contact.info.social') }}</span>
                            <div class="d-flex align-items-center gap-2">
                                <a class="site-dimension-w-9 site-dimension-h-9 rounded-3 site-surface-bg-surface-card-elevated d-flex align-items-center justify-content-center text-body-secondary site-state-hover-color-text-primary-fixed site-state-hover-surface-bg-primary-fixed-opacity-10 site-motion-transition-all bg-white text-secondary site-accent-component"
                                    href="https://www.facebook.com/" rel="noopener noreferrer" target="_blank"
                                    title="Facebook"><span
                                        class="material-symbols-outlined site-type-text-arbitrary-18px">public</span></a>
                                <a class="site-dimension-w-9 site-dimension-h-9 rounded-3 site-surface-bg-surface-card-elevated d-flex align-items-center justify-content-center text-body-secondary site-state-hover-color-text-primary-fixed site-state-hover-surface-bg-primary-fixed-opacity-10 site-motion-transition-all bg-white text-secondary site-accent-component"
                                    href="https://linkedin.com/company/whexsoft" rel="noopener noreferrer"
                                    target="_blank" title="LinkedIn"><span
                                        class="material-symbols-outlined site-type-text-arbitrary-18px">badge</span></a>
                                <a class="site-dimension-w-9 site-dimension-h-9 rounded-3 site-surface-bg-surface-card-elevated d-flex align-items-center justify-content-center text-body-secondary site-state-hover-color-text-success-whatsapp site-state-hover-surface-bg-success-whatsapp-opacity-10 site-motion-transition-all bg-white text-secondary"
                                    href="https://wa.me/8801335198859" rel="noopener noreferrer" target="_blank"
                                    title="WhatsApp"><span
                                        class="material-symbols-outlined site-type-text-arbitrary-18px">chat</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="w-100 position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--dark">
        <div
            class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
            <div class="text-center site-spacing-mb-10">
                <h3 class="site-type-font-headline-md text-light site-heading text-white">
                    {{ __('contact.faq.heading') }}</h3>
                <p class="site-type-font-body-sm text-body-secondary mt-1 site-copy text-secondary">
                    {{ __('contact.faq.subheading') }}</p>
            </div>
            <div class="d-grid site-layout-grid-cols-1 site-responsive-md-layout-grid-cols-3 gap-4">
                @foreach (__('contact.faq.items') as $item)
                    <div
                        class="site-surface-bg-surface-card p-4 rounded-4 site-elevation-shadow-md d-flex flex-column site-spacing-gap-3 bg-white">
                        <div
                            class="site-dimension-w-8 site-dimension-h-8 rounded-pill site-surface-bg-primary-fixed-opacity-15 text-primary d-flex align-items-center justify-content-center flex-shrink-0 text-dark site-accent-component">
                            <span
                                class="material-symbols-outlined site-type-text-arbitrary-18px">{{ $item['icon'] }}</span>
                        </div>
                        <h4 class="site-type-font-title-md text-light site-heading text-white">{{ $item['question'] }}
                        </h4>
                        <p
                            class="site-type-font-body-sm text-body-secondary site-type-leading-relaxed site-copy text-secondary">
                            {{ $item['answer'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Contact Section --}}
    @include('partials.frontend.contact-section')

    @if (session('success') || session('error') || $errors->any())
        <script>
            document.getElementById('contact-feedback')
                ?.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
        </script>
    @endif

</x-frontend.page>
@endsection
