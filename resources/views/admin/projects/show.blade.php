@extends('layouts.admin')

@section('title', $project->title)

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <h1 class="mb-0 fs-3">{{ $project->title }}</h1>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary btn-sm">Back</a>
                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-primary btn-sm">Edit Project</a>
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
                        <img src="{{ $project->image_url }}" alt="{{ $project->title }}"
                            class="img-fluid w-100 h-100 object-fit-cover">
                    </div>
                    <div class="col-lg-7">
                        <div class="card-body">
                            <h2 class="h4">{{ $project->title }}</h2>
                            <p class="text-secondary">{{ $project->summary }}</p>
                            <dl class="row">
                                <dt class="col-sm-4">Slug</dt>
                                <dd class="col-sm-8">{{ $project->slug }}</dd>
                                <dt class="col-sm-4">Category</dt>
                                <dd class="col-sm-8">{{ $project->projectCategory?->name ?? '—' }}</dd>
                                <dt class="col-sm-4">Related Service</dt>
                                <dd class="col-sm-8">{{ $project->service?->title ?? '—' }}</dd>
                                <dt class="col-sm-4">Client Type</dt>
                                <dd class="col-sm-8">{{ $project->is_real_client ? 'Real Client' : 'Demo' }}</dd>
                                <dt class="col-sm-4">Featured</dt>
                                <dd class="col-sm-8">{{ $project->is_featured ? 'Yes' : 'No' }}</dd>
                                <dt class="col-sm-4">Status</dt>
                                <dd class="col-sm-8">{{ $project->is_published ? 'Published' : 'Draft' }}</dd>
                                <dt class="col-sm-4">Sort Order</dt>
                                <dd class="col-sm-8">{{ $project->sort_order }}</dd>
                                @if ($project->live_url)
                                    <dt class="col-sm-4">Live URL</dt>
                                    <dd class="col-sm-8">
                                        <a href="{{ $project->live_url }}" target="_blank" rel="noopener noreferrer">
                                            {{ $project->live_url }}
                                        </a>
                                    </dd>
                                @endif
                            </dl>
                            @if ($project->description)
                                <h3 class="h5 mt-4">Description</h3>
                                <p class="mb-0">{!! nl2br(e($project->description)) !!}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
