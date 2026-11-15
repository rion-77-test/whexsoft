<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\View\View;

class PricingController extends Controller
{
    /**
     * Display the active packages grouped by their service.
     */
    public function __invoke(): View
    {
        $packages = Package::query()
            ->active()
            ->with('service')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        $packagesByService = $packages->groupBy(fn (Package $package): string => $package->service?->title ?? 'সাধারণ প্যাকেজ');

        return view('frontend.pricing', compact('packagesByService'));
    }
}
