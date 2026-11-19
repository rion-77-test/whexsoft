@extends('layouts.admin')

@section('title', 'Edit Service')

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
        $englishFeatureFields = [
            ['name' => 'title', 'label' => 'Title (EN)', 'col' => 4],
            ['name' => 'text', 'label' => 'Text (EN)', 'type' => 'textarea', 'col' => 8],
        ];
        $englishStepFields = [
            ['name' => 'title', 'label' => 'Step Title (EN)', 'col' => 4],
            ['name' => 'text', 'label' => 'Step Text (EN)', 'type' => 'textarea', 'col' => 8],
        ];
        $englishFaqFields = [
            ['name' => 'question', 'label' => 'Question (EN)', 'col' => 4],
            ['name' => 'answer', 'label' => 'Answer (EN)', 'type' => 'textarea', 'col' => 8],
        ];
    @endphp
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <h1 class="mb-0 fs-3">Edit Service</h1>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.services.update', $service) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row g-3">
                                <x-admin.form-fields.image name="image" label="Service Image" :preview="$service->image_url"
                                    :can-remove="$service->hasMedia('service-image')" class="col-md-6" />
                                <div class="col-md-6 d-flex align-items-start">
                                    <x-admin.form-fields.checkbox name="is_active" label="Active" :checked="$service->is_active" />
                                </div>
                                <x-admin.form-fields.input name="title" label="Title" :value="$service->title" class="col-md-6"
                                    required />
                                <x-admin.form-fields.input name="slug" label="Slug" :value="$service->slug" class="col-md-6"
                                    required />
                                <x-admin.form-fields.select name="service_category_id" label="Category" :options="$categoryOptions"
                                    :value="$service->service_category_id" placeholder="Select a category" class="col-md-6" required />
                                <x-admin.form-fields.input name="sort_order" label="Sort Order" type="number"
                                    :value="$service->sort_order" class="col-md-6" min="0" max="65535" required />
                                <x-admin.form-fields.textarea name="short_description" label="Short Description"
                                    :value="$service->short_description" class="col-12" rows="2" />
                                <x-admin.form-fields.input name="service_walkthrough_url"
                                    label="Service Walkthrough (YouTube URL)" type="url" :value="$service->service_walkthrough_url"
                                    class="col-12" />
                                <x-admin.form-fields.textarea name="intro" label="Intro" :value="$service->intro"
                                    class="col-12" rows="3" />
                                <x-admin.form-fields.wysiwyg name="content" label="Content" :value="$service->content"
                                    :upload-url="route('admin.services.content-images.store')" class="col-12" />
                            </div>

                            <hr class="my-4">

                            <div class="row g-4">
                                <x-admin.form-fields.repeater name="features" label="Features" :fields="$featureFields"
                                    :value="$service->features ?? []" add-label="Add feature" empty-text="No features yet."
                                    class="col-12" />
                                <x-admin.form-fields.repeater name="steps" label="How It Works" :fields="$stepFields"
                                    :value="$service->steps ?? []" add-label="Add step" empty-text="No steps yet." class="col-12" />
                                <x-admin.form-fields.repeater name="faqs" label="FAQs" :fields="$faqFields"
                                    :value="$service->faqs ?? []" add-label="Add FAQ" empty-text="No FAQs yet." class="col-12" />
                            </div>

                            <hr class="my-4">

                            <div class="row g-3">
                                <x-admin.form-fields.input name="meta_title" label="Meta Title" :value="$service->meta_title"
                                    class="col-md-6" />
                                <x-admin.form-fields.textarea name="meta_description" label="Meta Description"
                                    :value="$service->meta_description" class="col-md-6" rows="3" />
                            </div>

                            <hr class="my-4">
                            <h2 class="h5">English translation</h2>
                            <p class="text-secondary small">Leave a field empty to show the Bengali text.</p>
                            <div class="row g-3">
                                <x-admin.form-fields.input name="translations[en][title]" label="Title (EN)"
                                    :value="data_get($service->translations, 'en.title')" class="col-md-6" />
                                <x-admin.form-fields.textarea name="translations[en][short_description]" label="Short Description (EN)"
                                    :value="data_get($service->translations, 'en.short_description')" class="col-12" rows="2" />
                                <x-admin.form-fields.textarea name="translations[en][intro]" label="Intro (EN)"
                                    :value="data_get($service->translations, 'en.intro')" class="col-12" rows="3" />
                                <x-admin.form-fields.wysiwyg name="translations[en][content]" label="Content (EN)"
                                    :value="data_get($service->translations, 'en.content')"
                                    :upload-url="route('admin.services.content-images.store')" class="col-12" />
                                <x-admin.form-fields.repeater name="translations[en][features]" label="Features (EN)"
                                    :fields="$englishFeatureFields" :value="data_get($service->translations, 'en.features', [])"
                                    add-label="Add feature" empty-text="No translated features yet." class="col-12" />
                                <x-admin.form-fields.repeater name="translations[en][steps]" label="How It Works (EN)"
                                    :fields="$englishStepFields" :value="data_get($service->translations, 'en.steps', [])"
                                    add-label="Add step" empty-text="No translated steps yet." class="col-12" />
                                <x-admin.form-fields.repeater name="translations[en][faqs]" label="FAQs (EN)"
                                    :fields="$englishFaqFields" :value="data_get($service->translations, 'en.faqs', [])"
                                    add-label="Add FAQ" empty-text="No translated FAQs yet." class="col-12" />
                                <x-admin.form-fields.input name="translations[en][meta_title]" label="Meta Title (EN)"
                                    :value="data_get($service->translations, 'en.meta_title')" class="col-md-6" />
                                <x-admin.form-fields.textarea name="translations[en][meta_description]" label="Meta Description (EN)"
                                    :value="data_get($service->translations, 'en.meta_description')" class="col-md-6" rows="3" />
                            </div>

                            <div class="d-flex gap-2 mt-4">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                <a href="{{ route('admin.services.show', $service) }}"
                                    class="btn btn-outline-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
