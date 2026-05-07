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

        // LIST + CREATE
        Route::get('/', [TodoController::class, 'index'])->name('index');
        Route::post('/', [TodoController::class, 'store'])->name('store');

        // HISTORY (HARUS DI ATAS biar gak ketabrak {id})
        Route::get('/history', [TodoController::class, 'history'])->name('history');

        // SHOW DETAIL (HANYA ANGKA BIAR AMAN)
        Route::get('/{id}', [TodoController::class, 'show'])
            ->where('id', '[0-9]+')
            ->name('show');

        // EDIT
        Route::get('/{id}/edit', [TodoController::class, 'edit'])
            ->where('id', '[0-9]+')
            ->name('edit');

        // UPDATE
        Route::put('/{id}', [TodoController::class, 'update'])
            ->where('id', '[0-9]+')
            ->name('update');

        // DELETE
        Route::delete('/{id}', [TodoController::class, 'destroy'])
            ->where('id', '[0-9]+')
            ->name('destroy');
    });

    // LOGOUT
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});