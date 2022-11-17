@extends('administrador')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Control</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Control</a></li>
                    <li class="breadcrumb-item active">Vehiculos</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

@livewire('control.index')

@endsection

@section('script')
<script>
    window.addEventListener('modalVehiculo', event => {
        $('#modalVehiculo').modal('hide');
    })

    window.addEventListener('notificacionVehiculo', event => {
        Toastify({
            text: event.detail.message,
            close: true,
            duration: 5000,
            stopOnFocus: true,
            newWindow: true,
            style: {
                background:  event.detail.color,
            }
        }).showToast();
    })

    // window.addEventListener('alertaConfirmacionUsuario', event => {
    //     // alert('Name updated to: ' + event.detail.id);
    //     Swal.fire({
    //         title: '¿Estás seguro de modificar el estado del usuario?',
    //         text: "",
    //         icon: 'question',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Modificar',
    //         cancelButtonText: 'Cancelar'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             Livewire.emitTo('modulo-administrador.usuario.usuario', 'cambiarEstado', event.detail.id);
    //         }
    //     })
    // })
</script>
@endsection
