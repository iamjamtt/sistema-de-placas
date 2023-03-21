@extends('layouts.modulo-administrador')
@section('content')
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
                    Dashboard
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
                        Dashboard </li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            {{-- <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="#"
                    class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold"
                    data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">
                    Add Member
                </a>

                <a href="#" class="btn btn-flex btn-primary h-40px fs-7 fw-bold"
                    data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">
                    New Campaign
                </a>
            </div> --}}
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
                        <div class="col-xl-6">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <figure class="highcharts-figure">
                                        <div id="reporte">
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="row g-5">
                                <div class="col-md-6">
                                    <div class="card shadow-sm">
                                        <div class="card-body text-center">
                                            <div class="bg-light-warning rounded-4 px-3 pt-3 pb-2 text-center">
                                                <span class="">
                                                    <i class="fonticon-pin text-warning fs-1"></i>
                                                </span>
                                            </div>
                                            <p class="text-muted mt-4 fs-3 fw-bold mb-2">Total de vehiculos</p>
                                            <h4 class="mt-1 mb-0">{{ $vehiculos_count }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card shadow-sm">
                                        <div class="card-body text-center">
                                            <div class="bg-light-success rounded-4 px-3 pt-3 pb-2 text-center">
                                                <span class="">
                                                    <i class="fonticon-alignment-right text-success fs-1"></i>
                                                </span>
                                            </div>
                                            <p class="text-muted mt-4 fs-3 fw-bold mb-2">Control del dia</p>
                                            <h4 class="mt-1 mb-0">{{ $control_days_count }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card shadow-sm">
                                        <div class="card-body text-center">
                                            <div class="bg-light-success rounded-4 px-3 pt-3 pb-2 text-center">
                                                <span class="">
                                                    <i class="fonticon-alignment-right text-success fs-1"></i>
                                                </span>
                                            </div>
                                            <p class="text-muted mt-4 fs-3 fw-bold mb-2">Control de la semana</p>
                                            <h4 class="mt-1 mb-0">{{ $control_week_count }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card shadow-sm">
                                        <div class="card-body text-center">
                                            <div class="bg-light-info rounded-4 px-3 pt-3 pb-2 text-center">
                                                <span class="">
                                                    <i class="fonticon-alignment-right text-info fs-1"></i>
                                                </span>
                                            </div>
                                            <p class="text-muted mt-4 fs-3 fw-bold mb-2">Control del mes</p>
                                            <h4 class="mt-1 mb-0">{{ $contol_month_count }}</h4>
                                        </div>
                                    </div>
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
@endsection
@section('script')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        var cData = '<?php echo $data; ?>';
        const datos = JSON.parse(cData);
        console.log(datos);
        const nombre = datos.map(data => data.label);
        const cantidad = datos.map(data => data.data);

        Highcharts.chart('reporte', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'REPORTE DE CONTROL DE VEHICULOS'
            },
            xAxis: {
                categories: nombre,
                crosshair: true
            },
            yAxis: {
                title: {
                    useHTML: true,
                    text: 'Cantidad'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            colors: ['#003032', '#003032', '#003032', '#003032', '#003032'
            ],
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0,
                },
                series: {
                    colorByPoint: true
                }
            },
            series: [{
                name: 'Cantidad de registros por día',
                data: cantidad
            }]
        });
    </script>
@endsection
