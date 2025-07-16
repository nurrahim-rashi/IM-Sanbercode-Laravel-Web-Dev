<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;

Route::get('/', [DashboardController::class, 'index']);
Route::get('/register', [FormController::class, 'register'])->name('register');
Route::get('/welcome', [FormController::class, 'welcome']);

Route::get('/master', function () {
    return view('home');
});

