@extends('adminlte::page')

@section('title', 'Empleado | Nueva')

@section('content_header')

    <h2>Prestamos</h2>

@stop

@section('content')

<?php 
    {{date_default_timezone_set('America/bogota');}}
    
    $hora = date('d-m-Y H:i'); ?>


   
    <div class="mb-3">
        <label for="" class="form-label">Fecha: </label>
        <input type="text" class="form-control form-control-lg" name="fecha_prestamo" id="fecha_prestamo" readonly value="{{ $hora }}">

    </div>

    <div class="mb-3">
        <label for="" class="form-label">Telefono: </label>
        <input type="number" class="form-control form-control-lg" name="empleados_id" id="empleados_id"
            placeholder="Ingrese el numero telefonico" value="">

    </div>

    <div class="mb-3">
        <label for="" class="form-label">Precio: </label>
        <input type="number" class="form-control form-control-lg" name="precio_prestamo" id="precio_prestamo"
            placeholder="Ingrese el valor prestado" value="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Description: </label>
        <input type="textarea" class="form-control form-control-lg" name="descripcion_prestamo" id="descripcion_prestamo"
            placeholder="Describa el motivo del prestamo" value="">
    </div>



    <div class="mb-3">
        <input type="submit" class="form-control form-control-lg btn btn-primary" value="Guardar">
    </div>



   {{--  {{ $datosFacturas ?? '' }} --}}

@stop





@section('css')
    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
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
