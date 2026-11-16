<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Service;
use App\Support\WebpImage;
use App\Support\YouTubeVideo;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $projects = Project::query()
            ->with(['projectCategory', 'service', 'media'])
            ->orderBy('sort_order')
            ->latest()
            ->paginate(15);

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = ProjectCategory::query()->orderBy('name')->get();
        $services = Service::query()->orderBy('title')->pluck('title', 'id')->all();

        return view('admin.projects.create', compact('categories', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validatedProjectData($request);
        $image = $request->file('image');
        unset($validated['image'], $validated['remove_image']);

        $project = Project::create($validated);

        if ($image !== null) {
            $project->addMedia(WebpImage::convert($image))->toMediaCollection('project-image');
        }

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project): View
    {
        $project->load(['projectCategory', 'service', 'media']);

        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project): View
    {
        $categories = ProjectCategory::query()->orderBy('name')->get();
        $services = Service::query()->orderBy('title')->pluck('title', 'id')->all();

        return view('admin.projects.edit', compact('project', 'categories', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project): RedirectResponse
    {
        $validated = $this->validatedProjectData($request, $project);
        $image = $request->file('image');
        $removeImage = $request->boolean('remove_image');
        unset($validated['image'], $validated['remove_image']);

        $project->update($validated);

        if ($image !== null) {
            $project->addMedia(WebpImage::convert($image))->toMediaCollection('project-image');
        } elseif ($removeImage) {
            $project->clearMediaCollection('project-image');
        }

        return redirect()
            ->route('admin.projects.show', $project)
            ->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedProjectData(Request $request, ?Project $project = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('projects', 'slug')->ignore($project),
            ],
            'project_category_id' => ['required', 'integer', 'exists:project_categories,id'],
            'service_id' => ['nullable', 'integer', 'exists:services,id'],
            'summary' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'live_url' => ['nullable', 'url:http,https', 'max:255'],
            'project_walkthrough_url' => [
                'nullable',
                'url:http,https',
                'max:255',
                function (string $attribute, mixed $value, Closure $fail): void {
                    if (filled($value) && YouTubeVideo::videoId($value) === null) {
                        $fail('The project walkthrough must be a valid YouTube video link.');
                    }
                },
            ],
            'is_real_client' => ['required', 'boolean'],
            'is_featured' => ['required', 'boolean'],
            'is_published' => ['required', 'boolean'],
            'sort_order' => ['required', 'integer', 'between:0,65535'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'extensions:jpg,jpeg,png,webp', 'max:5120'],
            'remove_image' => ['sometimes', 'boolean'],
        ]);
    }
}
