@extends('layouts.frontend') @section('title', $service->meta_title ?: $service->title . ' | WhexSoft')
@section('description', $service->meta_description ?: ($service->short_description ?:
    \Illuminate\Support\Str::limit(strip_tags($service->intro ?: $service->content ?: ''), 180)))
@section('page', 'services')
@section('og_image', $service->getFirstMediaUrl('service-image')) @section('content')
@php
    $heroImage = $service->getFirstMediaUrl('service-image');
    $description =
        $service->short_description ?:
        \Illuminate\Support\Str::limit(strip_tags($service->intro ?: $service->content ?: ''), 180);
    $features = collect($service->features ?? [])
        ->filter(fn($item) => filled($item['title'] ?? null) || filled($item['text'] ?? null))
        ->values();
    $steps = collect($service->steps ?? [])
        ->filter(fn($item) => filled($item['title'] ?? null) || filled($item['text'] ?? null))
        ->values();
    $faqs = collect($service->faqs ?? [])
        ->filter(fn($item) => filled($item['question'] ?? null) && filled($item['answer'] ?? null))
        ->values();

    $walkthroughEmbed = $service->walkthrough_embed_url;
    $hasHeroMedia = $walkthroughEmbed || $heroImage;
    $walkthroughId = \App\Support\YouTubeVideo::videoId($service->service_walkthrough_url);

    // Service image first, then the video's own YouTube thumbnail
    $posterImage = $heroImage ?: ($walkthroughId ? "https://i.ytimg.com/vi/{$walkthroughId}/hqdefault.jpg" : null);

    // Content section layout
    $hasMain = filled($service->intro) || filled($service->content);
    $hasSide = $features->isNotEmpty() || $steps->isNotEmpty();
@endphp
<x-frontend.page>
    {{-- Hero --}}
    <section
        class="w-100 position-relative overflow-hidden site-spacing-pt-32 site-responsive-md-spacing-pt-40 pb-5 site-responsive-md-spacing-pb-16 site-section site-section--dark">
        <div
            class="position-absolute site-style-top-32 end-0 site-dimension-w-arbitrary-600px site-dimension-h-arbitrary-400px bg-primary bg-opacity-10 site-effect-blur-arbitrary-120px rounded-pill pe-none">
        </div>
        <div
            class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
            <div
                class="position-relative d-grid site-layout-grid-cols-1 {{ $hasHeroMedia ? 'site-responsive-lg-layout-grid-cols-2' : '' }} site-spacing-gap-10 site-responsive-lg-spacing-gap-16 align-items-center">
                <div>
                    <nav aria-label="Breadcrumb"
                        class="d-flex flex-wrap align-items-center gap-2 site-type-text-sm site-color-text-slate-400 mb-4 text-secondary fs-6 fw-medium">
                        <a class="site-state-hover-color-text-white" href="{{ route('home') }}">হোম</a>
                        <span class="material-symbols-outlined fs-6">chevron_right</span>
                        <a class="site-state-hover-color-text-white" href="{{ route('services.index') }}">সার্ভিসসমূহ</a>
                        <span class="material-symbols-outlined fs-6">chevron_right</span>
                        <span class="text-primary text-dark">{{ $service->title }}</span>
                    </nav>
                    @if ($service->serviceCategory)
                        <x-frontend.eyebrow
                            class="d-inline-block">{{ $service->serviceCategory->name }}</x-frontend.eyebrow>
                    @endif
                    <h1
                        class="site-type-font-heading site-type-text-4xl site-responsive-md-type-text-6xl site-type-font-extrabold text-white site-type-tracking-tight lh-sm site-spacing-mt-5 site-heading text-white">
                        {{ $service->title }}</h1>
                    @if ($description)
                        <p
                            class="site-color-text-slate-300 fs-6 site-responsive-md-type-text-xl mt-4 site-type-leading-relaxed site-copy text-secondary">
                            {{ $description }}</p>
                    @endif
                    @if ($startingPackage)
                        <p
                            class="site-type-text-sm site-responsive-md-type-text-base site-color-text-slate-200 site-spacing-mt-5 site-copy text-secondary fs-6 fw-medium">
                            <span class="fw-semibold text-primary text-dark">প্যাকেজের মূল্য শুরু</span>
                            <span class="fw-bold text-white text-white">{{ $startingPackage->priceAmount() }}</span>
                            থেকে
                        </p>
                    @endif
                    <div class="d-flex flex-column flex-sm-row site-spacing-gap-3 gap-sm-3 site-spacing-mt-8">
                        <a class="d-inline-flex align-items-center justify-content-center gap-2 site-dimension-h-12 site-spacing-px-7 rounded-pill bg-primary site-color-text-arbitrary-hex-070a0e site-type-font-heading fw-bold site-state-hover-surface-bg-primary-fixed-dim site-motion-transition-all site-elevation-shadow-arbitrary-0-0-30px-rgba-197-243-49-0-25"
                            href="{{ route('contact') }}">ফ্রি কোটেশন নিন<span
                                class="material-symbols-outlined fs-5">arrow_forward</span></a>
                        <a class="d-inline-flex align-items-center justify-content-center gap-2 site-dimension-h-12 site-spacing-px-7 rounded-pill site-surface-bg-white-opacity-5 border site-border-border-white-opacity-20 text-white site-type-font-heading fw-semibold site-state-hover-surface-bg-white-opacity-10 site-motion-transition-all site-white-tint site-soft-border text-white"
                            href="tel:01335198859"><span
                                class="material-symbols-outlined fs-5 text-primary text-dark">call</span>০১৩৩৫-১৯৮৮৫৯</a>
                    </div>
                </div>

                @if ($walkthroughEmbed)
                    {{-- Walkthrough video replaces the hero image --}}
                    <div class="position-relative">
                        <div class="ratio ratio-16x9 site-shape-rounded-3xl overflow-hidden border border-white border-opacity-10 site-surface-bg-arbitrary-hex-111722 site-elevation-shadow-2xl site-soft-border"
                            @if ($posterImage) style="background-image: url('{{ $posterImage }}'); background-size: cover; background-position: center;" @endif>
                            <iframe class="w-100 h-100" src="{{ $walkthroughEmbed }}"
                                title="{{ $service->title }} — সার্ভিস ওয়াকথ্রু" loading="lazy"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div>
                @elseif ($heroImage)
                    {{-- Hero image --}}
                    <div class="position-relative">
                        <div
                            class="position-relative site-shape-rounded-3xl overflow-hidden border border-white border-opacity-10 site-surface-bg-arbitrary-hex-111722 site-elevation-shadow-2xl site-media-aspect-arbitrary-4-opacity-3 bg-white site-soft-border">
                            <img alt="{{ $service->title }}" class="w-100 h-100 object-fit-cover"
                                src="{{ $heroImage }}" />
                            <div
                                class="position-absolute top-0 end-0 bottom-0 start-0 site-surface-bg-gradient-to-t site-surface-from-arbitrary-hex-070a0e-opacity-70 site-surface-via-transparent site-surface-to-transparent site-gradient-background">
                            </div>
                            
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- Packages --}}
    @if ($service->packages->isNotEmpty())
        <section
            class="w-100 position-relative site-spacing-py-16 site-responsive-md-spacing-py-24 site-section site-section--dark">
            <div
                class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <div class="site-dimension-max-w-3xl text-center mx-auto mb-5 site-responsive-md-spacing-mb-14">
                    <x-frontend.eyebrow class="d-inline-block">প্যাকেজ ও মূল্য</x-frontend.eyebrow>
                    <h2
                        class="site-type-font-heading site-type-text-3xl site-responsive-md-type-text-4xl site-type-font-extrabold text-white mt-3 site-type-tracking-tight site-heading text-white">
                        এই সার্ভিসের প্যাকেজসমূহ</h2>
                </div>
                <div
                    class="d-grid site-layout-grid-cols-1 site-responsive-lg-layout-grid-cols-3 site-spacing-gap-8 align-items-stretch">
                    @foreach ($service->packages as $package)
                        <div
                            class="position-relative rounded-4 site-spacing-p-7 d-flex flex-column justify-content-between site-motion-transition-all site-motion-duration-300 site-state-hover-style-translate-y-1-5 {{ $package->is_popular ? 'site-surface-bg-gradient-to-b site-surface-from-arbitrary-hex-111e15 site-surface-to-arbitrary-hex-0c1510 border-2 site-border-border-arbitrary-hex-c5f331 site-elevation-shadow-arbitrary-0-0-36px-rgba-197-243-49-0-25' : 'site-surface-bg-arbitrary-hex-0d131a border border-white border-opacity-10 site-state-hover-border-border-arbitrary-hex-c5f331-opacity-40 site-elevation-shadow-xl' }}">
                            @if ($package->is_popular)
                                <div
                                    class="position-absolute site-style-top-3-5 start-50 translate-middle-x px-3 py-1 site-surface-bg-arbitrary-hex-c5f331 site-color-text-arbitrary-hex-070a0e site-type-text-xs site-type-font-mono site-type-font-extrabold rounded-pill text-uppercase site-type-tracking-wider site-elevation-shadow-arbitrary-0-0-16px-rgba-197-243-49-0-6 text-nowrap small">
                                    সর্বাধিক জনপ্রিয়</div>
                            @endif
                            <div>
                                <div class="d-flex align-items-center justify-content-between mb-3 pt-1">
                                    <span
                                        class="site-type-text-xs site-type-font-mono text-uppercase site-type-tracking-wider {{ $package->is_popular ? 'site-color-text-arbitrary-hex-c5f331 site-surface-bg-arbitrary-hex-c5f331-opacity-15 border site-border-border-arbitrary-hex-c5f331-opacity-40' : 'site-color-text-slate-300 site-surface-bg-white-opacity-5 border border-white border-opacity-10' }} site-spacing-px-3 py-1 rounded-2 fw-bold">{{ $package->name }}</span>
                                    <span
                                        class="material-symbols-outlined {{ $package->is_popular ? 'site-color-text-arbitrary-hex-c5f331' : 'site-color-text-slate-400' }}">rocket_launch</span>
                                </div>
                                <h3
                                    class="site-type-font-heading fs-4 lh-lg fw-bold text-white site-heading text-white">
                                    {{ $package->name }}</h3>
                                @if ($package->tagline)
                                    <p
                                        class="site-type-text-sm site-color-text-arbitrary-hex-c5f331 mt-1 fw-medium site-copy fs-6 ">
                                        {{ $package->tagline }}</p>
                                @endif
                                <div
                                    class="my-4 site-spacing-p-5 rounded-4 {{ $package->is_popular ? 'site-surface-bg-arbitrary-hex-070e0a border site-border-border-arbitrary-hex-c5f331-opacity-30' : 'site-surface-bg-arbitrary-hex-070b10 border site-border-border-white-opacity-5' }}">
                                    <span
                                        class="site-type-text-xs text-uppercase site-type-tracking-wider site-color-text-slate-400 d-block fw-semibold text-secondary small">শুরু
                                        মাত্র</span>
                                    <div class="d-flex align-items-baseline gap-1 mt-1">
                                        <span
                                            class="site-type-text-3xl site-type-font-extrabold {{ $package->is_popular ? 'site-color-text-arbitrary-hex-c5f331' : 'text-white' }}">{{ $package->price_label ?: 'যোগাযোগ করুন' }}</span>
                                    </div>
                                </div>
                                @if (!empty($package->features))
                                    <ul
                                        class="d-flex flex-column site-spacing-gap-3 my-4 site-type-text-sm {{ $package->is_popular ? 'site-color-text-slate-100' : 'site-color-text-slate-200' }}">
                                        @foreach ($package->features as $feature)
                                            <li
                                                class="d-flex align-items-start gap-2-5 {{ !($feature['included'] ?? true) ? 'site-effect-opacity-50' : '' }} site-body-text">
                                                <span
                                                    class="material-symbols-outlined site-type-text-arbitrary-18px {{ $feature['included'] ?? true ? 'site-color-text-arbitrary-hex-c5f331' : 'site-color-text-slate-500' }} flex-shrink-0 site-spacing-mt-0-5">{{ $feature['included'] ?? true ? 'check_circle' : 'cancel' }}</span>
                                                <span>{{ $feature['text'] ?? '' }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="pt-3">
                                <a class="w-100 d-inline-flex align-items-center justify-content-center gap-2 site-spacing-py-3 site-spacing-px-5 rounded-4 {{ $package->is_popular ? 'site-surface-bg-arbitrary-hex-c5f331 site-state-hover-surface-bg-arbitrary-hex-b0dc2b site-color-text-arbitrary-hex-070a0e fw-bold site-elevation-shadow-arbitrary-0-0-24px-rgba-197-243-49-0-35' : 'site-surface-bg-white-opacity-10 site-state-hover-surface-bg-white-opacity-20 text-white fw-semibold border border-white border-opacity-10' }} site-type-text-sm site-motion-transition-all"
                                    href="{{ route('contact') }}?service={{ urlencode($service->title) }}&package={{ urlencode($package->name) }}">
                                    <span>এই প্যাকেজটি বেছে নিন</span>
                                    <span
                                        class="material-symbols-outlined site-type-text-arbitrary-18px">arrow_forward</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Content + features + steps --}}
    @if ($hasMain || $hasSide)
        <section
            class="w-100 position-relative site-spacing-py-16 site-responsive-md-spacing-py-24 site-section site-section--light">
            <div
                class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <div
                    class="d-grid site-layout-grid-cols-1 {{ $hasMain && $hasSide ? 'site-responsive-lg-layout-grid-cols-12' : '' }} site-spacing-gap-8 align-items-start">

                    {{-- Big box: WYSIWYG content --}}
                    @if ($hasMain)
                        <div
                            class="{{ $hasSide ? 'site-responsive-lg-layout-col-span-8' : '' }} site-dimension-min-w-0">
                            <div
                                class="rounded-4 bg-white border site-soft-border p-4 site-responsive-sm-spacing-p-8 overflow-hidden">
                                <x-frontend.eyebrow class="d-inline-block">সার্ভিস পরিচিতি</x-frontend.eyebrow>
                                @if ($service->intro)
                                    <div
                                        class="mt-4 site-type-text-lg site-type-leading-relaxed text-black text-wrap text-break">
                                        {!! nl2br(e($service->intro)) !!}</div>
                                @endif
                                @if ($service->content)
                                    <div
                                        class="service-content mt-4 site-type-leading-relaxed text-black text-wrap text-break">
                                        {!! $service->content !!}</div>
                                @endif
                            </div>
                        </div>
                    @endif

                    {{-- Small boxes: features and steps --}}
                    @if ($hasSide)
                        <div
                            class="{{ $hasMain ? 'site-responsive-lg-layout-col-span-4' : '' }} d-flex flex-column gap-4">

                            @if ($features->isNotEmpty())
                                <div class="rounded-4 bg-white border site-soft-border p-4">
                                    <div
                                        class="d-flex align-items-center site-spacing-gap-3 pb-3 mb-4 border-bottom site-soft-border">
                                        <div
                                            class="site-accent-component d-inline-flex align-items-center justify-content-center rounded-circle site-dimension-w-10 site-dimension-h-10 flex-shrink-0">
                                            <span
                                                class="material-symbols-outlined site-type-text-arbitrary-22px">verified</span>
                                        </div>
                                        <div>
                                            <span
                                                class="site-type-text-xs site-type-font-mono text-secondary d-block small fw-medium">যা
                                                যা পাচ্ছেন</span>
                                            <h2
                                                class="site-type-font-heading site-type-text-lg fw-bold mb-0 site-heading">
                                                এই সার্ভিসের মূল ফিচারসমূহ</h2>
                                        </div>
                                    </div>
                                    <ul class="d-flex flex-column gap-3 mb-0">
                                        @foreach ($features as $feature)
                                            <li class="d-flex align-items-start site-spacing-gap-3">
                                                <div
                                                    class="site-accent-component d-inline-flex align-items-center justify-content-center rounded-circle site-dimension-w-8 site-dimension-h-8 flex-shrink-0">
                                                    <span
                                                        class="material-symbols-outlined site-type-text-arbitrary-18px">check_circle</span>
                                                </div>
                                                <div>
                                                    @if (!empty($feature['title']))
                                                        <h3
                                                            class="site-type-font-heading fs-6 fw-bold mb-1 site-heading">
                                                            {{ $feature['title'] }}</h3>
                                                    @endif
                                                    @if (!empty($feature['text']))
                                                        <p
                                                            class="site-type-text-sm site-type-leading-relaxed mb-0 site-copy text-secondary fs-6 fw-medium">
                                                            {{ $feature['text'] }}</p>
                                                    @endif
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if ($steps->isNotEmpty())
                                <div class="rounded-4 bg-white border site-soft-border p-4">
                                    <div
                                        class="d-flex align-items-center site-spacing-gap-3 pb-3 mb-4 border-bottom site-soft-border">
                                        <div
                                            class="site-accent-component d-inline-flex align-items-center justify-content-center rounded-circle site-dimension-w-10 site-dimension-h-10 flex-shrink-0">
                                            <span
                                                class="material-symbols-outlined site-type-text-arbitrary-22px">route</span>
                                        </div>
                                        <div>
                                            <span
                                                class="site-type-text-xs site-type-font-mono text-secondary d-block small fw-medium">কাজের
                                                ধাপ</span>
                                            <h2
                                                class="site-type-font-heading site-type-text-lg fw-bold mb-0 site-heading">
                                                কীভাবে কাজটি সম্পন্ন হয়</h2>
                                        </div>
                                    </div>
                                    <ol class="d-flex flex-column gap-3 mb-0">
                                        @foreach ($steps as $step)
                                            <li class="d-flex align-items-start site-spacing-gap-3">
                                                <div
                                                    class="site-accent-component d-inline-flex align-items-center justify-content-center rounded-circle site-dimension-w-8 site-dimension-h-8 flex-shrink-0 site-type-font-mono fw-bold site-type-text-xs">
                                                    {{ sprintf('%02d', $loop->iteration) }}
                                                </div>
                                                <div>
                                                    @if (!empty($step['title']))
                                                        <h3
                                                            class="site-type-font-heading fs-6 fw-bold mb-1 site-heading">
                                                            {{ $step['title'] }}</h3>
                                                    @endif
                                                    @if (!empty($step['text']))
                                                        <p
                                                            class="site-type-text-sm site-type-leading-relaxed mb-0 site-copy text-secondary fs-6 fw-medium">
                                                            {{ $step['text'] }}</p>
                                                    @endif
                                                </div>
                                            </li>
                                        @endforeach
                                    </ol>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif



    {{-- Related projects --}}
    <section id="related-projects" aria-labelledby="related-projects-title"
        class="w-100 site-surface-bg-arbitrary-hex-0b0f14-opacity-80 border-top border-bottom border-white border-opacity-10 position-relative site-spacing-py-16 site-responsive-md-spacing-py-24 bg-white site-soft-border site-section site-section--dark">
        <div
            class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
            <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between mb-5 gap-4">
                <div>
                    <x-frontend.eyebrow class="d-inline-block">সংশ্লিষ্ট কাজ</x-frontend.eyebrow>
                    <h2 id="related-projects-title"
                        class="site-type-font-heading site-type-text-3xl site-responsive-md-type-text-4xl site-type-font-extrabold text-white mt-3 site-type-tracking-tight site-heading text-white">
                        এই সার্ভিসের প্রজেক্টসমূহ</h2>
                </div>
                <x-frontend.buttons.section :href="route('portfolio.index')" text="সকল প্রজেক্ট দেখুন" />
            </div>
            @if ($service->projects->isNotEmpty())
                <div class="d-grid site-layout-grid-cols-1 site-responsive-md-layout-grid-cols-3 gap-4">
                    @foreach ($service->projects as $project)
                        <x-frontend.card.project :project="$project" />
                    @endforeach
                </div>
            @else
                <div
                    class="rounded-4 site-surface-bg-arbitrary-hex-111722 border border-white border-opacity-10 p-4 text-center bg-white site-soft-border">
                    <p
                        class="site-type-text-sm site-color-text-slate-300 mb-3 site-copy text-secondary fs-6 fw-medium">
                        এই সার্ভিসের সঙ্গে সম্পর্কিত প্রজেক্টগুলো শিগগিরই এখানে যোগ করা হবে।</p>
                    <x-frontend.buttons.section :href="route('contact')" text="আপনার প্রজেক্ট নিয়ে কথা বলুন" />
                </div>
            @endif
        </div>
    </section>

    {{-- FAQ --}}
    @if ($faqs->isNotEmpty())
        <section
            class="w-100 position-relative site-spacing-py-16 site-responsive-md-spacing-py-24 site-section site-section--light">
            <div
                class="site-dimension-max-w-4xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <div class="site-dimension-max-w-3xl text-center mx-auto mb-5">
                    <x-frontend.eyebrow class="d-inline-block">সচরাচর জিজ্ঞাসা</x-frontend.eyebrow>
                    <h2
                        class="site-type-font-heading site-type-text-3xl site-responsive-md-type-text-4xl site-type-font-extrabold mt-3 site-type-tracking-tight site-heading">
                        আপনার প্রশ্নের উত্তর</h2>
                </div>
                <div class="d-flex flex-column site-spacing-gap-3">
                    @foreach ($faqs as $faq)
                        <details
                            class="site-style-group rounded-4 site-surface-bg-arbitrary-hex-111722 border border-white border-opacity-10 site-state-open-border-border-primary-fixed-opacity-40 site-state-hover-border-border-primary-fixed-opacity-40 site-motion-transition-colors">
                            <summary style="color: #ffffff;"
                                class="d-flex align-items-center justify-content-between gap-3 site-effect-cursor-pointer list-unstyled site-spacing-p-5 p-md-4 site-type-font-heading fw-semibold">
                                <span>{{ $faq['question'] }}</span>
                                <span
                                    class="material-symbols-outlined text-primary site-motion-transition-transform site-state-group-open-motion-rotate-180 flex-shrink-0">expand_more</span>
                            </summary>
                            <p style="color: #cbd5e1;"
                                class="site-spacing-px-5 px-md-4 site-spacing-pb-5 pb-md-4 mb-0 site-type-leading-relaxed">
                                {{ $faq['answer'] }}</p>
                        </details>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Other services --}}
    @if ($otherServices->isNotEmpty())
        <section
            class="w-100 site-surface-bg-arbitrary-hex-0b0f14-opacity-70 border-top border-bottom border-white border-opacity-10 position-relative site-spacing-py-16 site-responsive-md-spacing-py-24 bg-white site-soft-border site-section site-section--dark">
            <div
                class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <div class="site-dimension-max-w-3xl text-center mx-auto mb-5">
                    <x-frontend.eyebrow class="d-inline-block">আরও সার্ভিস</x-frontend.eyebrow>
                    <h2
                        class="site-type-font-heading site-type-text-3xl site-responsive-md-type-text-4xl site-type-font-extrabold text-white mt-3 site-type-tracking-tight site-heading text-white">
                        অন্যান্য সার্ভিসসমূহ</h2>
                </div>
                <div class="d-grid site-layout-grid-cols-1 site-responsive-md-layout-grid-cols-3 gap-4">
                    @foreach ($otherServices as $other)
                        <x-frontend.card.service :service="$other" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Contact Section --}}
    @include('partials.frontend.contact-section')

</x-frontend.page>
@endsection
