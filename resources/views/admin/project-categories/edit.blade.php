@extends('layouts.admin')

@section('title', 'Edit Project Category')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <h1 class="mb-0 fs-3">Edit Project Category</h1>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.project-categories.update', $projectCategory) }}">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <x-admin.form-fields.input name="name" label="Name" :value="$projectCategory->name"
                                class="col-md-6" required />
                            <x-admin.form-fields.input name="slug" label="Slug" :value="$projectCategory->slug"
                                class="col-md-6" required />
                            <x-admin.form-fields.textarea name="description" label="Description"
                                :value="$projectCategory->description" class="col-12" rows="4" />
                            <x-admin.form-fields.input name="sort_order" label="Sort Order" type="number"
                                :value="$projectCategory->sort_order" class="col-md-6"
                                min="0" max="65535" required />
                            <div class="col-12">
                                <x-admin.form-fields.checkbox name="is_active" label="Active"
                                    :checked="$projectCategory->is_active" />
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <a href="{{ route('admin.project-categories.show', $projectCategory) }}"
                                class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
