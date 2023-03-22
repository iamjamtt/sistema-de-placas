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
                        Control de Vehiculos
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
                            Control </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <button type="button" class="btn btn-primary waves-effect btn-label waves-light w-lg" wire:click="exportar_excel()">
                        <i class="las la-file-excel label-icon fs-2"></i> Excel
                    </button>
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
                                        <table class="table table-hover table-rounded border gy-5 gs-5 align-middle mb-0">
                                            <thead class="bg-light-primary">
                                                <tr align="center" class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                                    <th>#</th>
                                                    <th>Placa</th>
                                                    <th>Apellidos y Nombres</th>
                                                    <th>Ingreso</th>
                                                    <th>Salida</th>
                                                    {{-- <th>Acciones</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($control_model->count() == 0)
                                                    <tr>
                                                        <td colspan="6" align="center" class="text-muted">No hay registros</td>
                                                    </tr>
                                                @else
                                                    @foreach ($control_model as $item)
                                                    <tr class="fs-5">
                                                        <td align="center" class="fw-bold" scope="row">{{ $item->id }}</td>
                                                        <td align="center" class="fw-bold">{{ $item->placa }}</td>
                                                        <td>{{ $item->nombre_completo }}</td>
                                                        <td align="center">
                                                            @if ($item->ingreso )
                                                                {{ date('h:i a d/m/Y', strtotime($item->ingreso)) }}
                                                            @else
                                                                ---
                                                            @endif
                                                        </td>
                                                        <td align="center">
                                                            @if ($item->salida )
                                                                {{ date('h:i a d/m/Y', strtotime($item->salida)) }}
                                                            @else
                                                                ---
                                                            @endif
                                                        </td>
                                                        {{-- <td align="center">
                                                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalVehiculo"><i class="bx bx-edit"></i></button>
                                                            <button type="button" class="btn btn-danger btn-sm"><i class="bx bx-trash"></i></button>
                                                        </td> --}}
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
    </div>
</div>
