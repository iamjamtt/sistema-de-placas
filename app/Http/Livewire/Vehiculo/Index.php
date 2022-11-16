<?php

namespace App\Http\Livewire\Vehiculo;

use App\Models\Vehiculo;
use Livewire\Component;

class Index extends Component
{
    protected $queryString = [
        'search' => ['except' => '']
    ];

    public $search = '';
    public $titulo = 'Crear Vehiculo';

    public $placa, $apellido, $nombre, $marca, $modelo, $estado;
    public $vehiculo_id;

    public $modo = 1;

    public function updated($propertyName)
    {
        if($this->modo == 1){
            $this->validateOnly($propertyName, [
                'placa' => 'required|unique:vehiculo,vehiculo_placa',
                'apellido' => 'required|string',
                'nombre' => 'required|string',
                'marca' => 'nullable|string',
                'modelo' => 'nullable|string',
                'estado' => 'nullable|numeric',
            ]);

        }else{
            $this->validateOnly($propertyName, [
                'placa' => 'required|unique:vehiculo,vehiculo_placa,'.$this->vehiculo_id.',vehiculo_id',
                'apellido' => 'required|string',
                'nombre' => 'required|string',
                'marca' => 'nullable|string',
                'modelo' => 'nullable|string',
                'estado' => 'required|numeric',
            ]);
        }
    }

    public function modo()
    {
        $this->limpiar();
        $this->modo = 1;
        $this->titulo = 'Crear Vehiculo';
    }

    public function limpiar()
    {
        $this->resetErrorBag();
        $this->reset('placa', 'apellido', 'nombre', 'marca', 'modelo', 'estado');
        $this->modo = 1;
    }

    public function cargar_vehiculo(Vehiculo $vehiculo)
    {
        $this->limpiar();
        $this->modo = 2;
        $this->titulo = 'Modificar Vehiculo';
        $this->vehiculo_id = $vehiculo->vehiculo_id;
        $this->placa = $vehiculo->vehiculo_placa;
        $this->apellido = $vehiculo->apellidos;
        $this->nombre = $vehiculo->nombres;
        $this->marca = $vehiculo->marca;
        $this->modelo = $vehiculo->modelo;
        $this->estado = $vehiculo->vehiculo_estado;
    }

    public function guardar_vehiculo()
    {
        if($this->modo == 1){
            $this->validate([
                'placa' => 'required|unique:vehiculo,vehiculo_placa',
                'apellido' => 'required|string',
                'nombre' => 'required|string',
                'marca' => 'nullable|string',
                'modelo' => 'nullable|string',
                'estado' => 'nullable|numeric',
            ]);

            Vehiculo::create([
                'vehiculo_placa' => strtoupper($this->placa),
                'apellidos' => $this->apellido,
                'nombres' => $this->nombre,
                'nombre_completo' => $this->apellido . ', ' . $this->nombre,
                'modelo' => $this->modelo,
                'marca' => $this->marca,
                'vehiculo_estado' => 1,
            ]);

            $this->dispatchBrowserEvent('notificacionVehiculo', ['message' =>'Datos de vehiculo agregado satisfactoriamente.', 'color' => '#33a186']); //danger #fa6374
        }else{
            $this->validate([
                'placa' => 'required|unique:vehiculo,vehiculo_placa,'.$this->vehiculo_id.',vehiculo_id',
                'apellido' => 'required|string',
                'nombre' => 'required|string',
                'marca' => 'nullable|string',
                'modelo' => 'nullable|string',
                'estado' => 'required|numeric',
            ]);

            $vehiculo = Vehiculo::find($this->vehiculo_id);
            $vehiculo->vehiculo_placa = $this->placa;
            $vehiculo->apellidos = $this->apellido;
            $vehiculo->nombres = $this->nombre;
            $vehiculo->nombre_completo = $this->apellido . ', ' . $this->nombre;
            $vehiculo->modelo = $this->modelo;
            $vehiculo->marca = $this->marca;
            $vehiculo->vehiculo_estado = $this->estado;
            $vehiculo->save();

            $this->dispatchBrowserEvent('notificacionVehiculo', ['message' =>'Datos de vehiculo actualizado satisfactoriamente.', 'color' => '#33a186']); //danger #fa6374
        }

        $this->dispatchBrowserEvent('modalVehiculo');
        $this->limpiar();
    }

    public function render()
    {
        $vehiculo_model = Vehiculo::where('vehiculo_placa', 'like', '%' . $this->search . '%')
                ->orWhere('nombre_completo', 'like', '%' . $this->search . '%')
                ->orWhere('modelo', 'like', '%' . $this->search . '%')
                ->orWhere('marca', 'like', '%' . $this->search . '%')
                ->get();

        return view('livewire.vehiculo.index', [
            'vehiculo_model' => $vehiculo_model,
        ]);
    }
}
