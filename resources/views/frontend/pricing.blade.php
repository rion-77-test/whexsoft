@extends('frontend.layouts.app')

@section('title', 'প্যাকেজ ও মূল্য | WhexSoft')
@section('description', 'WhexSoft-এর ওয়েবসাইট ও ডিজিটাল প্রজেক্টের প্যাকেজ দেখুন। কাজের পরিধি, ফিচার ও খরচ নিয়ে প্রস্তাব পাওয়ার জন্য যোগাযোগ করুন।')
@section('page', 'pricing')

@section('content')
@php
    $totalPackages = $packagesByService->flatten()->count();
@endphp

<main class="w-full relative overflow-x-clip">
    <section class="w-full relative pt-32 md:pt-40 pb-12 md:pb-16">
        <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <div class="flex flex-wrap items-center justify-between gap-3">
                <div class="flex items-center gap-2 text-xs font-mono tracking-wider uppercase text-slate-400">
                    <span class="text-[#c5f331] font-semibold">WHEXSOFT</span>
                    <span>/</span>
                    <span class="text-slate-300">প্যাকেজ ও কাজের পরিধি</span>
                    <span>/</span>
                    <span class="text-white">{{ now()->format('Y') }} রেট কার্ড</span>
                </div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#111822] border border-white/10 text-slate-300 text-xs">
                    <span class="w-2 h-2 rounded-full bg-[#c5f331] animate-pulse"></span>
                    <span>কাজ শুরুর আগে মূল্য ও পরিধি জানানো হয়</span>
                </div>
            </div>
            <div class="text-center max-w-4xl mx-auto">
                <div class="inline-flex items-center gap-2 mb-4 px-4 py-1.5 rounded-full bg-white/5 border border-[#c5f331]/30 text-[#c5f331] text-xs font-mono font-medium tracking-wide">
                    <span>⚡</span>
                    <span>কাজের পরিধি অনুযায়ী প্রস্তাব</span>
                </div>
                <h1 class="font-display text-3xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight leading-tight">আপনার প্রজেক্টের জন্য <span class="text-[#c5f331]">প্যাকেজ ও মূল্য</span></h1>
                <p class="mt-4 text-base sm:text-lg text-slate-300 max-w-2xl mx-auto leading-relaxed">প্রয়োজনীয় পেজ, ফিচার ও ইন্টিগ্রেশন বুঝে আমরা কাজের পরিধি ও খরচ জানাই। প্যাকেজ নিয়ে প্রশ্ন থাকলে সরাসরি কথা বলুন।</p>
                <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
                    @foreach ([
                        ['bolt', 'সময়সূচি প্রজেক্ট অনুযায়ী'],
                        ['verified', 'হস্তান্তরের শর্ত আগে থেকেই স্পষ্ট'],
                        ['support_agent', 'সাপোর্টের শর্ত প্রস্তাবে স্পষ্ট'],
                    ] as [$icon, $label])
                        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#0d1410] border border-[#c5f331]/30 text-white text-xs sm:text-sm font-medium">
                            <span class="material-symbols-outlined text-[#c5f331] text-[18px]">{{ $icon }}</span>
                            <span>{{ $label }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="w-full relative py-12 md:py-16">
        <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            @if ($totalPackages === 0)
                <div class="rounded-2xl border border-white/10 bg-[#0d131a] p-10 text-center text-slate-300">
                    এই মুহূর্তে কোনো প্যাকেজ তালিকা নেই। আপনার প্রজেক্টের জন্য প্রস্তাব পেতে আমাদের সঙ্গে যোগাযোগ করুন।
                </div>
            @else
                <div class="space-y-16">
                    @foreach ($packagesByService as $serviceName => $packages)
                        <div>
                            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
                                <div>
                                    <span class="text-xs font-mono font-semibold text-[#c5f331] uppercase tracking-wider px-3.5 py-1 rounded-full bg-white/5 border border-[#c5f331]/20 inline-block mb-3">{{ $packages->count() }}টি প্যাকেজ</span>
                                    <h2 class="font-display text-2xl sm:text-3xl font-extrabold text-white">{{ $serviceName }}</h2>
                                </div>
                                <p class="text-slate-300 text-sm max-w-md leading-relaxed">প্রতিটি প্যাকেজে প্রয়োজনীয় ফিচার, লাইভ-পরবর্তী সাপোর্ট ও স্বচ্ছ ডেলিভারি টাইমলাইন অন্তর্ভুক্ত।</p>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch">
                                @foreach ($packages as $package)
                                    <div class="relative rounded-2xl p-7 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1.5 {{ $package->is_popular ? 'bg-gradient-to-b from-[#111e15] to-[#0c1510] border-2 border-[#c5f331] shadow-[0_0_36px_rgba(197,243,49,0.25)] lg:-translate-y-2' : 'bg-[#0d131a] border border-white/10 hover:border-[#c5f331]/40 shadow-xl' }}">
                                        @if ($package->is_popular)
                                            <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 px-4 py-1 bg-[#c5f331] text-[#070A0E] text-xs font-mono font-extrabold rounded-full uppercase tracking-wider shadow-[0_0_16px_rgba(197,243,49,0.6)] whitespace-nowrap">জনপ্রিয় প্যাকেজ</div>
                                        @endif
                                        <div>
                                            <div class="flex items-center justify-between mb-4 pt-1">
                                                <span class="text-xs font-mono uppercase tracking-wider {{ $package->is_popular ? 'text-[#c5f331] bg-[#c5f331]/15 border border-[#c5f331]/40' : 'text-slate-300 bg-white/5 border border-white/10' }} px-3 py-1 rounded-md font-bold">{{ $package->name }}</span>
                                                <span class="material-symbols-outlined {{ $package->is_popular ? 'text-[#c5f331]' : 'text-slate-400' }}">{{ $package->is_popular ? 'workspace_premium' : 'rocket_launch' }}</span>
                                            </div>
                                            <h3 class="font-display text-2xl font-bold text-white">{{ $package->name }} প্যাকেজ</h3>
                                            @if ($package->tagline)
                                                <p class="text-sm text-[#c5f331] mt-1 font-medium">{{ $package->tagline }}</p>
                                            @endif
                                            <div class="my-6 p-5 rounded-xl {{ $package->is_popular ? 'bg-[#070e0a] border border-[#c5f331]/30' : 'bg-[#070b10] border border-white/5' }}">
                                                <span class="text-xs uppercase tracking-wider text-slate-400 block font-semibold">প্যাকেজ মূল্য</span>
                                                <div class="flex items-baseline gap-1 mt-1">
                                                    <span class="text-4xl font-extrabold {{ $package->is_popular ? 'text-[#c5f331]' : 'text-white' }}">{{ $package->price_label ?: 'যোগাযোগ করুন' }}</span>
                                                    <span class="text-xs text-slate-400">/এককালীন</span>
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
                                            <a class="w-full inline-flex items-center justify-center gap-2 py-3 px-5 rounded-xl {{ $package->is_popular ? 'bg-[#c5f331] hover:bg-[#b0dc2b] text-[#070A0E] font-bold shadow-[0_0_24px_rgba(197,243,49,0.35)]' : 'bg-white/10 hover:bg-white/20 text-white font-semibold border border-white/10' }} text-sm transition-all" href="{{ route('contact') }}?service={{ urlencode($serviceName) }}&package={{ urlencode($package->name) }}">
                                                <span>এই প্যাকেজটি বেছে নিন</span>
                                                <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <section class="w-full relative py-12 md:py-16">
        <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <div class="relative rounded-2xl bg-gradient-to-r from-[#0d1612] via-[#122218] to-[#0d1612] p-6 sm:p-10 overflow-hidden shadow-2xl border border-[#c5f331]/30">
                <div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-7 flex flex-col gap-3">
                        <div class="inline-flex items-center gap-2 px-3 py-1 bg-white/5 border border-[#c5f331]/30 rounded-full w-fit text-[#c5f331] font-mono text-xs uppercase tracking-widest font-semibold">
                            <span>কাস্টম প্রজেক্ট</span>
                        </div>
                        <h3 class="font-display text-2xl sm:text-4xl font-extrabold text-white">বিশেষ কাস্টম রিকোয়ারমেন্ট প্রয়োজন?</h3>
                        <p class="text-slate-300 text-sm sm:text-base leading-relaxed">প্যাকেজের বাইরে কোনো পোর্টাল, ওয়েব অ্যাপ বা বিশেষ ফিচার দরকার হলে কাজের পরিধি নিয়ে আলোচনা করতে যোগাযোগ করুন।</p>
                        <div class="mt-4 flex flex-wrap items-center gap-3">
                            <a class="inline-flex items-center gap-2 text-white hover:text-[#c5f331] transition-colors bg-[#08100c] border border-white/10 hover:border-[#c5f331]/40 px-4 py-2.5 rounded-xl text-sm font-semibold" href="tel:01335198859">
                                <span class="material-symbols-outlined text-[#c5f331] text-[20px]">phone_in_talk</span>
                                <span>কল করুন: ০১৩৩৫-১৯৮৮৫৯</span>
                            </a>
                            <a class="inline-flex items-center gap-2 text-[#070A0E] bg-[#25D366] hover:bg-[#1fae53] transition-colors px-4 py-2.5 rounded-xl text-sm font-bold shadow-[0_0_18px_rgba(37,211,102,0.3)]" href="https://wa.me/8801335198859" rel="noopener noreferrer" target="_blank">
                                <span class="material-symbols-outlined text-[20px]">chat</span>
                                <span>WhatsApp-এ সরাসরি কথা বলুন</span>
                            </a>
                        </div>
                    </div>
                    <div class="lg:col-span-5">
                        <div class="bg-[#0B0F14]/80 border border-white/10 rounded-2xl p-6">
                            <h4 class="font-heading text-lg font-bold text-white mb-4">প্রস্তাবে যা স্পষ্ট থাকবে</h4>
                            <ul class="space-y-3 text-sm text-slate-200">
                                @foreach (['কাজের পরিধি ও ফিচার', 'সময়সূচি ও পর্যালোচনার ধাপ', 'মূল্য ও পেমেন্টের সময়সূচি', 'ডোমেইন ও হোস্টিংয়ের দায়িত্ব', 'হস্তান্তর ও সাপোর্টের শর্ত'] as $item)
                                    <li class="flex items-center gap-2"><span class="material-symbols-outlined text-primary-fixed text-[18px]">check_circle</span>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="w-full relative py-12 md:py-16">
        <div class="max-w-4xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <div class="text-center mb-10">
                <span class="text-xs font-mono font-semibold text-[#c5f331] uppercase tracking-wider px-3.5 py-1 rounded-full bg-white/5 border border-[#c5f331]/20 inline-block mb-3">সচরাচর জিজ্ঞাসা</span>
                <h2 class="font-display text-3xl font-extrabold text-white">মূল্য ও প্যাকেজ নিয়ে প্রশ্ন</h2>
            </div>
            <div class="flex flex-col gap-3">
                @foreach ([
                    ['প্যাকেজের বাইরে কাজ লাগলে কী হবে?', 'কাজের পরিধির বাইরে নতুন ফিচার যোগ হলে আগে খরচ ও সময় জানানো হবে। আপনার সম্মতি ছাড়া অতিরিক্ত কাজ শুরু করা হবে না।'],
                    ['পেমেন্ট কীভাবে করতে হবে?', 'পেমেন্টের মাধ্যম ও ধাপ প্রজেক্ট প্রস্তাবে উল্লেখ থাকবে। কাজ শুরুর আগে বিস্তারিত জেনে নিতে পারবেন।'],
                    ['ডেলিভারি সময় কত?', 'পেজ, ফিচার, কনটেন্ট প্রস্তুত থাকা ও প্রয়োজনীয় সংযোগের ওপর সময় নির্ভর করে। প্রস্তাবে সম্ভাব্য সময়সূচি দেওয়া হবে।'],
                    ['পরে কি ফিচার যোগ করা যাবে?', 'হ্যাঁ। ওয়েবসাইট মডুলারভাবে তৈরি হয়, ফলে ভবিষ্যতে নতুন ফিচার বা পেজ যোগ করা সহজ।'],
                ] as [$question, $answer])
                    <details class="group rounded-2xl bg-[#111722] border border-white/10 open:border-primary-fixed/40 transition-colors">
                        <summary class="flex items-center justify-between gap-4 cursor-pointer list-none p-5 md:p-6 font-heading font-semibold text-white">{{ $question }}<span class="material-symbols-outlined text-primary-fixed transition-transform group-open:rotate-180 shrink-0">expand_more</span></summary>
                        <p class="px-5 md:px-6 pb-5 md:pb-6 -mt-1 text-slate-300 leading-relaxed">{{ $answer }}</p>
                    </details>
                @endforeach
            </div>
        </div>
    </section>
</main>
@endsection
