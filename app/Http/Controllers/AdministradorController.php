<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdministradorController extends Controller
{
    public function login(Request $request){
        $adminJson= Administrador::get();
        $admins=json_decode($adminJson,true);
        $logueado=false;
        foreach($admins as $admin){
            if($admin['CODADMINISTRADOR']==$request['id'] && $admin['CONTRASENA']==$request['password']){
                $logueado=true;
                $adminL = Administrador::findOrFail($request['id']);
                $adminL->API_TOKEN=Str::random(150);
                $adminL->save();
            }
        }
        if($logueado){
            return \response()->json(["res" => true, "message" => "logueado"],200);
        }else{
            return \response()->json(["res" => false, "message" => "usuario o contraseña incorreacto"],200);
        }
    }
    public function logout(Request $request){
        $adminJson= Administrador::get();
        $admins=json_decode($adminJson,true);
        $deslogueado=false;
        foreach($admins as $admin){
            if($admin['CODADMINISTRADOR']==$request['id'] && $admin['CONTRASENA']==$request['password']){
                $deslogueado=true;
                $adminL = Administrador::findOrFail($request['id']);
                $adminL->API_TOKEN="";
                $adminL->save();
            }
        }
        if($deslogueado){
            return \response()->json(["res" => true, "message" => "adios"],200);
        }else{
            return false;
        }
    }
    public function selectEq(){
        return Equipo::get();
    }
}
