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
//Route::get('/delegados', "App\Http\Controllers\DelegadoController@show");

Route::post('/añadirDelegado',"App\Http\Controllers\DelegadoController@store");
Route::post('/añadirArbitro',"App\Http\Controllers\ArbitroController@store");
Route::post('/añadirEquipo',"App\Http\Controllers\EquipoController@store");
Route::post('/añadirInscripcion',"App\Http\Controllers\InscripcionController@store");
Route::post('/añadirCampeonato',"App\Http\Controllers\CampeonatoController@store");
Route::post('/añadirCategoria',"App\Http\Controllers\CategoriaController@store");
Route::post('/añadirInformacion',"App\Http\Controllers\InformacionController@store");

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


