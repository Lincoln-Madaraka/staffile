<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Admin (GiftMed core)
|--------------------------------------------------------------------------
| Admins only
*/
Route::middleware(['auth', 'verified', 'can:admin-login'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
    });

/*
|--------------------------------------------------------------------------
| Doctor
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])
    ->prefix('doctor')
    ->name('doctor.')
    ->group(function () {
        Route::view('/dashboard', 'doctor.dashboard')->name('dashboard');
    });

/*
|--------------------------------------------------------------------------
| Patient
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])
    ->prefix('patient')
    ->name('patient.')
    ->group(function () {
        Route::view('/dashboard', 'patient.dashboard')->name('dashboard');
    });

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
