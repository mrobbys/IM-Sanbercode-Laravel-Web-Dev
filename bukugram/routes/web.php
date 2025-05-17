<?php

use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'home']);

Route::get('/master', function () {
    return view('layouts.master');
});

// Route Admin
Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::resource('genres', GenresController::class)->except(['index', 'show']);
    Route::resource('books', BooksController::class)->except(['index', 'show']);
});

// Route Public 
Route::get('/books', [BooksController::class, 'index'])->name('books.index');
Route::get('/books/{id}', [BooksController::class, 'show'])->name('books.show');
Route::get('/genres', [GenresController::class, 'index'])->name('genres.index');
Route::get('/genres/{id}', [GenresController::class, 'show'])->name('genres.show');

// Route Login & Register
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'registerUser']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'loginUser']);

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logoutUser']);

    Route::get('/profile', [AuthController::class, 'getProfile']);
    Route::post('/profile', [AuthController::class, 'createProfile']);
    Route::put('/profile/{id}', [AuthController::class, 'updateProfile']);

    Route::post('/comments/{posts_id}', [CommentsController::class, 'store']);
});
