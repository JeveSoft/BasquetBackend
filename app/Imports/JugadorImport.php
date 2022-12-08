<?php

namespace App\Imports;

use App\Models\Jugador;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;


class JugadorImport implements ToCollection
{
    /**
    * @param Collection $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    private  $idEquipo;
    private $cantidad;

    public function __construct($idEquipo, $cantidad){
        $this->idEquipo = $idEquipo;
        $this->cantidad = $cantidad;
    }

    public function collection(Collection $rows)
    {   
        $id = 0;
        foreach ($rows as $row)     
        {
            if($id > 0 && $id <= $this->cantidad){
                Jugador::create([
                    'IDJUGADOR' => $id.$this->idEquipo,
                    'IDEQUIPO' => $this->idEquipo,
                    'NOMBREJUGADOR' => $row[0],
                    'CIJUGADOR' => $row[1],
                    'CELULAR' => "+".$row[2],
                    'EMAIL' => $row[3],
                    'FOTOCIJUGADOR' =>"vacio",
                    'ROL' => $row[4],
                    'FOTOQR' => "fotoqr",
                    'FOTOJUGADOR' => "vacio",
                    'FECHANACIMIENTO' => preg_replace('/["\']+/','',$row[5]),
                ]);
            }
            $id++;
        }
    
        return $this->idEquipo;
    }

   /*  private function ponerFecha($fecha){
        $fechaNac;
        for( $i = 0; $i < Str::length($fecha) ; $i++){
            $fechaNac = $fechaNac . preg_replace($fecha)
        }
        return $fechaNac;
    } */
}
