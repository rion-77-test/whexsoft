@extends('frontend.layouts.app') @section('title', $project->title.' | WhexSoft')
@section('description', $project->summary ?: $project->title.' প্রজেক্টের বিস্তারিত দেখুন।')
@section('page', 'portfolio')
@section('og_image', $project->getFirstMediaUrl('project-image') ?: asset('assets/frontend/images/project-ecommerce.jpg')) @section('content')
@php $projectImages = [ asset('assets/frontend/images/project-ecommerce.jpg'), asset('assets/frontend/images/project-landing.jpg'), asset('assets/frontend/images/project-corporate.jpg'), asset('assets/frontend/images/project-webapp.jpg'), asset('assets/frontend/images/project-uiux.jpg'), asset('assets/frontend/images/project-maintenance.jpg'), ]; $image = $project->getFirstMediaUrl('project-image') ?: $projectImages[0]; $description = (string) $project->description; $isHtml = strip_tags($description) !== $description;
@endphp
<main class="w-100 position-relative site-effect-overflow-x-clip">
    <section class="w-100 position-relative overflow-hidden site-spacing-pt-32 site-responsive-md-spacing-pt-40 site-spacing-pb-10 site-responsive-md-spacing-pb-14 site-section site-section--dark">
        <div class="position-absolute site-style-top-32 start-50 translate-middle-x site-dimension-w-arbitrary-700px site-dimension-h-arbitrary-400px bg-primary bg-opacity-10 site-effect-blur-arbitrary-120px rounded-pill pe-none"></div>
        <div class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
            <nav aria-label="Breadcrumb" class="d-flex flex-wrap align-items-center gap-2 site-type-text-sm site-color-text-slate-400 mb-4 text-secondary fs-6 fw-medium">
                <a class="site-state-hover-color-text-white" href="{{ route('home') }}">হোম</a>
                <span class="material-symbols-outlined fs-6">chevron_right</span>
                <a class="site-state-hover-color-text-white" href="{{ route('portfolio.index') }}">আমাদের কাজ</a>
                <span class="material-symbols-outlined fs-6">chevron_right</span>
                <span class="text-primary text-dark">{{ $project->title }}</span>
            </nav>
            <div class="d-flex flex-wrap align-items-center gap-2 site-spacing-mb-5"> @if ($project->projectCategory)
                <span class="site-spacing-px-3 py-1 rounded-pill site-surface-bg-primary-fixed-opacity-15 text-primary border site-border-border-primary-fixed-opacity-30 site-type-text-xs site-type-font-mono site-accent-component text-dark small fw-medium">#{{ $project->projectCategory->name }}</span> @endif @if ($project->is_real_client)
                <span class="site-spacing-px-3 py-1 rounded-pill site-surface-bg-success-whatsapp-opacity-15 site-color-text-success-whatsapp border site-border-border-success-whatsapp-opacity-30 site-type-text-xs site-type-font-mono small fw-medium">রিয়েল ক্লায়েন্ট</span> @endif @if ($project->service)
                <a class="site-spacing-px-3 py-1 rounded-pill site-surface-bg-white-opacity-5 site-color-text-slate-200 border border-white border-opacity-10 site-type-text-xs site-type-font-mono site-state-hover-border-border-primary-fixed-opacity-40 site-motion-transition-colors site-white-tint site-soft-border text-secondary small fw-medium" href="{{ route('services.show', $project->service) }}">{{ $project->service->title }}</a> @endif
            </div>
            <h1 class="site-type-font-display site-type-text-3xl site-responsive-sm-type-text-4xl site-responsive-lg-type-text-5xl site-type-font-extrabold text-white site-type-tracking-tight lh-sm site-dimension-max-w-4xl site-heading text-white">{{ $project->title }}</h1>
            <p class="site-color-text-slate-300 fs-6 site-responsive-sm-type-text-lg mt-3 site-dimension-max-w-3xl site-type-leading-relaxed site-copy text-secondary">{{ $project->summary }}</p>
            <div class="d-flex flex-wrap site-spacing-gap-3 site-spacing-mt-8"> @if ($project->live_url)
                <a class="d-inline-flex align-items-center justify-content-center gap-2 site-dimension-h-12 site-spacing-px-7 rounded-pill bg-primary site-color-text-arbitrary-hex-070a0e site-type-font-heading fw-bold site-state-hover-surface-bg-primary-fixed-dim site-motion-transition-all site-elevation-shadow-arbitrary-0-0-30px-rgba-197-243-49-0-25" href="{{ $project->live_url }}" rel="noopener noreferrer" target="_blank">লাইভ সাইট দেখুন<span class="material-symbols-outlined fs-5">open_in_new</span></a> @endif
                <a class="d-inline-flex align-items-center justify-content-center gap-2 site-dimension-h-12 site-spacing-px-7 rounded-pill site-surface-bg-white-opacity-5 border site-border-border-white-opacity-20 text-white site-type-font-heading fw-semibold site-state-hover-surface-bg-white-opacity-10 site-motion-transition-all site-white-tint site-soft-border text-white" href="{{ route('contact') }}">এমন প্রজেক্ট নিয়ে কথা বলুন<span class="material-symbols-outlined fs-5 text-primary text-dark">arrow_forward</span></a>
            </div>
        </div>
    </section>
    <section class="w-100 position-relative site-spacing-py-8 py-md-5 site-section site-section--light">
        <div class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
            <div class="position-relative site-shape-rounded-3xl overflow-hidden border border-white border-opacity-10 site-surface-bg-arbitrary-hex-111722 site-elevation-shadow-2xl bg-white site-soft-border">
                <img alt="{{ $project->title }}" class="w-100 site-dimension-max-h-arbitrary-620px object-fit-cover site-media-object-top" src="{{ $image }}" />
                <div class="position-absolute top-0 end-0 bottom-0 start-0 site-surface-bg-gradient-to-t site-surface-from-arbitrary-hex-070a0e-opacity-60 site-surface-via-transparent site-surface-to-transparent pe-none site-gradient-background"></div>
            </div>
        </div>
    </section> @if ($project->walkthrough_embed_url)
    <section class="w-100 position-relative site-spacing-py-8 py-md-5 site-section site-section--dark">
        <div class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
            <div class="site-shape-rounded-3xl site-surface-bg-arbitrary-hex-111722 border border-white border-opacity-10 site-spacing-p-5 site-responsive-sm-spacing-p-7 site-elevation-shadow-2xl bg-white site-soft-border">
                <div class="d-flex flex-wrap align-items-start justify-content-between gap-3 site-spacing-mb-5">
                    <div>
                        <span class="d-inline-flex align-items-center gap-2 site-type-text-xs site-type-font-mono text-uppercase site-type-tracking-widest text-primary bg-primary bg-opacity-10 border site-border-border-primary-fixed-opacity-30 site-spacing-px-3-5 py-1 rounded-pill site-accent-component text-dark small fw-medium"><span class="material-symbols-outlined fs-6">play_circle</span>প্রজেক্ট ওয়াকথ্রু</span>
                        <h2 class="site-type-font-heading fs-4 lh-lg site-responsive-md-type-text-3xl site-type-font-extrabold text-white site-spacing-mt-3 site-heading text-white">প্রজেক্টটি ভিডিওতে দেখুন</h2>
                        <p class="site-type-text-sm site-color-text-slate-300 mt-2 site-dimension-max-w-2xl site-copy text-secondary fs-6 fw-medium">প্রজেক্টের মূল ফিচার ও কার্যপ্রবাহের সংক্ষিপ্ত ভিডিও ওয়াকথ্রু।</p>
                    </div>
                    <a class="d-inline-flex align-items-center gap-1-5 text-primary site-state-hover-color-text-white site-type-text-sm fw-semibold site-motion-transition-colors text-dark fs-6 site-content-action" href="{{ $project->project_walkthrough_url }}" rel="noopener noreferrer" target="_blank">ইউটিউবে দেখুন<span class="material-symbols-outlined fs-6">north_east</span></a>
                </div>
                <div class="position-relative w-100 site-media-aspect-video rounded-4 overflow-hidden border border-white border-opacity-10 site-surface-bg-arbitrary-hex-0a0e13 bg-white site-soft-border">
                    <iframe class="position-absolute top-0 end-0 bottom-0 start-0 w-100 h-100" src="{{ $project->walkthrough_embed_url }}" title="{{ $project->title }} — প্রজেক্ট ওয়াকথ্রু" loading="lazy" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section> @endif
    <section class="w-100 position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--light">
        <div class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
            <div class="d-grid site-layout-grid-cols-1 site-responsive-lg-layout-grid-cols-12 site-spacing-gap-8 gap-lg-5 align-items-start">
                <div class="site-responsive-lg-layout-col-span-8 site-spacing-space-y-8">
                    <div class="rounded-4 site-surface-bg-arbitrary-hex-111722 border border-white border-opacity-10 p-4 site-responsive-sm-spacing-p-8 bg-white site-soft-border">
                        <h2 class="site-type-font-heading fs-4 lh-lg fw-bold text-white mb-3 d-flex align-items-center gap-2 site-heading text-white"><span class="material-symbols-outlined text-primary text-dark">description</span> প্রজেক্টের বিবরণ</h2> @if (filled($description))
                        <div class="site-color-text-slate-300 site-type-leading-relaxed site-spacing-space-y-4 site-state-arbitrary-h2-color-text-white site-state-arbitrary-h3-color-text-white site-state-arbitrary-h2-type-font-heading site-state-arbitrary-h3-type-font-heading site-state-arbitrary-a-color-text-primary-fixed site-state-arbitrary-ul-type-list-disc site-state-arbitrary-ul-spacing-pl-5 site-state-arbitrary-ol-type-list-decimal site-state-arbitrary-ol-spacing-pl-5 text-secondary"> @if ($isHtml) {!! $description !!} @else {!! nl2br(e($description)) !!} @endif
                        </div> @else
                        <p class="site-color-text-slate-300 site-type-leading-relaxed site-copy text-secondary">{{ $project->summary ?: 'এই প্রজেক্টের বিস্তারিত এখনো যোগ করা হয়নি।' }}</p> @endif
                    </div>
                    <div class="d-grid site-layout-grid-cols-1 site-responsive-sm-layout-grid-cols-3 gap-3"> @foreach ([ ['bolt', 'প্রজেক্টভিত্তিক', 'প্রয়োজনীয় ফিচার'], ['devices', 'বিভিন্ন স্ক্রিনে', 'ব্যবহার উপযোগী লেআউট'], ['tune', 'ব্যবসা অনুযায়ী', 'ডিজাইন ও কার্যপ্রবাহ'], ] as [$icon, $title, $text])
                        <div class="rounded-4 site-surface-bg-arbitrary-hex-111722 border border-white border-opacity-10 site-spacing-p-5 bg-white site-soft-border">
                            <span class="material-symbols-outlined text-primary site-type-text-arbitrary-26px text-dark">{{ $icon }}</span>
                            <h3 class="site-type-font-heading fs-6 fw-bold text-white site-spacing-mt-3 site-heading text-white">{{ $title }}</h3>
                            <p class="site-type-text-xs site-color-text-slate-300 mt-1 site-copy text-secondary small fw-medium">{{ $text }}</p>
                        </div> @endforeach
                    </div>
                </div>
                <aside class="site-responsive-lg-layout-col-span-4 site-spacing-space-y-6">
                    <div class="rounded-4 site-surface-bg-arbitrary-hex-111722 border border-white border-opacity-10 p-4 bg-white site-soft-border">
                        <h3 class="site-type-font-heading site-type-text-lg fw-bold text-white site-spacing-mb-5 site-heading text-white">প্রজেক্ট তথ্য</h3>
                        <dl class="site-spacing-space-y-4 site-type-text-sm fs-6 fw-medium">
                            <div class="d-flex align-items-start justify-content-between gap-3 border-bottom border-white border-opacity-10 site-spacing-pb-3 site-soft-border">
                                <dt class="site-color-text-slate-400 text-secondary">ক্যাটাগরি</dt>
                                <dd class="site-color-text-slate-100 text-end text-white">{{ $project->projectCategory?->name ?: '—' }}</dd>
                            </div>
                            <div class="d-flex align-items-start justify-content-between gap-3 border-bottom border-white border-opacity-10 site-spacing-pb-3 site-soft-border">
                                <dt class="site-color-text-slate-400 text-secondary">সার্ভিস</dt>
                                <dd class="site-color-text-slate-100 text-end text-white">{{ $project->service?->title ?: '—' }}</dd>
                            </div>
                            <div class="d-flex align-items-start justify-content-between gap-3 border-bottom border-white border-opacity-10 site-spacing-pb-3 site-soft-border">
                                <dt class="site-color-text-slate-400 text-secondary">ক্লায়েন্ট</dt>
                                <dd class="site-color-text-slate-100 text-end text-white">{{ $project->is_real_client ? 'রিয়েল প্রজেক্ট' : 'ডেমো / কনসেপ্ট' }}</dd>
                            </div>
                            <div class="d-flex align-items-start justify-content-between gap-3">
                                <dt class="site-color-text-slate-400 text-secondary">লাইভ সাইট</dt>
                                <dd class="text-end"> @if ($project->live_url)
                                    <a class="text-primary site-state-hover-type-underline text-dark" href="{{ $project->live_url }}" rel="noopener noreferrer" target="_blank">ভিজিট করুন</a> @else
                                    <span class="site-color-text-slate-100 text-white">—</span> @endif
                                </dd>
                            </div>
                        </dl>
                    </div>
                    <div class="rounded-4 site-surface-bg-gradient-to-b site-surface-from-arbitrary-hex-122218 site-surface-to-arbitrary-hex-0c1510 border site-border-border-primary-fixed-opacity-30 p-4 site-gradient-background">
                        <span class="d-inline-flex align-items-center gap-2 text-primary site-type-font-mono site-type-text-xs text-uppercase site-type-tracking-widest text-dark small fw-medium"><span class="site-dimension-w-2 site-dimension-h-2 rounded-pill bg-primary site-motion-animate-pulse"></span> ফ্রি কোটেশন</span>
                        <h3 class="site-type-font-heading site-type-text-xl fw-bold text-white site-spacing-mt-3 site-heading text-white">একই রকম ওয়েবসাইট চান?</h3>
                        <p class="site-type-text-sm site-color-text-slate-300 mt-2 site-type-leading-relaxed site-copy text-secondary fs-6 fw-medium">আপনার প্রজেক্টের লক্ষ্য ও প্রয়োজনীয় ফিচার নিয়ে আমাদের সঙ্গে কথা বলুন।</p>
                        <div class="d-flex flex-column gap-2 site-spacing-mt-5">
                            <a class="d-inline-flex align-items-center justify-content-center gap-2 site-dimension-h-11 rounded-4 bg-primary site-color-text-arbitrary-hex-070a0e site-type-text-sm fw-bold site-state-hover-surface-bg-primary-fixed-dim site-motion-transition-all fs-6" href="{{ route('contact') }}">কোটেশন নিন<span class="material-symbols-outlined site-type-text-arbitrary-18px">arrow_forward</span></a>
                            <a class="d-inline-flex align-items-center justify-content-center gap-2 site-dimension-h-11 rounded-4 site-surface-bg-arbitrary-hex-25d366 site-color-text-arbitrary-hex-070a0e site-type-text-sm fw-bold site-state-hover-style-brightness-110 site-motion-transition-all fs-6" href="https://wa.me/8801335198859" rel="noopener noreferrer" target="_blank"><span class="material-symbols-outlined site-type-text-arbitrary-18px">chat</span>হোয়াটসঅ্যাপ</a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section> @if ($relatedProjects->isNotEmpty())
    <section class="w-100 site-surface-bg-arbitrary-hex-0b0f14-opacity-70 border-top border-bottom border-white border-opacity-10 position-relative site-spacing-py-16 site-responsive-md-spacing-py-24 bg-white site-soft-border site-section site-section--dark">
        <div class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
            <div class="d-flex flex-column flex-sm-row align-items-sm-end justify-content-between gap-3 site-spacing-mb-10">
                <div>
                    <span class="d-inline-block site-type-text-xs site-type-font-mono text-uppercase site-type-tracking-widest text-primary bg-primary bg-opacity-10 border site-border-border-primary-fixed-opacity-30 site-spacing-px-3-5 py-1 rounded-pill site-accent-component text-dark small fw-medium">সম্পর্কিত কাজ</span>
                    <h2 class="site-type-font-heading site-type-text-3xl site-responsive-md-type-text-4xl site-type-font-extrabold text-white mt-3 site-type-tracking-tight site-heading text-white">আরও কিছু প্রজেক্ট</h2>
                </div>
                <a class="d-inline-flex align-items-center gap-1-5 text-primary site-state-hover-color-text-white site-type-text-sm fw-semibold site-motion-transition-colors text-dark fs-6 site-content-action" href="{{ route('portfolio.index') }}">সকল প্রজেক্ট<span class="material-symbols-outlined fs-6">north_east</span></a>
            </div>
            <div class="d-grid site-layout-grid-cols-1 site-responsive-md-layout-grid-cols-3 gap-4"> @foreach ($relatedProjects as $related) @php $relatedImage = $related->getFirstMediaUrl('project-image') ?: $projectImages[$loop->index % count($projectImages)]; @endphp
                <article class="rounded-4 site-surface-bg-arbitrary-hex-11171f border border-white border-opacity-10 site-state-hover-border-border-primary-fixed-opacity-40 overflow-hidden site-elevation-shadow-xl site-state-hover-style-translate-y-1 site-motion-transition-all site-style-group d-flex flex-column bg-white site-soft-border">
                    <a class="position-relative site-media-aspect-arbitrary-16-opacity-10 overflow-hidden site-surface-bg-arbitrary-hex-0a0e13 bg-white" href="{{ route('portfolio.show', $related) }}">
                        <img alt="{{ $related->title }}" class="w-100 h-100 object-fit-cover site-state-group-hover-motion-scale-105 site-motion-transition-transform site-motion-duration-500" src="{{ $relatedImage }}" />
                    </a>
                    <div class="site-spacing-p-5"> @if ($related->projectCategory)
                        <span class="site-type-text-arbitrary-11px site-spacing-px-2-5 site-spacing-py-0-5 rounded-2 site-surface-bg-primary-fixed-opacity-15 text-primary border site-border-border-primary-fixed-opacity-20 site-accent-component text-dark small fw-medium">#{{ $related->projectCategory->name }}</span> @endif
                        <h3 class="site-type-font-display site-type-text-lg fw-bold text-white mt-2 site-state-group-hover-color-text-primary-fixed site-motion-transition-colors site-heading text-white">
                            <a href="{{ route('portfolio.show', $related) }}">{{ $related->title }}</a>
                        </h3>
                        <p class="site-type-text-xs site-color-text-slate-300 site-spacing-mt-1-5 site-type-line-clamp-2 site-copy text-secondary small fw-medium">{{ $related->summary }}</p>
                    </div>
                </article> @endforeach
            </div>
        </div>
    </section> @endif
</main>
@endsection
