<?php

namespace App\Http\Controllers;

use App\Models\ProjectCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = ProjectCategory::query()
            ->withCount('projects')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->paginate(15);

        return view('admin.project-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.project-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        ProjectCategory::create($this->validatedCategoryData($request));

        return redirect()
            ->route('admin.project-categories.index')
            ->with('success', 'Project category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectCategory $projectCategory): View
    {
        $projects = $projectCategory->projects()
            ->with('media')
            ->latest()
            ->paginate(10);

        return view('admin.project-categories.show', compact('projectCategory', 'projects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectCategory $projectCategory): View
    {
        return view('admin.project-categories.edit', compact('projectCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectCategory $projectCategory): RedirectResponse
    {
        $projectCategory->update($this->validatedCategoryData($request, $projectCategory));

        return redirect()
            ->route('admin.project-categories.show', $projectCategory)
            ->with('success', 'Project category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectCategory $projectCategory): RedirectResponse
    {
        if ($projectCategory->projects()->exists()) {
            return redirect()
                ->route('admin.project-categories.index')
                ->with('error', 'This category cannot be deleted while projects use it.');
        }

        $projectCategory->delete();

        return redirect()
            ->route('admin.project-categories.index')
            ->with('success', 'Project category deleted successfully.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedCategoryData(Request $request, ?ProjectCategory $projectCategory = null): array
    {
        return $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('project_categories', 'name')->ignore($projectCategory),
            ],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('project_categories', 'slug')->ignore($projectCategory),
            ],
            'description' => ['nullable', 'string'],
            'is_active' => ['required', 'boolean'],
            'sort_order' => ['required', 'integer', 'between:0,65535'],
        ]);
    }
}
