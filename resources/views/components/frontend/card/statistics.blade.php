@props(['number', 'label'])

<div class="col d-flex flex-column gap-1">
    <span
        class="site-type-font-heading site-type-text-3xl site-responsive-sm-type-text-4xl site-type-font-extrabold text-primary text-dark">{{ $number }}</span>
    <span class="site-type-text-sm fw-medium site-color-text-slate-200 text-secondary fs-6 ">{{ $label }}</span>
</div>
