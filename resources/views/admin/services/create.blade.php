@extends('layouts.admin')

@section('title', 'Create Service')

@section('content')
    @php
        $categoryOptions = $categories
            ->mapWithKeys(function ($category) {
                return [$category->id => $category->name . ($category->is_active ? '' : ' (Inactive)')];
            })
            ->all();

        $featureFields = [
            ['name' => 'title', 'label' => 'Title', 'col' => 4],
            ['name' => 'text', 'label' => 'Text', 'type' => 'textarea', 'col' => 8],
        ];

        $stepFields = [
            ['name' => 'title', 'label' => 'Step Title', 'col' => 4],
            ['name' => 'text', 'label' => 'Step Text', 'type' => 'textarea', 'col' => 8],
        ];

        $faqFields = [
            ['name' => 'question', 'label' => 'Question', 'col' => 4],
            ['name' => 'answer', 'label' => 'Answer', 'type' => 'textarea', 'col' => 8],
        ];
    @endphp
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <h1 class="mb-0 fs-3">Create Service</h1>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <x-admin.form-fields.image name="image" label="Service Image" class="col-md-6" />
                                <div class="col-md-6 d-flex align-items-start">
                                    <x-admin.form-fields.checkbox name="is_active" label="Active" :checked="true" />
                                </div>
                                <x-admin.form-fields.input name="title" label="Title" class="col-md-6" required />
                                <x-admin.form-fields.input name="slug" label="Slug" class="col-md-6" required />
                                <x-admin.form-fields.select name="service_category_id" label="Category" :options="$categoryOptions"
                                    placeholder="Select a category" class="col-md-6" required />
                                <x-admin.form-fields.input name="sort_order" label="Sort Order" type="number"
                                    class="col-md-6" min="0" max="65535" value="0" required />
                                <x-admin.form-fields.textarea name="short_description" label="Short Description"
                                    class="col-12" rows="2" />
                                <x-admin.form-fields.input name="service_walkthrough_url"
                                    label="Service Walkthrough (YouTube URL)" type="url" class="col-12" />
                                <x-admin.form-fields.textarea name="intro" label="Intro" class="col-12" rows="3" />
                                <x-admin.form-fields.wysiwyg name="content" label="Content" :upload-url="route('admin.services.content-images.store')"
                                    class="col-12" />
                            </div>

                            <hr class="my-4">

                            <div class="row g-4">
                                <x-admin.form-fields.repeater name="features" label="Features" :fields="$featureFields"
                                    add-label="Add feature" empty-text="No features yet." class="col-12" />
                                <x-admin.form-fields.repeater name="steps" label="How It Works" :fields="$stepFields"
                                    add-label="Add step" empty-text="No steps yet." class="col-12" />
                                <x-admin.form-fields.repeater name="faqs" label="FAQs" :fields="$faqFields"
                                    add-label="Add FAQ" empty-text="No FAQs yet." class="col-12" />
                            </div>

                            <hr class="my-4">

                            <div class="row g-3">
                                <x-admin.form-fields.input name="meta_title" label="Meta Title" class="col-md-6" />
                                <x-admin.form-fields.textarea name="meta_description" label="Meta Description"
                                    class="col-md-6" rows="3" />
                            </div>

                            <div class="d-flex gap-2 mt-4">
                                <button type="submit" class="btn btn-primary">Create Service</button>
                                <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
