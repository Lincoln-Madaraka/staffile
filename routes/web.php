<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SalaryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PayslipController;
use App\Http\Controllers\UserPayslipController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'can:admin-login'])->name('admin.')->prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::middleware('can:admin-only')->group(function () {
        Route::resource('salary', SalaryController::class);
        Route::resource('users', UserController::class);

        Route::get('/payslips', [PayslipController::class, 'index'])->name('payslips.index');
        Route::get('/payslips/{salary}', [PayslipController::class, 'show'])->name('payslips.show');
        Route::get('/payslips/{salary}/download', [PayslipController::class, 'download'])->name('payslips.download');
    });

    Route::get('/assigned-salaries', [SalaryController::class, 'showAuthAssignedSalaries'])->name('auth_salaries.index');
    Route::get('/show-single-assigned-salary/{id}', [SalaryController::class, 'showSingleAssignedSalary'])->name('single_assign_salary.show');
    Route::post('/complete-salary/{id}', [SalaryController::class, 'salaryCompleteButton'])->name('complete_salary.store');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/my-payslips/{salary}/download', [UserPayslipController::class, 'download'])
        ->name('user.payslips.download');
});

require __DIR__.'/auth.php';
