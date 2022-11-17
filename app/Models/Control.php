<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    use HasFactory;

    protected $primaryKey = "control_id";

    protected $table = 'control';
    protected $fillable = [
        'control_id',
        'vehiculo_id',
        'hora_ingreso',
        'hora_salida',
        'fecha',
    ];

    public $timestamps = false;

    // Vehiuclo
    public function Vehiculo(){
        return $this->belongsTo(Vehiculo::class,
        'vehiculo_id','vehiculo_id');
    }
}
