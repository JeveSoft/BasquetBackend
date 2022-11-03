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
Route::post('/añadirEquipo',"App\Http\Controllers\EquipoController@store");
Route::post('/añadirInscripcion',"App\Http\Controllers\InscripcionController@store");
Route::post('/añadirCampeonato',"App\Http\Controllers\CampeonatoController@store");


Route::get('/administrador/{id}', "App\Http\Controllers\AdministradorController@obtenerAdministrador");
Route::get('/delegado/{id}', "App\Http\Controllers\DelegadoController@obtenerDelegado");
Route::put('/acutalizarFechas/{id}', "App\Http\Controllers\CampeonatoController@updateFechas");


Route::get('/',function(){
    return "holamundo";
});


