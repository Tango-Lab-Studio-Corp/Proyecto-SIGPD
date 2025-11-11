<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🏠 Página principal
Route::get('/', function () {
    $user = auth()->user();
    return view('pages.home', compact('user'));
})->name('home');


// 🔐 Autenticación
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// routes/web.php
Route::get('/guide', function () {
    return view('pages.guide');
})->name('guide');

Route::get('/rules', function () {
    return view('pages.rules');
})->name('rules');

// Si ya tenés el juego:
Route::get('/juego', [JuegoController::class, 'index'])->name('juego');

// 👤 Rutas protegidas (solo usuarios logueados)
Route::middleware(['auth'])->group(function () {

    // Dashboard de usuario
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


// 🛠️ Panel de administración (solo admins)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/users', [AdminController::class, 'index'])->name('users');
    Route::delete('/users/{id}', [AdminController::class, 'destroy'])->name('users.delete');
    Route::post('/users/{id}/role', [AdminController::class, 'updateRole'])->name('users.updateRole');
});


// 🎮 Sistema de puntuaciones (ejemplo)
Route::get('/score', fn() => view('game.score'))->name('score');
Route::get('/api/scores', [ScoreController::class, 'index']);
Route::post('/api/scores', [ScoreController::class, 'store']);
