<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SponsorshipController;
use Illuminate\Support\Facades\Route;
use App\Models\Sponsorship;

/*
|--------------------------------------------------------------------------
| Public Frontend Routes
|--------------------------------------------------------------------------
*/

// Home page with sponsorships
Route::get('/', function () {
    $sponsorships = Sponsorship::all();
    return view('frontend.index', compact('sponsorships'));
})->name('home');

// About page with sponsorships
Route::get('/about', function () {
    $sponsorships = Sponsorship::all();
    return view('frontend.about', compact('sponsorships'));
});

Route::get('/index', function () { return view('frontend.index'); });
Route::get('/services', function () { return view('frontend.services'); });
Route::get('/blog', function () { return view('frontend.blog'); });
Route::get('/contact', function () { return view('frontend.contact'); });

// Features page - pass sponsorships
Route::get('/features', function () {
    $sponsorships = Sponsorship::all();
    return view('frontend.features', compact('sponsorships'));
});

Route::get('/team', function () { return view('frontend.team'); });
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

    // Dashboard Routes
    Route::prefix('dashboard')->group(function () {
        Route::get('/', function () { return view('dashboard.dashboard'); })->name('dashboard');
        Route::get('/forms', function () { return view('dashboard.forms'); });
        Route::get('/modals', function () { return view('dashboard.modals'); });
        Route::get('/tables', function () { return view('dashboard.tables'); });
        Route::get('/buttons', function () { return view('dashboard.buttons'); });
        Route::get('/404', function () { return view('dashboard.error'); });
        Route::get('/login', function () { return view('dashboard.login'); });

        /*
        |--------------------------------------------------------------------------
        | Sponsorship Routes (form + table in dashboard)
        |--------------------------------------------------------------------------
        */
        Route::get('/ui', [SponsorshipController::class, 'ui'])->name('dashboard.ui');   // Show form + table
        Route::post('/sponsorships', [SponsorshipController::class, 'store'])->name('sponsorships.store');
        Route::put('/sponsorships/{id}', [SponsorshipController::class, 'update'])->name('sponsorships.update');
        Route::delete('/sponsorships/{id}', [SponsorshipController::class, 'destroy'])->name('sponsorships.destroy');
        Route::get('/sponsorships/{id}/edit', [SponsorshipController::class, 'edit'])->name('sponsorships.edit');

        // Public sponsorships (frontend display)
        Route::get('/sponsors', [SponsorshipController::class, 'publicIndex'])->name('sponsors.public');

        // Super admin role management
        Route::get('/manage-roles', [RoleController::class, 'index']);
        Route::post('/manage-roles', [RoleController::class, 'update']);
        Route::post('/manage-roles/edit-name', [RoleController::class, 'editName']);
        Route::post('/manage-roles/permissions', [RoleController::class, 'updatePermissions']);
        Route::delete('/manage-roles/delete', [RoleController::class, 'destroy'])->name('roles.destroy');
    });
});

// Laravel auth routes
require __DIR__.'/auth.php';
