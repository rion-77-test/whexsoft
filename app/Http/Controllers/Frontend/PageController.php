<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        return view('frontend.pages.about');
    }

    public function process(): View
    {
        return view('frontend.pages.process');
    }

    public function faq(): View
    {
        return view('frontend.pages.faq');
    }

    public function privacy(): View
    {
        return view('frontend.pages.privacy-policy');
    }

    public function terms(): View
    {
        return view('frontend.pages.terms');
    }
}
