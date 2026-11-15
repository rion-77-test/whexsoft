@extends('frontend.layouts.app')

@section('title', 'সার্ভিসসমূহ | WhexSoft')
@section('description', 'ই-কমার্স, ল্যান্ডিং পেজ, কর্পোরেট ওয়েবসাইট, কাস্টম ওয়েব অ্যাপ, UI/UX ডিজাইন ও ওয়েবসাইট মেইনটেন্যান্স সম্পর্কে জানুন।')
@section('page', 'services')

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
    $serviceIcons = [
        'ecommerce-website' => 'shopping_cart',
        'landing-page' => 'ads_click',
        'corporate-portfolio-website' => 'apartment',
        'dynamic-website' => 'terminal',
        'ui-ux-design' => 'design_services',
        'website-maintenance' => 'build',
    ];
    $servicePoints = [
        'ecommerce-website' => ['পণ্য ও অর্ডার ব্যবস্থাপনা', 'পেমেন্ট সংযোগের সুযোগ', 'অ্যাডমিন ড্যাশবোর্ড'],
        'landing-page' => ['পরিষ্কার বার্তা', 'যোগাযোগ বা অর্ডার ফর্ম', 'মোবাইল-উপযোগী লেআউট'],
        'corporate-portfolio-website' => ['ব্র্যান্ড অনুযায়ী ডিজাইন', 'কনটেন্ট ব্যবস্থাপনা', 'সার্চ-উপযোগী কাঠামো'],
        'dynamic-website' => ['কাস্টম লজিক', 'রোল-বেসড অ্যাক্সেস', 'এপিআই ইন্টিগ্রেশন'],
        'ui-ux-design' => ['ইউজার রিসার্চ', 'প্রোটোটাইপ', 'ডিজাইন সিস্টেম'],
        'website-maintenance' => ['নিয়মিত রক্ষণাবেক্ষণ', 'আপডেট ও ব্যাকআপ', 'সম্মত সাপোর্ট'],
    ];
@endphp

<main class="w-full relative overflow-x-clip">
    <section class="w-full relative overflow-hidden pt-32 md:pt-40 pb-12 md:pb-16">
        <div class="absolute -top-32 left-1/2 -translate-x-1/2 w-[700px] h-[400px] bg-primary-fixed/10 blur-[120px] rounded-full pointer-events-none"></div>
        <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <div class="relative max-w-4xl mx-auto text-center">
                <span class="inline-block text-xs font-mono uppercase tracking-widest text-primary-fixed bg-primary-fixed/10 border border-primary-fixed/30 px-3.5 py-1 rounded-full">আমাদের সার্ভিস</span>
                <h1 class="font-heading text-4xl md:text-6xl font-extrabold text-white tracking-tight mt-5 leading-tight">আপনার প্রজেক্টের জন্য <span class="text-primary-fixed">উপযুক্ত সার্ভিস</span></h1>
                <p class="text-slate-300 text-base md:text-xl mt-6 leading-relaxed max-w-3xl mx-auto">ওয়েবসাইট, অনলাইন স্টোর, UI/UX ডিজাইন বা মেইনটেন্যান্স—আপনার প্রয়োজন অনুযায়ী কাজের পরিধি ঠিক করতে আমাদের সঙ্গে কথা বলুন।</p>
                <div class="flex flex-wrap justify-center gap-4 mt-9">
                    <a class="w-full sm:w-auto inline-flex items-center justify-center gap-2 h-12 px-7 rounded-full bg-primary-fixed text-[#070A0E] font-heading font-bold hover:bg-primary-fixed-dim transition-all shadow-[0_0_30px_rgba(197,243,49,0.25)]" href="#quote">ফ্রি কোটেশন নিন<span class="material-symbols-outlined text-[20px]">arrow_forward</span></a>
                    <a class="w-full sm:w-auto inline-flex items-center justify-center gap-2 h-12 px-7 rounded-full bg-white/5 border border-white/20 text-white font-heading font-semibold hover:bg-white/10 transition-all" href="#all-services">সব সার্ভিস দেখুন</a>
                </div>
            </div>
            <div class="relative mt-14 md:mt-20 rounded-2xl bg-[#131920]/90 border border-white/10 p-6 md:p-8 shadow-2xl">
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

    <section class="w-full bg-[#0B0F14]/70 border-y border-white/10 relative py-16 md:py-24" id="all-services">
        <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <div class="max-w-3xl text-center mx-auto mb-12 md:mb-14">
                <span class="inline-block text-xs font-mono uppercase tracking-widest text-primary-fixed bg-primary-fixed/10 border border-primary-fixed/30 px-3.5 py-1 rounded-full">সব সার্ভিস</span>
                <h2 class="font-heading text-3xl md:text-4xl font-extrabold text-white mt-4 tracking-tight">আপনার প্রয়োজন অনুযায়ী বেছে নিন</h2>
                <p class="text-slate-300 text-base md:text-lg mt-4 leading-relaxed">কাজ শুরুর আগে ফিচার, সময় ও খরচ নিয়ে আলোচনা করে লিখিতভাবে ঠিক করি।</p>
            </div>
            @if ($services->isEmpty())
                <div class="rounded-2xl border border-white/10 bg-[#111722] p-10 text-center text-slate-300">এখনো কোনো সার্ভিস যুক্ত করা হয়নি।</div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                    @foreach ($services as $service)
                        @php
                            $image = $service->getFirstMediaUrl('service-image') ?: ($serviceImages[$service->slug] ?? asset('assets/frontend/images/brand-graphic.jpg'));
                            $icon = $serviceIcons[$service->slug] ?? 'language';
                            $points = collect($service->features ?? [])->pluck('title')->filter()->take(3);
                            if ($points->isEmpty()) {
                                $points = collect($servicePoints[$service->slug] ?? ['কাস্টম ডিজাইন', 'মডার্ন টেকনোলজি', 'লাইভ সাপোর্ট']);
                            }
                        @endphp
                        <article class="group flex flex-col rounded-2xl bg-[#111722] border border-white/10 overflow-hidden hover:border-primary-fixed/40 hover:-translate-y-1 transition-all duration-300">
                            <a aria-hidden="true" class="relative block aspect-[16/10] overflow-hidden bg-[#0B0F14]" href="{{ route('services.show', $service) }}" tabindex="-1">
                                <img alt="{{ $service->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy" src="{{ $image }}" />
                                <span class="absolute top-4 left-4 w-11 h-11 rounded-xl bg-[#070A0E]/80 backdrop-blur-md border border-primary-fixed/30 flex items-center justify-center text-primary-fixed">
                                    <span class="material-symbols-outlined text-[22px]">{{ $icon }}</span>
                                </span>
                            </a>
                            <div class="flex flex-col flex-1 p-6">
                                <h3 class="font-heading text-xl font-bold text-white">
                                    <a class="hover:text-primary-fixed transition-colors" href="{{ route('services.show', $service) }}">{{ $service->title }}</a>
                                </h3>
                                <p class="text-slate-300 text-sm leading-relaxed mt-3">{{ $service->short_description ?: 'আপনার ব্যবসার লক্ষ্য অনুযায়ী কাস্টম ডিজাইন, ডেভেলপমেন্ট ও লাইভ-পরবর্তী সাপোর্ট।' }}</p>
                                <ul class="text-sm text-slate-200 space-y-2 mt-5">
                                    @foreach ($points as $point)
                                        <li class="flex items-center gap-2"><span class="material-symbols-outlined text-primary-fixed text-[18px]">check_circle</span>{{ $point }}</li>
                                    @endforeach
                                </ul>
                                <div class="flex items-center gap-3 mt-auto pt-6">
                                    <a class="flex-1 inline-flex items-center justify-center gap-1.5 h-11 rounded-full bg-primary-fixed text-[#070A0E] text-sm font-bold hover:bg-primary-fixed-dim transition-colors" href="{{ route('services.show', $service) }}">বিস্তারিত দেখুন<span class="material-symbols-outlined text-[18px]">arrow_forward</span></a>
                                    <a aria-label="কল করুন" class="w-11 h-11 rounded-full border border-white/20 flex items-center justify-center text-white hover:border-primary-fixed hover:text-primary-fixed transition-colors" href="tel:01335198859">
                                        <span class="material-symbols-outlined text-[20px]">call</span>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <section class="w-full relative py-12 md:py-16">
        <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <div class="max-w-3xl text-center mx-auto mb-12 md:mb-14">
                <span class="inline-block text-xs font-mono uppercase tracking-widest text-primary-fixed bg-primary-fixed/10 border border-primary-fixed/30 px-3.5 py-1 rounded-full">কেন WhexSoft</span>
                <h2 class="font-heading text-3xl md:text-4xl font-extrabold text-white mt-4 tracking-tight">কেন আমাদের বেছে নেবেন</h2>
                <p class="text-slate-300 text-base md:text-lg mt-4 leading-relaxed">আমরা শুধু ওয়েবসাইট বানাই না, আপনার ব্যবসার বৃদ্ধির অংশীদার হই।</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ([
                    ['translate', 'বাংলায় যোগাযোগ', 'প্রজেক্টের প্রতিটি ধাপে সহজ বাংলায় আলোচনা ও আপডেট।'],
                    ['payments', 'লোকাল পেমেন্ট', 'বিকাশ, নগদ ও ব্যাংক ট্রান্সফারে সহজ পেমেন্ট।'],
                    ['schedule', 'সময়মতো ডেলিভারি', 'স্কোপ ও টাইমলাইন লিখিতভাবে নিশ্চিত করা হয়।'],
                    ['support_agent', 'লাইভের পরেও পাশে', 'লাইভ হওয়ার পর সাপোর্ট ও মেইনটেন্যান্স সুবিধা।'],
                ] as [$icon, $title, $text])
                    <div class="flex gap-4 rounded-2xl bg-[#111722] border border-white/10 p-6">
                        <div class="w-12 h-12 rounded-xl bg-primary-fixed/10 border border-primary-fixed/30 flex items-center justify-center text-primary-fixed shrink-0">
                            <span class="material-symbols-outlined text-[24px]">{{ $icon }}</span>
                        </div>
                        <div>
                            <h3 class="font-heading text-lg font-bold text-white">{{ $title }}</h3>
                            <p class="text-slate-300 text-sm leading-relaxed mt-1.5">{{ $text }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="w-full bg-[#0B0F14]/70 border-y border-white/10 relative py-16 md:py-24">
        <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <div class="max-w-3xl text-center mx-auto mb-12 md:mb-14">
                <span class="inline-block text-xs font-mono uppercase tracking-widest text-primary-fixed bg-primary-fixed/10 border border-primary-fixed/30 px-3.5 py-1 rounded-full">কাজের ধাপ</span>
                <h2 class="font-heading text-3xl md:text-4xl font-extrabold text-white mt-4 tracking-tight">কীভাবে কাজ করি</h2>
                <p class="text-slate-300 text-base md:text-lg mt-4 leading-relaxed">চারটি সহজ ধাপে আপনার প্রজেক্ট থেকে লাইভ পর্যন্ত।</p>
            </div>
            <ol class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ([
                    ['forum', 'আলোচনা ও পরিকল্পনা', 'আপনার লক্ষ্য, বাজেট ও প্রয়োজন বুঝে স্কোপ ঠিক করা হয়।'],
                    ['draw', 'ডিজাইন', 'ব্র্যান্ড অনুযায়ী ডিজাইন তৈরি ও আপনার অনুমোদন।'],
                    ['code', 'ডেভেলপমেন্ট ও টেস্টিং', 'কোড, ইন্টিগ্রেশন ও সব ডিভাইসে টেস্ট।'],
                    ['rocket_launch', 'লাইভ ও সাপোর্ট', 'লাইভ করার পর প্রশিক্ষণ ও সাপোর্ট।'],
                ] as [$icon, $title, $text])
                    <li class="relative rounded-2xl bg-[#111722] border border-white/10 p-6">
                        <span class="absolute top-5 right-6 font-mono text-4xl font-bold text-white/5">{{ sprintf('%02d', $loop->iteration) }}</span>
                        <div class="w-12 h-12 rounded-xl bg-primary-fixed/10 border border-primary-fixed/30 flex items-center justify-center text-primary-fixed shrink-0">
                            <span class="material-symbols-outlined text-[24px]">{{ $icon }}</span>
                        </div>
                        <h3 class="font-heading text-lg font-bold text-white mt-5">{{ $title }}</h3>
                        <p class="text-slate-300 text-sm leading-relaxed mt-2">{{ $text }}</p>
                    </li>
                @endforeach
            </ol>
            <div class="text-center mt-10">
                <a class="inline-flex items-center gap-2 text-primary-fixed font-semibold hover:gap-3 transition-all" href="{{ route('process') }}">বিস্তারিত প্রক্রিয়া দেখুন<span class="material-symbols-outlined text-[20px]">arrow_forward</span></a>
            </div>
        </div>
    </section>

    <section class="w-full relative py-12 md:py-16" id="quote">
        <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">
                <div>
                    <span class="inline-block text-xs font-mono uppercase tracking-widest text-primary-fixed bg-primary-fixed/10 border border-primary-fixed/30 px-3.5 py-1 rounded-full">কোটেশন</span>
                    <h2 class="font-heading text-3xl md:text-4xl font-extrabold text-white mt-4 tracking-tight">ফ্রি কোটেশনের জন্য আবেদন করুন</h2>
                    <p class="text-slate-300 text-base md:text-lg mt-4 leading-relaxed">ফর্মটি পূরণ করুন। আপনার প্রজেক্টের ধরন অনুযায়ী পরামর্শ ও আনুমানিক মূল্য জানাতে আমরা যোগাযোগ করব।</p>
                    <ul class="mt-8 space-y-4 text-slate-200">
                        <li class="flex items-center gap-3"><span class="material-symbols-outlined text-primary-fixed">check_circle</span>কোনো বাধ্যবাধকতা নেই</li>
                        <li class="flex items-center gap-3"><span class="material-symbols-outlined text-primary-fixed">check_circle</span>কর্মদিবসে দ্রুত সাড়া</li>
                        <li class="flex items-center gap-3"><span class="material-symbols-outlined text-primary-fixed">check_circle</span>বিকাশ, নগদ ও ব্যাংক পেমেন্ট</li>
                    </ul>
                </div>
                <form class="rounded-3xl bg-[#111722] border border-white/10 p-6 md:p-8 grid grid-cols-1 sm:grid-cols-2 gap-4" action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <input class="w-full h-12 rounded-xl bg-[#0B0F14] border border-white/15 px-4 text-white placeholder:text-slate-500 focus:border-primary-fixed focus:ring-0 outline-none transition-colors" name="name" value="{{ old('name') }}" placeholder="আপনার নাম" required type="text" />
                    <input class="w-full h-12 rounded-xl bg-[#0B0F14] border border-white/15 px-4 text-white placeholder:text-slate-500 focus:border-primary-fixed focus:ring-0 outline-none transition-colors" name="phone" value="{{ old('phone') }}" placeholder="ফোন নম্বর" required type="tel" />
                    <input class="w-full h-12 rounded-xl bg-[#0B0F14] border border-white/15 px-4 text-white placeholder:text-slate-500 focus:border-primary-fixed focus:ring-0 outline-none transition-colors sm:col-span-2" name="email" value="{{ old('email') }}" placeholder="ইমেইল (ঐচ্ছিক)" type="email" />
                    <select class="w-full h-12 rounded-xl bg-[#0B0F14] border border-white/15 px-4 text-white focus:border-primary-fixed focus:ring-0 outline-none transition-colors sm:col-span-2" name="service_type" required>
                        <option value="">সার্ভিস নির্বাচন করুন</option>
                        @foreach ($services as $service)
                            <option value="{{ $service->title }}" @selected(old('service_type') === $service->title)>{{ $service->title }}</option>
                        @endforeach
                    </select>
                    <textarea class="w-full rounded-xl bg-[#0B0F14] border border-white/15 px-4 py-3 text-white placeholder:text-slate-500 focus:border-primary-fixed focus:ring-0 outline-none transition-colors sm:col-span-2 h-28 resize-none" name="message" placeholder="আপনার প্রজেক্ট সম্পর্কে সংক্ষেপে লিখুন">{{ old('message') }}</textarea>
                    @if ($errors->any())
                        <p class="sm:col-span-2 text-xs text-red-400">অনুগ্রহ করে প্রয়োজনীয় তথ্যগুলো সঠিকভাবে পূরণ করুন।</p>
                    @endif
                    <button class="w-full inline-flex items-center justify-center gap-2 h-12 px-7 rounded-full bg-primary-fixed text-[#070A0E] font-heading font-bold hover:bg-primary-fixed-dim transition-all shadow-[0_0_30px_rgba(197,243,49,0.25)] sm:col-span-2" type="submit">কোটেশন চাই<span class="material-symbols-outlined text-[20px]">send</span></button>
                </form>
            </div>
        </div>
    </section>

    <section class="w-full bg-[#0B0F14]/70 border-y border-white/10 relative py-16 md:py-24">
        <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <div class="max-w-3xl text-center mx-auto mb-12 md:mb-14">
                <span class="inline-block text-xs font-mono uppercase tracking-widest text-primary-fixed bg-primary-fixed/10 border border-primary-fixed/30 px-3.5 py-1 rounded-full">সচরাচর জিজ্ঞাসা</span>
                <h2 class="font-heading text-3xl md:text-4xl font-extrabold text-white mt-4 tracking-tight">আপনার প্রশ্নের উত্তর</h2>
            </div>
            <div class="max-w-3xl mx-auto flex flex-col gap-3">
                @foreach ([
                    ['কোন সার্ভিসটি আমার জন্য উপযুক্ত?', 'সরাসরি অনলাইনে পণ্য বিক্রি করতে চাইলে ই-কমার্স বা ল্যান্ডিং পেজ, কোম্পানির পরিচিতির জন্য কর্পোরেট ওয়েবসাইট। নিশ্চিত না হলে ফ্রি কনসাল্টেশনে জানান।'],
                    ['একাধিক সার্ভিস একসাথে নেওয়া যাবে?', 'হ্যাঁ, যেমন ডিজাইনের সাথে ডেভেলপমেন্ট ও মেইনটেন্যান্স একসাথে নেওয়া যায়।'],
                    ['মূল্য কীভাবে নির্ধারিত হয়?', 'স্কোপ, ফিচার ও সময়ের উপর ভিত্তি করে। প্যাকেজ ও মূল্য পেজে মূল প্যাকেজগুলো দেখতে পারেন।'],
                    ['পেমেন্ট কীভাবে করব?', 'বিকাশ, নগদ, রকেট বা ব্যাংক ট্রান্সফারে। পেমেন্ট শিডিউল চুক্তিতে লেখা থাকে।'],
                ] as [$question, $answer])
                    <details class="group rounded-2xl bg-[#111722] border border-white/10 open:border-primary-fixed/40 transition-colors">
                        <summary class="flex items-center justify-between gap-4 cursor-pointer list-none p-5 md:p-6 font-heading font-semibold text-white">{{ $question }}<span class="material-symbols-outlined text-primary-fixed transition-transform group-open:rotate-180 shrink-0">expand_more</span></summary>
                        <p class="px-5 md:px-6 pb-5 md:pb-6 -mt-1 text-slate-300 leading-relaxed">{{ $answer }}</p>
                    </details>
                @endforeach
            </div>
        </div>
    </section>

    <section class="w-full relative py-12 md:py-16">
        <div class="max-w-5xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <div class="relative overflow-hidden rounded-3xl border border-primary-fixed/30 bg-gradient-to-br from-[#122218] via-[#0d1612] to-[#0B0F14] p-8 md:p-14 text-center">
                <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-[500px] h-[250px] bg-primary-fixed/15 blur-[100px] rounded-full pointer-events-none"></div>
                <div class="relative">
                    <h2 class="font-heading text-3xl md:text-4xl font-extrabold text-white tracking-tight">আপনার প্রজেক্ট নিয়ে কথা বলতে চান?</h2>
                    <p class="text-slate-300 text-base md:text-lg mt-4 max-w-2xl mx-auto leading-relaxed">ফ্রি কনসাল্টেশনে আপনার প্রয়োজন জানান। আমরা সঠিক সমাধান ও পরিষ্কার মূল্য জানিয়ে দেব।</p>
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
