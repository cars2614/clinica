@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">

@stop

@section('title', 'Informes')



@section('content_header')

    <!--
                                    <h2>Facturar</h2>

                                    <a href="{{ url('/facturas/create') }}" class="btn btn-info">Crear Nueva Factura</a>

                                    -->

@stop

@section('content')

    <div id="container">
        <div id="row">

            <form action="{{ url('/informes') }}" method="post">

                <div>
                    <h2>Consulta de Paquetes Por Fechas</h2>
                </div>
                <br>


                <div class="form-group row mb-0">

                    <div class="mb-3 col-4">
                        <label class="form-label" for="">Fecha Inicial</label>
                        <input type="date" class="form-control form-control-lg" id="" placeholder="">
                    </div>

                    <div class="mb-3 col-4">
                        <label class="form-label" for="">Fecha Final</label>
                        <input type="date" class="form-control form-control-lg" id="" placeholder="">
                        
                    </div>

                    <div class="mb-3 col-4">
                        <br>

                        <button type="submit" class="btn btn-group-lg primary mb-6 col-12">Consultar</button>

                    </div>

                </div>



            </form>




        </div>

    </div>



@stop







@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $('#registro').DataTable();
    </script>

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
