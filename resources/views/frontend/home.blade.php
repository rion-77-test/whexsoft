@extends('layouts.frontend') @section('title', 'WhexSoft | আপনার ব্যবসার জন্য ওয়েবসাইট ও ডিজিটাল সলিউশন')
@section('description',
    'ই-কমার্স, ল্যান্ডিং পেজ ও কাস্টম ওয়েবসাইট নিয়ে কথা বলুন WhexSoft-এর সঙ্গে। আপনার লক্ষ্য ও
    কাজের পরিধি বুঝে আমরা সমাধানের প্রস্তাব দিই।')

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
                            class="site-type-text-xs site-type-font-mono text-white fw-semibold site-type-tracking-wider text-white small">&nbsp;ওয়েব
                            ডিজাইন ও ডেভেলপমেন্ট স্টুডিও</span>
                    </div>
                    <h1
                        class="site-type-font-heading site-type-text-4xl site-responsive-sm-type-text-5xl site-responsive-lg-type-text-7xl site-type-font-extrabold site-color-text-arbitrary-hex-070400 site-type-tracking-tight site-type-leading-arbitrary-1-15 mb-4 site-heading text-black">
                        অনলাইন যাত্রা শুরুর
                        <span class="text-primary text-dark">ডিজিটাল সমাধান</span>
                    </h1>
                    <p
                        class="fs-6 site-responsive-sm-type-text-lg site-responsive-lg-type-text-xl site-color-text-slate-200 site-dimension-max-w-2xl mb-4 site-type-leading-relaxed site-copy text-secondary">
                        WhexSoft আপনার ধারণাকে বাস্তবে রূপ দেয়। কাস্টমারের কাছে আপনার ব্র্যান্ডকে বিশ্বাসযোগ্য করে তুলতে
                        আমরা তৈরি করছি মোবাইল-ফ্রেন্ডলি ও ফাস্ট-লোডিং ওয়েবসাইট।</p>

                    {{-- Statistics --}}
                    <div class="d-flex flex-wrap gap-4 site-responsive-sm-spacing-gap-8 site-spacing-mb-8"
                        aria-label="আমাদের অর্জন">
                        @foreach ([['700+', 'আমাদের পার্টনার'], ['90M+', 'সাইট ভিজিটর'], ['15+', 'দেশে কাজের অভিজ্ঞতা']] as [$number, $label])
                            <div>
                                <div
                                    class="site-type-font-heading site-type-text-3xl site-type-font-extrabold lh-1 text-dark">
                                    {{ $number }}</div>
                                <div class="site-type-text-sm fw-medium mt-1 site-copy">{{ $label }}</div>
                            </div>
                        @endforeach
                    </div>

                    <div class="d-flex flex-column flex-md-row gap-2 gap-md-4 hero-btn-wrapper">
                        <a class="justify-content-center w-100 site-responsive-sm-dimension-w-auto site-spacing-px-8 py-3 rounded-pill bg-primary site-color-text-arbitrary-hex-070a0e site-type-font-heading fs-6 fw-bold site-elevation-shadow-arbitrary-0-0-30px-rgba-197-243-49-0-35 site-state-hover-surface-bg-primary-fixed-dim site-state-hover-motion-scale-105 site-motion-transition-all d-flex align-items-center gap-2"
                            href="{{ route('contact') }}">
                            <span>প্রজেক্ট শুরু করুন</span>
                            <span class="material-symbols-outlined fs-5">arrow_forward</span>
                        </a>
                        <a class="justify-content-center w-100 site-responsive-sm-dimension-w-auto site-spacing-px-8 py-3 rounded-pill site-surface-bg-white-opacity-10 site-effect-backdrop-blur-md site-state-hover-surface-bg-white-opacity-15 border site-border-border-white-opacity-25 text-white site-type-font-heading fs-6 fw-semibold site-motion-transition-all d-flex align-items-center gap-2 site-white-tint site-soft-border text-white"
                            href="{{ route('portfolio.index') }}">
                            <span class="material-symbols-outlined text-primary fs-5 text-dark">play_circle</span>
                            <span>কাজ দেখুন</span>
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
                        <x-frontend.eyebrow>মূল
                            সেবাসমূহ</x-frontend.eyebrow>
                        <h2
                            class="site-type-font-heading fs-3 lh-sm site-responsive-sm-type-text-4xl site-responsive-md-type-text-headline-lg site-type-font-extrabold text-white mt-3 site-heading text-white">
                            আপনার ব্যবসাকে অনলাইনে এগিয়ে নিতে আমাদের সার্ভিসসমূহ</h2>
                        <p
                            class="site-color-text-slate-300 site-dimension-max-w-md site-type-text-sm site-responsive-sm-type-text-base site-copy text-secondary fs-6 fw-medium">
                            আপনার ব্যবসার ধরণ ও লক্ষ্য বুঝে উপযুক্ত ওয়েবসাইট তৈরি করতে আমরা সাহায্য করি।</p>
                    </div>
                    <x-frontend.buttons.section :href="route('services.index')" text="আমাদের সব সার্ভিস দেখুন" />
                </div>
                @if ($services->isEmpty())
                    <div
                        class="rounded-4 border border-white border-opacity-10 site-surface-bg-arbitrary-hex-111722 site-spacing-p-8 text-center site-color-text-slate-300 bg-white site-soft-border text-secondary">
                        এখনো কোনো সার্ভিস যুক্ত করা হয়নি।</div>
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
                        <x-frontend.eyebrow>নির্বাচিত
                            প্রজেক্ট</x-frontend.eyebrow>
                        <h2
                            class="site-type-font-heading fs-3 lh-sm site-responsive-sm-type-text-4xl site-responsive-md-type-text-headline-lg site-type-font-extrabold text-white mt-3 site-heading text-white">
                            আমাদের সাম্প্রতিক কাজ</h2>
                    </div>
                    <x-frontend.buttons.section :href="route('portfolio.index')" text="সকল প্রজেক্ট দেখুন" />
                </div>
                @if ($projects->isEmpty())
                    <div
                        class="rounded-4 border border-white border-opacity-10 site-surface-bg-arbitrary-hex-111722 site-spacing-p-8 text-center site-color-text-slate-300 bg-white site-soft-border text-secondary">
                        এখনো কোনো প্রজেক্ট প্রকাশ করা হয়নি।</div>
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
                <div><x-frontend.eyebrow>আমাদের
                        পরিচিতি</x-frontend.eyebrow>
                    <h2
                        class="site-type-font-heading fs-3 lh-sm site-responsive-sm-type-text-4xl site-responsive-md-type-text-headline-lg site-type-font-extrabold text-white mt-3 site-spacing-mb-8 site-heading text-white">
                        কেন আমাদের বেছে নিবেন?</h2>
                </div>
                <div class="row g-4 align-items-center">
                    <div class="col-12 col-lg-7">
                        <div class="row row-cols-1 row-cols-sm-2 g-3">
                            <x-frontend.card.why-us icon="palette" title="আপনার ব্র্যান্ড অনুযায়ী ডিজাইন"
                                text="ব্যবসার ধরন, পণ্য আর গ্রাহকের রুচি বুঝে প্রতিটি পেজের ডিজাইন করে থাকি, যেন সাইটটি সত্যিকার অর্থেই আপনার হয়ে কথা বলে।" />

                            <x-frontend.card.why-us icon="speed" title="দ্রুত লোডিং ও সহজ নেভিগেশন"
                                text="আমাদের মূল লক্ষ্য থাকে ভিজিটররা যেন কোনো ঝামেলা ছাড়াই প্রয়োজনীয় তথ্য খুঁজে পান এবং সাইটটি দ্রুত লোড হয়" />

                            <x-frontend.card.why-us icon="dashboard_customize" title="নিজের মতো কনটেন্ট বদলানোর সুবিধা"
                                text="আমরা এমন একটি ড্যাশবোর্ড যুক্ত করে দিই, যেখান থেকে আপনি নিজেই যেকোনো সময় নতুন পণ্য বা লেখা যোগ করতে পারবেন।" />

                            <x-frontend.card.why-us icon="analytics" title="ব্যবসার ট্র্যাকিং ও অ্যানালিটিকস"
                                text="আমরা অ্যানালিটিকস ও ট্র্যাকিং যুক্ত করে দিই, যাতে গ্রাহকদের পছন্দ-অপছন্দ সহজেই বুঝতে পারেন।" />

                            <x-frontend.card.why-us icon="payments" title="পেমেন্ট গেটওয়ে ও কুরিয়ার সার্ভিস সংযোগ"
                                text="পেমেন্ট গেটওয়ে বা কুরিয়ার সার্ভিস কীভাবে যুক্ত করে দেই এবং কীভাবে হবে তা কাজ শুরুর আগেই আপনার সাথে আলোচনা করে নিই।" />

                            <x-frontend.card.why-us icon="support_agent" title="কাজ শেষের পরও পাশে থাকা"
                                text="সাইট চালুর পর কী ধরনের প্রশিক্ষণ বা হেল্প পাবেন, তা প্রজেক্টের শুরুতেই স্পষ্টভাবে জানিয়ে দিই।" />
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div
                            class="rounded-4 site-surface-bg-arbitrary-hex-111722 border site-border-border-white-opacity-15 p-2 site-elevation-shadow-2xl overflow-hidden site-style-group bg-white site-soft-border">
                            <div
                                class="rounded-4 overflow-hidden position-relative site-media-aspect-square site-surface-bg-arbitrary-hex-070a0e bg-white">
                                <img alt="WhexSoft Brand Graphic"
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
                    <x-frontend.eyebrow>আমাদের ক্লায়েন্ট</x-frontend.eyebrow>
                    <h2
                        class="site-type-font-heading fs-3 lh-sm site-responsive-sm-type-text-4xl site-responsive-md-type-text-headline-lg site-type-font-extrabold mt-3 site-spacing-mb-3 site-heading">
                        শীর্ষস্থানীয় প্রতিষ্ঠানের <span class="text-dark">আস্থার সঙ্গী</span>
                    </h2>
                    <p class="site-type-text-sm site-responsive-sm-type-text-base site-copy fs-6 fw-medium">
                        আধুনিক প্রতিষ্ঠানগুলো আমাদের ওয়েবসাইট ও ডেভেলপমেন্ট সার্ভিসের ওপর আস্থা রাখে।
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
                        <x-frontend.eyebrow>ক্লায়েন্ট
                            রিভিউ</x-frontend.eyebrow>
                        <h2
                            class="site-type-font-heading fs-3 lh-sm site-responsive-sm-type-text-4xl site-responsive-md-type-text-headline-lg site-type-font-extrabold text-white mt-3 site-heading text-white">
                            আমাদের কাজ সম্পর্কে ক্লায়েন্টদের অভিজ্ঞতা</h2>
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
                        <x-frontend.eyebrow>খবর ও টিপস</x-frontend.eyebrow>
                        <h2
                            class="site-type-font-heading fs-3 lh-sm site-responsive-sm-type-text-4xl site-responsive-md-type-text-headline-lg fw-bold text-white site-type-tracking-tight site-spacing-mt-3 site-heading text-white">
                            আমাদের ব্লগ</h2>
                    </div>
                    <x-frontend.buttons.section :href="route('blog.index')" text="সব ব্লগ দেখুন" />
                </div>
                @if ($posts->isEmpty())
                    <div
                        class="rounded-4 border border-white border-opacity-10 site-surface-bg-arbitrary-hex-111722 site-spacing-p-8 text-center site-color-text-slate-300 bg-white site-soft-border text-secondary">
                        এখনো কোনো লেখা প্রকাশ করা হয়নি।</div>
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
