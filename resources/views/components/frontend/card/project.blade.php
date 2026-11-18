@props(['project'])

@php $image = $project->getFirstMediaUrl('project-image') ?: $projectImages[$loop->index % count($projectImages)]; @endphp
<article
    class="site-style-group d-flex flex-column site-surface-bg-arbitrary-hex-11171f-opacity-80 site-effect-backdrop-blur-md rounded-4 border border-white border-opacity-10 site-spacing-p-5 site-state-hover-border-border-primary-fixed-opacity-40 site-motion-transition-all site-motion-duration-300 site-state-hover-style-translate-y-1-5 site-elevation-shadow-xl site-state-hover-elevation-shadow-arbitrary-0-12px-30px-rgba-197-243-49-0-15 bg-white site-soft-border">
    <a class="position-relative d-block w-100 site-media-aspect-arbitrary-16-opacity-10 rounded-4 overflow-hidden site-surface-bg-arbitrary-hex-0a0e13 bg-white"
        href="{{ route('portfolio.show', $project) }}">
        <img alt="{{ $project->title }}"
            class="w-100 h-100 object-fit-cover site-media-object-top site-motion-transition-transform site-motion-duration-500 site-state-group-hover-motion-scale-105"
            src="{{ $image }}" />
        <div
            class="position-absolute top-0 end-0 bottom-0 start-0 site-surface-bg-gradient-to-t site-surface-from-arbitrary-hex-070a0e-opacity-80 site-surface-via-transparent site-surface-to-transparent site-gradient-background">
        </div>
        @if ($project->is_featured)
            <div class="position-absolute site-position-top-2-5 site-position-left-2-5">
                <span
                    class="d-inline-flex align-items-center gap-1 site-spacing-px-2-5 site-spacing-py-0-5 rounded-pill site-surface-bg-arbitrary-hex-070a0e-opacity-80 site-effect-backdrop-blur-md text-primary site-type-font-mono site-type-text-arbitrary-11px border site-border-border-primary-fixed-opacity-30 bg-white text-dark small fw-medium">
                    <span class="material-symbols-outlined site-type-text-arbitrary-12px">trending_up</span>
                    ফিচার্ড প্রজেক্ট
                </span>
            </div>
        @endif
    </a>
    <div class="d-flex flex-column site-layout-flex-1 justify-content-between pt-3">
        <div>
            <div class="d-flex flex-wrap gap-1-5 site-spacing-mb-2-5">
                @if ($project->projectCategory)
                    <span
                        class="site-type-text-arbitrary-11px site-spacing-px-2-5 site-spacing-py-0-5 rounded-2 site-surface-bg-primary-fixed-opacity-15 text-primary fw-medium border site-border-border-primary-fixed-opacity-20 site-accent-component text-dark small ">#{{ $project->projectCategory->name }}</span>
                @endif
            </div>
            <h3
                class="site-type-font-display site-type-text-lg fw-bold text-white site-state-group-hover-color-text-primary-fixed site-motion-transition-colors site-heading text-white">
                <a href="{{ route('portfolio.show', $project) }}">{{ $project->title }}</a>
            </h3>
            <p
                class="site-type-text-xs site-responsive-sm-type-text-sm site-color-text-slate-300 site-spacing-mt-1-5 site-type-line-clamp-2 site-type-leading-relaxed site-copy text-secondary small fw-medium">
                {{ $project->summary }}</p>
        </div>
        <div
            class="pt-3 mt-3 border-top border-white border-opacity-10 d-flex align-items-center justify-content-between site-spacing-gap-3 site-soft-border">
            <a class="site-layout-flex-1 d-inline-flex align-items-center justify-content-center gap-2 py-2 site-spacing-px-3 bg-primary site-color-text-arbitrary-hex-070a0e site-type-text-xs fw-bold rounded-3 site-elevation-shadow-arbitrary-0-0-12px-rgba-197-243-49-0-25 site-state-hover-surface-bg-primary-fixed-dim site-motion-transition-all small"
                href="{{ route('portfolio.show', $project) }}">
                <span>বিস্তারিত দেখুন</span>
                <span class="fw-bold">↗</span>
            </a>
            @if ($project->live_url)
                <a class="d-inline-flex align-items-center justify-content-center site-dimension-w-9 site-dimension-h-9 rounded-3 border site-border-border-white-opacity-15 site-color-text-slate-200 site-state-hover-color-text-primary-fixed site-state-hover-border-border-primary-fixed-opacity-50 site-motion-transition-colors site-soft-border text-secondary"
                    href="{{ $project->live_url }}" rel="noopener noreferrer" target="_blank" aria-label="লাইভ প্রিভিউ">
                    <span class="material-symbols-outlined site-type-text-arbitrary-18px">open_in_new</span>
                </a>
            @endif
        </div>
    </div>
</article>
