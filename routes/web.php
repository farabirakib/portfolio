<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SkillController;

// main index route frontend
Route::get('/', [FrontendController::class, 'home'])->name('frontend.home');

// contact routes
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/admin/contacts', [ContactController::class, 'index'])->name('admin.contacts.index');
Route::get('/admin/contacts/fetch', [ContactController::class, 'fetchContacts'])->name('admin.contacts.fetch');
Route::delete('/admin/contacts/{id}', [ContactController::class, 'destroy'])->name('admin.contact.destroy');


// projects routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects/store', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');
}); 

// about routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/about/create', [AboutController::class, 'create'])->name('about.create');
    Route::post('/about/store', [AboutController::class, 'store'])->name('about.store');
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::get('/about/{id}/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('/about/{id}', [AboutController::class, 'update'])->name('about.update');
    Route::delete('/about/{id}', [AboutController::class, 'destroy'])->name('about.destroy');
});

// skills
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('skills', SkillController::class);
});

// Auth routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
// Admin Dashboard (must be protected)
Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/admin/dashboard', function () { return view('backend.dashboard');})->name('admin.dashboard');
           
});

// Public CV download route (no auth required)
Route::get('/about/download-cv/{id}', [AboutController::class, 'downloadCV'])
    ->name('about.downloadCV');


// Logout route
Route::middleware(['web', 'auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


