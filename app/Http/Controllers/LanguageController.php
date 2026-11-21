<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LanguageController extends Controller
{
    /**
     * Store the visitor's explicit language preference and return them
     * to the exact page they came from.
     */
    public function __invoke(Request $request, string $locale): RedirectResponse
    {
        abort_unless(array_key_exists($locale, config('locales.supported')), 404);

        Cookie::queue(Cookie::make('locale', $locale, 60 * 24 * 365, '/', null,
            $request->isSecure(), true, false, 'Lax'));

        // Return to the page the visitor was on (same host only, never back to /language)
        $previous = url()->previous();
        $safe = parse_url($previous, PHP_URL_HOST) === $request->getHost()
            && ! str_contains($previous, '/language/');

        return redirect()
    ->to($safe ? $previous : route('home'))
    ->header('X-Robots-Tag', 'noindex, nofollow');
    }
}
