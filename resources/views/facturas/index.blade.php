@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">

@stop

@section('title', 'Facturas')



@section('content_header')

    <h2>Facturar</h2>

    <a href="{{ url('/facturas/create') }}" class="btn btn-info">Crear Nueva Factura</a>

@stop

@section('content')

    <div id="container">
        <div id="row">

            <table id="registro" class="table table-striped">
                <thead class="thead-striped">
                    <tr>                        
                        <th>#</th>
                        <th>Fecha Ingreso</th>
                        <th>Cliente</th>
                        <th>#_Prendas</th>
                        <th>Descripcion</th>
                        <th>Fecha Entrega</th>
                        <th>Precio</th>
                        <th>Abono</th>
                        <th>Estado</th>
                    </tr>
                </thead>
               
                <tbody>
                    @foreach ($lista_factura as $factura)
                        <tr>
                            <td>{{ $factura->id }}</td>
                            <td>{{ $factura->fecha_factura }}</td>
                            <td>{{ $factura->nombre_cliente }}</td>
                            <td>{{ $factura->num_prendas }}</td>
                            <td>{{ $factura->descripcion_factura }}</td>
                            <td>{{ $factura->fec_entrega }}</td>
                            <td>{{ $factura->precio_factura }}</td>
                            <td>{{ $factura->abono_factura }}</td>
                            <td>{{ $factura->estado }}</td>
                                                      
                            
                            
                        </tr>
                    @endforeach
                    <?php //var_dump($lista_factura);?>
                </tbody>
               
                
               
            </table>
          

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
