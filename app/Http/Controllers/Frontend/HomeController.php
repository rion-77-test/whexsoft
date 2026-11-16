<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the public home page.
     */
    public function __invoke(): View
    {
        $services = Service::query()
            ->active()
            ->with('media')
            ->orderBy('sort_order')
            ->take(5)
            ->get();

        $projects = Project::query()
            ->published()
            ->with(['projectCategory', 'media'])
            ->where('is_featured', true)
            ->orderBy('sort_order')
            ->take(3)
            ->get();

        if ($projects->isEmpty()) {
            $projects = Project::query()
                ->published()
                ->with(['projectCategory', 'media'])
                ->orderBy('sort_order')
                ->latest()
                ->take(3)
                ->get();
        }

        $posts = Post::query()
            ->published()
            ->with('media')
            ->latest('published_at')
            ->take(3)
            ->get();

        $testimonials = Testimonial::query()
            ->published()
            ->with('media')
            ->orderBy('sort_order')
            ->take(6)
            ->get();

        return view('frontend.home', compact('services', 'projects', 'posts', 'testimonials'));
    }
}
