@extends('adminlte::page')

@section('title', 'Facturas | Nueva')

@section('content_header')

    <h2>Facturar</h2>

@stop

@section('content')

    <?php
    date_default_timezone_set('America/bogota');
    
    $hora = date('d-m-Y H:i'); ?>



    <div class="mb-3">
        <label for="" class="form-label">Fecha: </label>
        <input type="text" class="form-control form-control-lg" name="fecha" id="fecha" readonly value="{{ $hora }}">

    </div>

    <div class="mb-3">
        <label for="" class="form-label">Telefono: </label>
        <input type="number" class="form-control form-control-lg" name="clientes_id" id="clientes_id"
            placeholder="Ingrese el numero telefonico" value="">

    </div>

    <div class="mb-3">
        <label for="" class="form-label">Numero Prendas: </label>
        <input type="number" class="form-control form-control-lg" name="num_prendas" id="num_prendas"
            placeholder="Ingrese el numero de prendas" value="">
    </div>

    <div class="mb-3">

        <label for="" class="form-label">Description: </label> 
        <input type="textarea" class="form-control form-control-lg" name="descripcion" id="descripcion"
            placeholder="Describa todo lo que deja el cliente" value="">

    </div>


    <div class="mb-3">
        <label for="" class="form-label">Fecha Entrega: </label>
        <input type="datetime-local" class="form-control form-control-lg" name="fec_entrega" id="fec_entrega" value="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Precio: </label>
        <input type="number" class="form-control form-control-lg" name="precio" id="precio"
            placeholder="Ingrese el precio total" value="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Abono: </label>
        <input type="number" class="form-control form-control-lg" name="abono" id="abono" placeholder="Ingrese el abono"
            value="">
    </div>





    <div class="mb-3">
        <input type="submit" class="form-control form-control-lg btn btn-primary" value="Guardar">
    </div>



    {{-- {{ $datosFacturas ?? '' }} --}}

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
