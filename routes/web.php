<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\ProgramController;

/*
|--------------------------------------------------------------------------
| Program CRUD Routes
|--------------------------------------------------------------------------
*/
Route::resource('programs', ProgramController::class);

// Dashboard table page should use ProgramController@index
Route::get('/dashboard/tables', [ProgramController::class, 'index'])->name('programs.index');

/*
|--------------------------------------------------------------------------
| Public Frontend Routes
|--------------------------------------------------------------------------
*/

// Frontend homepage, about, and team pages using controller
Route::get('/', [TeamMemberController::class, 'frontendIndex'])->name('frontend.index');
Route::get('/about', [TeamMemberController::class, 'frontendAbout'])->name('frontend.about');
Route::get('/team', [TeamMemberController::class, 'frontendIndex'])->name('team.public'); // or create separate method if needed

// Frontend services/programs
Route::get('/services', [ProgramController::class, 'indexpublic'])->name('frontend.services');

// Frontend workshops/blog
Route::get('/blog', [WorkshopController::class, 'workshops'])->name('frontend.workshops');
Route::get('/workshops', [WorkshopController::class, 'workshops'])->name('frontend.workshops');

// Other static frontend pages
Route::get('/contact', fn() => view('frontend.contact'))->name('frontend.contact');
Route::get('/features', fn() => view('frontend.features'))->name('frontend.features');
Route::get('/testimonial', fn() => view('frontend.testimonial'))->name('frontend.testimonial');
Route::get('/offer', fn() => view('frontend.offer'))->name('frontend.offer');
Route::get('/FAQ', fn() => view('frontend.faqs'))->name('frontend.faqs');
Route::get('/404', fn() => view('frontend.404'))->name('frontend.404');

/*
|--------------------------------------------------------------------------
| Public Contact + Admin List (no auth)
|--------------------------------------------------------------------------
*/
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/dashboard/error', [ContactController::class, 'adminIndex'])->name('dashboard.error');

/*
|--------------------------------------------------------------------------
| Authenticated Dashboard
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard main pages
    Route::prefix('dashboard')->group(function () {
        Route::view('/', 'dashboard.dashboard')->name('dashboard');
        Route::view('/forms', 'dashboard.forms');
        Route::view('/modals', 'dashboard.modals');
        Route::view('/buttons', 'dashboard.buttons');
        Route::view('/ui', 'dashboard.ui');
        Route::view('/404', 'dashboard.error');
        Route::view('/login', 'dashboard.login');

        // Dashboard Workshops CRUD
        Route::resource('workshops', WorkshopController::class);

        // Super admin role management
        Route::get('/manage-roles', [RoleController::class, 'index']);
        Route::post('/manage-roles', [RoleController::class, 'update']);
        Route::post('/manage-roles/edit-name', [RoleController::class, 'editName']);
        Route::post('/manage-roles/permissions', [RoleController::class, 'updatePermissions']);
        Route::delete('/manage-roles/delete', [RoleController::class, 'destroy'])->name('roles.destroy');

        // Super admin add user form
        Route::get('/forms', [UserController::class, 'create'])->name('forms.create');
        Route::post('/forms', [UserController::class, 'store'])->name('forms.store');
    });

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard Team Members CRUD
    Route::get('/dashboard/team', [TeamMemberController::class, 'index'])->name('team.index');
    Route::get('/dashboard/team/create', [TeamMemberController::class, 'create'])->name('team.create');
    Route::post('/dashboard/team', [TeamMemberController::class, 'store'])->name('team.store');
    Route::get('/dashboard/team/{id}/edit', [TeamMemberController::class, 'edit'])->name('team.edit');
    Route::put('/dashboard/team/{id}', [TeamMemberController::class, 'update'])->name('team.update');
    Route::delete('/dashboard/team/{id}', [TeamMemberController::class, 'destroy'])->name('team.destroy');
});

// Laravel auth routes
require __DIR__.'/auth.php';
