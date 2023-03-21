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
                'placa' => 'required|unique:vehicles,placa',
                'apellido' => 'required|string',
                'nombre' => 'required|string',
                'marca' => 'nullable|string',
                'modelo' => 'nullable|string',
                'estado' => 'nullable|numeric',
            ]);

        }else{
            $this->validateOnly($propertyName, [
                'placa' => 'required|unique:vehicles,placa,'.$this->vehiculo_id.',id',
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
        $this->resetValidation();
        $this->reset('placa', 'apellido', 'nombre', 'marca', 'modelo', 'estado');
        $this->modo = 1;
    }

    public function cargar_vehiculo(Vehiculo $vehiculo)
    {
        $this->limpiar();
        $this->modo = 2;
        $this->titulo = 'Modificar Vehiculo';
        $this->vehiculo_id = $vehiculo->id;
        $this->placa = $vehiculo->placa;
        $this->apellido = $vehiculo->apellido;
        $this->nombre = $vehiculo->nombre;
        $this->marca = $vehiculo->marca;
        $this->modelo = $vehiculo->modelo;
        $this->estado = $vehiculo->estado;
    }

    public function guardar_vehiculo()
    {
        if($this->modo == 1){
            $this->validate([
                'placa' => 'required|unique:vehicles,placa',
                'apellido' => 'required|string',
                'nombre' => 'required|string',
                'marca' => 'nullable|string',
                'modelo' => 'nullable|string',
                'estado' => 'nullable|numeric',
            ]);

            Vehiculo::create([
                'placa' => strtoupper($this->placa),
                'apellido' => $this->apellido,
                'nombre' => $this->nombre,
                'nombre_completo' => $this->apellido . ', ' . $this->nombre,
                'marca' => $this->marca,
                'modelo' => $this->modelo,
                'estado' => 1,
            ]);

            $this->dispatchBrowserEvent('alerta-registro', [
                'title' => '¡Exito!',
                'text' => 'Los datos del vehiculo se registraron satisfactoriamente',
                'icon' => 'success',
                'confirmButtonText' => 'Aceptar',
                'color' => 'primary'
            ]);
        }else{
            $this->validate([
                'placa' => 'required|unique:vehicles,placa,'.$this->vehiculo_id.',id',
                'apellido' => 'required|string',
                'nombre' => 'required|string',
                'marca' => 'nullable|string',
                'modelo' => 'nullable|string',
                'estado' => 'required|numeric',
            ]);

            $vehiculo = Vehiculo::find($this->vehiculo_id);
            $vehiculo->placa = $this->placa;
            $vehiculo->apellido = $this->apellido;
            $vehiculo->nombre = $this->nombre;
            $vehiculo->nombre_completo = $this->apellido . ', ' . $this->nombre;
            $vehiculo->marca = $this->marca;
            $vehiculo->modelo = $this->modelo;
            $vehiculo->estado = $this->estado;
            $vehiculo->save();

            $this->dispatchBrowserEvent('alerta-registro', [
                'title' => '¡Exito!',
                'text' => 'Los datos del vehiculo se modificaron satisfactoriamente.',
                'icon' => 'success',
                'confirmButtonText' => 'Aceptar',
                'color' => 'primary'
            ]);
        }

        $this->dispatchBrowserEvent('modal_registro', ['action' => 'hide']);
        $this->limpiar();
    }

    public function delete_registro(Vehiculo $vehiculo)
    {
        $this->dispatchBrowserEvent('alerta-registro', [
            'title' => '¡Error!',
            'text' => 'Esta función no esta disponible en este momento.',
            'icon' => 'error',
            'confirmButtonText' => 'Aceptar',
            'color' => 'danger'
        ]);
    }

    public function render()
    {
        $vehiculo_model = Vehiculo::where('placa', 'like', '%' . $this->search . '%')
                ->orWhere('nombre_completo', 'like', '%' . $this->search . '%')
                ->orWhere('modelo', 'like', '%' . $this->search . '%')
                ->orWhere('marca', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->get();

        return view('livewire.vehiculo.index', [
            'vehiculo_model' => $vehiculo_model,
        ]);
    }
}
