@extends('layouts.admin')

@section('title', 'Create Project')

@section('content')
@php
    $categoryOptions = $categories->mapWithKeys(function ($category) {
        return [$category->id => $category->name.($category->is_active ? '' : ' (Inactive)')];
    })->all();
@endphp
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <h1 class="mb-0 fs-3">Create Project</h1>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <x-admin.form-fields.input name="title" label="Title" class="col-md-6" required />
                            <x-admin.form-fields.input name="slug" label="Slug" class="col-md-6" required />
                            <x-admin.form-fields.select name="project_category_id" label="Category"
                                :options="$categoryOptions" placeholder="Select a category"
                                class="col-md-6" required />
                            <x-admin.form-fields.select name="service_id" label="Related Service"
                                :options="$services" placeholder="No related service" class="col-md-6" />
                            <x-admin.form-fields.input name="summary" label="Summary" class="col-md-6" required />
                            <x-admin.form-fields.textarea name="description" label="Description"
                                class="col-12" rows="5" />
                            <x-admin.form-fields.input name="live_url" label="Live URL" type="url"
                                class="col-md-6" />
                            <x-admin.form-fields.input name="sort_order" label="Sort Order" type="number"
                                class="col-md-6" min="0" max="65535" value="0" required />
                            <x-admin.form-fields.image name="image" label="Project Image" class="col-md-6" />
                            <div class="col-md-6">
                                <x-admin.form-fields.checkbox name="is_real_client" label="Real client"
                                    :checked="true" class="mb-2" />
                                <x-admin.form-fields.checkbox name="is_featured" label="Featured" class="mb-2" />
                                <x-admin.form-fields.checkbox name="is_published" label="Published" class="mb-2" />
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">Create Project</button>
                            <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
