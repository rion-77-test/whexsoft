@extends('layouts.frontend') @section('title', 'আমাদের কাজ | WhexSoft')
@section('description',
    'WhexSoft-এর নির্বাচিত ওয়েবসাইট ও ডিজিটাল প্রজেক্ট দেখুন। প্রতিটি কাজের বিস্তারিত জানতে
    প্রজেক্টের পাতায় যান।')
    @section('page', 'portfolio') @section('content')

    <x-frontend.page>
        <section
            class="position-relative w-100 overflow-hidden site-spacing-pt-32 site-responsive-md-spacing-pt-40 pb-5 site-responsive-md-spacing-pb-16 site-section site-section--dark">
            <div
                class="site-dimension-max-w-7xl mx-auto position-relative site-position-z-10 d-flex flex-column align-items-center text-center w-100 site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <x-frontend.eyebrow class="d-inline-block mb-2">নির্বাচিত
                    প্রজেক্ট</x-frontend.eyebrow>
                <h1
                    class="site-type-font-display site-type-text-3xl site-responsive-sm-type-text-4xl site-responsive-lg-type-text-5xl site-type-font-extrabold text-white site-type-tracking-tight lh-sm site-dimension-max-w-3xl site-heading text-white">
                    আমাদের
                    <span class="text-primary text-dark">নির্বাচিত কাজ</span>
                </h1>
                <p
                    class="site-color-text-slate-300 site-type-text-sm site-responsive-sm-type-text-base site-spacing-mt-3 site-dimension-max-w-2xl site-type-leading-relaxed site-copy text-secondary fs-6 fw-medium">
                    উচ্চ-কার্যকর ওয়েবসাইট ও ডিজিটাল অভিজ্ঞতার মাধ্যমে বিভিন্ন ব্র্যান্ডের প্রবৃদ্ধিতে আমাদের কাজগুলো দেখুন।
                </p>

            </div>
        </section>
        <section class="w-100 position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--light">

            <div
                class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">

                <div id="portfolio-wrapper">
                    {{-- Category Filters --}}
                    <div id="portfolio-filters"
                        class="site-spacing-mt-10 d-flex flex-wrap align-items-center justify-content-center gap-2-5 site-responsive-sm-spacing-gap-3 mb-5">
                        <a href="{{ route('portfolio.index') }}" data-portfolio-filter data-category=""
                            class="service-filter site-spacing-px-5 py-2 rounded-pill fw-semibold border small site-motion-transition-all {{ $activeCategory === '' ? 'is-active' : '' }}">
                            সব প্রজেক্ট</a>

                        @foreach ($categories as $category)
                            <a href="{{ route('portfolio.index', ['category' => $category->slug]) }}" data-portfolio-filter
                                data-category="{{ $category->slug }}"
                                class="service-filter site-spacing-px-5 py-2 rounded-pill fw-semibold border small site-motion-transition-all {{ $activeCategory === $category->slug ? 'is-active' : '' }}">
                                {{ $category->name }}</a>
                        @endforeach
                    </div>

                    {{-- Projects + pagination --}}
                    <div id="portfolio-results">
                        @include('frontend.portfolio.partials.grid')
                    </div>
                </div>
            </div>
        </section>
        <section class="w-100 position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--dark">
            <div
                class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <div
                    class="site-surface-bg-arbitrary-hex-111722 site-shape-rounded-3xl p-4 site-responsive-sm-spacing-p-10 border site-border-border-primary-fixed-opacity-25 position-relative overflow-hidden site-elevation-shadow-arbitrary-0-20px-50px-rgba-0-0-0-0-6 bg-white">
                    <div
                        class="position-absolute site-style-right-20 site-style-bottom-20 site-dimension-w-80 site-dimension-h-80 bg-primary bg-opacity-10 rounded-pill site-effect-blur-3xl pe-none">
                    </div>
                    <div
                        class="d-grid site-layout-grid-cols-1 site-responsive-lg-layout-grid-cols-12 site-spacing-gap-8 align-items-center position-relative site-position-z-10">
                        <div class="site-responsive-lg-layout-col-span-6">
                            <span
                                class="site-type-font-mono site-type-text-xs text-primary text-uppercase site-type-tracking-wider fw-semibold text-dark small">আমাদের
                                কাজের পদ্ধতি</span>
                            <h2
                                class="site-type-font-display fs-4 lh-lg site-responsive-sm-type-text-3xl fw-bold text-white mt-2 lh-sm site-heading text-white">
                                প্রতিটি প্রজেক্টের সমাধান আলাদা</h2>
                            <p
                                class="site-color-text-slate-300 site-type-text-sm site-responsive-sm-type-text-base site-spacing-mt-3 site-type-leading-relaxed site-copy text-secondary fs-6 fw-medium">
                                আপনার ব্যবসা, গ্রাহক ও কাজের লক্ষ্য বুঝে পেজ, ফিচার এবং সংযোগের পরিকল্পনা করি। ফলাফল নির্ভর
                                করে প্রজেক্টের ধরন ও বাস্তব ব্যবসায়িক পরিস্থিতির ওপর।</p>
                        </div>
                        <div
                            class="site-responsive-lg-layout-col-span-6 d-grid site-layout-grid-cols-1 site-responsive-sm-layout-grid-cols-2 site-spacing-gap-3">
                            @foreach ([['devices', 'ব্যবহারযোগ্য লেআউট', 'মোবাইল ও কম্পিউটারে তথ্য সহজে দেখার ব্যবস্থা।'], ['dashboard_customize', 'প্রয়োজনীয় ফিচার', 'প্রজেক্টের পরিধি অনুযায়ী ফিচার বেছে নেওয়া।'], ['palette', 'ব্র্যান্ড অনুযায়ী ডিজাইন', 'আপনার ব্যবসার পরিচিতির সঙ্গে মানানসই উপস্থাপন।'], ['handshake', 'আলোচনা ও পর্যালোচনা', 'গুরুত্বপূর্ণ সিদ্ধান্তে আপনাকে যুক্ত রাখা।']] as [$icon, $title, $text])
                                <div
                                    class="d-flex align-items-start site-spacing-gap-3-5 site-surface-bg-arbitrary-hex-0b0f14 p-3 rounded-4 border border-white border-opacity-10 bg-white site-soft-border">
                                    <span
                                        class="material-symbols-outlined text-primary site-type-text-arbitrary-22px text-dark">{{ $icon }}</span>
                                    <div>
                                        <h3 class="site-type-text-sm fw-semibold text-white site-heading text-white fs-6">
                                            {{ $title }}</h3>
                                        <p
                                            class="site-type-text-xs site-color-text-slate-300 mt-1 site-copy text-secondary small fw-medium">
                                            {{ $text }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Contact Section --}}
        @include('partials.frontend.contact-section')
    </x-frontend.page>
@endsection
