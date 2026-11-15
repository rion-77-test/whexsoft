@extends('frontend.layouts.app')

@section('title', 'WhexSoft | আপনার ব্যবসার জন্য ওয়েবসাইট ও ডিজিটাল সলিউশন')
@section('description', 'ই-কমার্স, ল্যান্ডিং পেজ ও কাস্টম ওয়েবসাইট নিয়ে কথা বলুন WhexSoft-এর সঙ্গে। আপনার লক্ষ্য ও
    কাজের পরিধি বুঝে আমরা সমাধানের প্রস্তাব দিই।')
@section('page', 'home')

@section('content')
    @php
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
        $projectImages = [
            asset('assets/frontend/images/project-ecommerce.jpg'),
            asset('assets/frontend/images/project-landing.jpg'),
            asset('assets/frontend/images/project-corporate.jpg'),
            asset('assets/frontend/images/project-webapp.jpg'),
            asset('assets/frontend/images/project-uiux.jpg'),
            asset('assets/frontend/images/project-maintenance.jpg'),
        ];
        $blogImages = [
            asset('assets/frontend/images/blog-1.jpg'),
            asset('assets/frontend/images/blog-2.jpg'),
            asset('assets/frontend/images/blog-3.jpg'),
            asset('assets/frontend/images/blog-4.jpg'),
            asset('assets/frontend/images/blog-5.jpg'),
            asset('assets/frontend/images/blog-6.jpg'),
        ];
    @endphp

    <main class="w-full relative overflow-x-clip">

        {{-- Hero Section --}}
        <section class="relative w-full min-h-[100svh] flex items-center overflow-hidden bg-canvas-base">
            <img alt="" aria-hidden="true" class="absolute inset-0 w-full h-full object-cover object-center"
                src="{{ asset('assets/frontend/images/hero.avif') }}" />
            <div class="absolute inset-0 bg-gradient-to-r from-canvas-base via-canvas-base/80 to-canvas-base/30"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-canvas-base via-transparent to-canvas-base/60"></div>
            <div class="relative z-10 w-full max-w-7xl mx-auto px-5 sm:px-8 lg:px-10 pt-32 pb-24">
                <div class="max-w-3xl">
                    <div
                        class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-[#111722]/80 border border-primary-fixed/30 backdrop-blur-md mb-6">
                        <span class="w-2.5 h-2.5 rounded-full bg-primary-fixed animate-ping"></span>
                        <span class="text-xs font-mono text-white font-semibold tracking-wider">ওয়েব ডিজাইন ও ডেভেলপমেন্ট
                            স্টুডিও</span>
                    </div>
                    <h1
                        class="font-heading text-4xl sm:text-5xl lg:text-7xl font-extrabold text-white tracking-tight leading-[1.15] mb-6">
                        আপনার ব্যবসার অনলাইন যাত্রা শুরু হোক <span class="text-primary-fixed"> দ্রুত, আধুনিক ও
                            সাশ্রয়ী</span> ওয়েবসাইটের সাথে
                    </h1>
                    <p
                        class="text-base sm:text-lg lg:text-xl text-slate-200 max-w-2xl {{ $startingPackage ? 'mb-5' : 'mb-10' }} leading-relaxed">
                        আপনার ব্যবসার ধরন যাই হোক, কাস্টমারের কাছে আপনার ব্র্যান্ডকে বিশ্বাসযোগ্য করে তুলতে আমরা তৈরি করছি
                        মোবাইল-ফ্রেন্ডলি ও ফাস্ট-লোডিং ওয়েবসাইট।</p>
                    @if ($startingPackage)
                        <p class="text-sm sm:text-base text-slate-200 mb-8">
                            <span class="font-semibold text-primary-fixed">প্যাকেজের মূল্য শুরু</span>
                            <span class="font-bold text-white">{{ $startingPackage->priceAmount() }}</span>
                            থেকে
                        </p>
                    @endif
                    <div class="flex flex-col sm:flex-row sm:flex-wrap sm:items-center gap-3 sm:gap-4">
                        <a class="justify-center w-full sm:w-auto px-8 py-4 rounded-full bg-primary-fixed text-[#070A0E] font-heading text-base font-bold shadow-[0_0_30px_rgba(197,243,49,0.35)] hover:bg-primary-fixed-dim hover:scale-105 transition-all flex items-center gap-2"
                            href="{{ route('contact') }}">
                            <span>আমাদের পরামর্শ নিন</span>
                            <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
                        </a>
                        <a class="justify-center w-full sm:w-auto px-8 py-4 rounded-full bg-white/10 backdrop-blur-md hover:bg-white/15 border border-white/25 text-white font-heading text-base font-semibold transition-all flex items-center gap-2"
                            href="{{ route('portfolio.index') }}">
                            <span class="material-symbols-outlined text-primary-fixed text-[20px]">play_circle</span>
                            <span>আমাদের কাজগুলো দেখুন</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- Features Section --}}
        {{-- <section class="w-full relative z-20 -mt-10 md:-mt-14 pb-12 md:pb-16">
        <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <div class="max-w-5xl mx-auto rounded-2xl bg-[#131920]/90 backdrop-blur-xl border border-white/10 p-6 shadow-2xl">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 divide-y sm:divide-y-0 sm:divide-x divide-white/10">
                    <div class="flex items-center gap-3.5 pt-2 sm:pt-0">
                        <div class="w-12 h-12 rounded-xl bg-primary-fixed/10 border border-primary-fixed/30 flex items-center justify-center text-primary-fixed shrink-0"><span class="material-symbols-outlined text-[24px]">devices</span></div>
                        <div><h3 class="font-heading text-lg font-bold text-white">সব স্ক্রিনে</h3><p class="text-xs text-slate-300 font-medium">ব্যবহার উপযোগী ডিজাইন</p></div>
                    </div>
                    <div class="flex items-center gap-3.5 pt-4 sm:pt-0 sm:pl-6">
                        <div class="w-12 h-12 rounded-xl bg-primary-fixed/10 border border-primary-fixed/30 flex items-center justify-center text-primary-fixed shrink-0"><span class="material-symbols-outlined text-[24px]">bolt</span></div>
                        <div><h3 class="font-heading text-lg font-bold text-white">আপনার ব্র্যান্ড</h3><p class="text-xs text-slate-300 font-medium">চাহিদা অনুযায়ী ডিজাইন</p></div>
                    </div>
                    <div class="flex items-center gap-3.5 pt-4 sm:pt-0 sm:pl-6">
                        <div class="w-12 h-12 rounded-xl bg-primary-fixed/10 border border-primary-fixed/30 flex items-center justify-center text-primary-fixed shrink-0"><span class="material-symbols-outlined text-[24px]">troubleshoot</span></div>
                        <div><h3 class="font-heading text-lg font-bold text-white">পরিকল্পনা থেকে লঞ্চ</h3><p class="text-xs text-slate-300 font-medium">একসঙ্গে কাজের ধাপগুলো</p></div>
                    </div>
                    <div class="flex items-center gap-3.5 pt-4 sm:pt-0 sm:pl-6">
                        <div class="w-12 h-12 rounded-xl bg-primary-fixed/10 border border-primary-fixed/30 flex items-center justify-center text-primary-fixed shrink-0"><span class="material-symbols-outlined text-[24px]">support_agent</span></div>
                        <div><h3 class="font-heading text-lg font-bold text-white">লঞ্চের পরেও</h3><p class="text-xs text-slate-300 font-medium">প্রয়োজন অনুযায়ী সহায়তা</p></div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

        {{-- Services Section --}}
        <section class="w-full border-y border-white/10 bg-[#0B0F14]/70 relative py-16 md:py-24" id="services">
            <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-14 gap-6">
                    <div>
                        <span
                            class="text-xs font-mono uppercase tracking-widest text-primary-fixed bg-primary-fixed/10 border border-primary-fixed/30 px-3.5 py-1 rounded-full">আমাদের
                            সার্ভিসসমূহ</span>
                        <h2 class="font-heading text-2xl sm:text-4xl font-extrabold text-white mt-4">আপনার ব্যবসাকে অনলাইনে
                            এগিয়ে নিতে আমাদের সার্ভিসসমূহ</h2>
                        <p class="text-slate-300 max-w-md text-sm sm:text-base">আপনার ব্যবসার লক্ষ্য বুঝে উপযুক্ত ওয়েবসাইট
                            পরিকল্পনা, ডিজাইন ও তৈরি করতে আমরা সাহায্য করি।</p>
                    </div>
                    <a class="inline-flex items-center gap-1.5 text-primary-fixed hover:text-white text-sm font-semibold transition-colors"
                        href="{{ route('services.index') }}">
                        <span>আমাদের সব সার্ভিস দেখুন</span>
                        <span class="material-symbols-outlined text-[16px]">north_east</span>
                    </a>

                </div>
                @if ($services->isEmpty())
                    <div class="rounded-2xl border border-white/10 bg-[#111722] p-8 text-center text-slate-300">এখনো কোনো
                        সার্ভিস যুক্ত করা হয়নি।</div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach ($services as $service)
                            @php
                                $serviceImage =
                                    $service->getFirstMediaUrl('service-image') ?:
                                    $serviceImages[$service->slug] ?? asset('assets/frontend/images/brand-graphic.jpg');
                                $serviceIcon = $serviceIcons[$service->slug] ?? 'language';
                                $features = collect($service->features ?? [])
                                    ->pluck('title')
                                    ->filter()
                                    ->take(2);
                            @endphp
                            <div
                                class="rounded-2xl bg-[#111722] border border-white/10 hover:border-primary-fixed/50 p-6 flex flex-col justify-between shadow-xl hover:-translate-y-1.5 transition-all group">
                                <div>
                                    <div
                                        class="w-12 h-12 rounded-xl bg-primary-fixed/10 border border-primary-fixed/30 flex items-center justify-center text-primary-fixed mb-5 group-hover:scale-110 transition-transform">
                                        <span class="material-symbols-outlined text-[26px]">{{ $serviceIcon }}</span>
                                    </div>
                                    <h3
                                        class="font-heading text-xl font-bold text-white mb-2 group-hover:text-primary-fixed transition-colors">
                                        <a href="{{ route('services.show', $service) }}">{{ $service->title }}</a>
                                    </h3>
                                    <p class="text-slate-300 text-sm mb-6 leading-relaxed">
                                        {{ $service->short_description ?: \Illuminate\Support\Str::limit(strip_tags($service->intro ?? ''), 140) ?: 'আপনার ব্যবসার লক্ষ্য অনুযায়ী কাস্টম ডিজাইন ও ডেভেলপমেন্ট।' }}
                                    </p>
                                    <div class="space-y-2 mb-6 text-xs text-slate-300">
                                        @foreach ($features as $feature)
                                            <div class="flex items-center gap-2"><span
                                                    class="material-symbols-outlined text-primary-fixed text-[16px]">check_circle</span>
                                                {{ $feature }}</div>
                                        @endforeach
                                        @if ($features->isEmpty())
                                            <div class="flex items-center gap-2"><span
                                                    class="material-symbols-outlined text-primary-fixed text-[16px]">check_circle</span>
                                                কাস্টম ব্র্যান্ড ডিজাইন</div>
                                            <div class="flex items-center gap-2"><span
                                                    class="material-symbols-outlined text-primary-fixed text-[16px]">check_circle</span>
                                                লাইভ-পরবর্তী সাপোর্ট</div>
                                        @endif
                                    </div>
                                </div>
                                <a class="pt-4 border-t border-white/10 text-primary-fixed font-mono text-sm flex items-center justify-between hover:underline"
                                    href="{{ route('services.show', $service) }}">
                                    <span>বিস্তারিত জানুন</span>
                                    <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>


        {{-- Package Section --}}
        @if ($generalPackages->isNotEmpty())
            <section class="w-full relative py-16 md:py-24" id="packages">
                <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
                    <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-6">
                        <div class="max-w-2xl">
                            <span
                                class="text-xs font-mono uppercase tracking-widest text-primary-fixed bg-primary-fixed/10 border border-primary-fixed/30 px-3.5 py-1 rounded-full">প্যাকেজ
                                ও মূল্য</span>
                            <h2 class="font-heading text-2xl sm:text-4xl font-extrabold text-white mt-4">আমাদের প্যাকেজসমূহ
                            </h2>
                            <p class="text-slate-300 text-sm sm:text-base mt-3">আপনার ব্যবসার প্রয়োজন অনুযায়ী একটি প্যাকেজ
                                বেছে নিন।</p>
                        </div>
                        <a class="inline-flex items-center gap-2 text-primary-fixed hover:text-white text-sm font-semibold transition-colors"
                            href="{{ route('pricing') }}">
                            <span>সব প্যাকেজ দেখুন</span>
                            <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                        </a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 items-stretch">
                        @foreach ($generalPackages as $package)
                            <article
                                class="group relative rounded-2xl p-7 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1.5 {{ $package->is_popular ? 'bg-gradient-to-b from-[#111e15] to-[#0c1510] border-2 border-primary-fixed shadow-[0_0_36px_rgba(197,243,49,0.2)]' : 'bg-[#111722] border border-white/10 hover:border-primary-fixed/40 shadow-xl' }}">
                                @if ($package->is_popular)
                                    <span
                                        class="absolute -top-3.5 left-1/2 -translate-x-1/2 px-4 py-1 bg-primary-fixed text-[#070A0E] text-xs font-mono font-extrabold rounded-full uppercase tracking-wider whitespace-nowrap">জনপ্রিয়
                                        প্যাকেজ</span>
                                @endif
                                <div>
                                    <div class="flex items-center justify-between mb-4 pt-1">
                                        <span
                                            class="text-xs font-mono uppercase tracking-wider {{ $package->is_popular ? 'text-primary-fixed bg-primary-fixed/15 border border-primary-fixed/40' : 'text-slate-300 bg-white/5 border border-white/10' }} px-3 py-1 rounded-md font-bold">{{ $package->name }}</span>
                                        <span
                                            class="material-symbols-outlined {{ $package->is_popular ? 'text-primary-fixed' : 'text-slate-400' }}">{{ $package->is_popular ? 'workspace_premium' : 'rocket_launch' }}</span>
                                    </div>
                                    <h3 class="font-heading text-xl font-bold text-white group-hover:text-primary-fixed transition-colors">{{ $package->name }} প্যাকেজ</h3>
                                    @if ($package->tagline)
                                        <p class="text-sm text-slate-300 mt-1">{{ $package->tagline }}</p>
                                    @endif
                                    <div
                                        class="my-6 p-5 rounded-xl {{ $package->is_popular ? 'bg-[#070e0a] border border-primary-fixed/30' : 'bg-[#070b10] border border-white/5' }}">
                                        <span
                                            class="text-xs uppercase tracking-wider text-slate-400 block font-semibold">প্যাকেজ
                                            মূল্য</span>
                                        <div class="flex items-baseline gap-1 mt-1">
                                            <span
                                                class="text-3xl sm:text-4xl font-extrabold {{ $package->is_popular ? 'text-primary-fixed' : 'text-white' }}">{{ $package->priceAmount() ?: 'যোগাযোগ করুন' }}</span>
                                            <span class="text-xs text-slate-400">/এককালীন</span>
                                        </div>
                                    </div>
                                    @if (!empty($package->features))
                                        <ul
                                            class="flex flex-col gap-3 my-6 text-sm {{ $package->is_popular ? 'text-slate-100' : 'text-slate-200' }}">
                                            @foreach ($package->features as $feature)
                                                <li
                                                    class="flex items-start gap-2.5 {{ !($feature['included'] ?? true) ? 'opacity-50' : '' }}">
                                                    <span
                                                        class="material-symbols-outlined text-[18px] {{ $feature['included'] ?? true ? 'text-primary-fixed' : 'text-slate-500' }} shrink-0 mt-0.5">{{ $feature['included'] ?? true ? 'check_circle' : 'cancel' }}</span>
                                                    <span>{{ $feature['text'] ?? '' }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                                <a class="w-full inline-flex items-center justify-center gap-2 py-3 px-5 rounded-xl {{ $package->is_popular ? 'bg-primary-fixed hover:bg-primary-fixed-dim text-[#070A0E] font-bold' : 'bg-white/10 hover:bg-white/20 text-white font-semibold border border-white/10' }} text-sm transition-all"
                                    href="{{ route('contact') }}?service={{ urlencode('সাধারণ প্যাকেজ') }}&package={{ urlencode($package->name) }}">
                                    <span>এই প্যাকেজটি বেছে নিন</span>
                                    <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                                </a>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        {{-- Latest Projects --}}
        <section class="w-full border-y border-white/10 bg-[#0B0F14]/80 relative py-16 md:py-24" id="portfolio">
            <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-14 gap-6">
                    <div>
                        <span
                            class="text-xs font-mono uppercase tracking-widest text-primary-fixed bg-primary-fixed/10 border border-primary-fixed/30 px-3.5 py-1 rounded-full">নির্বাচিত
                            কাজ</span>
                        <h2 class="font-heading text-2xl sm:text-4xl font-extrabold text-white mt-4">আমাদের তৈরি করা কিছু
                            সাম্প্রতিক ওয়েবসাইট</h2>
                    </div>
                    <a class="inline-flex items-center gap-1.5 text-primary-fixed hover:text-white text-sm font-semibold transition-colors"
                        href="{{ route('portfolio.index') }}">
                        <span>সকল প্রজেক্ট দেখুন</span>
                        <span class="material-symbols-outlined text-[16px]">north_east</span>
                    </a>
                </div>
                @if ($projects->isEmpty())
                    <div class="rounded-2xl border border-white/10 bg-[#111722] p-8 text-center text-slate-300">এখনো কোনো
                        প্রজেক্ট প্রকাশ করা হয়নি।</div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach ($projects as $project)
                            @php
                                $image =
                                    $project->getFirstMediaUrl('project-image') ?:
                                    $projectImages[$loop->index % count($projectImages)];
                            @endphp
                            <div
                                class="rounded-2xl bg-[#111722] border border-white/10 hover:border-primary-fixed/40 overflow-hidden shadow-xl hover:-translate-y-1.5 transition-all group flex flex-col">
                                <div class="relative aspect-square overflow-hidden bg-[#070A0E]">
                                    <img alt="{{ $project->title }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        src="{{ $image }}" />
                                    @if ($project->projectCategory)
                                        <div
                                            class="absolute top-3 left-3 bg-[#0B0F14]/85 backdrop-blur-md px-3 py-1 rounded-full border border-primary-fixed/30 text-primary-fixed text-xs font-mono font-medium">
                                            #{{ $project->projectCategory->name }}</div>
                                    @endif
                                </div>
                                <div class="p-5 flex-1 flex flex-col justify-between">
                                    <div>
                                        <h3
                                            class="font-heading text-base sm:text-lg font-bold text-white mb-1 group-hover:text-primary-fixed transition-colors">
                                            <a href="{{ route('portfolio.show', $project) }}">{{ $project->title }}</a>
                                        </h3>
                                        <p class="text-xs text-slate-300 mb-4">{{ $project->summary }}</p>
                                    </div>
                                    <a class="text-xs text-primary-fixed font-semibold flex items-center gap-1 hover:underline"
                                        href="{{ route('portfolio.show', $project) }}">
                                        <span>প্রজেক্ট দেখুন</span>
                                        <span class="material-symbols-outlined text-[14px]">north_east</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>


        {{-- Why Choose Us --}}
        <section class="w-full relative py-12 md:py-16" id="why-us">
            <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-7">
                        <span
                            class="text-xs font-mono uppercase tracking-widest text-primary-fixed bg-primary-fixed/10 border border-primary-fixed/30 px-3.5 py-1 rounded-full">কেন
                            আমাদের বেছে নেবেন</span>
                        <h2 class="font-heading text-2xl sm:text-4xl font-extrabold text-white mt-4 mb-8">কেন আমাদের সলিউশন বেছে নেবেন?</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach ([['palette', 'ব্র্যান্ড অনুযায়ী ডিজাইন', 'আপনার পরিচিতি, পণ্য ও গ্রাহকের কথা মাথায় রেখে লেআউট তৈরি করি।'], ['speed', 'পরিষ্কার ও ব্যবহারযোগ্য', 'পাতা দ্রুত খুঁজে পাওয়া এবং সহজে ব্যবহার করার দিকে নজর রাখি।'], ['dashboard_customize', 'কনটেন্ট ব্যবস্থাপনা', 'প্রয়োজন থাকলে পণ্য বা লেখা আপডেটের জন্য অ্যাডমিন সুবিধা যোগ করা যায়।'], ['analytics', 'ট্র্যাকিং সেটআপ', 'কাজের পরিধিতে থাকলে প্রয়োজনীয় অ্যানালিটিকস ও ট্র্যাকিং যুক্ত করা যায়।'], ['payments', 'প্রয়োজনমতো সংযোগ', 'পেমেন্ট বা কুরিয়ার সেবা যুক্ত করার সুযোগ নিয়ে কাজ শুরুর আগে আলোচনা করি।'], ['support_agent', 'লঞ্চ-পরবর্তী সহায়তা', 'প্রশিক্ষণ ও সাপোর্টের পরিধি প্রজেক্টের প্রস্তাবে স্পষ্ট করে দিই।']] as [$icon, $title, $text])
                                <div
                                    class="p-5 rounded-xl bg-[#111722] border border-white/10 hover:border-primary-fixed/40 transition-all">
                                    <div class="flex items-center gap-2.5 mb-2">
                                        <span
                                            class="material-symbols-outlined text-primary-fixed text-[22px]">{{ $icon }}</span>
                                        <h3 class="font-heading text-base font-bold text-white">{{ $title }}</h3>
                                    </div>
                                    <p class="text-xs text-slate-300 leading-relaxed">{{ $text }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="lg:col-span-5">
                        <div class="rounded-2xl bg-[#111722] border border-white/15 p-2 shadow-2xl overflow-hidden group">
                            <div class="rounded-xl overflow-hidden relative aspect-square bg-[#070A0E]">
                                <img alt="WhexSoft Brand Graphic"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                    src="{{ asset('assets/frontend/images/brand-graphic.jpg') }}" />
                                <div
                                    class="absolute bottom-3 left-3 right-3 bg-[#0B0F14]/90 backdrop-blur-md p-3 rounded-lg border border-white/10 flex items-center justify-between">
                                    <div>
                                        <p class="text-[11px] text-primary-fixed font-mono font-bold uppercase">ঢাকা
                                            স্টুডিও অফিস</p>
                                        <p class="text-xs text-white font-medium">সরাসরি কথা বলুন: ০১৩৩৫-১৯৮৮৫৯</p>
                                    </div>
                                    <a class="px-3 py-1.5 bg-primary-fixed text-[#070A0E] text-xs font-bold font-mono rounded hover:bg-primary-fixed-dim transition-colors"
                                        href="tel:01335198859">কল দিন</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Why Website Section --}}
        <section class="w-full relative py-12 md:py-16" id="why-website">
            <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
                <div class="text-center max-w-3xl mx-auto mb-14">
                    <span
                        class="text-xs font-mono uppercase tracking-widest text-primary-fixed bg-primary-fixed/10 border border-primary-fixed/30 px-3.5 py-1 rounded-full">নিজস্ব
                        অনলাইন উপস্থিতি</span>
                    <h2 class="font-heading text-2xl sm:text-4xl font-extrabold text-white mt-4 mb-3">কেন সোশ্যাল মিডিয়ার
                        পাশাপাশি নিজের ওয়েবসাইট?</h2>
                    <p class="text-slate-300 text-sm sm:text-base">সোশ্যাল মিডিয়া নতুন মানুষের কাছে পৌঁছাতে সাহায্য করে।
                        ওয়েবসাইটে আপনার পণ্য, সেবা ও অর্ডারের তথ্য গুছিয়ে রাখা যায়।</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-stretch">
                    <div
                        class="rounded-2xl bg-[#111722] border border-red-500/25 p-6 sm:p-8 flex flex-col justify-between shadow-xl">
                        <div>
                            <div class="flex items-center justify-between pb-4 mb-6 border-b border-red-500/20">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-red-500/10 border border-red-500/30 flex items-center justify-center text-red-400">
                                        <span class="material-symbols-outlined text-[22px]">cancel</span></div>
                                    <h3 class="font-heading text-lg sm:text-xl font-bold text-white">শুধু ফেসবুক পেজের
                                        সীমাবদ্ধতা</h3>
                                </div>
                                <span
                                    class="px-2.5 py-1 rounded bg-red-500/15 text-red-300 font-mono text-xs border border-red-500/30">অস্থায়ী
                                    নির্ভরতা</span>
                            </div>
                            <ul class="flex flex-col gap-4">
                                <li class="flex items-start gap-3 text-slate-300 text-sm leading-relaxed"><span
                                        class="material-symbols-outlined text-red-400 text-[18px] shrink-0 mt-0.5">close</span><span><strong
                                            class="text-white font-medium">প্ল্যাটফর্মের ওপর নির্ভরতা:</strong> পোস্ট কত
                                        মানুষের কাছে পৌঁছাবে, তা অনেকটাই প্ল্যাটফর্মের নিয়মের ওপর নির্ভর করে।</span></li>
                                <li class="flex items-start gap-3 text-slate-300 text-sm leading-relaxed"><span
                                        class="material-symbols-outlined text-red-400 text-[18px] shrink-0 mt-0.5">close</span><span><strong
                                            class="text-white font-medium">তথ্য খুঁজে পাওয়া কঠিন:</strong> পণ্য, দাম ও
                                        অর্ডারের তথ্য অনেক পোস্ট বা মেসেজে ছড়িয়ে থাকতে পারে।</span></li>
                                <li class="flex items-start gap-3 text-slate-300 text-sm leading-relaxed"><span
                                        class="material-symbols-outlined text-red-400 text-[18px] shrink-0 mt-0.5">close</span><span><strong
                                            class="text-white font-medium">অর্ডার গুছিয়ে রাখা:</strong> চ্যাটে আসা অর্ডার
                                        আলাদা করে নথিবদ্ধ না করলে পরে খুঁজে পাওয়া কঠিন হতে পারে।</span></li>
                                <li class="flex items-start gap-3 text-slate-300 text-sm leading-relaxed"><span
                                        class="material-symbols-outlined text-red-400 text-[18px] shrink-0 mt-0.5">close</span><span><strong
                                            class="text-white font-medium">সীমিত কাস্টমাইজেশন:</strong> নিজের মতো করে পণ্য
                                        সাজানো বা কেনার ধাপ তৈরি করার সুযোগ সীমিত।</span></li>
                            </ul>
                        </div>
                        <div
                            class="mt-6 p-3 rounded-xl bg-red-950/30 border border-red-500/20 text-xs text-red-200 flex items-center gap-2">
                            <span class="material-symbols-outlined text-[18px] text-red-400">warning</span>
                            <span>অ্যাকাউন্টে সমস্যা হলে সেই প্ল্যাটফর্মে আপনার উপস্থিতি প্রভাবিত হতে পারে।</span>
                        </div>
                    </div>
                    <div
                        class="rounded-2xl bg-[#161F2E] border border-primary-fixed/40 p-6 sm:p-8 flex flex-col justify-between shadow-[0_0_35px_rgba(197,243,49,0.1)] relative">
                        <div>
                            <div class="flex items-center justify-between pb-4 mb-6 border-b border-primary-fixed/25">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-primary-fixed/15 border border-primary-fixed/40 flex items-center justify-center text-primary-fixed shadow-[0_0_15px_rgba(197,243,49,0.3)]">
                                        <span class="material-symbols-outlined text-[22px]">verified</span></div>
                                    <h3 class="font-heading text-lg sm:text-xl font-bold text-white">WhexSoft ওয়েবসাইটের
                                        সুবিধা</h3>
                                </div>
                                <span
                                    class="px-2.5 py-1 rounded bg-primary-fixed text-[#070A0E] font-mono text-xs font-bold shadow-[0_0_10px_rgba(197,243,49,0.3)]">স্থায়ী
                                    সম্পদ</span>
                            </div>
                            <ul class="flex flex-col gap-4">
                                <li class="flex items-start gap-3 text-slate-200 text-sm leading-relaxed"><span
                                        class="material-symbols-outlined text-primary-fixed text-[18px] shrink-0 mt-0.5">check_circle</span><span><strong
                                            class="text-white font-medium">পণ্য ও সেবা সাজিয়ে দেখান:</strong> ক্যাটাগরি,
                                        বিবরণ, দাম ও ছবি এক জায়গায় রাখুন।</span></li>
                                <li class="flex items-start gap-3 text-slate-200 text-sm leading-relaxed"><span
                                        class="material-symbols-outlined text-primary-fixed text-[18px] shrink-0 mt-0.5">check_circle</span><span><strong
                                            class="text-white font-medium">সহজ অর্ডার প্রক্রিয়া:</strong> আপনার ব্যবসার
                                        ধরন অনুযায়ী অর্ডার নেওয়ার ব্যবস্থা তৈরি করুন।</span></li>
                                <li class="flex items-start gap-3 text-slate-200 text-sm leading-relaxed"><span
                                        class="material-symbols-outlined text-primary-fixed text-[18px] shrink-0 mt-0.5">check_circle</span><span><strong
                                            class="text-white font-medium">প্রয়োজনমতো ইন্টিগ্রেশন:</strong> পেমেন্ট,
                                        কুরিয়ার বা অ্যানালিটিকস সংযোগ কাজের পরিধি অনুযায়ী ঠিক করা যায়।</span></li>
                                <li class="flex items-start gap-3 text-slate-200 text-sm leading-relaxed"><span
                                        class="material-symbols-outlined text-primary-fixed text-[18px] shrink-0 mt-0.5">check_circle</span><span><strong
                                            class="text-white font-medium">নিজস্ব ডোমেইনে উপস্থিতি:</strong> আপনার
                                        ব্র্যান্ডের জন্য একটি নির্দিষ্ট ঠিকানায় তথ্য ও সেবা তুলে ধরুন।</span></li>
                            </ul>
                        </div>
                        <div
                            class="mt-6 p-3 rounded-xl bg-primary-fixed/10 border border-primary-fixed/30 text-xs text-slate-200 flex items-center justify-between">
                            <span class="flex items-center gap-1.5 font-semibold text-primary-fixed"><span
                                    class="material-symbols-outlined text-[18px]">verified_user</span><span>কাজের পরিধি ও
                                    খরচ আগে থেকেই স্পষ্ট</span></span>
                            <a class="text-white underline hover:text-primary-fixed font-medium"
                                href="#consultation">বিস্তারিত জানুন →</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        {{-- Work Process --}}
        {{-- <section class="w-full relative py-12 md:py-16" id="process">
        <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="text-xs font-mono uppercase tracking-widest text-primary-fixed bg-primary-fixed/10 border border-primary-fixed/30 px-3.5 py-1 rounded-full">কাজের পদ্ধতি</span>
                <h2 class="font-heading text-2xl sm:text-4xl font-extrabold text-white mt-4 mb-2">সহজ ৫টি ধাপে আপনার ওয়েবসাইট</h2>
                <p class="text-slate-300 text-sm sm:text-base">প্রতিটি প্রজেক্টে কাজের পরিধি ও সময়সূচি আগে ঠিক করে ধাপে ধাপে এগোই।</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4">
                @foreach ([['প্ল্যানিং', 'ব্যবসায়িক লক্ষ্য ও দর্শক বিশ্লেষণ করে আর্কিটেকচার তৈরি।'], ['কাস্টম ডিজাইন', 'আপনার ব্র্যান্ড ও গ্রাহকের প্রয়োজন অনুযায়ী ইন্টারফেস তৈরি।'], ['ডেভেলপমেন্ট', 'সম্মত ফিচার ও প্রয়োজনীয় সংযোগগুলো তৈরি করা।'], ['টেস্টিং ও লঞ্চ', 'সাইট পরীক্ষা করে আপনার ডোমেইনে প্রকাশের প্রস্তুতি।'], ['হস্তান্তর ও সহায়তা', 'ব্যবহারবিধি বুঝিয়ে দেওয়া এবং সম্মত সাপোর্ট দেওয়া।']] as [$title, $text])
                    <div class="p-5 rounded-2xl {{ $loop->last ? 'bg-[#161F2E] border border-primary-fixed/40 shadow-[0_0_20px_rgba(197,243,49,0.15)]' : 'bg-[#111722] border border-white/10' }} text-center flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full {{ $loop->last ? 'bg-primary-fixed text-[#070A0E] shadow-[0_0_10px_rgba(197,243,49,0.4)]' : 'bg-white/5 text-primary-fixed border border-primary-fixed/30' }} font-mono text-base font-bold flex items-center justify-center mb-3">{{ $loop->iteration }}</div>
                        <h3 class="font-heading text-base font-bold {{ $loop->last ? 'text-primary-fixed' : 'text-white' }} mb-1">{{ $title }}</h3>
                        <p class="text-xs {{ $loop->last ? 'text-slate-200' : 'text-slate-300' }}">{{ $text }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}

        {{-- Testimonials --}}
        @if ($testimonials->isNotEmpty())
            <section class="w-full border-y border-white/10 bg-[#0B0F14]/70 relative py-16 md:py-24" id="testimonials">
                <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
                    <div class="text-center max-w-2xl mx-auto mb-14">
                        <span
                            class="text-xs font-mono uppercase tracking-widest text-primary-fixed bg-primary-fixed/10 border border-primary-fixed/30 px-3.5 py-1 rounded-full">ক্লায়েন্ট
                            রিভিউ</span>
                        <h2 class="font-heading text-2xl sm:text-4xl font-extrabold text-white mt-4">যা বলছেন আমাদের
                            ক্লায়েন্টরা</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach ($testimonials->take(3) as $testimonial)
                            <figure
                                class="group rounded-2xl bg-[#111722] border border-white/10 hover:border-primary-fixed/40 p-6 flex flex-col justify-between shadow-xl transition-colors">
                                <div>
                                    <p class="text-xs text-primary-fixed mb-4">ক্লায়েন্টের অভিজ্ঞতা</p>
                                    <blockquote class="text-slate-200 text-sm leading-relaxed">
                                        {{ \Illuminate\Support\Str::limit($testimonial->quote, 220) }}</blockquote>
                                </div>
                                <figcaption class="flex items-center gap-3 mt-6 pt-4 border-t border-white/10">
                                    <div
                                        class="w-10 h-10 rounded-full bg-primary-fixed/15 border border-primary-fixed/30 text-primary-fixed font-heading font-bold flex items-center justify-center">
                                        {{ mb_substr($testimonial->client_name, 0, 1) }}</div>
                                    <div>
                                            <p class="text-sm font-semibold text-white group-hover:text-primary-fixed transition-colors">{{ $testimonial->client_name }}</p>
                                        <p class="text-xs text-slate-400">{{ $testimonial->business_name }}</p>
                                    </div>
                                </figcaption>
                            </figure>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <section class="w-full border-t border-white/10 bg-[#0B0F14]/70 relative py-16 md:py-24" id="blog">
            <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
                <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-12">
                    <div>
                        <span class="text-xs font-mono text-primary-fixed font-semibold tracking-widest uppercase">আমাদের
                            ব্লগ</span>
                        <h2 class="font-heading text-3xl md:text-4xl font-bold text-white tracking-tight mt-3">ওয়েব ও
                            ডিজিটাল গ্রোথ নিয়ে সর্বশেষ লেখা</h2>
                    </div>
                    <a class="inline-flex items-center gap-2 text-primary-fixed font-semibold hover:gap-3 transition-all"
                        href="{{ route('blog.index') }}">
                        <span>সব ব্লগ দেখুন</span>
                        <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
                    </a>
                </div>
                @if ($posts->isEmpty())
                    <div class="rounded-2xl border border-white/10 bg-[#111722] p-8 text-center text-slate-300">এখনো কোনো
                        লেখা প্রকাশ করা হয়নি।</div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($posts as $post)
                            @php
                                $image =
                                    $post->getFirstMediaUrl('featured-image') ?:
                                    ($post->featured_image ?:
                                    $blogImages[$loop->index % count($blogImages)]);
                            @endphp
                            <article
                                class="flex flex-col bg-surface-card border border-border-subtle hover:border-primary-fixed/40 rounded-2xl overflow-hidden shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                                <div class="relative w-full aspect-[16/10] bg-surface-default overflow-hidden">
                                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        alt="{{ $post->title }}" src="{{ $image }}" />
                                    @if ($post->category)
                                        <div class="absolute top-4 left-4 z-10">
                                            <span
                                                class="px-3 py-1 rounded-full bg-surface-card-elevated/90 backdrop-blur-md text-primary-container font-label-md text-label-md shadow-sm">{{ $post->category }}</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-space-lg flex flex-col flex-1 justify-between">
                                    <div>
                                        <a class="block group-hover:text-primary-container transition-colors"
                                            href="{{ route('blog.show', $post) }}">
                                            <h4
                                                class="font-headline-sm text-headline-sm text-primary tracking-tight mb-space-xs leading-snug">
                                                {{ $post->title }}</h4>
                                        </a>
                                        <p
                                            class="font-body-sm text-body-sm text-text-secondary leading-relaxed mb-space-md">
                                            {{ \Illuminate\Support\Str::limit($post->excerpt ?: strip_tags($post->content), 140) }}
                                        </p>
                                    </div>
                                    <div
                                        class="pt-space-sm flex items-center justify-between font-caption text-caption text-text-muted">
                                        <span class="flex items-center gap-1"><span
                                                class="material-symbols-outlined text-[16px]">schedule</span>
                                            {{ $post->read_time }} মিনিট রিড</span>
                                        <span>{{ optional($post->published_at)->format('d M Y') }}</span>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>

        <section
            class="w-full border-t border-white/10 bg-gradient-to-b from-[#0B0F14] to-[#070A0E] relative py-16 md:py-24"
            id="consultation">
            <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
                <div class="rounded-3xl bg-[#111722] border border-white/15 p-8 sm:p-12 shadow-2xl">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                        <div class="lg:col-span-7 flex flex-col items-start">
                            <div
                                class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary-fixed/15 border border-primary-fixed/30 text-primary-fixed text-xs font-mono font-semibold mb-4">
                                <span class="w-2 h-2 rounded-full bg-primary-fixed animate-ping"></span>
                                <span>প্রজেক্ট আলোচনা শুরু করুন</span>
                            </div>
                            <h2 class="font-heading text-2xl sm:text-4xl font-extrabold text-white mb-4 leading-tight">
                                আপনার স্বপ্নের ওয়েবসাইট তৈরি শুরু করুন আজই</h2>
                            <p class="text-slate-300 text-sm sm:text-base mb-8 leading-relaxed">আপনার প্রজেক্টের বিবরণ
                                পাঠান। কাজের পরিধি বুঝে আমরা সম্ভাব্য সমাধান ও খরচ জানাব।</p>
                            <div class="flex flex-wrap items-center gap-4 mb-8">
                                <a class="px-6 py-3.5 rounded-full bg-primary-fixed text-[#070A0E] font-heading text-sm font-bold shadow-[0_0_20px_rgba(197,243,49,0.3)] hover:bg-primary-fixed-dim hover:scale-105 transition-all flex items-center gap-2"
                                    href="tel:01335198859">
                                    <span class="material-symbols-outlined text-[20px]">call</span>
                                    <span>কল করুন: ০১৩৩৫-১৯৮৮৫৯</span>
                                </a>
                                <a class="px-6 py-3.5 rounded-full bg-[#25D366] hover:bg-[#20ba5a] text-[#070A0E] font-heading text-sm font-bold shadow-[0_0_20px_rgba(37,211,102,0.3)] hover:scale-105 transition-all flex items-center gap-2"
                                    href="https://wa.me/8801335198859" rel="noopener noreferrer" target="_blank">
                                    <span class="material-symbols-outlined text-[20px]">chat</span>
                                    <span>হোয়াটসঅ্যাপে মেসেজ দিন</span>
                                </a>
                            </div>
                            <div class="flex items-center gap-2 text-slate-400 text-xs font-medium">
                                <span class="material-symbols-outlined text-[18px] text-primary-fixed">location_on</span>
                                <span>স্টুডিও অফিস: সোনির আখড়া, যাত্রাবাড়ী, ঢাকা-১২৩৬</span>
                            </div>
                        </div>
                        <div class="lg:col-span-5 bg-[#0B0F14] p-6 sm:p-8 rounded-2xl border border-white/10 shadow-xl">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="font-heading text-lg font-bold text-white">প্রজেক্ট নিয়ে কথা বলুন</h3>
                                <span class="w-2.5 h-2.5 rounded-full bg-primary-fixed animate-ping"></span>
                            </div>
                            <p class="text-xs text-slate-400 mb-6">তথ্য পাঠালে আমরা প্রজেক্টের বিবরণ দেখে কর্মদিবসে যোগাযোগ
                                করব।</p>
                            <form class="flex flex-col gap-4" action="{{ route('contact.store') }}" method="POST">
                                @csrf
                                <div>
                                    <label class="block text-xs text-slate-300 font-medium mb-1.5" for="home-name">আপনার
                                        নাম *</label>
                                    <input
                                        class="w-full px-4 py-2.5 rounded-xl bg-[#182029] text-white placeholder-slate-400 border border-white/15 focus:outline-none focus:border-primary-fixed text-sm transition-colors"
                                        id="home-name" name="name" value="{{ old('name') }}"
                                        placeholder="উদাঃ সাকিব আহমেদ" required type="text" />
                                    @error('name')
                                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-xs text-slate-300 font-medium mb-1.5" for="home-phone">মোবাইল
                                        নম্বর *</label>
                                    <input
                                        class="w-full px-4 py-2.5 rounded-xl bg-[#182029] text-white placeholder-slate-400 border border-white/15 focus:outline-none focus:border-primary-fixed text-sm transition-colors"
                                        id="home-phone" name="phone" value="{{ old('phone') }}"
                                        placeholder="০১XXXXXXXXX" required type="tel" />
                                    @error('phone')
                                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-xs text-slate-300 font-medium mb-1.5"
                                        for="home-service">ওয়েবসাইটের ধরন</label>
                                    <select
                                        class="w-full px-4 py-2.5 rounded-xl bg-[#182029] text-white border border-white/15 focus:outline-none focus:border-primary-fixed text-sm transition-colors"
                                        id="home-service" name="service_type">
                                        @foreach ($services as $service)
                                            <option class="bg-[#182029]" value="{{ $service->title }}"
                                                @selected(old('service_type') === $service->title)>{{ $service->title }}</option>
                                        @endforeach
                                        <option class="bg-[#182029]" value="কাস্টম ওয়েব অ্যাপ্লিকেশন"
                                            @selected(old('service_type') === 'কাস্টম ওয়েব অ্যাপ্লিকেশন')>কাস্টম ওয়েব অ্যাপ্লিকেশন</option>
                                    </select>
                                </div>
                                <button
                                    class="w-full mt-2 py-3.5 rounded-xl bg-primary-fixed text-[#070A0E] text-sm font-bold font-heading hover:bg-primary-fixed-dim transition-all shadow-[0_0_15px_rgba(197,243,49,0.3)] flex items-center justify-center gap-1.5"
                                    type="submit">
                                    <span>অনুরোধ পাঠান</span>
                                    <span class="material-symbols-outlined text-[18px]">send</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
