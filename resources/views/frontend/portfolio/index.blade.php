@extends('frontend.layouts.app') @section('title', 'আমাদের কাজ | WhexSoft')
@section('description', 'WhexSoft-এর নির্বাচিত ওয়েবসাইট ও ডিজিটাল প্রজেক্ট দেখুন। প্রতিটি কাজের বিস্তারিত জানতে
    প্রজেক্টের পাতায় যান।')
    @section('page', 'portfolio') @section('content')
    @php$projectImages = [
            asset('assets/frontend/images/project-ecommerce.jpg'),
            asset('assets/frontend/images/project-landing.jpg'),
            asset('assets/frontend/images/project-corporate.jpg'),
            asset('assets/frontend/images/project-webapp.jpg'),
            asset('assets/frontend/images/project-uiux.jpg'),
            asset('assets/frontend/images/project-maintenance.jpg'),
        ];
    @endphp
    <main class="w-100 position-relative site-effect-overflow-x-clip">
        <section
            class="position-relative w-100 overflow-hidden site-spacing-pt-32 site-responsive-md-spacing-pt-40 pb-5 site-responsive-md-spacing-pb-16 site-section site-section--dark">
            <div
                class="site-dimension-max-w-7xl mx-auto position-relative site-position-z-10 d-flex flex-column align-items-center text-center w-100 site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <span
                        class="d-inline-block site-type-text-xs site-type-font-mono text-uppercase site-type-tracking-widest text-primary bg-primary bg-opacity-10 border site-border-border-primary-fixed-opacity-30 site-spacing-px-3-5 py-1 rounded-pill site-accent-component text-dark small fw-medium  mb-2">নির্বাচিত
                        প্রজেক্ট</span>
                <h1
                    class="site-type-font-display site-type-text-3xl site-responsive-sm-type-text-4xl site-responsive-lg-type-text-5xl site-type-font-extrabold text-white site-type-tracking-tight lh-sm site-dimension-max-w-3xl site-heading text-white">
                    আমাদের
                    <span class="text-primary text-dark">নির্বাচিত কাজ</span>
                </h1>
                <p
                    class="site-color-text-slate-300 site-type-text-sm site-responsive-sm-type-text-base site-spacing-mt-3 site-dimension-max-w-2xl site-type-leading-relaxed site-copy text-secondary fs-6 fw-medium">
                    উচ্চ-কার্যকর ওয়েবসাইট ও ডিজিটাল অভিজ্ঞতার মাধ্যমে বিভিন্ন ব্র্যান্ডের প্রবৃদ্ধিতে আমাদের কাজগুলো দেখুন।
                </p>
                <div
                    class="site-spacing-mt-10 d-flex flex-wrap align-items-center justify-content-center gap-2-5 site-responsive-sm-spacing-gap-3">
                    <a class="site-spacing-px-5 py-2 rounded-pill site-type-text-xs site-responsive-sm-type-text-sm fw-semibold site-motion-transition-all border {{ $activeCategory === '' ? 'site-border-border-primary-fixed bg-primary site-color-text-arbitrary-hex-070a0e' : 'site-surface-bg-arbitrary-hex-11171f site-color-text-slate-300 site-state-hover-color-text-white border-white border-opacity-10 site-state-hover-border-border-primary-fixed-opacity-40' }} site-accent-component text-black small"
                        href="{{ route('portfolio.index') }}">সব প্রজেক্ট</a>
                    @foreach ($categories as $category)
                        <a class="site-spacing-px-5 py-2 rounded-pill site-type-text-xs site-responsive-sm-type-text-sm fw-semibold site-motion-transition-all border {{ $activeCategory === $category->slug ? 'site-border-border-primary-fixed bg-primary site-color-text-arbitrary-hex-070a0e' : 'site-surface-bg-arbitrary-hex-11171f site-color-text-slate-300 site-state-hover-color-text-white border-white border-opacity-10 site-state-hover-border-border-primary-fixed-opacity-40' }} site-accent-component text-black small"
                            href="{{ route('portfolio.index', ['category' => $category->slug]) }}"> {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="w-100 position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--light">
            <div
                class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                @if ($projects->isEmpty())
                    <div
                        class="rounded-4 site-surface-bg-arbitrary-hex-11171f-opacity-80 border border-white border-opacity-10 site-spacing-p-10 text-center site-color-text-slate-300 bg-white site-soft-border text-secondary">
                        এই ক্যাটাগরিতে এখনো কোনো প্রজেক্ট যুক্ত করা হয়নি।</div>
                @else
                    <div
                        class="d-grid site-layout-grid-cols-1 site-responsive-md-layout-grid-cols-2 site-responsive-lg-layout-grid-cols-3 site-spacing-gap-8">
                        @foreach ($projects as $project)
                            @php $image = $project->getFirstMediaUrl('project-image') ?: $projectImages[$loop->index % count($projectImages)]; @endphp
                            <article
                                class="site-style-group d-flex flex-column site-surface-bg-arbitrary-hex-11171f-opacity-80 site-effect-backdrop-blur-md rounded-4 border border-white border-opacity-10 site-spacing-p-5 site-state-hover-border-border-primary-fixed-opacity-40 site-motion-transition-all site-motion-duration-300 site-state-hover-style-translate-y-1-5 site-elevation-shadow-xl site-state-hover-elevation-shadow-arbitrary-0-12px-30px-rgba-197-243-49-0-15 bg-white site-soft-border">
                                <a class="position-relative d-block w-100 site-media-aspect-arbitrary-16-opacity-10 rounded-4 overflow-hidden site-surface-bg-arbitrary-hex-0a0e13 bg-white"
                                    href="{{ route('portfolio.show', $project) }}">
                                    <img alt="{{ $project->title }}"
                                        class="w-100 h-100 object-fit-cover site-media-object-top site-motion-transition-transform site-motion-duration-500 site-state-group-hover-motion-scale-105"
                                        src="{{ $image }}" />
                                    <div
                                        class="position-absolute top-0 end-0 bottom-0 start-0 site-surface-bg-gradient-to-t site-surface-from-arbitrary-hex-070a0e-opacity-80 site-surface-via-transparent site-surface-to-transparent site-gradient-background">
                                    </div>
                                    @if ($project->is_featured)
                                        <div class="position-absolute site-position-top-2-5 site-position-left-2-5">
                                            <span
                                                class="d-inline-flex align-items-center gap-1 site-spacing-px-2-5 site-spacing-py-0-5 rounded-pill site-surface-bg-arbitrary-hex-070a0e-opacity-80 site-effect-backdrop-blur-md text-primary site-type-font-mono site-type-text-arbitrary-11px border site-border-border-primary-fixed-opacity-30 bg-white text-dark small fw-medium">
                                                <span
                                                    class="material-symbols-outlined site-type-text-arbitrary-12px">trending_up</span>
                                                ফিচার্ড প্রজেক্ট
                                            </span>
                                        </div>
                                    @endif
                                </a>
                                <div class="d-flex flex-column site-layout-flex-1 justify-content-between pt-3">
                                    <div>
                                        <div class="d-flex flex-wrap gap-1-5 site-spacing-mb-2-5">
                                            @if ($project->projectCategory)
                                                <span
                                                    class="site-type-text-arbitrary-11px site-spacing-px-2-5 site-spacing-py-0-5 rounded-2 site-surface-bg-primary-fixed-opacity-15 text-primary fw-medium border site-border-border-primary-fixed-opacity-20 site-accent-component text-dark small ">#{{ $project->projectCategory->name }}</span>
                                            @endif
                                        </div>
                                        <h3
                                            class="site-type-font-display site-type-text-lg fw-bold text-white site-state-group-hover-color-text-primary-fixed site-motion-transition-colors site-heading text-white">
                                            <a href="{{ route('portfolio.show', $project) }}">{{ $project->title }}</a>
                                        </h3>
                                        <p
                                            class="site-type-text-xs site-responsive-sm-type-text-sm site-color-text-slate-300 site-spacing-mt-1-5 site-type-line-clamp-2 site-type-leading-relaxed site-copy text-secondary small fw-medium">
                                            {{ $project->summary }}</p>
                                    </div>
                                    <div
                                        class="pt-3 mt-3 border-top border-white border-opacity-10 d-flex align-items-center justify-content-between site-spacing-gap-3 site-soft-border">
                                        <a class="site-layout-flex-1 d-inline-flex align-items-center justify-content-center gap-2 py-2 site-spacing-px-3 bg-primary site-color-text-arbitrary-hex-070a0e site-type-text-xs fw-bold rounded-3 site-elevation-shadow-arbitrary-0-0-12px-rgba-197-243-49-0-25 site-state-hover-surface-bg-primary-fixed-dim site-motion-transition-all small"
                                            href="{{ route('portfolio.show', $project) }}">
                                            <span>বিস্তারিত দেখুন</span>
                                            <span class="fw-bold">↗</span>
                                        </a>
                                        @if ($project->live_url)
                                            <a class="d-inline-flex align-items-center justify-content-center site-dimension-w-9 site-dimension-h-9 rounded-3 border site-border-border-white-opacity-15 site-color-text-slate-200 site-state-hover-color-text-primary-fixed site-state-hover-border-border-primary-fixed-opacity-50 site-motion-transition-colors site-soft-border text-secondary"
                                                href="{{ $project->live_url }}" rel="noopener noreferrer" target="_blank"
                                                aria-label="লাইভ প্রিভিউ">
                                                <span
                                                    class="material-symbols-outlined site-type-text-arbitrary-18px">open_in_new</span>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div> {{ $projects->links('frontend.partials.pagination') }}
                @endif
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
        <section class="w-100 position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--light">
            <div
                class="site-dimension-max-w-5xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <div
                    class="position-relative overflow-hidden site-shape-rounded-3xl border site-border-border-primary-fixed-opacity-30 site-surface-bg-gradient-to-br site-surface-from-arbitrary-hex-122218 site-surface-via-arbitrary-hex-0d1612 site-surface-to-arbitrary-hex-0b0f14 site-spacing-p-8 site-responsive-md-spacing-p-14 text-center site-gradient-background">
                    <div
                        class="position-absolute site-style-top-24 start-50 translate-middle-x site-dimension-w-arbitrary-500px site-dimension-h-arbitrary-250px site-surface-bg-primary-fixed-opacity-15 site-effect-blur-arbitrary-100px rounded-pill pe-none">
                    </div>
                    <div class="position-relative">
                        <h2
                            class="site-type-font-heading site-type-text-3xl site-responsive-md-type-text-4xl site-type-font-extrabold text-white site-type-tracking-tight site-heading text-white">
                            আপনার প্রজেক্ট নিয়ে কথা বলতে চান?</h2>
                        <p
                            class="site-color-text-slate-300 fs-6 site-responsive-md-type-text-lg mt-3 site-dimension-max-w-2xl mx-auto site-type-leading-relaxed site-copy text-secondary">
                            আপনার লক্ষ্য ও প্রয়োজনীয় ফিচার জানান। কাজের পরিধি অনুযায়ী আমরা পরবর্তী ধাপ ও সম্ভাব্য খরচ
                            জানাব।</p>
                        <div class="d-flex flex-wrap justify-content-center gap-3 site-spacing-mt-8">
                            <a class="w-100 site-responsive-sm-dimension-w-auto d-inline-flex align-items-center justify-content-center gap-2 site-dimension-h-12 site-spacing-px-7 rounded-pill bg-primary site-color-text-arbitrary-hex-070a0e site-type-font-heading fw-bold site-state-hover-surface-bg-primary-fixed-dim site-motion-transition-all site-elevation-shadow-arbitrary-0-0-30px-rgba-197-243-49-0-25"
                                href="{{ route('contact') }}">ফ্রি কনসাল্টেশন নিন<span
                                    class="material-symbols-outlined fs-5">arrow_forward</span></a>
                            <a class="w-100 site-responsive-sm-dimension-w-auto d-inline-flex align-items-center justify-content-center gap-2 site-dimension-h-12 site-spacing-px-7 rounded-pill site-surface-bg-white-opacity-5 border site-border-border-white-opacity-20 text-white site-type-font-heading fw-semibold site-state-hover-surface-bg-white-opacity-10 site-motion-transition-all site-white-tint site-soft-border text-white"
                                href="tel:01335198859"><span
                                    class="material-symbols-outlined fs-5 text-primary text-dark">call</span>০১৩৩৫-১৯৮৮৫৯</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
