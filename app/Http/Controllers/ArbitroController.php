<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Arbitro;

class ArbitroController extends Controller
{
    public function show()
    {
        return Arbitro::all();
    }

    public function eliminar($id)
    {
        $arbitro = Arbitro::where("IDARBITRO",$id);
        $arbitro->delete();
        return "borro";
    }

    public function store(Request $request)
    {
        $arbritro = new Arbitro;
        $arbritro ->IDARBITRO=$request->IDARBITRO;
        $arbritro ->NOMBRE=$request->NOMBRE;
        $arbritro->CI = $request->CI;
        $arbritro->EMAIL = $request->EMAIL;
        $arbritro->CELULAR =$request->CELULAR;
        $arbritro->FECHANACIMIENTO = $request->FECHANACIMIENTO;
        $arbritro->NACIONALIDAD =$request->NACIONALIDAD;
        $arbritro->GENERO = $request->GENERO;
        $arbritro->save();
        return $arbritro;
    }
}
