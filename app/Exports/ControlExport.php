<?php

namespace App\Exports;

use App\Models\Control;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ControlExport implements FromCollection, WithHeadings
{
    public function __construct($fecha)
    {
        $this->fecha = $fecha;
    }

    public function collection()
    {
        if($this->fecha){
            return Control::select('control.control_id', 'vehiculo.vehiculo_placa', 'vehiculo.nombre_completo', 'control.hora_ingreso', 'control.hora_salida')
                    ->join('vehiculo', 'vehiculo.vehiculo_id', '=', 'control.vehiculo_id')
                    ->where('control.fecha', $this->fecha)
                    ->orderBy('control.control_id', 'desc')
                    ->get();
        }else{
            return Control::select('control.control_id', 'vehiculo.vehiculo_placa', 'vehiculo.nombre_completo', 'control.hora_ingreso', 'control.hora_salida')
                    ->join('vehiculo', 'vehiculo.vehiculo_id', '=', 'control.vehiculo_id')
                    ->orderBy('control.control_id', 'desc')
                    ->get();
        }
    }

    public function headings(): array
    {
        return ["ID", "Placa", "Apellidos y Nombre", "Hora Ingreso", "Hora Salida"];
    }
}
