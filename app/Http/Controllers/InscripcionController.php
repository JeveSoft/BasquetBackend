<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;

class InscripcionController extends Controller
{
    public function store(Request $request)
    {
        $inscripcion = new Inscripcion;
        $inscripcion ->IDINSCRIPCION=$request->IDINSCRIPCION;
        $inscripcion->IDEQUIPO = $request->IDEQUIPO;
        $inscripcion->COMPROBANTEPAGO = $request->COMPROBANTEPAGO;
        $inscripcion->PAGOMEDIO =$request->PAGOMEDIO;
        $inscripcion->COMPROBANTEMEDIO = $request->COMPROBANTEMEDIO;
        $inscripcion->HABILITADO =$request->HABILITADO;
        $inscripcion->HABILITADOSIN =$request->HABILITADOSIN;
        $inscripcion->save();
        return $inscripcion;
    }
}
