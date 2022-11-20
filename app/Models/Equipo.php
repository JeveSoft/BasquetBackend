<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $table = "Equipo";
    protected $fillable = [
            "NOMBRE",
            "SIGLAS",
            "LOGO",
            "CANTIDAD",
            "FECHACREACION",
            "IDDELEGADO",
            "CATEGORIA"
    ];
    public $timestamps = false;
}
