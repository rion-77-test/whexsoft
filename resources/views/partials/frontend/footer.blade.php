<footer
    class="w-100 site-surface-bg-surface-default site-spacing-pt-space-3xl site-spacing-pb-space-xl site-elevation-shadow-arbitrary-0-1px-12px-rgba-0-0-0-0-5 site-footer">
    <div
        class="site-dimension-max-w-7xl mx-auto site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
        <div
            class="d-grid site-layout-grid-cols-1 site-responsive-md-layout-grid-cols-2 site-responsive-lg-layout-grid-cols-12 gap-4 site-spacing-mb-space-2xl">
            <div class="site-responsive-lg-layout-col-span-4 site-spacing-space-y-space-md">
                <div class="d-flex align-items-center site-spacing-gap-3">
                    <img alt="WhexSoft logo" class="site-dimension-h-8 w-auto object-fit-contain rounded-1"
                        src="{{ asset('assets/frontend/images/whexsoft-logo.png') }}" />
                    <span class="site-type-font-title-md site-type-text-title-md text-light text-white">WhexSoft</span>
                </div>
                <p
                    class="site-type-font-body-sm site-type-text-body-sm text-body-secondary site-type-leading-relaxed site-spacing-pr-space-lg site-copy text-secondary fs-6 fw-medium">
                    আধুনিক প্রতিষ্ঠানের প্রবৃদ্ধিতে সহায়তা করে—এমন সম্প্রসারণযোগ্য ডিজিটাল অবকাঠামো ও সৃজনশীল সমাধান
                    তৈরি করি।</p>
                <div class="d-flex align-items-center gap-2 site-spacing-pt-space-xs">
                    <a class="site-dimension-w-10 site-dimension-h-10 rounded-3 site-surface-bg-surface-card d-flex align-items-center justify-content-center text-body-secondary site-state-hover-color-text-primary-container site-state-hover-surface-bg-surface-card-elevated site-motion-transition-colors bg-white text-secondary site-accent-hover"
                        href="https://www.facebook.com/" rel="noopener noreferrer" target="_blank"
                        aria-label="Facebook">
                        <span class="material-symbols-outlined fs-5">public</span>
                    </a>
                    <a class="site-dimension-w-10 site-dimension-h-10 rounded-3 site-surface-bg-surface-card d-flex align-items-center justify-content-center text-body-secondary site-state-hover-color-text-primary-container site-state-hover-surface-bg-surface-card-elevated site-motion-transition-colors bg-white text-secondary site-accent-hover"
                        href="https://www.linkedin.com/company/whexsoft" rel="noopener noreferrer" target="_blank"
                        aria-label="LinkedIn">
                        <span class="material-symbols-outlined fs-5">badge</span>
                    </a>
                    <a class="site-dimension-w-10 site-dimension-h-10 rounded-3 site-surface-bg-surface-card d-flex align-items-center justify-content-center text-body-secondary site-state-hover-color-text-primary-container site-state-hover-surface-bg-surface-card-elevated site-motion-transition-colors bg-white text-secondary site-accent-hover"
                        href="https://wa.me/8801335198859" rel="noopener noreferrer" target="_blank"
                        aria-label="WhatsApp">
                        <span class="material-symbols-outlined fs-5">forum</span>
                    </a>
                </div>
            </div>

            <div class="site-responsive-lg-layout-col-span-2 site-spacing-space-y-space-md">
                <h4 class="site-type-font-title-md site-type-text-title-md text-light site-heading text-white">কুইক লিংক
                </h4>
                <ul class="site-spacing-space-y-space-xs">
                    <x-admin.footer-quick-link :href="route('home')">হোম</x-admin.footer-quick-link>
                    <x-admin.footer-quick-link :href="route('about')">আমাদের সম্পর্কে</x-admin.footer-quick-link>
                    <x-admin.footer-quick-link :href="route('portfolio.index')">আমাদের কাজ</x-admin.footer-quick-link>
                    <x-admin.footer-quick-link :href="route('process')">কাজের ধাপ</x-admin.footer-quick-link>
                    <x-admin.footer-quick-link :href="route('blog.index')">ব্লগ</x-admin.footer-quick-link>
                    <x-admin.footer-quick-link :href="route('faq')">এফএকিউ</x-admin.footer-quick-link>
                    <x-admin.footer-quick-link :href="route('contact')">যোগাযোগ</x-admin.footer-quick-link>
                </ul>
            </div>

            <div class="site-responsive-lg-layout-col-span-3 site-spacing-space-y-space-md">
                <h4 class="site-type-font-title-md site-type-text-title-md text-light site-heading text-white">
                    সার্ভিসসমূহ</h4>
                <ul class="site-spacing-space-y-space-xs">
                    @forelse ($navServices as $navService)
                        <x-admin.footer-quick-link
                            :href="route('services.show', $navService)">{{ $navService->title }}</x-admin.footer-quick-link>
                    @empty
                        <x-admin.footer-quick-link :href="route('services.index')">আমাদের সার্ভিসসমূহ</x-admin.footer-quick-link>
                    @endforelse
                </ul>
            </div>

            <div class="site-responsive-lg-layout-col-span-3 site-spacing-space-y-space-md">
                <h4 class="site-type-font-title-md site-type-text-title-md text-light site-heading text-white">যোগাযোগের
                    ঠিকানা</h4>
                <div
                    class="site-spacing-space-y-space-sm site-type-font-body-sm site-type-text-sm text-body-secondary text-secondary fw-medium">
                    <div class="d-flex align-items-start gap-1">
                        <span
                            class="material-symbols-outlined site-type-text-arbitrary-18px text-primary flex-shrink-0 site-spacing-mt-0-5 text-dark">location_on</span>
                        <span>সোনির আখড়া, যাত্রাবাড়ী, ঢাকা-<span class='nubmer-1-fixer'>১</span>২৩৬</span>
                    </div>
                    <div class="d-flex align-items-center gap-1">
                        <span
                            class="material-symbols-outlined site-type-text-arbitrary-18px text-primary flex-shrink-0 text-dark">call</span>
                        <a class="site-state-hover-color-text-primary-container site-motion-transition-colors site-accent-hover"
                            href="tel:01335198859">০<span class='nubmer-1-fixer'>১</span>৩৩৫-<span
                                class='nubmer-1-fixer'>১</span>৯৮৮৫৯</a>
                    </div>
                    <div class="d-flex align-items-center gap-1">
                        <span
                            class="material-symbols-outlined site-type-text-arbitrary-18px text-primary flex-shrink-0 text-dark">mail</span>
                        <a class="site-state-hover-color-text-primary-container site-motion-transition-colors site-accent-hover"
                            href="mailto:contact.whexsoft@gmail.com">contact.whexsoft@gmail.com</a>
                    </div>
                    <div class="d-flex align-items-start gap-1">
                        <span
                            class="material-symbols-outlined site-type-text-arbitrary-18px text-primary flex-shrink-0 site-spacing-mt-0-5 text-dark">schedule</span>
                        <span>শনি - বৃহস্পতি: সকাল ১০টা - রাত ৮টা</span>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="pt-4 d-flex flex-column flex-md-row align-items-center justify-content-between gap-3 site-type-font-caption site-type-text-caption text-body-secondary text-secondary small fw-medium">
            <p class="site-copy">© {{ now()->format('Y') }} WhexSoft। সর্বস্বত্ব সংরক্ষিত।</p>
            <div class="d-flex align-items-center gap-4">
                <a class="site-state-hover-color-text-text-primary site-motion-transition-colors"
                    href="{{ route('privacy') }}">গোপনীয়তা নীতি</a>
                <a class="site-state-hover-color-text-text-primary site-motion-transition-colors"
                    href="{{ route('terms') }}">শর্তাবলী</a>
                <a class="site-state-hover-color-text-text-primary site-motion-transition-colors"
                    href="{{ route('home') }}">সাইটম্যাপ</a>
            </div>
        </div>
    </div>
</footer>
