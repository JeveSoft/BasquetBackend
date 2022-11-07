<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Albitro extends Model
{
    use HasFactory;
    protected $table="Arbitro";
    protected $primaryKey="IDARBITRO";
    protected $fillable = [
        "IDARBITRO ",
        "NOMBRE",
        "CI",
        "EMAIL",
        "CELULAR",
        "FECHANACIMIENTO",
        "NACIONALIDAD",
        "GENERO"];
    
    public $timestamps = false;

}
