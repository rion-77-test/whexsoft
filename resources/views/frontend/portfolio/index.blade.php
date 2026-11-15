@extends('frontend.layouts.app')

@section('title', 'আমাদের কাজ | WhexSoft')
@section('description', 'WhexSoft-এর নির্বাচিত ওয়েবসাইট ও ডিজিটাল প্রজেক্ট দেখুন। প্রতিটি কাজের বিস্তারিত জানতে প্রজেক্টের পাতায় যান।')
@section('page', 'portfolio')

@section('content')
@php
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
    <section class="relative w-full overflow-hidden pt-32 md:pt-40 pb-12 md:pb-16">
        <div class="max-w-7xl mx-auto relative z-10 flex flex-col items-center text-center w-full px-5 sm:px-8 lg:px-10">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#111722] border border-primary-fixed/30 backdrop-blur-md shadow-[0_0_20px_rgba(197,243,49,0.12)] mb-4">
                <span class="text-[15px]">💎</span>
                <span class="font-mono text-xs text-primary-fixed uppercase tracking-wider font-semibold">নির্বাচিত কাজ</span>
            </div>
            <h1 class="font-display text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight leading-tight max-w-3xl">আমাদের <span class="text-primary-fixed">প্রজেক্টসমূহ</span></h1>
            <p class="text-slate-300 text-sm sm:text-base mt-3 max-w-2xl leading-relaxed">ই-কমার্স, ব্যবসায়িক ওয়েবসাইট, ল্যান্ডিং পেজসহ বিভিন্ন ধরনের কাজ এখানে দেখুন। প্রতিটি প্রজেক্টের বিবরণে লক্ষ্য, ফিচার ও সংশ্লিষ্ট সার্ভিস সম্পর্কে জানুন।</p>
            <div class="mt-8 inline-grid grid-cols-1 sm:grid-cols-3 gap-3 bg-[#111722]/90 border border-white/10 rounded-2xl p-4 sm:p-5 max-w-3xl w-full">
                <div class="flex flex-col items-center px-2 sm:px-4">
                    <span class="font-display text-lg sm:text-xl font-bold text-white">পরিকল্পনা</span>
                    <span class="text-xs sm:text-sm text-slate-300 mt-0.5">প্রজেক্টের লক্ষ্য বুঝে</span>
                </div>
                <div class="flex flex-col items-center px-2 sm:px-4">
                    <span class="font-display text-lg sm:text-xl font-bold text-primary-fixed">ডিজাইন</span>
                    <span class="text-xs sm:text-sm text-slate-300 mt-0.5">ব্যবসার ধরন অনুযায়ী</span>
                </div>
                <div class="flex flex-col items-center px-2 sm:px-4">
                    <span class="font-display text-lg sm:text-xl font-bold text-white">ডেভেলপমেন্ট</span>
                    <span class="text-xs sm:text-sm text-slate-300 mt-0.5">প্রয়োজনীয় ফিচারসহ</span>
                </div>
            </div>
            <div class="mt-10 flex flex-wrap items-center justify-center gap-2.5 sm:gap-3">
                <a class="px-5 py-2 rounded-full text-xs sm:text-sm font-semibold transition-all border {{ $activeCategory === '' ? 'border-primary-fixed bg-primary-fixed text-[#070A0E]' : 'bg-[#11171f] text-slate-300 hover:text-white border-white/10 hover:border-primary-fixed/40' }}" href="{{ route('portfolio.index') }}">সব প্রজেক্ট</a>
                @foreach ($categories as $category)
                    <a class="px-5 py-2 rounded-full text-xs sm:text-sm font-semibold transition-all border {{ $activeCategory === $category->slug ? 'border-primary-fixed bg-primary-fixed text-[#070A0E]' : 'bg-[#11171f] text-slate-300 hover:text-white border-white/10 hover:border-primary-fixed/40' }}" href="{{ route('portfolio.index', ['category' => $category->slug]) }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="w-full relative py-12 md:py-16">
        <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            @if ($projects->isEmpty())
                <div class="rounded-2xl bg-[#11171f]/80 border border-white/10 p-10 text-center text-slate-300">এই ক্যাটাগরিতে এখনো কোনো প্রজেক্ট যুক্ত করা হয়নি।</div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($projects as $project)
                        @php
                            $image = $project->getFirstMediaUrl('project-image') ?: $projectImages[$loop->index % count($projectImages)];
                        @endphp
                        <article class="group flex flex-col bg-[#11171f]/80 backdrop-blur-md rounded-2xl border border-white/10 p-5 hover:border-primary-fixed/40 transition-all duration-300 hover:-translate-y-1.5 shadow-xl hover:shadow-[0_12px_30px_rgba(197,243,49,0.15)]">
                            <a class="relative block w-full aspect-[16/10] rounded-xl overflow-hidden bg-[#0A0E13]" href="{{ route('portfolio.show', $project) }}">
                                <img alt="{{ $project->title }}" class="w-full h-full object-cover object-top transition-transform duration-500 group-hover:scale-105" src="{{ $image }}" />
                                <div class="absolute inset-0 bg-gradient-to-t from-[#070A0E]/80 via-transparent to-transparent"></div>
                                @if ($project->is_featured)
                                    <div class="absolute top-2.5 left-2.5">
                                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-[#070A0E]/80 backdrop-blur-md text-primary-fixed font-mono text-[11px] border border-primary-fixed/30">
                                            <span class="material-symbols-outlined text-[12px]">trending_up</span> ফিচার্ড প্রজেক্ট
                                        </span>
                                    </div>
                                @endif
                            </a>
                            <div class="flex flex-col flex-1 justify-between pt-4">
                                <div>
                                    <div class="flex flex-wrap gap-1.5 mb-2.5">
                                        @if ($project->projectCategory)
                                            <span class="text-[11px] px-2.5 py-0.5 rounded-md bg-primary-fixed/15 text-primary-fixed font-medium border border-primary-fixed/20">#{{ $project->projectCategory->name }}</span>
                                        @endif
                                    </div>
                                    <h3 class="font-display text-lg font-bold text-white group-hover:text-primary-fixed transition-colors">
                                        <a href="{{ route('portfolio.show', $project) }}">{{ $project->title }}</a>
                                    </h3>
                                    <p class="text-xs sm:text-sm text-slate-300 mt-1.5 line-clamp-2 leading-relaxed">{{ $project->summary }}</p>
                                </div>
                                <div class="pt-4 mt-4 border-t border-white/10 flex items-center justify-between gap-3">
                                    <a class="flex-1 inline-flex items-center justify-center gap-2 py-2 px-3 bg-primary-fixed text-[#070A0E] text-xs font-bold rounded-lg shadow-[0_0_12px_rgba(197,243,49,0.25)] hover:bg-primary-fixed-dim transition-all" href="{{ route('portfolio.show', $project) }}">
                                        <span>বিস্তারিত দেখুন</span>
                                        <span class="font-bold">↗</span>
                                    </a>
                                    @if ($project->live_url)
                                        <a class="inline-flex items-center justify-center w-9 h-9 rounded-lg border border-white/15 text-slate-200 hover:text-primary-fixed hover:border-primary-fixed/50 transition-colors" href="{{ $project->live_url }}" rel="noopener noreferrer" target="_blank" aria-label="লাইভ প্রিভিউ">
                                            <span class="material-symbols-outlined text-[18px]">open_in_new</span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                {{ $projects->links('frontend.partials.pagination') }}
            @endif
        </div>
    </section>

    <section class="w-full relative py-12 md:py-16">
        <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <div class="bg-[#111722] rounded-3xl p-6 sm:p-10 border border-primary-fixed/25 relative overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.6)]">
                <div class="absolute -right-20 -bottom-20 w-80 h-80 bg-primary-fixed/10 rounded-full blur-3xl pointer-events-none"></div>
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
                    <div class="lg:col-span-6">
                        <span class="font-mono text-xs text-primary-fixed uppercase tracking-wider font-semibold">আমাদের কাজের পদ্ধতি</span>
                        <h2 class="font-display text-2xl sm:text-3xl font-bold text-white mt-2 leading-tight">প্রতিটি প্রজেক্টের সমাধান আলাদা</h2>
                        <p class="text-slate-300 text-sm sm:text-base mt-3 leading-relaxed">আপনার ব্যবসা, গ্রাহক ও কাজের লক্ষ্য বুঝে পেজ, ফিচার এবং সংযোগের পরিকল্পনা করি। ফলাফল নির্ভর করে প্রজেক্টের ধরন ও বাস্তব ব্যবসায়িক পরিস্থিতির ওপর।</p>
                    </div>
                    <div class="lg:col-span-6 grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @foreach ([
                            ['devices', 'ব্যবহারযোগ্য লেআউট', 'মোবাইল ও কম্পিউটারে তথ্য সহজে দেখার ব্যবস্থা।'],
                            ['dashboard_customize', 'প্রয়োজনীয় ফিচার', 'প্রজেক্টের পরিধি অনুযায়ী ফিচার বেছে নেওয়া।'],
                            ['palette', 'ব্র্যান্ড অনুযায়ী ডিজাইন', 'আপনার ব্যবসার পরিচিতির সঙ্গে মানানসই উপস্থাপন।'],
                            ['handshake', 'আলোচনা ও পর্যালোচনা', 'গুরুত্বপূর্ণ সিদ্ধান্তে আপনাকে যুক্ত রাখা।'],
                        ] as [$icon, $title, $text])
                            <div class="flex items-start gap-3.5 bg-[#0B0F14] p-4 rounded-xl border border-white/10">
                                <span class="material-symbols-outlined text-primary-fixed text-[22px]">{{ $icon }}</span>
                                <div>
                    <h3 class="text-sm font-semibold text-white">{{ $title }}</h3>
                    <p class="text-xs text-slate-300 mt-1">{{ $text }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="w-full relative py-12 md:py-16">
        <div class="max-w-5xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <div class="relative overflow-hidden rounded-3xl border border-primary-fixed/30 bg-gradient-to-br from-[#122218] via-[#0d1612] to-[#0B0F14] p-8 md:p-14 text-center">
                <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-[500px] h-[250px] bg-primary-fixed/15 blur-[100px] rounded-full pointer-events-none"></div>
                <div class="relative">
                    <h2 class="font-heading text-3xl md:text-4xl font-extrabold text-white tracking-tight">আপনার প্রজেক্ট নিয়ে কথা বলতে চান?</h2>
                    <p class="text-slate-300 text-base md:text-lg mt-4 max-w-2xl mx-auto leading-relaxed">আপনার লক্ষ্য ও প্রয়োজনীয় ফিচার জানান। কাজের পরিধি অনুযায়ী আমরা পরবর্তী ধাপ ও সম্ভাব্য খরচ জানাব।</p>
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
