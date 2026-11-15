@extends('layouts.admin')

@section('title', 'Create Testimonial')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <h1 class="mb-0 fs-3">Create Testimonial</h1>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.testimonials.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <x-admin.form-fields.input name="client_name" label="Client Name"
                                class="col-md-6" required />
                            <x-admin.form-fields.input name="business_name" label="Business Name"
                                class="col-md-6" />
                            <x-admin.form-fields.select name="service_id" label="Related Service"
                                :options="$services" placeholder="No related service" class="col-md-6" />
                            <x-admin.form-fields.textarea name="quote" label="Quote" class="col-12"
                                rows="5" required />
                            <x-admin.form-fields.image name="photo" label="Photo"
                                remove-name="remove_photo" class="col-md-6" />
                            <div class="col-md-6">
                                <x-admin.form-fields.input name="sort_order" label="Sort Order" type="number"
                                    min="0" max="65535" value="0" class="mb-3" required />
                                <x-admin.form-fields.checkbox name="is_published" label="Published"
                                    :checked="true" />
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">Create Testimonial</button>
                            <a href="{{ route('admin.testimonials.index') }}"
                                class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
