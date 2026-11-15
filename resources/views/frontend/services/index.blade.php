@extends('frontend.layouts.app')

@section('title', 'সার্ভিসসমূহ | WhexSoft')
@section('description', $services->map(fn ($service) => $service->short_description ?: $service->title)->take(3)->implode(' '))
@section('page', 'services')

@section('content')
<main class="w-full relative overflow-x-clip">
    <section class="w-full bg-[#0B0F14]/70 border-y border-white/10 relative py-16 md:py-24" id="all-services">
        <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <div class="max-w-3xl text-center mx-auto mb-12 md:mb-14">
                <span class="inline-block text-xs font-mono uppercase tracking-widest text-primary-fixed bg-primary-fixed/10 border border-primary-fixed/30 px-3.5 py-1 rounded-full">সব সার্ভিস</span>
                <h2 class="font-heading text-3xl md:text-4xl font-extrabold text-white mt-4 tracking-tight">আপনার প্রয়োজন অনুযায়ী বেছে নিন</h2>
                <p class="text-slate-300 text-base md:text-lg mt-4 leading-relaxed">কাজ শুরুর আগে ফিচার, সময় ও খরচ নিয়ে আলোচনা করে লিখিতভাবে ঠিক করি।</p>
                @if ($startingPackage)
                    <p class="text-sm md:text-base text-slate-200 mt-5">
                        <span class="font-semibold text-primary-fixed">প্যাকেজের মূল্য শুরু</span>
                        <span class="font-bold text-white">{{ $startingPackage->priceAmount() }}</span>
                        থেকে
                    </p>
                @endif
            </div>
            @if ($services->isEmpty())
                <div class="rounded-2xl border border-white/10 bg-[#111722] p-10 text-center text-slate-300">এখনো কোনো সার্ভিস যুক্ত করা হয়নি।</div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                    @foreach ($services as $service)
                        @php
                            $image = $service->getFirstMediaUrl('service-image');
                            $description = $service->short_description ?: \Illuminate\Support\Str::limit(strip_tags($service->intro ?: $service->content ?: ''), 140);
                            $points = collect($service->features ?? [])
                                ->filter(fn ($feature) => filled($feature['title'] ?? null) || filled($feature['text'] ?? null))
                                ->take(3);
                        @endphp
                        <article class="group flex flex-col rounded-2xl bg-[#111722] border border-white/10 overflow-hidden hover:border-primary-fixed/40 hover:-translate-y-1 transition-all duration-300">
                            @if ($image)
                                <a aria-hidden="true" class="relative block aspect-[16/10] overflow-hidden bg-[#0B0F14]" href="{{ route('services.show', $service) }}" tabindex="-1">
                                    <img alt="{{ $service->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy" src="{{ $image }}" />
                                </a>
                            @endif
                            <div class="flex flex-col flex-1 p-6">
                                @if ($service->serviceCategory)
                                    <span class="text-xs font-mono text-primary-fixed mb-2">{{ $service->serviceCategory->name }}</span>
                                @endif
                                <h3 class="font-heading text-xl font-bold text-white">
                                    <a class="hover:text-primary-fixed transition-colors" href="{{ route('services.show', $service) }}">{{ $service->title }}</a>
                                </h3>
                                @if ($description)
                                    <p class="text-slate-300 text-sm leading-relaxed mt-3">{{ $description }}</p>
                                @endif
                                @if ($points->isNotEmpty())
                                    <ul class="text-sm text-slate-200 space-y-2 mt-5">
                                        @foreach ($points as $point)
                                            <li class="flex items-center gap-2"><span class="material-symbols-outlined text-primary-fixed text-[18px]">check_circle</span>{{ ($point['title'] ?? '') ?: ($point['text'] ?? '') }}</li>
                                        @endforeach
                                    </ul>
                                @endif
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

    @if ($serviceFeatures->isNotEmpty())
        <section class="w-full relative py-12 md:py-16">
            <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
                <div class="max-w-3xl text-center mx-auto mb-12 md:mb-14">
                    <span class="inline-block text-xs font-mono uppercase tracking-widest text-primary-fixed bg-primary-fixed/10 border border-primary-fixed/30 px-3.5 py-1 rounded-full">সার্ভিসের বৈশিষ্ট্য</span>
                    <h2 class="font-heading text-3xl md:text-4xl font-extrabold text-white mt-4 tracking-tight">প্রতিটি সার্ভিসের অন্তর্ভুক্ত ফিচার</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($serviceFeatures as $feature)
                        <article class="flex gap-4 rounded-2xl bg-[#111722] border border-white/10 p-6">
                            <div class="w-12 h-12 rounded-xl bg-primary-fixed/10 border border-primary-fixed/30 flex items-center justify-center text-primary-fixed shrink-0">
                                <span class="material-symbols-outlined text-[24px]">check_circle</span>
                            </div>
                            <div>
                                <span class="text-xs text-primary-fixed">{{ $feature['service_title'] }}</span>
                                <h3 class="font-heading text-lg font-bold text-white">{{ $feature['title'] }}</h3>
                                <p class="text-slate-300 text-sm leading-relaxed mt-1.5">{{ $feature['text'] }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if ($serviceSteps->isNotEmpty())
        <section class="w-full bg-[#0B0F14]/70 border-y border-white/10 relative py-16 md:py-24">
            <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
                <div class="max-w-3xl text-center mx-auto mb-12 md:mb-14">
                    <span class="inline-block text-xs font-mono uppercase tracking-widest text-primary-fixed bg-primary-fixed/10 border border-primary-fixed/30 px-3.5 py-1 rounded-full">কাজের ধাপ</span>
                    <h2 class="font-heading text-3xl md:text-4xl font-extrabold text-white mt-4 tracking-tight">সার্ভিসভিত্তিক কাজের ধাপ</h2>
                </div>
                <ol class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($serviceSteps as $step)
                        <li class="relative rounded-2xl bg-[#111722] border border-white/10 p-6">
                            <span class="absolute top-5 right-6 font-mono text-4xl font-bold text-white/5">{{ sprintf('%02d', $loop->iteration) }}</span>
                            <span class="text-xs text-primary-fixed">{{ $step['service_title'] }}</span>
                            @if ($step['title'])
                                <h3 class="font-heading text-lg font-bold text-white mt-3">{{ $step['title'] }}</h3>
                            @endif
                            @if ($step['text'])
                                <p class="text-slate-300 text-sm leading-relaxed mt-2">{{ $step['text'] }}</p>
                            @endif
                        </li>
                    @endforeach
                </ol>
            </div>
        </section>
    @endif

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

    @if ($serviceFaqs->isNotEmpty())
        <section class="w-full bg-[#0B0F14]/70 border-y border-white/10 relative py-16 md:py-24">
            <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
                <div class="max-w-3xl text-center mx-auto mb-12 md:mb-14">
                    <span class="inline-block text-xs font-mono uppercase tracking-widest text-primary-fixed bg-primary-fixed/10 border border-primary-fixed/30 px-3.5 py-1 rounded-full">সচরাচর জিজ্ঞাসা</span>
                    <h2 class="font-heading text-3xl md:text-4xl font-extrabold text-white mt-4 tracking-tight">সার্ভিস সম্পর্কে প্রশ্ন</h2>
                </div>
                <div class="max-w-3xl mx-auto flex flex-col gap-3">
                    @foreach ($serviceFaqs as $faq)
                        <details class="group rounded-2xl bg-[#111722] border border-white/10 open:border-primary-fixed/40 transition-colors">
                            <summary class="flex items-center justify-between gap-4 cursor-pointer list-none p-5 md:p-6 font-heading font-semibold text-white">{{ $faq['question'] }}<span class="material-symbols-outlined text-primary-fixed transition-transform group-open:rotate-180 shrink-0">expand_more</span></summary>
                            <p class="px-5 md:px-6 pb-2 -mt-1 text-xs text-primary-fixed">{{ $faq['service_title'] }}</p>
                            <p class="px-5 md:px-6 pb-5 md:pb-6 text-slate-300 leading-relaxed">{{ $faq['answer'] }}</p>
                        </details>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

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
