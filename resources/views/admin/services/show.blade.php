@extends('layouts.admin')

@section('title', $service->title)

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <h1 class="mb-0 fs-3">{{ $service->title }}</h1>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary btn-sm">Back</a>
                    <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-primary btn-sm">Edit Service</a>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-lg-5">
                        <img src="{{ $service->image_url }}" alt="{{ $service->title }}"
                            class="img-fluid w-100 h-100 object-fit-cover">
                    </div>
                    <div class="col-lg-7">
                        <div class="card-body">
                            <p class="text-secondary">{{ $service->short_description ?: 'No short description.' }}</p>
                            <dl class="row mb-0">
                                <dt class="col-sm-4">Slug</dt>
                                <dd class="col-sm-8">{{ $service->slug }}</dd>
                                <dt class="col-sm-4">Category</dt>
                                <dd class="col-sm-8">{{ $service->serviceCategory?->name ?? '—' }}</dd>
                                <dt class="col-sm-4">Status</dt>
                                <dd class="col-sm-8">{{ $service->is_active ? 'Active' : 'Inactive' }}</dd>
                                <dt class="col-sm-4">Sort Order</dt>
                                <dd class="col-sm-8">{{ $service->sort_order }}</dd>
                                <dt class="col-sm-4">Packages</dt>
                                <dd class="col-sm-8">{{ $service->packages->count() }}</dd>
                                @if ($service->meta_title)
                                    <dt class="col-sm-4">Meta Title</dt>
                                    <dd class="col-sm-8">{{ $service->meta_title }}</dd>
                                @endif
                                @if ($service->meta_description)
                                    <dt class="col-sm-4">Meta Description</dt>
                                    <dd class="col-sm-8">{{ $service->meta_description }}</dd>
                                @endif
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            @if ($service->intro || $service->content)
                <div class="card mb-3">
                    <div class="card-body">
                        @if ($service->intro)
                            <h2 class="h5">Intro</h2>
                            <p>{!! nl2br(e($service->intro)) !!}</p>
                        @endif
                        @if (filled($safeContent))
                            <h2 class="h5 mt-4">Content</h2>
                            <div class="service-content">{!! $safeContent !!}</div>
                        @endif
                    </div>
                </div>
            @endif

            @if (! empty($service->features))
                <div class="card mb-3">
                    <div class="card-header">
                        <h2 class="h5 mb-0">Features</h2>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            @foreach ($service->features as $feature)
                                <div class="col-md-6">
                                    <div class="border rounded p-3 h-100">
                                        <h3 class="h6">{{ $feature['title'] ?? '' }}</h3>
                                        <p class="text-secondary mb-0">{{ $feature['text'] ?? '' }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            @if (! empty($service->steps))
                <div class="card mb-3">
                    <div class="card-header">
                        <h2 class="h5 mb-0">How It Works</h2>
                    </div>
                    <div class="card-body">
                        <ol class="mb-0">
                            @foreach ($service->steps as $step)
                                <li class="mb-2">
                                    <strong>{{ $step['title'] ?? '' }}</strong>
                                    <div class="text-secondary">{{ $step['text'] ?? '' }}</div>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            @endif

            @if (! empty($service->faqs))
                <div class="card mb-3">
                    <div class="card-header">
                        <h2 class="h5 mb-0">FAQs</h2>
                    </div>
                    <div class="card-body">
                        <div class="accordion" id="service-faqs">
                            @foreach ($service->faqs as $index => $faq)
                                <div class="accordion-item">
                                    <h3 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#service-faq-{{ $index }}"
                                            aria-expanded="false" aria-controls="service-faq-{{ $index }}">
                                            {{ $faq['question'] ?? '' }}
                                        </button>
                                    </h3>
                                    <div id="service-faq-{{ $index }}" class="accordion-collapse collapse"
                                        data-bs-parent="#service-faqs">
                                        <div class="accordion-body">{{ $faq['answer'] ?? '' }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <div class="card mb-3">
                <div class="card-header">
                    <h2 class="h5 mb-0">Related Projects</h2>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Project</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Live URL</th>
                                    <th class="text-nowrap">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($service->projects as $project)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="{{ $project->image_url }}" alt="{{ $project->title }}"
                                                    class="rounded object-fit-cover" width="56" height="42">
                                                <span>{{ $project->title }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $project->projectCategory?->name ?? '—' }}</td>
                                        <td>
                                            <span class="badge {{ $project->is_published ? 'text-bg-success' : 'text-bg-secondary' }}">
                                                {{ $project->is_published ? 'Published' : 'Draft' }}
                                            </span>
                                        </td>
                                        <td>
                                            @if ($project->live_url)
                                                <a href="{{ $project->live_url }}" target="_blank" rel="noopener noreferrer">
                                                    Visit
                                                </a>
                                            @else
                                                <span class="text-secondary">—</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.projects.show', $project) }}"
                                                class="btn btn-sm btn-outline-success">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-secondary py-4">
                                            No projects linked to this service yet.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <h2 class="h5 mb-0">Testimonials</h2>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        @forelse ($service->testimonials as $testimonial)
                            <div class="col-md-6">
                                <div class="border rounded p-3 h-100">
                                    <blockquote class="blockquote mb-2">
                                        <p class="fs-6">{{ $testimonial->quote }}</p>
                                    </blockquote>
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="{{ $testimonial->photo_url }}"
                                            alt="{{ $testimonial->client_name }}"
                                            class="rounded-circle object-fit-cover" width="40" height="40">
                                        <div>
                                            <strong>{{ $testimonial->client_name }}</strong>
                                            @if ($testimonial->business_name)
                                                <div class="text-secondary small">{{ $testimonial->business_name }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-secondary">No testimonials linked to this service yet.</div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2 class="h5 mb-0">Packages</h2>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Popular</th>
                                    <th>Status</th>
                                    <th class="text-nowrap">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($service->packages as $package)
                                    <tr>
                                        <td>{{ $package->name }}</td>
                                        <td>{{ $package->price_label }}</td>
                                        <td>{{ $package->is_popular ? 'Yes' : 'No' }}</td>
                                        <td>
                                            <span class="badge {{ $package->is_active ? 'text-bg-success' : 'text-bg-secondary' }}">
                                                {{ $package->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.packages.show', $package) }}"
                                                class="btn btn-sm btn-outline-success">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-secondary py-4">
                                            No packages for this service yet.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
