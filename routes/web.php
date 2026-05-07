<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| GUEST
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {

    Route::get('/login', [UserController::class, 'showLogin'])->name('login');
    Route::post('/login', [UserController::class, 'login']);

    Route::get('/register', [UserController::class, 'showRegister'])->name('register');
    Route::post('/register', [UserController::class, 'register']);
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    /*
    |-----------------------
    | TASKS ROUTE
    |-----------------------
    */
    Route::prefix('tasks')->name('tasks.')->group(function () {

    Route::get('/', [TodoController::class, 'index'])->name('index');
    Route::post('/', [TodoController::class, 'store'])->name('store');

    Route::get('/history', [TodoController::class, 'history'])->name('history');

    Route::get('/{id}', [TodoController::class, 'show'])
        ->where('id', '[0-9]+')
        ->name('show');

    Route::get('/{id}/edit', [TodoController::class, 'edit'])
        ->where('id', '[0-9]+')
        ->name('edit');

    Route::put('/{id}', [TodoController::class, 'update'])
        ->where('id', '[0-9]+')
        ->name('update');

    // ✅ INI YANG KAMU LUPA
    Route::patch('/{id}/toggle', [TodoController::class, 'toggle'])
        ->where('id', '[0-9]+')
        ->name('toggle');

    Route::delete('/{id}', [TodoController::class, 'destroy'])
        ->where('id', '[0-9]+')
        ->name('destroy');
});

    // LOGOUT
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});