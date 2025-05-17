<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentController;
use App\Http\Middleware\IsAdmin;

Route::get('/', [DashboardController::class, 'home']);
Route::get('/register', [FormController::class, 'register']);
Route::post('/welcome', [FormController::class, 'kirim']);

Route::get('/master', function () {
    return view('layouts.master');
});

Route::middleware(['auth', IsAdmin::class])->group(function () {
    // CREATE DATA
    Route::get('/genres/create', [GenresController::class, 'create']);
    Route::post('/genres', [GenresController::class, 'store']);

    // UPDATE DATA
    Route::get('/genres/{id}/edit', [GenresController::class, 'edit']);
    Route::put('/genres/{id}', [GenresController::class, 'update']);

    // DELETE DATA
    Route::delete('/genres/{id}', [GenresController::class, 'destroy']);

});
// LogOut
Route::post('/logout', [AuthController::class, 'logoutUser'])->middleware('auth');

// Profile
Route::get('/profile', [AuthController::class, 'getProfile'])->middleware('auth');
Route::post('/profile', [AuthController::class, 'createProfile'])->middleware('auth');
Route::put('/profile/{id}', [AuthController::class, 'updateProfile'])->middleware('auth');

Route::post('/comments/{posts_id}', [CommentController::class, 'store'])->middleware('auth');

// CRUD GENRES
// READ DATA
Route::get('/genres', [GenresController::class, 'index']);
Route::get('/genres/{id}', [GenresController::class, 'show']);

// CRUD POST
Route::resource('posts', PostController::class);

// Auth
// Register
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'registerUser']);
// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'loginUser']);
