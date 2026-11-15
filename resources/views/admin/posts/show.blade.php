@extends('layouts.admin')

@section('title', $post->title)

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <h1 class="mb-0 fs-3">{{ $post->title }}</h1>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary btn-sm">Back</a>
                    <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-primary btn-sm">Edit Post</a>
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
                <div class="row g-0">
                    <div class="col-lg-5">
                        <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}"
                            class="img-fluid w-100 h-100 object-fit-cover">
                    </div>
                    <div class="col-lg-7">
                        <div class="card-body">
                            <p class="text-secondary">{{ $post->excerpt }}</p>
                            <dl class="row">
                                <dt class="col-sm-4">Slug</dt>
                                <dd class="col-sm-8">{{ $post->slug }}</dd>
                                <dt class="col-sm-4">Category</dt>
                                <dd class="col-sm-8">{{ $post->category ?: 'Uncategorized' }}</dd>
                                <dt class="col-sm-4">Status</dt>
                                <dd class="col-sm-8">{{ ucfirst($post->status) }}</dd>
                                <dt class="col-sm-4">Published</dt>
                                <dd class="col-sm-8">{{ $post->published_at?->format('Y-m-d H:i') ?? '—' }}</dd>
                                @if ($post->meta_title)
                                    <dt class="col-sm-4">Meta Title</dt>
                                    <dd class="col-sm-8">{{ $post->meta_title }}</dd>
                                @endif
                                @if ($post->meta_description)
                                    <dt class="col-sm-4">Meta Description</dt>
                                    <dd class="col-sm-8">{{ $post->meta_description }}</dd>
                                @endif
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="card-body border-top">
                    <h2 class="h5">Content</h2>
                    <div class="post-content">{!! $safeContent !!}</div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
