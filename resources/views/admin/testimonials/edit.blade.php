@extends('layouts.admin')

@section('title', 'Edit Testimonial')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <h1 class="mb-0 fs-3">Edit Testimonial</h1>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <x-admin.form-fields.input name="client_name" label="Client Name"
                                :value="$testimonial->client_name" class="col-md-6" required />
                            <x-admin.form-fields.input name="business_name" label="Business Name"
                                :value="$testimonial->business_name" class="col-md-6" />
                            <x-admin.form-fields.select name="service_id" label="Related Service"
                                :options="$services" :value="$testimonial->service_id"
                                placeholder="No related service" class="col-md-6" />
                            <x-admin.form-fields.textarea name="quote" label="Quote" :value="$testimonial->quote"
                                class="col-12" rows="5" required />
                            <x-admin.form-fields.image name="photo" label="Photo"
                                :preview="$testimonial->photo_url" :can-remove="$testimonial->hasMedia('photo')"
                                remove-name="remove_photo" class="col-md-6" />
                            <div class="col-md-6">
                                <x-admin.form-fields.input name="sort_order" label="Sort Order" type="number"
                                    :value="$testimonial->sort_order" min="0" max="65535" class="mb-3" required />
                                <x-admin.form-fields.checkbox name="is_published" label="Published"
                                    :checked="$testimonial->is_published" />
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <a href="{{ route('admin.testimonials.show', $testimonial) }}"
                                class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
