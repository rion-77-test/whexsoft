@extends('layouts.admin')

@section('title', 'Create Package')

@section('content')
@php
    $featureFields = [
        ['name' => 'text', 'label' => 'Feature', 'col' => 9],
        ['name' => 'included', 'label' => 'Included', 'type' => 'checkbox', 'col' => 3, 'default' => true],
    ];
@endphp
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <h1 class="mb-0 fs-3">Create Package</h1>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.packages.store') }}">
                        @csrf
                        <div class="row g-3">
                            <x-admin.form-fields.input name="name" label="Name" class="col-md-6" required />
                            <x-admin.form-fields.select name="service_id" label="Service"
                                :options="$services" placeholder="General package (no service)"
                                class="col-md-6" />
                            <x-admin.form-fields.input name="price_label" label="Price Label"
                                class="col-md-6" required />
                            <x-admin.form-fields.input name="sort_order" label="Sort Order" type="number"
                                class="col-md-6" min="0" max="65535" value="0" required />
                            <x-admin.form-fields.textarea name="tagline" label="Tagline"
                                class="col-12" rows="2" />
                            <div class="col-12">
                                <x-admin.form-fields.repeater name="features" label="Features"
                                    :fields="$featureFields" add-label="Add feature"
                                    empty-text="No features yet." />
                            </div>
                            <div class="col-12">
                                <x-admin.form-fields.checkbox name="is_popular" label="Mark as popular" class="mb-2" />
                                <x-admin.form-fields.checkbox name="is_active" label="Active" :checked="true" />
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">Create Package</button>
                            <a href="{{ route('admin.packages.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
