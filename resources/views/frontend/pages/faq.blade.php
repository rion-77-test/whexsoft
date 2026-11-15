@extends('frontend.layouts.app')

@section('title', 'সচরাচর জিজ্ঞাসা | WhexSoft')
@section('description', 'ওয়েবসাইট ডিজাইন, ডেভেলপমেন্ট, মূল্য, পেমেন্ট ও সাপোর্ট নিয়ে সচরাচর জিজ্ঞাসার উত্তর।')
@section('page', 'faq')

@section('content')
<main class="w-full relative overflow-x-clip"><div class="absolute top-10 left-1/2 -translate-x-1/2 w-[700px] h-[350px] bg-primary-container/10 blur-[130px] rounded-full pointer-events-none"></div><div class="absolute top-[800px] right-0 w-[450px] h-[450px] bg-glow-lime blur-[150px] rounded-full pointer-events-none"></div><section class="relative w-full pt-32 md:pt-40 pb-12 md:pb-16">
<div class="max-w-4xl mx-auto text-center space-y-space-md w-full relative px-5 sm:px-8 lg:px-10">
<div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-surface-card-elevated text-primary-container font-label-md text-label-md shadow-[0_0_20px_rgba(198,244,50,0.15)] mx-auto">
<span class="material-symbols-outlined text-[16px]">help_center</span>
<span>প্রজেক্ট নিয়ে সাধারণ প্রশ্ন</span>
</div>
<h1 class="font-headline-lg text-headline-lg md:text-[46px] md:leading-[56px] text-text-primary tracking-tight font-extrabold">
        সাধারণ প্রশ্নের উত্তর
      </h1>
<p class="font-body-lg text-body-lg text-text-secondary max-w-2xl mx-auto">
        কাজের ধাপ, সম্ভাব্য খরচ, সময়সূচি ও লঞ্চ-পরবর্তী সহায়তা নিয়ে জানতে পারেন।
      </p>
<div class="pt-space-md max-w-2xl mx-auto">
<div class="relative flex items-center bg-surface-card rounded-2xl shadow-xl transition-all focus-within:shadow-[0_0_28px_rgba(198,244,50,0.18)]">
<div class="pl-space-md text-primary-container flex items-center justify-center">
<span class="material-symbols-outlined text-[24px]">search</span>
</div>
<input class="w-full h-14 bg-transparent px-4 font-body-md text-body-md text-text-primary placeholder:text-text-muted focus:outline-none" id="faqSearchInput" placeholder="আপনার প্রশ্ন লিখে খুঁজুন (যেমন: পেমেন্ট, ডোমেইন, সময়কাল, সাপোর্ট)..." type="text"/>
<button class="hidden mr-3 p-1.5 rounded-lg text-text-muted hover:text-text-primary hover:bg-surface-card-elevated transition-colors" id="clearSearchBtn" type="button">
<span class="material-symbols-outlined text-[18px]">close</span>
</button>
</div>
</div>
<div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-space-lg max-w-3xl mx-auto">
<div class="p-3 rounded-xl bg-surface-card text-left flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-surface-card-elevated flex items-center justify-center text-primary-container">
<span class="material-symbols-outlined text-[20px]">bolt</span>
</div>
<div>
<div class="font-title-md text-title-md text-text-primary font-bold">প্রজেক্ট অনুযায়ী</div>
<div class="font-caption text-caption text-text-muted">সময়সূচি</div>
</div>
</div>
<div class="p-3 rounded-xl bg-surface-card text-left flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-surface-card-elevated flex items-center justify-center text-primary-container">
<span class="material-symbols-outlined text-[20px]">format_image_left</span>
</div>
<div>
<div class="font-title-md text-title-md text-text-primary font-bold">লিখিত শর্ত</div>
<div class="font-caption text-caption text-text-muted">কাজ শুরুর আগে</div>
</div>
</div>
<div class="p-3 rounded-xl bg-surface-card text-left flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-surface-card-elevated flex items-center justify-center text-primary-container">
<span class="material-symbols-outlined text-[20px]">currency_exchange</span>
</div>
<div>
<div class="font-title-md text-title-md text-text-primary font-bold">স্পষ্ট কোটেশন</div>
<div class="font-caption text-caption text-text-muted">কাজের পরিধিসহ</div>
</div>
</div>
<div class="p-3 rounded-xl bg-surface-card text-left flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-surface-card-elevated flex items-center justify-center text-primary-container">
<span class="material-symbols-outlined text-[20px]">headset_mic</span>
</div>
<div>
<div class="font-title-md text-title-md text-text-primary font-bold">যোগাযোগ</div>
<div class="font-caption text-caption text-text-muted">ফোন বা হোয়াটসঅ্যাপে</div>
</div>
</div>
</div>
<div class="pt-space-md flex flex-wrap items-center justify-center gap-2">
<button class="faq-filter-btn px-5 py-2.5 rounded-full font-label-lg text-label-lg transition-all duration-200 bg-primary-container text-text-inverse font-bold shadow-[0_0_18px_rgba(198,244,50,0.3)]" data-category="all">
          সব প্রশ্ন
        </button>
<button class="faq-filter-btn px-5 py-2.5 rounded-full font-label-lg text-label-lg transition-all duration-200 bg-surface-card text-text-secondary hover:text-text-primary hover:bg-surface-card-elevated" data-category="timeline">
          প্রজেক্ট ও সময়সূচি
        </button>
<button class="faq-filter-btn px-5 py-2.5 rounded-full font-label-lg text-label-lg transition-all duration-200 bg-surface-card text-text-secondary hover:text-text-primary hover:bg-surface-card-elevated" data-category="pricing">
          প্যাকেজ ও পেমেন্ট
        </button>
<button class="faq-filter-btn px-5 py-2.5 rounded-full font-label-lg text-label-lg transition-all duration-200 bg-surface-card text-text-secondary hover:text-text-primary hover:bg-surface-card-elevated" data-category="infrastructure">
          ডোমেইন ও হোস্টিং
        </button>
<button class="faq-filter-btn px-5 py-2.5 rounded-full font-label-lg text-label-lg transition-all duration-200 bg-surface-card text-text-secondary hover:text-text-primary hover:bg-surface-card-elevated" data-category="support">
          সাপোর্ট ও অ্যাডমিন
        </button>
</div>
</div>
</section><section class="w-full relative py-12 md:py-16">
<div class="max-w-5xl mx-auto space-y-space-2xl w-full relative px-5 sm:px-8 lg:px-10"><div class="faq-group space-y-space-md" data-group="timeline">
<div class="flex items-center gap-3 pb-2">
<div class="w-8 h-8 rounded-lg bg-surface-card-elevated text-primary-container flex items-center justify-center font-bold font-label-md">
          A
        </div>
<div class="flex flex-col">
<h2 class="font-headline-sm text-headline-sm text-text-primary">প্রজেক্ট ও ডেলিভারি সময়কাল</h2>
<span class="font-caption text-caption text-text-muted">কাজের গতি, ধাপসমূহ এবং প্রস্তুতি সংক্রান্ত প্রশ্ন</span>
</div>
</div>
<div class="space-y-4">
<div class="faq-card bg-surface-card rounded-2xl transition-all duration-200 overflow-hidden" data-keywords="সময় কত দিন ডেলিভারি লঞ্চ ল্যান্ডিং পেজ ই-কমার্স timeline delivery">
<button class="faq-toggle w-full p-6 text-left flex items-start justify-between gap-4 focus:outline-none">
<div class="flex items-start gap-4">
<span class="material-symbols-outlined text-primary-container text-[24px] mt-0.5 shrink-0">timer</span>
<span class="font-title-md text-title-md text-text-primary font-semibold">একটি ওয়েবসাইট বানাতে ঠিক কত সময় লাগে?</span>
</div>
<div class="w-8 h-8 rounded-full bg-surface-card-elevated flex items-center justify-center text-text-secondary shrink-0 transition-transform duration-300 icon-arrow">
<span class="material-symbols-outlined text-[20px]">expand_more</span>
</div>
</button>
<div class="faq-answer hidden px-6 pb-6 pt-0 text-text-secondary font-body-md text-body-md space-y-3">
<p>
              সময় নির্ভর করে পেজ, ফিচার, কনটেন্ট প্রস্তুত থাকা এবং প্রয়োজনীয় সংযোগের ওপর। কাজ শুরুর আগে আমরা সম্ভাব্য সময়সূচি জানাই:
            </p>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
<div class="p-4 rounded-xl bg-surface-default flex items-start gap-3">
<span class="material-symbols-outlined text-primary-container text-[20px] mt-0.5">check_circle</span>
<div>
<div class="font-label-lg text-label-lg text-text-primary font-semibold">ল্যান্ডিং পেজ</div>
<div class="font-caption text-caption text-text-muted mt-1">পেজ ও ফিচারের পরিধি অনুযায়ী সময় ঠিক হয়।</div>
</div>
</div>
<div class="p-4 rounded-xl bg-surface-default flex items-start gap-3">
<span class="material-symbols-outlined text-primary-container text-[20px] mt-0.5">check_circle</span>
<div>
<div class="font-label-lg text-label-lg text-text-primary font-semibold">ই-কমার্স বা কর্পোরেট সাইট</div>
<div class="font-caption text-caption text-text-muted mt-1">কনটেন্ট ও প্রয়োজনীয় ফিচার দেখে সময়সূচি জানানো হয়।</div>
</div>
</div>
</div>
<p class="font-body-sm text-body-sm text-text-muted pt-1">
              বিশেষ ফিচার বা ইন্টিগ্রেশন থাকলে সেগুলোর সময়ও আলাদা করে হিসাব করা হবে।
            </p>
</div>
</div>
<div class="faq-card bg-surface-card rounded-2xl transition-all duration-200 overflow-hidden" data-keywords="উপাদান তথ্য লোগো ছবি কি লাগবে শুরু requirements asset logo text">
<button class="faq-toggle w-full p-6 text-left flex items-start justify-between gap-4 focus:outline-none">
<div class="flex items-start gap-4">
<span class="material-symbols-outlined text-primary-container text-[24px] mt-0.5 shrink-0">inventory_2</span>
<span class="font-title-md text-title-md text-text-primary font-semibold">কাজ শুরুর জন্য আমাকে কী কী তথ্য বা উপাদান দিতে হবে?</span>
</div>
<div class="w-8 h-8 rounded-full bg-surface-card-elevated flex items-center justify-center text-text-secondary shrink-0 transition-transform duration-300 icon-arrow">
<span class="material-symbols-outlined text-[20px]">expand_more</span>
</div>
</button>
<div class="faq-answer hidden px-6 pb-6 pt-0 text-text-secondary font-body-md text-body-md space-y-3">
<p>
              শুরুতে আপনার ব্যবসা ও প্রয়োজনীয় ফিচার সম্পর্কে কিছু তথ্য জানলেই হয়। লোগো, পণ্য বা সেবার বিবরণ এবং যোগাযোগের তথ্য থাকলে কাজ এগোতে সুবিধা হয়।
            </p>
<ul class="space-y-2">
<li class="flex items-center gap-3">
<span class="w-1.5 h-1.5 rounded-full bg-primary-container"></span>
<span><strong>ব্যবসার লোগো:</strong> লোগোর স্বচ্ছ পিএনজি বা ভেক্টর ফাইল (না থাকলে আমাদের ডিজাইন টিম সাহায্য করবে)।</span>
</li>
<li class="flex items-center gap-3">
<span class="w-1.5 h-1.5 rounded-full bg-primary-container"></span>
<span><strong>পণ্য বা সার্ভিসের ছবি ও বিবরণ:</strong> আপনার প্রোডাক্টের স্পষ্ট ছবি, মূল্য এবং বিবরণ।</span>
</li>
<li class="flex items-center gap-3">
<span class="w-1.5 h-1.5 rounded-full bg-primary-container"></span>
<span><strong>যোগাযোগের তথ্য:</strong> অফিশিয়াল মোবাইল/হোয়াটসঅ্যাপ নম্বর, ঠিকানা এবং সোশ্যাল মিডিয়া লিংক।</span>
</li>
<li class="flex items-center gap-3">
<span class="w-1.5 h-1.5 rounded-full bg-primary-container"></span>
<span><strong>পছন্দের রেফারেন্স (ঐচ্ছিক):</strong> আপনার পছন্দের কোনো ওয়েবসাইটের উদাহরণ থাকলে শেয়ার করতে পারেন।</span>
</li>
</ul>
<p class="font-body-sm text-body-sm text-text-muted">
              কনটেন্ট লেখা, ছবি বা ব্যানার তৈরির কাজ প্রয়োজন হলে সেগুলো কাজের পরিধিতে অন্তর্ভুক্ত কি না, আগে আলোচনা করে নিন।
            </p>
</div>
</div>
</div>
</div><div class="faq-group space-y-space-md" data-group="pricing">
<div class="flex items-center gap-3 pb-2">
<div class="w-8 h-8 rounded-lg bg-surface-card-elevated text-primary-container flex items-center justify-center font-bold font-label-md">
          B
        </div>
<div class="flex flex-col">
<h2 class="font-headline-sm text-headline-sm text-text-primary">প্যাকেজ, মূল্য ও পেমেন্ট নিয়ম</h2>
<span class="font-caption text-caption text-text-muted">স্বচ্ছ হিসাবরক্ষণ, অগ্রিম ও পেমেন্ট গেটওয়ে পলিসি</span>
</div>
</div>
<div class="space-y-4">
<div class="faq-card bg-surface-card rounded-2xl transition-all duration-200 overflow-hidden" data-keywords="হিডেন চার্জ লুকায়িত খরচ অতিরিক্ত টাকা প্যাকেজ মূল্য hidden cost extra charge pricing">
<button class="faq-toggle w-full p-6 text-left flex items-start justify-between gap-4 focus:outline-none">
<div class="flex items-start gap-4">
<span class="material-symbols-outlined text-primary-container text-[24px] mt-0.5 shrink-0">verified</span>
<span class="font-title-md text-title-md text-text-primary font-semibold">কাজের বাইরে কিছু যোগ হলে খরচ কীভাবে জানানো হয়?</span>
</div>
<div class="w-8 h-8 rounded-full bg-surface-card-elevated flex items-center justify-center text-text-secondary shrink-0 transition-transform duration-300 icon-arrow">
<span class="material-symbols-outlined text-[20px]">expand_more</span>
</div>
</button>
<div class="faq-answer hidden px-6 pb-6 pt-0 text-text-secondary font-body-md text-body-md space-y-3">
<p class="text-text-primary font-medium">
              কাজ শুরুর আগে প্রস্তাবে কাজের পরিধি ও মূল্য জানিয়ে দেওয়া হয়।
            </p>
<p>
              প্রস্তাবের বাইরে নতুন ফিচার বা কাজ যোগ হলে তার খরচ ও সময় আলাদা করে জানানো হবে। আপনি সম্মতি দিলেই সেই কাজ শুরু হবে।
            </p>
<div class="p-4 rounded-xl bg-surface-default flex items-center gap-3">
<span class="material-symbols-outlined text-primary-container">info</span>
<span class="font-body-sm text-body-sm text-text-secondary">ডোমেইন, হোস্টিং ও নবায়নের খরচ প্রজেক্টভেদে আলাদা হতে পারে; প্রস্তাবে তা উল্লেখ থাকবে।</span>
</div>
</div>
</div>
<div class="faq-card bg-surface-card rounded-2xl transition-all duration-200 overflow-hidden" data-keywords="পেমেন্ট কিস্তি বিকাশ নগদ ব্যাংক অগ্রিম টাকা payment bKash installment advance">
<button class="faq-toggle w-full p-6 text-left flex items-start justify-between gap-4 focus:outline-none">
<div class="flex items-start gap-4">
<span class="material-symbols-outlined text-primary-container text-[24px] mt-0.5 shrink-0">payments</span>
<span class="font-title-md text-title-md text-text-primary font-semibold">পেমেন্ট কীভাবে এবং কোন কোন মাধ্যমে করতে হবে?</span>
</div>
<div class="w-8 h-8 rounded-full bg-surface-card-elevated flex items-center justify-center text-text-secondary shrink-0 transition-transform duration-300 icon-arrow">
<span class="material-symbols-outlined text-[20px]">expand_more</span>
</div>
</button>
<div class="faq-answer hidden px-6 pb-6 pt-0 text-text-secondary font-body-md text-body-md space-y-4">
<p>
              পেমেন্টের ধাপ প্রজেক্টের পরিধি অনুযায়ী প্রস্তাবে উল্লেখ থাকবে। কাজ শুরুর আগেই তা দেখে নিতে পারবেন।
            </p>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
<div class="p-4 rounded-xl bg-surface-default">
<span class="font-label-md text-label-md text-primary-container uppercase">পেমেন্টের সময়সূচি</span>
<p class="font-body-sm text-body-sm text-text-secondary mt-1">কাজ শুরুর আগে প্রস্তাবে ধাপ ও পরিমাণ জানানো হবে।</p>
</div>
<div class="p-4 rounded-xl bg-surface-default">
<span class="font-label-md text-label-md text-primary-container uppercase">অতিরিক্ত কাজ</span>
<p class="font-body-sm text-body-sm text-text-secondary mt-1">নতুন কোনো কাজ যোগ হলে আগে খরচ ও সময় নিশ্চিত করা হবে।</p>
</div>
</div>
<div class="flex flex-wrap items-center gap-3 pt-2 font-label-md text-label-md text-text-muted">
<span>গ্রহণযোগ্য মাধ্যম:</span>
<span class="px-3 py-1 rounded bg-surface-card-elevated text-text-primary">বিকাশ (মার্চেন্ট/পার্সোনাল)</span>
<span class="px-3 py-1 rounded bg-surface-card-elevated text-text-primary">নগদ</span>
<span class="px-3 py-1 rounded bg-surface-card-elevated text-text-primary">ব্যাংক ট্রান্সফার</span>
</div>
</div>
</div>
</div>
</div><div class="faq-group space-y-space-md" data-group="infrastructure">
<div class="flex items-center gap-3 pb-2">
<div class="w-8 h-8 rounded-lg bg-surface-card-elevated text-primary-container flex items-center justify-center font-bold font-label-md">
          C
        </div>
<div class="flex flex-col">
<h2 class="font-headline-sm text-headline-sm text-text-primary">ডোমেইন, হোস্টিং ও সোর্স কোড</h2>
<span class="font-caption text-caption text-text-muted">ক্লাউড সার্ভার, ডেটা নিরাপত্তা ও মালিকানা সংক্রান্ত তথ্য</span>
</div>
</div>
<div class="space-y-4">
<div class="faq-card bg-surface-card rounded-2xl transition-all duration-200 overflow-hidden" data-keywords="ডোমেইন হোস্টিং সার্ভার স্পিড প্যাকেজ domain hosting server speed cloud">
<button class="faq-toggle w-full p-6 text-left flex items-start justify-between gap-4 focus:outline-none">
<div class="flex items-start gap-4">
<span class="material-symbols-outlined text-primary-container text-[24px] mt-0.5 shrink-0">dns</span>
<span class="font-title-md text-title-md text-text-primary font-semibold">ডোমেইন ও হোস্টিং কি আপনারা প্রদান করেন নাকি আমাকে কিনতে হবে?</span>
</div>
<div class="w-8 h-8 rounded-full bg-surface-card-elevated flex items-center justify-center text-text-secondary shrink-0 transition-transform duration-300 icon-arrow">
<span class="material-symbols-outlined text-[20px]">expand_more</span>
</div>
</button>
<div class="faq-answer hidden px-6 pb-6 pt-0 text-text-secondary font-body-md text-body-md space-y-3">
<p>
ডোমেইন ও হোস্টিংয়ের ব্যবস্থা প্যাকেজ ও প্রজেক্টের পরিধির ওপর নির্ভর করে। আপনার আগে থেকে থাকলে সেটিও ব্যবহার করা যেতে পারে।
            </p>
<p>
              নতুন ডোমেইন বা হোস্টিং দরকার হলে, কেনার আগে বিকল্প ও নবায়ন খরচ নিয়ে আলোচনা করে নিন।
            </p>
</div>
</div>
<div class="faq-card bg-surface-card rounded-2xl transition-all duration-200 overflow-hidden" data-keywords="মালিকানা সোর্স কোড কন্ট্রোল সিপ্যানেল ownership source code database github">
<button class="faq-toggle w-full p-6 text-left flex items-start justify-between gap-4 focus:outline-none">
<div class="flex items-start gap-4">
<span class="material-symbols-outlined text-primary-container text-[24px] mt-0.5 shrink-0">code</span>
<span class="font-title-md text-title-md text-text-primary font-semibold">ওয়েবসাইটের সম্পূর্ণ সোর্স কোড ও মালিকানা কি আমার থাকবে?</span>
</div>
<div class="w-8 h-8 rounded-full bg-surface-card-elevated flex items-center justify-center text-text-secondary shrink-0 transition-transform duration-300 icon-arrow">
<span class="material-symbols-outlined text-[20px]">expand_more</span>
</div>
</button>
<div class="faq-answer hidden px-6 pb-6 pt-0 text-text-secondary font-body-md text-body-md space-y-3">
<div class="flex items-center gap-2 text-primary-container font-semibold">
<span class="material-symbols-outlined text-[20px]">task_alt</span>
<span>মালিকানা ও হস্তান্তরের শর্ত প্রজেক্ট প্রস্তাবে থাকবে।</span>
</div>
<p>
              কাজ শুরুর আগে কী কী ফাইল, অ্যাকাউন্ট বা অ্যাক্সেস হস্তান্তর করা হবে, তা লিখিতভাবে ঠিক করে নিন। সাধারণত প্রাসঙ্গিক বিষয়গুলো হলো:
            </p>
<div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-1">
<div class="p-3 bg-surface-default rounded-xl text-center">
<span class="font-label-lg text-label-lg text-text-primary font-bold">সার্ভার অ্যাক্সেস</span>
<p class="font-caption text-caption text-text-muted mt-0.5">cPanel / Cloudflare ক্রেডেনশিয়াল</p>
</div>
<div class="p-3 bg-surface-default rounded-xl text-center">
<span class="font-label-lg text-label-lg text-text-primary font-bold">সোর্স কোড</span>
<p class="font-caption text-caption text-text-muted mt-0.5">সম্পূর্ণ ফাইল ও ডেটাবেজ ব্যাকআপ</p>
</div>
<div class="p-3 bg-surface-default rounded-xl text-center">
<span class="font-label-lg text-label-lg text-text-primary font-bold">এডমিন অ্যাকাউন্ট</span>
<p class="font-caption text-caption text-text-muted mt-0.5">সুপার অ্যাডমিন ইমেইল হস্তান্তর</p>
</div>
</div>
</div>
</div>
</div>
</div><div class="faq-group space-y-space-md" data-group="support">
<div class="flex items-center gap-3 pb-2">
<div class="w-8 h-8 rounded-lg bg-surface-card-elevated text-primary-container flex items-center justify-center font-bold font-label-md">
          D
        </div>
<div class="flex flex-col">
<h2 class="font-headline-sm text-headline-sm text-text-primary">অ্যাডমিন প্যানেল ও বিক্রয়োত্তর সাপোর্ট</h2>
<span class="font-caption text-caption text-text-muted">কনটেন্ট আপডেট, সিকিউরিটি ও দীর্ঘমেয়াদী টেক কেয়ার</span>
</div>
</div>
<div class="space-y-4">
<div class="faq-card bg-surface-card rounded-2xl transition-all duration-200 overflow-hidden" data-keywords="অ্যাডমিন পরিবর্তন নিজে আপডেট ছবি দাম প্রোডাক্ট admin control product update video tutorial">
<button class="faq-toggle w-full p-6 text-left flex items-start justify-between gap-4 focus:outline-none">
<div class="flex items-start gap-4">
<span class="material-symbols-outlined text-primary-container text-[24px] mt-0.5 shrink-0">tune</span>
<span class="font-title-md text-title-md text-text-primary font-semibold">ওয়েবসাইট লঞ্চের পর আমি কি নিজে ছবি, দাম বা পণ্য পরিবর্তন করতে পারব?</span>
</div>
<div class="w-8 h-8 rounded-full bg-surface-card-elevated flex items-center justify-center text-text-secondary shrink-0 transition-transform duration-300 icon-arrow">
<span class="material-symbols-outlined text-[20px]">expand_more</span>
</div>
</button>
<div class="faq-answer hidden px-6 pb-6 pt-0 text-text-secondary font-body-md text-body-md space-y-3">
<p>
প্রজেক্টে অ্যাডমিন প্যানেল থাকলে, কোন তথ্য আপনি নিজে বদলাতে পারবেন তা কাজের সময় ঠিক করা হবে। প্রয়োজনে হস্তান্তরের সময় ব্যবহারবিধিও দেখিয়ে দেওয়া হবে।
            </p>
<ul class="space-y-2 text-body-sm text-body-sm">
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary-container text-[18px]">done</span>
<span>স্মার্টফোন বা ল্যাপটপ থেকে যেকোনো সময় নতুন প্রোডাক্ট, অফার ব্যানার ও মূল্য পরিবর্তন।</span>
</li>
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary-container text-[18px]">done</span>
<span>অর্ডার আসার সাথে সাথে গ্রাহকের নাম, ফোন ও ডেলিভারি ঠিকানা গুছিয়ে দেখা।</span>
</li>
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary-container text-[18px]">done</span>
<span>আমরা আপনার জন্য <strong>কাস্টম ভিডিও গাইড ও ট্রেনিং</strong> সরবরাহ করব।</span>
</li>
</ul>
</div>
</div>
<div class="faq-card bg-surface-card rounded-2xl transition-all duration-200 overflow-hidden" data-keywords="টেকনিক্যাল সমস্যা সাপোর্ট নষ্ট হেল্পডেস্ক bug support technical maintenance warranty">
<button class="faq-toggle w-full p-6 text-left flex items-start justify-between gap-4 focus:outline-none">
<div class="flex items-start gap-4">
<span class="material-symbols-outlined text-primary-container text-[24px] mt-0.5 shrink-0">contact_support</span>
<span class="font-title-md text-title-md text-text-primary font-semibold">ওয়েবসাইট লঞ্চের পর কোনো টেকনিক্যাল সমস্যা হলে কী ধরণের সাপোর্ট পাব?</span>
</div>
<div class="w-8 h-8 rounded-full bg-surface-card-elevated flex items-center justify-center text-text-secondary shrink-0 transition-transform duration-300 icon-arrow">
<span class="material-symbols-outlined text-[20px]">expand_more</span>
</div>
</button>
<div class="faq-answer hidden px-6 pb-6 pt-0 text-text-secondary font-body-md text-body-md space-y-3">
<p>
              ওয়েবসাইট লঞ্চ করার সাথে সাথে আমাদের সম্পর্ক শেষ হয় না, বরং শুরু হয়।
            </p>
<p>
              সাপোর্টের সময়, অন্তর্ভুক্ত কাজ ও যোগাযোগের মাধ্যম প্যাকেজ বা প্রজেক্ট প্রস্তাবে উল্লেখ থাকবে। কাজ শুরুর আগে এসব বিষয় নিশ্চিত করে নিন।
            </p>
<p class="font-body-sm text-body-sm text-text-muted">
              নিয়মিত ব্যাকআপ, নিরাপত্তা আপডেট বা হোস্টিং রক্ষণাবেক্ষণ দরকার হলে সেটি আলাদা সেবা হিসেবে আলোচনা করা যাবে।
            </p>
</div>
</div>
</div>
</div><div class="hidden text-center py-space-xl bg-surface-card rounded-2xl p-8 space-y-3" id="noFaqResults">
<span class="material-symbols-outlined text-[48px] text-text-muted">search_off</span>
<h3 class="font-title-md text-title-md text-text-primary">আপনার অনুসন্ধানের সাথে মিল পাওয়া যায়নি</h3>
<p class="font-body-sm text-body-sm text-text-secondary max-w-md mx-auto">
        দয়া করে কি-ওয়ার্ড পরিবর্তন করে খুঁজুন অথবা আমাদের সরাসরি কল বা মেসেজ দিন।
      </p>
<button class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-surface-card-elevated text-primary-container font-label-md text-label-md hover:bg-surface-bright transition-colors" id="resetFilterAction" type="button">
<span class="material-symbols-outlined text-[16px]">refresh</span>
<span>সব প্রশ্ন রিসেট করুন</span>
</button>
</div></div>

</section><section class="w-full relative py-12 md:py-16">
<div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10"><div class="relative rounded-3xl bg-surface-card p-8 md:p-12 overflow-hidden shadow-2xl">
<div class="absolute -top-24 -right-24 w-80 h-80 bg-primary-container/10 rounded-full blur-3xl pointer-events-none"></div>
<div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
<div class="lg:col-span-5 space-y-3">
<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-surface-card-elevated text-primary-container font-label-md text-label-md">
<span class="material-symbols-outlined text-[14px]">forum</span>
<span>অন্য কোনো স্পেসিফিক প্রশ্ন আছে?</span>
</div>
<h3 class="font-headline-md text-headline-md text-text-primary">
            দ্বিধা ভুলে সরাসরি কথা বলুন আমাদের ইঞ্জিনিয়ারিং টিমের সাথে
          </h3>
<p class="font-body-sm text-body-sm text-text-secondary">
            প্রতিটি ব্যবসার চাহিদা অনন্য। আপনার নির্দিষ্ট বিজনেস মডেল অনুযায়ী সেরা সলিউশন ও সাশ্রয়ী খরচের পরিকল্পনা তৈরিতে আমরা সাহায্য করব।
          </p>
</div>
<div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-4">
<a class="group p-6 rounded-2xl bg-surface-card-elevated hover:bg-surface-bright transition-all duration-300 flex flex-col justify-between shadow-lg" href="https://wa.me/8801335198859?text=হ্যালো%20WhexSoft,%20আমার%20ওয়েবসাইট%20সম্পর্কে%20কিছু%20জানার%20ছিল" rel="noopener noreferrer" target="_blank">
<div class="space-y-3">
<div class="w-12 h-12 rounded-xl bg-success-whatsapp/15 text-success-whatsapp flex items-center justify-center group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-[26px]">chat</span>
</div>
<h4 class="font-title-md text-title-md text-text-primary font-bold">হোয়াটসঅ্যাপে চ্যাট করুন</h4>
<p class="font-body-sm text-body-sm text-text-secondary">
                তাৎক্ষণিক উত্তর পেতে মেসেজ দিন। আমাদের কনসালট্যান্ট সব সময় অ্যাক্টিভ।
              </p>
</div>
<div class="pt-4 flex items-center justify-between text-success-whatsapp font-label-lg text-label-lg font-semibold">
<span>০১৩৩৫-১৯৮৮৫৯</span>
<span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
</div>
</a>
<a class="group p-6 rounded-2xl bg-surface-card-elevated hover:bg-surface-bright transition-all duration-300 flex flex-col justify-between shadow-lg" href="tel:01335198859">
<div class="space-y-3">
<div class="w-12 h-12 rounded-xl bg-primary-container/15 text-primary-container flex items-center justify-center group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-[26px]">phone_in_talk</span>
</div>
<h4 class="font-title-md text-title-md text-text-primary font-bold">ফ্রি পরামর্শ কল</h4>
<p class="font-body-sm text-body-sm text-text-secondary">
                ১০ মিনিটের কনসালটেশনে বুঝে নিন আপনার ব্যবসার জন্য কোন প্যাকেজ উপযোগী।
              </p>
</div>
<div class="pt-4 flex items-center justify-between text-primary-container font-label-lg text-label-lg font-semibold">
<span>সরাসরি কল দিন</span>
<span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform">call</span>
</div>
</a>
</div>
</div>
</div></div>
</section><section class="w-full relative py-12 md:py-16">
<div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10"><div class="relative rounded-3xl bg-surface-card-elevated p-8 md:p-14 text-center overflow-hidden shadow-2xl">
<div class="max-w-2xl mx-auto space-y-space-md relative z-10">
<h2 class="font-headline-lg text-headline-lg text-text-primary font-bold">
          সব প্রশ্নের উত্তর পেয়েছেন? আজই আপনার প্রজেক্ট শুরু করুন
        </h2>
<p class="font-body-md text-body-md text-text-secondary">
          দেরি না করে আপনার অনলাইন ব্র্যান্ডিং ও সেলস বৃদ্ধিতে নির্ভরযোগ্য পার্টনার হিসেবে WhexSoft-কে বেছে নিন।
        </p>
<div class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-4">
<a class="w-full sm:w-auto inline-flex items-center justify-center h-12 px-8 rounded-xl bg-primary-container text-text-inverse font-label-lg text-label-lg font-bold hover:bg-primary-fixed-dim transition-all shadow-[0_0_24px_rgba(198,244,50,0.35)]" href="{{ route('pricing') }}">
            প্যাকেজসমূহ দেখুন
          </a>
<a class="w-full sm:w-auto inline-flex items-center justify-center h-12 px-8 rounded-xl bg-surface-card text-text-primary font-label-lg text-label-lg font-semibold hover:bg-surface-bright hover:text-primary-container transition-all" href="{{ route('contact') }}">
            যোগাযোগ করুন
          </a>
</div>
</div>
</div></div>
</section>
</main>
@endsection
