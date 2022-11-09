<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;
use App\Models\EquipoDelegado;
use App\Models\Equipo;
use App\Models\Delegado;

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

    public function habilitarSinJugador(Request $request,$id)
    {
        $inscripcion = Inscripcion::findOrFail($id);
        $inscripcion->HABILITADO = $request->HABILITADO;
        $inscripcion->save();
        return $inscripcion;
    }

    public function obtenerHabilitado()
    {
        $lista = Inscripcion::where("HABILITADO","Habilitado")->where("PAGOMEDIO","Completo")->pluck('IDEQUIPO');
        $listado = array();
        $i=0;
        while($i<count($lista)){
            $comprobante = Inscripcion::where("IDEQUIPO",$lista[$i])->pluck('COMPROBANTEPAGO');
            $comprobanteCompleto = Inscripcion::where("IDEQUIPO",$lista[$i])->pluck('COMPROBANTEMEDIO');
            $equipo = Equipo::where("IDEQUIPO",$lista[$i])->first();
            $nombreEquipo = $equipo->NOMBRE;
            $idDelegado = $equipo->IDDELEGADO;
            $sigla = $equipo->SIGLAS;
            $cantidad = $equipo->CANTIDAD;
            $creacion = $equipo->FECHACREACION;
            $categoria = $equipo->CATEGORIA;
            $delegado = Delegado::where("IDDELEGADO",$idDelegado)->first();
            $nombreDelegado = $delegado->NOMBRE;
            $ci = $delegado->CI;
            $email = $delegado->EMAIL;
            $celular = $delegado->CELULAR;
            $fecha = $delegado->FECHANACIMIENTO;
            $nacionalidad = $delegado->NACIONALIDAD;
            $genero = $delegado->GENERO;
            $equipoDelegado = new EquipoDelegado();
            $equipoDelegado -> NOMBREDELEGADO = $nombreDelegado;
            $equipoDelegado -> NOMBREEQUIPO = $nombreEquipo;
            $equipoDelegado -> CI = $ci;
            $equipoDelegado -> EMAIL = $email;
            $equipoDelegado -> CELULAR = $celular;
            $equipoDelegado -> FECHANACIMIENTO = $fecha;
            $equipoDelegado -> NACIONALIDAD = $nacionalidad;
            $equipoDelegado -> GENERO = $genero;
            $equipoDelegado -> SIGLAS = $sigla;
            $equipoDelegado -> CANTIDAD = $cantidad;
            $equipoDelegado -> FECHACREACION = $creacion;
            $equipoDelegado -> CATEGORIA = $categoria;
            $equipoDelegado -> COMPROBANTE = $comprobante;
            $equipoDelegado -> COMPROBANTECOMPLETO = $comprobanteCompleto;
            array_push($listado,$equipoDelegado);
            $i++;
        }
        return $listado;
    }

    public function obtenerHabilitadoSin()
    {
        $lista = Inscripcion::where("HABILITADO","SinJugador")->where("PAGOMEDIO","Completo")->pluck('IDEQUIPO');
        $listado = array();
        $i=0;
        while($i<count($lista)){
            $comprobante = Inscripcion::where("IDEQUIPO",$lista[$i])->pluck('COMPROBANTEPAGO');
            $comprobanteCompleto = Inscripcion::where("IDEQUIPO",$lista[$i])->pluck('COMPROBANTEMEDIO');
            $equipo = Equipo::where("IDEQUIPO",$lista[$i])->first();
            $nombreEquipo = $equipo->NOMBRE;
            $idDelegado = $equipo->IDDELEGADO;
            $sigla = $equipo->SIGLAS;
            $cantidad = $equipo->CANTIDAD;
            $creacion = $equipo->FECHACREACION;
            $categoria = $equipo->CATEGORIA;
            $delegado = Delegado::where("IDDELEGADO",$idDelegado)->first();
            $nombreDelegado = $delegado->NOMBRE;
            $ci = $delegado->CI;
            $email = $delegado->EMAIL;
            $celular = $delegado->CELULAR;
            $fecha = $delegado->FECHANACIMIENTO;
            $nacionalidad = $delegado->NACIONALIDAD;
            $genero = $delegado->GENERO;
            $equipoDelegado = new EquipoDelegado();
            $equipoDelegado -> NOMBREDELEGADO = $nombreDelegado;
            $equipoDelegado -> NOMBREEQUIPO = $nombreEquipo;
            $equipoDelegado -> CI = $ci;
            $equipoDelegado -> EMAIL = $email;
            $equipoDelegado -> CELULAR = $celular;
            $equipoDelegado -> FECHANACIMIENTO = $fecha;
            $equipoDelegado -> NACIONALIDAD = $nacionalidad;
            $equipoDelegado -> GENERO = $genero;
            $equipoDelegado -> SIGLAS = $sigla;
            $equipoDelegado -> CANTIDAD = $cantidad;
            $equipoDelegado -> FECHACREACION = $creacion;
            $equipoDelegado -> CATEGORIA = $categoria;
            $equipoDelegado -> COMPROBANTE = $comprobante;
            $equipoDelegado -> COMPROBANTECOMPLETO = $comprobanteCompleto;
            array_push($listado,$equipoDelegado);
            $i++;
        }
        return $listado;
    }

    public function obtenerPagoCompleto()
    {
        $lista = Inscripcion::where("PAGOMEDIO","Completo") -> where("HABILITADO","false") ->pluck('IDEQUIPO');
        $listado = array();
        $i=0;
        while($i<count($lista)){
            $idInscripcion =Inscripcion::where("IDEQUIPO",$lista[$i])->pluck('IDINSCRIPCION');
            $comprobante = Inscripcion::where("IDEQUIPO",$lista[$i])->pluck('COMPROBANTEPAGO');
            $comprobanteCompleto = Inscripcion::where("IDEQUIPO",$lista[$i])->pluck('COMPROBANTEMEDIO');
            $equipo = Equipo::where("IDEQUIPO",$lista[$i])->first();
            $nombreEquipo = $equipo->NOMBRE;
            $idDelegado = $equipo->IDDELEGADO;
            $sigla = $equipo->SIGLAS;
            $cantidad = $equipo->CANTIDAD;
            $creacion = $equipo->FECHACREACION;
            $categoria = $equipo->CATEGORIA;
            $delegado = Delegado::where("IDDELEGADO",$idDelegado)->first();
            $nombreDelegado = $delegado->NOMBRE;
            $ci = $delegado->CI;
            $email = $delegado->EMAIL;
            $celular = $delegado->CELULAR;
            $fecha = $delegado->FECHANACIMIENTO;
            $nacionalidad = $delegado->NACIONALIDAD;
            $genero = $delegado->GENERO;
            $equipoDelegado = new EquipoDelegado();
            $equipoDelegado -> NOMBREDELEGADO = $nombreDelegado;
            $equipoDelegado -> NOMBREEQUIPO = $nombreEquipo;
            $equipoDelegado -> CI = $ci;
            $equipoDelegado -> EMAIL = $email;
            $equipoDelegado -> CELULAR = $celular;
            $equipoDelegado -> FECHANACIMIENTO = $fecha;
            $equipoDelegado -> NACIONALIDAD = $nacionalidad;
            $equipoDelegado -> GENERO = $genero;
            $equipoDelegado -> SIGLAS = $sigla;
            $equipoDelegado -> CANTIDAD = $cantidad;
            $equipoDelegado -> FECHACREACION = $creacion;
            $equipoDelegado -> CATEGORIA = $categoria;
            $equipoDelegado -> COMPROBANTE = $comprobante;
            $equipoDelegado -> COMPROBANTECOMPLETO = $comprobanteCompleto;
            $equipoDelegado -> IDINSCRIPCION = $idInscripcion;
            array_push($listado,$equipoDelegado);
            $i++;
        }
        return $listado;
    }

    public function obtenerMedioPago()
    {
        $lista = Inscripcion::where("PAGOMEDIO","Medio")->pluck('IDEQUIPO');
        $listado = array();
        $i=0;
        while($i<count($lista)){
            $comprobante = Inscripcion::where("IDEQUIPO",$lista[$i])->pluck('COMPROBANTEPAGO');
            $equipo = Equipo::where("IDEQUIPO",$lista[$i])->first();
            $nombreEquipo = $equipo->NOMBRE;
            $idDelegado = $equipo->IDDELEGADO;
            $sigla = $equipo->SIGLAS;
            $cantidad = $equipo->CANTIDAD;
            $creacion = $equipo->FECHACREACION;
            $categoria = $equipo->CATEGORIA;
            $delegado = Delegado::where("IDDELEGADO",$idDelegado)->first();
            $nombreDelegado = $delegado->NOMBRE;
            $ci = $delegado->CI;
            $email = $delegado->EMAIL;
            $celular = $delegado->CELULAR;
            $fecha = $delegado->FECHANACIMIENTO;
            $nacionalidad = $delegado->NACIONALIDAD;
            $genero = $delegado->GENERO;
            $equipoDelegado = new EquipoDelegado();
            $equipoDelegado -> NOMBREDELEGADO = $nombreDelegado;
            $equipoDelegado -> NOMBREEQUIPO = $nombreEquipo;
            $equipoDelegado -> CI = $ci;
            $equipoDelegado -> EMAIL = $email;
            $equipoDelegado -> CELULAR = $celular;
            $equipoDelegado -> FECHANACIMIENTO = $fecha;
            $equipoDelegado -> NACIONALIDAD = $nacionalidad;
            $equipoDelegado -> GENERO = $genero;
            $equipoDelegado -> SIGLAS = $sigla;
            $equipoDelegado -> CANTIDAD = $cantidad;
            $equipoDelegado -> FECHACREACION = $creacion;
            $equipoDelegado -> CATEGORIA = $categoria;
            $equipoDelegado -> COMPROBANTE = $comprobante;
            array_push($listado,$equipoDelegado);
            $i++;
        }
        return $listado;
    }
}
