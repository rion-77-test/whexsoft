@php
    $navLink = 'font-label-lg text-label-lg transition-colors';
    $navActive = 'text-primary-container font-semibold';
    $navIdle = 'text-on-surface-variant hover:text-on-surface';
@endphp
<header class="fixed top-0 w-full z-50 bg-canvas-base/85 backdrop-blur-xl border-b border-border-subtle" id="site-header">
    <div class="h-20 max-w-7xl mx-auto px-5 sm:px-8 lg:px-10 flex items-center justify-between gap-space-md">
        <a class="flex items-center gap-2.5 sm:gap-3 min-w-0" href="{{ route('home') }}" aria-label="WhexSoft হোম">
            <img alt="WhexSoft logo" class="h-8 w-auto object-contain shrink-0 rounded" src="{{ asset('assets/frontend/images/whexsoft-logo.jpg') }}" />
            <div class="flex flex-col min-w-0">
                <span class="font-title-md text-title-md text-text-primary tracking-tight">WhexSoft</span>
                <span class="hidden min-[380px]:block font-label-md text-label-md text-text-muted uppercase tracking-wider">Dhaka Studio</span>
            </div>
        </a>
        <nav class="hidden lg:flex items-center gap-8" aria-label="প্রধান মেনু">
            <a class="{{ $navLink }} {{ request()->routeIs('home') ? $navActive : $navIdle }}" @if(request()->routeIs('home')) aria-current="page" @endif href="{{ route('home') }}">হোম</a>
            <a class="{{ $navLink }} {{ request()->routeIs('services.*') ? $navActive : $navIdle }}" @if(request()->routeIs('services.*')) aria-current="page" @endif href="{{ route('services.index') }}">সার্ভিসসমূহ</a>
            <a class="{{ $navLink }} {{ request()->routeIs('portfolio.*') ? $navActive : $navIdle }}" @if(request()->routeIs('portfolio.*')) aria-current="page" @endif href="{{ route('portfolio.index') }}">আমাদের কাজ</a>
            <a class="{{ $navLink }} {{ request()->routeIs('pricing') ? $navActive : $navIdle }}" @if(request()->routeIs('pricing')) aria-current="page" @endif href="{{ route('pricing') }}">প্যাকেজ ও মূল্য</a>
            <a class="{{ $navLink }} {{ request()->routeIs('blog.*') ? $navActive : $navIdle }}" @if(request()->routeIs('blog.*')) aria-current="page" @endif href="{{ route('blog.index') }}">ব্লগ</a>
        </nav>
        <div class="flex items-center gap-space-md shrink-0">
            <a class="hidden xl:flex items-center gap-2 font-label-lg text-label-lg text-text-secondary hover:text-primary-container transition-colors" href="tel:01335198859">
                <span class="material-symbols-outlined text-[18px]">call</span>
                <span>০১৩৩৫-১৯৮৮৫৯</span>
            </a>
            <button id="theme-toggle" type="button" class="w-11 h-11 rounded-lg bg-surface-card border border-border-subtle flex items-center justify-center text-text-primary transition-colors hover:bg-surface-card-elevated focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2" aria-label="লাইট মোড" aria-pressed="false" title="লাইট মোড চালু করুন">
                <span id="theme-toggle-icon" class="material-symbols-outlined" aria-hidden="true">light_mode</span>
            </button>
            <a class="hidden sm:inline-flex items-center justify-center h-10 px-space-md rounded-lg bg-primary-container text-text-inverse font-label-lg text-label-lg font-semibold hover:bg-primary-fixed-dim transition-all shadow-[0_0_20px_rgba(198,244,50,0.25)]" href="{{ route('contact') }}">ফ্রি পরামর্শ নিন</a>
            <button id="menu-toggle" type="button" class="lg:hidden w-11 h-11 rounded-lg bg-surface-card flex items-center justify-center text-text-primary" aria-expanded="false" aria-controls="mobile-menu" aria-label="মেনু খুলুন">
                <span class="material-symbols-outlined">menu</span>
            </button>
        </div>
    </div>
    <div id="mobile-menu" class="hidden lg:hidden bg-canvas-base border-t border-border-subtle max-h-[calc(100vh-5rem)] overflow-y-auto pb-space-md">
        <a class="block px-5 sm:px-8 py-3.5 font-label-lg text-label-lg {{ request()->routeIs('home') ? $navActive : $navIdle }}" href="{{ route('home') }}">হোম</a>
        <a class="block px-5 sm:px-8 py-3.5 font-label-lg text-label-lg {{ request()->routeIs('services.*') ? $navActive : $navIdle }}" href="{{ route('services.index') }}">সার্ভিসসমূহ</a>
        <a class="block px-5 sm:px-8 py-3.5 font-label-lg text-label-lg {{ request()->routeIs('portfolio.*') ? $navActive : $navIdle }}" href="{{ route('portfolio.index') }}">আমাদের কাজ</a>
        <a class="block px-5 sm:px-8 py-3.5 font-label-lg text-label-lg {{ request()->routeIs('pricing') ? $navActive : $navIdle }}" href="{{ route('pricing') }}">প্যাকেজ ও মূল্য</a>
        <a class="block px-5 sm:px-8 py-3.5 font-label-lg text-label-lg {{ request()->routeIs('blog.*') ? $navActive : $navIdle }}" href="{{ route('blog.index') }}">ব্লগ</a>
        <a class="block px-5 sm:px-8 py-3.5 font-label-lg text-label-lg {{ request()->routeIs('about') ? $navActive : $navIdle }}" href="{{ route('about') }}">আমাদের সম্পর্কে</a>
        <a class="block px-5 sm:px-8 py-3.5 font-label-lg text-label-lg {{ request()->routeIs('faq') ? $navActive : $navIdle }}" href="{{ route('faq') }}">এফএকিউ</a>
        <a class="block px-5 sm:px-8 py-3.5 font-label-lg text-label-lg {{ request()->routeIs('contact') ? $navActive : $navIdle }}" href="{{ route('contact') }}">যোগাযোগ</a>
        <div class="px-5 sm:px-8 pt-3 flex flex-col gap-3">
            <a class="flex items-center justify-center h-12 rounded-lg bg-primary-container text-text-inverse font-label-lg text-label-lg font-semibold" href="{{ route('contact') }}">ফ্রি পরামর্শ নিন</a>
            <a class="flex items-center justify-center gap-2 h-12 rounded-lg bg-surface-card text-text-primary font-label-lg text-label-lg" href="tel:01335198859">
                <span class="material-symbols-outlined text-[18px] text-primary-container">call</span>০১৩৩৫-১৯৮৮৫৯
            </a>
        </div>
    </div>
</header>

@if (session('success'))
    <div class="fixed top-24 left-1/2 -translate-x-1/2 z-[60] w-[calc(100%-2.5rem)] max-w-xl rounded-xl bg-[#122218] border border-primary-fixed/40 px-5 py-3.5 text-sm text-slate-100 shadow-2xl flex items-start gap-2.5" role="status">
        <span class="material-symbols-outlined text-primary-fixed text-[20px] shrink-0">check_circle</span>
        <span>{{ session('success') }}</span>
    </div>
@endif

@if (session('error'))
    <div class="fixed top-24 left-1/2 -translate-x-1/2 z-[60] w-[calc(100%-2.5rem)] max-w-xl rounded-xl bg-[#221314] border border-red-500/40 px-5 py-3.5 text-sm text-slate-100 shadow-2xl flex items-start gap-2.5" role="alert">
        <span class="material-symbols-outlined text-red-400 text-[20px] shrink-0">error</span>
        <span>{{ session('error') }}</span>
    </div>
@endif
