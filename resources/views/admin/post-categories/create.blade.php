@extends('layouts.admin')

@section('title', 'Create Post Category')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <h1 class="mb-0 fs-3">Create Post Category</h1>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.post-categories.store') }}">
                        @csrf
                        <div class="row g-3">
                            <x-admin.form-fields.input name="name" label="Name" class="col-md-6" required />
                            <x-admin.form-fields.input name="slug" label="Slug" class="col-md-6" required />
                            <x-admin.form-fields.textarea name="description" label="Description"
                                class="col-12" rows="4" />
                            <div class="col-12">
                                <x-admin.form-fields.checkbox name="is_active" label="Active" :checked="true" />
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">Create Category</button>
                            <a href="{{ route('admin.post-categories.index') }}"
                                class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
