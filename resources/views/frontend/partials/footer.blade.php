<footer class="w-full bg-surface-default pt-space-3xl pb-space-xl shadow-[0_-1px_12px_rgba(0,0,0,0.5)]">
    <div class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-gutter mb-space-2xl">
            <div class="lg:col-span-4 space-y-space-md">
                <div class="flex items-center gap-3">
                    <img alt="WhexSoft logo" class="h-8 w-auto object-contain rounded" src="{{ asset('assets/frontend/images/whexsoft-logo.jpg') }}" />
                    <span class="font-title-md text-title-md text-text-primary">WhexSoft</span>
                </div>
                <p class="font-body-sm text-body-sm text-text-secondary leading-relaxed pr-space-lg">WhexSoft আপনার ব্যবসার প্রয়োজন বুঝে ওয়েবসাইট পরিকল্পনা, ডিজাইন ও তৈরি করতে সাহায্য করে।</p>
                <div class="flex items-center gap-space-sm pt-space-xs">
                    <a class="w-10 h-10 rounded-lg bg-surface-card flex items-center justify-center text-text-secondary hover:text-primary-container hover:bg-surface-card-elevated transition-colors" href="https://www.facebook.com/" rel="noopener noreferrer" target="_blank" aria-label="Facebook">
                        <span class="material-symbols-outlined text-[20px]">public</span>
                    </a>
                    <a class="w-10 h-10 rounded-lg bg-surface-card flex items-center justify-center text-text-secondary hover:text-primary-container hover:bg-surface-card-elevated transition-colors" href="https://www.linkedin.com/company/whexsoft" rel="noopener noreferrer" target="_blank" aria-label="LinkedIn">
                        <span class="material-symbols-outlined text-[20px]">badge</span>
                    </a>
                    <a class="w-10 h-10 rounded-lg bg-surface-card flex items-center justify-center text-text-secondary hover:text-primary-container hover:bg-surface-card-elevated transition-colors" href="https://wa.me/8801335198859" rel="noopener noreferrer" target="_blank" aria-label="WhatsApp">
                        <span class="material-symbols-outlined text-[20px]">forum</span>
                    </a>
                </div>
            </div>
            <div class="lg:col-span-2 space-y-space-md">
                <h4 class="font-title-md text-title-md text-text-primary">কুইক লিংক</h4>
                <ul class="space-y-space-xs">
                    <li class="leading-none"><a class="font-body-sm text-body-sm text-text-secondary hover:text-primary-container transition-colors" href="{{ route('home') }}">হোম</a></li>
                    <li class="leading-none"><a class="font-body-sm text-body-sm text-text-secondary hover:text-primary-container transition-colors" href="{{ route('about') }}">আমাদের সম্পর্কে</a></li>
                    <li class="leading-none"><a class="font-body-sm text-body-sm text-text-secondary hover:text-primary-container transition-colors" href="{{ route('portfolio.index') }}">আমাদের কাজ</a></li>
                    <li class="leading-none"><a class="font-body-sm text-body-sm text-text-secondary hover:text-primary-container transition-colors" href="{{ route('pricing') }}">প্যাকেজ ও মূল্য</a></li>
                    <li class="leading-none"><a class="font-body-sm text-body-sm text-text-secondary hover:text-primary-container transition-colors" href="{{ route('process') }}">কাজের ধাপ</a></li>
                    <li class="leading-none"><a class="font-body-sm text-body-sm text-text-secondary hover:text-primary-container transition-colors" href="{{ route('blog.index') }}">ব্লগ</a></li>
                    <li class="leading-none"><a class="font-body-sm text-body-sm text-text-secondary hover:text-primary-container transition-colors" href="{{ route('faq') }}">এফএকিউ</a></li>
                    <li class="leading-none"><a class="font-body-sm text-body-sm text-text-secondary hover:text-primary-container transition-colors" href="{{ route('contact') }}">যোগাযোগ</a></li>
                </ul>
            </div>
            <div class="lg:col-span-3 space-y-space-md">
                <h4 class="font-title-md text-title-md text-text-primary">সার্ভিসসমূহ</h4>
                <ul class="space-y-space-xs">
                    @forelse ($navServices as $navService)
                        <li class="leading-none">
                            <a class="font-body-sm text-body-sm text-text-secondary hover:text-primary-container transition-colors" href="{{ route('services.show', $navService) }}">{{ $navService->title }}</a>
                        </li>
                    @empty
                        <li class="leading-none"><a class="font-body-sm text-body-sm text-text-secondary hover:text-primary-container transition-colors" href="{{ route('services.index') }}">আমাদের সার্ভিসসমূহ</a></li>
                    @endforelse
                </ul>
            </div>
            <div class="lg:col-span-3 space-y-space-md">
                <h4 class="font-title-md text-title-md text-text-primary">যোগাযোগের ঠিকানা</h4>
                <div class="space-y-space-sm font-body-sm text-body-sm text-text-secondary">
                    <div class="flex items-start gap-space-xs">
                        <span class="material-symbols-outlined text-[18px] text-primary-container shrink-0 mt-0.5">location_on</span>
                        <span>সোনির আখড়া, যাত্রাবাড়ী, ঢাকা-১২৩৬</span>
                    </div>
                    <div class="flex items-center gap-space-xs">
                        <span class="material-symbols-outlined text-[18px] text-primary-container shrink-0">call</span>
                        <a class="hover:text-primary-container transition-colors" href="tel:01335198859">০১৩৩৫-১৯৮৮৫৯</a>
                    </div>
                    <div class="flex items-center gap-space-xs">
                        <span class="material-symbols-outlined text-[18px] text-primary-container shrink-0">mail</span>
                        <a class="hover:text-primary-container transition-colors" href="mailto:contact.whexsoft@gmail.com">contact.whexsoft@gmail.com</a>
                    </div>
                    <div class="flex items-start gap-space-xs">
                        <span class="material-symbols-outlined text-[18px] text-primary-container shrink-0 mt-0.5">schedule</span>
                        <span>শনি - বৃহস্পতি: সকাল ১০টা - রাত ৮টা</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-space-lg flex flex-col md:flex-row items-center justify-between gap-space-md font-caption text-caption text-text-muted">
            <p>© {{ now()->format('Y') }} WhexSoft। সর্বস্বত্ব সংরক্ষিত।</p>
            <div class="flex items-center gap-space-lg">
                <a class="hover:text-text-primary transition-colors" href="{{ route('privacy') }}">গোপনীয়তা নীতি</a>
                <a class="hover:text-text-primary transition-colors" href="{{ route('terms') }}">শর্তাবলী</a>
                <a class="hover:text-text-primary transition-colors" href="{{ route('home') }}">সাইটম্যাপ</a>
            </div>
        </div>
    </div>
</footer>
