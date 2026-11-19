<div class="d-inline-flex align-items-center gap-1 rounded-pill border site-border-border-border-subtle p-1"
     role="group" aria-label="Language">
    @foreach (config('locales.supported') as $code => $meta)
        <a href="{{ route('language.switch', $code) }}" rel="nofollow" lang="{{ $meta['html'] }}"
           @class([
               'px-3 py-1 rounded-pill site-type-text-xs fw-semibold text-decoration-none',
               'site-accent-component' => app()->getLocale() === $code,
               'site-color-text-on-surface-variant site-state-hover-color-text-on-surface' => app()->getLocale() !== $code,
           ])
           @if (app()->getLocale() === $code) aria-current="true" @endif>{{ $meta['short'] }}</a>
    @endforeach
</div>
