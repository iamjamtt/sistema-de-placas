@extends('layouts.modulo-administrador')
@section('content')
@livewire('control.index')
@endsection
@section('script')
<script>
    window.addEventListener('alerta-control', event => {
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
