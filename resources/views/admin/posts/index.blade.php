@extends('layouts.admin')

@section('title', 'Posts')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <h1 class="mb-0 fs-3">Posts</h1>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.post-categories.index') }}" class="btn btn-outline-secondary btn-sm">
                        Post Categories
                    </a>
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-lg me-1"></i> Create Post
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
                                    <th>Post</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Published</th>
                                    <th class="text-nowrap">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}"
                                                    class="rounded object-fit-cover" width="64" height="48">
                                                <div>
                                                    <strong>{{ $post->title }}</strong>
                                                    <div class="text-secondary small">{{ $post->excerpt }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $post->category ?: '—' }}</td>
                                        <td>
                                            <span class="badge {{ $post->status === 'published' ? 'text-bg-success' : 'text-bg-secondary' }}">
                                                {{ ucfirst($post->status) }}
                                            </span>
                                        </td>
                                        <td class="text-nowrap">{{ $post->published_at?->format('Y-m-d H:i') ?? '—' }}</td>
                                        <td class="text-nowrap">
                                            <a href="{{ route('admin.posts.show', $post) }}"
                                                class="btn btn-sm btn-outline-success" aria-label="View post">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.posts.edit', $post) }}"
                                                class="btn btn-sm btn-outline-primary" aria-label="Edit post">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('Delete this post?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    aria-label="Delete post">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-secondary py-4">
                                            No posts yet. Create your first post to get started.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @if ($posts->hasPages())
                    <div class="card-footer">
                        {{ $posts->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection
