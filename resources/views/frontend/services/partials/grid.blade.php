@if ($services->isEmpty())
    <div
        class="rounded-4 border border-white border-opacity-10 site-surface-bg-arbitrary-hex-111722 site-spacing-p-10 text-center site-color-text-slate-300 bg-white site-soft-border text-secondary">
        {{ __('services.index.empty') }}</div>
@else
    <div
        class="d-grid site-layout-grid-cols-1 site-responsive-md-layout-grid-cols-2 site-responsive-lg-layout-grid-cols-3 gap-4 site-responsive-lg-spacing-gap-8">
        @foreach ($services as $service)
            <x-frontend.card.service :service="$service" />
        @endforeach
    </div>
@endif