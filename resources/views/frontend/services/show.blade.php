@extends('frontend.layouts.app')

@section('title', $service->meta_title ?: $service->title.' | WhexSoft')
@section('description', $service->meta_description ?: ($service->short_description ?: 'WhexSoft-এর '.$service->title.' সার্ভিস সম্পর্কে বিস্তারিত জানুন।'))
@section('page', 'services')
@section('og_image', $service->getFirstMediaUrl('service-image') ?: asset('assets/frontend/images/project-ecommerce.jpg'))

@section('content')
@php
    $serviceImages = [
        'ecommerce-website' => asset('assets/frontend/images/project-ecommerce.jpg'),
        'landing-page' => asset('assets/frontend/images/project-landing.jpg'),
        'corporate-portfolio-website' => asset('assets/frontend/images/project-corporate.jpg'),
        'dynamic-website' => asset('assets/frontend/images/project-webapp.jpg'),
        'ui-ux-design' => asset('assets/frontend/images/project-uiux.jpg'),
        'website-maintenance' => asset('assets/frontend/images/project-maintenance.jpg'),
    ];
    $servicePoints = [
        'ecommerce-website' => ['বিকাশ/নগদ পেমেন্ট', 'কুরিয়ার ইন্টিগ্রেশন', 'অ্যাডমিন ড্যাশবোর্ড'],
        'landing-page' => ['ফাস্ট লোডিং', 'অর্ডার ফর্ম', 'পিক্সেল ট্র্যাকিং'],
        'corporate-portfolio-website' => ['ব্র্যান্ড-কনসিস্টেন্ট', 'সিএমএস সহ', 'এসইও অপ্টিমাইজড'],
        'dynamic-website' => ['কাস্টম লজিক', 'রোল-বেসড অ্যাক্সেস', 'এপিআই ইন্টিগ্রেশন'],
        'ui-ux-design' => ['ইউজার রিসার্চ', 'প্রোটোটাইপ', 'ডিজাইন সিস্টেম'],
        'website-maintenance' => ['নিয়মিত ব্যাকআপ', 'সিকিউরিটি স্ক্যান', 'দ্রুত সাপোর্ট'],
    ];
    $heroImage = $service->getFirstMediaUrl('service-image') ?: ($serviceImages[$service->slug] ?? asset('assets/frontend/images/brand-graphic.jpg'));
    $features = collect($service->features ?? [])->filter(fn ($item) => filled($item['title'] ?? null) || filled($item['text'] ?? null));
    if ($features->isEmpty()) {
        $features = collect($servicePoints[$service->slug] ?? ['কাস্টম ডিজাইন', 'মডার্ন টেকনোলজি', 'লাইভ সাপোর্ট'])
            ->map(fn ($title) => ['title' => $title, 'text' => 'আপনার ব্যবসার প্রয়োজন অনুযায়ী অভিজ্ঞ টিমের মাধ্যমে বাস্তবায়ন।']);
    }
    $steps = collect($service->steps ?? [])->filter(fn ($item) => filled($item['title'] ?? null) || filled($item['text'] ?? null));
    if ($steps->isEmpty()) {
        $steps = collect([
            ['title' => 'আলোচনা ও পরিকল্পনা', 'text' => 'আপনার লক্ষ্য, বাজেট ও প্রয়োজন বুঝে স্কোপ ঠিক করা হয়।'],
            ['title' => 'ডিজাইন', 'text' => 'ব্র্যান্ড অনুযায়ী ডিজাইন তৈরি ও আপনার অনুমোদন।'],
            ['title' => 'ডেভেলপমেন্ট ও টেস্টিং', 'text' => 'কোড, ইন্টিগ্রেশন ও সব ডিভাইসে টেস্ট।'],
            ['title' => 'লাইভ ও সাপোর্ট', 'text' => 'লাইভ করার পর প্রশিক্ষণ ও সাপোর্ট।'],
        ]);
    }
    $faqs = collect($service->faqs ?? [])->filter(fn ($item) => filled($item['question'] ?? null));
    if ($faqs->isEmpty()) {
        $faqs = collect([
            ['question' => 'এই সার্ভিসে কী কী অন্তর্ভুক্ত?', 'answer' => 'প্রজেক্টের স্কোপ অনুযায়ী ডিজাইন, ডেভেলপমেন্ট, টেস্টিং ও লাইভ-পরবর্তী সাপোর্ট অন্তর্ভুক্ত থাকে।'],
            ['question' => 'ডেলিভারি সময় কত?', 'answer' => 'কাজের পরিধি, প্রয়োজনীয় কনটেন্ট ও ফিচার অনুযায়ী সময়সূচি ঠিক করা হয়।'],
            ['question' => 'পেমেন্ট কীভাবে করব?', 'answer' => 'বিকাশ, নগদ, রকেট বা ব্যাংক ট্রান্সফারে। পেমেন্ট শিডিউল চুক্তিতে লেখা থাকে।'],
        ]);
    }
    $projectImages = [
        asset('assets/frontend/images/project-ecommerce.jpg'),
        asset('assets/frontend/images/project-landing.jpg'),
        asset('assets/frontend/images/project-corporate.jpg'),
        asset('assets/frontend/images/project-webapp.jpg'),
        asset('assets/frontend/images/project-uiux.jpg'),
        asset('assets/frontend/images/project-maintenance.jpg'),
    ];
@endphp

<main class="w-full relative overflow-x-clip">
    <section class="w-full relative overflow-hidden pt-32 md:pt-40 pb-12 md:pb-16">
        <div class="absolute -top-32 right-0 w-[600px] h-[400px] bg-primary-fixed/10 blur-[120px] rounded-full pointer-events-none"></div>
        <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">
                <div>
                    <nav aria-label="Breadcrumb" class="flex flex-wrap items-center gap-2 text-sm text-slate-400 mb-6">
                        <a class="hover:text-white" href="{{ route('home') }}">হোম</a>
                        <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                        <a class="hover:text-white" href="{{ route('services.index') }}">সার্ভিসসমূহ</a>
                        <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                        <span class="text-primary-fixed">{{ $service->title }}</span>
                    </nav>
                    <span class="inline-block text-xs font-mono uppercase tracking-widest text-primary-fixed bg-primary-fixed/10 border border-primary-fixed/30 px-3.5 py-1 rounded-full">{{ $service->serviceCategory?->name ?: 'ডিজিটাল সার্ভিস' }}</span>
                    <h1 class="font-heading text-4xl md:text-6xl font-extrabold text-white tracking-tight leading-tight mt-5">{{ $service->title }}</h1>
                    <p class="text-slate-300 text-base md:text-xl mt-6 leading-relaxed">{{ $service->short_description ?: 'আপনার ব্যবসার লক্ষ্য অনুযায়ী কাস্টম ডিজাইন, ডেভেলপমেন্ট ও লাইভ-পরবর্তী সাপোর্ট।' }}</p>
                    <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 mt-8">
                        <a class="inline-flex items-center justify-center gap-2 h-12 px-7 rounded-full bg-primary-fixed text-[#070A0E] font-heading font-bold hover:bg-primary-fixed-dim transition-all shadow-[0_0_30px_rgba(197,243,49,0.25)]" href="{{ route('contact') }}">ফ্রি কোটেশন নিন<span class="material-symbols-outlined text-[20px]">arrow_forward</span></a>
                        <a class="inline-flex items-center justify-center gap-2 h-12 px-7 rounded-full bg-white/5 border border-white/20 text-white font-heading font-semibold hover:bg-white/10 transition-all" href="tel:01335198859"><span class="material-symbols-outlined text-[20px] text-primary-fixed">call</span>০১৩৩৫-১৯৮৮৫৯</a>
                    </div>
                </div>
                <div class="relative">
                    <div class="relative rounded-3xl overflow-hidden border border-white/10 bg-[#111722] shadow-2xl aspect-[4/3]">
                        <img alt="{{ $service->title }}" class="w-full h-full object-cover" src="{{ $heroImage }}" />
                        <div class="absolute inset-0 bg-gradient-to-t from-[#070A0E]/70 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4 flex flex-wrap gap-2">
                            @foreach ($features->take(3) as $feature)
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-[#070A0E]/85 backdrop-blur-md border border-primary-fixed/30 text-primary-fixed text-xs font-medium">
                                    <span class="material-symbols-outlined text-[15px]">check_circle</span>{{ $feature['title'] ?? 'কাস্টম সলিউশন' }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative mt-14 rounded-2xl bg-[#131920]/90 border border-white/10 p-6 md:p-8 shadow-2xl">
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ([
                        ['devices', 'সব স্ক্রিনে', 'ব্যবহার উপযোগী ডিজাইন'],
                        ['bolt', 'প্রয়োজনমতো', 'ফিচার ও ইন্টিগ্রেশন'],
                        ['troubleshoot', 'সার্চ-উপযোগী', 'পরিষ্কার পেজ কাঠামো'],
                        ['support_agent', 'লঞ্চের পরেও', 'সম্মত সাপোর্ট'],
                    ] as [$icon, $value, $label])
                        <div class="flex items-center gap-3.5">
                            <div class="w-12 h-12 rounded-xl bg-primary-fixed/10 border border-primary-fixed/30 flex items-center justify-center text-primary-fixed shrink-0">
                                <span class="material-symbols-outlined text-[24px]">{{ $icon }}</span>
                            </div>
                            <div>
                                <div class="font-heading text-lg font-bold text-white">{{ $value }}</div>
                                <div class="text-xs text-slate-300 font-medium">{{ $label }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @if ($service->intro || $service->content)
        <section class="w-full bg-[#0B0F14]/70 border-y border-white/10 relative py-16 md:py-24">
            <div class="max-w-4xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
                <span class="inline-block text-xs font-mono uppercase tracking-widest text-primary-fixed bg-primary-fixed/10 border border-primary-fixed/30 px-3.5 py-1 rounded-full">সার্ভিস পরিচিতি</span>
                @if ($service->intro)
                    <div class="mt-6 text-lg text-slate-200 leading-relaxed">{!! nl2br(e($service->intro)) !!}</div>
                @endif
                @if ($service->content)
                    <div class="mt-6 text-slate-300 leading-relaxed space-y-4">{!! $service->content !!}</div>
                @endif
            </div>
        </section>
    @endif

    <section class="w-full relative py-16 md:py-24">
        <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <div class="max-w-3xl text-center mx-auto mb-12 md:mb-14">
                <span class="inline-block text-xs font-mono uppercase tracking-widest text-primary-fixed bg-primary-fixed/10 border border-primary-fixed/30 px-3.5 py-1 rounded-full">যা যা পাচ্ছেন</span>
                <h2 class="font-heading text-3xl md:text-4xl font-extrabold text-white mt-4 tracking-tight">এই সার্ভিসের মূল ফিচারসমূহ</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($features as $feature)
                    <div class="rounded-2xl bg-[#111722] border border-white/10 p-6 hover:border-primary-fixed/40 transition-all">
                        <div class="w-11 h-11 rounded-xl bg-primary-fixed/10 border border-primary-fixed/30 flex items-center justify-center text-primary-fixed mb-4">
                            <span class="material-symbols-outlined text-[22px]">check_circle</span>
                        </div>
                        <h3 class="font-heading text-lg font-bold text-white">{{ $feature['title'] ?? 'কাস্টম ফিচার' }}</h3>
                        @if (! empty($feature['text']))
                            <p class="text-slate-300 text-sm leading-relaxed mt-2">{{ $feature['text'] }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="w-full bg-[#0B0F14]/70 border-y border-white/10 relative py-16 md:py-24">
        <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <div class="max-w-3xl text-center mx-auto mb-12 md:mb-14">
                <span class="inline-block text-xs font-mono uppercase tracking-widest text-primary-fixed bg-primary-fixed/10 border border-primary-fixed/30 px-3.5 py-1 rounded-full">কাজের ধাপ</span>
                <h2 class="font-heading text-3xl md:text-4xl font-extrabold text-white mt-4 tracking-tight">কীভাবে কাজটি সম্পন্ন হয়</h2>
            </div>
            <ol class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($steps as $step)
                    <li class="relative rounded-2xl bg-[#111722] border border-white/10 p-6">
                        <span class="absolute top-5 right-6 font-mono text-4xl font-bold text-white/5">{{ sprintf('%02d', $loop->iteration) }}</span>
                        <div class="w-12 h-12 rounded-xl bg-primary-fixed/10 border border-primary-fixed/30 flex items-center justify-center text-primary-fixed shrink-0">
                            <span class="material-symbols-outlined text-[24px]">{{ ['forum', 'draw', 'code', 'rocket_launch'][$loop->index % 4] }}</span>
                        </div>
                        <h3 class="font-heading text-lg font-bold text-white mt-5">{{ $step['title'] ?? 'ধাপ '.$loop->iteration }}</h3>
                        @if (! empty($step['text']))
                            <p class="text-slate-300 text-sm leading-relaxed mt-2">{{ $step['text'] }}</p>
                        @endif
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    @if ($service->packages->isNotEmpty())
        <section class="w-full relative py-16 md:py-24">
            <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
                <div class="max-w-3xl text-center mx-auto mb-12 md:mb-14">
                    <span class="inline-block text-xs font-mono uppercase tracking-widest text-primary-fixed bg-primary-fixed/10 border border-primary-fixed/30 px-3.5 py-1 rounded-full">প্যাকেজ ও মূল্য</span>
                    <h2 class="font-heading text-3xl md:text-4xl font-extrabold text-white mt-4 tracking-tight">এই সার্ভিসের প্যাকেজসমূহ</h2>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch">
                    @foreach ($service->packages as $package)
                        <div class="relative rounded-2xl p-7 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1.5 {{ $package->is_popular ? 'bg-gradient-to-b from-[#111e15] to-[#0c1510] border-2 border-[#c5f331] shadow-[0_0_36px_rgba(197,243,49,0.25)]' : 'bg-[#0d131a] border border-white/10 hover:border-[#c5f331]/40 shadow-xl' }}">
                            @if ($package->is_popular)
                                <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 px-4 py-1 bg-[#c5f331] text-[#070A0E] text-xs font-mono font-extrabold rounded-full uppercase tracking-wider shadow-[0_0_16px_rgba(197,243,49,0.6)] whitespace-nowrap">সর্বাধিক জনপ্রিয়</div>
                            @endif
                            <div>
                                <div class="flex items-center justify-between mb-4 pt-1">
                                    <span class="text-xs font-mono uppercase tracking-wider {{ $package->is_popular ? 'text-[#c5f331] bg-[#c5f331]/15 border border-[#c5f331]/40' : 'text-slate-300 bg-white/5 border border-white/10' }} px-3 py-1 rounded-md font-bold">{{ $package->name }}</span>
                                    <span class="material-symbols-outlined {{ $package->is_popular ? 'text-[#c5f331]' : 'text-slate-400' }}">rocket_launch</span>
                                </div>
                                <h3 class="font-heading text-2xl font-bold text-white">{{ $package->name }}</h3>
                                @if ($package->tagline)
                                    <p class="text-sm text-[#c5f331] mt-1 font-medium">{{ $package->tagline }}</p>
                                @endif
                                <div class="my-6 p-5 rounded-xl {{ $package->is_popular ? 'bg-[#070e0a] border border-[#c5f331]/30' : 'bg-[#070b10] border border-white/5' }}">
                                    <span class="text-xs uppercase tracking-wider text-slate-400 block font-semibold">শুরু মাত্র</span>
                                    <div class="flex items-baseline gap-1 mt-1">
                                        <span class="text-3xl font-extrabold {{ $package->is_popular ? 'text-[#c5f331]' : 'text-white' }}">{{ $package->price_label ?: 'যোগাযোগ করুন' }}</span>
                                    </div>
                                </div>
                                @if (! empty($package->features))
                                    <ul class="flex flex-col gap-3 my-6 text-sm {{ $package->is_popular ? 'text-slate-100' : 'text-slate-200' }}">
                                        @foreach ($package->features as $feature)
                                            <li class="flex items-start gap-2.5 {{ ! ($feature['included'] ?? true) ? 'opacity-50' : '' }}">
                                                <span class="material-symbols-outlined text-[18px] {{ ($feature['included'] ?? true) ? 'text-[#c5f331]' : 'text-slate-500' }} shrink-0 mt-0.5">{{ ($feature['included'] ?? true) ? 'check_circle' : 'cancel' }}</span>
                                                <span>{{ $feature['text'] ?? '' }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="pt-4">
                                <a class="w-full inline-flex items-center justify-center gap-2 py-3 px-5 rounded-xl {{ $package->is_popular ? 'bg-[#c5f331] hover:bg-[#b0dc2b] text-[#070A0E] font-bold shadow-[0_0_24px_rgba(197,243,49,0.35)]' : 'bg-white/10 hover:bg-white/20 text-white font-semibold border border-white/10' }} text-sm transition-all" href="{{ route('contact') }}?service={{ urlencode($service->title) }}&package={{ urlencode($package->name) }}">
                                    <span>এই প্যাকেজটি বেছে নিন</span>
                                    <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if ($service->projects->isNotEmpty())
        <section class="w-full bg-[#0B0F14]/80 border-y border-white/10 relative py-16 md:py-24">
            <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
                    <div>
                        <span class="inline-block text-xs font-mono uppercase tracking-widest text-primary-fixed bg-primary-fixed/10 border border-primary-fixed/30 px-3.5 py-1 rounded-full">সংশ্লিষ্ট কাজ</span>
                        <h2 class="font-heading text-3xl md:text-4xl font-extrabold text-white mt-4 tracking-tight">এই সার্ভিসের প্রজেক্টসমূহ</h2>
                    </div>
                    <a class="inline-flex items-center gap-1.5 text-primary-fixed hover:text-white text-sm font-semibold transition-colors" href="{{ route('portfolio.index') }}">সকল প্রজেক্ট দেখুন<span class="material-symbols-outlined text-[16px]">north_east</span></a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($service->projects->take(3) as $project)
                        @php
                            $image = $project->getFirstMediaUrl('project-image') ?: $projectImages[$loop->index % count($projectImages)];
                        @endphp
                        <article class="rounded-2xl bg-[#111722] border border-white/10 hover:border-primary-fixed/40 overflow-hidden shadow-xl hover:-translate-y-1.5 transition-all group flex flex-col">
                            <div class="relative aspect-[16/10] overflow-hidden bg-[#070A0E]">
                                <img alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ $image }}" />
                            </div>
                            <div class="p-5 flex-1 flex flex-col justify-between">
                                <div>
                                    <h3 class="font-heading text-base font-bold text-white mb-1 group-hover:text-primary-fixed transition-colors">
                                        <a href="{{ route('portfolio.show', $project) }}">{{ $project->title }}</a>
                                    </h3>
                                    <p class="text-xs text-slate-300">{{ $project->summary }}</p>
                                </div>
                                <a class="mt-4 text-xs text-primary-fixed font-semibold flex items-center gap-1 hover:underline" href="{{ route('portfolio.show', $project) }}">প্রজেক্ট দেখুন<span class="material-symbols-outlined text-[14px]">north_east</span></a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="w-full relative py-16 md:py-24">
        <div class="max-w-4xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <div class="max-w-3xl text-center mx-auto mb-12">
                <span class="inline-block text-xs font-mono uppercase tracking-widest text-primary-fixed bg-primary-fixed/10 border border-primary-fixed/30 px-3.5 py-1 rounded-full">সচরাচর জিজ্ঞাসা</span>
                <h2 class="font-heading text-3xl md:text-4xl font-extrabold text-white mt-4 tracking-tight">আপনার প্রশ্নের উত্তর</h2>
            </div>
            <div class="flex flex-col gap-3">
                @foreach ($faqs as $faq)
                    <details class="group rounded-2xl bg-[#111722] border border-white/10 open:border-primary-fixed/40 transition-colors">
                        <summary class="flex items-center justify-between gap-4 cursor-pointer list-none p-5 md:p-6 font-heading font-semibold text-white">{{ $faq['question'] }}<span class="material-symbols-outlined text-primary-fixed transition-transform group-open:rotate-180 shrink-0">expand_more</span></summary>
                        <p class="px-5 md:px-6 pb-5 md:pb-6 -mt-1 text-slate-300 leading-relaxed">{{ $faq['answer'] ?? '' }}</p>
                    </details>
                @endforeach
            </div>
        </div>
    </section>

    @if ($otherServices->isNotEmpty())
        <section class="w-full bg-[#0B0F14]/70 border-y border-white/10 relative py-16 md:py-24">
            <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
                <div class="max-w-3xl text-center mx-auto mb-12">
                    <span class="inline-block text-xs font-mono uppercase tracking-widest text-primary-fixed bg-primary-fixed/10 border border-primary-fixed/30 px-3.5 py-1 rounded-full">আরও সার্ভিস</span>
                    <h2 class="font-heading text-3xl md:text-4xl font-extrabold text-white mt-4 tracking-tight">অন্যান্য সার্ভিসসমূহ</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($otherServices as $other)
                        @php
                            $image = $other->getFirstMediaUrl('service-image') ?: ($serviceImages[$other->slug] ?? asset('assets/frontend/images/brand-graphic.jpg'));
                        @endphp
                        <a class="group rounded-2xl bg-[#111722] border border-white/10 hover:border-primary-fixed/40 overflow-hidden shadow-xl hover:-translate-y-1 transition-all flex flex-col" href="{{ route('services.show', $other) }}">
                            <div class="relative aspect-[16/10] overflow-hidden bg-[#070A0E]">
                                <img alt="{{ $other->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ $image }}" />
                            </div>
                            <div class="p-5">
                                <h3 class="font-heading text-lg font-bold text-white group-hover:text-primary-fixed transition-colors">{{ $other->title }}</h3>
                                <p class="text-xs text-slate-300 mt-2">{{ \Illuminate\Support\Str::limit($other->short_description ?: 'কাস্টম ডিজাইন ও ডেভেলপমেন্ট সলিউশন।', 110) }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="w-full relative py-12 md:py-16">
        <div class="max-w-5xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <div class="relative overflow-hidden rounded-3xl border border-primary-fixed/30 bg-gradient-to-br from-[#122218] via-[#0d1612] to-[#0B0F14] p-8 md:p-14 text-center">
                <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-[500px] h-[250px] bg-primary-fixed/15 blur-[100px] rounded-full pointer-events-none"></div>
                <div class="relative">
                    <h2 class="font-heading text-3xl md:text-4xl font-extrabold text-white tracking-tight">{{ $service->title }} নিয়ে কথা বলতে চান?</h2>
                    <p class="text-slate-300 text-base md:text-lg mt-4 max-w-2xl mx-auto leading-relaxed">আপনার প্রয়োজন ও বাজেট নিয়ে কথা বলুন। কাজের পরিধি বুঝে আমরা প্রস্তাব ও খরচ জানাব।</p>
                    <div class="flex flex-wrap justify-center gap-4 mt-8">
                        <a class="w-full sm:w-auto inline-flex items-center justify-center gap-2 h-12 px-7 rounded-full bg-primary-fixed text-[#070A0E] font-heading font-bold hover:bg-primary-fixed-dim transition-all shadow-[0_0_30px_rgba(197,243,49,0.25)]" href="{{ route('contact') }}">ফ্রি কনসাল্টেশন নিন<span class="material-symbols-outlined text-[20px]">arrow_forward</span></a>
                        <a class="w-full sm:w-auto inline-flex items-center justify-center gap-2 h-12 px-7 rounded-full bg-white/5 border border-white/20 text-white font-heading font-semibold hover:bg-white/10 transition-all" href="tel:01335198859"><span class="material-symbols-outlined text-[20px] text-primary-fixed">call</span>০১৩৩৫-১৯৮৮৫৯</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
