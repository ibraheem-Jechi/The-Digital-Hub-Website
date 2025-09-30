<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SponsorshipController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutController;

/*
|--------------------------------------------------------------------------
| Public Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [TeamMemberController::class, 'frontendIndex'])->name('frontend.index');
Route::get('/about', [TeamMemberController::class, 'frontendAbout'])->name('frontend.about');
Route::get('/team', [TeamMemberController::class, 'frontendTeam'])->name('team.public');
Route::get('/services', [ProgramController::class, 'indexpublic'])->name('frontend.services');
Route::get('/blog', [WorkshopController::class, 'workshops'])->name('frontend.workshops');
Route::get('/workshops', [WorkshopController::class, 'workshops'])->name('frontend.workshops');
Route::get('/features', [SponsorshipController::class, 'publicSpon'])->name('frontend.features');
Route::get('/contact', fn() => view('frontend.contact'))->name('frontend.contact');
Route::get('/testimonial', fn() => view('frontend.testimonial'))->name('frontend.testimonial');
Route::get('/offer', fn() => view('frontend.offer'))->name('frontend.offer');
Route::get('/FAQ', fn() => view('frontend.faqs'))->name('frontend.faqs');
Route::get('/404', fn() => view('frontend.404'))->name('frontend.404');

/*
|--------------------------------------------------------------------------
| Public Contact Routes
|--------------------------------------------------------------------------
*/
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/dashboard/error', [ContactController::class, 'adminIndex'])->name('dashboard.error');

/*
|--------------------------------------------------------------------------
| Program Public Route
|--------------------------------------------------------------------------
*/
Route::get('/programs', [ProgramController::class, 'indexpublic'])->name('programs.public');

/*
|--------------------------------------------------------------------------
| Authenticated Dashboard Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function () {

    // Dashboard home
    Route::view('/', 'dashboard.dashboard')->name('dashboard');

    // Static dashboard views
    Route::view('/forms', 'dashboard.forms');
    Route::view('/modals', 'dashboard.modals');
    Route::view('/buttons', 'dashboard.buttons');
    Route::view('/404', 'dashboard.error');
    Route::view('/login', 'dashboard.login');

    // Programs CRUD
    Route::resource('programs', ProgramController::class)->except(['show']);
    Route::get('/tables', [ProgramController::class, 'index'])->name('programs.index');

    // Workshops CRUD
    Route::resource('workshops', WorkshopController::class);

    // Sponsorships CRUD
    Route::get('/ui', [SponsorshipController::class, 'ui'])->name('dashboard.ui');
    Route::resource('sponsorships', SponsorshipController::class)->except(['show']);

    // Sliders CRUD
    Route::resource('sliders', SliderController::class)->except(['show']);

    // About CRUD
    Route::resource('about', AboutController::class)->except(['show']);

    // Team Members CRUD
    Route::resource('team', TeamMemberController::class)->except(['show']);

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Role management
    Route::get('/manage-roles', [RoleController::class, 'index']);
    Route::post('/manage-roles', [RoleController::class, 'update']);
    Route::post('/manage-roles/edit-name', [RoleController::class, 'editName']);
    Route::post('/manage-roles/permissions', [RoleController::class, 'updatePermissions']);
    Route::delete('/manage-roles/delete', [RoleController::class, 'destroy'])->name('roles.destroy');

    // User creation
    Route::get('/forms', [UserController::class, 'create'])->name('forms.create');
    Route::post('/forms', [UserController::class, 'store'])->name('forms.store');
});

// Auth routes
require __DIR__ . '/auth.php';
