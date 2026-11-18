@props(['href'])

<li class="lh-1 site-body-text">
    <a {{ $attributes->merge(['class' => 'site-type-text-sm fw-medium text-secondary site-state-hover-color-text-primary-container site-motion-transition-colors site-accent-hover']) }}
        href="{{ $href }}">{{ $slot }}</a>
</li>