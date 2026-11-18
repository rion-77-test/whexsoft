<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class PortfolioController extends Controller
{
    /**
     * Display the published project archive with category filtering.
     */
    public function index(Request $request): View|JsonResponse
    {
        $categories = ProjectCategory::query()
            ->where('is_active', true)
            ->withCount(['projects' => fn($query) => $query->published()])
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        $activeCategory = $request->string('category')->toString();

        $projects = Project::query()
            ->published()
            ->with(['projectCategory', 'media'])
            ->when($activeCategory !== '', function ($query) use ($activeCategory): void {
                $query->whereHas('projectCategory', fn($query) => $query->where('slug', $activeCategory));
            })
            ->orderBy('sort_order')
            ->latest()
            ->paginate(9)
            ->withQueryString();

        if ($request->ajax() || $request->wantsJson()) {
            return response()
                ->json([
                    'grid' => view('frontend.portfolio.partials.grid', compact('projects'))->render(),
                ])
                ->header('Vary', 'X-Requested-With');
        }

        return view('frontend.portfolio.index', compact('projects', 'categories', 'activeCategory'));
    }

    /**
     * Display a single published project.
     */
    public function show(Project $project): View
    {
        abort_unless($project->is_published, 404);

        $project->load(['projectCategory', 'service', 'media']);

        $relatedProjects = Project::query()
            ->published()
            ->with(['projectCategory', 'media'])
            ->whereKeyNot($project->getKey())
            ->when($project->project_category_id, fn($query) => $query->where('project_category_id', $project->project_category_id))
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('frontend.portfolio.show', compact('project', 'relatedProjects'));
    }
}
