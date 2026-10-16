<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AppointmentController;

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
use App\Http\Controllers\CountryController;

Route::resource('country', CountryController::class);
use App\Http\Controllers\PatientController;

Route::resource('patient', PatientController::class);
