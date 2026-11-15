@extends('layouts.admin')

@section('title', 'Packages')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <h1 class="mb-0 fs-3">Packages</h1>
                <a href="{{ route('admin.packages.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-lg me-1"></i> Create Package
                </a>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Package</th>
                                    <th>Service</th>
                                    <th>Price</th>
                                    <th>Popular</th>
                                    <th>Status</th>
                                    <th>Sort Order</th>
                                    <th class="text-nowrap">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($packages as $package)
                                    <tr>
                                        <td>
                                            <strong>{{ $package->name }}</strong>
                                            @if ($package->tagline)
                                                <div class="text-secondary small">{{ $package->tagline }}</div>
                                            @endif
                                        </td>
                                        <td>{{ $package->service?->title ?? 'General' }}</td>
                                        <td>{{ $package->price_label }}</td>
                                        <td>
                                            @if ($package->is_popular)
                                                <span class="badge text-bg-warning">Popular</span>
                                            @else
                                                <span class="text-secondary">—</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge {{ $package->is_active ? 'text-bg-success' : 'text-bg-secondary' }}">
                                                {{ $package->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>{{ $package->sort_order }}</td>
                                        <td class="text-nowrap">
                                            <a href="{{ route('admin.packages.show', $package) }}"
                                                class="btn btn-sm btn-outline-success" aria-label="View package">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.packages.edit', $package) }}"
                                                class="btn btn-sm btn-outline-primary" aria-label="Edit package">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.packages.destroy', $package) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('Delete this package?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    aria-label="Delete package">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-secondary py-4">
                                            No packages yet. Create your first package to get started.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @if ($packages->hasPages())
                    <div class="card-footer">
                        {{ $packages->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection
