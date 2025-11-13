<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ZoneController;

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

// 📘 Guía y reglas
Route::view('/guide', 'pages.guide')->name('guide');
Route::view('/rules', 'pages.rules')->name('rules');

// 🔐 Autenticación
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// 👤 Rutas protegidas (usuarios autenticados)
Route::middleware(['auth'])->group(function () {

    // Dashboard de usuario
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // 🎲 Juegos (lobby y partidas)
    Route::get('/games', [GameController::class, 'index'])->name('games.index');
    Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
    Route::post('/games', [GameController::class, 'store'])->name('games.store');
    Route::get('/games/{game}', [GameController::class, 'show'])->name('games.show');
    Route::get('/games/{game}/results', [GameController::class, 'results'])->name('games.results');
    Route::post('/games/{game}/finish', [GameController::class, 'finish'])->name('games.finish');
    Route::post('/games/{game}/zones/{zone}/add', [ZoneController::class, 'addDinosaur'])->name('zones.add');

    // Zonas 
    Route::post('/games/{game}/zones/{zone}/add', [ZoneController::class, 'addDinosaur'])->name('zones.add');
    Route::post('/games/{game}/finish-turn', [ZoneController::class, 'finishTurn'])->name('zones.finishTurn');
});

// 🛠️ Panel de administración
Route::middleware('admin')->group(function () {
    Route::get('/users', [AdminController::class, 'index'])->name('users');
    Route::delete('/users/{id}', [AdminController::class, 'destroy'])->name('users.delete');
    Route::post('/users/{id}/role', [AdminController::class, 'updateRole'])->name('users.updateRole');
});

// 🧮 Puntuaciones
Route::view('/score', 'game.score')->name('score');
Route::get('/api/scores', [ScoreController::class, 'index']);
Route::post('/api/scores', [ScoreController::class, 'store']);

