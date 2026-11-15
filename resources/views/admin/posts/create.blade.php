@extends('layouts.admin')

@section('title', 'Create Post')

@section('content')
@php
    $categoryOptions = $categories->mapWithKeys(function ($category) {
        return [$category->name => $category->name.($category->is_active ? '' : ' (Inactive)')];
    })->all();
@endphp
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <h1 class="mb-0 fs-3">Create Post</h1>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <x-admin.form-fields.input name="title" label="Title" class="col-md-6" required />
                            <x-admin.form-fields.input name="slug" label="Slug" class="col-md-6" required />
                            <x-admin.form-fields.select name="category" label="Category"
                                :options="$categoryOptions" placeholder="Uncategorized" class="col-md-6" />
                            <x-admin.form-fields.select name="status" label="Status"
                                :options="$statusOptions" value="draft" class="col-md-6" required />
                            <x-admin.form-fields.textarea name="excerpt" label="Excerpt"
                                class="col-12" rows="3" required />
                            <x-admin.form-fields.wysiwyg name="content" label="Content"
                                :upload-url="route('admin.posts.content-images.store')" class="col-12" />
                            <x-admin.form-fields.image name="image" label="Featured Image" class="col-md-6" />
                            <x-admin.form-fields.input name="published_at" label="Publish Date"
                                type="datetime-local" class="col-md-6" />
                            <x-admin.form-fields.input name="meta_title" label="Meta Title" class="col-md-6" />
                            <x-admin.form-fields.textarea name="meta_description" label="Meta Description"
                                class="col-md-6" rows="3" />
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">Create Post</button>
                            <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
