<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

// Vista principal
Route::get('/', fn() => view('principal'));

// Formulario de registro
Route::get('/crear-cuenta', [RegisterController::class, 'index'])->name('register');
// Procesar el registro y crear el usuario en la Base de Datos
Route::post('/crear-cuenta', [RegisterController::class, 'store'])->name('register.store'); // Al crear el usuario lo manda al Muro

// Mostrar formulario de login
Route::get('/login', [LoginController::class, 'index'])->name('login');
// Procesar las credenciales del usuario e iniciar sesión
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

// Procesar la petición de cierre de sesión del usuario autenticado
Route::post('/logout', [LogoutController::class, 'store'])->name('logout'); 

// Mostrar el muro (solo usuarios autenticados)
Route::get('/{user:username}', [PostController::class, 'index'])->middleware('auth')->name('profile.index'); //Anteriormente posts.index