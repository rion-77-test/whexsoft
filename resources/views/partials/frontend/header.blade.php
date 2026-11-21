@php
    $navLink = 'site-type-font-label-lg site-type-text-label-lg site-motion-transition-colors fs-6';
    $navActive = 'text-primary fw-semibold text-dark';
    $navIdle = 'site-color-text-on-surface-variant site-state-hover-color-text-on-surface text-secondary';

    // One list for desktop and mobile: route name, active-route pattern, language key
    $menu = [
        ['route' => 'home', 'match' => 'home', 'label' => 'nav.home'],
        ['route' => 'services.index', 'match' => 'services.*', 'label' => 'nav.services'],
        ['route' => 'portfolio.index', 'match' => 'portfolio.*', 'label' => 'nav.portfolio'],
        ['route' => 'contact', 'match' => 'contact', 'label' => 'nav.contact'],
    ];
@endphp
<header
    class="position-fixed top-0 w-100 site-position-z-50 site-surface-bg-canvas-base-opacity-85 site-effect-backdrop-blur-xl border-bottom site-border-border-border-subtle site-header site-soft-border"
    id="site-header">
    <div
        class="site-dimension-h-20 site-dimension-max-w-7xl mx-auto site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10 d-flex align-items-center justify-content-between gap-3">
        <a class="d-flex align-items-center gap-2-5 site-responsive-sm-spacing-gap-3 site-dimension-min-w-0"
            href="{{ route('home') }}" aria-label="{{ __('nav.brand_home') }}">
            <img alt="WhexSoft logo" class="site-dimension-h-8 w-auto object-fit-contain flex-shrink-0 rounded-1"
                src="{{ asset('assets/frontend/images/whexsoft-logo.png') }}" />
        </a>

        {{-- Desktop Links --}}
        <nav class="d-none d-lg-flex align-items-center site-spacing-gap-8" aria-label="{{ __('nav.primary_menu') }}">
            @foreach ($menu as $item)
                @php($active = request()->routeIs($item['match']))
                <a class="{{ $navLink }} {{ $active ? $navActive : $navIdle }}"
                    @if ($active) aria-current="page" @endif
                    href="{{ route($item['route']) }}">{{ __($item['label']) }}</a>
            @endforeach
        </nav>
        <div class="d-flex align-items-center gap-3 flex-shrink-0">
            <x-frontend.language-switcher />
            <a class="d-none d-xl-flex align-items-center gap-2 site-type-font-label-lg site-type-text-label-lg text-body-secondary site-state-hover-color-text-primary-container site-motion-transition-colors text-secondary fs-6 site-accent-hover"
                href="tel:01335198859">
                <span class="material-symbols-outlined site-type-text-arbitrary-18px">call</span>
                <span>{!! __('site.phone_markup') !!}</span>
            </a>
            <a class="d-none d-sm-inline-flex align-items-center justify-content-center site-dimension-h-10 px-3 rounded-3 bg-primary site-color-text-text-inverse site-type-font-label-lg site-type-text-label-lg fw-semibold site-state-hover-surface-bg-primary-fixed-dim site-motion-transition-all site-elevation-shadow-arbitrary-0-0-20px-rgba-198-244-50-0-25 text-black fs-6"
                href="{{ route('contact') }}">{{ __('nav.cta') }}</a>
            <button id="menu-toggle" type="button"
                class="d-lg-none site-dimension-w-11 site-dimension-h-11 rounded-3 site-surface-bg-surface-card d-flex align-items-center justify-content-center text-light bg-white text-white"
                aria-expanded="false" aria-controls="mobile-menu" aria-label="{{ __('nav.open_menu') }}">
                <span class="material-symbols-outlined">menu</span>
            </button>
        </div>
    </div>
    <div id="mobile-menu"
        class="d-none d-lg-none site-surface-bg-canvas-base border-top site-border-border-border-subtle site-dimension-max-h-arbitrary-calc-100vh-5rem overflow-y-auto pb-3 site-soft-border">
        {{-- Mobile Links --}}
        
        @foreach ($menu as $item)
            @php($active = request()->routeIs($item['match']))
            <a class="d-block site-spacing-px-5 site-responsive-sm-spacing-px-8 site-spacing-py-3-5 site-type-font-label-lg site-type-text-label-lg {{ $active ? $navActive : $navIdle }}"
                @if ($active) aria-current="page" @endif
                href="{{ route($item['route']) }}">{{ __($item['label']) }}</a>
        @endforeach

        <div
            class="site-spacing-px-5 site-responsive-sm-spacing-px-8 site-spacing-pt-3 d-flex flex-column site-spacing-gap-3">
            <div class="d-flex justify-content-center">
                <x-frontend.language-switcher />
            </div>
            <a class="d-flex align-items-center justify-content-center site-dimension-h-12 rounded-3 bg-primary site-color-text-text-inverse site-type-font-label-lg site-type-text-label-lg fw-semibold text-black fs-6"
                href="{{ route('contact') }}">{{ __('nav.cta') }}</a>
            <a class="d-flex align-items-center justify-content-center gap-2 site-dimension-h-12 rounded-3 site-surface-bg-surface-card text-light site-type-font-label-lg site-type-text-label-lg bg-white text-white fs-6"
                href="tel:01335198859">
                <span
                    class="material-symbols-outlined site-type-text-arbitrary-18px text-primary text-dark">call</span>{!! __('site.phone') !!}
            </a>
        </div>
    </div>
</header>

@if (session('success'))
    <div class="position-fixed site-position-top-24 start-50 translate-middle-x site-position-z-arbitrary-60 site-dimension-w-arbitrary-calc-100-percent-2-5rem site-dimension-max-w-xl rounded-4 site-surface-bg-arbitrary-hex-122218 border site-border-border-primary-fixed-opacity-40 site-spacing-px-5 site-spacing-py-3-5 site-type-text-sm site-color-text-slate-100 site-elevation-shadow-2xl d-flex align-items-start gap-2-5 bg-white text-white fs-6 fw-medium"
        role="status">
        <span class="material-symbols-outlined text-primary fs-5 flex-shrink-0 text-dark">check_circle</span>
        <span>{{ session('success') }}</span>
    </div>
    @endif @if (session('error'))
        <div class="position-fixed site-position-top-24 start-50 translate-middle-x site-position-z-arbitrary-60 site-dimension-w-arbitrary-calc-100-percent-2-5rem site-dimension-max-w-xl rounded-4 site-surface-bg-arbitrary-hex-221314 border site-border-border-red-500-opacity-40 site-spacing-px-5 site-spacing-py-3-5 site-type-text-sm site-color-text-slate-100 site-elevation-shadow-2xl d-flex align-items-start gap-2-5 text-white fs-6 fw-medium"
            role="alert">
            <span class="material-symbols-outlined text-danger fs-5 flex-shrink-0">error</span>
            <span>{{ session('error') }}</span>
        </div>
    @endif
