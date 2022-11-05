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

public function comprobantePago(Request $request, $id){
    $inscripcion = Inscripcion::find($id);
    $inscripcion->COMPROBANTEPAGO = $this->cargarImagen($request->imagen,$id);
    $inscripcion->save();
    return \response()->json(["res"=> true, "message"=>"imagen cargada"]);
}

public function comprobantePagoMedio(Request $request, $id){
    $inscripcion = Inscripcion::find($id);
    $inscripcion->PAGOCOMPLETO = $this->cargarImagen($request->imagen,$id);
    $producto->save();
    return \response()->json(["res"=> true, "message"=>"imagen cargada"]);
 }

private function cargarImagen($file, $id){
    $nombreArchivo = time() . "_{$id}." . $file->getClientOriginalExtension();
    $file->move(\public_path("imagenes/comprobantePago"), $nombreArchivo);
    return $nombreArchivo;
}
}