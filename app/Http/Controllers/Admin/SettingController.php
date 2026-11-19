<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function edit(): View
    {
        $models = [
            'Services' => [Service::class, 'title'],
            'Service categories' => [ServiceCategory::class, 'name'],
            'Projects' => [Project::class, 'title'],
            'Project categories' => [ProjectCategory::class, 'name'],
            'Testimonials' => [Testimonial::class, 'quote'],
            'Packages' => [Package::class, 'name'],
            'Blog posts' => [Post::class, 'title'],
            'Blog categories' => [PostCategory::class, 'name'],
        ];

        $stats = collect($models)->map(function (array $model, string $label) {
            [$class, $field] = $model;
            $translationColumn = 'translations->en->'.$field;

            return [
                'label' => $label,
                'total' => $class::query()->count(),
                'translated' => $class::query()
                    ->whereNotNull($translationColumn)
                    ->where($translationColumn, '<>', '')
                    ->count(),
            ];
        })->values();

        return view('admin.settings.language', [
            'geoEnabled' => Setting::geoEnabled(),
            'current' => Setting::defaultLocale(),
            'stats' => $stats,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'geo_language_enabled' => ['required', 'boolean'],
            'default_locale' => ['required', Rule::in(array_keys(config('locales.supported')))],
        ]);

        Setting::put('geo_language_enabled', $data['geo_language_enabled'] ? '1' : '0');
        Setting::put('default_locale', $data['default_locale']);

        return back()->with('success', 'Language settings updated.');
    }
}
