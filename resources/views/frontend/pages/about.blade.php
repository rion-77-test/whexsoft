@extends('frontend.layouts.app')

@section('title', 'আমাদের সম্পর্কে | WhexSoft')
@section('description', 'WhexSoft ঢাকাভিত্তিক একটি ওয়েব ডিজাইন ও ডেভেলপমেন্ট স্টুডিও। আমাদের কাজের ধরন, মূল্যবোধ এবং যোগাযোগের তথ্য জানুন।')
@section('page', 'about')

@section('content')
<main class="w-full relative overflow-x-clip"><section class="relative w-full overflow-hidden md:px-margin md:pb-space-3xl pt-32 md:pt-40 pb-12 md:pb-16">
<div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[550px] h-[350px] bg-tertiary-container/10 blur-[130px] rounded-full pointer-events-none"></div>
<div class="max-w-7xl mx-auto flex flex-col items-center text-center relative z-10 w-full px-5 sm:px-8 lg:px-10">
<div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-surface-card-elevated border border-tertiary-container/30 text-tertiary-container shadow-[0_0_20px_rgba(197,243,49,0.15)] mb-space-lg">
<span class="material-symbols-outlined text-[18px]">lightbulb</span>
<span class="font-label-md text-label-md uppercase tracking-wider">আমাদের পরিচিতি ও ভিশন</span>
</div>
<h1 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg max-w-4xl text-text-primary font-bold tracking-tight">
        ব্যবসার কথা বুঝে তৈরি করি <span class="text-tertiary-container drop-shadow-[0_0_24px_rgba(197,243,49,0.35)]">ব্যবহারযোগ্য ওয়েবসাইট</span>
</h1>
<p class="font-body-lg text-body-md md:text-body-lg text-text-secondary max-w-3xl mt-space-md leading-relaxed">
        WhexSoft ঢাকাভিত্তিক একটি ওয়েব ডিজাইন ও ডেভেলপমেন্ট স্টুডিও। আপনার ব্যবসার লক্ষ্য, গ্রাহক ও প্রয়োজনীয় ফিচার বুঝে ওয়েবসাইটের পরিকল্পনা থেকে লঞ্চ পর্যন্ত কাজ করি।
      </p>
<div class="w-full grid grid-cols-2 lg:grid-cols-4 gap-gutter-mobile md:gap-gutter mt-space-2xl">
<div class="flex flex-col items-center justify-center p-space-lg rounded-xl bg-surface-card/90 backdrop-blur-md border border-border-subtle shadow-xl hover:border-tertiary-container/40 hover:-translate-y-1 transition-all">
<span class="material-symbols-outlined text-tertiary-container text-[32px] mb-2">rocket_launch</span>
<span class="font-display-xl text-display-xl-mobile md:text-headline-lg text-text-primary font-extrabold tracking-tight">ঢাকায়</span>
<span class="font-label-md text-label-md text-text-muted mt-1 uppercase">আমাদের স্টুডিও</span>
</div>
<div class="flex flex-col items-center justify-center p-space-lg rounded-xl bg-surface-card/90 backdrop-blur-md border border-border-subtle shadow-xl hover:border-tertiary-container/40 hover:-translate-y-1 transition-all">
<span class="material-symbols-outlined text-tertiary-container text-[32px] mb-2">sentiment_very_satisfied</span>
<span class="font-display-xl text-display-xl-mobile md:text-headline-lg text-text-primary font-extrabold tracking-tight">বাংলায়</span>
<span class="font-label-md text-label-md text-text-muted mt-1 uppercase">সহজ যোগাযোগ</span>
</div>
<div class="flex flex-col items-center justify-center p-space-lg rounded-xl bg-surface-card/90 backdrop-blur-md border border-border-subtle shadow-xl hover:border-tertiary-container/40 hover:-translate-y-1 transition-all">
<span class="material-symbols-outlined text-tertiary-container text-[32px] mb-2">format_image_left</span>
<span class="font-display-xl text-display-xl-mobile md:text-headline-lg text-text-primary font-extrabold tracking-tight">শুরু থেকে</span>
<span class="font-label-md text-label-md text-text-muted mt-1 uppercase">পরিকল্পনা ও ডিজাইন</span>
</div>
<div class="flex flex-col items-center justify-center p-space-lg rounded-xl bg-surface-card/90 backdrop-blur-md border border-border-subtle shadow-xl hover:border-tertiary-container/40 hover:-translate-y-1 transition-all">
<span class="material-symbols-outlined text-tertiary-container text-[32px] mb-2">support_agent</span>
<span class="font-display-xl text-display-xl-mobile md:text-headline-lg text-text-primary font-extrabold tracking-tight">লঞ্চের পরেও</span>
<span class="font-label-md text-label-md text-text-muted mt-1 uppercase">প্রয়োজনমতো সহায়তা</span>
</div>
</div>
</div>
</section><section class="w-full md:px-margin md:py-space-3xl relative bg-surface-default/60 py-16 md:py-24">
<div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-center w-full relative px-5 sm:px-8 lg:px-10">
<div class="lg:col-span-7 flex flex-col items-start">
<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-surface-card text-tertiary-container border border-border-subtle font-label-md text-label-md mb-space-sm">
<span class="w-2 h-2 rounded-full bg-tertiary-container"></span>
<span>আমাদের উদ্দেশ্য</span>
</div>
<h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-text-primary font-bold mt-2 tracking-tight">
          কেন <span class="text-tertiary-container">WhexSoft</span> গড়ে উঠল?
        </h2>
<p class="font-body-lg text-body-md md:text-body-lg text-text-secondary mt-space-md leading-relaxed">
          অনেক ব্যবসা সোশ্যাল মিডিয়ায় শুরু করলেও, সময়ের সঙ্গে পণ্য, সেবা ও অর্ডারের তথ্য গুছিয়ে রাখার প্রয়োজন হয়। WhexSoft-এর লক্ষ্য হলো আপনার কাজের ধরন অনুযায়ী একটি নিজস্ব ওয়েবসাইট তৈরি করা—যা আপনি নিজের ব্র্যান্ডে পরিচালনা করতে পারবেন।
        </p>
<div class="flex flex-col gap-3.5 mt-space-lg w-full">
<div class="flex items-start gap-3 p-3.5 rounded-lg bg-surface-card border border-border-subtle hover:border-tertiary-container/30 transition-colors">
<span class="material-symbols-outlined text-tertiary-container text-[22px] shrink-0 mt-0.5">check_circle</span>
<span class="font-body-md text-body-md text-text-primary">নিজস্ব ডোমেইনে ব্যবসার তথ্য ও সেবা তুলে ধরা</span>
</div>
<div class="flex items-start gap-3 p-3.5 rounded-lg bg-surface-card border border-border-subtle hover:border-tertiary-container/30 transition-colors">
<span class="material-symbols-outlined text-tertiary-container text-[22px] shrink-0 mt-0.5">check_circle</span>
<span class="font-body-md text-body-md text-text-primary">গ্রাহকের জন্য প্রয়োজনীয় তথ্য সহজে খুঁজে পাওয়ার ব্যবস্থা করা</span>
</div>
<div class="flex items-start gap-3 p-3.5 rounded-lg bg-surface-card border border-border-subtle hover:border-tertiary-container/30 transition-colors">
<span class="material-symbols-outlined text-tertiary-container text-[22px] shrink-0 mt-0.5">check_circle</span>
<span class="font-body-md text-body-md text-text-primary">প্রজেক্টের প্রয়োজন অনুযায়ী অর্ডার, পেমেন্ট বা কুরিয়ার সুবিধা যোগ করা</span>
</div>
</div>
<div class="mt-space-xl flex flex-wrap gap-4">
<a class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-tertiary-container text-text-inverse font-headline-sm text-sm font-semibold shadow-[0_0_24px_rgba(197,243,49,0.3)] hover:scale-105 active:scale-95 transition-all" href="#contact">
<span>পরামর্শ শুরু করুন</span>
<span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</a>
</div>
</div>
<div class="lg:col-span-5 relative">
<div class="absolute -inset-4 bg-tertiary-container/15 blur-2xl rounded-2xl pointer-events-none"></div>
<div class="relative rounded-2xl overflow-hidden border border-tertiary-container/30 bg-surface-card shadow-2xl">
<img alt="WhexSoft Multi-Device Digital Architecture" class="w-full h-auto object-cover transform hover:scale-102 transition-transform duration-500" src="{{ asset('assets/frontend/images/about-4.jpg') }}"/>
<div class="absolute inset-0 bg-gradient-to-t from-canvas-base via-transparent to-transparent opacity-80"></div>
<div class="absolute bottom-4 left-4 right-4 p-4 rounded-xl bg-surface-card-elevated/90 backdrop-blur-md border border-border-subtle flex items-center justify-between">
<div>
<p class="font-label-md text-label-md text-tertiary-container uppercase">হাই-পারফরম্যান্স ফ্রেমওয়ার্ক</p>
<p class="font-headline-sm text-sm text-text-primary font-bold">মোবাইল, ট্যাবলেট ও কম্পিউটারে ব্যবহার উপযোগী</p>
</div>
<span class="material-symbols-outlined text-tertiary-container text-[28px]">devices</span>
</div>
</div>
</div>
</div>
</section><section class="w-full md:px-margin md:py-space-3xl relative py-12 md:py-16">
<div class="max-w-7xl mx-auto flex flex-col items-center w-full relative px-5 sm:px-8 lg:px-10">
<div class="text-center max-w-2xl mb-space-2xl">
<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-surface-card text-tertiary-container border border-border-subtle font-label-md text-label-md mb-2">
<span class="material-symbols-outlined text-[16px]">stars</span>
<span>আমাদের মূল ভিত্তি</span>
</div>
<h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-text-primary font-bold tracking-tight">
          কাজের ক্ষেত্রে আমাদের <span class="text-tertiary-container">৪টি মূল স্তম্ভ</span>
</h2>
<p class="font-body-md text-body-md text-text-secondary mt-2">
          প্রতিটি ক্লায়েন্টকে আন্তর্জাতিক মানের নিরাপদ ও নির্ভুল সমাধান দেওয়াই আমাদের অঙ্গীকার।
        </p>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter w-full">
<div class="group p-space-lg rounded-xl bg-surface-card border border-border-subtle hover:border-tertiary-container/50 hover:bg-surface-card-elevated hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between">
<div>
<div class="w-12 h-12 rounded-lg bg-tertiary-container/10 border border-tertiary-container/30 flex items-center justify-center text-tertiary-container mb-space-md group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-[26px]">visibility</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-text-primary font-bold mb-2">স্বচ্ছতা ও সততা</h3>
<p class="font-body-sm text-body-sm text-text-secondary leading-relaxed">
              কোনো লুকানো খরচ বা বিভ্রান্তিকর শর্ত নেই। কাজ শুরুর পূর্বেই ফিক্সড টাইমলাইন ও বাজেট সম্পূর্ণ স্পষ্ট ও লিখিতভাবে চূড়ান্ত করা হয়।
            </p>
</div>
<div class="mt-space-lg pt-space-sm border-t border-border-subtle flex items-center gap-2 text-tertiary-container font-label-md text-label-md">
<span>কাজের শর্ত আগে থেকেই স্পষ্ট</span>
<span class="material-symbols-outlined text-[16px]">verified</span>
</div>
</div>
<div class="group p-space-lg rounded-xl bg-surface-card border border-border-subtle hover:border-tertiary-container/50 hover:bg-surface-card-elevated hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between">
<div>
<div class="w-12 h-12 rounded-lg bg-tertiary-container/10 border border-tertiary-container/30 flex items-center justify-center text-tertiary-container mb-space-md group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-[26px]">speed</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-text-primary font-bold mb-2">মান ও দ্রুত গতি</h3>
<p class="font-body-sm text-body-sm text-text-secondary leading-relaxed">
              প্রতিটি সাইটের গতি ও ব্যবহারযোগ্যতার দিকে নজর রাখি। ফলাফল নির্ভর করে সাইটের ফিচার, কনটেন্ট, হোস্টিং ও অন্যান্য সেটআপের ওপর।
            </p>
</div>
<div class="mt-space-lg pt-space-sm border-t border-border-subtle flex items-center gap-2 text-tertiary-container font-label-md text-label-md">
<span>গতি ও ব্যবহারযোগ্যতা</span>
<span class="material-symbols-outlined text-[16px]">bolt</span>
</div>
</div>
<div class="group p-space-lg rounded-xl bg-surface-card border border-border-subtle hover:border-tertiary-container/50 hover:bg-surface-card-elevated hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between">
<div>
<div class="w-12 h-12 rounded-lg bg-tertiary-container/10 border border-tertiary-container/30 flex items-center justify-center text-tertiary-container mb-space-md group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-[26px]">timer</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-text-primary font-bold mb-2">সময়মতো ডেলিভারি</h3>
<p class="font-body-sm text-body-sm text-text-secondary leading-relaxed">
              কাজের পরিধি ও প্রয়োজনীয় উপকরণ বুঝে বাস্তবসম্মত সময়সূচি ঠিক করি এবং কাজের অগ্রগতি জানাই।
            </p>
</div>
<div class="mt-space-lg pt-space-sm border-t border-border-subtle flex items-center gap-2 text-tertiary-container font-label-md text-label-md">
<span>২-৭ দিনের মধ্যে লাইভ</span>
<span class="material-symbols-outlined text-[16px]">schedule</span>
</div>
</div>
<div class="group p-space-lg rounded-xl bg-surface-card border border-border-subtle hover:border-tertiary-container/50 hover:bg-surface-card-elevated hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between">
<div>
<div class="w-12 h-12 rounded-lg bg-tertiary-container/10 border border-tertiary-container/30 flex items-center justify-center text-tertiary-container mb-space-md group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-[26px]">headset_mic</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-text-primary font-bold mb-2">বিক্রয়োত্তর অবিচল সাপোর্ট</h3>
<p class="font-body-sm text-body-sm text-text-secondary leading-relaxed">
              সাইট লঞ্চের পরেও যেকোনো টেকনিক্যাল সহায়তা, সিকিউরিটি আপডেট বা ফিচার আপগ্রেডে আমাদের অভিজ্ঞ দল সবসময় ক্লায়েন্টের পাশে থাকে।
            </p>
</div>
<div class="mt-space-lg pt-space-sm border-t border-border-subtle flex items-center gap-2 text-tertiary-container font-label-md text-label-md">
<span>সম্মত সাপোর্টের পরিধি</span>
<span class="material-symbols-outlined text-[16px]">verified_user</span>
</div>
</div>
</div>
</div>
</section><section class="w-full md:px-margin md:py-space-3xl bg-surface-default/40 relative py-16 md:py-24">
<div class="max-w-7xl mx-auto flex flex-col gap-space-2xl w-full relative px-5 sm:px-8 lg:px-10">
<div class="flex flex-col lg:flex-row lg:items-end justify-between gap-space-lg">
<div class="max-w-2xl">
<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-surface-card text-tertiary-container border border-border-subtle font-label-md text-label-md mb-2">
<span class="material-symbols-outlined text-[16px]">groups</span>
<span>টিম ও কাজের পরিবেশ</span>
</div>
<h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-text-primary font-bold tracking-tight">
            আমরা কারা? আমাদের <span class="text-tertiary-container">ঢাকা স্টুডিও কালচার</span>
</h2>
<p class="font-body-lg text-body-md md:text-body-lg text-text-secondary mt-space-sm">
            ডিজাইন ও ডেভেলপমেন্টের প্রতিটি ধাপে আপনার সঙ্গে আলোচনা করি। লক্ষ্য থাকে—আপনার গ্রাহকের জন্য তথ্য খুঁজে পাওয়া ও সাইট ব্যবহার করা সহজ করা।
          </p>
</div>
<div class="p-4 rounded-xl bg-surface-card border border-border-subtle flex items-center gap-4 shrink-0">
<div class="w-12 h-12 rounded-full bg-tertiary-container/20 border border-tertiary-container/40 flex items-center justify-center text-tertiary-container">
<span class="material-symbols-outlined text-[24px]">terminal</span>
</div>
<div>
<p class="font-label-md text-label-md text-text-muted">দক্ষতার ফিল্ড</p>
<p class="font-headline-sm text-sm text-text-primary font-bold">ওয়েব ডিজাইন ও ডেভেলপমেন্ট</p>
</div>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-space-lg">
<div class="relative group rounded-2xl overflow-hidden border border-border-subtle bg-surface-card shadow-2xl">
<div class="w-full h-80 overflow-hidden">
<img alt="WhexSoft Web Architecture and Modern Workspace" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="{{ asset('assets/frontend/images/about-2.jpg') }}"/>
</div>
<div class="absolute inset-0 bg-gradient-to-t from-canvas-base via-canvas-base/40 to-transparent"></div>
<div class="absolute bottom-0 left-0 right-0 p-space-lg flex flex-col">
<span class="font-label-md text-label-md text-tertiary-container uppercase tracking-wider mb-1">প্রফেশনাল ডিজিটাল টিমওয়ার্ক</span>
<h3 class="font-headline-sm text-headline-sm text-text-primary font-bold">ব্র্যান্ডের জন্য শক্তিশালী প্রযুক্তিগত পরিকাঠামো</h3>
<p class="font-body-sm text-body-sm text-text-secondary mt-1">আপনার প্রজেক্টের প্রয়োজন অনুযায়ী কাজের পরিকল্পনা করা হয়।</p>
</div>
</div>
<div class="relative group rounded-2xl overflow-hidden border border-border-subtle bg-surface-card shadow-2xl">
<div class="w-full h-80 overflow-hidden">
<img alt="WhexSoft Engineering and Strategy Lab" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="{{ asset('assets/frontend/images/about-1.jpg') }}"/>
</div>
<div class="absolute inset-0 bg-gradient-to-t from-canvas-base via-canvas-base/40 to-transparent"></div>
<div class="absolute bottom-0 left-0 right-0 p-space-lg flex flex-col">
<span class="font-label-md text-label-md text-tertiary-container uppercase tracking-wider mb-1">কাস্টম ওয়েব আর্কিটেকচার</span>
<h3 class="font-headline-sm text-headline-sm text-text-primary font-bold">পরিষ্কার ব্যবহার অভিজ্ঞতা</h3>
<p class="font-body-sm text-body-sm text-text-secondary mt-1">প্রয়োজনীয় তথ্য ও কাজগুলো যেন দর্শক সহজে খুঁজে পান, সে দিকে নজর রাখি।</p>
</div>
</div>
</div>
</div>
</section><section class="w-full md:px-margin md:py-space-3xl relative py-12 md:py-16">
<div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
<div class="rounded-2xl p-space-lg md:p-space-2xl bg-surface-card border border-border-subtle relative overflow-hidden shadow-2xl">
<div class="absolute -right-20 -bottom-20 w-80 h-80 bg-tertiary-container/10 blur-[100px] rounded-full pointer-events-none"></div>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-center relative z-10">
<div class="lg:col-span-6 flex flex-col items-start">
<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-surface-card-elevated text-tertiary-container border border-border-subtle font-label-md text-label-md mb-space-sm">
<span class="material-symbols-outlined text-[16px]">domain</span>
<span>ঢাকা অফিস ও স্টুডিও</span>
</div>
<h3 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-text-primary font-bold tracking-tight">
              সরাসরি যোগাযোগ ও <span class="text-tertiary-container">স্টুডিও ভিজিট</span>
</h3>
<p class="font-body-md text-body-md text-text-secondary mt-space-sm max-w-lg leading-relaxed">
              স্টুডিওতে এসে অথবা ফোনে আপনার প্রজেক্ট নিয়ে কথা বলতে পারেন। কাজের ধরন ও সম্ভাব্য খরচ নিয়ে প্রাথমিক আলোচনা করতে আমাদের সঙ্গে যোগাযোগ করুন।
            </p>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-space-lg w-full">
<div class="flex items-start gap-3 p-3 rounded-lg bg-surface-default border border-border-subtle">
<span class="material-symbols-outlined text-tertiary-container text-[20px] shrink-0 mt-0.5">location_on</span>
<div>
<p class="font-label-md text-label-md text-text-muted">ঠিকানা</p>
<p class="font-body-sm text-body-sm text-text-primary font-semibold">সোনির আখড়া, যাত্রাবাড়ী, ঢাকা-১২৩৬</p>
</div>
</div>
<div class="flex items-start gap-3 p-3 rounded-lg bg-surface-default border border-border-subtle">
<span class="material-symbols-outlined text-tertiary-container text-[20px] shrink-0 mt-0.5">call</span>
<div>
<p class="font-label-md text-label-md text-text-muted">ফোন নম্বর</p>
<a class="font-body-sm text-body-sm text-tertiary-container font-bold hover:underline" href="tel:01335198859">০১৩৩৫-১৯৮৮৫৯</a>
</div>
</div>
<div class="flex items-start gap-3 p-3 rounded-lg bg-surface-default border border-border-subtle">
<span class="material-symbols-outlined text-tertiary-container text-[20px] shrink-0 mt-0.5">mail</span>
<div>
<p class="font-label-md text-label-md text-text-muted">অফিসিয়াল ইমেইল</p>
<a class="font-body-sm text-body-sm text-text-primary hover:text-tertiary-container break-all" href="mailto:contact.whexsoft@gmail.com">contact.whexsoft@gmail.com</a>
</div>
</div>
<div class="flex items-start gap-3 p-3 rounded-lg bg-surface-default border border-border-subtle">
<span class="material-symbols-outlined text-tertiary-container text-[20px] shrink-0 mt-0.5">schedule</span>
<div>
<p class="font-label-md text-label-md text-text-muted">অফিস সময়</p>
<p class="font-body-sm text-body-sm text-text-primary font-semibold">শনি - বৃহস্পতি: সকাল ১০টা - রাত ৮টা</p>
</div>
</div>
</div>
</div>
<div class="lg:col-span-6 w-full h-full min-h-[260px] rounded-xl overflow-hidden border border-border-subtle relative bg-surface-default flex flex-col justify-end p-6">
<div class="absolute inset-0 bg-cover bg-center opacity-60" data-location="Dhaka, Bangladesh" style="background-image: url('{{ asset('assets/frontend/images/about-2.jpg') }}')"></div>
<div class="absolute inset-0 bg-gradient-to-t from-canvas-base via-canvas-base/60 to-transparent"></div>
<div class="relative z-10 flex items-center justify-between">
<div>
<p class="font-label-md text-label-md text-tertiary-container uppercase tracking-wider">ডেলিভারি হাব</p>
<p class="font-headline-sm text-sm text-text-primary font-bold">WhexSoft ঢাকা স্টুডিও প্রধান কার্যালয়</p>
</div>
<a class="px-4 py-2 rounded-full bg-tertiary-container text-text-inverse font-headline-sm text-xs font-bold hover:bg-tertiary-container/90 transition-all" href="tel:01335198859">কল দিন</a>
</div>
</div>
</div>
</div>
</div>
</section><section class="w-full md:px-margin relative py-12 md:py-16">
<div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10"><div class="max-w-5xl mx-auto rounded-3xl p-space-xl md:p-space-2xl bg-gradient-to-br from-surface-card-elevated via-surface-card to-surface-default border border-tertiary-container/30 text-center relative overflow-hidden shadow-[0_12px_48px_rgba(0,0,0,0.8)]">
<div class="absolute -top-24 -left-24 w-72 h-72 bg-tertiary-container/15 blur-3xl rounded-full pointer-events-none"></div>
<div class="absolute -bottom-24 -right-24 w-72 h-72 bg-tertiary-container/15 blur-3xl rounded-full pointer-events-none"></div>
<div class="relative z-10 flex flex-col items-center">
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-default border border-border-subtle text-tertiary-container font-label-md text-label-md mb-space-sm">
<span class="material-symbols-outlined text-[16px]">verified</span>
<span>রেডি-টু-লঞ্চ সলিউশন</span>
</span>
<h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-text-primary font-bold max-w-2xl tracking-tight">
          আপনার ব্যবসার জন্য <span class="text-tertiary-container">প্রফেশনাল ওয়েবসাইট</span> বানাতে চান?
        </h2>
<p class="font-body-md text-body-md text-text-secondary max-w-xl mt-space-sm leading-relaxed">
          আপনার ব্যবসার জন্য ওয়েবসাইট বা অনলাইন স্টোর নিয়ে কথা বলুন। কাজের ধরন ও প্রয়োজনীয় ফিচার বুঝে আমরা প্রস্তাব দেব।
        </p>
<div class="flex flex-col sm:flex-row items-center gap-4 mt-space-xl">
<a class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-8 py-3.5 rounded-full bg-tertiary-container text-text-inverse font-headline-sm text-sm font-bold shadow-[0_0_24px_rgba(197,243,49,0.35)] hover:scale-105 active:scale-95 transition-all" href="#contact">
<span class="material-symbols-outlined text-[20px]">calendar_month</span>
<span>ফ্রি কনসাল্টেশন বুক করুন</span>
</a>
<a class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-8 py-3.5 rounded-full bg-success-whatsapp text-text-inverse font-headline-sm text-sm font-bold shadow-[0_0_24px_rgba(37,211,102,0.3)] hover:scale-105 active:scale-95 transition-all" href="https://wa.me/8801335198859" rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-[20px]">chat</span>
<span>হোয়াটসঅ্যাপে কথা বলুন</span>
</a>
</div>
</div>
</div></div>
</section></main>
@endsection
