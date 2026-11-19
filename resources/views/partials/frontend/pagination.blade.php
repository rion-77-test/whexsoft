@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('pagination.navigation_label') }}" class="site-spacing-mt-space-2xl d-flex flex-wrap align-items-center justify-content-center gap-2"> @if ($paginator->onFirstPage())
    <span class="site-dimension-w-10 site-dimension-h-10 rounded-3 site-surface-bg-surface-card text-body-secondary d-flex align-items-center justify-content-center site-effect-opacity-50 site-effect-cursor-not-allowed bg-white text-secondary">
        <span class="material-symbols-outlined fs-5">chevron_left</span>
    </span> @else
    <a class="site-dimension-w-10 site-dimension-h-10 rounded-3 site-surface-bg-surface-card text-body-secondary d-flex align-items-center justify-content-center site-state-hover-surface-bg-surface-card-elevated site-state-hover-color-text-text-primary site-motion-transition-all bg-white text-secondary" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="{{ __('pagination.previous_page') }}">
        <span class="material-symbols-outlined fs-5">chevron_left</span>
    </a> @endif @foreach ($elements as $element) @if (is_string($element))
    <span class="site-dimension-w-10 site-dimension-h-10 rounded-3 site-surface-bg-surface-card text-body-secondary d-flex align-items-center justify-content-center bg-white text-secondary">{{ $element }}</span> @endif @if (is_array($element)) @foreach ($element as $page => $url) @if ($page == $paginator->currentPage())
    <span aria-current="page" class="site-dimension-w-10 site-dimension-h-10 rounded-3 bg-primary site-color-text-text-inverse site-type-font-label-lg site-type-text-label-lg fw-bold d-flex align-items-center justify-content-center text-black fs-6">{{ $page }}</span> @else
    <a class="site-dimension-w-10 site-dimension-h-10 rounded-3 site-surface-bg-surface-card text-body-secondary d-flex align-items-center justify-content-center site-state-hover-surface-bg-surface-card-elevated site-state-hover-color-text-text-primary site-motion-transition-all bg-white text-secondary" href="{{ $url }}" aria-label="{{ __('pagination.page', ['page' => $page]) }}">{{ $page }}</a> @endif @endforeach @endif @endforeach @if ($paginator->hasMorePages())
    <a class="site-dimension-w-10 site-dimension-h-10 rounded-3 site-surface-bg-surface-card text-body-secondary d-flex align-items-center justify-content-center site-state-hover-surface-bg-surface-card-elevated site-state-hover-color-text-text-primary site-motion-transition-all bg-white text-secondary" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="{{ __('pagination.next_page') }}">
        <span class="material-symbols-outlined fs-5">chevron_right</span>
    </a> @else
    <span class="site-dimension-w-10 site-dimension-h-10 rounded-3 site-surface-bg-surface-card text-body-secondary d-flex align-items-center justify-content-center site-effect-opacity-50 site-effect-cursor-not-allowed bg-white text-secondary">
        <span class="material-symbols-outlined fs-5">chevron_right</span>
    </span> @endif
</nav>
@endif
