@extends('frontend.layouts.app') @section('title', 'WhexSoft | আপনার ব্যবসার জন্য ওয়েবসাইট ও ডিজিটাল সলিউশন')
@section('description',
    'ই-কমার্স, ল্যান্ডিং পেজ ও কাস্টম ওয়েবসাইট নিয়ে কথা বলুন WhexSoft-এর সঙ্গে। আপনার লক্ষ্য ও
    কাজের পরিধি বুঝে আমরা সমাধানের প্রস্তাব দিই।')
    @section('page', 'home') @section('content') @php
        $serviceIcons = [
            'ecommerce-website' => 'shopping_cart',
            'landing-page' => 'rocket_launch',
            'corporate-portfolio-website' => 'corporate_fare',
            'dynamic-website' => 'terminal',
        ];
        $serviceImages = [
            'ecommerce-website' => asset('assets/frontend/images/project-ecommerce.jpg'),
            'landing-page' => asset('assets/frontend/images/project-landing.jpg'),
            'corporate-portfolio-website' => asset('assets/frontend/images/project-corporate.jpg'),
            'dynamic-website' => asset('assets/frontend/images/project-webapp.jpg'),
        ];
        $serviceDescriptions = [
            'ecommerce-website' =>
                'বিক্রয় বাড়াতে আগ্রহী অনলাইন বিক্রেতাদের জন্য দ্রুত ও ব্যবহারবান্ধব ই-কমার্স স্টোর।',
            'landing-page' => 'নতুন ফেসবুক বিক্রেতা ও ছোট ব্যবসার জন্য আকর্ষণীয়, ফলাফলমুখী ল্যান্ডিং পেজ।',
            'corporate-portfolio-website' =>
                'আপনার কাজ ও পরিচিতি তুলে ধরতে প্রিমিয়াম, মোবাইল-উপযোগী পোর্টফোলিও ওয়েবসাইট।',
            'resort-website' =>
                'রিয়েল-টাইম প্রাপ্যতা, আকর্ষণীয় গ্যালারি ও বুকিং সুবিধাসহ ভ্রমণ ও আতিথেয়তা প্ল্যাটফর্ম।',
            'local-business-website' =>
                'স্বয়ংক্রিয় অনলাইন বুকিং ও তাৎক্ষণিক তথ্যসহ স্থানীয় সেবা ব্যবসার স্মার্ট ওয়েবসাইট।',
            'dynamic-website' => 'আপনার ব্যবসার প্রক্রিয়া ও গ্রাহকের চাহিদা অনুযায়ী তৈরি ডাইনামিক ওয়েবসাইট।',
        ];
    @endphp
    <main class="home-page container-fluid p-0 w-100 position-relative site-effect-overflow-x-clip"> {{-- Hero Section --}}
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
                            class="site-type-text-xs site-type-font-mono text-white fw-semibold site-type-tracking-wider text-white small">ওয়েব
                            ডিজাইন ও ডেভেলপমেন্ট স্টুডিও</span>
                    </div>
                    <h1
                        class="site-type-font-heading site-type-text-4xl site-responsive-sm-type-text-5xl site-responsive-lg-type-text-7xl site-type-font-extrabold site-color-text-arbitrary-hex-070400 site-type-tracking-tight site-type-leading-arbitrary-1-15 mb-4 site-heading text-black">
                        অনলাইন যাত্রা শুরুর
                        <span class="text-primary text-dark">ডিজিটাল সমাধান</span>
                    </h1>
                    <p
                        class="fs-6 site-responsive-sm-type-text-lg site-responsive-lg-type-text-xl site-color-text-slate-200 site-dimension-max-w-2xl site-spacing-mb-10 site-type-leading-relaxed site-copy text-secondary">
                        WhexSoft আপনার ধারণাকে বাস্তবে রূপ দেয়। কাস্টমারের কাছে আপনার ব্র্যান্ডকে বিশ্বাসযোগ্য করে তুলতে
                        আমরা তৈরি করছি মোবাইল-ফ্রেন্ডলি ও ফাস্ট-লোডিং ওয়েবসাইট।</p>

                    <div class="d-flex gap-4 hero-btn-wrapper">
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
        <section
            class="w-100 position-relative site-spacing-py-10 site-responsive-md-spacing-py-14 site-section site-section--dark"
            aria-label="আমাদের অর্জন">
            <div
                class="site-dimension-max-w-7xl mx-auto site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <div class="row row-cols-1 row-cols-sm-3 g-4 text-center">
                    @foreach ([['700+', 'সৃজনশীল অংশীদার'], ['90M+', 'মোট দর্শক পৌঁছানো'], ['15+', 'দেশে কাজের অভিজ্ঞতা']] as [$number, $label])
                        <div class="col d-flex flex-column gap-1">
                            <span
                                class="site-type-font-heading site-type-text-3xl site-responsive-sm-type-text-4xl site-type-font-extrabold text-primary text-dark">{{ $number }}</span>
                            <span
                                class="site-type-text-sm fw-medium site-color-text-slate-200 text-secondary fs-6 ">{{ $label }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section> {{-- Services Section --}}
        <section
            class="w-100 border-top border-bottom border-white border-opacity-10 site-surface-bg-arbitrary-hex-0b0f14-opacity-70 position-relative site-spacing-py-16 site-responsive-md-spacing-py-24 bg-white site-soft-border site-section site-section--light"
            id="services">
            <div
                class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <div
                    class="d-flex flex-column flex-md-row align-items-md-end justify-content-between site-spacing-mb-14 gap-4">
                    <div>
                        <span
                            class="site-type-text-xs site-type-font-mono text-uppercase site-type-tracking-widest text-primary bg-primary bg-opacity-10 border site-border-border-primary-fixed-opacity-30 site-spacing-px-3-5 py-1 rounded-pill site-accent-component text-dark small fw-medium">মূল
                            সেবাসমূহ</span>
                        <h2
                            class="site-type-font-heading fs-4 lh-lg site-responsive-sm-type-text-4xl site-type-font-extrabold text-white mt-3 site-heading text-white">
                            আপনার ব্যবসাকে অনলাইনে এগিয়ে নিতে আমাদের সার্ভিসসমূহ</h2>
                        <p
                            class="site-color-text-slate-300 site-dimension-max-w-md site-type-text-sm site-responsive-sm-type-text-base site-copy text-secondary fs-6 fw-medium">
                            আপনার ব্যবসার ধরণ ও লক্ষ্য বুঝে উপযুক্ত ওয়েবসাইট তৈরি করতে আমরা সাহায্য করি।</p>
                    </div>
                    <a class="d-inline-flex align-items-center gap-1-5 text-primary site-state-hover-color-text-white site-type-text-sm fw-semibold site-motion-transition-colors text-dark fs-6 site-content-action"
                        href="{{ route('services.index') }}">
                        <span>আমাদের সব সার্ভিস দেখুন</span>
                        <span class="material-symbols-outlined fs-6">north_east</span>
                    </a>
                </div>
                @if ($services->isEmpty())
                    <div
                        class="rounded-4 border border-white border-opacity-10 site-surface-bg-arbitrary-hex-111722 site-spacing-p-8 text-center site-color-text-slate-300 bg-white site-soft-border text-secondary">
                        এখনো কোনো সার্ভিস যুক্ত করা হয়নি।</div>
                @else
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach ($services as $service)
                            @php
                                $serviceImage =
                                    $service->getFirstMediaUrl('service-image') ?:
                                    $serviceImages[$service->slug] ?? asset('assets/frontend/images/brand-graphic.jpg');
                                $serviceIcon = $serviceIcons[$service->slug] ?? 'language';
                                $serviceDescription =
                                    $service->short_description ?:
                                    \Illuminate\Support\Str::limit(strip_tags($service->intro ?? ''), 140);
                                $serviceDescription =
                                    $serviceDescription ?:
                                    $serviceDescriptions[$service->slug] ??
                                        'আপনার ব্যবসার লক্ষ্য অনুযায়ী কাস্টম ডিজাইন ও ডেভেলপমেন্ট।';
                                $features = collect($service->features ?? [])
                                    ->pluck('title')
                                    ->filter()
                                    ->take(2);
                            @endphp
                            <div class="col home-card-column">
                                <div
                                    class="home-card rounded-4 site-surface-bg-arbitrary-hex-111722 border border-white border-opacity-10 site-state-hover-border-border-primary-fixed-opacity-50 p-4 d-flex flex-column justify-content-between site-elevation-shadow-xl site-state-hover-style-translate-y-1-5 site-motion-transition-all site-style-group bg-white site-soft-border">
                                    <div>
                                        <div
                                            class="site-dimension-w-12 site-dimension-h-12 rounded-4 bg-primary bg-opacity-10 border site-border-border-primary-fixed-opacity-30 d-flex align-items-center justify-content-center text-primary site-spacing-mb-5 site-state-group-hover-motion-scale-110 site-motion-transition-transform site-accent-component text-dark">
                                            <span
                                                class="material-symbols-outlined site-type-text-arbitrary-26px">{{ $serviceIcon }}</span>
                                        </div>
                                        <h3
                                            class="site-type-font-heading site-type-text-xl fw-bold text-white mb-2 site-state-group-hover-color-text-primary-fixed site-motion-transition-colors site-heading text-white">
                                            <a href="{{ route('services.show', $service) }}">{{ $service->title }}</a>
                                        </h3>
                                        <p
                                            class="site-color-text-slate-300 site-type-text-sm mb-4 site-type-leading-relaxed site-copy text-secondary fs-6 fw-medium">
                                            {{ $serviceDescription }}</p>
                                        <div
                                            class="site-spacing-space-y-2 mb-4 site-type-text-xs site-color-text-slate-300 text-secondary small fw-medium">
                                            @foreach ($features as $feature)
                                                <div class="d-flex align-items-center gap-2"><span
                                                        class="material-symbols-outlined text-primary fs-6 text-dark">check_circle</span>
                                                    {{ $feature }}</div>
                                                @endforeach @if ($features->isEmpty())
                                                    <div class="d-flex align-items-center gap-2"><span
                                                            class="material-symbols-outlined text-primary fs-6 text-dark">check_circle</span>
                                                        কাস্টম ব্র্যান্ড ডিজাইন</div>
                                                    <div class="d-flex align-items-center gap-2"><span
                                                            class="material-symbols-outlined text-primary fs-6 text-dark">check_circle</span>
                                                        লাইভ-পরবর্তী সাপোর্ট</div>
                                                @endif
                                        </div>
                                    </div>
                                    <a class="pt-3 border-top border-white border-opacity-10 text-primary site-type-font-mono site-type-text-sm d-flex align-items-center justify-content-between site-state-hover-type-underline site-soft-border text-dark fs-6 fw-medium site-content-action"
                                        href="{{ route('services.show', $service) }}">
                                        <span>বিস্তারিত জানুন</span>
                                        <span
                                            class="material-symbols-outlined site-type-text-arbitrary-18px">arrow_forward</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section> {{-- Latest Projects --}}
        <section
            class="w-100 border-top border-bottom border-white border-opacity-10 site-surface-bg-arbitrary-hex-0b0f14-opacity-80 position-relative site-spacing-py-16 site-responsive-md-spacing-py-24 bg-white site-soft-border site-section site-section--dark"
            id="portfolio">
            <div
                class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <div
                    class="d-flex flex-column flex-md-row align-items-md-end justify-content-between site-spacing-mb-14 gap-4">
                    <div>
                        <span
                            class="site-type-text-xs site-type-font-mono text-uppercase site-type-tracking-widest text-primary bg-primary bg-opacity-10 border site-border-border-primary-fixed-opacity-30 site-spacing-px-3-5 py-1 rounded-pill site-accent-component text-dark small fw-medium">নির্বাচিত
                            প্রজেক্ট</span>
                        <h2
                            class="site-type-font-heading fs-4 lh-lg site-responsive-sm-type-text-4xl site-type-font-extrabold text-white mt-3 site-heading text-white">
                            আমাদের সাম্প্রতিক কাজ</h2>
                    </div>
                    <a class="d-inline-flex align-items-center gap-1-5 text-primary site-state-hover-color-text-white site-type-text-sm fw-semibold site-motion-transition-colors text-dark fs-6 site-content-action"
                        href="{{ route('portfolio.index') }}">
                        <span>সকল প্রজেক্ট দেখুন</span>
                        <span class="material-symbols-outlined fs-6">north_east</span>
                    </a>
                </div>
                @if ($projects->isEmpty())
                    <div
                        class="rounded-4 border border-white border-opacity-10 site-surface-bg-arbitrary-hex-111722 site-spacing-p-8 text-center site-color-text-slate-300 bg-white site-soft-border text-secondary">
                        এখনো কোনো প্রজেক্ট প্রকাশ করা হয়নি।</div>
                @else
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach ($projects as $project)
                            @php $image = $project->getFirstMediaUrl('project-image') ?: $projectImages[$loop->index % count($projectImages)]; @endphp
                            <div class="col home-card-column">
                                <div
                                    class="home-card rounded-4 site-surface-bg-arbitrary-hex-111722 border border-white border-opacity-10 site-state-hover-border-border-primary-fixed-opacity-40 overflow-hidden site-elevation-shadow-xl site-state-hover-style-translate-y-1-5 site-motion-transition-all site-style-group d-flex flex-column bg-white site-soft-border">
                                    <div
                                        class="position-relative site-media-aspect-square overflow-hidden site-surface-bg-arbitrary-hex-070a0e bg-white">
                                        <img alt="{{ $project->title }}"
                                            class="w-100 h-100 object-fit-cover site-state-group-hover-motion-scale-105 site-motion-transition-transform site-motion-duration-500"
                                            src="{{ $image }}" />
                                        @if ($project->projectCategory)
                                            <div
                                                class="position-absolute site-position-top-3 site-position-left-3 site-surface-bg-arbitrary-hex-0b0f14-opacity-85 site-effect-backdrop-blur-md site-spacing-px-3 py-1 rounded-pill border site-border-border-primary-fixed-opacity-30 text-primary site-type-text-xs site-type-font-mono fw-medium bg-white text-dark small ">
                                                #{{ $project->projectCategory->name }}</div>
                                        @endif
                                    </div>
                                    <div
                                        class="site-spacing-p-5 site-layout-flex-1 d-flex flex-column justify-content-between">
                                        <div>
                                            <h3
                                                class="site-type-font-heading fs-6 site-responsive-sm-type-text-lg fw-bold text-white mb-1 site-state-group-hover-color-text-primary-fixed site-motion-transition-colors site-heading text-white">
                                                <a
                                                    href="{{ route('portfolio.show', $project) }}">{{ $project->title }}</a>
                                            </h3>
                                            <p
                                                class="site-type-text-xs site-color-text-slate-300 mb-3 site-copy text-secondary small fw-medium">
                                                {{ $project->summary }}</p>
                                        </div>
                                        <a class="site-type-text-xs text-primary fw-semibold d-flex align-items-center gap-1 site-state-hover-type-underline text-dark small site-content-action"
                                            href="{{ route('portfolio.show', $project) }}">
                                            <span>প্রজেক্ট দেখুন</span>
                                            <span
                                                class="material-symbols-outlined site-type-text-arbitrary-14px">north_east</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section> {{-- Why Choose Us --}}
        <section class="w-100 position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--light"
            id="why-us">
            <div
                class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <div class="row g-4 align-items-center">
                    <div class="col-12 col-lg-7">
                        <span
                            class="site-type-text-xs site-type-font-mono text-uppercase site-type-tracking-widest text-primary bg-primary bg-opacity-10 border site-border-border-primary-fixed-opacity-30 site-spacing-px-3-5 py-1 rounded-pill site-accent-component text-dark small fw-medium">আমাদের
                            পরিচিতি</span>
                        <h2
                            class="site-type-font-heading fs-4 lh-lg site-responsive-sm-type-text-4xl site-type-font-extrabold text-white mt-3 site-spacing-mb-8 site-heading text-white">
                            আমরা গড়ি CPA-কেন্দ্রিক ডিজিটাল অভিজ্ঞতা</h2>
                        <div class="row row-cols-1 row-cols-sm-2 g-3">
                            @foreach ([['palette', 'ব্র্যান্ড অনুযায়ী ডিজাইন', 'আপনার পরিচিতি, পণ্য ও গ্রাহকের কথা মাথায় রেখে লেআউট তৈরি করি।'], ['speed', 'পরিষ্কার ও ব্যবহারযোগ্য', 'পাতা দ্রুত খুঁজে পাওয়া এবং সহজে ব্যবহার করার দিকে নজর রাখি।'], ['dashboard_customize', 'কনটেন্ট ব্যবস্থাপনা', 'প্রয়োজন থাকলে পণ্য বা লেখা আপডেটের জন্য অ্যাডমিন সুবিধা যোগ করা যায়।'], ['analytics', 'ট্র্যাকিং সেটআপ', 'কাজের পরিধিতে থাকলে প্রয়োজনীয় অ্যানালিটিকস ও ট্র্যাকিং যুক্ত করা যায়।'], ['payments', 'প্রয়োজনমতো সংযোগ', 'পেমেন্ট বা কুরিয়ার সেবা যুক্ত করার সুযোগ নিয়ে কাজ শুরুর আগে আলোচনা করি।'], ['support_agent', 'লঞ্চ-পরবর্তী সহায়তা', 'প্রশিক্ষণ ও সাপোর্টের পরিধি প্রজেক্টের প্রস্তাবে স্পষ্ট করে দিই।']] as [$icon, $title, $text])
                                <div class="col home-card-column">
                                    <div
                                        class="home-card site-spacing-p-5 rounded-4 site-surface-bg-arbitrary-hex-111722 border border-white border-opacity-10 site-state-hover-border-border-primary-fixed-opacity-40 site-motion-transition-all bg-white site-soft-border">
                                        <div class="d-flex align-items-center gap-2-5 mb-2">
                                            <span
                                                class="material-symbols-outlined text-primary site-type-text-arbitrary-22px text-dark">{{ $icon }}</span>
                                            <h3
                                                class="site-type-font-heading fs-6 fw-bold text-white site-heading text-white">
                                                {{ $title }}</h3>
                                        </div>
                                        <p
                                            class="site-type-text-xs site-color-text-slate-300 site-type-leading-relaxed site-copy text-secondary small fw-medium">
                                            {{ $text }}</p>
                                    </div>
                                </div>
                            @endforeach
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
                                <div
                                    class="position-absolute site-position-bottom-3 site-position-left-3 site-position-right-3 site-surface-bg-arbitrary-hex-0b0f14-opacity-90 site-effect-backdrop-blur-md site-spacing-p-3 rounded-3 border border-white border-opacity-10 d-flex align-items-center justify-content-between bg-white site-soft-border">
                                    <div>
                                        <p
                                            class="site-type-text-arbitrary-11px text-primary site-type-font-mono fw-bold text-uppercase site-copy text-dark small">
                                            ঢাকা স্টুডিও অফিস</p>
                                        <p class="site-type-text-xs text-white fw-medium site-copy text-white small ">
                                            সরাসরি কথা বলুন: ০১৩৩৫-১৯৮৮৫৯</p>
                                    </div>
                                    <a class="site-spacing-px-3 site-spacing-py-1-5 bg-primary site-color-text-arbitrary-hex-070a0e site-type-text-xs fw-bold site-type-font-mono rounded-1 site-state-hover-surface-bg-primary-fixed-dim site-motion-transition-colors small"
                                        href="tel:01335198859">কল দিন</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> {{-- Why Website Section --}}
        <section class="w-100 position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--dark"
            id="why-website">
            <div
                class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <div class="text-center site-dimension-max-w-3xl mx-auto site-spacing-mb-14">
                    <span
                        class="site-type-text-xs site-type-font-mono text-uppercase site-type-tracking-widest text-primary bg-primary bg-opacity-10 border site-border-border-primary-fixed-opacity-30 site-spacing-px-3-5 py-1 rounded-pill site-accent-component text-dark small fw-medium">শীর্ষস্থানীয়
                        প্রতিষ্ঠানের আস্থায়</span>
                    <h2
                        class="site-type-font-heading fs-4 lh-lg site-responsive-sm-type-text-4xl site-type-font-extrabold text-white mt-3 site-spacing-mb-3 site-heading text-white">
                        কেন সোশ্যাল মিডিয়ার পাশাপাশি নিজের ওয়েবসাইট?</h2>
                    <p
                        class="site-color-text-slate-300 site-type-text-sm site-responsive-sm-type-text-base site-copy text-secondary fs-6 fw-medium">
                        সোশ্যাল মিডিয়া নতুন মানুষের কাছে পৌঁছাতে সাহায্য করে। ওয়েবসাইটে আপনার সব তথ্য ও সেবা একসাথে</p>
                </div>
                <div class="row row-cols-1 row-cols-md-2 g-4 align-items-stretch">
                    <div class="col home-card-column">
                        <div
                            class="home-card rounded-4 site-surface-bg-arbitrary-hex-111722 border site-border-border-red-500-opacity-25 p-4 site-responsive-sm-spacing-p-8 d-flex flex-column justify-content-between site-elevation-shadow-xl bg-white">
                            <div>
                                <div
                                    class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom site-border-border-red-500-opacity-20">
                                    <div class="d-flex align-items-center site-spacing-gap-3">
                                        <div
                                            class="site-dimension-w-10 site-dimension-h-10 rounded-4 site-surface-bg-red-500-opacity-10 border site-border-border-red-500-opacity-30 d-flex align-items-center justify-content-center text-danger">
                                            <span
                                                class="material-symbols-outlined site-type-text-arbitrary-22px">cancel</span>
                                        </div>
                                        <h3
                                            class="site-type-font-heading site-type-text-lg site-responsive-sm-type-text-xl fw-bold text-white site-heading text-white">
                                            শুধু ফেসবুক পেজের সীমাবদ্ধতা</h3>
                                    </div>
                                    <span
                                        class="site-spacing-px-2-5 py-1 rounded-1 site-surface-bg-red-500-opacity-15 text-white site-type-font-mono site-type-text-xs border site-border-border-red-500-opacity-30 small fw-medium">অস্থায়ী
                                        নির্ভরতা</span>
                                </div>
                                <ul class="d-flex flex-column gap-3">
                                    <li
                                        class="d-flex align-items-start site-spacing-gap-3 site-color-text-slate-300 site-type-text-sm site-type-leading-relaxed site-body-text text-secondary fs-6 fw-medium">
                                        <span
                                            class="material-symbols-outlined text-danger site-type-text-arbitrary-18px flex-shrink-0 site-spacing-mt-0-5">close</span><span><strong
                                                class="text-white fw-medium site-body-text text-white">প্ল্যাটফর্মের ওপর
                                                নির্ভরতা:</strong> পোস্ট কত মানুষের কাছে পৌঁছাবে, তা অনেকটাই প্ল্যাটফর্মের
                                            নিয়মের ওপর নির্ভর করে।</span>
                                    </li>
                                    <li
                                        class="d-flex align-items-start site-spacing-gap-3 site-color-text-slate-300 site-type-text-sm site-type-leading-relaxed site-body-text text-secondary fs-6 fw-medium">
                                        <span
                                            class="material-symbols-outlined text-danger site-type-text-arbitrary-18px flex-shrink-0 site-spacing-mt-0-5">close</span><span><strong
                                                class="text-white fw-medium site-body-text text-white">তথ্য খুঁজে পাওয়া
                                                কঠিন:</strong> পণ্য, দাম ও অর্ডারের তথ্য অনেক পোস্ট বা মেসেজে ছড়িয়ে থাকতে
                                            পারে।</span>
                                    </li>
                                    <li
                                        class="d-flex align-items-start site-spacing-gap-3 site-color-text-slate-300 site-type-text-sm site-type-leading-relaxed site-body-text text-secondary fs-6 fw-medium">
                                        <span
                                            class="material-symbols-outlined text-danger site-type-text-arbitrary-18px flex-shrink-0 site-spacing-mt-0-5">close</span><span><strong
                                                class="text-white fw-medium site-body-text text-white">অর্ডার গুছিয়ে
                                                রাখা:</strong> চ্যাটে আসা অর্ডার আলাদা করে নথিবদ্ধ না করলে পরে খুঁজে পাওয়া
                                            কঠিন হতে পারে।</span>
                                    </li>
                                    <li
                                        class="d-flex align-items-start site-spacing-gap-3 site-color-text-slate-300 site-type-text-sm site-type-leading-relaxed site-body-text text-secondary fs-6 fw-medium">
                                        <span
                                            class="material-symbols-outlined text-danger site-type-text-arbitrary-18px flex-shrink-0 site-spacing-mt-0-5">close</span><span><strong
                                                class="text-white fw-medium site-body-text text-white">সীমিত
                                                কাস্টমাইজেশন:</strong> নিজের মতো করে পণ্য সাজানো বা কেনার ধাপ তৈরি করার
                                            সুযোগ সীমিত।</span>
                                    </li>
                                </ul>
                            </div>
                            <div
                                class="mt-4 site-spacing-p-3 rounded-4 site-surface-bg-red-950-opacity-30 border site-border-border-red-500-opacity-20 site-type-text-xs site-color-text-red-200 d-flex align-items-center gap-2 small fw-medium">
                                <span
                                    class="material-symbols-outlined site-type-text-arbitrary-18px ">warning</span>
                                <span class="text-white">অ্যাকাউন্টে সমস্যা হলে আপনার কাস্টমার হারাতে পারেন</span>
                            </div>
                        </div>
                    </div>
                    <div class="col home-card-column">
                        <div
                            class="home-card rounded-4 site-surface-bg-arbitrary-hex-161f2e border site-border-border-primary-fixed-opacity-40 p-4 site-responsive-sm-spacing-p-8 d-flex flex-column justify-content-between site-elevation-shadow-arbitrary-0-0-35px-rgba-197-243-49-0-1 position-relative bg-white site-feature-card">
                            <div>
                                <div
                                    class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom site-border-border-primary-fixed-opacity-25">
                                    <div class="d-flex align-items-center site-spacing-gap-3">
                                        <div
                                            class="site-dimension-w-10 site-dimension-h-10 rounded-4 site-surface-bg-primary-fixed-opacity-15 border site-border-border-primary-fixed-opacity-40 d-flex align-items-center justify-content-center text-primary site-elevation-shadow-arbitrary-0-0-15px-rgba-197-243-49-0-3 site-accent-component text-dark">
                                            <span
                                                class="material-symbols-outlined site-type-text-arbitrary-22px">verified</span>
                                        </div>
                                        <h3
                                            class="site-type-font-heading site-type-text-lg site-responsive-sm-type-text-xl fw-bold text-white site-heading text-white">
                                            WhexSoft ওয়েবসাইটের সুবিধা</h3>
                                    </div>
                                    <span
                                        class="site-spacing-px-2-5 py-1 rounded-1 bg-primary site-color-text-arbitrary-hex-070a0e site-type-font-mono site-type-text-xs fw-bold site-elevation-shadow-arbitrary-0-0-10px-rgba-197-243-49-0-3 small">স্থায়ী
                                        সম্পদ</span>
                                </div>
                                <ul class="d-flex flex-column gap-3">
                                    <li
                                        class="d-flex align-items-start site-spacing-gap-3 site-color-text-slate-200 site-type-text-sm site-type-leading-relaxed site-body-text text-secondary fs-6 fw-medium">
                                        <span
                                            class="material-symbols-outlined text-primary site-type-text-arbitrary-18px flex-shrink-0 site-spacing-mt-0-5 text-dark">check_circle</span><span><strong
                                                class="text-white fw-medium site-body-text text-white">পণ্য ও সেবা সাজিয়ে
                                                দেখান:</strong> ক্যাটাগরি, বিবরণ, দাম ও ছবি এক জায়গায় রাখুন।</span>
                                    </li>
                                    <li
                                        class="d-flex align-items-start site-spacing-gap-3 site-color-text-slate-200 site-type-text-sm site-type-leading-relaxed site-body-text text-secondary fs-6 fw-medium">
                                        <span
                                            class="material-symbols-outlined text-primary site-type-text-arbitrary-18px flex-shrink-0 site-spacing-mt-0-5 text-dark">check_circle</span><span><strong
                                                class="text-white fw-medium site-body-text text-white">সহজ অর্ডার
                                                প্রক্রিয়া:</strong> আপনার ব্যবসার ধরন অনুযায়ী অর্ডার নেওয়ার ব্যবস্থা তৈরি
                                            করুন।</span>
                                    </li>
                                    <li
                                        class="d-flex align-items-start site-spacing-gap-3 site-color-text-slate-200 site-type-text-sm site-type-leading-relaxed site-body-text text-secondary fs-6 fw-medium">
                                        <span
                                            class="material-symbols-outlined text-primary site-type-text-arbitrary-18px flex-shrink-0 site-spacing-mt-0-5 text-dark">check_circle</span><span><strong
                                                class="text-white fw-medium site-body-text text-white">প্রয়োজনমতো
                                                ইন্টিগ্রেশন:</strong> পেমেন্ট, কুরিয়ার বা অ্যানালিটিকস সংযোগ কাজের পরিধি
                                            অনুযায়ী ঠিক করা যায়।</span>
                                    </li>
                                    <li
                                        class="d-flex align-items-start site-spacing-gap-3 site-color-text-slate-200 site-type-text-sm site-type-leading-relaxed site-body-text text-secondary fs-6 fw-medium">
                                        <span
                                            class="material-symbols-outlined text-primary site-type-text-arbitrary-18px flex-shrink-0 site-spacing-mt-0-5 text-dark">check_circle</span><span><strong
                                                class="text-white fw-medium site-body-text text-white">নিজস্ব ডোমেইনে
                                                উপস্থিতি:</strong> আপনার ব্র্যান্ডের জন্য একটি নির্দিষ্ট ঠিকানায় তথ্য ও
                                            সেবা তুলে ধরুন।</span>
                                    </li>
                                </ul>
                            </div>
                            <div
                                class="mt-4 site-spacing-p-3 rounded-4 bg-primary bg-opacity-10 border site-border-border-primary-fixed-opacity-30 site-type-text-xs site-color-text-slate-200 d-flex align-items-center justify-content-between site-accent-component text-secondary small fw-medium">
                                <span class="d-flex align-items-center gap-1-5 fw-semibold text-primary text-dark"><span
                                        class="material-symbols-outlined site-type-text-arbitrary-18px">verified_user</span><span>আপনার স্থায়ী ঠিকানা যেখানে আপানার কাস্টমাররা আপনাকে খুঁজে নিবে</span></span>
                                <a class="text-white site-type-underline site-state-hover-color-text-primary-fixed fw-medium text-white"
                                    href="#consultation">বিস্তারিত জানুন →</a>
                            </div>
                        </div>
                    </div>
                </div>
        </section> {{-- Work Process --}} {{-- <section class="w-100 position-relative py-5 site-responsive-md-spacing-py-16" id="process"> <div class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10"> <div class="text-center site-dimension-max-w-2xl mx-auto site-spacing-mb-14"> <span class="site-type-text-xs site-type-font-mono text-uppercase site-type-tracking-widest text-primary bg-primary bg-opacity-10 border site-border-border-primary-fixed-opacity-30 site-spacing-px-3-5 py-1 rounded-pill site-accent-component text-dark small fw-medium">কাজের পদ্ধতি</span> <h2 class="site-type-font-heading fs-4 lh-lg site-responsive-sm-type-text-4xl site-type-font-extrabold text-white mt-3 mb-2 site-heading text-white">সহজ ৫টি ধাপে আপনার ওয়েবসাইট</h2> <p class="site-color-text-slate-300 site-type-text-sm site-responsive-sm-type-text-base site-copy text-secondary fs-6 fw-medium">প্রতিটি প্রজেক্টে কাজের পরিধি ও সময়সূচি আগে ঠিক করে ধাপে ধাপে এগোই।</p> </div> <div class="d-grid site-layout-grid-cols-1 site-responsive-sm-layout-grid-cols-2 site-responsive-md-layout-grid-cols-5 gap-3"> @foreach ([['প্ল্যানিং', 'ব্যবসায়িক লক্ষ্য ও দর্শক বিশ্লেষণ করে আর্কিটেকচার তৈরি।'], ['কাস্টম ডিজাইন', 'আপনার ব্র্যান্ড ও গ্রাহকের প্রয়োজন অনুযায়ী ইন্টারফেস তৈরি।'], ['ডেভেলপমেন্ট', 'সম্মত ফিচার ও প্রয়োজনীয় সংযোগগুলো তৈরি করা।'], ['টেস্টিং ও লঞ্চ', 'সাইট পরীক্ষা করে আপনার ডোমেইনে প্রকাশের প্রস্তুতি।'], ['হস্তান্তর ও সহায়তা', 'ব্যবহারবিধি বুঝিয়ে দেওয়া এবং সম্মত সাপোর্ট দেওয়া।']] as [$title, $text]) <div class="site-spacing-p-5 rounded-4 {{ $loop->last ? 'site-surface-bg-arbitrary-hex-161f2e border site-border-border-primary-fixed-opacity-40 site-elevation-shadow-arbitrary-0-0-20px-rgba-197-243-49-0-15 site-feature-card' : 'site-surface-bg-arbitrary-hex-111722 border border-white border-opacity-10' }} text-center d-flex flex-column align-items-center bg-white"> <div class="site-dimension-w-10 site-dimension-h-10 rounded-pill {{ $loop->last ? 'bg-primary site-color-text-arbitrary-hex-070a0e site-elevation-shadow-arbitrary-0-0-10px-rgba-197-243-49-0-4' : 'site-surface-bg-white-opacity-5 text-primary border site-border-border-primary-fixed-opacity-30' }} site-type-font-mono fs-6 fw-bold d-flex align-items-center justify-content-center site-spacing-mb-3">{{ $loop->iteration }}</div> <h3 class="site-type-font-heading fs-6 fw-bold {{ $loop- class="site-heading">last ? 'text-primary-fixed' : 'text-white' }} mb-1">{{ $title }}</h3> <p class="site-type-text-xs {{ $loop- class="site-copy">last ? 'text-slate-200' : 'text-slate-300' }}">{{ $text }}</p> </div> @endforeach </div> </div> </section> --}} {{-- Testimonials --}} @if ($testimonials->isNotEmpty())
            <section
                class="w-100 border-top border-bottom border-white border-opacity-10 site-surface-bg-arbitrary-hex-0b0f14-opacity-70 position-relative site-spacing-py-16 site-responsive-md-spacing-py-24 bg-white site-soft-border site-section site-section--light"
                id="testimonials">
                <div
                    class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                    <div class="text-center site-dimension-max-w-2xl mx-auto site-spacing-mb-14">
                        <span
                            class="site-type-text-xs site-type-font-mono text-uppercase site-type-tracking-widest text-primary bg-primary bg-opacity-10 border site-border-border-primary-fixed-opacity-30 site-spacing-px-3-5 py-1 rounded-pill site-accent-component text-dark small fw-medium">ক্লায়েন্ট
                            রিভিউ</span>
                        <h2
                            class="site-type-font-heading fs-4 lh-lg site-responsive-sm-type-text-4xl site-type-font-extrabold text-white mt-3 site-heading text-white">
                            আমাদের কাজ সম্পর্কে ক্লায়েন্টদের অভিজ্ঞতা</h2>
                    </div>
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach ($testimonials->take(3) as $testimonial)
                            <div class="col home-card-column">
                                <figure
                                    class="home-card site-style-group rounded-4 site-surface-bg-arbitrary-hex-111722 border border-white border-opacity-10 site-state-hover-border-border-primary-fixed-opacity-40 p-4 d-flex flex-column justify-content-between site-elevation-shadow-xl site-motion-transition-colors bg-white site-soft-border">
                                    <div>
                                        <p class="site-type-text-xs text-primary mb-3 site-copy text-dark small fw-medium">
                                            ক্লায়েন্টের অভিজ্ঞতা</p>
                                        <blockquote
                                            class="site-color-text-slate-200 site-type-text-sm site-type-leading-relaxed site-body-text text-secondary fs-6 fw-medium">
                                            {{ \Illuminate\Support\Str::limit($testimonial->quote, 220) }}</blockquote>
                                    </div>
                                    <figcaption
                                        class="d-flex align-items-center site-spacing-gap-3 mt-4 pt-3 border-top border-white border-opacity-10 site-soft-border">
                                        <div
                                            class="site-dimension-w-10 site-dimension-h-10 rounded-pill site-surface-bg-primary-fixed-opacity-15 border site-border-border-primary-fixed-opacity-30 text-primary site-type-font-heading fw-bold d-flex align-items-center justify-content-center site-accent-component text-dark">
                                            {{ mb_substr($testimonial->client_name, 0, 1) }}</div>
                                        <div>
                                            <p
                                                class="site-type-text-sm fw-semibold text-white site-state-group-hover-color-text-primary-fixed site-motion-transition-colors site-copy text-white fs-6">
                                                {{ $testimonial->client_name }}</p>
                                            <p
                                                class="site-type-text-xs site-color-text-slate-400 site-copy text-secondary small fw-medium">
                                                {{ $testimonial->business_name }}</p>
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        <section
            class="w-100 border-top border-white border-opacity-10 site-surface-bg-arbitrary-hex-0b0f14-opacity-70 position-relative site-spacing-py-16 site-responsive-md-spacing-py-24 bg-white site-soft-border site-section site-section--dark"
            id="blog">
            <div
                class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-md-between gap-4 mb-5">
                    <div>
                        <span
                            class="site-type-text-xs site-type-font-mono text-primary fw-semibold site-type-tracking-widest text-uppercase text-dark small">খবর
                            ও নিবন্ধ</span>
                        <h2
                            class="site-type-font-heading site-type-text-3xl site-responsive-md-type-text-4xl fw-bold text-white site-type-tracking-tight site-spacing-mt-3 site-heading text-white">
                            ডিজিটাল দুনিয়ার নতুন ভাবনা</h2>
                    </div>
                    <a class="d-inline-flex align-items-center gap-2 text-primary fw-semibold site-state-hover-spacing-gap-3 site-motion-transition-all text-dark"
                        href="{{ route('blog.index') }}">
                        <span>সব ব্লগ দেখুন</span>
                        <span class="material-symbols-outlined fs-5">arrow_forward</span>
                    </a>
                </div>
                @if ($posts->isEmpty())
                    <div
                        class="rounded-4 border border-white border-opacity-10 site-surface-bg-arbitrary-hex-111722 site-spacing-p-8 text-center site-color-text-slate-300 bg-white site-soft-border text-secondary">
                        এখনো কোনো লেখা প্রকাশ করা হয়নি।</div>
                @else
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                        @foreach ($posts as $post)
                            @php $image = $post->getFirstMediaUrl('featured-image') ?: ($post->featured_image ?: $blogImages[$loop->index % count($blogImages)]); @endphp
                            <div class="col home-card-column">
                                <article
                                    class="home-card d-flex flex-column site-surface-bg-surface-card border site-border-border-border-subtle site-state-hover-border-border-primary-fixed-opacity-40 rounded-4 overflow-hidden site-elevation-shadow-md site-state-hover-elevation-shadow-xl site-state-hover-style-translate-y-1 site-motion-transition-all site-motion-duration-300 site-style-group bg-white site-soft-border">
                                    <div
                                        class="position-relative w-100 site-media-aspect-arbitrary-16-opacity-10 site-surface-bg-surface-default overflow-hidden">
                                        <img class="w-100 h-100 object-fit-cover site-state-group-hover-motion-scale-105 site-motion-transition-transform site-motion-duration-500"
                                            alt="{{ $post->title }}" src="{{ $image }}" />
                                        @if ($post->category)
                                            <div
                                                class="position-absolute site-position-top-4 site-position-left-4 site-position-z-10">
                                                <span
                                                    class="site-spacing-px-3 py-1 rounded-pill site-surface-bg-surface-card-elevated-opacity-90 site-effect-backdrop-blur-md text-primary site-type-font-label-md site-type-text-label-md site-elevation-shadow-sm bg-white text-dark small fw-medium">{{ $post->category }}</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="p-4 d-flex flex-column site-layout-flex-1 justify-content-between">
                                        <div>
                                            <a class="d-block site-state-group-hover-color-text-primary-container site-motion-transition-colors"
                                                href="{{ route('blog.show', $post) }}">
                                                <h4
                                                    class="site-type-font-headline-sm site-type-text-headline-sm site-color-text-primary site-type-tracking-tight site-spacing-mb-space-xs site-type-leading-snug site-heading text-white">
                                                    {{ $post->title }}</h4>
                                            </a>
                                            <p
                                                class="site-type-font-body-sm site-type-text-body-sm text-body-secondary site-type-leading-relaxed mb-3 site-copy text-secondary fs-6 fw-medium">
                                                {{ \Illuminate\Support\Str::limit($post->excerpt ?: strip_tags($post->content), 140) }}
                                            </p>
                                        </div>
                                        <div
                                            class="pt-2 d-flex align-items-center justify-content-between site-type-font-caption site-type-text-caption text-body-secondary text-secondary small fw-medium">
                                            <span class="d-flex align-items-center gap-1"><span
                                                    class="material-symbols-outlined fs-6">schedule</span>
                                                {{ $post->read_time }} মিনিট রিড</span>
                                            <span>{{ optional($post->published_at)->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
        <section
            class="w-100 border-top border-white border-opacity-10 site-surface-bg-gradient-to-b site-surface-from-arbitrary-hex-0b0f14 site-surface-to-arbitrary-hex-070a0e position-relative site-spacing-py-16 site-responsive-md-spacing-py-24 site-gradient-background site-soft-border site-section site-section--light"
            id="consultation">
            <div
                class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <div
                    class="site-shape-rounded-3xl site-surface-bg-arbitrary-hex-111722 border site-border-border-white-opacity-15 site-spacing-p-8 p-sm-5 site-elevation-shadow-2xl bg-white site-soft-border">
                    <div class="row g-4 align-items-center">
                        <div class="col-12 col-lg-7 d-flex flex-column align-items-start">
                            <div
                                class="d-inline-flex align-items-center gap-2 site-spacing-px-3 py-1 rounded-pill site-surface-bg-primary-fixed-opacity-15 border site-border-border-primary-fixed-opacity-30 text-primary site-type-text-xs site-type-font-mono fw-semibold mb-3 site-accent-component text-dark small">
                                <span
                                    class="site-dimension-w-2 site-dimension-h-2 rounded-pill bg-primary site-motion-animate-ping"></span>
                                <span>চলুন, অসাধারণ কিছু তৈরি করি</span>
                            </div>
                            <h2
                                class="site-type-font-heading fs-4 lh-lg site-responsive-sm-type-text-4xl site-type-font-extrabold text-white mb-3 lh-sm site-heading text-white">
                                আপনার ধারণাকে বাস্তবে রূপ দিতে আজই শুরু করুন</h2>
                            <p
                                class="site-color-text-slate-300 site-type-text-sm site-responsive-sm-type-text-base site-spacing-mb-8 site-type-leading-relaxed site-copy text-secondary fs-6 fw-medium">
                                আপনার প্রজেক্টের কথা জানান। আমরা ২৪ ঘণ্টার মধ্যে আপনার সঙ্গে যোগাযোগ করব।</p>
                            <div class="d-flex flex-wrap align-items-center gap-3 site-spacing-mb-8">
                                <a class="px-4 site-spacing-py-3-5 rounded-pill bg-primary site-color-text-arbitrary-hex-070a0e site-type-font-heading site-type-text-sm fw-bold site-elevation-shadow-arbitrary-0-0-20px-rgba-197-243-49-0-3 site-state-hover-surface-bg-primary-fixed-dim site-state-hover-motion-scale-105 site-motion-transition-all d-flex align-items-center gap-2 fs-6"
                                    href="tel:01335198859">
                                    <span class="material-symbols-outlined fs-5">call</span>
                                    <span>কল করুন: ০১৩৩৫-১৯৮৮৫৯</span>
                                </a>
                                <a class="px-4 site-spacing-py-3-5 rounded-pill site-surface-bg-arbitrary-hex-25d366 site-state-hover-surface-bg-arbitrary-hex-20ba5a site-color-text-arbitrary-hex-070a0e site-type-font-heading site-type-text-sm fw-bold site-elevation-shadow-arbitrary-0-0-20px-rgba-37-211-102-0-3 site-state-hover-motion-scale-105 site-motion-transition-all d-flex align-items-center gap-2 fs-6"
                                    href="https://wa.me/8801335198859" rel="noopener noreferrer" target="_blank">
                                    <span class="material-symbols-outlined fs-5">chat</span>
                                    <span>হোয়াটসঅ্যাপে মেসেজ দিন</span>
                                </a>
                            </div>
                            <div
                                class="d-flex align-items-center gap-2 site-color-text-slate-400 site-type-text-xs fw-medium text-secondary small ">
                                <span
                                    class="material-symbols-outlined site-type-text-arbitrary-18px text-primary text-dark">location_on</span>
                                <span>স্টুডিও অফিস: সোনির আখড়া, যাত্রাবাড়ী, ঢাকা-<span
                                        class="nubmer-1-fixer">১</span>২৩৬</span>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5">
                            <div
                                class="home-card site-surface-bg-arbitrary-hex-0b0f14 p-4 site-responsive-sm-spacing-p-8 rounded-4 border border-white border-opacity-10 site-elevation-shadow-xl bg-white site-soft-border">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <h3
                                        class="site-type-font-heading site-type-text-lg fw-bold text-white site-heading text-white">
                                        প্রজেক্ট নিয়ে কথা বলুন</h3>
                                    <span
                                        class="site-dimension-w-2-5 site-dimension-h-2-5 rounded-pill bg-primary site-motion-animate-ping"></span>
                                </div>
                                <p
                                    class="site-type-text-xs site-color-text-slate-400 mb-4 site-copy text-secondary small fw-medium">
                                    তথ্য পাঠালে আমরা প্রজেক্টের বিবরণ দেখে কর্মদিবসে যোগাযোগ করব।</p>
                                <form class="d-flex flex-column gap-3" action="{{ route('contact.store') }}"
                                    method="POST"> @csrf
                                    <div>
                                        <label
                                            class="d-block site-type-text-xs site-color-text-slate-300 fw-medium site-spacing-mb-1-5 text-secondary small "
                                            for="home-name">আপনার নাম *</label>
                                        <input
                                            class="form-control w-100 px-3 site-spacing-py-2-5 rounded-4 site-surface-bg-arbitrary-hex-182029 text-white site-color-placeholder-slate-400 border site-border-border-white-opacity-15 site-state-focus-style-outline-none site-state-focus-border-border-primary-fixed site-type-text-sm site-motion-transition-colors bg-white site-soft-border text-white fs-6 fw-medium"
                                            id="home-name" name="name" value="{{ old('name') }}"
                                            placeholder="উদাঃ সাকিব আহমেদ" required type="text" /> @error('name')
                                            <p
                                                class="mt-1 site-type-text-xs text-danger site-copy text-danger small fw-medium">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label
                                            class="d-block site-type-text-xs site-color-text-slate-300 fw-medium site-spacing-mb-1-5 text-secondary small "
                                            for="home-phone">মোবাইল নম্বর *</label>
                                        <input
                                            class="form-control w-100 px-3 site-spacing-py-2-5 rounded-4 site-surface-bg-arbitrary-hex-182029 text-white site-color-placeholder-slate-400 border site-border-border-white-opacity-15 site-state-focus-style-outline-none site-state-focus-border-border-primary-fixed site-type-text-sm site-motion-transition-colors bg-white site-soft-border text-white fs-6 fw-medium"
                                            id="home-phone" name="phone" value="{{ old('phone') }}"
                                            placeholder="০১XXXXXXXXX" required type="tel" /> @error('phone')
                                            <p
                                                class="mt-1 site-type-text-xs text-danger site-copy text-danger small fw-medium">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label
                                            class="d-block site-type-text-xs site-color-text-slate-300 fw-medium site-spacing-mb-1-5 text-secondary small "
                                            for="home-service">ওয়েবসাইটের ধরন</label>
                                        <select
                                            class="form-select w-100 px-3 site-spacing-py-2-5 rounded-4 site-surface-bg-arbitrary-hex-182029 text-white border site-border-border-white-opacity-15 site-state-focus-style-outline-none site-state-focus-border-border-primary-fixed site-type-text-sm site-motion-transition-colors bg-white site-soft-border text-white fs-6 fw-medium"
                                            id="home-service" name="service_type">
                                            @foreach ($services as $service)
                                                <option class="site-surface-bg-arbitrary-hex-182029 bg-white"
                                                    value="{{ $service->title }}" @selected(old('service_type') === $service->title)>
                                                    {{ $service->title }}</option>
                                            @endforeach
                                            <option class="site-surface-bg-arbitrary-hex-182029 bg-white"
                                                value="কাস্টম ওয়েব অ্যাপ্লিকেশন" @selected(old('service_type') === 'কাস্টম ওয়েব অ্যাপ্লিকেশন')>কাস্টম ওয়েব
                                                অ্যাপ্লিকেশন</option>
                                        </select>
                                    </div>
                                    <button
                                        class="btn home-submit-btn w-100 mt-2 site-spacing-py-3-5 rounded-4 bg-primary site-color-text-arbitrary-hex-070a0e site-type-text-sm fw-bold site-type-font-heading site-state-hover-surface-bg-primary-fixed-dim site-motion-transition-all site-elevation-shadow-arbitrary-0-0-15px-rgba-197-243-49-0-3 d-flex align-items-center justify-content-center gap-1-5 fs-6"
                                        type="submit">
                                        <span>অনুরোধ পাঠান</span>
                                        <span class="material-symbols-outlined site-type-text-arbitrary-18px">send</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </main>
@endsection
