<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JugadorController extends Controller
{
    public function store(Request $request)
    {
        $jugador = new Jugador;
        $jugador->IDJUGADOR=$request->IDJUGADOR;
        $jugador->IDEQUIPO=$request->IDEQUIPO;
        $jugador->NOMBREJUGADOR=$request->NOMBREJUGADOR;
        $jugador->CIJUGADOR=$request->CIJUGADOR;
        $jugador->CELULAR=$request->CELULAR;
        $jugador->EMAIL=$request->EMAIL;
        $jugador->FOTOCIJUGADOR=$request->FOTOCIJUGADOR;
        $jugador->ROL=$request->ROL;
        $jugador->FOTOQR=$request->FOTOQR;
        $jugador->FOTOJUGADOR=$request->FOTOJUGADOR;
        $jugador->FECHANACIMIENTO=$request->FECHANACIMIENTO;
        $jugador->save();
        return $jugador;
    }


    public function show()
    {
        return Jugador::get();
    }

    public function setImgCi(Request $request, $id){
        //$path = $request->file('imagen')->store('');
        $file = $request->file("imagen");
        $nombre = time().".".$file->extension();
        $file->storeAs("", $nombre,'public');
        
        $jugador = Jugador::find($id);
        $jugador->FOTOCIJUGADOR = $nombre;
        $jugador->save();     
        //return $path;   
        return $nombre;
    }

    public function setImgJugador(Request $request, $id){
        $file = $request->file("imagen");
        $nombre = time().".".$file->extension();
        $file->storeAs("", $nombre,'public');
        
        $jugador = Jugador::find($id);
        $jugador->FOTOJUGADOR = $nombre;
        $jugador->save();     
        return $nombre;
    }
   public function actualizarJugador(Request $request , $ci){
        $jugador = Jugador::where("CIJUGADOR", $ci)->first();
        $jugador->NOMBREJUGADOR=$request->NOMBREJUGADOR;
        $jugador->CIJUGADOR=$request->CIJUGADOR;
        $jugador->CELULAR=$request->CELULAR;
        $jugador->EMAIL=$request->EMAIL;
        $jugador->FOTOCIJUGADOR=$request->FOTOCIJUGADOR;
        $jugador->ROL=$request->ROL;
        $jugador->FOTOQR=$request->FOTOQR;
        $jugador->FOTOJUGADOR=$request->FOTOJUGADOR;
        $jugador->FECHANACIMIENTO=$request->FECHANACIMIENTO;
        $jugador->save();
        return $jugador;
   }

   public function eliminarJugador ($id){
        $jugador = Jugador::where("CIJUGADOR",$id);
        $jugador->delete();
        return 1;
   }

}
