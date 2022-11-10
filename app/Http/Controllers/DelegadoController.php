<?php

namespace App\Http\Controllers;

use App\Models\Delegado;
use Illuminate\Http\Request;

class DelegadoController extends Controller
{
    public function obtenerDelegado($id)
    {
        return Delegado::where("IDDELEGADO",$id)->get();
    }

    public function obtenerNombreDelegado($id)
    {
        return Delegado::where("CI",$id)->get();
    }

    public function store(Request $request)
    {
        $delegado = new Delegado;
        $delegado ->IDDELEGADO=$request->IDDELEGADO;
        $delegado ->NOMBRE=$request->NOMBRE;
        $delegado->CI = $request->CI;
        $delegado->EMAIL = $request->EMAIL;
        $delegado->CELULAR =$request->CELULAR;
        $delegado->FECHANACIMIENTO = $request->FECHANACIMIENTO;
        $delegado->NACIONALIDAD =$request->NACIONALIDAD;
        $delegado->GENERO = $request->GENERO;
        $delegado->CONTRASENA = $request->CONTRASENA;
        $delegado->save();
        return $delegado;
    }
}
