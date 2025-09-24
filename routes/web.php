<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WorkshopController;
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
// Public frontend routes
Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/index', 'index')->name('frontend.index');
    // Public Team Page
Route::get('/team', [FrontController::class, 'team'])->name('team.public');

    Route::get('/about', 'about')->name('frontend.about');
    Route::get('/services', 'services')->name('frontend.services');
    Route::get('/blog', 'blog')->name('frontend.blog');
    Route::get('/contact', 'contact')->name('frontend.contact');
    Route::get('/features', 'features')->name('frontend.features');
    Route::get('/testimonial', 'testimonial')->name('frontend.testimonial');
    Route::get('/offer', 'offer')->name('frontend.offer');
    Route::get('/FAQ', 'faqs')->name('frontend.faqs');
    Route::get('/404', 'error404')->name('frontend.404');
});

// Route::get('/', [FrontController::class, 'index'])->name('home');
// Route::get('/about', function () { return view('frontend.about'); });
// Route::get('/index', function () { return view('frontend.index'); });

// Route::get('/services', function () { return view('frontend.services'); });
// Route::get('/blog', function () { return view('frontend.blog'); });
// Route::get('/contact', function () { return view('frontend.contact'); });
// Route::get('/features', function () { return view('frontend.features'); });
// Route::get('/team', [TeamMemberController::class, 'publicIndex'])->name('team.public');
// Route::get('/testimonial', function () { return view('frontend.testimonial'); });
// Route::get('/offer', function () { return view('frontend.offer'); });
// Route::get('/FAQ', function () { return view('frontend.faqs'); });
// Route::get('/404', function () { return view('frontend.404'); });
Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/about', function () {
    return view('frontend.about');
});
Route::get('/index', function () {
    return view('frontend.index');
});
Route::get('/services', function () {
    return view('frontend.services');
});
Route::get('/blog', [WorkshopController::class, 'workshops'])->name('frontend.workshops');

Route::get('/contact', function () {
    return view('frontend.contact');
});
Route::get('/features', function () {
    return view('frontend.features');
});
Route::get('/team', function () {
    return view('frontend.team');
});
Route::get('/testimonial', function () {
    return view('frontend.testimonial');
});
Route::get('/offer', function () {
    return view('frontend.offer');
});
Route::get('/FAQ', function () {
    return view('frontend.faqs');
});
Route::get('/404', function () {
    return view('frontend.404');
});

// Frontend Workshops/Blog page
Route::get('/workshops', [WorkshopController::class, 'workshops'])->name('frontend.workshops');
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
        
        Route::view('/buttons', 'dashboard.buttons');
        Route::view('/ui', 'dashboard.ui');
        // don’t route dashboard/error here again
        Route::view('/login', 'dashboard.login'); // only if you actually use this view
    });

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard Routes
    Route::prefix('dashboard')->group(function () {
        Route::get('/', function () { return view('dashboard.dashboard'); })->name('dashboard');
        Route::get('/modals', function () { return view('dashboard.modals'); });
       
        Route::get('/buttons', function () { return view('dashboard.buttons'); });
        Route::get('/ui', function () { return view('dashboard.ui'); });
        Route::get('/404', function () { return view('dashboard.error'); });
        Route::get('/login', function () { return view('dashboard.login'); });
        Route::get('/', function () {
            return view('dashboard.dashboard');
        })->name('dashboard');

        Route::get('/forms', function () {
            return view('dashboard.forms');
        });
        Route::get('/modals', function () {
            return view('dashboard.modals');
        });
        
        Route::get('/buttons', function () {
            return view('dashboard.buttons');
        });
        Route::get('/ui', function () {
            return view('dashboard.ui');
        });
        Route::get('/404', function () {
            return view('dashboard.error');
        });
        Route::get('/login', function () {
            return view('dashboard.login');
        });

        // Dashboard Workshops CRUD routes
        Route::resource('workshops', WorkshopController::class);
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

        // Super admin add user form
        Route::get('/forms', [UserController::class, 'create'])->name('forms.create');
        Route::post('/forms', [UserController::class, 'store'])->name('forms.store');
    });
});

// Laravel auth routes (login, register, password reset, etc.)
require __DIR__.'/auth.php';
Route::middleware(['auth', 'verified'])->group(function () {

    // Team members - Dashboard CRUD
    Route::get('/dashboard/team', [TeamMemberController::class, 'index'])->name('team.index');          // View all team members
    Route::get('/dashboard/team/create', [TeamMemberController::class, 'create'])->name('team.create'); // Show form to add
    Route::post('/dashboard/team', [TeamMemberController::class, 'store'])->name('team.store');         // Store new member
    Route::get('/dashboard/team/{id}/edit', [TeamMemberController::class, 'edit'])->name('team.edit');  // Show edit form
    Route::put('/dashboard/team/{id}', [TeamMemberController::class, 'update'])->name('team.update');   // Update member
    Route::delete('/dashboard/team/{id}', [TeamMemberController::class, 'destroy'])->name('team.destroy'); // Delete member
});
require __DIR__ . '/auth.php';
