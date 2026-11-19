@props(['service'])

<div class="col home-card-column">
    <div
        class="home-card rounded-4 site-surface-bg-arbitrary-hex-111722 border border-white border-opacity-10 site-state-hover-border-border-primary-fixed-opacity-50 p-4 d-flex flex-column justify-content-between site-elevation-shadow-xl site-state-hover-style-translate-y-1-5 site-motion-transition-all site-style-group bg-white site-soft-border">
        <div>
            <a class="position-relative d-block w-100 site-media-aspect-arbitrary-16-opacity-10 rounded-4 overflow-hidden site-surface-bg-arbitrary-hex-0a0e13 bg-white"
                href="{{ route('services.show', $service) }}">
                <img alt="{{ $service->tr('title') }}"
                    class="w-100 h-100 object-fit-cover site-media-object-top site-motion-transition-transform site-motion-duration-500 site-state-group-hover-motion-scale-105"
                    src="{{ $service->getFirstMediaUrl('service-image') }}" />

            </a>

            <h3
                class="site-type-font-heading site-type-text-xl fw-bold text-white mb-2 site-state-group-hover-color-text-primary-fixed site-motion-transition-colors site-heading text-white mt-2">
                <a href="{{ route('services.show', $service) }}">{{ $service->tr('title') }}</a>
            </h3>
        </div>
        <a class="site-layout-flex-1 d-inline-flex align-items-center justify-content-center gap-2 py-3 site-spacing-px-3 bg-primary site-color-text-arbitrary-hex-070a0e site-type-text-xs fw-bold rounded-3 site-elevation-shadow-arbitrary-0-0-12px-rgba-197-243-49-0-25 site-state-hover-surface-bg-primary-fixed-dim site-motion-transition-all small"
            href="{{ route('services.show', $service) }}">
            <span>{{ __('site.view_service') }}</span>
            <span class="fw-bold">↗</span>
        </a>
    </div>
</div>