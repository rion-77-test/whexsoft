@props(['service'])

@php
    $serviceImage =
        $service->getFirstMediaUrl('service-image') ?:
        $serviceImages[$service->slug] ?? asset('assets/frontend/images/brand-graphic.jpg');
    $serviceIcon = $serviceIcons[$service->slug] ?? 'language';
    $serviceDescription =
        $service->short_description ?: \Illuminate\Support\Str::limit(strip_tags($service->intro ?? ''), 140);
    $serviceDescription =
        $serviceDescription ?:
        $serviceDescriptions[$service->slug] ?? 'আপনার ব্যবসার লক্ষ্য অনুযায়ী কাস্টম ডিজাইন ও ডেভেলপমেন্ট।';
    $features = collect($service->features ?? [])
        ->pluck('title')
        ->filter()
        ->take(2);
@endphp
<div class="col home-card-column">
    <div
        class="home-card rounded-4 site-surface-bg-arbitrary-hex-111722 border border-white border-opacity-10 site-state-hover-border-border-primary-fixed-opacity-50 p-4 d-flex flex-column justify-content-between site-elevation-shadow-xl site-state-hover-style-translate-y-1-5 site-motion-transition-all site-style-group bg-white site-soft-border">
        <div>
            <div
                class="site-dimension-w-12 site-dimension-h-12 rounded-4 bg-primary bg-opacity-10 border site-border-border-primary-fixed-opacity-30 d-flex align-items-center justify-content-center text-primary site-spacing-mb-5 site-state-group-hover-motion-scale-110 site-motion-transition-transform site-accent-component text-dark">
                <span class="material-symbols-outlined site-type-text-arbitrary-26px">{{ $serviceIcon }}</span>
            </div>
            <h3
                class="site-type-font-heading site-type-text-xl fw-bold text-white mb-2 site-state-group-hover-color-text-primary-fixed site-motion-transition-colors site-heading text-white">
                <a href="{{ route('services.show', $service) }}">{{ $service->title }}</a>
            </h3>
            <p
                class="site-color-text-slate-300 site-type-text-sm mb-4 site-type-leading-relaxed site-copy text-secondary fs-6 fw-medium">
                {{ $serviceDescription }}</p>
            <div
                class="site-spacing-space-y-2 mb-4 site-type-text-xs site-color-text-slate-300 text-secondary small fw-medium">
                @foreach ($features as $feature)
                    <div class="d-flex align-items-center gap-2"><span
                            class="material-symbols-outlined text-primary fs-6 text-dark">check_circle</span>
                        {{ $feature }}</div>
                    @endforeach @if ($features->isEmpty())
                        <div class="d-flex align-items-center gap-2"><span
                                class="material-symbols-outlined text-primary fs-6 text-dark">check_circle</span>
                            কাস্টম ব্র্যান্ড ডিজাইন</div>
                        <div class="d-flex align-items-center gap-2"><span
                                class="material-symbols-outlined text-primary fs-6 text-dark">check_circle</span>
                            লাইভ-পরবর্তী সাপোর্ট</div>
                    @endif
            </div>
        </div>
        <a class="pt-3 border-top border-white border-opacity-10 text-primary site-type-font-mono site-type-text-sm d-flex align-items-center justify-content-between site-state-hover-type-underline site-soft-border text-dark fs-6 fw-medium site-content-action"
            href="{{ route('services.show', $service) }}">
            <span>বিস্তারিত জানুন</span>
            <span class="material-symbols-outlined site-type-text-arbitrary-18px">arrow_forward</span>
        </a>
    </div>
</div>
