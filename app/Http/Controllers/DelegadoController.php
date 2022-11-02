<?php

namespace App\Http\Controllers;

use App\Models\Delegado;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DelegadoController extends Controller
{


    public function index(Request $request)
    {
        if(validar($request->hash)){
            $delegados = Delegado::with(['equipo:id,nombre,delegado_id,categoria_id'])->get();
            return \response()->json($delegados,200);
        }else{
            return \response()->json(["res" => false, "message" => "inicie sesion"],200);
        }

        $bandera = false;
        
       /*  for($i = 0; $i < count($delegados) && !$bandera; $i++){
            if($delegados[$i]->api_token == $request->hash){
                $bandera = true;
            }
        }
        if($bandera){
        }else{
        } */
        /*   $token = $delegado->api_token; */
        /* $delegado = Delegado::whereci($request->ci)->first();
        if( !is_null($delegado->api_token)){
        }else{
        } */
        //select * from delegado (ORM, lavavel...ELOQUENT)
        //select ^from producto inner join users on ... 
      //$delegados = Delegado::with([user:id,nombre,delgado_id,categoria])->orwhere("nombre","=","$request->txtBuscar")->get();

    }
    private function validar(){
        $delegado = Delegado::all();
       
        for($i = 0; $i < count($delegado); $i++){
            if($delegado[$i]->api_token == $hash){
                return true;
            }
        }
        return false;
    }

    public function store(Request $request)
    {
    
            $input = $request-> all();
            $delegado = Delegado::create($input);
            return \response()->json(["res" => true, "message" =>"insertado correctamente"],200);
    }



    public function show($id)
    {
        //select * from producto where id = $id
        $delegado = Delegado::find($id);
        return \response()->json($delegado,200);

    }

    public function update(Request $request, $id)
    {
        //update delegados set nombre= $request..... where id = $id;

        $input = $request->all();
        $producto = Producto::find($id);
        $producto->update($input);
    
        return \response()->json(["res" => true,"message" => "modificado correctamente"],200);
    }

    public function destroy($id)
    {
        //delete from delegados where id = $id
        try{
        Delegado::destroy($id);
        return \response()->json(["res" => true,"message" => "Eliminado correctamente"],200);
        }
        catch(\Exception $e){
            return \response()->json(["res" => false,"message" => $e->getMessage()],200);
        }
    }

    public function login(Request $request){
        $delegado = Delegado::whereEmail($request->email)->first();
        if(!is_null($delegado) && $request->password == $delegado->ci){
            $delegado->api_token = Str::random(150);
            $delegado->save();
            return \response()->json(["res" => true,"token" => $delegado->api_token, "message" => "Welcome"],200);
        }else{
            return \response()->json(["res" => false, "message" => "cuenta o password incorrecta"],200);
        }
    }

    public function logout(Request $request){
        $delegados = Delegado::all();
        $bandera = false;
        for($i = 0; $i < count($delegados) && !$bandera; $i++){
            if($delegados[$i]->api_token == $request->hash){
                $bandera = true;
                $delegados[$i]->api_token = null;
                $delegados[$i]->save();
            }
        }
        if($bandera){

            return \response()->json(["res" => true, "message" => "Adios"],200);
        }else{
            return false;
        }
    }
}
