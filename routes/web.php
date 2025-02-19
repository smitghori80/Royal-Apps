<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;


Route::get('login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('login', [AuthController::class, 'loginFormSubmit'])->name('login.form.submit');

Route::middleware(['authentication'])->group(function () {
    Route::get('/', [AuthorController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [AuthorController::class, 'index'])->name('dashboard');
    Route::get('/author/view/{id}', [AuthorController::class, 'view'])->name('author.view');
    Route::delete('/author/delete/{id}', [AuthorController::class, 'delete'])->name('author.delete');
    Route::get('/author/create', [AuthorController::class, 'create'])->name('author.create');
    Route::post('/author/store', [AuthorController::class, 'store'])->name('author.store');
    Route::get('/book', [BookController::class, 'index'])->name('book.create');
    Route::post('/book', [BookController::class, 'store'])->name('book.store');
    Route::delete('/book/delete/{id}', [BookController::class, 'delete'])->name('book.delete');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
