<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Display every active service.
     */
    public function index(): View
    {
        $services = Service::query()
            ->active()
            ->with(['serviceCategory', 'media'])
            ->orderBy('sort_order')
            ->orderBy('title')
            ->get();

        return view('frontend.services.index', compact('services'));
    }

    /**
     * Display a single active service.
     */
    public function show(Service $service): View
    {
        abort_unless($service->is_active, 404);

        $service->load([
            'serviceCategory',
            'media',
            'packages' => fn ($query) => $query->active()->orderBy('sort_order'),
            'projects' => fn ($query) => $query->published()->with(['projectCategory', 'media'])->orderBy('sort_order'),
            'testimonials' => fn ($query) => $query->published()->orderBy('sort_order'),
        ]);

        $otherServices = Service::query()
            ->active()
            ->with('media')
            ->whereKeyNot($service->getKey())
            ->orderBy('sort_order')
            ->take(3)
            ->get();

        return view('frontend.services.show', compact('service', 'otherServices'));
    }
}
