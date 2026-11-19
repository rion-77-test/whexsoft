@extends('layouts.admin')

@section('title', 'Edit Project')

@section('content')
    @php
        $categoryOptions = $categories
            ->mapWithKeys(function ($category) {
                return [$category->id => $category->name . ($category->is_active ? '' : ' (Inactive)')];
            })
            ->all();
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
                                <x-admin.form-fields.image name="image" label="Project Image" :preview="$project->hasMedia('project-image')
                                    ? $project->getFirstMediaUrl('project-image')
                                    : null"
                                    :can-remove="$project->hasMedia('project-image')" class="col-md-6" />
                                @if ($project->gallery_images->isNotEmpty())
                                    <div class="col-12">
                                        <label class="form-label d-block">Current Gallery</label>
                                        <div class="row g-2">
                                            @foreach ($project->gallery_images as $media)
                                                <div class="col-6 col-md-3 col-lg-2">
                                                    <div class="border rounded p-1 h-100">
                                                        <img src="{{ $media->getUrl() }}" alt="Gallery image"
                                                            class="img-fluid rounded w-100 object-fit-cover"
                                                            style="aspect-ratio: 4 / 3;">
                                                        <div class="form-check mt-2">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="remove_gallery[]" value="{{ $media->id }}"
                                                                id="remove-gallery-{{ $media->id }}">
                                                            <label class="form-check-label small text-danger"
                                                                for="remove-gallery-{{ $media->id }}">Remove</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <x-admin.form-fields.image name="gallery" label="Add Gallery Images" :multiple="true"
                                    :max-files="10"
                                    help="Up to 10 new images per save. Tick Remove on a current image to delete it."
                                    class="col-12" />
                                <div class="col-md-6">
                                    <x-admin.form-fields.checkbox name="is_real_client" label="Real client"
                                        :checked="$project->is_real_client" class="mb-2" />
                                    <x-admin.form-fields.checkbox name="is_featured" label="Featured" :checked="$project->is_featured"
                                        class="mb-2" />
                                    <x-admin.form-fields.checkbox name="is_published" label="Published" :checked="$project->is_published"
                                        class="mb-2" />
                                </div>
                                <x-admin.form-fields.input name="title" label="Title" :value="$project->title" class="col-md-6"
                                    required />
                                <x-admin.form-fields.input name="slug" label="Slug" :value="$project->slug" class="col-md-6"
                                    required />
                                <x-admin.form-fields.select name="project_category_id" label="Category" :options="$categoryOptions"
                                    :value="$project->project_category_id" placeholder="Select a category" class="col-md-6" required />
                                <x-admin.form-fields.select name="service_id" label="Related Service" :options="$services"
                                    :value="$project->service_id" placeholder="No related service" class="col-md-6" />
                                <x-admin.form-fields.input name="summary" label="Summary" :value="$project->summary"
                                    class="col-md-6" required />
                                <x-admin.form-fields.textarea name="description" label="Description" :value="$project->description"
                                    class="col-12" rows="5" />
                                <x-admin.form-fields.input name="live_url" label="Live URL" type="url"
                                    :value="$project->live_url" class="col-md-6" />
                                <x-admin.form-fields.input name="project_walkthrough_url"
                                    label="Project Walkthrough (YouTube URL)" type="url" :value="$project->project_walkthrough_url"
                                    class="col-md-6" />
                                <x-admin.form-fields.input name="sort_order" label="Sort Order" type="number"
                                    :value="$project->sort_order" class="col-md-6" min="0" max="65535" required />
                            </div>

                            <hr class="my-4">
                            <h2 class="h5">English translation</h2>
                            <p class="text-secondary small">Leave a field empty to show the Bengali text.</p>
                            <div class="row g-3">
                                <x-admin.form-fields.input name="translations[en][title]" label="Title (EN)"
                                    :value="data_get($project->translations, 'en.title')" class="col-md-6" />
                                <x-admin.form-fields.input name="translations[en][summary]" label="Summary (EN)"
                                    :value="data_get($project->translations, 'en.summary')" class="col-md-6" />
                                <x-admin.form-fields.textarea name="translations[en][description]" label="Description (EN)"
                                    :value="data_get($project->translations, 'en.description')" class="col-12" rows="5" />
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
