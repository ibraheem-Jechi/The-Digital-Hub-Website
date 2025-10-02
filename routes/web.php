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
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\FrontController;

use App\Models\Sponsorship;
use App\Models\TeamMember;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutController;


use App\Http\Controllers\FooterController;
use App\Models\Footer;


Route::middleware(['auth'])->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('footer-action', [FooterController::class, 'action'])->name('footer.action');
    Route::get('footer/view', [FooterController::class, 'index'])->name('footer.view');
    Route::get('footer/edit', [FooterController::class, 'edit'])->name('footer.edit');
    Route::post('footer/update', [FooterController::class, 'update'])->name('footer.update');
});



// |--------------------------------------------------------------------------
// | Program CRUD Routes
// |--------------------------------------------------------------------------

// ✅ Public programs page
Route::get('/programs', [ProgramController::class, 'indexpublic'])->name('programs.public');

// ✅ Dashboard (protected)
Route::middleware(['auth'])->group(function () {
    Route::resource('programs', ProgramController::class)->except(['show']);
    Route::get('/dashboard/tables', [ProgramController::class, 'index'])->name('programs.index');
});
/*
|--------------------------------------------------------------------------
| Public Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [TeamMemberController::class, 'frontendIndex'])->name('frontend.index');

// About page with sponsors + team members
Route::get('/about', [FrontController::class, 'about'])->name('frontend.about');

// Team page
Route::get('/team', [TeamMemberController::class, 'frontendteam'])->name('team.public');

// Services
Route::get('/services', [ProgramController::class, 'indexpublic'])->name('frontend.services');
Route::get('/blog', [WorkshopController::class, 'workshops'])->name('frontend.workshops');
Route::get('/workshops', [WorkshopController::class, 'workshops'])->name('frontend.workshops');
Route::get('/features', [SponsorshipController::class, 'publicSpon'])->name('frontend.features');
// Other static frontend pages
Route::get('/contact', [ContactController::class, 'contact'])->name('frontend.contact');

Route::get('/testimonial', fn() => view('frontend.testimonial'))->name('frontend.testimonial');
Route::get('/offer', [FaqController::class, 'offer'])->name('frontend.offer');
Route::get('/FAQ', [FaqController::class, 'frontendIndex'])->name('frontend.faqs');


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

    Route::prefix('dashboard')->middleware('auth')->group(function () {
    // Offers CRUD
    Route::resource('offers', OfferController::class);

    // Dashboard pages
    Route::view('/', 'dashboard.dashboard')->name('dashboard');
    Route::view('/forms', 'dashboard.forms');
    Route::view('/modals', 'dashboard.modals');
    Route::view('/buttons', 'dashboard.buttons');
    Route::view('/404', 'dashboard.error');

// Keep login route outside middleware
Route::view('/dashboard/login', 'dashboard.login')->name('dashboard.login');


    // Static dashboard views
    Route::view('/forms', 'dashboard.forms');
    Route::view('/modals', 'dashboard.modals');
    Route::view('/buttons', 'dashboard.buttons');
    Route::view('/404', 'dashboard.error');
    Route::view('/login', 'dashboard.login');

        // FAQs CRUD
        Route::get('/faqs', [FaqController::class, 'index'])->name('faqs.index');
        Route::get('/faqs/create', [FaqController::class, 'create'])->name('faqs.create');
        Route::post('/faqs', [FaqController::class, 'store'])->name('faqs.store');
        Route::get('/faqs/{id}/edit', [FaqController::class, 'edit'])->name('faqs.edit');
        Route::put('/faqs/{id}', [FaqController::class, 'update'])->name('faqs.update');
        Route::delete('/faqs/{id}', [FaqController::class, 'destroy'])->name('faqs.destroy');

        // Super admin role management
        Route::get('/manage-roles', [RoleController::class, 'index']);
        Route::post('/manage-roles', [RoleController::class, 'update']);
        Route::post('/manage-roles/edit-name', [RoleController::class, 'editName']);
        Route::post('/manage-roles/permissions', [RoleController::class, 'updatePermissions']);
        Route::delete('/manage-roles/delete', [RoleController::class, 'destroy'])->name('roles.destroy');

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