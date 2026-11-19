@props(['testimonial'])

<div class="h-100 home-card-column">
    <figure
        class="testimonial-card home-card rounded-4 border border-white border-opacity-10 p-4 d-flex flex-column site-motion-transition-colors site-state-hover-border-border-primary-fixed-opacity-40">

        <figcaption
            class="d-flex align-items-center site-spacing-gap-3 pb-3 border-bottom border-white border-opacity-10">
            <img src="{{ $testimonial->photo_url }}" alt="{{ $testimonial->client_name }}"
                class="testimonial-photo rounded-circle site-dimension-w-10 site-dimension-h-10 flex-shrink-0"
                loading="lazy">

            <div>
                <p class="testimonial-name site-type-text-sm fw-semibold fs-6 mb-0">
                    {{ $testimonial->client_name }}</p>
                <p class="testimonial-business site-type-text-xs small fw-medium mb-0">
                    {{ $testimonial->tr('business_name') }}</p>
            </div>
        </figcaption>

        <blockquote class="testimonial-quote site-type-text-sm site-type-leading-relaxed fs-6 fw-medium mt-3 mb-0">
            {{ \Illuminate\Support\Str::limit($testimonial->tr('quote'), 220) }}
        </blockquote>
    </figure>
</div>