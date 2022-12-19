<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/* Route::get("delegados",[App\Http\Controllers\DelegadoController::class,'index']);
Route::get("delegados/{delegado}",[App\Http\Controllers\DelegadoController::class,'show']);

Route::delete("delegados/{delegado}",[App\Http\Controllers\DelegadoController::class,'destroy']);

Route::post("delegados",[App\Http\Controllers\DelegadoController::class,'store']);

Route::put("delegados/{delegado}",[App\Http\Controllers\DelegadoController::class,'update ']); */

Route::apiResource('delegados',\App\Http\Controllers\DelegadoController::class);

Route::post("registro", [ \App\Http\Controllers\RegistroController::class, "store"]);

/* Login */
Route::post("login",[ \App\Http\Controllers\UserController::class, "login"] );

/* Campeonato */
Route::apiResource('campeonato',\App\Http\Controllers\CampeonatoController::class);

Route::put("pagoMedio/{id}", [ \App\Http\Controllers\CampeonatoController::class, "pagoMedio"]);

Route::get('/obtenerFinal/{id}', [\App\Http\Controllers\PartidosController::class,"obtenerFinal"]);

Route::get('/hayFinal/{id}', [\App\Http\Controllers\PartidosController::class,"hayFinal"]);

Route::get('/obtenerPuntos/{id}', [\App\Http\Controllers\EquipoController::class,"obtenerPuntos"]);

Route::get('/obtenerEntrenador/{id}', [\App\Http\Controllers\EquipoController::class,"obtenerEntrenador"]);


Route::put('/subirPuntos/{id}', [\App\Http\Controllers\EquipoController::class,"subirPuntos"]);

Route::put('/actualizarPartido/{id}', [\App\Http\Controllers\PartidosController::class,"actualizarDatos"]);

Route::put('/actualizarPartidoPuntos/{id}', [\App\Http\Controllers\PartidosController::class,"actualizarPartido"]);


Route::put('/acutalizarFechas/{id}', [\App\Http\Controllers\CampeonatoController::class,"updateFechas"]);
Route::put('/acutalizarPagos/{id}', [\App\Http\Controllers\CampeonatoController::class,"updatePagos"]);
Route::put('/habilitarSinJugador/{id}', [\App\Http\Controllers\InscripcionController::class,"habilitarSinJugador"]);


Route::put('/eliminarEquipo/{id}',[\App\Http\Controllers\InscripcionController::class,"eliminarEquipo"]);

Route::delete('/eliminarCategoria/{id}',[\App\Http\Controllers\CategoriaController::class,"eliminar"]);
Route::delete('/eliminarArbitro/{id}',[\App\Http\Controllers\ArbitroController::class,"eliminar"]);
Route::delete('/eliminarFoto/{id}',[\App\Http\Controllers\InformacionController::class,"eliminar"]);

Route::get('/',function(){
    return "holamundo";
});

Route::put("pagcomprobantePagooCompleto/{id}", [ \App\Http\Controllers\CampeonatoController::class, "comprobantePago"]);

Route::get('/import-users',[UserController::class,'importUsers'])->name('import');
//Route::post('/upload-users',[UserController::class,'uploadUsers'])->name('upload');
Route::post('/upload-users', [App\Http\Controllers\UserController::class,"uploadUsers"])->name('upload');
/* Delegado Jugador */
Route::post('/comprobantePagoMedio/{id}',[App\Http\Controllers\InscripcionController::class,"comprobantePagoMedio"]);
Route::post('/addJugadoresExcel/{idEquipo}',[App\Http\Controllers\JugadorController::class,"addJugadoresExcel"]);
Route::get('/equipos/{categoria}', [App\Http\Controllers\EquipoController::class,"obtenerEquipos"]);
Route::get('/estadoInscripcion/{idDelegado}', [App\Http\Controllers\DelegadoController::class,"estadoInscripcion"]);
Route::put('/actualizarDelegado/{id}', [App\Http\Controllers\DelegadoController::class,"update"]);
Route::post('/agregarJugador', [App\Http\Controllers\JugadorController::class,"store"]);
Route::get('/obtenerJugadores', [App\Http\Controllers\JugadorController::class,"show"]);
Route::post('/setImgCi/{id}', [App\Http\Controllers\JugadorController::class,"setImgCi"]);
Route::post('/setImgJugador/{id}', [App\Http\Controllers\JugadorController::class,"setImgJugador"]);
Route::put('/actualizarJugador/{ci}', [App\Http\Controllers\JugadorController::class,"actualizarJugador"]);
Route::delete('/eliminarJugador/{ci}', [App\Http\Controllers\JugadorController::class,"eliminarJugador"]);

Route::get('/obtenerJugadores/{idEquipo}', [App\Http\Controllers\JugadorController::class,"obtenerJugadores"]);
Route::post('/pagoMedio/{idCam}', [App\Http\Controllers\CampeonatoController::class,"pagoMedio"]);
Route::post('/pagoCompleto/{idCam}', [App\Http\Controllers\CampeonatoController::class,"pagoCompleto"]);
Route::post('/comprobantePago/{idEq}', [App\Http\Controllers\InscripcionController::class,"comprobantePago"]);
Route::post('/agregarLogo/{idEq}', [App\Http\Controllers\EquipoController::class,"agregarLogo"]);
Route::delete('/eliminarJugadores/{idEq}', [App\Http\Controllers\JugadorController::class,"eliminarJugadores"]);
Route::post('/agregarFotoInfo', [App\Http\Controllers\InformacionController::class,"agregarFotoInfo"]);
Route::get('/obtenerJugadoresQr/{idE}', [App\Http\Controllers\JugadorController::class,"obtenerJugadoresQr"]);
Route::post('/agregarReglamento/{idC}', [App\Http\Controllers\CampeonatoController::class,"agregarReglamento"]);