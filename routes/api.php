<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LivroController;

Route::get('/user', function (Request $request) {
    return $request->user();
});

// AUTORES
Route::get('/autores', [AutorController::class, 'index']);
Route::post('/autores', [AutorController::class, 'store']);
Route::get('/autores/{id}', [AutorController::class, 'show']);
Route::put('/autores/{id}', [AutorController::class, 'update']);
Route::delete('/autores/{id}', [AutorController::class, 'destroy']);

// CATEGORIAS
Route::get('/categorias', [CategoriaController::class, 'index']);
Route::post('/categorias', [CategoriaController::class, 'store']);
Route::get('/categorias/{id}', [CategoriaController::class, 'show']);
Route::put('/categorias/{id}', [CategoriaController::class, 'update']);
Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy']);

// LIVROS
Route::get('/livros', [LivroController::class, 'index']);
Route::post('/livros', [LivroController::class, 'store']);
Route::get('/livros/{id}', [LivroController::class, 'show']);
Route::put('/livros/{id}', [LivroController::class, 'update']);
Route::delete('/livros/{id}', [LivroController::class, 'destroy']);