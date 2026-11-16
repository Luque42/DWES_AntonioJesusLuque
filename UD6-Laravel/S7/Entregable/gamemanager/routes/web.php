<?php

use App\Http\Controllers\DesarrolladoraController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\VideojuegoController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/videojuegos');
Route::resource('videojuegos', VideojuegoController::class);
Route::resource('desarrolladoras', DesarrolladoraController::class)->except(['show']);
Route::get('/generos/{genero}', [GeneroController::class, 'show'])->name('generos.show');
