<?php

namespace App\Http\Controllers;

use App\Models\Partidos;
use Illuminate\Http\Request;

class PartidosController extends Controller
{
    public function obtenerPartidos()
    {
        return Partidos::all();
    }

    public function obtenerCategoria ($id)
    {
        return Partidos::where("IDCATEGORIA",$id)->get();
    }

    public function store(Request $request)
    {
        $partidos = new Partidos;
        $partidos ->IDCATEGORIA=$request->IDCATEGORIA;
        $partidos ->GRUPO=$request->GRUPO;
        $partidos->EQUIPO1 = $request->EQUIPO1;
        $partidos->EQUIPO2 = $request->EQUIPO2;
        $partidos->GANADOR =$request->GANADOR;
        $partidos->PERDEDOR = $request->PERDEDOR;
        $partidos->EMPATE =$request->EMPATE;
        $partidos->ANOTACIONESEQ1 = $request->ANOTACIONESEQ1;
        $partidos->ANOTACIONESEQ2 = $request->ANOTACIONESEQ2;
        $partidos->LUGAR =$request->LUGAR;
        $partidos->HORA = $request->HORA;
        $partidos->DIA = $request->DIA;
        $partidos->save();
        return $partidos;
    }
}
