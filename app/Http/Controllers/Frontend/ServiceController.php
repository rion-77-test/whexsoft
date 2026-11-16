<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Service;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Display every active service.
     */
    public function index(): View
    {
        $startingPackage = Package::lowestPricedActive();

        $services = Service::query()
            // ->active()
            ->with(['serviceCategory', 'media'])
            ->orderBy('sort_order')
            ->orderBy('title')
            ->get();

        $serviceFeatures = $services->flatMap(fn (Service $service) => collect($service->features ?? [])
            ->filter(fn (array $feature): bool => filled($feature['title'] ?? null) && filled($feature['text'] ?? null))
            ->map(fn (array $feature): array => [
                'title' => $feature['title'],
                'text' => $feature['text'],
                'service_title' => $service->title,
            ]))
            ->take(4)
            ->values();

        $serviceSteps = $services->flatMap(fn (Service $service) => collect($service->steps ?? [])
            ->filter(fn (array $step): bool => filled($step['title'] ?? null) || filled($step['text'] ?? null))
            ->map(fn (array $step): array => [
                'title' => $step['title'] ?? '',
                'text' => $step['text'] ?? '',
                'service_title' => $service->title,
            ]))
            ->take(4)
            ->values();

        $serviceFaqs = $services->flatMap(fn (Service $service) => collect($service->faqs ?? [])
            ->filter(fn (array $faq): bool => filled($faq['question'] ?? null) && filled($faq['answer'] ?? null))
            ->map(fn (array $faq): array => [
                'question' => $faq['question'],
                'answer' => $faq['answer'],
                'service_title' => $service->title,
            ]))
            ->take(4)
            ->values();

        return view('frontend.services.index', compact(
            'services',
            'startingPackage',
            'serviceFeatures',
            'serviceSteps',
            'serviceFaqs',
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
            'packages' => fn ($query) => $query->active()->orderBy('sort_order'),
            'projects' => fn ($query) => $query
                ->published()
                ->with(['projectCategory', 'media'])
                ->orderBy('sort_order')
                ->orderBy('id')
                ->limit(3),
            'testimonials' => fn ($query) => $query->published()->orderBy('sort_order'),
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
