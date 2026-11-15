@extends('layouts.admin')

@section('title', $package->name)

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <h1 class="mb-0 fs-3">{{ $package->name }}</h1>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.packages.index') }}" class="btn btn-outline-secondary btn-sm">Back</a>
                    <a href="{{ route('admin.packages.edit', $package) }}" class="btn btn-primary btn-sm">Edit Package</a>
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
                    @if ($package->tagline)
                        <p class="text-secondary">{{ $package->tagline }}</p>
                    @endif

                    <dl class="row">
                        <dt class="col-sm-3">Service</dt>
                        <dd class="col-sm-9">{{ $package->service?->title ?? 'General' }}</dd>
                        <dt class="col-sm-3">Price</dt>
                        <dd class="col-sm-9">{{ $package->price_label }}</dd>
                        <dt class="col-sm-3">Popular</dt>
                        <dd class="col-sm-9">{{ $package->is_popular ? 'Yes' : 'No' }}</dd>
                        <dt class="col-sm-3">Status</dt>
                        <dd class="col-sm-9">{{ $package->is_active ? 'Active' : 'Inactive' }}</dd>
                        <dt class="col-sm-3">Sort Order</dt>
                        <dd class="col-sm-9">{{ $package->sort_order }}</dd>
                    </dl>

                    <h2 class="h5 mt-4">Features</h2>
                    <ul class="list-unstyled mb-0">
                        @forelse ($package->features ?? [] as $feature)
                            <li class="mb-2">
                                @if ($feature['included'] ?? false)
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                @else
                                    <i class="bi bi-x-circle text-secondary me-2"></i>
                                @endif
                                <span class="{{ ($feature['included'] ?? false) ? '' : 'text-secondary text-decoration-line-through' }}">
                                    {{ $feature['text'] ?? '' }}
                                </span>
                            </li>
                        @empty
                            <li class="text-secondary">No features yet.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
