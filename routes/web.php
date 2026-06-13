<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

// Vista principal
Route::get('/', fn() => view('principal'));

// Formulario de registro
Route::get('/crear-cuenta', [RegisterController::class, 'index'])->name('register');
// Guardar nuevo usuario
Route::post('/crear-cuenta', [RegisterController::class, 'store'])->name('register');


Route::get('/muro', [PostController::class, 'index'])->name('posts.index');