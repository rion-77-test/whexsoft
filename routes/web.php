<?php

use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceCategoryController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\PortfolioController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\LanguageController;
use App\Http\Middleware\AdminLocale;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

// Language switcher (no SetLocale: only stores the cookie and redirects back)
Route::get('/language/{locale}', LanguageController::class)
    ->whereIn('locale', ['bn', 'en'])->name('language.switch');

// Public site
Route::middleware(SetLocale::class)->group(function () {
    Route::get('/', HomeController::class)->name('home');
    Route::get('/about', [PageController::class, 'about'])->name('about');
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/{service:slug}', [ServiceController::class, 'show'])->name('services.show');
    Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
    Route::get('/portfolio/{project:slug}', [PortfolioController::class, 'show'])->name('portfolio.show');
    Route::get('/process', [PageController::class, 'process'])->name('process');
    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');
    Route::get('/faq', [PageController::class, 'faq'])->name('faq');
    Route::get('/contact', [ContactController::class, 'show'])->name('contact');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy');
    Route::get('/terms', [PageController::class, 'terms'])->name('terms');
});

// Admin
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin', AdminLocale::class])->group(function () {
    Route::get('/', function () {
        // return view('admin.dashboard');
        return redirect()->route('admin.dashboard');
    });
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::post('posts/content-images', [PostController::class, 'uploadContentImage'])
        ->name('posts.content-images.store');
    Route::resource('posts', PostController::class);
    Route::resource('post-categories', PostCategoryController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('project-categories', ProjectCategoryController::class);
    Route::post('services/content-images', [AdminServiceController::class, 'uploadContentImage'])
        ->name('services.content-images.store');
    Route::resource('services', AdminServiceController::class);
    Route::resource('service-categories', ServiceCategoryController::class);
    Route::resource('packages', PackageController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('users', AdminUserController::class);
});

require __DIR__.'/auth.php';
