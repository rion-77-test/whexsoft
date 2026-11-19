@extends('layouts.admin')

@section('title', 'Edit Service Category')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <h1 class="mb-0 fs-3">Edit Service Category</h1>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.service-categories.update', $serviceCategory) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <x-admin.form-fields.image name="image" label="Category Image"
                                :preview="$serviceCategory->image_url"
                                :can-remove="$serviceCategory->hasMedia('category-image')" class="col-md-6" />
                            <div class="col-md-6">
                                <x-admin.form-fields.input name="sort_order" label="Sort Order" type="number"
                                    :value="$serviceCategory->sort_order" min="0" max="65535" required />
                            </div>
                            <x-admin.form-fields.input name="name" label="Name" :value="$serviceCategory->name"
                                class="col-md-6" required />
                            <x-admin.form-fields.input name="slug" label="Slug" :value="$serviceCategory->slug"
                                class="col-md-6" required />
                            <x-admin.form-fields.textarea name="description" label="Description"
                                :value="$serviceCategory->description" class="col-12" rows="3" />
                            <div class="col-12">
                                <hr>
                                <h2 class="h5">English translation</h2>
                                <p class="text-secondary small">Leave a field empty to show the Bengali text.</p>
                            </div>
                            <x-admin.form-fields.input name="translations[en][name]" label="Name (EN)"
                                :value="data_get($serviceCategory->translations, 'en.name')" class="col-md-6" />
                            <x-admin.form-fields.textarea name="translations[en][description]" label="Description (EN)"
                                :value="data_get($serviceCategory->translations, 'en.description')" class="col-12" rows="3" />
                            <div class="col-12">
                                <x-admin.form-fields.checkbox name="is_active" label="Active"
                                    :checked="$serviceCategory->is_active" />
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <a href="{{ route('admin.service-categories.show', $serviceCategory) }}"
                                class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
