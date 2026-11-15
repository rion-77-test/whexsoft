@extends('layouts.admin')

@section('title', 'Edit Project')

@section('content')
@php
    $categoryOptions = $categories->mapWithKeys(function ($category) {
        return [$category->id => $category->name.($category->is_active ? '' : ' (Inactive)')];
    })->all();
@endphp
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <h1 class="mb-0 fs-3">Edit Project</h1>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.projects.update', $project) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <x-admin.form-fields.input name="title" label="Title" :value="$project->title"
                                class="col-md-6" required />
                            <x-admin.form-fields.input name="slug" label="Slug" :value="$project->slug"
                                class="col-md-6" required />
                            <x-admin.form-fields.select name="project_category_id" label="Category"
                                :options="$categoryOptions" :value="$project->project_category_id"
                                placeholder="Select a category" class="col-md-6" required />
                            <x-admin.form-fields.select name="service_id" label="Related Service"
                                :options="$services" :value="$project->service_id"
                                placeholder="No related service" class="col-md-6" />
                            <x-admin.form-fields.input name="summary" label="Summary" :value="$project->summary"
                                class="col-md-6" required />
                            <x-admin.form-fields.textarea name="description" label="Description"
                                :value="$project->description" class="col-12" rows="5" />
                            <x-admin.form-fields.input name="live_url" label="Live URL" type="url"
                                :value="$project->live_url" class="col-md-6" />
                            <x-admin.form-fields.input name="sort_order" label="Sort Order" type="number"
                                :value="$project->sort_order" class="col-md-6" min="0" max="65535" required />
                            <x-admin.form-fields.image name="image" label="Project Image"
                                :preview="$project->image_url" :can-remove="$project->hasMedia('project-image')"
                                class="col-md-6" />
                            <div class="col-md-6">
                                <x-admin.form-fields.checkbox name="is_real_client" label="Real client"
                                    :checked="$project->is_real_client" class="mb-2" />
                                <x-admin.form-fields.checkbox name="is_featured" label="Featured"
                                    :checked="$project->is_featured" class="mb-2" />
                                <x-admin.form-fields.checkbox name="is_published" label="Published"
                                    :checked="$project->is_published" class="mb-2" />
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <a href="{{ route('admin.projects.show', $project) }}"
                                class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
