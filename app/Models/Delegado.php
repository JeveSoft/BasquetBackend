<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delegado extends Model
{
    use HasFactory;
    protected $table="Delegado";
    protected $fillable = [
    "IDDELEGADO",
    "NOMBRE",
    "CI",
    "EMAIL",
    "CELULAR",
    "FECHANACIMIENTO",
    "NACIONALIDAD",
    "GENERO",
    "CONTRASENA"
    ];
    public $timestamps = false;
}
