<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $packages = Package::query()
            ->with('service')
            ->orderBy('sort_order')
            ->latest()
            ->paginate(15);

        return view('admin.packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $services = $this->serviceOptions();

        return view('admin.packages.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        Package::create($this->normalizedPackageData($request));

        return redirect()
            ->route('admin.packages.index')
            ->with('success', 'Package created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package): View
    {
        $package->load('service');

        return view('admin.packages.show', compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package): View
    {
        $services = $this->serviceOptions();

        return view('admin.packages.edit', compact('package', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Package $package): RedirectResponse
    {
        $package->update($this->normalizedPackageData($request));

        return redirect()
            ->route('admin.packages.show', $package)
            ->with('success', 'Package updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package): RedirectResponse
    {
        $package->delete();

        return redirect()
            ->route('admin.packages.index')
            ->with('success', 'Package deleted successfully.');
    }

    /**
     * @return array<string, mixed>
     */
    private function normalizedPackageData(Request $request): array
    {
        $validated = $request->validate([
            'service_id' => ['nullable', 'integer', 'exists:services,id'],
            'name' => ['required', 'string', 'max:100'],
            'tagline' => ['nullable', 'string', 'max:255'],
            'price_label' => ['required', 'string', 'max:60'],
            'features' => ['nullable', 'array'],
            'features.*.text' => ['nullable', 'string', 'max:255'],
            'features.*.included' => ['nullable', 'boolean'],
            'is_popular' => ['required', 'boolean'],
            'sort_order' => ['required', 'integer', 'between:0,65535'],
            'is_active' => ['required', 'boolean'],
        ]);

        $validated['features'] = collect($validated['features'] ?? [])
            ->map(fn (array $feature): array => [
                'text' => trim((string) ($feature['text'] ?? '')),
                'included' => filter_var($feature['included'] ?? false, FILTER_VALIDATE_BOOLEAN),
            ])
            ->filter(fn (array $feature): bool => $feature['text'] !== '')
            ->values()
            ->all();

        return $validated;
    }

    /**
     * @return array<int, string>
     */
    private function serviceOptions(): array
    {
        return Service::query()
            ->orderBy('title')
            ->pluck('title', 'id')
            ->all();
    }
}
