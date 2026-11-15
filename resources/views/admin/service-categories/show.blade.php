@extends('layouts.admin')

@section('title', $serviceCategory->name)

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <h1 class="mb-0 fs-3">{{ $serviceCategory->name }}</h1>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.service-categories.index') }}"
                        class="btn btn-outline-secondary btn-sm">Back</a>
                    <a href="{{ route('admin.service-categories.edit', $serviceCategory) }}"
                        class="btn btn-primary btn-sm">Edit Category</a>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-lg-4">
                        <img src="{{ $serviceCategory->image_url }}" alt="{{ $serviceCategory->name }}"
                            class="img-fluid w-100 h-100 object-fit-cover">
                    </div>
                    <div class="col-lg-8">
                        <div class="card-body">
                            <p class="text-secondary">{{ $serviceCategory->description ?: 'No description.' }}</p>
                            <dl class="row mb-0">
                                <dt class="col-sm-4">Slug</dt>
                                <dd class="col-sm-8">{{ $serviceCategory->slug }}</dd>
                                <dt class="col-sm-4">Status</dt>
                                <dd class="col-sm-8">{{ $serviceCategory->is_active ? 'Active' : 'Inactive' }}</dd>
                                <dt class="col-sm-4">Sort Order</dt>
                                <dd class="col-sm-8">{{ $serviceCategory->sort_order }}</dd>
                                <dt class="col-sm-4">Services</dt>
                                <dd class="col-sm-8">{{ $services->total() }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2 class="h5 mb-0">Services in this category</h2>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Service</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Sort Order</th>
                                    <th class="text-nowrap">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($services as $service)
                                    <tr>
                                        <td>{{ $service->title }}</td>
                                        <td>{{ $service->slug }}</td>
                                        <td>
                                            <span class="badge {{ $service->is_active ? 'text-bg-success' : 'text-bg-secondary' }}">
                                                {{ $service->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>{{ $service->sort_order }}</td>
                                        <td>
                                            <a href="{{ route('admin.services.show', $service) }}"
                                                class="btn btn-sm btn-outline-success">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-secondary py-4">
                                            No services in this category yet.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @if ($services->hasPages())
                    <div class="card-footer">
                        {{ $services->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection
