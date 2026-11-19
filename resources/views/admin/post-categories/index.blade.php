@extends('layouts.admin')

@section('title', 'Post Categories')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <h1 class="mb-0 fs-3">Post Categories</h1>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary btn-sm">Posts</a>
                    <a href="{{ route('admin.post-categories.create') }}" class="btn btn-primary btn-sm">
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
                                    <th>Name</th>
                                    <th>English</th>
                                    <th>Slug</th>
                                    <th>Posts</th>
                                    <th>Status</th>
                                    <th class="text-nowrap">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>
                                            <strong>{{ $category->name }}</strong>
                                            @if ($category->description)
                                                <div class="text-secondary small">{{ $category->description }}</div>
                                            @endif
                                        </td>
                                        <td><x-admin.translation-status :model="$category" /></td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{{ $category->posts_count }}</td>
                                        <td>
                                            <span class="badge {{ $category->is_active ? 'text-bg-success' : 'text-bg-secondary' }}">
                                                {{ $category->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="{{ route('admin.post-categories.show', $category) }}"
                                                class="btn btn-sm btn-outline-success" aria-label="View category">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.post-categories.edit', $category) }}"
                                                class="btn btn-sm btn-outline-primary" aria-label="Edit category">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.post-categories.destroy', $category) }}"
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
                                            No post categories yet.
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
