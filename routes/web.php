<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProgramController;
use App\Models\Program;
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
Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/about', fn() => view('frontend.about'));
// Route::get('/index', fn() => view('frontend.index'));

Route::get('/services', [ProgramController::class, 'indexpublic']);



// Route::get('/services', function () {
//     $programs = Program::latest()->get();
//     return view('frontend.services', compact('programs'));
// });

// Route::get('/index', function () {
//     $programs = Program::latest()->get();
//     return view('frontend.index', compact('programs'));
// });
Route::get('/blog', fn() => view('frontend.blog'));
Route::get('/contact', fn() => view('frontend.contact'));
Route::get('/features', fn() => view('frontend.features'));
Route::get('/team', fn() => view('frontend.team'));
Route::get('/testimonial', fn() => view('frontend.testimonial'));
Route::get('/offer', fn() => view('frontend.offer'));
Route::get('/FAQ', fn() => view('frontend.faqs'));
Route::get('/404', fn() => view('frontend.404'));

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
        Route::get('/', fn() => view('dashboard.dashboard'))->name('dashboard');
        Route::get('/forms', fn() => view('dashboard.forms'));
        Route::get('/modals', fn() => view('dashboard.modals'));
        // ❌ removed the old tables view-only route
        Route::get('/buttons', fn() => view('dashboard.buttons'));
        Route::get('/ui', fn() => view('dashboard.ui'));
        Route::get('/404', fn() => view('dashboard.error'));
        Route::get('/login', fn() => view('dashboard.login'));

        // Super admin role management
        Route::get('/manage-roles', [RoleController::class, 'index']);
        Route::post('/manage-roles', [RoleController::class, 'update']);
        Route::post('/manage-roles/edit-name', [RoleController::class, 'editName']);
        Route::post('/manage-roles/permissions', [RoleController::class, 'updatePermissions']);
        Route::delete('/manage-roles/delete', [RoleController::class, 'destroy'])->name('roles.destroy');
    });
});

// Laravel auth routes (login, register, password reset, etc.)
require __DIR__ . '/auth.php';
