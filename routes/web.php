<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController; // Agregamos el controlador de login

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Ruta principal
Route::get('/', function () {
    return view('welcome');
});

// Ruta para mostrar el login
Route::get('/login', function () {
    return view('login');
})->name('login');

// Ruta para procesar el formulario de login
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
