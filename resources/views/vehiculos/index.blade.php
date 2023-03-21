@extends('layouts.modulo-administrador')
@section('content')
@livewire('vehiculo.index')
@endsection
@section('script')
<script>
    window.addEventListener('modal_registro', event => {
        $('#modal_registro').modal(event.detail.action);
    })

    window.addEventListener('alerta-registro', event => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.icon,
            buttonsStyling: false,
            confirmButtonText: event.detail.confirmButtonText,
            customClass: {
                confirmButton: "btn btn-"+event.detail.color,
            }
        });
    })
</script>
@endsection
