<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehicles';
    protected $fillable = [
        'placa',
        'apellido',
        'nombre',
        'nombre_completo',
        'marca',
        'modelo',
        'estado',
    ];

    // Control
    public function control()
    {
        return $this->hasMany(Control::class, 'id_vehicles');
    }
}
