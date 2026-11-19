@extends('layouts.admin')

@section('title', 'Services')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <h1 class="mb-0 fs-3">Services</h1>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.service-categories.index') }}"
                        class="btn btn-outline-secondary btn-sm">Service Categories</a>
                    <a href="{{ route('admin.services.create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-lg me-1"></i> Create Service
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Service</th>
                                    <th>English</th>
                                    <th>Category</th>
                                    <th>Packages</th>
                                    <th>Status</th>
                                    <th>Sort Order</th>
                                    <th>Created</th>
                                    <th class="text-nowrap">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($services as $service)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="{{ $service->image_url }}" alt="{{ $service->title }}"
                                                    class="rounded object-fit-cover" width="64" height="48">
                                                <div>
                                                    <strong>{{ $service->title }}</strong>
                                                    <div class="text-secondary small">{{ $service->short_description }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><x-admin.translation-status :model="$service" /></td>
                                        <td>{{ $service->serviceCategory?->name ?? '—' }}</td>
                                        <td>{{ $service->packages_count }}</td>
                                        <td>
                                            <span class="badge {{ $service->is_active ? 'text-bg-success' : 'text-bg-secondary' }}">
                                                {{ $service->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>{{ $service->sort_order }}</td>
                                        <td class="text-nowrap">{{ $service->created_at->format('Y-m-d') }}</td>
                                        <td class="text-nowrap">
                                            <a href="{{ route('admin.services.show', $service) }}"
                                                class="btn btn-sm btn-outline-success" aria-label="View service">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.services.edit', $service) }}"
                                                class="btn btn-sm btn-outline-primary" aria-label="Edit service">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('Delete this service?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    aria-label="Delete service">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-secondary py-4">
                                            No services yet. Create your first service to get started.
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
