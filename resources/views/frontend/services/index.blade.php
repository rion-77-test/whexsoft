@extends('frontend.layouts.app') @section('title', 'সার্ভিসসমূহ | WhexSoft')
@section('description', $services->map(fn($service) => $service->short_description ?:
    $service->title)->take(3)->implode(' '))
    @section('page', 'services') @section('content')
    @php
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
    <main class="w-100 position-relative site-effect-overflow-x-clip">
        <section
            class="w-100 site-surface-bg-arbitrary-hex-0b0f14-opacity-70 border-top border-bottom border-white border-opacity-10 position-relative site-spacing-py-16 site-responsive-md-spacing-py-24 bg-white site-soft-border site-section site-section--dark"
            id="all-services">
            <div
                class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <div class="site-dimension-max-w-3xl text-center mx-auto mb-5 site-responsive-md-spacing-mb-14">
                    <span
                        class="d-inline-block site-type-text-xs site-type-font-mono text-uppercase site-type-tracking-widest text-primary bg-primary bg-opacity-10 border site-border-border-primary-fixed-opacity-30 site-spacing-px-3-5 py-1 rounded-pill site-accent-component text-dark small fw-medium">আমাদের
                        সেবাসমূহ</span>
                    <h1
                        class="site-type-font-heading site-type-text-3xl site-responsive-md-type-text-4xl site-type-font-extrabold text-white mt-3 site-type-tracking-tight site-heading text-white">
                        আপনার ব্যবসার জন্য ডিজিটাল সমাধান</h1>
                    <p
                        class="site-color-text-slate-300 fs-6 site-responsive-md-type-text-lg mt-3 site-type-leading-relaxed site-copy text-secondary">
                        দর্শককে বিশ্বস্ত গ্রাহকে রূপ দিতে আমরা তৈরি করি উচ্চ-কার্যকর ওয়েবসাইট ও ডিজিটাল অভিজ্ঞতা।</p>
                    @if ($startingPackage)
                        <p
                            class="site-type-text-sm site-responsive-md-type-text-base site-color-text-slate-200 site-spacing-mt-5 site-copy text-secondary fs-6 fw-medium">
                            <span class="fw-semibold text-primary text-dark">প্যাকেজের মূল্য শুরু</span>
                            <span class="fw-bold text-white text-white">{{ $startingPackage->priceAmount() }}</span> থেকে
                        </p>
                    @endif
                </div>
                @if ($services->isEmpty())
                    <div
                        class="rounded-4 border border-white border-opacity-10 site-surface-bg-arbitrary-hex-111722 site-spacing-p-10 text-center site-color-text-slate-300 bg-white site-soft-border text-secondary">
                        এখনো কোনো সার্ভিস যুক্ত করা হয়নি।</div>
                @else
                    <div
                        class="d-grid site-layout-grid-cols-1 site-responsive-md-layout-grid-cols-2 site-responsive-lg-layout-grid-cols-3 gap-4 site-responsive-lg-spacing-gap-8">
                        @foreach ($services as $service)
                            @php
                                $image = $service->getFirstMediaUrl('service-image');
                                $description =
                                    $service->short_description ?:
                                    \Illuminate\Support\Str::limit(
                                        strip_tags($service->intro ?: $service->content ?: ''),
                                        140,
                                    );
                                $description =
                                    $description ?:
                                    $serviceDescriptions[$service->slug] ??
                                        'আপনার ব্যবসার লক্ষ্য অনুযায়ী কাস্টম ডিজাইন ও ডেভেলপমেন্ট।';
                                $points = collect($service->features ?? [])
                                    ->filter(
                                        fn($feature) => filled($feature['title'] ?? null) ||
                                            filled($feature['text'] ?? null),
                                    )
                                    ->take(3);
                            @endphp
                            <article
                                class="site-style-group d-flex flex-column rounded-4 site-surface-bg-arbitrary-hex-111722 border border-white border-opacity-10 overflow-hidden site-state-hover-border-border-primary-fixed-opacity-40 site-state-hover-style-translate-y-1 site-motion-transition-all site-motion-duration-300 bg-white site-soft-border">
                                @if ($image)
                                    <a aria-hidden="true"
                                        class="position-relative d-block site-media-aspect-arbitrary-16-opacity-10 overflow-hidden site-surface-bg-arbitrary-hex-0b0f14 bg-white"
                                        href="{{ route('services.show', $service) }}" tabindex="-1">
                                        <img alt="{{ $service->title }}"
                                            class="w-100 h-100 object-fit-cover site-state-group-hover-motion-scale-105 site-motion-transition-transform site-motion-duration-500"
                                            loading="lazy" src="{{ $image }}" />
                                    </a>
                                @endif
                                <div class="d-flex flex-column site-layout-flex-1 p-4">
                                    @if ($service->serviceCategory)
                                        <span
                                            class="site-type-text-xs site-type-font-mono text-primary mb-2 text-dark small fw-medium">{{ $service->serviceCategory->name }}</span>
                                    @endif
                                    <h3
                                        class="site-type-font-heading site-type-text-xl fw-bold text-white site-heading text-white">
                                        <a class="site-state-hover-color-text-primary-fixed site-motion-transition-colors"
                                            href="{{ route('services.show', $service) }}">{{ $service->title }}</a>
                                    </h3>
                                    @if ($description)
                                        <p
                                            class="site-color-text-slate-300 site-type-text-sm site-type-leading-relaxed site-spacing-mt-3 site-copy text-secondary fs-6 fw-medium">
                                            {{ $description }}</p>
                                        @endif @if ($points->isNotEmpty())
                                            <ul
                                                class="site-type-text-sm site-color-text-slate-200 site-spacing-space-y-2 site-spacing-mt-5 text-secondary fs-6 fw-medium">
                                                @foreach ($points as $point)
                                                    <li class="d-flex align-items-center gap-2 site-body-text"><span
                                                            class="material-symbols-outlined text-primary site-type-text-arbitrary-18px text-dark">check_circle</span>{{ $point['title'] ?? '' ?: $point['text'] ?? '' }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        <div class="d-flex align-items-center site-spacing-gap-3 mt-auto pt-4">
                                            <a class="site-layout-flex-1 d-inline-flex align-items-center justify-content-center gap-1-5 site-dimension-h-11 rounded-pill bg-primary site-color-text-arbitrary-hex-070a0e site-type-text-sm fw-bold site-state-hover-surface-bg-primary-fixed-dim site-motion-transition-colors fs-6"
                                                href="{{ route('services.show', $service) }}">বিস্তারিত দেখুন<span
                                                    class="material-symbols-outlined site-type-text-arbitrary-18px">arrow_forward</span></a>
                                            <a aria-label="কল করুন"
                                                class="site-dimension-w-11 site-dimension-h-11 rounded-pill border site-border-border-white-opacity-20 d-flex align-items-center justify-content-center text-white site-state-hover-border-border-primary-fixed site-state-hover-color-text-primary-fixed site-motion-transition-colors site-soft-border text-white"
                                                href="tel:01335198859">
                                                <span class="material-symbols-outlined fs-5">call</span>
                                            </a>
                                        </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
        @if ($serviceFeatures->isNotEmpty())
            <section class="w-100 position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--light">
                <div
                    class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                    <div class="site-dimension-max-w-3xl text-center mx-auto mb-5 site-responsive-md-spacing-mb-14">
                        <span
                            class="d-inline-block site-type-text-xs site-type-font-mono text-uppercase site-type-tracking-widest text-primary bg-primary bg-opacity-10 border site-border-border-primary-fixed-opacity-30 site-spacing-px-3-5 py-1 rounded-pill site-accent-component text-dark small fw-medium">সার্ভিসের
                            বৈশিষ্ট্য</span>
                        <h2
                            class="site-type-font-heading site-type-text-3xl site-responsive-md-type-text-4xl site-type-font-extrabold text-white mt-3 site-type-tracking-tight site-heading text-white">
                            প্রতিটি সার্ভিসের অন্তর্ভুক্ত ফিচার</h2>
                    </div>
                    <div class="d-grid site-layout-grid-cols-1 site-responsive-md-layout-grid-cols-2 gap-4">
                        @foreach ($serviceFeatures as $feature)
                            <article
                                class="d-flex gap-3 rounded-4 site-surface-bg-arbitrary-hex-111722 border border-white border-opacity-10 p-4 bg-white site-soft-border">
                                <div
                                    class="site-dimension-w-12 site-dimension-h-12 rounded-4 bg-primary bg-opacity-10 border site-border-border-primary-fixed-opacity-30 d-flex align-items-center justify-content-center text-primary flex-shrink-0 site-accent-component text-dark">
                                    <span class="material-symbols-outlined fs-4">check_circle</span>
                                </div>
                                <div>
                                    <span
                                        class="site-type-text-xs text-primary text-dark small fw-medium">{{ $feature['service_title'] }}</span>
                                    <h3
                                        class="site-type-font-heading site-type-text-lg fw-bold text-white site-heading text-white">
                                        {{ $feature['title'] }}</h3>
                                    <p
                                        class="site-color-text-slate-300 site-type-text-sm site-type-leading-relaxed site-spacing-mt-1-5 site-copy text-secondary fs-6 fw-medium">
                                        {{ $feature['text'] }}</p>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section> @endif @if ($serviceSteps->isNotEmpty())
                <section
                    class="w-100 site-surface-bg-arbitrary-hex-0b0f14-opacity-70 border-top border-bottom border-white border-opacity-10 position-relative site-spacing-py-16 site-responsive-md-spacing-py-24 bg-white site-soft-border site-section site-section--dark">
                    <div
                        class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                        <div class="site-dimension-max-w-3xl text-center mx-auto mb-5 site-responsive-md-spacing-mb-14">
                            <span
                                class="d-inline-block site-type-text-xs site-type-font-mono text-uppercase site-type-tracking-widest text-primary bg-primary bg-opacity-10 border site-border-border-primary-fixed-opacity-30 site-spacing-px-3-5 py-1 rounded-pill site-accent-component text-dark small fw-medium">কাজের
                                ধাপ</span>
                            <h2
                                class="site-type-font-heading site-type-text-3xl site-responsive-md-type-text-4xl site-type-font-extrabold text-white mt-3 site-type-tracking-tight site-heading text-white">
                                সার্ভিসভিত্তিক কাজের ধাপ</h2>
                        </div>
                        <ol
                            class="d-grid site-layout-grid-cols-1 site-responsive-sm-layout-grid-cols-2 site-responsive-lg-layout-grid-cols-4 gap-4">
                            @foreach ($serviceSteps as $step)
                                <li
                                    class="position-relative rounded-4 site-surface-bg-arbitrary-hex-111722 border border-white border-opacity-10 p-4 site-body-text bg-white site-soft-border">
                                    <span
                                        class="position-absolute site-position-top-5 site-position-right-6 site-type-font-mono site-type-text-4xl fw-bold site-color-text-white-opacity-5">{{ sprintf('%02d', $loop->iteration) }}</span>
                                    <span
                                        class="site-type-text-xs text-primary text-dark small fw-medium">{{ $step['service_title'] }}</span>
                                    @if ($step['title'])
                                        <h3
                                            class="site-type-font-heading site-type-text-lg fw-bold text-white site-spacing-mt-3 site-heading text-white">
                                            {{ $step['title'] }}</h3>
                                        @endif @if ($step['text'])
                                            <p
                                                class="site-color-text-slate-300 site-type-text-sm site-type-leading-relaxed mt-2 site-copy text-secondary fs-6 fw-medium">
                                                {{ $step['text'] }}</p>
                                        @endif
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </section>
            @endif
            <section class="w-100 position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--light"
                id="quote">
                <div
                    class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                    <div
                        class="d-grid site-layout-grid-cols-1 site-responsive-lg-layout-grid-cols-2 site-spacing-gap-10 site-responsive-lg-spacing-gap-16 align-items-center">
                        <div>
                            <span
                                class="d-inline-block site-type-text-xs site-type-font-mono text-uppercase site-type-tracking-widest text-primary bg-primary bg-opacity-10 border site-border-border-primary-fixed-opacity-30 site-spacing-px-3-5 py-1 rounded-pill site-accent-component text-dark small fw-medium">কোটেশন</span>
                            <h2
                                class="site-type-font-heading site-type-text-3xl site-responsive-md-type-text-4xl site-type-font-extrabold text-white mt-3 site-type-tracking-tight site-heading text-white">
                                ফ্রি কোটেশনের জন্য আবেদন করুন</h2>
                            <p
                                class="site-color-text-slate-300 fs-6 site-responsive-md-type-text-lg mt-3 site-type-leading-relaxed site-copy text-secondary">
                                ফর্মটি পূরণ করুন। আপনার প্রজেক্টের ধরন অনুযায়ী পরামর্শ ও আনুমানিক মূল্য জানাতে আমরা যোগাযোগ
                                করব।</p>
                            <ul class="site-spacing-mt-8 site-spacing-space-y-4 site-color-text-slate-200 text-secondary">
                                <li class="d-flex align-items-center site-spacing-gap-3 site-body-text"><span
                                        class="material-symbols-outlined text-primary text-dark">check_circle</span>কোনো
                                    বাধ্যবাধকতা নেই</li>
                                <li class="d-flex align-items-center site-spacing-gap-3 site-body-text"><span
                                        class="material-symbols-outlined text-primary text-dark">check_circle</span>কর্মদিবসে
                                    দ্রুত সাড়া</li>
                                <li class="d-flex align-items-center site-spacing-gap-3 site-body-text"><span
                                        class="material-symbols-outlined text-primary text-dark">check_circle</span>বিকাশ,
                                    নগদ ও ব্যাংক পেমেন্ট</li>
                            </ul>
                        </div>
                        <form
                            class="site-shape-rounded-3xl site-surface-bg-arbitrary-hex-111722 border border-white border-opacity-10 p-4 site-responsive-md-spacing-p-8 d-grid site-layout-grid-cols-1 site-responsive-sm-layout-grid-cols-2 gap-3 bg-white site-soft-border"
                            action="{{ route('contact.store') }}" method="POST"> @csrf
                            <input
                                class="w-100 site-dimension-h-12 rounded-4 site-surface-bg-arbitrary-hex-0b0f14 border site-border-border-white-opacity-15 px-3 text-white site-state-placeholder-color-text-slate-500 site-state-focus-border-border-primary-fixed site-state-focus-border-ring-0 site-style-outline-none site-motion-transition-colors bg-white site-soft-border text-white"
                                name="name" value="{{ old('name') }}" placeholder="আপনার নাম" required
                                type="text" />
                            <input
                                class="w-100 site-dimension-h-12 rounded-4 site-surface-bg-arbitrary-hex-0b0f14 border site-border-border-white-opacity-15 px-3 text-white site-state-placeholder-color-text-slate-500 site-state-focus-border-border-primary-fixed site-state-focus-border-ring-0 site-style-outline-none site-motion-transition-colors bg-white site-soft-border text-white"
                                name="phone" value="{{ old('phone') }}" placeholder="ফোন নম্বর" required
                                type="tel" />
                            <input
                                class="w-100 site-dimension-h-12 rounded-4 site-surface-bg-arbitrary-hex-0b0f14 border site-border-border-white-opacity-15 px-3 text-white site-state-placeholder-color-text-slate-500 site-state-focus-border-border-primary-fixed site-state-focus-border-ring-0 site-style-outline-none site-motion-transition-colors site-responsive-sm-layout-col-span-2 bg-white site-soft-border text-white"
                                name="email" value="{{ old('email') }}" placeholder="ইমেইল (ঐচ্ছিক)" type="email" />
                            <select
                                class="w-100 site-dimension-h-12 rounded-4 site-surface-bg-arbitrary-hex-0b0f14 border site-border-border-white-opacity-15 px-3 text-white site-state-focus-border-border-primary-fixed site-state-focus-border-ring-0 site-style-outline-none site-motion-transition-colors site-responsive-sm-layout-col-span-2 bg-white site-soft-border text-white"
                                name="service_type" required>
                                <option value="">সার্ভিস নির্বাচন করুন</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->title }}" @selected(old('service_type') === $service->title)>
                                        {{ $service->title }}</option>
                                @endforeach
                            </select>
                            <textarea
                                class="w-100 rounded-4 site-surface-bg-arbitrary-hex-0b0f14 border site-border-border-white-opacity-15 px-3 site-spacing-py-3 text-white site-state-placeholder-color-text-slate-500 site-state-focus-border-border-primary-fixed site-state-focus-border-ring-0 site-style-outline-none site-motion-transition-colors site-responsive-sm-layout-col-span-2 site-dimension-h-28 site-style-resize-none bg-white site-soft-border text-white"
                                name="message" placeholder="আপনার প্রজেক্ট সম্পর্কে সংক্ষেপে লিখুন">{{ old('message') }}</textarea>
                            @if ($errors->any())
                                <p
                                    class="site-responsive-sm-layout-col-span-2 site-type-text-xs text-danger site-copy text-danger small fw-medium">
                                    অনুগ্রহ করে প্রয়োজনীয় তথ্যগুলো সঠিকভাবে পূরণ করুন।</p>
                            @endif
                            <button
                                class="w-100 d-inline-flex align-items-center justify-content-center gap-2 site-dimension-h-12 site-spacing-px-7 rounded-pill bg-primary site-color-text-arbitrary-hex-070a0e site-type-font-heading fw-bold site-state-hover-surface-bg-primary-fixed-dim site-motion-transition-all site-elevation-shadow-arbitrary-0-0-30px-rgba-197-243-49-0-25 site-responsive-sm-layout-col-span-2"
                                type="submit">কোটেশন চাই<span class="material-symbols-outlined fs-5">send</span></button>
                        </form>
                    </div>
                </div>
            </section>
            @if ($serviceFaqs->isNotEmpty())
                <section
                    class="w-100 site-surface-bg-arbitrary-hex-0b0f14-opacity-70 border-top border-bottom border-white border-opacity-10 position-relative site-spacing-py-16 site-responsive-md-spacing-py-24 bg-white site-soft-border site-section site-section--dark">
                    <div
                        class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                        <div class="site-dimension-max-w-3xl text-center mx-auto mb-5 site-responsive-md-spacing-mb-14">
                            <span
                                class="d-inline-block site-type-text-xs site-type-font-mono text-uppercase site-type-tracking-widest text-primary bg-primary bg-opacity-10 border site-border-border-primary-fixed-opacity-30 site-spacing-px-3-5 py-1 rounded-pill site-accent-component text-dark small fw-medium">সচরাচর
                                জিজ্ঞাসা</span>
                            <h2
                                class="site-type-font-heading site-type-text-3xl site-responsive-md-type-text-4xl site-type-font-extrabold text-white mt-3 site-type-tracking-tight site-heading text-white">
                                সার্ভিস সম্পর্কে প্রশ্ন</h2>
                        </div>
                        <div class="site-dimension-max-w-3xl mx-auto d-flex flex-column site-spacing-gap-3">
                            @foreach ($serviceFaqs as $faq)
                                <details
                                    class="site-style-group rounded-4 site-surface-bg-arbitrary-hex-111722 border border-white border-opacity-10 site-state-open-border-border-primary-fixed-opacity-40 site-motion-transition-colors bg-white site-soft-border">
                                    <summary
                                        class="d-flex align-items-center justify-content-between gap-3 site-effect-cursor-pointer list-unstyled site-spacing-p-5 p-md-4 site-type-font-heading fw-semibold text-white text-white">
                                        {{ $faq['question'] }}<span
                                            class="material-symbols-outlined text-primary site-motion-transition-transform site-state-group-open-motion-rotate-180 flex-shrink-0 text-dark">expand_more</span>
                                    </summary>
                                    <p
                                        class="site-spacing-px-5 px-md-4 pb-2 site-style-mt-1 site-type-text-xs text-primary site-copy text-dark small fw-medium">
                                        {{ $faq['service_title'] }}</p>
                                    <p
                                        class="site-spacing-px-5 px-md-4 site-spacing-pb-5 pb-md-4 site-color-text-slate-300 site-type-leading-relaxed site-copy text-secondary">
                                        {{ $faq['answer'] }}</p>
                                </details>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif
            <section
                class="w-100 position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--light">
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
                                ফ্রি কনসাল্টেশনে আপনার প্রয়োজন জানান। আমরা সঠিক সমাধান ও পরিষ্কার মূল্য জানিয়ে দেব।</p>
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
