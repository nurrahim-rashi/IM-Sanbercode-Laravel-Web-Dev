<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GenreController;


Route::get('/', [DashboardController::class, 'index']);
Route::get('/register', [FormController::class, 'register'])->name('register');
Route::get('/welcome', [FormController::class, 'welcome']);

Route::get('/master', function () {
    return view('home');
});

Route::get('/genres/create', [GenreController::class, 'create']);
Route::post('/genres', [GenreController::class, 'store']);
Route::get('/genres', [GenreController::class, 'index']);
Route::get('/genres/{id}', [GenreController::class, 'show']);
Route::get('/genres/{id}/edit', [GenreController::class, 'edit']);
Route::put('/genres/{id}', [GenreController::class, 'update']);
Route::delete('/genres/{id}', [GenreController::class, 'destroy']);
