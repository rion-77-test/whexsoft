<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $services = Service::query()
            ->with(['serviceCategory', 'media'])
            ->withCount('packages')
            ->orderBy('sort_order')
            ->latest()
            ->paginate(15);

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = ServiceCategory::query()->orderBy('name')->get();

        return view('admin.services.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $this->normalizedServiceData($request);
        $image = $request->file('image');
        unset($validated['image'], $validated['remove_image']);

        $service = Service::create($validated);

        if ($image !== null) {
            $service->addMedia($image)->toMediaCollection('service-image');
        }

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service): View
    {
        $service->load([
            'serviceCategory',
            'packages' => fn ($query) => $query->orderBy('sort_order'),
            'projects' => fn ($query) => $query->with(['projectCategory', 'media'])->orderBy('sort_order'),
            'testimonials' => fn ($query) => $query->with('media')->orderBy('sort_order'),
            'media',
        ]);

        return view('admin.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service): View
    {
        $categories = ServiceCategory::query()->orderBy('name')->get();

        return view('admin.services.edit', compact('service', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service): RedirectResponse
    {
        $validated = $this->normalizedServiceData($request, $service);
        $image = $request->file('image');
        $removeImage = $request->boolean('remove_image');
        unset($validated['image'], $validated['remove_image']);

        $service->update($validated);

        if ($image !== null) {
            $service->addMedia($image)->toMediaCollection('service-image');
        } elseif ($removeImage) {
            $service->clearMediaCollection('service-image');
        }

        return redirect()
            ->route('admin.services.show', $service)
            ->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service): RedirectResponse
    {
        if ($service->packages()->exists()) {
            return redirect()
                ->route('admin.services.index')
                ->with('error', 'This service cannot be deleted while packages use it.');
        }

        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }

    /**
     * @return array<string, mixed>
     */
    private function normalizedServiceData(Request $request, ?Service $service = null): array
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:191',
                Rule::unique('services', 'slug')->ignore($service),
            ],
            'service_category_id' => ['required', 'integer', 'exists:service_categories,id'],
            'short_description' => ['nullable', 'string', 'max:255'],
            'intro' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'features' => ['nullable', 'array'],
            'features.*.title' => ['nullable', 'string', 'max:255'],
            'features.*.text' => ['nullable', 'string'],
            'steps' => ['nullable', 'array'],
            'steps.*.title' => ['nullable', 'string', 'max:255'],
            'steps.*.text' => ['nullable', 'string'],
            'faqs' => ['nullable', 'array'],
            'faqs.*.question' => ['nullable', 'string', 'max:255'],
            'faqs.*.answer' => ['nullable', 'string'],
            'meta_title' => ['nullable', 'string', 'max:70'],
            'meta_description' => ['nullable', 'string', 'max:180'],
            'sort_order' => ['required', 'integer', 'between:0,65535'],
            'is_active' => ['required', 'boolean'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'extensions:jpg,jpeg,png,webp', 'max:5120'],
            'remove_image' => ['sometimes', 'boolean'],
        ]);

        $validated['features'] = $this->normalizeItems($validated['features'] ?? [], ['title', 'text']);
        $validated['steps'] = $this->normalizeItems($validated['steps'] ?? [], ['title', 'text']);
        $validated['faqs'] = $this->normalizeItems($validated['faqs'] ?? [], ['question', 'answer']);

        return $validated;
    }

    /**
     * @param  array<int, array<string, mixed>>  $items
     * @param  array<int, string>  $keys
     * @return array<int, array<string, string>>
     */
    private function normalizeItems(array $items, array $keys): array
    {
        return collect($items)
            ->map(function (array $item) use ($keys): array {
                $row = [];

                foreach ($keys as $key) {
                    $row[$key] = trim((string) ($item[$key] ?? ''));
                }

                return $row;
            })
            ->filter(fn (array $row): bool => implode('', $row) !== '')
            ->values()
            ->all();
    }
}
