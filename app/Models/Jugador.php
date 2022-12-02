<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;
    protected $table="Jugador";
    protected $primaryKey="IDJUGADOR";
    protected $fillable = ["IDJUGADOR","IDEQUIPO","NOMBREJUGADOR","CIJUGADO",
"CELULAR","EMAIL","FOTOCIJUGADOR","ROL","FOTOQR","FOTOJUGADOR","FECHANACIMIENTO"];
    public $timestamps = false;

    public function getUrlCi(){
        return \Storage::url($this->FOTOCIJUGADOR);
    }

    
}
