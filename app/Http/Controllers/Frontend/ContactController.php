<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Throwable;

class ContactController extends Controller
{
    /**
     * Display the contact page.
     */
    public function show(): View
    {
        $services = Service::query()
            ->active()
            ->orderBy('sort_order')
            ->orderBy('title')
            ->get();

        return view('frontend.contact', compact('services'));
    }

    /**
     * Send a quotation request to the studio inbox.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:190'],
            'service_type' => ['nullable', 'string', 'max:120'],
            'budget' => ['nullable', 'string', 'max:120'],
            'message' => ['nullable', 'string', 'max:3000'],
        ]);

        $body = collect([
            'নাম' => $validated['name'],
            'ফোন' => $validated['phone'],
            'ইমেইল' => $validated['email'] ?? '—',
            'সার্ভিসের ধরন' => $validated['service_type'] ?? '—',
            'আনুমানিক বাজেট' => $validated['budget'] ?? '—',
            'বার্তা' => $validated['message'] ?? '—',
        ])->map(fn (string $value, string $label): string => "{$label}: {$value}")
            ->implode("\n");

        try {
            Mail::raw($body, function ($message) use ($validated): void {
                $message->to('contact.whexsoft@gmail.com')
                    ->subject('নতুন কোটেশন অনুরোধ — '.$validated['name']);

                if (! empty($validated['email'])) {
                    $message->replyTo($validated['email']);
                }
            });
        } catch (Throwable $exception) {
            Log::error('Contact form mail failed.', ['exception' => $exception]);

            return back()
                ->withInput()
                ->with('error', 'দুঃখিত, আপনার বার্তাটি পাঠানো যায়নি। অনুগ্রহ করে সরাসরি ফোন বা হোয়াটসঅ্যাপে যোগাযোগ করুন।');
        }

        return redirect()
            ->route('contact')
            ->with('success', 'ধন্যবাদ! আপনার অনুরোধটি গৃহীত হয়েছে। আমাদের টিম দ্রুততম সময়ে যোগাযোগ করবে।');
    }
}
