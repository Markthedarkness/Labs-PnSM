<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PatientController;
use App\Http\Middleware\TrackVisit;
use App\Http\Controllers\StatsController;

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

Route::resource('country', CountryController::class);
Route::resource('patient', PatientController::class);
Route::get('/stats', [StatsController::class, 'pages'])->name('stats.pages');
Route::get('/stats/detail', [StatsController::class, 'detail'])->name('stats.detail');
Route::get('/stats/methods', [StatsController::class, 'methods'])->name('stats.methods');
