<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Informacion;

class InformacionController extends Controller
{
    public function informacion()
    {
        return Informacion::all();
    }

    public function store(Request $request)
    {
        $informacion = new Informacion;
        $informacion ->TITULO=$request->TITULO;
        $informacion ->NOMBREFOTO=$request->NOMBREFOTO;
        $informacion->save();
        return $informacion;
    }

    public function eliminar($id){
        $informacion = Informacion::where("TITULO",$id);
        $informacion->delete();
        return "borro";
    }
}
