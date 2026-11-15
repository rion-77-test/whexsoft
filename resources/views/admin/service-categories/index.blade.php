@extends('layouts.admin')

@section('title', 'Service Categories')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <h1 class="mb-0 fs-3">Service Categories</h1>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary btn-sm">Services</a>
                    <a href="{{ route('admin.service-categories.create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-lg me-1"></i> Create Category
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
                                    <th>Category</th>
                                    <th>Slug</th>
                                    <th>Services</th>
                                    <th>Status</th>
                                    <th>Sort Order</th>
                                    <th class="text-nowrap">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="{{ $category->image_url }}" alt="{{ $category->name }}"
                                                    class="rounded object-fit-cover" width="56" height="42">
                                                <div>
                                                    <strong>{{ $category->name }}</strong>
                                                    @if ($category->description)
                                                        <div class="text-secondary small">{{ $category->description }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{{ $category->services_count }}</td>
                                        <td>
                                            <span class="badge {{ $category->is_active ? 'text-bg-success' : 'text-bg-secondary' }}">
                                                {{ $category->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>{{ $category->sort_order }}</td>
                                        <td class="text-nowrap">
                                            <a href="{{ route('admin.service-categories.show', $category) }}"
                                                class="btn btn-sm btn-outline-success" aria-label="View category">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.service-categories.edit', $category) }}"
                                                class="btn btn-sm btn-outline-primary" aria-label="Edit category">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.service-categories.destroy', $category) }}"
                                                method="POST" class="d-inline"
                                                onsubmit="return confirm('Delete this category?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    aria-label="Delete category">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-secondary py-4">
                                            No service categories yet.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @if ($categories->hasPages())
                    <div class="card-footer">
                        {{ $categories->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection
