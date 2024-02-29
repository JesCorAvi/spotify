<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\BusquedaController;
use App\Http\Controllers\CancionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::resource('albumes', AlbumController::class)->parameters(['albumes' => 'album'])->middleware("auth");
Route::resource('canciones', CancionController::class)->parameters(['canciones' => 'cancion'])->middleware("auth");
Route::resource('artistas', ArtistaController::class)->middleware("auth");

Route::view('/', 'busqueda.barra')->middleware("auth");

Route::get('/resultados', [BusquedaController::class, 'resultados'])->name('busqueda.resultados');

Route::get('/resultados', [BusquedaController::class, 'resultados'])->name('busqueda.resultados');
Route::get('/resultados', [BusquedaController::class, 'resultados'])->name('busqueda.resultados');

Route::get('/cancioncrear', [CancionController::class, 'crear'])->name('canciones.crear');
Route::get('/cancioneditar', [CancionController::class, 'editar'])->name('canciones.editar');


require __DIR__.'/auth.php';
