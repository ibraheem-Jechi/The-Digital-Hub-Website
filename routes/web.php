<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\RoleController;

/*
|--------------------------------------------------------------------------
| Public Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/about', function () { return view('frontend.about'); });
Route::get('/index', function () { return view('frontend.index'); });
Route::get('/services', function () { return view('frontend.services'); });
Route::get('/blog', function () { return view('frontend.blog'); });
Route::get('/contact', function () { return view('frontend.contact'); });
Route::get('/features', function () { return view('frontend.features'); });
Route::get('/team', function () { return view('frontend.team'); });
Route::get('/testimonial', function () { return view('frontend.testimonial'); });
Route::get('/offer', function () { return view('frontend.offer'); });
Route::get('/FAQ', function () { return view('frontend.faqs'); });
Route::get('/404', function () { return view('frontend.404'); });

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard Routes - only accessible to logged-in users
    Route::prefix('dashboard')->group(function () {
        Route::get('/', function () { return view('dashboard.dashboard'); })->name('dashboard');
        Route::get('/forms', function () { return view('dashboard.forms'); });
        Route::get('/modals', function () { return view('dashboard.modals'); });
        Route::get('/tables', function () { return view('dashboard.tables'); });
        Route::get('/buttons', function () { return view('dashboard.buttons'); });
        Route::get('/ui', function () { return view('dashboard.ui'); });
        Route::get('/404', function () { return view('dashboard.error'); });
        Route::get('/login', function () { return view('dashboard.login'); });

        // Super admin role management
        Route::get('/manage-roles', [RoleController::class, 'index']);
        Route::post('/manage-roles', [RoleController::class, 'update']);
        Route::post('/manage-roles/edit-name', [RoleController::class, 'editName']);
        Route::post('/manage-roles/permissions', [RoleController::class, 'updatePermissions']);
        Route::delete('/manage-roles/delete', [RoleController::class, 'destroy'])->name('roles.destroy');
    });
    });

// Laravel auth routes (login, register, password reset, etc.)
require __DIR__.'/auth.php';
