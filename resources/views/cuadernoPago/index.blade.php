@extends('adminlte::page')

@section('title', 'Cuaderno Empleado')

@section('content_header')
    <h2>Cuaderno Empleado</h2>
    <a href="{{ url('/cuadernoPago/create/') }}" class="btn btn-info m-2">Crear Nuevo Registro</a>
    <br>
@stop

@section('content')



    <table class="table table-striped ">

        <thead class="thead-striped ">
            <tr>
                <th>FECHA</th>
                <th>NOMBRE EMPLEADO</th>
                <th>CODIGO FACTURA</th>
                <th>NOMBRE CLIENTE</th>
                <th>PRECIO</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($lista_cuaderno as $cuaderno)
                <tr>
                    <td>{{ $cuaderno->fecha_cuaderno_pago }}</td>
                    <td>{{ $cuaderno->nombre_empleado }}</td>
                    <td>{{ $cuaderno->id }}</td>
                    <td>{{ $cuaderno->nombre_cliente }}</td>
                    <td>{{ $cuaderno->precio_factura }}</td>

                </tr>
            @endforeach

        </tbody>





    </table>

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@stop

@section('js')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $('#clientes').DataTable();
    </script>


    <script>
        @if (session('_ok') == 'ok')
            Swal.fire(
                'Agregado Con Exito!!!',
                'Continuar',
                'success'
            )
        @endif
    </script>
@stop
