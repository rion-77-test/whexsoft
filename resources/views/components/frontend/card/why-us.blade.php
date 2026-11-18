@props(['icon', 'title', 'text'])

<div class="col home-card-column">
    <div
        class="home-card site-spacing-p-5 rounded-4 site-surface-bg-arbitrary-hex-111722 border border-white border-opacity-10 site-state-hover-border-border-primary-fixed-opacity-40 site-motion-transition-all bg-white site-soft-border">
        <div class="d-flex align-items-center gap-3-5 mb-2">
            <span
    class="material-symbols-outlined site-accent-component d-inline-flex align-items-center justify-content-center rounded-circle site-dimension-w-10 site-dimension-h-10 site-type-text-arbitrary-22px">{{ $icon }}</span>
            <h3 class="site-type-font-heading fs-6 fw-bold text-white site-heading text-white">&nbsp;
                {{ $title }}</h3>
        </div>
        <p
            class="site-type-text-xs site-color-text-slate-300 site-type-leading-relaxed site-copy text-secondary small fw-medium">
            {{ $text }}</p>
    </div>
</div>
