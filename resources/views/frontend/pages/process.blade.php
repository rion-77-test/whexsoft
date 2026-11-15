@extends('frontend.layouts.app')

@section('title', 'কাজের ধাপ | WhexSoft')
@section('description', 'প্রাথমিক আলোচনা, পরিকল্পনা, ডিজাইন, ডেভেলপমেন্ট ও লঞ্চ—WhexSoft-এর সঙ্গে একটি প্রজেক্ট কীভাবে এগোয় জানুন।')
@section('page', 'process')

@section('content')
<main class="w-full relative overflow-x-clip pt-20"><div class="w-full bg-surface-default/80 backdrop-blur-md sticky top-20 z-30 shadow-md">
<div class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-10 py-3 flex items-center sm:justify-between gap-4 overflow-x-auto text-xs font-label-md scroll-row">
<div class="hidden md:flex items-center gap-2 text-primary-fixed shrink-0">
<span class="w-2 h-2 rounded-full bg-primary-fixed animate-ping"></span>
<span class="font-headline-sm uppercase tracking-wider text-[11px]">ওয়ার্কফ্লো অগ্রগতি</span>
</div>
<div class="flex items-center gap-6 shrink-0 text-text-secondary">
<a class="flex items-center gap-1.5 hover:text-primary-fixed transition-colors" href="#step-1">
<span class="w-5 h-5 rounded-full bg-surface-container flex items-center justify-center text-[10px] text-primary-fixed font-bold">১</span>
<span>আলোচনা</span>
</a>
<span class="text-text-muted">/</span>
<a class="flex items-center gap-1.5 hover:text-primary-fixed transition-colors" href="#step-2">
<span class="w-5 h-5 rounded-full bg-surface-container flex items-center justify-center text-[10px] text-primary-fixed font-bold">২</span>
<span>ডিজাইন</span>
</a>
<span class="text-text-muted">/</span>
<a class="flex items-center gap-1.5 hover:text-primary-fixed transition-colors" href="#step-3">
<span class="w-5 h-5 rounded-full bg-surface-container flex items-center justify-center text-[10px] text-primary-fixed font-bold">৩</span>
<span>ডেভেলপমেন্ট</span>
</a>
<span class="text-text-muted">/</span>
<a class="flex items-center gap-1.5 hover:text-primary-fixed transition-colors" href="#step-4">
<span class="w-5 h-5 rounded-full bg-surface-container flex items-center justify-center text-[10px] text-primary-fixed font-bold">৪</span>
<span>টেস্টিং ও লঞ্চ</span>
</a>
<span class="text-text-muted">/</span>
<a class="flex items-center gap-1.5 hover:text-primary-fixed transition-colors" href="#step-5">
<span class="w-5 h-5 rounded-full bg-surface-container flex items-center justify-center text-[10px] text-primary-fixed font-bold">৫</span>
<span>সাপোর্ট ও বৃদ্ধি</span>
</a>
</div>
<div class="hidden lg:flex items-center gap-2 text-primary-fixed shrink-0">
<span class="material-symbols-outlined text-[16px]">verified</span>
<span>সময়সূচি প্রজেক্টের পরিধি অনুযায়ী</span>
</div>
</div>
</div><section class="relative w-full overflow-hidden pt-12 md:pt-16 pb-12 md:pb-16">
<div class="max-w-7xl mx-auto relative z-10 flex flex-col items-center text-center w-full px-5 sm:px-8 lg:px-10">
<div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-surface-card-elevated shadow-lg mb-6">
<span class="text-primary-fixed text-sm">⚡</span>
<span class="text-primary-fixed font-label-md text-xs font-semibold tracking-wider uppercase">কাজের ধাপগুলো এক নজরে</span>
</div>
<h1 class="font-display-xl text-display-xl max-w-4xl text-text-primary tracking-tight mb-6">
        <span class="text-primary-fixed">৫টি ধাপে</span> পরিকল্পনা থেকে ওয়েবসাইট লঞ্চ
      </h1>
<p class="font-body-lg text-body-lg text-text-secondary max-w-2xl leading-relaxed mb-10">
        প্রথম আলোচনা থেকে লঞ্চ পর্যন্ত প্রতিটি ধাপে কী হবে, তা আগে থেকেই জানিয়ে আমরা আপনার সঙ্গে সমন্বয় করে কাজ করি।
      </p>
<div class="grid grid-cols-2 sm:grid-cols-4 gap-4 w-full max-w-3xl">
<div class="bg-surface-card p-4 rounded-xl shadow-md flex items-center gap-3">
<span class="material-symbols-outlined text-primary-fixed text-2xl">timer</span>
<div class="text-left">
<div class="font-headline-sm text-sm text-text-primary">পরিষ্কার সময়সূচি</div>
<div class="font-caption text-caption text-text-muted">কাজের পরিধি অনুযায়ী</div>
</div>
</div>
<div class="bg-surface-card p-4 rounded-xl shadow-md flex items-center gap-3">
<span class="material-symbols-outlined text-primary-fixed text-2xl">check_circle</span>
<div class="text-left">
<div class="font-headline-sm text-sm text-text-primary">ধাপে ধাপে পর্যালোচনা</div>
<div class="font-caption text-caption text-text-muted">আপনার মতামতসহ</div>
</div>
</div>
<div class="bg-surface-card p-4 rounded-xl shadow-md flex items-center gap-3">
<span class="material-symbols-outlined text-primary-fixed text-2xl">terminal</span>
<div class="text-left">
<div class="font-headline-sm text-sm text-text-primary">কাজের শর্ত লিখিত</div>
<div class="font-caption text-caption text-text-muted">শুরু করার আগেই</div>
</div>
</div>
<div class="bg-surface-card p-4 rounded-xl shadow-md flex items-center gap-3">
<span class="material-symbols-outlined text-primary-fixed text-2xl">headset_mic</span>
<div class="text-left">
<div class="font-headline-sm text-sm text-text-primary">লঞ্চ-পরবর্তী সহায়তা</div>
<div class="font-caption text-caption text-text-muted">প্রস্তাবে যেমন উল্লেখ থাকে</div>
</div>
</div>
</div>
</div>
</section><section class="w-full relative py-12 md:py-16">
<div class="max-w-7xl mx-auto flex flex-col gap-12 w-full relative px-5 sm:px-8 lg:px-10">
<div class="relative group bg-surface-card rounded-2xl p-6 sm:p-10 shadow-xl transition-all duration-300 hover:bg-surface-card-elevated" id="step-1">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
<div class="lg:col-span-7 flex flex-col gap-5">
<div class="flex items-center gap-4">
<span class="px-3.5 py-1 rounded-full bg-primary-fixed text-text-inverse font-label-lg font-bold text-xs uppercase tracking-wider">
                ধাপ ০১
              </span>
<span class="px-3 py-1 rounded-full bg-surface-container text-primary-fixed font-label-md text-xs flex items-center gap-1.5">
<span class="material-symbols-outlined text-[15px]">schedule</span> ধাপ: প্রাথমিক আলোচনা
              </span>
</div>
<h2 class="font-headline-lg text-headline-lg text-text-primary">
              আলোচনা ও পরিকল্পনা <span class="font-title-md text-text-secondary block text-lg font-normal mt-1">(Discussion &amp; Requirement Gathering)</span>
</h2>
<p class="font-body-md text-body-md text-text-secondary leading-relaxed">
              প্রথমে আপনার ব্যবসা, গ্রাহক ও ওয়েবসাইট থেকে কী চান—সেসব নিয়ে কথা বলি। এই আলোচনা থেকেই কাজের লক্ষ্য ও অগ্রাধিকার ঠিক হয়।
            </p>
<ul class="flex flex-col gap-3 font-body-sm text-body-sm text-on-surface">
<li class="flex items-start gap-3 bg-surface-container/60 p-3 rounded-lg">
<span class="material-symbols-outlined text-primary-fixed text-[20px] shrink-0 mt-0.5">analytics</span>
<span>আপনার ব্যবসা, গ্রাহক ও প্রয়োজনীয় তথ্য বোঝা।</span>
</li>
<li class="flex items-start gap-3 bg-surface-container/60 p-3 rounded-lg">
<span class="material-symbols-outlined text-primary-fixed text-[20px] shrink-0 mt-0.5">account_tree</span>
<span>পেজের কাঠামো ও দরকারি ফিচারের তালিকা তৈরি করা।</span>
</li>
<li class="flex items-start gap-3 bg-surface-container/60 p-3 rounded-lg">
<span class="material-symbols-outlined text-primary-fixed text-[20px] shrink-0 mt-0.5">price_check</span>
<span>কাজের পরিধি, বাজেট ও বাস্তবসম্মত সময়সূচি ঠিক করা।</span>
</li>
</ul>
</div>
<div class="lg:col-span-5 flex flex-col justify-center">
<div class="relative overflow-hidden rounded-xl bg-surface-default p-2 shadow-2xl">
<img class="w-full h-64 sm:h-72 object-cover rounded-lg" data-alt="High tech digital agency planning phase with blueprint wireframes on luminous tablet and laptop screens showing sales funnel data with neon lime accents in a dark obsidian studio environment" src="{{ asset('assets/frontend/images/process-1.jpg') }}"/>
<div class="absolute bottom-4 left-4 right-4 bg-surface-card/90 backdrop-blur-md p-3.5 rounded-lg flex items-center justify-between">
<div>
<div class="text-xs text-text-muted font-label-md">ফলাফল ও ডেলিভারেবল</div>
<div class="text-sm font-semibold text-text-primary">প্রজেক্ট ব্লুপ্রিন্ট ও টেক রিকয়ারমেন্ট ডকুমেন্টস</div>
</div>
<span class="material-symbols-outlined text-primary-fixed text-2xl">task_alt</span>
</div>
</div>
</div>
</div>
</div>
<div class="relative group bg-surface-card rounded-2xl p-6 sm:p-10 shadow-xl transition-all duration-300 hover:bg-surface-card-elevated" id="step-2">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
<div class="lg:col-span-5 order-2 lg:order-1 flex flex-col justify-center">
<div class="relative overflow-hidden rounded-xl bg-surface-default p-2 shadow-2xl">
<img class="w-full h-64 sm:h-72 object-cover rounded-lg" data-alt="Dark aesthetic web design mockup with neon lime visual identity displayed on high end MacBook laptop and mobile responsive preview screen with clean typography and modern components" src="{{ asset('assets/frontend/images/process-2.jpg') }}"/>
<div class="absolute bottom-4 left-4 right-4 bg-surface-card/90 backdrop-blur-md p-3.5 rounded-lg flex items-center justify-between">
<div>
<div class="text-xs text-text-muted font-label-md">ফলাফল ও ডেলিভারেবল</div>
<div class="text-sm font-semibold text-text-primary">ইন্টারেক্টিভ হাই-ফিডেলিটি মকআপ ও ডিজাইন সিস্টেম</div>
</div>
<span class="material-symbols-outlined text-primary-fixed text-2xl">palette</span>
</div>
</div>
</div>
<div class="lg:col-span-7 order-1 lg:order-2 flex flex-col gap-5">
<div class="flex items-center gap-4">
<span class="px-3.5 py-1 rounded-full bg-primary-fixed text-text-inverse font-label-lg font-bold text-xs uppercase tracking-wider">
                ধাপ ০২
              </span>
<span class="px-3 py-1 rounded-full bg-surface-container text-primary-fixed font-label-md text-xs flex items-center gap-1.5">
<span class="material-symbols-outlined text-[15px]">schedule</span> ধাপ: ডিজাইন পর্যালোচনা
              </span>
</div>
<h2 class="font-headline-lg text-headline-lg text-text-primary">
              ব্র্যান্ডেড UI/UX ডিজাইন <span class="font-title-md text-text-secondary block text-lg font-normal mt-1">(Custom Design &amp; Approval)</span>
</h2>
<p class="font-body-md text-body-md text-text-secondary leading-relaxed">
              আপনার ব্র্যান্ড, কনটেন্ট ও গ্রাহকের প্রয়োজন অনুযায়ী পেজের লেআউট তৈরি করি। কাজ এগোনোর আগে ডিজাইনটি আপনার সঙ্গে পর্যালোচনা করি।
            </p>
<ul class="flex flex-col gap-3 font-body-sm text-body-sm text-on-surface">
<li class="flex items-start gap-3 bg-surface-container/60 p-3 rounded-lg">
<span class="material-symbols-outlined text-primary-fixed text-[20px] shrink-0 mt-0.5">draw</span>
<span>লোগো, রং ও কনটেন্টের সঙ্গে মানানসই ডিজাইন তৈরি।</span>
</li>
<li class="flex items-start gap-3 bg-surface-container/60 p-3 rounded-lg">
<span class="material-symbols-outlined text-primary-fixed text-[20px] shrink-0 mt-0.5">devices</span>
<span>মোবাইল, ট্যাবলেট ও কম্পিউটারের জন্য লেআউট পর্যালোচনা।</span>
</li>
<li class="flex items-start gap-3 bg-surface-container/60 p-3 rounded-lg">
<span class="material-symbols-outlined text-primary-fixed text-[20px] shrink-0 mt-0.5">thumb_up</span>
<span>আপনার মতামত নিয়ে ডিজাইনের প্রয়োজনীয় সংশোধন ও অনুমোদন।</span>
</li>
</ul>
</div>
</div>
</div>
<div class="relative group bg-surface-card rounded-2xl p-6 sm:p-10 shadow-xl transition-all duration-300 hover:bg-surface-card-elevated" id="step-3">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
<div class="lg:col-span-7 flex flex-col gap-5">
<div class="flex items-center gap-4">
<span class="px-3.5 py-1 rounded-full bg-primary-fixed text-text-inverse font-label-lg font-bold text-xs uppercase tracking-wider">
                ধাপ ০৩
              </span>
<span class="px-3 py-1 rounded-full bg-surface-container text-primary-fixed font-label-md text-xs flex items-center gap-1.5">
<span class="material-symbols-outlined text-[15px]">schedule</span> ধাপ: অনুমোদনের পর
              </span>
</div>
<h2 class="font-headline-lg text-headline-lg text-text-primary">
              হাই-পারফরম্যান্স ডেভেলপমেন্ট <span class="font-title-md text-text-secondary block text-lg font-normal mt-1">(Clean Coding &amp; Integrations)</span>
</h2>
<p class="font-body-md text-body-md text-text-secondary leading-relaxed">
              অনুমোদিত ডিজাইন ও ফিচার অনুযায়ী সাইট তৈরি করি। কাজের ধরন অনুযায়ী প্রয়োজনীয় প্রযুক্তি ও সংযোগ নির্বাচন করা হয়।
            </p>
<ul class="flex flex-col gap-3 font-body-sm text-body-sm text-on-surface">
<li class="flex items-start gap-3 bg-surface-container/60 p-3 rounded-lg">
<span class="material-symbols-outlined text-primary-fixed text-[20px] shrink-0 mt-0.5">speed</span>
<span>পরিষ্কার কোড ও পেজের গতি নিয়ে কাজ করা।</span>
</li>
<li class="flex items-start gap-3 bg-surface-container/60 p-3 rounded-lg">
<span class="material-symbols-outlined text-primary-fixed text-[20px] shrink-0 mt-0.5">payments</span>
<span>প্রয়োজন থাকলে পেমেন্ট পদ্ধতি ও অর্ডার প্রক্রিয়া যুক্ত করা।</span>
</li>
<li class="flex items-start gap-3 bg-surface-container/60 p-3 rounded-lg">
<span class="material-symbols-outlined text-primary-fixed text-[20px] shrink-0 mt-0.5">local_shipping</span>
<span>সম্মত কাজের পরিধি অনুযায়ী কুরিয়ার বা অ্যানালিটিকস সংযোগ করা।</span>
</li>
</ul>
</div>
<div class="lg:col-span-5 flex flex-col justify-center">
<div class="relative overflow-hidden rounded-xl bg-surface-default p-2 shadow-2xl">
<img class="w-full h-64 sm:h-72 object-cover rounded-lg" data-alt="Futuristic software development code screen displaying lightning speed benchmarks, automated payment gateway webhook integration, and clean server side logic with lime glowing metrics" src="{{ asset('assets/frontend/images/process-3.jpg') }}"/>
<div class="absolute bottom-4 left-4 right-4 bg-surface-card/90 backdrop-blur-md p-3.5 rounded-lg flex items-center justify-between">
<div>
<div class="text-xs text-text-muted font-label-md">ফলাফল ও ডেলিভারেবল</div>
<div class="text-sm font-semibold text-text-primary">পূর্ণাঙ্গ কার্যকরী ইঞ্জিন ও পেমেন্ট-কুরিয়ার এপিআই</div>
</div>
<span class="material-symbols-outlined text-primary-fixed text-2xl">code</span>
</div>
</div>
</div>
</div>
</div>
<div class="relative group bg-surface-card rounded-2xl p-6 sm:p-10 shadow-xl transition-all duration-300 hover:bg-surface-card-elevated" id="step-4">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
<div class="lg:col-span-5 order-2 lg:order-1 flex flex-col justify-center">
<div class="relative overflow-hidden rounded-xl bg-surface-default p-2 shadow-2xl">
<img class="w-full h-64 sm:h-72 object-cover rounded-lg" data-alt="Quality assurance testing station showing multiscreen device lab testing live website responsive display on phones tablets and laptops with green checkmarks and server deployment status" src="{{ asset('assets/frontend/images/process-4.jpg') }}"/>
<div class="absolute bottom-4 left-4 right-4 bg-surface-card/90 backdrop-blur-md p-3.5 rounded-lg flex items-center justify-between">
<div>
<div class="text-xs text-text-muted font-label-md">ফলাফল ও ডেলিভারেবল</div>
<div class="text-sm font-semibold text-text-primary">পরীক্ষা করা সাইট ও ডোমেইন সেটআপ</div>
</div>
<span class="material-symbols-outlined text-primary-fixed text-2xl">rocket_launch</span>
</div>
</div>
</div>
<div class="lg:col-span-7 order-1 lg:order-2 flex flex-col gap-5">
<div class="flex items-center gap-4">
<span class="px-3.5 py-1 rounded-full bg-primary-fixed text-text-inverse font-label-lg font-bold text-xs uppercase tracking-wider">
                ধাপ ০৪
              </span>
<span class="px-3 py-1 rounded-full bg-surface-container text-primary-fixed font-label-md text-xs flex items-center gap-1.5">
<span class="material-symbols-outlined text-[15px]">schedule</span> ধাপ: লঞ্চের আগে
              </span>
</div>
<h2 class="font-headline-lg text-headline-lg text-text-primary">
              পুঙ্খানুপুঙ্খ টেস্টিং ও লাইভ লঞ্চ <span class="font-title-md text-text-secondary block text-lg font-normal mt-1">(Testing &amp; Deployment)</span>
</h2>
<p class="font-body-md text-body-md text-text-secondary leading-relaxed">
              প্রকাশের আগে প্রধান পেজ, ফর্ম ও সম্মত ফিচারগুলো পরীক্ষা করি। পরে আপনার ডোমেইনে সাইট প্রকাশের প্রস্তুতি নেওয়া হয়।
            </p>
<ul class="flex flex-col gap-3 font-body-sm text-body-sm text-on-surface">
<li class="flex items-start gap-3 bg-surface-container/60 p-3 rounded-lg">
<span class="material-symbols-outlined text-primary-fixed text-[20px] shrink-0 mt-0.5">fact_check</span>
<span>বিভিন্ন স্ক্রিনে লেআউট ও প্রধান ব্যবহার-ধাপ পরীক্ষা।</span>
</li>
<li class="flex items-start gap-3 bg-surface-container/60 p-3 rounded-lg">
<span class="material-symbols-outlined text-primary-fixed text-[20px] shrink-0 mt-0.5">lock</span>
<span>প্রজেক্টের প্রস্তাবে থাকলে SSL ও প্রয়োজনীয় নিরাপত্তা সেটআপ।</span>
</li>
<li class="flex items-start gap-3 bg-surface-container/60 p-3 rounded-lg">
<span class="material-symbols-outlined text-primary-fixed text-[20px] shrink-0 mt-0.5">public</span>
<span>সম্মত ডোমেইন ও হোস্টিংয়ে সাইট প্রকাশ করা।</span>
</li>
</ul>
</div>
</div>
</div>
<div class="relative group bg-surface-card rounded-2xl p-6 sm:p-10 shadow-xl transition-all duration-300 hover:bg-surface-card-elevated" id="step-5">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
<div class="lg:col-span-7 flex flex-col gap-5">
<div class="flex items-center gap-4">
<span class="px-3.5 py-1 rounded-full bg-primary-fixed text-text-inverse font-label-lg font-bold text-xs uppercase tracking-wider">
                ধাপ ০৫
              </span>
<span class="px-3 py-1 rounded-full bg-surface-container text-primary-fixed font-label-md text-xs flex items-center gap-1.5">
<span class="material-symbols-outlined text-[15px]">all_inclusive</span> সময়কাল: প্যাকেজ অনুযায়ী
              </span>
</div>
<h2 class="font-headline-lg text-headline-lg text-text-primary">
              হস্তান্তর ও পরবর্তী সহায়তা <span class="font-title-md text-text-secondary block text-lg font-normal mt-1">(Support &amp; Growth)</span>
</h2>
<p class="font-body-md text-body-md text-text-secondary leading-relaxed">
              সাইট প্রকাশের পর কীভাবে ব্যবহার করবেন তা বুঝিয়ে দিই। অতিরিক্ত প্রশিক্ষণ বা রক্ষণাবেক্ষণের প্রয়োজন থাকলে তার পরিধি আগেই ঠিক করি।
            </p>
<ul class="flex flex-col gap-3 font-body-sm text-body-sm text-on-surface">
<li class="flex items-start gap-3 bg-surface-container/60 p-3 rounded-lg">
<span class="material-symbols-outlined text-primary-fixed text-[20px] shrink-0 mt-0.5">smart_display</span>
<span>প্রয়োজন অনুযায়ী সাইট বা অ্যাডমিন প্যানেল ব্যবহারের নির্দেশনা।</span>
</li>
<li class="flex items-start gap-3 bg-surface-container/60 p-3 rounded-lg">
<span class="material-symbols-outlined text-primary-fixed text-[20px] shrink-0 mt-0.5">cloud_sync</span>
<span>ব্যাকআপ, আপডেট ও রক্ষণাবেক্ষণ প্যাকেজে থাকলে তার সময়সূচি জানানো।</span>
</li>
<li class="flex items-start gap-3 bg-surface-container/60 p-3 rounded-lg">
<span class="material-symbols-outlined text-primary-fixed text-[20px] shrink-0 mt-0.5">support_agent</span>
<span>প্রস্তাবে উল্লেখিত সময় ও মাধ্যম অনুযায়ী লঞ্চ-পরবর্তী সাপোর্ট।</span>
</li>
</ul>
</div>
<div class="lg:col-span-5 flex flex-col justify-center">
<div class="relative overflow-hidden rounded-xl bg-surface-default p-2 shadow-2xl">
<img class="w-full h-64 sm:h-72 object-cover rounded-lg" data-alt="Client handover and video tutorial training dashboard showing simple administrative controls for ecommerce shop, automated database backups, and friendly customer support center" src="{{ asset('assets/frontend/images/process-5.jpg') }}"/>
<div class="absolute bottom-4 left-4 right-4 bg-surface-card/90 backdrop-blur-md p-3.5 rounded-lg flex items-center justify-between">
<div>
<div class="text-xs text-text-muted font-label-md">ফলাফল ও সুবিধা</div>
<div class="text-sm font-semibold text-text-primary">ব্যবহারবিধি ও সম্মত সাপোর্ট</div>
</div>
<span class="material-symbols-outlined text-primary-fixed text-2xl">handshake</span>
</div>
</div>
</div>
</div>
</div>
</div>
</section><section class="w-full bg-surface-default/40 relative py-16 md:py-24">
<div class="max-w-7xl mx-auto flex flex-col items-center w-full relative px-5 sm:px-8 lg:px-10">
<div class="text-center max-w-2xl mb-12">
<span class="text-primary-fixed font-label-md text-xs font-semibold uppercase tracking-wider block mb-2">কেন আমরা অন্যদের চেয়ে আলাদা?</span>
<h2 class="font-headline-lg text-headline-lg text-text-primary mb-4">
          কাজের পদ্ধতিতে আমরা যা গুরুত্ব দিই
        </h2>
<p class="font-body-md text-body-md text-text-secondary">
          কাজের পরিধি, সময় ও খরচ নিয়ে শুরুতেই কথা বলি। কাজ এগোনোর সময়ও গুরুত্বপূর্ণ সিদ্ধান্তে আপনাকে যুক্ত রাখি।
        </p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full">
<div class="bg-surface-card p-8 rounded-2xl shadow-xl flex flex-col justify-between hover:bg-surface-card-elevated transition-all duration-300">
<div>
<div class="w-14 h-14 rounded-xl bg-primary-fixed/10 text-primary-fixed flex items-center justify-center mb-6">
<span class="material-symbols-outlined text-3xl">verified_user</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-text-primary mb-3">
              স্পষ্ট সময়সূচি
            </h3>
<p class="font-body-sm text-body-sm text-text-secondary leading-relaxed mb-6">
              প্রজেক্টের পরিধি ও উপকরণ বুঝে বাস্তবসম্মত সময়সূচি ঠিক করি। কাজের মধ্যে কোনো পরিবর্তন এলে সময়সূচির প্রভাবও জানাই।
            </p>
</div>
<div class="pt-4 border-t border-border-subtle flex items-center justify-between text-xs text-primary-fixed font-label-md">
<span>সময় নিয়ে পরিষ্কার আলোচনা</span>
<span class="material-symbols-outlined text-[18px]">alarm_on</span>
</div>
</div>
<div class="bg-surface-card p-8 rounded-2xl shadow-xl flex flex-col justify-between hover:bg-surface-card-elevated transition-all duration-300">
<div>
<div class="w-14 h-14 rounded-xl bg-primary-fixed/10 text-primary-fixed flex items-center justify-center mb-6">
<span class="material-symbols-outlined text-3xl">lock_open</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-text-primary mb-3">
              হস্তান্তরের শর্ত আগে থেকে
            </h3>
<p class="font-body-sm text-body-sm text-text-secondary leading-relaxed mb-6">
              প্রজেক্টে কী কী ফাইল, অ্যাকাউন্ট বা অ্যাক্সেস হস্তান্তর করা হবে, তা কাজ শুরুর আগেই লিখিতভাবে ঠিক করি।
            </p>
</div>
<div class="pt-4 border-t border-border-subtle flex items-center justify-between text-xs text-primary-fixed font-label-md">
<span>স্বাধীন নিয়ন্ত্রণ</span>
<span class="material-symbols-outlined text-[18px]">vpn_key</span>
</div>
</div>
<div class="bg-surface-card p-8 rounded-2xl shadow-xl flex flex-col justify-between hover:bg-surface-card-elevated transition-all duration-300">
<div>
<div class="w-14 h-14 rounded-xl bg-primary-fixed/10 text-primary-fixed flex items-center justify-center mb-6">
<span class="material-symbols-outlined text-3xl">trending_up</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-text-primary mb-3">
              গ্রাহকের জন্য পরিষ্কার অভিজ্ঞতা
            </h3>
<p class="font-body-sm text-body-sm text-text-secondary leading-relaxed mb-6">
              পেজের বিন্যাস, লেখা ও পরবর্তী পদক্ষেপ যেন সহজে বোঝা যায়, সে দিকে নজর রাখি। ব্যবসার ফলাফল নির্ভর করে পণ্য, মূল্য, প্রচার ও আরও অনেক কিছুর ওপর।
            </p>
</div>
<div class="pt-4 border-t border-border-subtle flex items-center justify-between text-xs text-primary-fixed font-label-md">
<span>সহজে বোঝা যায় এমন পেজ</span>
<span class="material-symbols-outlined text-[18px]">ads_click</span>
</div>
</div>
</div>
</div>
</section><section class="w-full relative py-12 md:py-16">
<div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
<div class="relative overflow-hidden bg-gradient-to-r from-surface-card via-surface-card-elevated to-surface-card rounded-3xl p-8 sm:p-14 shadow-2xl flex flex-col lg:flex-row items-center justify-between gap-8">
<div class="flex flex-col items-center lg:items-start text-center lg:text-left gap-4 max-w-2xl">
<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary-fixed/10 text-primary-fixed font-label-md text-xs">
<span class="w-2 h-2 rounded-full bg-primary-fixed animate-pulse"></span>
<span>আজই শুরু করতে পারেন</span>
</div>
<h2 class="font-headline-lg text-headline-lg text-text-primary">
            আপনার প্রজেক্টের কাজ শুরু করতে প্রস্তুত?
          </h2>
<p class="font-body-md text-body-md text-text-secondary leading-relaxed">
            আপনার আইডিয়া আমাদের জানান। আমরা বিস্তারিত আলোচনার মাধ্যমে আপনার ব্র্যান্ডের উপযোগী সেরা সলিউশন প্রস্তাব করব কোনো অগ্রিম ফি ছাড়াই।
          </p>
</div>
<div class="flex flex-col sm:flex-row items-center gap-4 shrink-0 w-full lg:w-auto">
<a class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 bg-primary-fixed text-text-inverse font-headline-sm text-base font-bold rounded-full shadow-[0_0_24px_rgba(197,243,49,0.35)] hover:bg-primary-fixed-dim hover:scale-105 active:scale-95 transition-all" href="#pricing">
<span class="material-symbols-outlined mr-2 text-[20px]">shopping_bag</span>
            আজই আপনার প্যাকেজ বাছাই করুন
          </a>
<a class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 bg-surface-container text-text-primary font-headline-sm text-base font-semibold rounded-full hover:text-primary-fixed hover:bg-surface-bright transition-all" href="#contact">
<span class="material-symbols-outlined mr-2 text-[20px]">forum</span>
            ফ্রি পরামর্শ নিন
          </a>
</div>
</div>
</div>
</section>
</main>
@endsection
