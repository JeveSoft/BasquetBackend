<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;


class CategoriaController extends Controller
{
    public function show (){
        return Categoria::all();
    }

    public function eliminar($id){
        return Categoria::destroy($id);
    }

    public function store(Request $request)
    {
        $categoria = new Categoria;
        $categoria ->NOMBRECATEGORIA=$request->NOMBRECATEGORIA;
        $categoria ->EDADMIN=$request->EDADMIN;
        $categoria->EDADMAX = $request->EDADMAX;
        $categoria->save();
        return $categoria;
    }
}
