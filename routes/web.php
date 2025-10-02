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
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FooterController;

/*
|--------------------------------------------------------------------------
| Dashboard Routes (Protected by auth)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('dashboard')->name('dashboard.')->group(function () {
    // Footer CRUD
    Route::get('footer-action', [FooterController::class, 'action'])->name('footer.action');
    Route::get('footer/view', [FooterController::class, 'index'])->name('footer.view');
    Route::get('footer/edit', [FooterController::class, 'edit'])->name('footer.edit');
    Route::post('footer/update', [FooterController::class, 'update'])->name('footer.update');

    // Programs
    Route::resource('programs', ProgramController::class)->except(['show']);
    Route::get('/tables', [ProgramController::class, 'index'])->name('programs.index');

    // Offers
    Route::resource('offers', OfferController::class);

    // FAQs
    Route::get('/faqs', [FaqController::class, 'index'])->name('faqs.index');
    Route::get('/faqs/create', [FaqController::class, 'create'])->name('faqs.create');
    Route::post('/faqs', [FaqController::class, 'store'])->name('faqs.store');
    Route::get('/faqs/{id}/edit', [FaqController::class, 'edit'])->name('faqs.edit');
    Route::put('/faqs/{id}', [FaqController::class, 'update'])->name('faqs.update');
    Route::delete('/faqs/{id}', [FaqController::class, 'destroy'])->name('faqs.destroy');

    // Roles
    Route::get('/manage-roles', [RoleController::class, 'index'])->name('roles.index');
    Route::post('/manage-roles', [RoleController::class, 'update'])->name('roles.update');
    Route::post('/manage-roles/edit-name', [RoleController::class, 'editName'])->name('roles.editname');
    Route::post('/manage-roles/permissions', [RoleController::class, 'updatePermissions'])->name('roles.permissions');
    Route::delete('/manage-roles/delete', [RoleController::class, 'destroy'])->name('roles.destroy');

    // Workshops
    Route::resource('workshops', WorkshopController::class);

    // Sponsorships
    Route::get('/ui', [SponsorshipController::class, 'ui'])->name('ui');
    Route::resource('sponsorships', SponsorshipController::class)->except(['show']);

    // Sliders
    Route::resource('sliders', SliderController::class)->except(['show']);

    // About
    Route::resource('about', AboutController::class)->except(['show']);

    // Team Members
    Route::resource('team', TeamMemberController::class)->except(['show']);

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User creation
    Route::get('/forms', [UserController::class, 'create'])->name('forms.create');
    Route::post('/forms', [UserController::class, 'store'])->name('forms.store');

    // Dashboard home + static views
    Route::view('/', 'dashboard.dashboard')->name('home');
    Route::view('/modals', 'dashboard.modals')->name('modals');
    Route::view('/buttons', 'dashboard.buttons')->name('buttons');
    Route::view('/404', 'dashboard.error')->name('404');
});



/*
|--------------------------------------------------------------------------
| Public Routes (No auth required)
|--------------------------------------------------------------------------
*/

// Programs page (public)
Route::get('/programs', [ProgramController::class, 'indexpublic'])->name('programs.public');

// Frontend pages
Route::get('/', [TeamMemberController::class, 'frontendIndex'])->name('frontend.index');
Route::get('/about', [FrontController::class, 'about'])->name('frontend.about');
Route::get('/team', [TeamMemberController::class, 'frontendteam'])->name('team.public');
Route::get('/services', [ProgramController::class, 'indexpublic'])->name('frontend.services');
Route::get('/blog', [WorkshopController::class, 'workshops'])->name('frontend.workshops');
Route::get('/workshops', [WorkshopController::class, 'workshops'])->name('frontend.workshops');
Route::get('/features', [SponsorshipController::class, 'publicSpon'])->name('frontend.features');
Route::get('/contact', [ContactController::class, 'contact'])->name('frontend.contact');
Route::get('/testimonial', fn() => view('frontend.testimonial'))->name('frontend.testimonial');
Route::get('/offer', [FaqController::class, 'offer'])->name('frontend.offer');
Route::get('/FAQ', [FaqController::class, 'frontendIndex'])->name('frontend.faqs');

// Contact form
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Auth routes
require __DIR__ . '/auth.php';
