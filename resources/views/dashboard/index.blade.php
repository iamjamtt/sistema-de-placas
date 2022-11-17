@extends('administrador')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <figure class="highcharts-figure">
                    <div id="reporte">
                    </div>
                </figure>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="avatar">
                            <span class="avatar-title bg-soft-warning rounded">
                                <i class="mdi mdi-card-account-details-outline text-warning font-size-24"></i>
                            </span>
                        </div>
                        <p class="text-muted mt-4 mb-0">Total de vehiculos</p>
                        <h4 class="mt-1 mb-0">{{ $vehiculos_count }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="avatar">
                            <span class="avatar-title bg-soft-info rounded">
                                <i class="mdi mdi-calendar text-info font-size-24"></i>
                            </span>
                        </div>
                        <p class="text-muted mt-4 mb-0">Total de control del dia</p>
                        <h4 class="mt-1 mb-0">{{ $control_days_count }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="avatar">
                            <span class="avatar-title bg-soft-danger rounded">
                                <i class="mdi mdi-calendar text-danger font-size-24"></i>
                            </span>
                        </div>
                        <p class="text-muted mt-4 mb-0">Total de control del semana</p>
                        <h4 class="mt-1 mb-0">{{ $control_week_count }} </h4>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="avatar">
                            <span class="avatar-title bg-soft-success rounded">
                                <i class="mdi mdi-calendar text-success font-size-24"></i>
                            </span>
                        </div>
                        <p class="text-muted mt-4 mb-0">Total de control del mes</p>
                        <h4 class="mt-1 mb-0">{{ $contol_month_count }}</h4>
                    </div>
                </div>
            </div>

        </div>
    </div>
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
