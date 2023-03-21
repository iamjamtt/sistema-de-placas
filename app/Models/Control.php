<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    use HasFactory;

    protected $table = 'controls';
    protected $fillable = [
        'id_vehicles',
        'ingreso',
        'salida',
        'fecha',
    ];

    public $timestamps = false;

    // Vehiuclo
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'id_vehicles');
    }
}
