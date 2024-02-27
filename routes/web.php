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

Route::get('/canciones/{cancion}/añadir-artista', [CancionController::class, 'añadirArtista'])->name('canciones.añadirArtista');
Route::get('/canciones/{cancion}/añadir-album', [CancionController::class, 'añadirAlbum'])->name('canciones.añadirAlbum');
Route::put('/canciones/{cancion}/añadir-artista/guardar', [CancionController::class, 'guardarArtista'])->name('canciones.guardarArtista');
Route::put('/canciones/{cancion}/añadir-album/guardar', [CancionController::class, 'guardarAlbum'])->name('canciones.guardarAlbum');

Route::view('/', 'busqueda.barra')->middleware("auth");

Route::get('/resultados', [BusquedaController::class, 'resultados'])->name('busqueda.resultados');

require __DIR__.'/auth.php';
