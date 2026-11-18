@props(['href', 'text'])

<a href="{{ $href }}"
    {{ $attributes->merge(['class' => 'd-inline-flex align-items-center gap-1-5 text-primary site-state-hover-color-text-white site-type-text-sm fw-semibold site-motion-transition-colors text-dark fs-6 site-content-action']) }}>
    <span>{{ $text }}</span>
    <span class="material-symbols-outlined fs-6">north_east</span>
</a>