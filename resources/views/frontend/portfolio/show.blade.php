@extends('frontend.layouts.app')

@section('title', $project->title.' | WhexSoft')
@section('description', $project->summary ?: $project->title.' প্রজেক্টের বিস্তারিত দেখুন।')
@section('page', 'portfolio')
@section('og_image', $project->getFirstMediaUrl('project-image') ?: asset('assets/frontend/images/project-ecommerce.jpg'))

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
    $image = $project->getFirstMediaUrl('project-image') ?: $projectImages[0];
    $description = (string) $project->description;
    $isHtml = strip_tags($description) !== $description;
@endphp

<main class="w-full relative overflow-x-clip">
    <section class="w-full relative overflow-hidden pt-32 md:pt-40 pb-10 md:pb-14">
        <div class="absolute -top-32 left-1/2 -translate-x-1/2 w-[700px] h-[400px] bg-primary-fixed/10 blur-[120px] rounded-full pointer-events-none"></div>
        <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <nav aria-label="Breadcrumb" class="flex flex-wrap items-center gap-2 text-sm text-slate-400 mb-6">
                <a class="hover:text-white" href="{{ route('home') }}">হোম</a>
                <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                <a class="hover:text-white" href="{{ route('portfolio.index') }}">আমাদের কাজ</a>
                <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                <span class="text-primary-fixed">{{ $project->title }}</span>
            </nav>
            <div class="flex flex-wrap items-center gap-2 mb-5">
                @if ($project->projectCategory)
                    <span class="px-3 py-1 rounded-full bg-primary-fixed/15 text-primary-fixed border border-primary-fixed/30 text-xs font-mono">#{{ $project->projectCategory->name }}</span>
                @endif
                @if ($project->is_real_client)
                    <span class="px-3 py-1 rounded-full bg-success-whatsapp/15 text-success-whatsapp border border-success-whatsapp/30 text-xs font-mono">রিয়েল ক্লায়েন্ট</span>
                @endif
                @if ($project->service)
                    <a class="px-3 py-1 rounded-full bg-white/5 text-slate-200 border border-white/10 text-xs font-mono hover:border-primary-fixed/40 transition-colors" href="{{ route('services.show', $project->service) }}">{{ $project->service->title }}</a>
                @endif
            </div>
            <h1 class="font-display text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight leading-tight max-w-4xl">{{ $project->title }}</h1>
            <p class="text-slate-300 text-base sm:text-lg mt-4 max-w-3xl leading-relaxed">{{ $project->summary }}</p>
            <div class="flex flex-wrap gap-3 mt-8">
                @if ($project->live_url)
                    <a class="inline-flex items-center justify-center gap-2 h-12 px-7 rounded-full bg-primary-fixed text-[#070A0E] font-heading font-bold hover:bg-primary-fixed-dim transition-all shadow-[0_0_30px_rgba(197,243,49,0.25)]" href="{{ $project->live_url }}" rel="noopener noreferrer" target="_blank">লাইভ সাইট দেখুন<span class="material-symbols-outlined text-[20px]">open_in_new</span></a>
                @endif
                <a class="inline-flex items-center justify-center gap-2 h-12 px-7 rounded-full bg-white/5 border border-white/20 text-white font-heading font-semibold hover:bg-white/10 transition-all" href="{{ route('contact') }}">এমন প্রজেক্ট নিয়ে কথা বলুন<span class="material-symbols-outlined text-[20px] text-primary-fixed">arrow_forward</span></a>
            </div>
        </div>
    </section>

    <section class="w-full relative py-8 md:py-12">
        <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <div class="relative rounded-3xl overflow-hidden border border-white/10 bg-[#111722] shadow-2xl">
                <img alt="{{ $project->title }}" class="w-full max-h-[620px] object-cover object-top" src="{{ $image }}" />
                <div class="absolute inset-0 bg-gradient-to-t from-[#070A0E]/60 via-transparent to-transparent pointer-events-none"></div>
            </div>
        </div>
    </section>

    <section class="w-full relative py-12 md:py-16">
        <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
                <div class="lg:col-span-8 space-y-8">
                    <div class="rounded-2xl bg-[#111722] border border-white/10 p-6 sm:p-8">
                        <h2 class="font-heading text-2xl font-bold text-white mb-4 flex items-center gap-2"><span class="material-symbols-outlined text-primary-fixed">description</span> প্রজেক্টের বিবরণ</h2>
                        @if (filled($description))
                            <div class="text-slate-300 leading-relaxed space-y-4 [&_h2]:text-white [&_h3]:text-white [&_h2]:font-heading [&_h3]:font-heading [&_a]:text-primary-fixed [&_ul]:list-disc [&_ul]:pl-5 [&_ol]:list-decimal [&_ol]:pl-5">
                                @if ($isHtml)
                                    {!! $description !!}
                                @else
                                    {!! nl2br(e($description)) !!}
                                @endif
                            </div>
                        @else
                            <p class="text-slate-300 leading-relaxed">{{ $project->summary ?: 'এই প্রজেক্টের বিস্তারিত এখনো যোগ করা হয়নি।' }}</p>
                        @endif
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        @foreach ([
                            ['bolt', 'প্রজেক্টভিত্তিক', 'প্রয়োজনীয় ফিচার'],
                            ['devices', 'বিভিন্ন স্ক্রিনে', 'ব্যবহার উপযোগী লেআউট'],
                            ['tune', 'ব্যবসা অনুযায়ী', 'ডিজাইন ও কার্যপ্রবাহ'],
                        ] as [$icon, $title, $text])
                            <div class="rounded-2xl bg-[#111722] border border-white/10 p-5">
                                <span class="material-symbols-outlined text-primary-fixed text-[26px]">{{ $icon }}</span>
                                <h3 class="font-heading text-base font-bold text-white mt-3">{{ $title }}</h3>
                                <p class="text-xs text-slate-300 mt-1">{{ $text }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <aside class="lg:col-span-4 space-y-6">
                    <div class="rounded-2xl bg-[#111722] border border-white/10 p-6">
                        <h3 class="font-heading text-lg font-bold text-white mb-5">প্রজেক্ট তথ্য</h3>
                        <dl class="space-y-4 text-sm">
                            <div class="flex items-start justify-between gap-4 border-b border-white/10 pb-3">
                                <dt class="text-slate-400">ক্যাটাগরি</dt>
                                <dd class="text-slate-100 text-right">{{ $project->projectCategory?->name ?: '—' }}</dd>
                            </div>
                            <div class="flex items-start justify-between gap-4 border-b border-white/10 pb-3">
                                <dt class="text-slate-400">সার্ভিস</dt>
                                <dd class="text-slate-100 text-right">{{ $project->service?->title ?: '—' }}</dd>
                            </div>
                            <div class="flex items-start justify-between gap-4 border-b border-white/10 pb-3">
                                <dt class="text-slate-400">ক্লায়েন্ট</dt>
                                <dd class="text-slate-100 text-right">{{ $project->is_real_client ? 'রিয়েল প্রজেক্ট' : 'ডেমো / কনসেপ্ট' }}</dd>
                            </div>
                            <div class="flex items-start justify-between gap-4">
                                <dt class="text-slate-400">লাইভ সাইট</dt>
                                <dd class="text-right">
                                    @if ($project->live_url)
                                        <a class="text-primary-fixed hover:underline" href="{{ $project->live_url }}" rel="noopener noreferrer" target="_blank">ভিজিট করুন</a>
                                    @else
                                        <span class="text-slate-100">—</span>
                                    @endif
                                </dd>
                            </div>
                        </dl>
                    </div>

                    <div class="rounded-2xl bg-gradient-to-b from-[#122218] to-[#0c1510] border border-primary-fixed/30 p-6">
                        <span class="inline-flex items-center gap-2 text-primary-fixed font-mono text-xs uppercase tracking-widest"><span class="w-2 h-2 rounded-full bg-primary-fixed animate-pulse"></span> ফ্রি কোটেশন</span>
                        <h3 class="font-heading text-xl font-bold text-white mt-3">একই রকম ওয়েবসাইট চান?</h3>
                        <p class="text-sm text-slate-300 mt-2 leading-relaxed">আপনার প্রজেক্টের লক্ষ্য ও প্রয়োজনীয় ফিচার নিয়ে আমাদের সঙ্গে কথা বলুন।</p>
                        <div class="flex flex-col gap-2 mt-5">
                            <a class="inline-flex items-center justify-center gap-2 h-11 rounded-xl bg-primary-fixed text-[#070A0E] text-sm font-bold hover:bg-primary-fixed-dim transition-all" href="{{ route('contact') }}">কোটেশন নিন<span class="material-symbols-outlined text-[18px]">arrow_forward</span></a>
                            <a class="inline-flex items-center justify-center gap-2 h-11 rounded-xl bg-[#25D366] text-[#070A0E] text-sm font-bold hover:brightness-110 transition-all" href="https://wa.me/8801335198859" rel="noopener noreferrer" target="_blank"><span class="material-symbols-outlined text-[18px]">chat</span>হোয়াটসঅ্যাপ</a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    @if ($relatedProjects->isNotEmpty())
        <section class="w-full bg-[#0B0F14]/70 border-y border-white/10 relative py-16 md:py-24">
            <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
                <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-10">
                    <div>
                        <span class="inline-block text-xs font-mono uppercase tracking-widest text-primary-fixed bg-primary-fixed/10 border border-primary-fixed/30 px-3.5 py-1 rounded-full">সম্পর্কিত কাজ</span>
                        <h2 class="font-heading text-3xl md:text-4xl font-extrabold text-white mt-4 tracking-tight">আরও কিছু প্রজেক্ট</h2>
                    </div>
                    <a class="inline-flex items-center gap-1.5 text-primary-fixed hover:text-white text-sm font-semibold transition-colors" href="{{ route('portfolio.index') }}">সকল প্রজেক্ট<span class="material-symbols-outlined text-[16px]">north_east</span></a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($relatedProjects as $related)
                        @php
                            $relatedImage = $related->getFirstMediaUrl('project-image') ?: $projectImages[$loop->index % count($projectImages)];
                        @endphp
                        <article class="rounded-2xl bg-[#11171f] border border-white/10 hover:border-primary-fixed/40 overflow-hidden shadow-xl hover:-translate-y-1 transition-all group flex flex-col">
                            <a class="relative aspect-[16/10] overflow-hidden bg-[#0A0E13]" href="{{ route('portfolio.show', $related) }}">
                                <img alt="{{ $related->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ $relatedImage }}" />
                            </a>
                            <div class="p-5">
                                @if ($related->projectCategory)
                                    <span class="text-[11px] px-2.5 py-0.5 rounded-md bg-primary-fixed/15 text-primary-fixed border border-primary-fixed/20">#{{ $related->projectCategory->name }}</span>
                                @endif
                                <h3 class="font-display text-lg font-bold text-white mt-2 group-hover:text-primary-fixed transition-colors">
                                    <a href="{{ route('portfolio.show', $related) }}">{{ $related->title }}</a>
                                </h3>
                                <p class="text-xs text-slate-300 mt-1.5 line-clamp-2">{{ $related->summary }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</main>
@endsection
