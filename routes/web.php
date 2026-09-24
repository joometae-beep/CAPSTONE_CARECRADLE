<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\MidwifeController;
use App\Http\Controllers\Admin\MotherController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | Midwife Management
    |--------------------------------------------------------------------------
    */

    Route::post('/midwives/{midwife}/activate', [MidwifeController::class, 'activate'])
        ->name('midwives.activate');

    Route::resource('midwives', MidwifeController::class);

    /*
    |--------------------------------------------------------------------------
    | Mother Management
    |--------------------------------------------------------------------------
    */

    Route::resource('mothers', MotherController::class);

    /*
|--------------------------------------------------------------------------
| Prenatal Checkups
|--------------------------------------------------------------------------
*/

Route::get(
    '/mothers/{mother}/prenatal-checkups/create',
    [\App\Http\Controllers\PrenatalCheckupController::class, 'create']
)->name('prenatal-checkups.create');

Route::post(
    '/mothers/{mother}/prenatal-checkups',
    [\App\Http\Controllers\PrenatalCheckupController::class, 'store']
)->name('prenatal-checkups.store');

Route::get(
    '/prenatal-checkups/{prenatalCheckup}',
    [\App\Http\Controllers\PrenatalCheckupController::class, 'show']
)->name('prenatal-checkups.show');

Route::get(
    '/prenatal-checkups/{prenatalCheckup}/edit',
    [\App\Http\Controllers\PrenatalCheckupController::class, 'edit']
)->name('prenatal-checkups.edit');

Route::put(
    '/prenatal-checkups/{prenatalCheckup}',
    [\App\Http\Controllers\PrenatalCheckupController::class, 'update']
)->name('prenatal-checkups.update');

Route::delete(
    '/prenatal-checkups/{prenatalCheckup}',
    [\App\Http\Controllers\PrenatalCheckupController::class, 'destroy']
)->name('prenatal-checkups.destroy');

});

require __DIR__.'/auth.php';