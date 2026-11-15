@extends('layouts.admin')

@section('title', 'Testimonials')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <h1 class="mb-0 fs-3">Testimonials</h1>
                <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-lg me-1"></i> Create Testimonial
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
                                    <th>Client</th>
                                    <th>Service</th>
                                    <th>Quote</th>
                                    <th>Status</th>
                                    <th>Sort Order</th>
                                    <th class="text-nowrap">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($testimonials as $testimonial)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="{{ $testimonial->photo_url }}" alt="{{ $testimonial->client_name }}"
                                                    class="rounded-circle object-fit-cover" width="48" height="48">
                                                <div>
                                                    <strong>{{ $testimonial->client_name }}</strong>
                                                    @if ($testimonial->business_name)
                                                        <div class="text-secondary small">{{ $testimonial->business_name }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $testimonial->service?->title ?? '—' }}</td>
                                        <td class="text-secondary">{{ \Illuminate\Support\Str::limit($testimonial->quote, 120) }}</td>
                                        <td>
                                            <span class="badge {{ $testimonial->is_published ? 'text-bg-success' : 'text-bg-secondary' }}">
                                                {{ $testimonial->is_published ? 'Published' : 'Draft' }}
                                            </span>
                                        </td>
                                        <td>{{ $testimonial->sort_order }}</td>
                                        <td class="text-nowrap">
                                            <a href="{{ route('admin.testimonials.show', $testimonial) }}"
                                                class="btn btn-sm btn-outline-success" aria-label="View testimonial">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}"
                                                class="btn btn-sm btn-outline-primary" aria-label="Edit testimonial">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.testimonials.destroy', $testimonial) }}"
                                                method="POST" class="d-inline"
                                                onsubmit="return confirm('Delete this testimonial?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    aria-label="Delete testimonial">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-secondary py-4">
                                            No testimonials yet.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @if ($testimonials->hasPages())
                    <div class="card-footer">
                        {{ $testimonials->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection
