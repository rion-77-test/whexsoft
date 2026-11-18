<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class ServiceController extends Controller
{
    /**
     * Display every active service.
     */
    public function index(Request $request): View|JsonResponse
    {

        $categories = ServiceCategory::query()
            ->where('is_active', true)
            ->withCount(['services' => fn($query) => $query->active()])
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        $activeCategory = $request->string('category')->toString();


        $services = Service::query()
            ->active()
            ->with(['serviceCategory', 'media'])
            ->when($activeCategory !== '', function ($query) use ($activeCategory): void {
                $query->whereHas('serviceCategory', fn($query) => $query->where('slug', $activeCategory));
            })
            ->orderBy('sort_order')
            ->orderBy('title')
            ->get();


        $serviceFeatures = $services->flatMap(fn(Service $service) => collect($service->features ?? [])
            ->filter(fn(array $feature): bool => filled($feature['title'] ?? null) && filled($feature['text'] ?? null))
            ->map(fn(array $feature): array => [
                'title' => $feature['title'],
                'text' => $feature['text'],
                'service_title' => $service->title,
            ]))
            ->take(4)
            ->values();


        if ($request->ajax() || $request->wantsJson()) {
            return response()
                ->json([
                    'grid' => view('frontend.services.partials.grid', compact('services'))->render(),
                    'features' => view('frontend.services.partials.features', compact('serviceFeatures'))->render(),
                ])
                ->header('Vary', 'X-Requested-With');
        }

        return view('frontend.services.index', compact(
            'services',
            'categories',
            'activeCategory',
            'serviceFeatures',
        ));
    }

    /**
     * Display a single active service.
     */
    public function show(Service $service): View
    {
        // abort_unless($service->is_active, 404);

        $service->load([
            'serviceCategory',
            'media',
            'packages' => fn($query) => $query->active()->orderBy('sort_order'),
            'projects' => fn($query) => $query
                ->published()
                ->with(['projectCategory', 'media'])
                ->orderBy('sort_order')
                ->orderBy('id')
                ->limit(3),
            'testimonials' => fn($query) => $query->published()->orderBy('sort_order'),
        ]);

        $startingPackage = Package::lowestPricedIn($service->packages);

        $otherServices = Service::query()
            ->active()
            ->with('media')
            ->whereKeyNot($service->getKey())
            ->orderBy('sort_order')
            ->take(3)
            ->get();

        return view('frontend.services.show', compact('service', 'otherServices', 'startingPackage'));
    }
}
