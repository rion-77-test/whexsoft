@extends('layouts.admin')

@section('title', $postCategory->name)

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <h1 class="mb-0 fs-3">{{ $postCategory->name }}</h1>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.post-categories.index') }}"
                        class="btn btn-outline-secondary btn-sm">Back</a>
                    <a href="{{ route('admin.post-categories.edit', $postCategory) }}"
                        class="btn btn-primary btn-sm">Edit Category</a>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="card mb-4">
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-3">Slug</dt>
                        <dd class="col-sm-9">{{ $postCategory->slug }}</dd>
                        <dt class="col-sm-3">Status</dt>
                        <dd class="col-sm-9">{{ $postCategory->is_active ? 'Active' : 'Inactive' }}</dd>
                        @if ($postCategory->description)
                            <dt class="col-sm-3">Description</dt>
                            <dd class="col-sm-9">{{ $postCategory->description }}</dd>
                        @endif
                    </dl>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Posts in this category</h2>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Post</th>
                                    <th>Status</th>
                                    <th>Published</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                    <tr>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ ucfirst($post->status) }}</td>
                                        <td>{{ $post->published_at?->format('Y-m-d H:i') ?? '—' }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('admin.posts.show', $post) }}"
                                                class="btn btn-sm btn-outline-primary">View</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-secondary py-4">
                                            No posts use this category.
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
