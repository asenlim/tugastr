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
    | TASKS CRUD
    */
    Route::prefix('tasks')->name('tasks.')->group(function () {

        Route::get('/', [TodoController::class, 'index'])->name('index');        // READ
        Route::post('/', [TodoController::class, 'store'])->name('store');       // CREATE

        Route::get('/{id}', [TodoController::class, 'show'])->name('show');      // DETAIL
        Route::get('/{id}/edit', [TodoController::class, 'edit'])->name('edit'); // EDIT
        Route::put('/{id}', [TodoController::class, 'update'])->name('update');  // UPDATE
        Route::delete('/{id}', [TodoController::class, 'destroy'])->name('destroy'); // DELETE
    });

    // LOGOUT
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});