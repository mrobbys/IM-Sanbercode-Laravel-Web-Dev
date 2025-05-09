<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GenresController;

Route::get('/', [DashboardController::class, 'home']);
Route::get('/register', [FormController::class, 'register']);
Route::post('/welcome', [FormController::class, 'kirim']);

Route::get('/master', function () {
    return view('layouts.master');
});

// CRUD GENRES
// CREATE DATA
Route::get('/genres/create', [GenresController::class, 'create']);
Route::post('/genres', [GenresController::class, 'store']);

// READ DATA
Route::get('/genres', [GenresController::class, 'index']);
Route::get('/genres/{id}', [GenresController::class, 'show']);

// UPDATE DATA
Route::get('/genres/{id}/edit', [GenresController::class, 'edit']);
Route::put('/genres/{id}', [GenresController::class, 'update']);

// DELETE DATA
Route::delete('/genres/{id}', [GenresController::class, 'destroy']);

