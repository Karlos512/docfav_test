<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/index', [UsuarioController::class, "index"])->name("index");

Route::get('/guardarUsuario', [UsuarioController::class, "guardarUsuario"])->name("guardarUsuario");

Route::get('/guardarCambios', [UsuarioController::class, "guardarCambios"])->name("guardarCambios");

Route::get('/listar-usuarios', [UsuarioController::class, 'listarusuarios'])->name('listar-usuarios');

Route::delete('/{id}/EliminarUsuario', [UsuarioController::class, 'EliminarUsuario'])->name('EliminarUsuario');

Route::post('/{id}/editarusuario', [UsuarioController::class, 'editarusuario'])->name('editarusuario');
