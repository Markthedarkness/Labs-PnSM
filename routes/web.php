<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\ProfileController;

// ===== ПУБЛІЧНІ МАРШРУТИ =====

Route::get('/', function () {
    return view('welcome');
});

Route::get('/say/{message?}', [SiteController::class, 'say'])->name('site.say');

Route::get('/entry', [SiteController::class, 'entry'])->name('entry.form');
Route::post('/entry', [SiteController::class, 'entryStore'])->name('entry.store');

Route::view('/about', 'site.about')->name('site.about');
Route::view('/contact', 'site.contact')->name('site.contact');

Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointment.index');
Route::get('/appointments/contact', [AppointmentController::class, 'contact'])->name('appointment.contact');
Route::post('/appointments/contact', [AppointmentController::class, 'contactStore'])->name('appointment.contact.store');

// Публічні списки
Route::get('/country', [CountryController::class, 'index'])->name('country.index');
Route::get('/country/{country}', [CountryController::class, 'show'])
    ->where('country', '[0-9]+')
    ->name('country.show');


Route::get('/patient', [PatientController::class, 'index'])->name('patient.index');
Route::get('/patient/{patient}', [PatientController::class, 'show'])
    ->where('patient', '[0-9]+')
    ->name('patient.show');

// Публічний блог (обмеження ID — тільки цифри!)
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{blog}', [BlogController::class, 'show'])
    ->where('blog', '[0-9]+')
    ->name('blog.show');

// ===== АВТЕНТИФІКАЦІЯ =====
require __DIR__ . '/auth.php';


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ===== ЗАХИЩЕНІ МАРШРУТИ =====
Route::middleware('auth')->group(function () {

    Route::view('/dashboard', 'dashboard')->name('dashboard');

    // Блог
    Route::get('/blog/admin', [BlogController::class, 'admin'])->name('blog.admin');
    Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/blog/{blog}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('/blog/{blog}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/blog/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy');
    Route::get('/blog/{blog}/tags', [BlogController::class, 'tags'])->name('blog.tags');
    Route::post('/blog/{blog}/tags', [BlogController::class, 'tagsStore'])->name('blog.tags.store');

    // Пацієнти
    Route::get('/patient/create', [PatientController::class, 'create'])->name('patient.create');
    Route::post('/patient', [PatientController::class, 'store'])->name('patient.store');
    Route::get('/patient/{patient}/edit', [PatientController::class, 'edit'])->name('patient.edit');
    Route::put('/patient/{patient}', [PatientController::class, 'update'])->name('patient.update');
    Route::delete('/patient/{patient}', [PatientController::class, 'destroy'])->name('patient.destroy');

    // Країни
    Route::get('/country/create', [CountryController::class, 'create'])->name('country.create');
    Route::post('/country', [CountryController::class, 'store'])->name('country.store');
    Route::get('/country/{country}/edit', [CountryController::class, 'edit'])->name('country.edit');
    Route::put('/country/{country}', [CountryController::class, 'update'])->name('country.update');
    Route::delete('/country/{country}', [CountryController::class, 'destroy'])->name('country.destroy');

    // Мітки
    Route::resource('filters', FilterController::class)->except(['show']);

    // Статистика
    Route::get('/stats', [StatsController::class, 'pages'])->name('stats.pages');
    Route::get('/stats/detail', [StatsController::class, 'detail'])->name('stats.detail');
    Route::get('/stats/methods', [StatsController::class, 'methods'])->name('stats.methods');
});
