<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $primaryKey = "vehiculo_id";

    protected $table = 'vehiculo';
    protected $fillable = [
        'vehiculo_id',
        'vehiculo_placa',
        'apellidos',
        'nombres',
        'nombre_completo',
        'modelo',
        'marca',
        'vehiculo_estado',
    ];

    public $timestamps = false;
}
