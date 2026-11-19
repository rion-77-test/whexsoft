<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Testimonial;
use App\Support\WebpImage;
use App\Support\TranslationPayload;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $testimonials = Testimonial::query()
            ->with(['service', 'media'])
            ->orderBy('sort_order')
            ->latest()
            ->paginate(15);

        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $services = Service::query()->orderBy('title')->pluck('title', 'id')->all();

        return view('admin.testimonials.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validatedTestimonialData($request);
        $photo = $request->file('photo');
        unset($validated['photo'], $validated['remove_photo']);

        $testimonial = Testimonial::create($validated);

        if ($photo !== null) {
            $testimonial->addMedia(WebpImage::convert($photo))->toMediaCollection('photo');
        }

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial): View
    {
        $testimonial->load(['service', 'media']);

        return view('admin.testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial): View
    {
        $services = Service::query()->orderBy('title')->pluck('title', 'id')->all();

        return view('admin.testimonials.edit', compact('testimonial', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial): RedirectResponse
    {
        $validated = $this->validatedTestimonialData($request);
        $photo = $request->file('photo');
        $removePhoto = $request->boolean('remove_photo');
        unset($validated['photo'], $validated['remove_photo']);

        $testimonial->update($validated);

        if ($photo !== null) {
            $testimonial->addMedia(WebpImage::convert($photo))->toMediaCollection('photo');
        } elseif ($removePhoto) {
            $testimonial->clearMediaCollection('photo');
        }

        return redirect()
            ->route('admin.testimonials.show', $testimonial)
            ->with('success', 'Testimonial updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->delete();

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedTestimonialData(Request $request): array
    {
        $validated = $request->validate([
            'service_id' => ['nullable', 'integer', 'exists:services,id'],
            'client_name' => ['required', 'string', 'max:255'],
            'business_name' => ['nullable', 'string', 'max:255'],
            'quote' => ['required', 'string'],
            'translations' => ['nullable', 'array'],
            'translations.en' => ['nullable', 'array'],
            'translations.en.quote' => ['nullable', 'string'],
            'translations.en.business_name' => ['nullable', 'string', 'max:255'],
            'is_published' => ['required', 'boolean'],
            'sort_order' => ['required', 'integer', 'between:0,65535'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'extensions:jpg,jpeg,png,webp', 'max:5120'],
            'remove_photo' => ['sometimes', 'boolean'],
        ]);

        $validated['translations'] = TranslationPayload::clean($validated['translations'] ?? []);

        return $validated;
    }
}
