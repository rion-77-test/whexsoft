<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = ServiceCategory::query()
            ->with('media')
            ->withCount('services')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->paginate(15);

        return view('admin.service-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.service-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validatedCategoryData($request);
        $image = $request->file('image');
        unset($validated['image'], $validated['remove_image']);

        $category = ServiceCategory::create($validated);

        if ($image !== null) {
            $category->addMedia($image)->toMediaCollection('category-image');
        }

        return redirect()
            ->route('admin.service-categories.index')
            ->with('success', 'Service category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceCategory $serviceCategory): View
    {
        $services = $serviceCategory->services()
            ->with('media')
            ->orderBy('sort_order')
            ->latest()
            ->paginate(10);

        return view('admin.service-categories.show', compact('serviceCategory', 'services'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceCategory $serviceCategory): View
    {
        return view('admin.service-categories.edit', compact('serviceCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceCategory $serviceCategory): RedirectResponse
    {
        $validated = $this->validatedCategoryData($request, $serviceCategory);
        $image = $request->file('image');
        $removeImage = $request->boolean('remove_image');
        unset($validated['image'], $validated['remove_image']);

        $serviceCategory->update($validated);

        if ($image !== null) {
            $serviceCategory->addMedia($image)->toMediaCollection('category-image');
        } elseif ($removeImage) {
            $serviceCategory->clearMediaCollection('category-image');
        }

        return redirect()
            ->route('admin.service-categories.show', $serviceCategory)
            ->with('success', 'Service category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceCategory $serviceCategory): RedirectResponse
    {
        if ($serviceCategory->services()->exists()) {
            return redirect()
                ->route('admin.service-categories.index')
                ->with('error', 'This category cannot be deleted while services use it.');
        }

        $serviceCategory->delete();

        return redirect()
            ->route('admin.service-categories.index')
            ->with('success', 'Service category deleted successfully.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedCategoryData(Request $request, ?ServiceCategory $serviceCategory = null): array
    {
        return $request->validate([
            'name' => [
                'required',
                'string',
                'max:150',
                Rule::unique('service_categories', 'name')->ignore($serviceCategory),
            ],
            'slug' => [
                'required',
                'string',
                'max:191',
                Rule::unique('service_categories', 'slug')->ignore($serviceCategory),
            ],
            'description' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'between:0,65535'],
            'is_active' => ['required', 'boolean'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'extensions:jpg,jpeg,png,webp', 'max:5120'],
            'remove_image' => ['sometimes', 'boolean'],
        ]);
    }
}
