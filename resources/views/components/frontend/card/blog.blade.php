@props(['post'])

@php
    // Category name: translated name from the category record, original string as a fallback
    $categoryName = $post->postCategory?->tr('name') ?? $post->category;
@endphp
<div class="col home-card-column">
    <article
        class="home-card d-flex flex-column site-surface-bg-surface-card border site-border-border-border-subtle site-state-hover-border-border-primary-fixed-opacity-40 rounded-4 overflow-hidden site-elevation-shadow-md site-state-hover-elevation-shadow-xl site-state-hover-style-translate-y-1 site-motion-transition-all site-motion-duration-300 site-style-group bg-white site-soft-border">
        <div
            class="position-relative w-100 site-media-aspect-arbitrary-16-opacity-10 site-surface-bg-surface-default overflow-hidden">
            <img class="w-100 h-100 object-fit-cover site-state-group-hover-motion-scale-105 site-motion-transition-transform site-motion-duration-500"
                alt="{{ $post->tr('title') }}" src="{{ $post->getFirstMediaUrl('featured-image') }}" />
            @if ($post->category)
                <div class="position-absolute site-position-top-4 site-position-left-4 site-position-z-10">
                    <span
                        class="site-spacing-px-3 py-1 rounded-pill site-surface-bg-surface-card-elevated-opacity-90 site-effect-backdrop-blur-md text-primary site-type-font-label-md site-type-text-label-md site-elevation-shadow-sm bg-white text-black small fw-medium">{{ $categoryName }}</span>
                </div>
            @endif
        </div>
        <div class="p-4 d-flex flex-column site-layout-flex-1 justify-content-between">
            <div>
                <a class="d-block site-state-group-hover-color-text-primary-container site-motion-transition-colors"
                    href="{{ route('blog.show', $post) }}">
                    <h4
                        class="site-type-font-headline-sm site-type-text-headline-sm site-color-text-primary site-type-tracking-tight site-spacing-mb-space-xs site-type-leading-snug site-heading text-white">
                        {{ $post->tr('title') }}</h4>
                </a>
                <p
                    class="site-type-font-body-sm site-type-text-body-sm text-body-secondary site-type-leading-relaxed mb-3 site-copy text-secondary fs-6 fw-medium">
                    {{ \Illuminate\Support\Str::limit($post->tr('excerpt') ?: strip_tags((string) $post->tr('content')), 140) }}
                </p>
            </div>
            <div
                class="pt-2 d-flex align-items-center justify-content-between site-type-font-caption site-type-text-caption text-body-secondary text-secondary small fw-medium">
                <span class="d-flex align-items-center gap-1"><span
                        class="material-symbols-outlined fs-6">schedule</span>
                    {{ __('site.read_time', ['minutes' => $post->read_time]) }}</span>
                <span>{{ optional($post->published_at)->format('d M Y') }}</span>
            </div>
        </div>
    </article>
</div>