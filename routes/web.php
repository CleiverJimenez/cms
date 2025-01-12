<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PostController;

// Ruta principal (Home)
Route::get('/', function () {
    return view('welcome'); // Esto carga la vista welcome.blade.php
})->name('home');

// Rutas de autenticación
Auth::routes();

// Ruta adicional para /home (si lo necesitas para otra funcionalidad)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

// Rutas de autenticación específicas
Route::get('register', [RegisterController::class, 'showForm'])->name('register');
Route::post('register', [RegisterController::class, 'store']);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

// Ruta para crear una publicación (solo accesible para admin y moderator)
Route::middleware('auth', 'role:admin|moderator')->get('/crear-publicacion', function () {
    return view('post.post'); // Vista para crear publicación
})->name('post');

// Ruta para almacenar nuevas publicaciones (solo accesible para admin y moderator)
Route::middleware('auth', 'role:admin|moderator')->post('/publicaciones', [PostController::class, 'store'])->name('publicaciones.store');

// Ruta para ver todas las publicaciones del usuario logueado
Route::middleware('auth')->get('/publicaciones', [PostController::class, 'index'])->name('publicaciones.index');

// Ruta para ver una publicación en particular (accesible para todos los usuarios)
Route::get('/publicaciones/{id}', [PostController::class, 'show'])->name('publicaciones.show');

// Ruta para editar una publicación (solo accesible para admin y moderator)
Route::middleware('auth', 'role:admin|moderator')->get('/publicaciones/{id}/editar', [PostController::class, 'edit'])->name('publicaciones.edit');
Route::middleware('auth', 'role:admin|moderator')->put('/publicaciones/{id}', [PostController::class, 'update'])->name('publicaciones.update');

// Ruta para eliminar una publicación (solo accesible para admin y moderator)
Route::middleware('auth', 'role:admin|moderator')->delete('/publicaciones/{id}', [PostController::class, 'destroy'])->name('publicaciones.destroy');

// Ruta para la vista de todas las publicaciones del usuario (si es diferente de index)
Route::get('postview', [PostController::class, 'postView'])->name('postview');
