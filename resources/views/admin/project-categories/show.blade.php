@extends('layouts.admin')

@section('title', $projectCategory->name)

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <h1 class="mb-0 fs-3">{{ $projectCategory->name }}</h1>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.project-categories.index') }}"
                        class="btn btn-outline-secondary btn-sm">Back</a>
                    <a href="{{ route('admin.project-categories.edit', $projectCategory) }}"
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
                        <dd class="col-sm-9">{{ $projectCategory->slug }}</dd>
                        <dt class="col-sm-3">Status</dt>
                        <dd class="col-sm-9">{{ $projectCategory->is_active ? 'Active' : 'Inactive' }}</dd>
                        <dt class="col-sm-3">Sort Order</dt>
                        <dd class="col-sm-9">{{ $projectCategory->sort_order }}</dd>
                        @if ($projectCategory->description)
                            <dt class="col-sm-3">Description</dt>
                            <dd class="col-sm-9">{{ $projectCategory->description }}</dd>
                        @endif
                    </dl>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Projects in this category</h2>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Project</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($projects as $project)
                                    <tr>
                                        <td>{{ $project->title }}</td>
                                        <td>{{ $project->is_published ? 'Published' : 'Draft' }}</td>
                                        <td>{{ $project->created_at->format('Y-m-d') }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('admin.projects.show', $project) }}"
                                                class="btn btn-sm btn-outline-primary">View</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-secondary py-4">
                                            No projects use this category.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @if ($projects->hasPages())
                    <div class="card-footer">
                        {{ $projects->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection
