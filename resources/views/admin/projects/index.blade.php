@extends('layouts.admin')

@section('title', 'Projects')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <h1 class="mb-0 fs-3">Projects</h1>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.project-categories.index') }}" class="btn btn-outline-secondary btn-sm">
                        Project Categories
                    </a>
                    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-lg me-1"></i> Create Project
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
                                    <th>Project</th>
                                    <th>Category</th>
                                    <th>Client Type</th>
                                    <th>Featured</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th class="text-nowrap">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($projects as $project)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="{{ $project->image_url }}" alt="{{ $project->title }}"
                                                    class="rounded object-fit-cover" width="64" height="48">
                                                <div>
                                                    <strong>{{ $project->title }}</strong>
                                                    <div class="text-secondary small">{{ $project->summary }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $project->projectCategory?->name ?? '—' }}</td>
                                        <td>
                                            <span class="badge {{ $project->is_real_client ? 'text-bg-primary' : 'text-bg-secondary' }}">
                                                {{ $project->is_real_client ? 'Real Client' : 'Demo' }}
                                            </span>
                                        </td>
                                        <td>
                                            @if ($project->is_featured)
                                                <span class="badge text-bg-warning">Featured</span>
                                            @else
                                                <span class="text-secondary">—</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge {{ $project->is_published ? 'text-bg-success' : 'text-bg-secondary' }}">
                                                {{ $project->is_published ? 'Published' : 'Draft' }}
                                            </span>
                                        </td>
                                        <td class="text-nowrap">{{ $project->created_at->format('Y-m-d') }}</td>
                                        <td class="text-nowrap">
                                            <a href="{{ route('admin.projects.show', $project) }}"
                                                class="btn btn-sm btn-outline-success" aria-label="View project">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.projects.edit', $project) }}"
                                                class="btn btn-sm btn-outline-primary" aria-label="Edit project">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('Delete this project?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    aria-label="Delete project">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-secondary py-4">
                                            No projects yet. Create your first project to get started.
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
