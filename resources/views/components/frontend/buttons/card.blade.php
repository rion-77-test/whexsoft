@props(['href', 'text'])

<a href="{{ $href }}"
    {{ $attributes->merge(['class' => 'mt-3 site-type-text-xs text-primary fw-semibold d-flex align-items-center gap-1 site-state-hover-type-underline text-dark small site-content-action']) }}>
    <span>{{ $text }}</span>
    <span class="material-symbols-outlined site-type-text-arbitrary-14px">north_east</span>
</a>
