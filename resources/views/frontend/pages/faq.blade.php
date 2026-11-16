@extends('frontend.layouts.app') @section('title', 'সচরাচর জিজ্ঞাসা | WhexSoft')
@section('description', 'ওয়েবসাইট ডিজাইন, ডেভেলপমেন্ট, মূল্য, পেমেন্ট ও সাপোর্ট নিয়ে সচরাচর জিজ্ঞাসার উত্তর।')
@section('page', 'faq') @section('content')
<main class="w-100 position-relative site-effect-overflow-x-clip"><div class="position-absolute site-position-top-10 start-50 translate-middle-x site-dimension-w-arbitrary-700px site-dimension-h-arbitrary-350px bg-primary bg-opacity-10 site-effect-blur-arbitrary-130px rounded-pill pe-none"></div><div class="position-absolute site-position-top-arbitrary-800px end-0 site-dimension-w-arbitrary-450px site-dimension-h-arbitrary-450px bg-glow-lime site-effect-blur-arbitrary-150px rounded-pill pe-none"></div><section class="position-relative w-100 site-spacing-pt-32 site-responsive-md-spacing-pt-40 pb-5 site-responsive-md-spacing-pb-16 site-section site-section--dark">
        <div class="site-dimension-max-w-4xl mx-auto text-center site-spacing-space-y-space-md w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
            <div class="d-inline-flex align-items-center gap-2 px-3 site-spacing-py-1-5 rounded-pill site-surface-bg-surface-card-elevated text-primary site-type-font-label-md site-type-text-label-md site-elevation-shadow-arbitrary-0-0-20px-rgba-198-244-50-0-15 mx-auto bg-white text-dark small fw-medium">
                <span class="material-symbols-outlined fs-6">help_center</span>
                <span>প্রজেক্ট নিয়ে সাধারণ প্রশ্ন</span>
            </div>
            <h1 class="site-type-font-headline-lg site-type-text-headline-lg site-responsive-md-type-text-arbitrary-46px site-responsive-md-type-leading-arbitrary-56px text-light site-type-tracking-tight site-type-font-extrabold site-heading text-white"> সাধারণ প্রশ্নের উত্তর
            </h1>
            <p class="site-type-font-body-lg site-type-text-body-lg text-body-secondary site-dimension-max-w-2xl mx-auto site-copy text-secondary"> কাজের ধাপ, সম্ভাব্য খরচ, সময়সূচি ও লঞ্চ-পরবর্তী সহায়তা নিয়ে জানতে পারেন।
            </p>
            <div class="pt-3 site-dimension-max-w-2xl mx-auto">
                <div class="position-relative d-flex align-items-center site-surface-bg-surface-card rounded-4 site-elevation-shadow-xl site-motion-transition-all site-state-focus-within-elevation-shadow-arbitrary-0-0-28px-rgba-198-244-50-0-18 bg-white">
                    <div class="site-spacing-pl-space-md text-primary d-flex align-items-center justify-content-center text-dark">
                        <span class="material-symbols-outlined fs-4">search</span>
                    </div>
                    <input class="w-100 site-dimension-h-14 site-surface-bg-transparent px-3 site-type-font-body-md site-type-text-body-md text-light site-state-placeholder-color-text-text-muted site-state-focus-style-outline-none text-white" id="faqSearchInput" placeholder="আপনার প্রশ্ন লিখে খুঁজুন (যেমন: পেমেন্ট, ডোমেইন, সময়কাল, সাপোর্ট)..." type="text"/>
                    <button class="d-none site-spacing-mr-3 site-spacing-p-1-5 rounded-3 text-body-secondary site-state-hover-color-text-text-primary site-state-hover-surface-bg-surface-card-elevated site-motion-transition-colors text-secondary" id="clearSearchBtn" type="button">
                        <span class="material-symbols-outlined site-type-text-arbitrary-18px">close</span>
                    </button>
                </div>
            </div>
            <div class="d-grid site-layout-grid-cols-2 site-responsive-sm-layout-grid-cols-4 site-spacing-gap-3 pt-4 site-dimension-max-w-3xl mx-auto">
                <div class="site-spacing-p-3 rounded-4 site-surface-bg-surface-card text-start d-flex align-items-center site-spacing-gap-3 bg-white">
                    <div class="site-dimension-w-10 site-dimension-h-10 rounded-3 site-surface-bg-surface-card-elevated d-flex align-items-center justify-content-center text-primary bg-white text-dark">
                        <span class="material-symbols-outlined fs-5">bolt</span>
                    </div>
                    <div>
                        <div class="site-type-font-title-md site-type-text-title-md text-light fw-bold text-white">প্রজেক্ট অনুযায়ী</div>
                        <div class="site-type-font-caption site-type-text-caption text-body-secondary text-secondary small fw-medium">সময়সূচি</div>
                    </div>
                </div>
                <div class="site-spacing-p-3 rounded-4 site-surface-bg-surface-card text-start d-flex align-items-center site-spacing-gap-3 bg-white">
                    <div class="site-dimension-w-10 site-dimension-h-10 rounded-3 site-surface-bg-surface-card-elevated d-flex align-items-center justify-content-center text-primary bg-white text-dark">
                        <span class="material-symbols-outlined fs-5">format_image_left</span>
                    </div>
                    <div>
                        <div class="site-type-font-title-md site-type-text-title-md text-light fw-bold text-white">লিখিত শর্ত</div>
                        <div class="site-type-font-caption site-type-text-caption text-body-secondary text-secondary small fw-medium">কাজ শুরুর আগে</div>
                    </div>
                </div>
                <div class="site-spacing-p-3 rounded-4 site-surface-bg-surface-card text-start d-flex align-items-center site-spacing-gap-3 bg-white">
                    <div class="site-dimension-w-10 site-dimension-h-10 rounded-3 site-surface-bg-surface-card-elevated d-flex align-items-center justify-content-center text-primary bg-white text-dark">
                        <span class="material-symbols-outlined fs-5">currency_exchange</span>
                    </div>
                    <div>
                        <div class="site-type-font-title-md site-type-text-title-md text-light fw-bold text-white">স্পষ্ট কোটেশন</div>
                        <div class="site-type-font-caption site-type-text-caption text-body-secondary text-secondary small fw-medium">কাজের পরিধিসহ</div>
                    </div>
                </div>
                <div class="site-spacing-p-3 rounded-4 site-surface-bg-surface-card text-start d-flex align-items-center site-spacing-gap-3 bg-white">
                    <div class="site-dimension-w-10 site-dimension-h-10 rounded-3 site-surface-bg-surface-card-elevated d-flex align-items-center justify-content-center text-primary bg-white text-dark">
                        <span class="material-symbols-outlined fs-5">headset_mic</span>
                    </div>
                    <div>
                        <div class="site-type-font-title-md site-type-text-title-md text-light fw-bold text-white">যোগাযোগ</div>
                        <div class="site-type-font-caption site-type-text-caption text-body-secondary text-secondary small fw-medium">ফোন বা হোয়াটসঅ্যাপে</div>
                    </div>
                </div>
            </div>
            <div class="pt-3 d-flex flex-wrap align-items-center justify-content-center gap-2">
                <button class="faq-filter-btn site-spacing-px-5 site-spacing-py-2-5 rounded-pill site-type-font-label-lg site-type-text-label-lg site-motion-transition-all site-motion-duration-200 bg-primary site-color-text-text-inverse fw-bold site-elevation-shadow-arbitrary-0-0-18px-rgba-198-244-50-0-3 text-black fs-6" data-category="all"> সব প্রশ্ন
                </button>
                <button class="faq-filter-btn site-spacing-px-5 site-spacing-py-2-5 rounded-pill site-type-font-label-lg site-type-text-label-lg site-motion-transition-all site-motion-duration-200 site-surface-bg-surface-card text-body-secondary site-state-hover-color-text-text-primary site-state-hover-surface-bg-surface-card-elevated bg-white text-secondary fs-6" data-category="timeline"> প্রজেক্ট ও সময়সূচি
                </button>
                <button class="faq-filter-btn site-spacing-px-5 site-spacing-py-2-5 rounded-pill site-type-font-label-lg site-type-text-label-lg site-motion-transition-all site-motion-duration-200 site-surface-bg-surface-card text-body-secondary site-state-hover-color-text-text-primary site-state-hover-surface-bg-surface-card-elevated bg-white text-secondary fs-6" data-category="pricing"> প্যাকেজ ও পেমেন্ট
                </button>
                <button class="faq-filter-btn site-spacing-px-5 site-spacing-py-2-5 rounded-pill site-type-font-label-lg site-type-text-label-lg site-motion-transition-all site-motion-duration-200 site-surface-bg-surface-card text-body-secondary site-state-hover-color-text-text-primary site-state-hover-surface-bg-surface-card-elevated bg-white text-secondary fs-6" data-category="infrastructure"> ডোমেইন ও হোস্টিং
                </button>
                <button class="faq-filter-btn site-spacing-px-5 site-spacing-py-2-5 rounded-pill site-type-font-label-lg site-type-text-label-lg site-motion-transition-all site-motion-duration-200 site-surface-bg-surface-card text-body-secondary site-state-hover-color-text-text-primary site-state-hover-surface-bg-surface-card-elevated bg-white text-secondary fs-6" data-category="support"> সাপোর্ট ও অ্যাডমিন
                </button>
            </div>
        </div>
    </section><section class="w-100 position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--light">
        <div class="site-dimension-max-w-5xl mx-auto site-spacing-space-y-space-2xl w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10"><div class="faq-group site-spacing-space-y-space-md" data-group="timeline">
                <div class="d-flex align-items-center site-spacing-gap-3 pb-2">
                    <div class="site-dimension-w-8 site-dimension-h-8 rounded-3 site-surface-bg-surface-card-elevated text-primary d-flex align-items-center justify-content-center fw-bold site-type-font-label-md bg-white text-dark"> A
                    </div>
                    <div class="d-flex flex-column">
                        <h2 class="site-type-font-headline-sm site-type-text-headline-sm text-light site-heading text-white">প্রজেক্ট ও ডেলিভারি সময়কাল</h2>
                        <span class="site-type-font-caption site-type-text-caption text-body-secondary text-secondary small fw-medium">কাজের গতি, ধাপসমূহ এবং প্রস্তুতি সংক্রান্ত প্রশ্ন</span>
                    </div>
                </div>
                <div class="site-spacing-space-y-4">
                    <div class="faq-card site-surface-bg-surface-card rounded-4 site-motion-transition-all site-motion-duration-200 overflow-hidden bg-white" data-keywords="সময় কত দিন ডেলিভারি লঞ্চ ল্যান্ডিং পেজ ই-কমার্স timeline delivery">
                        <button class="faq-toggle w-100 p-4 text-start d-flex align-items-start justify-content-between gap-3 site-state-focus-style-outline-none">
                            <div class="d-flex align-items-start gap-3">
                                <span class="material-symbols-outlined text-primary fs-4 site-spacing-mt-0-5 flex-shrink-0 text-dark">timer</span>
                                <span class="site-type-font-title-md site-type-text-title-md text-light fw-semibold text-white">একটি ওয়েবসাইট বানাতে ঠিক কত সময় লাগে?</span>
                            </div>
                            <div class="site-dimension-w-8 site-dimension-h-8 rounded-pill site-surface-bg-surface-card-elevated d-flex align-items-center justify-content-center text-body-secondary flex-shrink-0 site-motion-transition-transform site-motion-duration-300 icon-arrow bg-white text-secondary">
                                <span class="material-symbols-outlined fs-5">expand_more</span>
                            </div>
                        </button>
                        <div class="faq-answer d-none px-4 pb-4 pt-0 text-body-secondary site-type-font-body-md site-type-text-body-md site-spacing-space-y-3 text-secondary">
                            <p class="site-copy"> সময় নির্ভর করে পেজ, ফিচার, কনটেন্ট প্রস্তুত থাকা এবং প্রয়োজনীয় সংযোগের ওপর। কাজ শুরুর আগে আমরা সম্ভাব্য সময়সূচি জানাই:
                            </p>
                            <div class="d-grid site-layout-grid-cols-1 site-responsive-sm-layout-grid-cols-2 site-spacing-gap-3 pt-2">
                                <div class="p-3 rounded-4 site-surface-bg-surface-default d-flex align-items-start site-spacing-gap-3">
                                    <span class="material-symbols-outlined text-primary fs-5 site-spacing-mt-0-5 text-dark">check_circle</span>
                                    <div>
                                        <div class="site-type-font-label-lg site-type-text-label-lg text-light fw-semibold text-white fs-6">ল্যান্ডিং পেজ</div>
                                        <div class="site-type-font-caption site-type-text-caption text-body-secondary mt-1 text-secondary small fw-medium">পেজ ও ফিচারের পরিধি অনুযায়ী সময় ঠিক হয়।</div>
                                    </div>
                                </div>
                                <div class="p-3 rounded-4 site-surface-bg-surface-default d-flex align-items-start site-spacing-gap-3">
                                    <span class="material-symbols-outlined text-primary fs-5 site-spacing-mt-0-5 text-dark">check_circle</span>
                                    <div>
                                        <div class="site-type-font-label-lg site-type-text-label-lg text-light fw-semibold text-white fs-6">ই-কমার্স বা কর্পোরেট সাইট</div>
                                        <div class="site-type-font-caption site-type-text-caption text-body-secondary mt-1 text-secondary small fw-medium">কনটেন্ট ও প্রয়োজনীয় ফিচার দেখে সময়সূচি জানানো হয়।</div>
                                    </div>
                                </div>
                            </div>
                            <p class="site-type-font-body-sm site-type-text-body-sm text-body-secondary pt-1 site-copy text-secondary fs-6 fw-medium"> বিশেষ ফিচার বা ইন্টিগ্রেশন থাকলে সেগুলোর সময়ও আলাদা করে হিসাব করা হবে।
                            </p>
                        </div>
                    </div>
                    <div class="faq-card site-surface-bg-surface-card rounded-4 site-motion-transition-all site-motion-duration-200 overflow-hidden bg-white" data-keywords="উপাদান তথ্য লোগো ছবি কি লাগবে শুরু requirements asset logo text">
                        <button class="faq-toggle w-100 p-4 text-start d-flex align-items-start justify-content-between gap-3 site-state-focus-style-outline-none">
                            <div class="d-flex align-items-start gap-3">
                                <span class="material-symbols-outlined text-primary fs-4 site-spacing-mt-0-5 flex-shrink-0 text-dark">inventory_2</span>
                                <span class="site-type-font-title-md site-type-text-title-md text-light fw-semibold text-white">কাজ শুরুর জন্য আমাকে কী কী তথ্য বা উপাদান দিতে হবে?</span>
                            </div>
                            <div class="site-dimension-w-8 site-dimension-h-8 rounded-pill site-surface-bg-surface-card-elevated d-flex align-items-center justify-content-center text-body-secondary flex-shrink-0 site-motion-transition-transform site-motion-duration-300 icon-arrow bg-white text-secondary">
                                <span class="material-symbols-outlined fs-5">expand_more</span>
                            </div>
                        </button>
                        <div class="faq-answer d-none px-4 pb-4 pt-0 text-body-secondary site-type-font-body-md site-type-text-body-md site-spacing-space-y-3 text-secondary">
                            <p class="site-copy"> শুরুতে আপনার ব্যবসা ও প্রয়োজনীয় ফিচার সম্পর্কে কিছু তথ্য জানলেই হয়। লোগো, পণ্য বা সেবার বিবরণ এবং যোগাযোগের তথ্য থাকলে কাজ এগোতে সুবিধা হয়।
                            </p>
                            <ul class="site-spacing-space-y-2">
                                <li class="d-flex align-items-center site-spacing-gap-3 site-body-text">
                                    <span class="site-dimension-w-1-5 site-dimension-h-1-5 rounded-pill bg-primary"></span>
                                    <span><strong class="site-body-text">ব্যবসার লোগো:</strong> লোগোর স্বচ্ছ পিএনজি বা ভেক্টর ফাইল (না থাকলে আমাদের ডিজাইন টিম সাহায্য করবে)।</span>
                                </li>
                                <li class="d-flex align-items-center site-spacing-gap-3 site-body-text">
                                    <span class="site-dimension-w-1-5 site-dimension-h-1-5 rounded-pill bg-primary"></span>
                                    <span><strong class="site-body-text">পণ্য বা সার্ভিসের ছবি ও বিবরণ:</strong> আপনার প্রোডাক্টের স্পষ্ট ছবি, মূল্য এবং বিবরণ।</span>
                                </li>
                                <li class="d-flex align-items-center site-spacing-gap-3 site-body-text">
                                    <span class="site-dimension-w-1-5 site-dimension-h-1-5 rounded-pill bg-primary"></span>
                                    <span><strong class="site-body-text">যোগাযোগের তথ্য:</strong> অফিশিয়াল মোবাইল/হোয়াটসঅ্যাপ নম্বর, ঠিকানা এবং সোশ্যাল মিডিয়া লিংক।</span>
                                </li>
                                <li class="d-flex align-items-center site-spacing-gap-3 site-body-text">
                                    <span class="site-dimension-w-1-5 site-dimension-h-1-5 rounded-pill bg-primary"></span>
                                    <span><strong class="site-body-text">পছন্দের রেফারেন্স (ঐচ্ছিক):</strong> আপনার পছন্দের কোনো ওয়েবসাইটের উদাহরণ থাকলে শেয়ার করতে পারেন।</span>
                                </li>
                            </ul>
                            <p class="site-type-font-body-sm site-type-text-body-sm text-body-secondary site-copy text-secondary fs-6 fw-medium"> কনটেন্ট লেখা, ছবি বা ব্যানার তৈরির কাজ প্রয়োজন হলে সেগুলো কাজের পরিধিতে অন্তর্ভুক্ত কি না, আগে আলোচনা করে নিন।
                            </p>
                        </div>
                    </div>
                </div>
            </div><div class="faq-group site-spacing-space-y-space-md" data-group="pricing">
                <div class="d-flex align-items-center site-spacing-gap-3 pb-2">
                    <div class="site-dimension-w-8 site-dimension-h-8 rounded-3 site-surface-bg-surface-card-elevated text-primary d-flex align-items-center justify-content-center fw-bold site-type-font-label-md bg-white text-dark"> B
                    </div>
                    <div class="d-flex flex-column">
                        <h2 class="site-type-font-headline-sm site-type-text-headline-sm text-light site-heading text-white">প্যাকেজ, মূল্য ও পেমেন্ট নিয়ম</h2>
                        <span class="site-type-font-caption site-type-text-caption text-body-secondary text-secondary small fw-medium">স্বচ্ছ হিসাবরক্ষণ, অগ্রিম ও পেমেন্ট গেটওয়ে পলিসি</span>
                    </div>
                </div>
                <div class="site-spacing-space-y-4">
                    <div class="faq-card site-surface-bg-surface-card rounded-4 site-motion-transition-all site-motion-duration-200 overflow-hidden bg-white" data-keywords="হিডেন চার্জ লুকায়িত খরচ অতিরিক্ত টাকা প্যাকেজ মূল্য hidden cost extra charge pricing">
                        <button class="faq-toggle w-100 p-4 text-start d-flex align-items-start justify-content-between gap-3 site-state-focus-style-outline-none">
                            <div class="d-flex align-items-start gap-3">
                                <span class="material-symbols-outlined text-primary fs-4 site-spacing-mt-0-5 flex-shrink-0 text-dark">verified</span>
                                <span class="site-type-font-title-md site-type-text-title-md text-light fw-semibold text-white">কাজের বাইরে কিছু যোগ হলে খরচ কীভাবে জানানো হয়?</span>
                            </div>
                            <div class="site-dimension-w-8 site-dimension-h-8 rounded-pill site-surface-bg-surface-card-elevated d-flex align-items-center justify-content-center text-body-secondary flex-shrink-0 site-motion-transition-transform site-motion-duration-300 icon-arrow bg-white text-secondary">
                                <span class="material-symbols-outlined fs-5">expand_more</span>
                            </div>
                        </button>
                        <div class="faq-answer d-none px-4 pb-4 pt-0 text-body-secondary site-type-font-body-md site-type-text-body-md site-spacing-space-y-3 text-secondary">
                            <p class="text-light fw-medium site-copy text-white"> কাজ শুরুর আগে প্রস্তাবে কাজের পরিধি ও মূল্য জানিয়ে দেওয়া হয়।
                            </p>
                            <p class="site-copy"> প্রস্তাবের বাইরে নতুন ফিচার বা কাজ যোগ হলে তার খরচ ও সময় আলাদা করে জানানো হবে। আপনি সম্মতি দিলেই সেই কাজ শুরু হবে।
                            </p>
                            <div class="p-3 rounded-4 site-surface-bg-surface-default d-flex align-items-center site-spacing-gap-3">
                                <span class="material-symbols-outlined text-primary text-dark">info</span>
                                <span class="site-type-font-body-sm site-type-text-body-sm text-body-secondary text-secondary fs-6 fw-medium">ডোমেইন, হোস্টিং ও নবায়নের খরচ প্রজেক্টভেদে আলাদা হতে পারে; প্রস্তাবে তা উল্লেখ থাকবে।</span>
                            </div>
                        </div>
                    </div>
                    <div class="faq-card site-surface-bg-surface-card rounded-4 site-motion-transition-all site-motion-duration-200 overflow-hidden bg-white" data-keywords="পেমেন্ট কিস্তি বিকাশ নগদ ব্যাংক অগ্রিম টাকা payment bKash installment advance">
                        <button class="faq-toggle w-100 p-4 text-start d-flex align-items-start justify-content-between gap-3 site-state-focus-style-outline-none">
                            <div class="d-flex align-items-start gap-3">
                                <span class="material-symbols-outlined text-primary fs-4 site-spacing-mt-0-5 flex-shrink-0 text-dark">payments</span>
                                <span class="site-type-font-title-md site-type-text-title-md text-light fw-semibold text-white">পেমেন্ট কীভাবে এবং কোন কোন মাধ্যমে করতে হবে?</span>
                            </div>
                            <div class="site-dimension-w-8 site-dimension-h-8 rounded-pill site-surface-bg-surface-card-elevated d-flex align-items-center justify-content-center text-body-secondary flex-shrink-0 site-motion-transition-transform site-motion-duration-300 icon-arrow bg-white text-secondary">
                                <span class="material-symbols-outlined fs-5">expand_more</span>
                            </div>
                        </button>
                        <div class="faq-answer d-none px-4 pb-4 pt-0 text-body-secondary site-type-font-body-md site-type-text-body-md site-spacing-space-y-4 text-secondary">
                            <p class="site-copy"> পেমেন্টের ধাপ প্রজেক্টের পরিধি অনুযায়ী প্রস্তাবে উল্লেখ থাকবে। কাজ শুরুর আগেই তা দেখে নিতে পারবেন।
                            </p>
                            <div class="d-grid site-layout-grid-cols-1 site-responsive-sm-layout-grid-cols-2 site-spacing-gap-3">
                                <div class="p-3 rounded-4 site-surface-bg-surface-default">
                                    <span class="site-type-font-label-md site-type-text-label-md text-primary text-uppercase text-dark small fw-medium">পেমেন্টের সময়সূচি</span>
                                    <p class="site-type-font-body-sm site-type-text-body-sm text-body-secondary mt-1 site-copy text-secondary fs-6 fw-medium">কাজ শুরুর আগে প্রস্তাবে ধাপ ও পরিমাণ জানানো হবে।</p>
                                </div>
                                <div class="p-3 rounded-4 site-surface-bg-surface-default">
                                    <span class="site-type-font-label-md site-type-text-label-md text-primary text-uppercase text-dark small fw-medium">অতিরিক্ত কাজ</span>
                                    <p class="site-type-font-body-sm site-type-text-body-sm text-body-secondary mt-1 site-copy text-secondary fs-6 fw-medium">নতুন কোনো কাজ যোগ হলে আগে খরচ ও সময় নিশ্চিত করা হবে।</p>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap align-items-center site-spacing-gap-3 pt-2 site-type-font-label-md site-type-text-label-md text-body-secondary text-secondary small fw-medium">
                                <span>গ্রহণযোগ্য মাধ্যম:</span>
                                <span class="site-spacing-px-3 py-1 rounded-1 site-surface-bg-surface-card-elevated text-light bg-white text-white">বিকাশ (মার্চেন্ট/পার্সোনাল)</span>
                                <span class="site-spacing-px-3 py-1 rounded-1 site-surface-bg-surface-card-elevated text-light bg-white text-white">নগদ</span>
                                <span class="site-spacing-px-3 py-1 rounded-1 site-surface-bg-surface-card-elevated text-light bg-white text-white">ব্যাংক ট্রান্সফার</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><div class="faq-group site-spacing-space-y-space-md" data-group="infrastructure">
                <div class="d-flex align-items-center site-spacing-gap-3 pb-2">
                    <div class="site-dimension-w-8 site-dimension-h-8 rounded-3 site-surface-bg-surface-card-elevated text-primary d-flex align-items-center justify-content-center fw-bold site-type-font-label-md bg-white text-dark"> C
                    </div>
                    <div class="d-flex flex-column">
                        <h2 class="site-type-font-headline-sm site-type-text-headline-sm text-light site-heading text-white">ডোমেইন, হোস্টিং ও সোর্স কোড</h2>
                        <span class="site-type-font-caption site-type-text-caption text-body-secondary text-secondary small fw-medium">ক্লাউড সার্ভার, ডেটা নিরাপত্তা ও মালিকানা সংক্রান্ত তথ্য</span>
                    </div>
                </div>
                <div class="site-spacing-space-y-4">
                    <div class="faq-card site-surface-bg-surface-card rounded-4 site-motion-transition-all site-motion-duration-200 overflow-hidden bg-white" data-keywords="ডোমেইন হোস্টিং সার্ভার স্পিড প্যাকেজ domain hosting server speed cloud">
                        <button class="faq-toggle w-100 p-4 text-start d-flex align-items-start justify-content-between gap-3 site-state-focus-style-outline-none">
                            <div class="d-flex align-items-start gap-3">
                                <span class="material-symbols-outlined text-primary fs-4 site-spacing-mt-0-5 flex-shrink-0 text-dark">dns</span>
                                <span class="site-type-font-title-md site-type-text-title-md text-light fw-semibold text-white">ডোমেইন ও হোস্টিং কি আপনারা প্রদান করেন নাকি আমাকে কিনতে হবে?</span>
                            </div>
                            <div class="site-dimension-w-8 site-dimension-h-8 rounded-pill site-surface-bg-surface-card-elevated d-flex align-items-center justify-content-center text-body-secondary flex-shrink-0 site-motion-transition-transform site-motion-duration-300 icon-arrow bg-white text-secondary">
                                <span class="material-symbols-outlined fs-5">expand_more</span>
                            </div>
                        </button>
                        <div class="faq-answer d-none px-4 pb-4 pt-0 text-body-secondary site-type-font-body-md site-type-text-body-md site-spacing-space-y-3 text-secondary">
                            <p class="site-copy">
ডোমেইন ও হোস্টিংয়ের ব্যবস্থা প্যাকেজ ও প্রজেক্টের পরিধির ওপর নির্ভর করে। আপনার আগে থেকে থাকলে সেটিও ব্যবহার করা যেতে পারে।
                            </p>
                            <p class="site-copy"> নতুন ডোমেইন বা হোস্টিং দরকার হলে, কেনার আগে বিকল্প ও নবায়ন খরচ নিয়ে আলোচনা করে নিন।
                            </p>
                        </div>
                    </div>
                    <div class="faq-card site-surface-bg-surface-card rounded-4 site-motion-transition-all site-motion-duration-200 overflow-hidden bg-white" data-keywords="মালিকানা সোর্স কোড কন্ট্রোল সিপ্যানেল ownership source code database github">
                        <button class="faq-toggle w-100 p-4 text-start d-flex align-items-start justify-content-between gap-3 site-state-focus-style-outline-none">
                            <div class="d-flex align-items-start gap-3">
                                <span class="material-symbols-outlined text-primary fs-4 site-spacing-mt-0-5 flex-shrink-0 text-dark">code</span>
                                <span class="site-type-font-title-md site-type-text-title-md text-light fw-semibold text-white">ওয়েবসাইটের সম্পূর্ণ সোর্স কোড ও মালিকানা কি আমার থাকবে?</span>
                            </div>
                            <div class="site-dimension-w-8 site-dimension-h-8 rounded-pill site-surface-bg-surface-card-elevated d-flex align-items-center justify-content-center text-body-secondary flex-shrink-0 site-motion-transition-transform site-motion-duration-300 icon-arrow bg-white text-secondary">
                                <span class="material-symbols-outlined fs-5">expand_more</span>
                            </div>
                        </button>
                        <div class="faq-answer d-none px-4 pb-4 pt-0 text-body-secondary site-type-font-body-md site-type-text-body-md site-spacing-space-y-3 text-secondary">
                            <div class="d-flex align-items-center gap-2 text-primary fw-semibold text-dark">
                                <span class="material-symbols-outlined fs-5">task_alt</span>
                                <span>মালিকানা ও হস্তান্তরের শর্ত প্রজেক্ট প্রস্তাবে থাকবে।</span>
                            </div>
                            <p class="site-copy"> কাজ শুরুর আগে কী কী ফাইল, অ্যাকাউন্ট বা অ্যাক্সেস হস্তান্তর করা হবে, তা লিখিতভাবে ঠিক করে নিন। সাধারণত প্রাসঙ্গিক বিষয়গুলো হলো:
                            </p>
                            <div class="d-grid site-layout-grid-cols-1 site-responsive-sm-layout-grid-cols-3 site-spacing-gap-3 pt-1">
                                <div class="site-spacing-p-3 site-surface-bg-surface-default rounded-4 text-center">
                                    <span class="site-type-font-label-lg site-type-text-label-lg text-light fw-bold text-white fs-6">সার্ভার অ্যাক্সেস</span>
                                    <p class="site-type-font-caption site-type-text-caption text-body-secondary site-spacing-mt-0-5 site-copy text-secondary small fw-medium">cPanel / Cloudflare ক্রেডেনশিয়াল</p>
                                </div>
                                <div class="site-spacing-p-3 site-surface-bg-surface-default rounded-4 text-center">
                                    <span class="site-type-font-label-lg site-type-text-label-lg text-light fw-bold text-white fs-6">সোর্স কোড</span>
                                    <p class="site-type-font-caption site-type-text-caption text-body-secondary site-spacing-mt-0-5 site-copy text-secondary small fw-medium">সম্পূর্ণ ফাইল ও ডেটাবেজ ব্যাকআপ</p>
                                </div>
                                <div class="site-spacing-p-3 site-surface-bg-surface-default rounded-4 text-center">
                                    <span class="site-type-font-label-lg site-type-text-label-lg text-light fw-bold text-white fs-6">এডমিন অ্যাকাউন্ট</span>
                                    <p class="site-type-font-caption site-type-text-caption text-body-secondary site-spacing-mt-0-5 site-copy text-secondary small fw-medium">সুপার অ্যাডমিন ইমেইল হস্তান্তর</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><div class="faq-group site-spacing-space-y-space-md" data-group="support">
                <div class="d-flex align-items-center site-spacing-gap-3 pb-2">
                    <div class="site-dimension-w-8 site-dimension-h-8 rounded-3 site-surface-bg-surface-card-elevated text-primary d-flex align-items-center justify-content-center fw-bold site-type-font-label-md bg-white text-dark"> D
                    </div>
                    <div class="d-flex flex-column">
                        <h2 class="site-type-font-headline-sm site-type-text-headline-sm text-light site-heading text-white">অ্যাডমিন প্যানেল ও বিক্রয়োত্তর সাপোর্ট</h2>
                        <span class="site-type-font-caption site-type-text-caption text-body-secondary text-secondary small fw-medium">কনটেন্ট আপডেট, সিকিউরিটি ও দীর্ঘমেয়াদী টেক কেয়ার</span>
                    </div>
                </div>
                <div class="site-spacing-space-y-4">
                    <div class="faq-card site-surface-bg-surface-card rounded-4 site-motion-transition-all site-motion-duration-200 overflow-hidden bg-white" data-keywords="অ্যাডমিন পরিবর্তন নিজে আপডেট ছবি দাম প্রোডাক্ট admin control product update video tutorial">
                        <button class="faq-toggle w-100 p-4 text-start d-flex align-items-start justify-content-between gap-3 site-state-focus-style-outline-none">
                            <div class="d-flex align-items-start gap-3">
                                <span class="material-symbols-outlined text-primary fs-4 site-spacing-mt-0-5 flex-shrink-0 text-dark">tune</span>
                                <span class="site-type-font-title-md site-type-text-title-md text-light fw-semibold text-white">ওয়েবসাইট লঞ্চের পর আমি কি নিজে ছবি, দাম বা পণ্য পরিবর্তন করতে পারব?</span>
                            </div>
                            <div class="site-dimension-w-8 site-dimension-h-8 rounded-pill site-surface-bg-surface-card-elevated d-flex align-items-center justify-content-center text-body-secondary flex-shrink-0 site-motion-transition-transform site-motion-duration-300 icon-arrow bg-white text-secondary">
                                <span class="material-symbols-outlined fs-5">expand_more</span>
                            </div>
                        </button>
                        <div class="faq-answer d-none px-4 pb-4 pt-0 text-body-secondary site-type-font-body-md site-type-text-body-md site-spacing-space-y-3 text-secondary">
                            <p class="site-copy">
প্রজেক্টে অ্যাডমিন প্যানেল থাকলে, কোন তথ্য আপনি নিজে বদলাতে পারবেন তা কাজের সময় ঠিক করা হবে। প্রয়োজনে হস্তান্তরের সময় ব্যবহারবিধিও দেখিয়ে দেওয়া হবে।
                            </p>
                            <ul class="site-spacing-space-y-2 site-type-text-body-sm fs-6 fw-medium">
                                <li class="d-flex align-items-center gap-2 site-body-text">
                                    <span class="material-symbols-outlined text-primary site-type-text-arbitrary-18px text-dark">done</span>
                                    <span>স্মার্টফোন বা ল্যাপটপ থেকে যেকোনো সময় নতুন প্রোডাক্ট, অফার ব্যানার ও মূল্য পরিবর্তন।</span>
                                </li>
                                <li class="d-flex align-items-center gap-2 site-body-text">
                                    <span class="material-symbols-outlined text-primary site-type-text-arbitrary-18px text-dark">done</span>
                                    <span>অর্ডার আসার সাথে সাথে গ্রাহকের নাম, ফোন ও ডেলিভারি ঠিকানা গুছিয়ে দেখা।</span>
                                </li>
                                <li class="d-flex align-items-center gap-2 site-body-text">
                                    <span class="material-symbols-outlined text-primary site-type-text-arbitrary-18px text-dark">done</span>
                                    <span>আমরা আপনার জন্য
                                        <strong class="site-body-text">কাস্টম ভিডিও গাইড ও ট্রেনিং</strong> সরবরাহ করব।</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="faq-card site-surface-bg-surface-card rounded-4 site-motion-transition-all site-motion-duration-200 overflow-hidden bg-white" data-keywords="টেকনিক্যাল সমস্যা সাপোর্ট নষ্ট হেল্পডেস্ক bug support technical maintenance warranty">
                        <button class="faq-toggle w-100 p-4 text-start d-flex align-items-start justify-content-between gap-3 site-state-focus-style-outline-none">
                            <div class="d-flex align-items-start gap-3">
                                <span class="material-symbols-outlined text-primary fs-4 site-spacing-mt-0-5 flex-shrink-0 text-dark">contact_support</span>
                                <span class="site-type-font-title-md site-type-text-title-md text-light fw-semibold text-white">ওয়েবসাইট লঞ্চের পর কোনো টেকনিক্যাল সমস্যা হলে কী ধরণের সাপোর্ট পাব?</span>
                            </div>
                            <div class="site-dimension-w-8 site-dimension-h-8 rounded-pill site-surface-bg-surface-card-elevated d-flex align-items-center justify-content-center text-body-secondary flex-shrink-0 site-motion-transition-transform site-motion-duration-300 icon-arrow bg-white text-secondary">
                                <span class="material-symbols-outlined fs-5">expand_more</span>
                            </div>
                        </button>
                        <div class="faq-answer d-none px-4 pb-4 pt-0 text-body-secondary site-type-font-body-md site-type-text-body-md site-spacing-space-y-3 text-secondary">
                            <p class="site-copy"> ওয়েবসাইট লঞ্চ করার সাথে সাথে আমাদের সম্পর্ক শেষ হয় না, বরং শুরু হয়।
                            </p>
                            <p class="site-copy"> সাপোর্টের সময়, অন্তর্ভুক্ত কাজ ও যোগাযোগের মাধ্যম প্যাকেজ বা প্রজেক্ট প্রস্তাবে উল্লেখ থাকবে। কাজ শুরুর আগে এসব বিষয় নিশ্চিত করে নিন।
                            </p>
                            <p class="site-type-font-body-sm site-type-text-body-sm text-body-secondary site-copy text-secondary fs-6 fw-medium"> নিয়মিত ব্যাকআপ, নিরাপত্তা আপডেট বা হোস্টিং রক্ষণাবেক্ষণ দরকার হলে সেটি আলাদা সেবা হিসেবে আলোচনা করা যাবে।
                            </p>
                        </div>
                    </div>
                </div>
            </div><div class="d-none text-center site-spacing-py-space-xl site-surface-bg-surface-card rounded-4 site-spacing-p-8 site-spacing-space-y-3 bg-white" id="noFaqResults">
                <span class="material-symbols-outlined site-type-text-arbitrary-48px text-body-secondary text-secondary">search_off</span>
                <h3 class="site-type-font-title-md site-type-text-title-md text-light site-heading text-white">আপনার অনুসন্ধানের সাথে মিল পাওয়া যায়নি</h3>
                <p class="site-type-font-body-sm site-type-text-body-sm text-body-secondary site-dimension-max-w-md mx-auto site-copy text-secondary fs-6 fw-medium"> দয়া করে কি-ওয়ার্ড পরিবর্তন করে খুঁজুন অথবা আমাদের সরাসরি কল বা মেসেজ দিন।
                </p>
                <button class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3 site-surface-bg-surface-card-elevated text-primary site-type-font-label-md site-type-text-label-md site-state-hover-surface-bg-surface-bright site-motion-transition-colors bg-white text-dark small fw-medium" id="resetFilterAction" type="button">
                    <span class="material-symbols-outlined fs-6">refresh</span>
                    <span>সব প্রশ্ন রিসেট করুন</span>
                </button>
            </div></div>
    </section><section class="w-100 position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--dark">
        <div class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10"><div class="position-relative site-shape-rounded-3xl site-surface-bg-surface-card site-spacing-p-8 p-md-5 overflow-hidden site-elevation-shadow-2xl bg-white">
                <div class="position-absolute site-style-top-24 site-style-right-24 site-dimension-w-80 site-dimension-h-80 bg-primary bg-opacity-10 rounded-pill site-effect-blur-3xl pe-none"></div>
                <div class="position-relative site-position-z-10 d-grid site-layout-grid-cols-1 site-responsive-lg-layout-grid-cols-12 site-spacing-gap-8 align-items-center">
                    <div class="site-responsive-lg-layout-col-span-5 site-spacing-space-y-3">
                        <div class="d-inline-flex align-items-center gap-2 site-spacing-px-3 py-1 rounded-pill site-surface-bg-surface-card-elevated text-primary site-type-font-label-md site-type-text-label-md bg-white text-dark small fw-medium">
                            <span class="material-symbols-outlined site-type-text-arbitrary-14px">forum</span>
                            <span>অন্য কোনো স্পেসিফিক প্রশ্ন আছে?</span>
                        </div>
                        <h3 class="site-type-font-headline-md site-type-text-headline-md text-light site-heading text-white"> দ্বিধা ভুলে সরাসরি কথা বলুন আমাদের ইঞ্জিনিয়ারিং টিমের সাথে
                        </h3>
                        <p class="site-type-font-body-sm site-type-text-body-sm text-body-secondary site-copy text-secondary fs-6 fw-medium"> প্রতিটি ব্যবসার চাহিদা অনন্য। আপনার নির্দিষ্ট বিজনেস মডেল অনুযায়ী সেরা সলিউশন ও সাশ্রয়ী খরচের পরিকল্পনা তৈরিতে আমরা সাহায্য করব।
                        </p>
                    </div>
                    <div class="site-responsive-lg-layout-col-span-7 d-grid site-layout-grid-cols-1 site-responsive-sm-layout-grid-cols-2 gap-3">
                        <a class="site-style-group p-4 rounded-4 site-surface-bg-surface-card-elevated site-state-hover-surface-bg-surface-bright site-motion-transition-all site-motion-duration-300 d-flex flex-column justify-content-between site-elevation-shadow-lg bg-white" href="https://wa.me/8801335198859?text=হ্যালো%20WhexSoft,%20আমার%20ওয়েবসাইট%20সম্পর্কে%20কিছু%20জানার%20ছিল" rel="noopener noreferrer" target="_blank">
                            <div class="site-spacing-space-y-3">
                                <div class="site-dimension-w-12 site-dimension-h-12 rounded-4 site-surface-bg-success-whatsapp-opacity-15 site-color-text-success-whatsapp d-flex align-items-center justify-content-center site-state-group-hover-motion-scale-110 site-motion-transition-transform">
                                    <span class="material-symbols-outlined site-type-text-arbitrary-26px">chat</span>
                                </div>
                                <h4 class="site-type-font-title-md site-type-text-title-md text-light fw-bold site-heading text-white">হোয়াটসঅ্যাপে চ্যাট করুন</h4>
                                <p class="site-type-font-body-sm site-type-text-body-sm text-body-secondary site-copy text-secondary fs-6 fw-medium"> তাৎক্ষণিক উত্তর পেতে মেসেজ দিন। আমাদের কনসালট্যান্ট সব সময় অ্যাক্টিভ।
                                </p>
                            </div>
                            <div class="pt-3 d-flex align-items-center justify-content-between site-color-text-success-whatsapp site-type-font-label-lg site-type-text-label-lg fw-semibold fs-6">
                                <span>০১৩৩৫-১৯৮৮৫৯</span>
                                <span class="material-symbols-outlined site-type-text-arbitrary-18px site-state-group-hover-motion-translate-x-1 site-motion-transition-transform">arrow_forward</span>
                            </div>
                        </a>
                        <a class="site-style-group p-4 rounded-4 site-surface-bg-surface-card-elevated site-state-hover-surface-bg-surface-bright site-motion-transition-all site-motion-duration-300 d-flex flex-column justify-content-between site-elevation-shadow-lg bg-white" href="tel:01335198859">
                            <div class="site-spacing-space-y-3">
                                <div class="site-dimension-w-12 site-dimension-h-12 rounded-4 site-surface-bg-primary-container-opacity-15 text-primary d-flex align-items-center justify-content-center site-state-group-hover-motion-scale-110 site-motion-transition-transform text-dark site-accent-component">
                                    <span class="material-symbols-outlined site-type-text-arbitrary-26px">phone_in_talk</span>
                                </div>
                                <h4 class="site-type-font-title-md site-type-text-title-md text-light fw-bold site-heading text-white">ফ্রি পরামর্শ কল</h4>
                                <p class="site-type-font-body-sm site-type-text-body-sm text-body-secondary site-copy text-secondary fs-6 fw-medium"> ১০ মিনিটের কনসালটেশনে বুঝে নিন আপনার ব্যবসার জন্য কোন প্যাকেজ উপযোগী।
                                </p>
                            </div>
                            <div class="pt-3 d-flex align-items-center justify-content-between text-primary site-type-font-label-lg site-type-text-label-lg fw-semibold text-dark fs-6">
                                <span>সরাসরি কল দিন</span>
                                <span class="material-symbols-outlined site-type-text-arbitrary-18px site-state-group-hover-motion-translate-x-1 site-motion-transition-transform">call</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div></div>
    </section><section class="w-100 position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--light">
        <div class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10"><div class="position-relative site-shape-rounded-3xl site-surface-bg-surface-card-elevated site-spacing-p-8 site-responsive-md-spacing-p-14 text-center overflow-hidden site-elevation-shadow-2xl bg-white">
                <div class="site-dimension-max-w-2xl mx-auto site-spacing-space-y-space-md position-relative site-position-z-10">
                    <h2 class="site-type-font-headline-lg site-type-text-headline-lg text-light fw-bold site-heading text-white"> সব প্রশ্নের উত্তর পেয়েছেন? আজই আপনার প্রজেক্ট শুরু করুন
                    </h2>
                    <p class="site-type-font-body-md site-type-text-body-md text-body-secondary site-copy text-secondary"> দেরি না করে আপনার অনলাইন ব্র্যান্ডিং ও সেলস বৃদ্ধিতে নির্ভরযোগ্য পার্টনার হিসেবে WhexSoft-কে বেছে নিন।
                    </p>
                    <div class="pt-2 d-flex flex-column flex-sm-row align-items-center justify-content-center gap-3">
                        <a class="w-100 site-responsive-sm-dimension-w-auto d-inline-flex align-items-center justify-content-center site-dimension-h-12 site-spacing-px-8 rounded-4 bg-primary site-color-text-text-inverse site-type-font-label-lg site-type-text-label-lg fw-bold site-state-hover-surface-bg-primary-fixed-dim site-motion-transition-all site-elevation-shadow-arbitrary-0-0-24px-rgba-198-244-50-0-35 text-black fs-6" href="{{ route('contact') }}"> প্রজেক্ট নিয়ে কথা বলুন
                        </a>
                        <a class="w-100 site-responsive-sm-dimension-w-auto d-inline-flex align-items-center justify-content-center site-dimension-h-12 site-spacing-px-8 rounded-4 site-surface-bg-surface-card text-light site-type-font-label-lg site-type-text-label-lg fw-semibold site-state-hover-surface-bg-surface-bright site-state-hover-color-text-primary-container site-motion-transition-all bg-white text-white fs-6 site-accent-hover" href="{{ route('contact') }}"> যোগাযোগ করুন
                        </a>
                    </div>
                </div>
            </div></div>
    </section>
</main>
@endsection
