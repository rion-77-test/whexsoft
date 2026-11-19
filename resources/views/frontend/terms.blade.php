@extends('layouts.frontend') @section('title', __('legal.meta.terms_title'))
@section('description', __('legal.meta.terms_description'))
@section('page', 'legal') @section('content')
<x-frontend.page><section class="w-100 position-relative site-spacing-pt-32 site-responsive-md-spacing-pt-40 pb-5 site-responsive-md-spacing-pb-16 site-section site-section--dark">
        <div class="site-dimension-max-w-3xl mx-auto w-100 position-relative site-spacing-px-5 site-responsive-sm-spacing-px-8 site-responsive-lg-spacing-px-10">
            <h1 class="site-type-font-display-xl site-type-text-display-xl-mobile site-responsive-md-type-text-display-xl site-color-text-primary site-type-tracking-tight mb-3 site-heading text-white">{{ __('legal.terms.title') }}</h1>
            @foreach (__('legal.terms.sections') as $section)
            <h2 class="site-type-font-headline-sm site-type-text-headline-sm text-light site-spacing-mt-space-xl mb-2 site-heading text-white">{{ $section['title'] }}</h2>
            <p class="site-type-font-body-md site-type-text-body-md text-body-secondary site-copy text-secondary">{{ $section['text'] }}</p>
            @endforeach
        </div>
    </section></x-frontend.page>
@endsection
