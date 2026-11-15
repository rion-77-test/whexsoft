@extends('frontend.layouts.app')

@section('title', 'যোগাযোগ | WhexSoft')
@section('description', 'আপনার ওয়েবসাইট বা ডিজিটাল প্রজেক্ট নিয়ে কথা বলতে WhexSoft-এর সঙ্গে যোগাযোগ করুন। কল করুন ০১৩৩৫-১৯৮৮৫৯ নম্বরে।')
@section('page', 'contact')

@section('content')
@php
    $selectedService = old('service_type', request('service'));
    $selectedPackage = request('package');
    $budgetOptions = [
        '৫,৯৯৯ - ৯,৯৯৯ টাকা (স্টার্টার ল্যান্ডিং)' => '৫,৯৯৯ - ৯,৯৯৯ টাকা (স্টার্টার ল্যান্ডিং)',
        '১০,০০০ - ১৯,৯৯৯ টাকা (স্ট্যান্ডার্ড বিজনেস/ইকমার্স)' => '১০,০০০ - ১৯,৯৯৯ টাকা (স্ট্যান্ডার্ড বিজনেস/ইকমার্স)',
        '২০,০০০+ টাকা (ফুল কাস্টম / এন্টারপ্রাইজ)' => '২০,০০০+ টাকা (ফুল কাস্টম / এন্টারপ্রাইজ)',
        'আলোচনা সাপেক্ষে কাস্টম বাজেট' => 'আলোচনা সাপেক্ষে কাস্টম বাজেট',
    ];
@endphp

<main class="w-full relative overflow-x-clip">
    <section class="relative overflow-hidden lg:py-24 w-full pt-32 md:pt-40 pb-12 md:pb-16">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[350px] bg-primary-fixed/10 blur-[130px] rounded-full pointer-events-none -z-10"></div>
        <div class="max-w-7xl mx-auto flex flex-col items-center text-center w-full relative px-5 sm:px-8 lg:px-10">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-surface-card border border-border-accent mb-6 shadow-md">
                <span class="material-symbols-outlined text-primary-fixed text-[18px]">support_agent</span>
                <span class="text-primary-fixed font-label-md uppercase tracking-wider">আপনার প্রজেক্ট নিয়ে কথা বলুন</span>
            </div>
            <h1 class="font-headline-lg text-text-primary max-w-4xl tracking-tight mb-6">আপনার প্রজেক্টের কথা <span class="text-primary-fixed underline decoration-primary-fixed/40 decoration-wavy decoration-2">আমাদের জানান</span></h1>
            <p class="font-body-lg text-text-secondary max-w-2xl leading-relaxed">আপনার লক্ষ্য, প্রয়োজনীয় ফিচার ও সম্ভাব্য বাজেট নিয়ে আলোচনা করি। এরপর কাজের পরিধি ও খরচসহ একটি প্রস্তাব জানাব।</p>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-12 w-full max-w-2xl">
                <div class="bg-surface-card/80 backdrop-blur-md p-4 rounded-xl shadow-sm text-center">
                    <div class="font-headline-sm text-primary-fixed font-bold">কর্মদিবসে</div>
                    <div class="font-caption text-text-muted mt-1">যোগাযোগের উত্তর</div>
                </div>
                <div class="bg-surface-card/80 backdrop-blur-md p-4 rounded-xl shadow-sm text-center">
                    <div class="font-headline-sm text-text-primary font-bold">প্রাথমিক আলোচনা</div>
                    <div class="font-caption text-text-muted mt-1">কাজের ধরন বুঝে নিন</div>
                </div>
                <div class="bg-surface-card/80 backdrop-blur-md p-4 rounded-xl shadow-sm text-center col-span-2 md:col-span-1">
                    <div class="font-headline-sm text-primary-fixed font-bold">ফোন ও WhatsApp</div>
                    <div class="font-caption text-text-muted mt-1">যে মাধ্যমে সুবিধা</div>
                </div>
            </div>
        </div>
    </section>

    <section class="w-full relative py-12 md:py-16">
        <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                <div class="lg:col-span-7 bg-surface-card rounded-2xl p-8 lg:p-10 shadow-xl relative overflow-hidden">
                    <div class="absolute -top-12 -right-12 w-40 h-40 bg-primary-fixed/10 blur-[60px] rounded-full pointer-events-none"></div>
                    <div class="flex items-center justify-between mb-8 pb-4">
                        <div>
                            <h2 class="font-headline-md text-text-primary">প্রজেক্টের বিবরণ পাঠান</h2>
                            <p class="font-body-sm text-text-secondary mt-1">নিচের ফর্মটি পূরণ করুন, আমরা দ্রুত আপনার সাথে যোগাযোগ করব।</p>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-primary-fixed/10 text-primary-fixed flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-[20px]">edit_note</span>
                        </div>
                    </div>

                    @if ($selectedPackage)
                        <div class="mb-6 rounded-xl bg-primary-fixed/10 border border-primary-fixed/30 px-4 py-3 text-sm text-text-primary">
                            নির্বাচিত প্যাকেজ: <strong class="text-primary-fixed">{{ $selectedPackage }}</strong>
                        </div>
                    @endif

                    <form class="flex flex-col gap-6" action="{{ route('contact.store') }}" method="POST" novalidate>
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex flex-col gap-2">
                                <label class="font-label-lg text-text-primary flex items-center gap-1" for="clientName">আপনার নাম <span class="text-primary-fixed">*</span></label>
                                <input class="w-full h-[52px] bg-surface-default text-text-primary px-4 rounded-xl placeholder:text-text-muted focus:outline-none focus:ring-2 focus:ring-primary-fixed/40 transition-all font-body-sm @error('name') ring-2 ring-red-500/60 @enderror" id="clientName" name="name" value="{{ old('name') }}" placeholder="যেমন: মো. রফিকুল ইসলাম" required type="text" />
                                @error('name')<p class="text-xs text-red-400">{{ $message }}</p>@enderror
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="font-label-lg text-text-primary flex items-center gap-1" for="clientPhone">ফোন নম্বর / হোয়াটসঅ্যাপ <span class="text-primary-fixed">*</span></label>
                                <input class="w-full h-[52px] bg-surface-default text-text-primary px-4 rounded-xl placeholder:text-text-muted focus:outline-none focus:ring-2 focus:ring-primary-fixed/40 transition-all font-body-sm @error('phone') ring-2 ring-red-500/60 @enderror" id="clientPhone" name="phone" value="{{ old('phone') }}" placeholder="০১XXXXXXXXX" required type="tel" />
                                @error('phone')<p class="text-xs text-red-400">{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex flex-col gap-2">
                                <label class="font-label-lg text-text-primary" for="clientEmail">ইমেইল ঠিকানা <span class="text-text-muted font-caption">(ঐচ্ছিক)</span></label>
                                <input class="w-full h-[52px] bg-surface-default text-text-primary px-4 rounded-xl placeholder:text-text-muted focus:outline-none focus:ring-2 focus:ring-primary-fixed/40 transition-all font-body-sm @error('email') ring-2 ring-red-500/60 @enderror" id="clientEmail" name="email" value="{{ old('email') }}" placeholder="name@company.com" type="email" />
                                @error('email')<p class="text-xs text-red-400">{{ $message }}</p>@enderror
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="font-label-lg text-text-primary flex items-center gap-1" for="serviceType">ওয়েবসাইটের ধরন নির্বাচন করুন <span class="text-primary-fixed">*</span></label>
                                <select class="w-full h-[52px] bg-surface-default text-text-primary px-4 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-fixed/40 transition-all font-body-sm cursor-pointer" id="serviceType" name="service_type" required>
                                    <option class="text-text-muted" disabled value="" @selected(! $selectedService)>ওয়েবসাইটের ধরন বেছে নিন</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->title }}" @selected($selectedService === $service->title)>{{ $service->title }}</option>
                                    @endforeach
                                    @foreach (['ক্লিনিক ও ডায়াগনস্টিক পোর্টাল', 'কাস্টম ওয়েব অ্যাপ্লিকেশন / SaaS', 'অন্যান্য'] as $extra)
                                        <option value="{{ $extra }}" @selected($selectedService === $extra)>{{ $extra }}</option>
                                    @endforeach
                                </select>
                                @error('service_type')<p class="text-xs text-red-400">{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="font-label-lg text-text-primary" for="budgetRange">আনুমানিক বাজেট</label>
                            <select class="w-full h-[52px] bg-surface-default text-text-primary px-4 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-fixed/40 transition-all font-body-sm cursor-pointer" id="budgetRange" name="budget">
                                @foreach ($budgetOptions as $value => $label)
                                    <option value="{{ $value }}" @selected(old('budget', '১০,০০০ - ১৯,৯৯৯ টাকা (স্ট্যান্ডার্ড বিজনেস/ইকমার্স)') === $value)>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('budget')<p class="text-xs text-red-400">{{ $message }}</p>@enderror
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="font-label-lg text-text-primary" for="projectDetails">প্রজেক্টের সংক্ষিপ্ত বিবরণ</label>
                            <textarea class="w-full bg-surface-default text-text-primary p-4 rounded-xl placeholder:text-text-muted focus:outline-none focus:ring-2 focus:ring-primary-fixed/40 transition-all font-body-sm resize-none" id="projectDetails" name="message" placeholder="আপনার ব্যবসার ধরন, প্রয়োজনীয় ফিচার বা ওয়েবসাইটের রেফারেন্স লিংক থাকলে লিখুন..." rows="4">{{ old('message') }}</textarea>
                            @error('message')<p class="text-xs text-red-400">{{ $message }}</p>@enderror
                        </div>
                        <button class="w-full py-4 mt-2 bg-primary-fixed text-text-inverse font-headline-sm rounded-xl font-bold shadow-[0_0_24px_rgba(197,243,49,0.35)] hover:bg-primary-fixed-dim hover:scale-[1.01] active:scale-[0.99] transition-all flex items-center justify-center gap-2 group cursor-pointer" type="submit">
                            <span>প্রজেক্টের বিবরণ পাঠান</span>
                            <span class="material-symbols-outlined text-[22px] group-hover:translate-x-1 transition-transform">rocket_launch</span>
                        </button>
                        <div class="flex items-center justify-center gap-2 text-text-muted font-caption pt-2">
                            <span class="material-symbols-outlined text-[16px] text-primary-fixed">lock</span>
                            <span>এই তথ্য আপনার প্রজেক্ট নিয়ে যোগাযোগের জন্য ব্যবহার করা হবে।</span>
                        </div>
                    </form>
                </div>

                <div class="lg:col-span-5 flex flex-col gap-6">
                    <div class="bg-surface-card rounded-2xl p-6 lg:p-8 shadow-xl flex flex-col gap-6">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-xl bg-primary-fixed/15 text-primary-fixed flex items-center justify-center">
                                <span class="material-symbols-outlined text-[26px]">headset_mic</span>
                            </div>
                            <div>
                                <h3 class="font-headline-sm text-text-primary">সরাসরি কথা বলুন</h3>
                                <p class="font-caption text-text-muted">তাত্ক্ষণিক কল বা মেসেজের মাধ্যমে প্রজেক্ট শুরু করুন</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <a class="flex items-center justify-center gap-2.5 py-3 px-4 rounded-xl bg-surface-card-elevated text-primary-fixed font-headline-sm hover:bg-surface-container-high transition-all shadow-sm" href="tel:01335198859">
                                <span class="material-symbols-outlined text-[20px]">call</span>
                                <span class="font-label-lg">কল করুন</span>
                            </a>
                            <a class="flex items-center justify-center gap-2.5 py-3 px-4 rounded-xl bg-success-whatsapp text-text-inverse font-headline-sm font-bold hover:brightness-110 transition-all shadow-md" href="https://wa.me/8801335198859" rel="noopener noreferrer" target="_blank">
                                <span class="material-symbols-outlined text-[20px]">chat</span>
                                <span class="font-label-lg">হোয়াটসঅ্যাপ চ্যাট</span>
                            </a>
                        </div>
                        <div class="flex flex-col gap-3.5 pt-2">
                            <div class="flex items-center gap-3 p-3 rounded-lg bg-surface-default">
                                <span class="material-symbols-outlined text-primary-fixed text-[20px]">phone_in_talk</span>
                                <div class="flex flex-col">
                                    <span class="font-caption text-text-muted">অফিসিয়াল হটলাইন</span>
                                    <a class="font-label-lg text-text-primary hover:text-primary-fixed transition-colors" href="tel:01335198859">০১৩৩৫-১৯৮৮৫৯</a>
                                </div>
                            </div>
                            <div class="flex items-center gap-3 p-3 rounded-lg bg-surface-default">
                                <span class="material-symbols-outlined text-primary-fixed text-[20px]">mail</span>
                                <div class="flex flex-col">
                                    <span class="font-caption text-text-muted">অফিসিয়াল ইমেইল</span>
                                    <a class="font-label-lg text-text-primary hover:text-primary-fixed transition-colors" href="mailto:contact.whexsoft@gmail.com">contact.whexsoft@gmail.com</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-surface-card rounded-2xl p-6 lg:p-8 shadow-xl flex flex-col gap-4">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 rounded-lg bg-primary-fixed/15 text-primary-fixed flex items-center justify-center shrink-0 mt-0.5">
                                <span class="material-symbols-outlined text-[22px]">location_on</span>
                            </div>
                            <div>
                                <h4 class="font-title-md text-text-primary">হেড অফিস ও স্টুডিও</h4>
                                <p class="font-body-sm text-text-secondary mt-1">সোনির আখড়া, যাত্রাবাড়ী, ঢাকা-১২৩৬, বাংলাদেশ</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 pt-2">
                            <div class="w-10 h-10 rounded-lg bg-surface-card-elevated text-text-muted flex items-center justify-center shrink-0 mt-0.5">
                                <span class="material-symbols-outlined text-[22px]">schedule</span>
                            </div>
                            <div>
                                <h4 class="font-title-md text-text-primary">অফিস খোলা থাকার সময়</h4>
                                <p class="font-body-sm text-text-secondary mt-1">শনি - বৃহস্পতি: সকাল ১০:০০ - রাত ৮:০০</p>
                                <span class="inline-block mt-1 text-primary-fixed font-caption">শুক্রবার সাপ্তাহিক বন্ধ (অনলাইন হটলাইন চালু থাকে)</span>
                            </div>
                        </div>
                        <div class="w-full mt-2 rounded-xl overflow-hidden shadow-inner relative group h-52 bg-surface-card-elevated">
                            <div class="w-full h-full bg-cover bg-center transition-transform duration-700 group-hover:scale-105" style="background-image: url('{{ asset('assets/frontend/images/office-map.jpg') }}')"></div>
                            <div class="absolute inset-0 bg-gradient-to-t from-surface-card via-transparent to-black/30 pointer-events-none"></div>
                            <div class="absolute bottom-3 left-3 right-3 p-3 rounded-lg bg-surface-card/95 backdrop-blur-md flex items-center justify-between shadow-lg">
                                <div class="flex items-center gap-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-primary-fixed animate-ping"></span>
                                    <span class="font-label-lg text-text-primary">WhexSoft Dhaka Studio</span>
                                </div>
                                <a class="font-caption text-primary-fixed hover:underline flex items-center gap-1" href="https://maps.google.com/?q=Sonir+Akhra,+Jatrabari,+Dhaka" rel="noopener noreferrer" target="_blank">
                                    <span>ম্যাপে দেখুন</span>
                                    <span class="material-symbols-outlined text-[14px]">open_in_new</span>
                                </a>
                            </div>
                        </div>
                        <div class="flex items-center justify-between pt-4">
                            <span class="font-caption text-text-muted uppercase tracking-wider">সোশ্যাল কানেক্ট:</span>
                            <div class="flex items-center gap-2">
                                <a class="w-9 h-9 rounded-lg bg-surface-card-elevated flex items-center justify-center text-text-secondary hover:text-primary-fixed hover:bg-primary-fixed/10 transition-all" href="https://www.facebook.com/" rel="noopener noreferrer" target="_blank" title="Facebook"><span class="material-symbols-outlined text-[18px]">public</span></a>
                                <a class="w-9 h-9 rounded-lg bg-surface-card-elevated flex items-center justify-center text-text-secondary hover:text-primary-fixed hover:bg-primary-fixed/10 transition-all" href="https://linkedin.com/company/whexsoft" rel="noopener noreferrer" target="_blank" title="LinkedIn"><span class="material-symbols-outlined text-[18px]">badge</span></a>
                                <a class="w-9 h-9 rounded-lg bg-surface-card-elevated flex items-center justify-center text-text-secondary hover:text-success-whatsapp hover:bg-success-whatsapp/10 transition-all" href="https://wa.me/8801335198859" rel="noopener noreferrer" target="_blank" title="WhatsApp"><span class="material-symbols-outlined text-[18px]">chat</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="w-full relative py-12 md:py-16">
        <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <div class="text-center mb-10">
                <h3 class="font-headline-md text-text-primary">জরুরি জিজ্ঞাসাসমূহ (FAQ)</h3>
                <p class="font-body-sm text-text-secondary mt-1">যোগাযোগ করার আগে সাধারণ প্রশ্নগুলোর চটজলদি উত্তর জেনে নিন</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ([
                    ['help', 'প্রাথমিক আলোচনা কি বিনামূল্যে?', 'আপনার প্রজেক্টের প্রাথমিক আলোচনা বিনামূল্যে। কাজের পরিধি ও সম্ভাব্য খরচ নিয়ে কথা বলতে যোগাযোগ করুন।'],
                    ['timer', 'কোটেশন পেতে কত সময় লাগবে?', 'ফর্ম পাঠানোর পর আমরা প্রজেক্টের বিবরণ দেখে কর্মদিবসে উত্তর দেব। সময় প্রয়োজনীয় তথ্য ও কাজের পরিধির ওপর নির্ভর করে।'],
                    ['verified', 'কাজ কীভাবে শুরু হয়?', 'কাজের পরিধি ও পেমেন্টের সময়সূচি লিখিতভাবে ঠিক করার পর কাজ শুরু হবে।'],
                ] as [$icon, $question, $answer])
                    <div class="bg-surface-card p-6 rounded-xl shadow-md flex flex-col gap-3">
                        <div class="w-8 h-8 rounded-full bg-primary-fixed/15 text-primary-fixed flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-[18px]">{{ $icon }}</span>
                        </div>
                        <h4 class="font-title-md text-text-primary">{{ $question }}</h4>
                        <p class="font-body-sm text-text-secondary leading-relaxed">{{ $answer }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="w-full relative py-12 md:py-16">
        <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <div class="bg-gradient-to-r from-surface-card-elevated via-surface-card to-surface-card-elevated p-8 lg:p-12 rounded-3xl shadow-2xl relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="absolute -left-16 -top-16 w-60 h-60 bg-primary-fixed/10 blur-[80px] pointer-events-none rounded-full"></div>
                <div class="flex flex-col gap-2 max-w-xl text-center md:text-left relative">
                    <span class="font-label-md text-primary-fixed uppercase tracking-wider">দ্রুত এগিয়ে যান</span>
                    <h3 class="font-headline-md text-text-primary">দেরি না করে আজই আপনার সেলস বৃদ্ধি শুরু করুন</h3>
                    <p class="font-body-sm text-text-secondary">আপনার প্রয়োজন ও কাজের ধরন নিয়ে কথা বলুন। প্রস্তাব পাওয়ার পর সিদ্ধান্ত নেওয়ার সময় নিতে পারেন।</p>
                </div>
                <div class="flex flex-col sm:flex-row items-center gap-4 shrink-0 w-full sm:w-auto relative">
                    <a class="w-full sm:w-auto px-8 py-4 bg-primary-fixed text-text-inverse font-headline-sm font-bold rounded-xl shadow-[0_0_25px_rgba(197,243,49,0.3)] hover:bg-primary-fixed-dim hover:scale-105 active:scale-95 transition-all text-center flex items-center justify-center gap-2" href="tel:01335198859">
                        <span class="material-symbols-outlined text-[20px]">call</span>
                        <span>০১৩৩৫-১৯৮৮৫৯</span>
                    </a>
                    <a class="w-full sm:w-auto px-6 py-4 bg-surface-card-elevated text-text-primary font-headline-sm font-semibold rounded-xl hover:bg-surface-container-high transition-all text-center flex items-center justify-center gap-2" href="https://wa.me/8801335198859" rel="noopener noreferrer" target="_blank">
                        <span class="material-symbols-outlined text-[20px] text-success-whatsapp">chat</span>
                        <span>হোয়াটসঅ্যাপ মেসেজ</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
