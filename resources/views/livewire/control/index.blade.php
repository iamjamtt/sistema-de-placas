<div>
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <button type="button" class="btn btn-success waves-effect btn-label waves-light w-lg" wire:click="exportar_excel()"><i
                        class="bx bx-file label-icon"></i> Excel</button>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-3">
                            {{-- <label class="col-form-label">Buscar:</label> --}}
                            <input type="search" class="form-control" wire:model="search" placeholder="Buscar...">
                        </div>

                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-3">
                            {{-- <label class="col-form-label">Fecha:</label> --}}
                            <input type="date" class="form-control" wire:model="fecha">
                        </div>

                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-3">
                            <button class="btn btn-secondary fw-bold w-lg" wire:click="limpiar()">Limpiar</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr align="center">
                                    <th class="fw-bold col-1">#</th>
                                    <th class="fw-bold col-2">Placa</th>
                                    <th class="fw-bold col-4">Apellidos y Nombres</th>
                                    <th class="fw-bold col-2">Ingreso</th>
                                    <th class="fw-bold col-2">Salida</th>
                                    <th class="fw-bold col-1">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($control_model->count() == 0)
                                    <tr>
                                        <td colspan="6" align="center" class="text-muted">No hay registros</td>
                                    </tr>
                                @else
                                    @foreach ($control_model as $item)
                                    <tr>
                                        <td align="center" class="fw-bold" scope="row">{{ $item->control_id }}</td>
                                        <td align="center">{{ $item->vehiculo_placa }}</td>
                                        <td>{{ $item->nombre_completo }}</td>
                                        <td align="center">{{ $item->hora_ingreso }}</td>
                                        <td align="center">{{ $item->hora_salida }}</td>
                                        <td align="center">
                                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalVehiculo"><i class="bx bx-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm"><i class="bx bx-trash"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div wire:ignore.self class="modal fade" id="modalVehiculo" tabindex="-1" aria-labelledby="modalVehiculoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalVehiculoLabel">{{ $titulo }}</h1>
                    <button type="button" class="btn-close" wire:click="limpiar()" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-2">
                            <label class="col-form-label">Placa: <span class="text-danger ">*</span></label>
                            <input type="text" class="form-control @error('placa') is-invalid @enderror" wire:model="placa" placeholder="Ingrese la placa">
                            @error('placa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="col-form-label">Apellido: <span class="text-danger ">*</span></label>
                            <input type="text" class="form-control @error('apellido') is-invalid @enderror" wire:model="apellido" placeholder="Ingrese su apellido">
                            @error('apellido')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="col-form-label">Nombre: <span class="text-danger ">*</span></label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" wire:model="nombre" placeholder="Ingrese su nombre">
                            @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="col-form-label">Marca: <span class="text-danger ">*</span></label>
                            <input type="text" class="form-control @error('marca') is-invalid @enderror" wire:model="marca" placeholder="Ingrese la marca del vehiculo">
                            @error('marca')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="col-form-label">Modelo:</label>
                            <input type="text" class="form-control @error('modelo') is-invalid @enderror" wire:model="modelo" placeholder="Ingrese el modelo del vehiculo">
                            @error('modelo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        @if ($modo == 2)
                        <div class="mb-2">
                            <label class="col-form-label">Estado:</label>
                            <select class="form-select @error('estado') is-invalid @enderror" wire:model="estado">
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                            @error('estado')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        @endif
                    </form>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" wire:click="limpiar()" class="btn btn-secondary w-md" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" wire:click="guardar_vehiculo()" class="btn btn-primary w-md">Guardar</button>
                </div>
            </div>
        </div>
    </div> --}}
</div>
