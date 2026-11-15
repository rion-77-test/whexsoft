@extends('layouts.admin')

@section('title', $testimonial->client_name)

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <h1 class="mb-0 fs-3">{{ $testimonial->client_name }}</h1>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.testimonials.index') }}"
                        class="btn btn-outline-secondary btn-sm">Back</a>
                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}"
                        class="btn btn-primary btn-sm">Edit Testimonial</a>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <img src="{{ $testimonial->photo_url }}" alt="{{ $testimonial->client_name }}"
                            class="rounded-circle object-fit-cover" width="72" height="72">
                        <div>
                            <h2 class="h5 mb-0">{{ $testimonial->client_name }}</h2>
                            <div class="text-secondary">{{ $testimonial->business_name ?: 'No business name' }}</div>
                        </div>
                    </div>

                    <blockquote class="blockquote border-start border-4 ps-3">
                        <p class="mb-0">{{ $testimonial->quote }}</p>
                    </blockquote>

                    <dl class="row mb-0 mt-4">
                        <dt class="col-sm-3">Service</dt>
                        <dd class="col-sm-9">{{ $testimonial->service?->title ?? '—' }}</dd>
                        <dt class="col-sm-3">Status</dt>
                        <dd class="col-sm-9">{{ $testimonial->is_published ? 'Published' : 'Draft' }}</dd>
                        <dt class="col-sm-3">Sort Order</dt>
                        <dd class="col-sm-9">{{ $testimonial->sort_order }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
