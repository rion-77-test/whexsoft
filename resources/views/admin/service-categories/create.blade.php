@extends('layouts.admin')

@section('title', 'Create Service Category')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <h1 class="mb-0 fs-3">Create Service Category</h1>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.service-categories.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <x-admin.form-fields.image name="image" label="Category Image" class="col-md-6" />
                            <div class="col-md-6">
                                <x-admin.form-fields.input name="sort_order" label="Sort Order" type="number"
                                    min="0" max="65535" value="0" required />
                            </div>
                            <x-admin.form-fields.input name="name" label="Name" class="col-md-6" required />
                            <x-admin.form-fields.input name="slug" label="Slug" class="col-md-6" required />
                            <x-admin.form-fields.textarea name="description" label="Description"
                                class="col-12" rows="3" />
                            <div class="col-12">
                                <x-admin.form-fields.checkbox name="is_active" label="Active" :checked="true" />
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">Create Category</button>
                            <a href="{{ route('admin.service-categories.index') }}"
                                class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
