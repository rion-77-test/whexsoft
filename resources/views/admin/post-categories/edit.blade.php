@extends('layouts.admin')

@section('title', 'Edit Post Category')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <h1 class="mb-0 fs-3">Edit Post Category</h1>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.post-categories.update', $postCategory) }}">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <x-admin.form-fields.input name="name" label="Name" :value="$postCategory->name"
                                class="col-md-6" required />
                            <x-admin.form-fields.input name="slug" label="Slug" :value="$postCategory->slug"
                                class="col-md-6" required />
                            <x-admin.form-fields.textarea name="description" label="Description"
                                :value="$postCategory->description" class="col-12" rows="4" />
                            <div class="col-12">
                                <hr>
                                <h2 class="h5">English translation</h2>
                                <p class="text-secondary small">Leave a field empty to show the Bengali text.</p>
                            </div>
                            <x-admin.form-fields.input name="translations[en][name]" label="Name (EN)"
                                :value="data_get($postCategory->translations, 'en.name')" class="col-md-6" />
                            <x-admin.form-fields.textarea name="translations[en][description]" label="Description (EN)"
                                :value="data_get($postCategory->translations, 'en.description')" class="col-12" rows="4" />
                            <div class="col-12">
                                <x-admin.form-fields.checkbox name="is_active" label="Active"
                                    :checked="$postCategory->is_active" />
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <a href="{{ route('admin.post-categories.show', $postCategory) }}"
                                class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
