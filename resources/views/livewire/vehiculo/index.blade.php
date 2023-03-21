<div>
    <div id="kt_app_toolbar" class="app-toolbar  pt-7 pt-lg-10 ">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container"
            class="app-container  container-fluid d-flex align-items-stretch ">
            <!--begin::Toolbar wrapper-->
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                    <!--begin::Title-->
                    <h1
                        class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                        Registro de Vehiculos
                    </h1>
                    <!--end::Title-->

                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.index') }}"
                                class="text-muted text-hover-primary">
                                Home </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            Registro </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="#modal_registro" class="btn btn-flex btn-primary h-40px fs-7 fw-bold"
                        data-bs-toggle="modal" data-bs-target="#modal_registro">
                        Nuevo Vehiculo
                    </a>
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar wrapper-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">
                <!--begin::Row-->
                <div class="row g-5 g-xl-10">
                    <!--begin::Col-->
                    <div class="col-md-12 mb-md-5 mb-xl-10">
                        <!--begin::Row-->
                        <div class="row g-5">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                            <input type="search" class="form-control" wire:model="search" placeholder="Buscar...">
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover rounded align-middle mb-0">
                                            <thead class="bg-light-info">
                                                <tr align="center">
                                                    <th class="fw-bold col-1">#</th>
                                                    <th class="fw-bold col-1">Placa</th>
                                                    <th class="fw-bold col-3">Apellidos y Nombres</th>
                                                    <th class="fw-bold col-2">Marca</th>
                                                    <th class="fw-bold col-2">Modelo</th>
                                                    <th class="fw-bold col-2">Estado</th>
                                                    <th class="fw-bold col-1">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($vehiculo_model->count() == 0)
                                                    <tr>
                                                        <td colspan="7" align="center" class="text-muted">No hay registros</td>
                                                    </tr>
                                                @else
                                                    @foreach ($vehiculo_model as $item)
                                                    <tr>
                                                        <td align="center" class="fw-bold" scope="row">{{ $item->id }}</td>
                                                        <td align="center">{{ $item->placa }}</td>
                                                        <td>{{ $item->nombre_completo }}</td>
                                                        <td align="center">{{ $item->marca }}</td>
                                                        <td align="center">{{ $item->modelo }}</td>
                                                        <td align="center">
                                                            @if ($item->estado == 1)
                                                                <span class="badge bg-primary">Activo</span>
                                                            @else
                                                                <span class="badge bg-danger">Inactivo</span>
                                                            @endif
                                                        </td>
                                                        <td align="center">
                                                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modal_registro" wire:click="cargar_vehiculo({{ $item->id }})">
                                                                <i class="las la-pencil-alt fs-3"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-danger btn-sm" wire:click="delete_registro({{ $item->id }})">
                                                                <i class="las la-trash-alt fs-3"></i>
                                                            </button>
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
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
        {{-- modal de registro --}}
        <div wire:ignore.self class="modal fade" id="modal_registro" tabindex="-1" aria-labelledby="modalVehiculoLabel" aria-hidden="true">
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
                                <label class="col-form-label">Marca:</label>
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
        </div>
    </div>
</div>
