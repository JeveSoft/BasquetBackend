<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{


    public function store(Request $request)
    {
        $equipo = new Equipo;
        $equipo->IDEQUIPO=$request->IDEQUIPO;
        $equipo->NOMBRE=$request->NOMBRE;
        $equipo->SIGLAS=$request->SIGLAS;
        $equipo->LOGO=$request->LOGO;
        $equipo->CANTIDAD=$request->CANTIDAD;
        $equipo->FECHACREACION=$request->FECHACREACION;
        $equipo->IDDELEGADO=$request->IDDELEGADO;
        $equipo->CATEGORIA=$request->CATEGORIA;
        $equipo->save();
        return $equipo;
    }


    public function show()
    {
        return Equipo::get();
    }

    public function obtenerEquipo($id)
    {
        return Equipo::where("NOMBRE",$id)->get();
    }
}
