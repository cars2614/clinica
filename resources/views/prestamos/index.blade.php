@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">

@stop

@section('title', 'Prestamos')

@section('content_header')

    <h2>Prestamos</h2>

    <a href="{{ url('/prestamos/create') }}" class="btn btn-info">Crear Nueva Prestamo</a>

@stop

@section('content')

    <div id="container">
        <div id="row">

            <table id="registro" class="table table-striped">
                <thead class="thead-striped">
                    <tr>
                        <th>#</th>
                        <th>Fecha Prestamo</th>
                        <th>Empleado</th>
                        <th>Precio</th>                        
                        <th>Descripcion</th>                   
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lista_prestamo as $prestamo)
                        <tr>
                            <td>{{ $prestamo->id }}</td> 
                            <td>{{ $prestamo->fecha_prestamo }}</td>
                            <td>{{ $prestamo->nombre_empleado }}</td>
                            <td> <strong> {{ $prestamo->precio_prestamo }}  </strong> </td>
                            <td>{{ $prestamo->descripcion_prestamo }}</td>
                           
                            <td>Editar</td>

                        </tr>
                    @endforeach
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
            'El Empleado fue borrado :( ',
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

        
    </script>



@stop
