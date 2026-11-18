@extends('layouts.frontend') @section('title', 'যোগাযোগ | WhexSoft')
@section('description', 'আপনার ওয়েবসাইট বা ডিজিটাল প্রজেক্ট নিয়ে কথা বলতে WhexSoft-এর সঙ্গে যোগাযোগ করুন। কল করুন
    ০১৩৩৫-১৯৮৮৫৯ নম্বরে।')
    @section('page', 'contact') @section('content')
    @php$selectedService = old('service_type', request('service'));
        $selectedPackage = request('package');
        $budgetOptions = [
            '৫,৯৯৯ - ৯,৯৯৯ টাকা (স্টার্টার ল্যান্ডিং)' => '৫,৯৯৯ - ৯,৯৯৯ টাকা (স্টার্টার ল্যান্ডিং)',
            '১০,০০০ - ১৯,৯৯৯ টাকা (স্ট্যান্ডার্ড বিজনেস/ইকমার্স)' =>
                '১০,০০০ - ১৯,৯৯৯ টাকা (স্ট্যান্ডার্ড বিজনেস/ইকমার্স)',
            '২০,০০০+ টাকা (ফুল কাস্টম / এন্টারপ্রাইজ)' => '২০,০০০+ টাকা (ফুল কাস্টম / এন্টারপ্রাইজ)',
            'আলোচনা সাপেক্ষে কাস্টম বাজেট' => 'আলোচনা সাপেক্ষে কাস্টম বাজেট',
        ];
    @endphp
    <x-frontend.page>
        <section
            class="position-relative overflow-hidden site-responsive-lg-spacing-py-24 w-100 site-spacing-pt-32 site-responsive-md-spacing-pt-40 pb-5 site-responsive-md-spacing-pb-16 site-section site-section--dark">
            <div
                class="position-absolute top-50 start-50 translate-middle-x translate-middle-y site-dimension-w-arbitrary-600px site-dimension-h-arbitrary-350px bg-primary bg-opacity-10 site-effect-blur-arbitrary-130px rounded-pill pe-none site-style-z-10">
            </div>
            <div
                class="site-dimension-max-w-7xl mx-auto d-flex flex-column align-items-center text-center w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <div
                    class="d-inline-flex align-items-center gap-2 px-3 site-spacing-py-1-5 rounded-pill site-surface-bg-surface-card border site-border-border-border-accent mb-4 site-elevation-shadow-md bg-white">
                    <span
                        class="material-symbols-outlined text-primary site-type-text-arbitrary-18px text-dark">support_agent</span>
                    <span
                        class="text-primary site-type-font-label-md text-uppercase site-type-tracking-wider text-dark">চলুন,
                        আপনার ব্র্যান্ডকে এগিয়ে নিই</span>
                </div>
                <h1
                    class="site-type-font-headline-lg text-light site-dimension-max-w-4xl site-type-tracking-tight mb-4 site-heading text-white">
                    চলুন আপনার ব্র্যান্ডের
                    <span
                        class="text-primary site-type-underline site-type-decoration-primary-fixed-opacity-40 site-type-decoration-wavy site-type-decoration-2 text-dark">প্রবৃদ্ধি
                        ঘটাই</span>
                </h1>
                <p
                    class="site-type-font-body-lg text-body-secondary site-dimension-max-w-2xl site-type-leading-relaxed site-copy text-secondary">
                    আধুনিক ব্র্যান্ডের জন্য তৈরি করি উচ্চ-রূপান্তরকারী ওয়েবসাইট ও পারফরম্যান্স মার্কেটিং ব্যবস্থা। আপনার
                    ধারণা জানান, আমরা ২৪ ঘণ্টার মধ্যে যোগাযোগ করব।</p>
                <div
                    class="d-grid site-layout-grid-cols-2 site-responsive-md-layout-grid-cols-3 gap-3 mt-5 w-100 site-dimension-max-w-2xl">
                    <div
                        class="site-surface-bg-surface-card-opacity-80 site-effect-backdrop-blur-md p-3 rounded-4 site-elevation-shadow-sm text-center bg-white">
                        <div class="site-type-font-headline-sm text-primary fw-bold text-dark">২৪ ঘণ্টা</div>
                        <div class="site-type-font-caption text-body-secondary mt-1 text-secondary">যোগাযোগের উত্তর</div>
                    </div>
                    <div
                        class="site-surface-bg-surface-card-opacity-80 site-effect-backdrop-blur-md p-3 rounded-4 site-elevation-shadow-sm text-center bg-white">
                        <div class="site-type-font-headline-sm text-light fw-bold text-white">প্রাথমিক আলোচনা</div>
                        <div class="site-type-font-caption text-body-secondary mt-1 text-secondary">কাজের ধরন বুঝে নিন</div>
                    </div>
                    <div
                        class="site-surface-bg-surface-card-opacity-80 site-effect-backdrop-blur-md p-3 rounded-4 site-elevation-shadow-sm text-center site-layout-col-span-2 site-responsive-md-layout-col-span-1 bg-white">
                        <div class="site-type-font-headline-sm text-primary fw-bold text-dark">ফোন ও WhatsApp</div>
                        <div class="site-type-font-caption text-body-secondary mt-1 text-secondary">যে মাধ্যমে সুবিধা</div>
                    </div>
                </div>
            </div>
        </section>
        <section class="w-100 position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--light">
            <div
                class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <div
                    class="d-grid site-layout-grid-cols-1 site-responsive-lg-layout-grid-cols-12 site-spacing-gap-8 align-items-start">
                    <div
                        class="site-responsive-lg-layout-col-span-7 site-surface-bg-surface-card rounded-4 site-spacing-p-8 site-responsive-lg-spacing-p-10 site-elevation-shadow-xl position-relative overflow-hidden bg-white">
                        <div
                            class="position-absolute site-style-top-12 site-style-right-12 site-dimension-w-40 site-dimension-h-40 bg-primary bg-opacity-10 site-effect-blur-arbitrary-60px rounded-pill pe-none">
                        </div>
                        <div class="d-flex align-items-center justify-content-between site-spacing-mb-8 pb-3">
                            <div>
                                <h2 class="site-type-font-headline-md text-light site-heading text-white">প্রজেক্টের বিবরণ
                                    পাঠান</h2>
                                <p class="site-type-font-body-sm text-body-secondary mt-1 site-copy text-secondary">নিচের
                                    ফর্মটি পূরণ করুন, আমরা দ্রুত আপনার সাথে যোগাযোগ করব।</p>
                            </div>
                            <div
                                class="site-dimension-w-10 site-dimension-h-10 rounded-pill bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center flex-shrink-0 text-dark site-accent-component">
                                <span class="material-symbols-outlined fs-5">edit_note</span>
                            </div>
                        </div>
                        @if ($selectedPackage)
                            <div
                                class="mb-4 rounded-4 bg-primary bg-opacity-10 border site-border-border-primary-fixed-opacity-30 px-3 site-spacing-py-3 site-type-text-sm text-light site-accent-component text-white fs-6 fw-medium">
                                নির্বাচিত প্যাকেজ:
                                <strong class="text-primary site-body-text text-dark">{{ $selectedPackage }}</strong>
                            </div>
                        @endif
                        <form class="d-flex flex-column gap-4" action="{{ route('contact.store') }}" method="POST"
                            novalidate> @csrf
                            <div class="d-grid site-layout-grid-cols-1 site-responsive-md-layout-grid-cols-2 gap-4">
                                <div class="d-flex flex-column gap-2">
                                    <label
                                        class="site-type-font-label-lg text-light d-flex align-items-center gap-1 text-white"
                                        for="clientName">আপনার নাম
                                        <span class="text-primary text-dark">*</span></label>
                                    <input
                                        class="w-100 site-dimension-h-arbitrary-52px site-surface-bg-surface-default text-light px-3 rounded-4 site-state-placeholder-color-text-text-muted site-state-focus-style-outline-none site-state-focus-border-ring-2 site-state-focus-border-ring-primary-fixed-opacity-40 site-motion-transition-all site-type-font-body-sm @error('name') site-border-ring-2 site-border-ring-red-500-opacity-60 @enderror text-white"
                                        id="clientName" name="name" value="{{ old('name') }}"
                                        placeholder="যেমন: মো. রফিকুল ইসলাম" required type="text" /> @error('name')
                                        <p class="site-type-text-xs text-danger site-copy text-danger small fw-medium">
                                            {{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="d-flex flex-column gap-2">
                                    <label
                                        class="site-type-font-label-lg text-light d-flex align-items-center gap-1 text-white"
                                        for="clientPhone">ফোন নম্বর / হোয়াটসঅ্যাপ
                                        <span class="text-primary text-dark">*</span></label>
                                    <input
                                        class="w-100 site-dimension-h-arbitrary-52px site-surface-bg-surface-default text-light px-3 rounded-4 site-state-placeholder-color-text-text-muted site-state-focus-style-outline-none site-state-focus-border-ring-2 site-state-focus-border-ring-primary-fixed-opacity-40 site-motion-transition-all site-type-font-body-sm @error('phone') site-border-ring-2 site-border-ring-red-500-opacity-60 @enderror text-white"
                                        id="clientPhone" name="phone" value="{{ old('phone') }}"
                                        placeholder="০১XXXXXXXXX" required type="tel" /> @error('phone')
                                        <p class="site-type-text-xs text-danger site-copy text-danger small fw-medium">
                                            {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-grid site-layout-grid-cols-1 site-responsive-md-layout-grid-cols-2 gap-4">
                                <div class="d-flex flex-column gap-2">
                                    <label class="site-type-font-label-lg text-light text-white" for="clientEmail">ইমেইল
                                        ঠিকানা
                                        <span
                                            class="text-body-secondary site-type-font-caption text-secondary">(ঐচ্ছিক)</span></label>
                                    <input
                                        class="w-100 site-dimension-h-arbitrary-52px site-surface-bg-surface-default text-light px-3 rounded-4 site-state-placeholder-color-text-text-muted site-state-focus-style-outline-none site-state-focus-border-ring-2 site-state-focus-border-ring-primary-fixed-opacity-40 site-motion-transition-all site-type-font-body-sm @error('email') site-border-ring-2 site-border-ring-red-500-opacity-60 @enderror text-white"
                                        id="clientEmail" name="email" value="{{ old('email') }}"
                                        placeholder="name@company.com" type="email" /> @error('email')
                                        <p class="site-type-text-xs text-danger site-copy text-danger small fw-medium">
                                            {{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="d-flex flex-column gap-2">
                                    <label
                                        class="site-type-font-label-lg text-light d-flex align-items-center gap-1 text-white"
                                        for="serviceType">ওয়েবসাইটের ধরন নির্বাচন করুন
                                        <span class="text-primary text-dark">*</span></label>
                                    <select
                                        class="w-100 site-dimension-h-arbitrary-52px site-surface-bg-surface-default text-light px-3 rounded-4 site-state-focus-style-outline-none site-state-focus-border-ring-2 site-state-focus-border-ring-primary-fixed-opacity-40 site-motion-transition-all site-type-font-body-sm site-effect-cursor-pointer text-white"
                                        id="serviceType" name="service_type" required>
                                        <option class="text-body-secondary text-secondary" disabled value=""
                                            @selected(!$selectedService)>ওয়েবসাইটের ধরন বেছে নিন</option>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->title }}" @selected($selectedService === $service->title)>
                                                {{ $service->title }}</option>
                                            @endforeach @foreach (['ক্লিনিক ও ডায়াগনস্টিক পোর্টাল', 'কাস্টম ওয়েব অ্যাপ্লিকেশন / SaaS', 'অন্যান্য'] as $extra)
                                                <option value="{{ $extra }}" @selected($selectedService === $extra)>
                                                    {{ $extra }}</option>
                                            @endforeach
                                    </select> @error('service_type')
                                        <p class="site-type-text-xs text-danger site-copy text-danger small fw-medium">
                                            {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-2">
                                <label class="site-type-font-label-lg text-light text-white" for="budgetRange">আনুমানিক
                                    বাজেট</label>
                                <select
                                    class="w-100 site-dimension-h-arbitrary-52px site-surface-bg-surface-default text-light px-3 rounded-4 site-state-focus-style-outline-none site-state-focus-border-ring-2 site-state-focus-border-ring-primary-fixed-opacity-40 site-motion-transition-all site-type-font-body-sm site-effect-cursor-pointer text-white"
                                    id="budgetRange" name="budget">
                                    @foreach ($budgetOptions as $value => $label)
                                        <option value="{{ $value }}" @selected(old('budget', '১০,০০০ - ১৯,৯৯৯ টাকা (স্ট্যান্ডার্ড বিজনেস/ইকমার্স)') === $value)>
                                            {{ $label }}</option>
                                    @endforeach
                                </select> @error('budget')
                                    <p class="site-type-text-xs text-danger site-copy text-danger small fw-medium">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="d-flex flex-column gap-2">
                                <label class="site-type-font-label-lg text-light text-white" for="projectDetails">প্রজেক্টের
                                    সংক্ষিপ্ত বিবরণ</label>
                                <textarea
                                    class="w-100 site-surface-bg-surface-default text-light p-3 rounded-4 site-state-placeholder-color-text-text-muted site-state-focus-style-outline-none site-state-focus-border-ring-2 site-state-focus-border-ring-primary-fixed-opacity-40 site-motion-transition-all site-type-font-body-sm site-style-resize-none text-white"
                                    id="projectDetails" name="message"
                                    placeholder="আপনার ব্যবসার ধরন, প্রয়োজনীয় ফিচার বা ওয়েবসাইটের রেফারেন্স লিংক থাকলে লিখুন..." rows="4">{{ old('message') }}</textarea> @error('message')
                                    <p class="site-type-text-xs text-danger site-copy text-danger small fw-medium">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                            <button
                                class="w-100 py-3 mt-2 bg-primary site-color-text-text-inverse site-type-font-headline-sm rounded-4 fw-bold site-elevation-shadow-arbitrary-0-0-24px-rgba-197-243-49-0-35 site-state-hover-surface-bg-primary-fixed-dim site-state-hover-motion-scale-arbitrary-1-01 site-state-active-motion-scale-arbitrary-0-99 site-motion-transition-all d-flex align-items-center justify-content-center gap-2 site-style-group site-effect-cursor-pointer text-black"
                                type="submit">
                                <span>প্রজেক্টের বিবরণ পাঠান</span>
                                <span
                                    class="material-symbols-outlined site-type-text-arbitrary-22px site-state-group-hover-motion-translate-x-1 site-motion-transition-transform">rocket_launch</span>
                            </button>
                            <div
                                class="d-flex align-items-center justify-content-center gap-2 text-body-secondary site-type-font-caption pt-2 text-secondary">
                                <span class="material-symbols-outlined fs-6 text-primary text-dark">lock</span>
                                <span>এই তথ্য আপনার প্রজেক্ট নিয়ে যোগাযোগের জন্য ব্যবহার করা হবে।</span>
                            </div>
                        </form>
                    </div>
                    <div class="site-responsive-lg-layout-col-span-5 d-flex flex-column gap-4">
                        <div
                            class="site-surface-bg-surface-card rounded-4 p-4 site-responsive-lg-spacing-p-8 site-elevation-shadow-xl d-flex flex-column gap-4 bg-white">
                            <div class="d-flex align-items-center site-spacing-gap-3">
                                <div
                                    class="site-dimension-w-12 site-dimension-h-12 rounded-4 site-surface-bg-primary-fixed-opacity-15 text-primary d-flex align-items-center justify-content-center text-dark site-accent-component">
                                    <span
                                        class="material-symbols-outlined site-type-text-arbitrary-26px">headset_mic</span>
                                </div>
                                <div>
                                    <h3 class="site-type-font-headline-sm text-light site-heading text-white">সরাসরি কথা
                                        বলুন</h3>
                                    <p class="site-type-font-caption text-body-secondary site-copy text-secondary">
                                        তাত্ক্ষণিক কল বা মেসেজের মাধ্যমে প্রজেক্ট শুরু করুন</p>
                                </div>
                            </div>
                            <div
                                class="d-grid site-layout-grid-cols-1 site-responsive-sm-layout-grid-cols-2 site-spacing-gap-3">
                                <a class="d-flex align-items-center justify-content-center gap-2-5 site-spacing-py-3 px-3 rounded-4 site-surface-bg-surface-card-elevated text-primary site-type-font-headline-sm site-state-hover-surface-bg-surface-container-high site-motion-transition-all site-elevation-shadow-sm bg-white text-dark"
                                    href="tel:01335198859">
                                    <span class="material-symbols-outlined fs-5">call</span>
                                    <span class="site-type-font-label-lg">কল করুন</span>
                                </a>
                                <a class="d-flex align-items-center justify-content-center gap-2-5 site-spacing-py-3 px-3 rounded-4 site-surface-bg-success-whatsapp site-color-text-text-inverse site-type-font-headline-sm fw-bold site-state-hover-style-brightness-110 site-motion-transition-all site-elevation-shadow-md text-black"
                                    href="https://wa.me/8801335198859" rel="noopener noreferrer" target="_blank">
                                    <span class="material-symbols-outlined fs-5">chat</span>
                                    <span class="site-type-font-label-lg">হোয়াটসঅ্যাপ চ্যাট</span>
                                </a>
                            </div>
                            <div class="d-flex flex-column site-spacing-gap-3-5 pt-2">
                                <div
                                    class="d-flex align-items-center site-spacing-gap-3 site-spacing-p-3 rounded-3 site-surface-bg-surface-default">
                                    <span
                                        class="material-symbols-outlined text-primary fs-5 text-dark">phone_in_talk</span>
                                    <div class="d-flex flex-column">
                                        <span class="site-type-font-caption text-body-secondary text-secondary">অফিসিয়াল
                                            হটলাইন</span>
                                        <a class="site-type-font-label-lg text-light site-state-hover-color-text-primary-fixed site-motion-transition-colors text-white"
                                            href="tel:01335198859">০১৩৩৫-১৯৮৮৫৯</a>
                                    </div>
                                </div>
                                <div
                                    class="d-flex align-items-center site-spacing-gap-3 site-spacing-p-3 rounded-3 site-surface-bg-surface-default">
                                    <span class="material-symbols-outlined text-primary fs-5 text-dark">mail</span>
                                    <div class="d-flex flex-column">
                                        <span class="site-type-font-caption text-body-secondary text-secondary">অফিসিয়াল
                                            ইমেইল</span>
                                        <a class="site-type-font-label-lg text-light site-state-hover-color-text-primary-fixed site-motion-transition-colors text-white"
                                            href="mailto:contact.whexsoft@gmail.com">contact.whexsoft@gmail.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="site-surface-bg-surface-card rounded-4 p-4 site-responsive-lg-spacing-p-8 site-elevation-shadow-xl d-flex flex-column gap-3 bg-white">
                            <div class="d-flex align-items-start site-spacing-gap-3">
                                <div
                                    class="site-dimension-w-10 site-dimension-h-10 rounded-3 site-surface-bg-primary-fixed-opacity-15 text-primary d-flex align-items-center justify-content-center flex-shrink-0 site-spacing-mt-0-5 text-dark site-accent-component">
                                    <span
                                        class="material-symbols-outlined site-type-text-arbitrary-22px">location_on</span>
                                </div>
                                <div>
                                    <h4 class="site-type-font-title-md text-light site-heading text-white">হেড অফিস ও
                                        স্টুডিও</h4>
                                    <p class="site-type-font-body-sm text-body-secondary mt-1 site-copy text-secondary">
                                        সোনির আখড়া, যাত্রাবাড়ী, ঢাকা-১২৩৬, বাংলাদেশ</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start site-spacing-gap-3 pt-2">
                                <div
                                    class="site-dimension-w-10 site-dimension-h-10 rounded-3 site-surface-bg-surface-card-elevated text-body-secondary d-flex align-items-center justify-content-center flex-shrink-0 site-spacing-mt-0-5 bg-white text-secondary">
                                    <span class="material-symbols-outlined site-type-text-arbitrary-22px">schedule</span>
                                </div>
                                <div>
                                    <h4 class="site-type-font-title-md text-light site-heading text-white">অফিস খোলা থাকার
                                        সময়</h4>
                                    <p class="site-type-font-body-sm text-body-secondary mt-1 site-copy text-secondary">শনি
                                        - বৃহস্পতি: সকাল ১০:০০ - রাত ৮:০০</p>
                                    <span
                                        class="d-inline-block mt-1 text-primary site-type-font-caption text-dark">শুক্রবার
                                        সাপ্তাহিক বন্ধ (অনলাইন হটলাইন চালু থাকে)</span>
                                </div>
                            </div>
                            <div
                                class="w-100 mt-2 rounded-4 overflow-hidden site-elevation-shadow-inner position-relative site-style-group site-dimension-h-52 site-surface-bg-surface-card-elevated bg-white">
                                <div class="w-100 h-100 site-surface-bg-cover site-surface-bg-center site-motion-transition-transform site-motion-duration-700 site-state-group-hover-motion-scale-105"
                                    style="background-image: url('{{ asset('assets/frontend/images/office-map.jpg') }}')">
                                </div>
                                <div
                                    class="position-absolute top-0 end-0 bottom-0 start-0 site-surface-bg-gradient-to-t site-surface-from-surface-card site-surface-via-transparent site-surface-to-black-opacity-30 pe-none site-gradient-background">
                                </div>
                                <div
                                    class="position-absolute site-position-bottom-3 site-position-left-3 site-position-right-3 site-spacing-p-3 rounded-3 site-surface-bg-surface-card-opacity-95 site-effect-backdrop-blur-md d-flex align-items-center justify-content-between site-elevation-shadow-lg bg-white">
                                    <div class="d-flex align-items-center gap-2">
                                        <span
                                            class="site-dimension-w-2-5 site-dimension-h-2-5 rounded-pill bg-primary site-motion-animate-ping"></span>
                                        <span class="site-type-font-label-lg text-light text-white">WhexSoft Dhaka
                                            Studio</span>
                                    </div>
                                    <a class="site-type-font-caption text-primary site-state-hover-type-underline d-flex align-items-center gap-1 text-dark"
                                        href="https://maps.google.com/?q=Sonir+Akhra,+Jatrabari,+Dhaka"
                                        rel="noopener noreferrer" target="_blank">
                                        <span>ম্যাপে দেখুন</span>
                                        <span
                                            class="material-symbols-outlined site-type-text-arbitrary-14px">open_in_new</span>
                                    </a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between pt-3">
                                <span
                                    class="site-type-font-caption text-body-secondary text-uppercase site-type-tracking-wider text-secondary">সোশ্যাল
                                    কানেক্ট:</span>
                                <div class="d-flex align-items-center gap-2">
                                    <a class="site-dimension-w-9 site-dimension-h-9 rounded-3 site-surface-bg-surface-card-elevated d-flex align-items-center justify-content-center text-body-secondary site-state-hover-color-text-primary-fixed site-state-hover-surface-bg-primary-fixed-opacity-10 site-motion-transition-all bg-white text-secondary site-accent-component"
                                        href="https://www.facebook.com/" rel="noopener noreferrer" target="_blank"
                                        title="Facebook"><span
                                            class="material-symbols-outlined site-type-text-arbitrary-18px">public</span></a>
                                    <a class="site-dimension-w-9 site-dimension-h-9 rounded-3 site-surface-bg-surface-card-elevated d-flex align-items-center justify-content-center text-body-secondary site-state-hover-color-text-primary-fixed site-state-hover-surface-bg-primary-fixed-opacity-10 site-motion-transition-all bg-white text-secondary site-accent-component"
                                        href="https://linkedin.com/company/whexsoft" rel="noopener noreferrer"
                                        target="_blank" title="LinkedIn"><span
                                            class="material-symbols-outlined site-type-text-arbitrary-18px">badge</span></a>
                                    <a class="site-dimension-w-9 site-dimension-h-9 rounded-3 site-surface-bg-surface-card-elevated d-flex align-items-center justify-content-center text-body-secondary site-state-hover-color-text-success-whatsapp site-state-hover-surface-bg-success-whatsapp-opacity-10 site-motion-transition-all bg-white text-secondary"
                                        href="https://wa.me/8801335198859" rel="noopener noreferrer" target="_blank"
                                        title="WhatsApp"><span
                                            class="material-symbols-outlined site-type-text-arbitrary-18px">chat</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="w-100 position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--dark">
            <div
                class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <div class="text-center site-spacing-mb-10">
                    <h3 class="site-type-font-headline-md text-light site-heading text-white">জরুরি জিজ্ঞাসাসমূহ (FAQ)</h3>
                    <p class="site-type-font-body-sm text-body-secondary mt-1 site-copy text-secondary">যোগাযোগ করার আগে
                        সাধারণ প্রশ্নগুলোর চটজলদি উত্তর জেনে নিন</p>
                </div>
                <div class="d-grid site-layout-grid-cols-1 site-responsive-md-layout-grid-cols-3 gap-4">
                    @foreach ([['help', 'প্রাথমিক আলোচনা কি বিনামূল্যে?', 'আপনার প্রজেক্টের প্রাথমিক আলোচনা বিনামূল্যে। কাজের পরিধি ও সম্ভাব্য খরচ নিয়ে কথা বলতে যোগাযোগ করুন।'], ['timer', 'কোটেশন পেতে কত সময় লাগবে?', 'ফর্ম পাঠানোর পর আমরা প্রজেক্টের বিবরণ দেখে কর্মদিবসে উত্তর দেব। সময় প্রয়োজনীয় তথ্য ও কাজের পরিধির ওপর নির্ভর করে।'], ['verified', 'কাজ কীভাবে শুরু হয়?', 'কাজের পরিধি ও পেমেন্টের সময়সূচি লিখিতভাবে ঠিক করার পর কাজ শুরু হবে।']] as [$icon, $question, $answer])
                        <div
                            class="site-surface-bg-surface-card p-4 rounded-4 site-elevation-shadow-md d-flex flex-column site-spacing-gap-3 bg-white">
                            <div
                                class="site-dimension-w-8 site-dimension-h-8 rounded-pill site-surface-bg-primary-fixed-opacity-15 text-primary d-flex align-items-center justify-content-center flex-shrink-0 text-dark site-accent-component">
                                <span
                                    class="material-symbols-outlined site-type-text-arbitrary-18px">{{ $icon }}</span>
                            </div>
                            <h4 class="site-type-font-title-md text-light site-heading text-white">{{ $question }}
                            </h4>
                            <p
                                class="site-type-font-body-sm text-body-secondary site-type-leading-relaxed site-copy text-secondary">
                                {{ $answer }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Contact Section --}}
        @include('partials.frontend.contact-section')

        <section class="w-100 position-relative py-5 site-responsive-md-spacing-py-16 site-section site-section--light">
            <div
                class="site-dimension-max-w-7xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
                <div
                    class="site-surface-bg-gradient-to-r site-surface-from-surface-card-elevated site-surface-via-surface-card site-surface-to-surface-card-elevated site-spacing-p-8 p-lg-5 site-shape-rounded-3xl site-elevation-shadow-2xl position-relative overflow-hidden d-flex flex-column flex-md-row align-items-center justify-content-between site-spacing-gap-8 site-gradient-background">
                    <div
                        class="position-absolute site-style-left-16 site-style-top-16 site-dimension-w-60 site-dimension-h-60 bg-primary bg-opacity-10 site-effect-blur-arbitrary-80px pe-none rounded-pill">
                    </div>
                    <div
                        class="d-flex flex-column gap-2 site-dimension-max-w-xl text-center text-md-start position-relative">
                        <span
                            class="site-type-font-label-md text-primary text-uppercase site-type-tracking-wider text-dark">চলুন,
                            অসাধারণ কিছু তৈরি করি</span>
                        <h3 class="site-type-font-headline-md text-light site-heading text-white">আপনার ধারণা আছে? আমরা তা
                            বাস্তবে রূপ দিই</h3>
                        <p class="site-type-font-body-sm text-body-secondary site-copy text-secondary">আপনার প্রজেক্টের কথা
                            জানান। আমরা ২৪ ঘণ্টার মধ্যে আপনার সঙ্গে যোগাযোগ করব।</p>
                    </div>
                    <div
                        class="d-flex flex-column flex-sm-row align-items-center gap-3 flex-shrink-0 w-100 site-responsive-sm-dimension-w-auto position-relative">
                        <a class="w-100 site-responsive-sm-dimension-w-auto site-spacing-px-8 py-3 bg-primary site-color-text-text-inverse site-type-font-headline-sm fw-bold rounded-4 site-elevation-shadow-arbitrary-0-0-25px-rgba-197-243-49-0-3 site-state-hover-surface-bg-primary-fixed-dim site-state-hover-motion-scale-105 site-state-active-motion-scale-95 site-motion-transition-all text-center d-flex align-items-center justify-content-center gap-2 text-black"
                            href="tel:01335198859">
                            <span class="material-symbols-outlined fs-5">call</span>
                            <span>০১৩৩৫-১৯৮৮৫৯</span>
                        </a>
                        <a class="w-100 site-responsive-sm-dimension-w-auto px-4 py-3 site-surface-bg-surface-card-elevated text-light site-type-font-headline-sm fw-semibold rounded-4 site-state-hover-surface-bg-surface-container-high site-motion-transition-all text-center d-flex align-items-center justify-content-center gap-2 bg-white text-white"
                            href="https://wa.me/8801335198859" rel="noopener noreferrer" target="_blank">
                            <span class="material-symbols-outlined fs-5 site-color-text-success-whatsapp">chat</span>
                            <span>হোয়াটসঅ্যাপ মেসেজ</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </x-frontend.page>
@endsection
