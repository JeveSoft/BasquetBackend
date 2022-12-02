<?php

namespace App\Http\Controllers;

use App\Models\Delegado;
use App\Models\Equipo;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Excel;
use App\Imports\CsvImport;

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
        $delegado->IDDELEGADO=$request->IDDELEGADO;
        $delegado->NOMBRE=$request->NOMBRE;
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

    public function update(Request $request, $id){
        $delegado = Delegado::where("IDDELEGADO",$id)->first();
        $delegado->NOMBRE=$request->NOMBRE;
        $delegado->CI = $request->CI;
        $delegado->EMAIL = $request->EMAIL;
        $delegado->CELULAR =$request->CELULAR;
        $delegado->FECHANACIMIENTO = $request->FECHANACIMIENTO;
        $delegado->NACIONALIDAD =$request->NACIONALIDAD;
        $delegado->save();
        return $delegado;
    }

    public function estadoInscripcion($id){
        //$Delegado = Delegado::where("IDDELEGADO",$id)->first();
        //$equipo = Equipo::with(['Inscripcion:COMPROBANTEPAGO'])
          //               ->where("IDDELEGADO",$id)->first();
        //$inscripcion = Inscripcion::where("IDEQUIPO",$equipo->IDEQUIPO)
                                    //->with(["equipo"])
                                    //->first();
        $equipo = Equipo::join("Incripcion","equipo.IDEQUIPO","=","incripcion.IDEQUIPO")->get();
        
        /*if($inscripcion->PAGOMEDIO > 0){
            //PAGOMEDIO
            return 
            //return \response()->json(["pagoMedio" => true],200);
        }else{
            //pagoentero
            //return \response()->json(["pagoMedio" => false],200);
        }*/
        return $equipo;
    }

    public function addJugadoresExcel(Request $request, $id){

        //$path = $request->file('documento')->getRealPath();
        $datos = Excel::import(new CsvImport,request()->file('documento'));

        //$path = $request->file("documento")->getRealPath();
        //$datos = Excel::import($path, function ($reader){})->get();
        /*if(!empty($datos) && $datos->count()){
            $datos = $datos->toArray();
            for($i=0 ; $i< count($datos); $i++){
                $datosImportar[] = $datos[$i];
            }
        }*/
        return $datos;
    }
}