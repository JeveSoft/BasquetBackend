<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Arbitro;
class ArbitroController extends Controller
{
    public function store(Request $request)
    {
        $arbitro = new Arbitro;
        $arbitro ->IDARBITRO=$request->IDARBITRO;
        $arbitro ->NOMBRE=$request->NOMBRE;
        $arbitro->CI = $request->CI;
        $arbitro->EMAIL = $request->EMAIL;
        $arbitro->CELULAR =$request->CELULAR;
        $arbitro->FECHANACIMIENTO = $request->FECHANACIMIENTO;
        $arbitro->NACIONALIDAD =$request->NACIONALIDAD;
        $arbitro->GENERO = $request->GENERO;
        $arbitro->save();
        return $delegado;
    }

    public function getArbitro($id){
        $arbitro = Arbitro::findOrFail($id);
        return $arbitro; 
    }

    public function updateArbitro(Request $request, $id)
    {
        $arbitro = Arbitro::findOrFail($id);

        $arbitro ->IDARBITRO=$request->IDARBITRO;
        $arbitro ->NOMBRE=$request->NOMBRE;
        $arbitro->CI = $request->CI;
        $arbitro->EMAIL = $request->EMAIL;
        $arbitro->CELULAR =$request->CELULAR;
        $arbitro->FECHANACIMIENTO = $request->FECHANACIMIENTO;
        $arbitro->NACIONALIDAD =$request->NACIONALIDAD;
        $arbitro->GENERO = $request->GENERO;
        $arbitro->save();
        return $arbitro;
    
    }
}
