<?php

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
*/
Route::get('/todosCampeonatos', "App\Http\Controllers\CampeonatoController@mostrar");

Route::post('/añadirDelegado',"App\Http\Controllers\DelegadoController@store");
Route::post('/añadirArbitro',"App\Http\Controllers\ArbitroController@store");
Route::post('/añadirEquipo',"App\Http\Controllers\EquipoController@store");
Route::post('/añadirInscripcion',"App\Http\Controllers\InscripcionController@store");
Route::post('/añadirCampeonato',"App\Http\Controllers\CampeonatoController@store");
Route::post('/añadirCategoria',"App\Http\Controllers\CategoriaController@store");
Route::post('/añadirInformacion',"App\Http\Controllers\InformacionController@store");
Route::post('/añadirPartido',"App\Http\Controllers\PartidosController@store");

Route::get('/nombreCategorias', "App\Http\Controllers\CategoriaController@obtenerNombreCategoria");

Route::get('/obtenercategoriafixture/{id}', "App\Http\Controllers\PartidosController@obtenerCategoria");
Route::get('/partidos', "App\Http\Controllers\PartidosController@obtenerPartidos");
Route::get('/arbitro/{id}', "App\Http\Controllers\ArbitroController@obtenerArbitro");
Route::get('/arbitros', "App\Http\Controllers\ArbitroController@show");
Route::get('/obtenerEquipo/{id}', "App\Http\Controllers\EquipoController@obtenerEquipo");
Route::get('/habilitadoSin', "App\Http\Controllers\InscripcionController@obtenerHabilitadoSin");
Route::get('/habilitado', "App\Http\Controllers\InscripcionController@obtenerHabilitado");
Route::get('/porCategoria/{id}', "App\Http\Controllers\InscripcionController@obtenerCategoria");
Route::get('/medioPago', "App\Http\Controllers\InscripcionController@obtenerMedioPago");
Route::get('/pagoCompleto', "App\Http\Controllers\InscripcionController@obtenerPagoCompleto");
Route::get('/categorias', "App\Http\Controllers\CategoriaController@show");
Route::get('/existeCategoria/{id}', "App\Http\Controllers\CategoriaController@existe");
Route::get('/administrador/{id}', "App\Http\Controllers\AdministradorController@obtenerAdministrador");
Route::get('/delegado/{id}', "App\Http\Controllers\DelegadoController@obtenerDelegado");
Route::get('/delegadoNombre/{id}', "App\Http\Controllers\DelegadoController@obtenerNombreDelegado");
Route::get('/obtenerEquipo/{id}', "App\Http\Controllers\EquipoController@obtenerEquipo");
Route::get('/informacion', "App\Http\Controllers\InformacionController@informacion");


Route::put('/acutalizarFechas/{id}', "App\Http\Controllers\CampeonatoController@updateFechas");
Route::put('/acutalizarPagos/{id}', "App\Http\Controllers\CampeonatoController@updatePagos");
Route::put('/habilitarSinJugador/{id}', "App\Http\Controllers\InscripcionController@habilitarSinJugador");

Route::delete('/eliminarCategoria/{id}',"App\Http\Controllers\CategoriaController@eliminar");
Route::delete('/eliminarArbitro/{id}',"App\Http\Controllers\ArbitroController@eliminar");
Route::delete('/eliminarFoto/{id}',"App\Http\Controllers\InformacionController@eliminar");

Route::get('/',function(){
    return "holamundo";
});


Route::get('/import-users',[UserController::class,'importUsers'])->name('import');
//Route::post('/upload-users',[UserController::class,'uploadUsers'])->name('upload');
Route::post('/upload-users', "App\Http\Controllers\UserController@uploadUsers")->name('upload');
/* Delegado Jugador */
Route::post('/comprobantePagoMedio/{id}',"App\Http\Controllers\InscripcionController@comprobantePagoMedio");
Route::post('/addJugadoresExcel/{id}',"App\Http\Controllers\DelegadoController@addJugadoresExcel");
Route::get('/equipos/{categoria}', "App\Http\Controllers\EquipoController@show");
Route::get('/estadoInscripcion/{idDelegado}', "App\Http\Controllers\DelegadoController@estadoInscripcion");
Route::put('/actualizarDelegado/{id}', "App\Http\Controllers\DelegadoController@update");
Route::post('/agregarJugador', "App\Http\Controllers\JugadorController@store");
Route::get('/obtenerJugadores', "App\Http\Controllers\JugadorController@show");
Route::post('/setImgCi/{id}', "App\Http\Controllers\JugadorController@setImgCi");
Route::post('/setImgJugador/{id}', "App\Http\Controllers\JugadorController@setImgJugador");
Route::put('/actualizarJugador/{ci}', "App\Http\Controllers\JugadorController@actualizarJugador");
Route::delete('/eliminarJugador/{ci}', "App\Http\Controllers\JugadorController@eliminarJugador");