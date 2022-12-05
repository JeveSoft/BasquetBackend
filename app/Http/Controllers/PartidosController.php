<?php

namespace App\Http\Controllers;

use App\Models\Partidos;
use App\Models\Ganador;
use Illuminate\Http\Request;

class PartidosController extends Controller
{
    public function octavos($id)
    {
        $ganadores = Partidos::whereNotNull("GANADOR")-> where("IDCATEGORIA",$id)->where("GRUPO","Grupo A ".$id)->pluck('GANADOR');
        $listadoA = array();
        $listadoB = array();
        $listado = array();
        $i=0;
        while($i<count($ganadores)){
            $ganador = new Ganador();
            $equipo1 = Partidos::where("EQUIPO1",$ganadores[$i])->whereNotNull("GANADOR")-> where("IDCATEGORIA",$id)->count();
            if ($equipo1 > 0){
                $puntacion=Partidos::where("EQUIPO1",$ganadores[$i])->whereNotNull("GANADOR")-> where("IDCATEGORIA",$id)->pluck('ANOTACIONESEQ1');
                $ganador->ANOTACIONES=$puntacion;
            }else{
                $puntacion=Partidos::where("EQUIPO2",$ganadores[$i])->whereNotNull("GANADOR")-> where("IDCATEGORIA",$id)->pluck('ANOTACIONESEQ2');
                $ganador->ANOTACIONES=$puntacion;
            }
            $ganador->GANADOR=$ganadores[$i];
            array_push($listadoA,$ganador);
            $i++;
        }

        $ganadores = Partidos::whereNotNull("GANADOR")-> where("IDCATEGORIA",$id)->where("GRUPO","Grupo B ".$id)->pluck('GANADOR');
        $listado = array();
        $i=0;
        while($i<count($ganadores)){
            $ganador = new Ganador();
            $equipo1 = Partidos::where("EQUIPO1",$ganadores[$i])->whereNotNull("GANADOR")-> where("IDCATEGORIA",$id)->count();
            if ($equipo1 > 0){
                $puntacion=Partidos::where("EQUIPO1",$ganadores[$i])->whereNotNull("GANADOR")-> where("IDCATEGORIA",$id)->pluck('ANOTACIONESEQ1');
                $ganador->ANOTACIONES=$puntacion;
            }else{
                $puntacion=Partidos::where("EQUIPO2",$ganadores[$i])->whereNotNull("GANADOR")-> where("IDCATEGORIA",$id)->pluck('ANOTACIONESEQ2');
                $ganador->ANOTACIONES=$puntacion;
            }
            $ganador->GANADOR=$ganadores[$i];
            array_push($listadoB,$ganador);
            $i++;
        }
        array_push($listado,$listadoA);
        array_push($listado,$listadoB);
        return $listado;
    }

    public function obtenerPartido ($id)
    {
        $i = 0;
        $termino = 1;
        $categoria = "";
        //categoria
        while($termino == 1){
            if ($id[$i] != "*"){
                $categoria = $categoria.$id[$i];
            }else{
                $termino=0;
            }
            $i++;
        }
        //dia
        $termino=1;
        $dia = "";
        while($termino == 1){
            if ($id[$i] != "*"){
                $dia = $dia.$id[$i];
            }else{
                $termino=0;
            }
            $i++;
        }
        //hora
        $termino=1;
        $hora = "";
        while($i < strlen($id)){
            $hora = $hora.$id[$i];
            $i++;
        }

        return Partidos:: where("IDCATEGORIA",$categoria)->where("DIA",$dia)->where("HORA",$hora)-> get();
    }

    public function obtenerPartidos()
    {
        return Partidos::all();
    }

    public function actualizarDatos(Request $request,$id)
    {
        $partidos = Partidos::findOrFail($id);
        $partidos->EQUIPO1 = $request->EQUIPO1;
        $partidos->EQUIPO2 = $request->EQUIPO2;
        $partidos->GANADOR =$request->GANADOR;
        $partidos->PERDEDOR = $request->PERDEDOR;
        $partidos->EMPATE =$request->EMPATE;
        $partidos->ANOTACIONESEQ1 = $request->ANOTACIONESEQ1;
        $partidos->ANOTACIONESEQ2 = $request->ANOTACIONESEQ2;
        $partidos->save();
        return $partidos;
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
