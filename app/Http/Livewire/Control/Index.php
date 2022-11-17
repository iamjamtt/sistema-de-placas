<?php

namespace App\Http\Livewire\Control;

use App\Exports\ControlExport;
use App\Models\Control;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
    protected $queryString = [
        'search' => ['except' => '']
    ];

    public $search = '';
    public $fecha;

    public $control_model;

    public function limpiar()
    {
        $this->resetErrorBag();
        $this->reset('fecha');
    }

    public function exportar_excel()
    {
        if($this->fecha){
            return Excel::download(new ControlExport($this->fecha), 'control-' . $this->fecha . '.xlsx');

        }else{
            return Excel::download(new ControlExport($this->fecha), 'control-general.xlsx');
        }
    }

    public function render()
    {
        $fecha = $this->fecha;
        $buscar = $this->search;

        if($fecha){
            $this->control_model = Control::join('vehiculo', 'vehiculo.vehiculo_id', '=', 'control.vehiculo_id')
                    ->where(function($query) use ($fecha){
                        $query->where('control.fecha', $fecha);
                    })
                    ->where(function($query) use ($buscar){
                        $query->where('vehiculo.vehiculo_placa', 'like', '%' . $buscar . '%')
                        ->orWhere('vehiculo.nombre_completo', 'like', '%' . $buscar . '%')
                        ->orWhere('control.control_id', 'like', '%' . $buscar . '%');
                        })
                    ->orderBy('control.control_id', 'desc')
                    ->get();
        }else{
            $this->control_model = Control::join('vehiculo', 'vehiculo.vehiculo_id', '=', 'control.vehiculo_id')
                    ->where(function($query) use ($buscar){
                        $query->where('vehiculo.vehiculo_placa', 'like', '%' . $buscar . '%')
                        ->orWhere('vehiculo.nombre_completo', 'like', '%' . $buscar . '%')
                        ->orWhere('control.control_id', 'like', '%' . $buscar . '%');
                        })
                    ->orderBy('control.control_id', 'desc')
                    ->get();
        }

        return view('livewire.control.index');
    }
}
