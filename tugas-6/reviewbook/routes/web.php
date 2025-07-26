<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;



// =======================
//  ADMIN ONLY
// =======================
Route::middleware(['auth'], 'IsAdmin')->group(function () {
    // Genres CRUD
    Route::get('/genres/create', [GenreController::class, 'create']);
    Route::post('/genres', [GenreController::class, 'store']);
    Route::get('/genres/{id}/edit', [GenreController::class, 'edit']);
    Route::put('/genres/{id}', [GenreController::class, 'update']);
    Route::delete('/genres/{id}', [GenreController::class, 'destroy']);

    // Books CRUD
    Route::get('/books/create', [BookController::class, 'create']);
    Route::post('/books', [BookController::class, 'store']);
    Route::get('/books/{book}/edit', [BookController::class, 'edit']);
    Route::put('/books/{book}', [BookController::class, 'update']);
    Route::delete('/books/{book}', [BookController::class, 'destroy']);
    Route::get('/users', [UserController::class, 'index']);

});

// =======================
// PUBLIC ROUTES
// =======================
Route::get('/', fn () => view('home'));
Route::get('/genres', [GenreController::class, 'index']);
Route::get('/genres/{id}', [GenreController::class, 'show']);
Route::get('/books', [BookController::class, 'index']);
Route::get('/books/{id}', [BookController::class, 'show']);

// =======================
//  GUEST ONLY ROUTES
// =======================
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// =======================
//  AUTH USER (LOGIN)
// =======================
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Comments
    Route::post('/books/{book}/comments', [CommentController::class, 'store'])->name('comments.store');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// =======================
//  FALLBACK
// =======================
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
