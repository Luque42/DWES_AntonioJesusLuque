<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;

Route::resource('productos', ProductoController::class);
Route::redirect('/', '/usuarios');
Route::resource('usuarios', UserController::class)->parameters(['usuarios' => 'user']);

Route::get('/productos', [ProductoController::class, 'index'])
    ->name('productos.index');

Route::get('/productos/crear', [ProductoController::class, 'create'])
    ->name('productos.create');

Route::post('/productos', [ProductoController::class, 'store'])
    ->name('productos.store');

Route::get('/', function () {
    return view('welcome');
});
