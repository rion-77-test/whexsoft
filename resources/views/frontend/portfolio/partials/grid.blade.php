@if ($projects->isEmpty())
    <div
        class="rounded-4 site-surface-bg-arbitrary-hex-11171f-opacity-80 border border-white border-opacity-10 site-spacing-p-10 text-center site-color-text-slate-300 bg-white site-soft-border text-secondary">
        {{ __('portfolio.index.empty') }}</div>
@else
    <div
        class="d-grid site-layout-grid-cols-1 site-responsive-md-layout-grid-cols-2 site-responsive-lg-layout-grid-cols-3 site-spacing-gap-8">
        @foreach ($projects as $project)
            <x-frontend.card.project :project="$project" />
        @endforeach
    </div>

    {{-- Pagination --}}
    <div data-portfolio-pagination>
        {{ $projects->links('partials.frontend.pagination') }}
    </div>
@endif