<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'can:admin-login'])->name('admin.')->prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::middleware('can:admin-only')->group(function () {
        Route::resource('categories', CategoryController::class);
        Route::resource('tasks', TaskController::class);
        Route::resource('users', UserController::class);
    });

    Route::get('/assigned-tasks', [TaskController::class, 'showAuthAssignedTasks'])->name('auth_tasks.index');
    Route::get('/show-single-assigned-task/{id}', [TaskController::class, 'showSingleAssignedTask'])->name('single_assign_task.show');
    Route::post('/complete-task/{id}', [TaskController::class, 'taskCompleteButton'])->name('complete_task.store');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
