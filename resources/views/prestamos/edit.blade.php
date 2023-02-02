@extends('adminlte::page')

@section('title', 'Prestamos | Editar')

@section('content_header')

<h2>Prestamos</h2>
    
@stop

@section('content')

<p>espacio de desarrollo</p>

@stop





@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        @if (session('eliminar') == 'ok')
        
            Swal.fire(
            'Borrado!',
            'El cliente fue borrado :( ',
            'success'
            )
        
        
        @endif


        $('.formularioEliminar').submit(function(e) {

                e.preventDefault();

                Swal.fire({
                    title: 'Quieres BORRAR este ?',
                    text: "No lo podras recuperar!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, quiero Borrarlo!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {

                        /*  Swal.fire(
                             'Borrado!',
                             'El cliente fue borrado.',
                             'success'
                         ) */

                        this.submit();
                    }
                })

            }



        );

        /*     */
    </script>
@stop