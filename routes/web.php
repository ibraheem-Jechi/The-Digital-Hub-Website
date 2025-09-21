<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Public Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [FrontController::class, 'index'])->name('home');
Route::view('/about', 'frontend.about');
Route::view('/index', 'frontend.index');
Route::view('/services', 'frontend.services');
Route::view('/blog', 'frontend.blog');
Route::view('/contact', 'frontend.contact')->name('contact.page');
Route::view('/features', 'frontend.features');
Route::view('/team', 'frontend.team');
Route::view('/testimonial', 'frontend.testimonial');
Route::view('/offer', 'frontend.offer');
Route::view('/FAQ', 'frontend.faqs');
Route::view('/404', 'frontend.404');

/*
|--------------------------------------------------------------------------
| Public Contact + Admin List (no auth)
|--------------------------------------------------------------------------
*/
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/dashboard/error', [ContactController::class, 'adminIndex'])->name('dashboard.error'); // remove middleware if you want it public

/*
|--------------------------------------------------------------------------
| Authenticated Dashboard (optional)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::view('/', 'dashboard.dashboard')->name('dashboard');
        Route::view('/forms', 'dashboard.forms');
        Route::view('/modals', 'dashboard.modals');
        Route::view('/tables', 'dashboard.tables');
        Route::view('/buttons', 'dashboard.buttons');
        Route::view('/ui', 'dashboard.ui');
        // don’t route dashboard/error here again
        Route::view('/login', 'dashboard.login'); // only if you actually use this view
    });

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
