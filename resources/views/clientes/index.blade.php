@extends('adminlte::page')

@section('title', 'Cliente')

@section('content_header')
    <h2>Clientes</h2>
    <a href="{{ url('/clientes/create/') }}" class="btn btn-info m-2">Agregar Cliente</a>
    <br>
@stop

@section('css')

    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}">
@stop

@section('content')

    <div class="container col-md-12">


        <div class="">

            <br>

            <table id="clientes" class="table table-striped ">

                <thead class="thead-striped ">
                    <tr>

                        <th>Telefono</th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Acciones</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>

                            <td>{{ $cliente->telefono_cliente }}</td>
                            <td>{{ $cliente->nombre_cliente }}</td>
                            <td>{{ $cliente->direccion_cliente }}</td>

                            <td>


                                <div class="btn-group" role="group" aria-label="Button group">

                                    <a class="btn btn-primary" href="{{ url('/clientes/' . $cliente->id . '/edit') }}">
                                        Editar
                                    </a>
                                    <!--
                                                            <p>||</p>

                                                            <form action="{{ url('/clientes/' . $cliente->id) }}" method="post"
                                                                class="formularioEliminar">
                                                                @csrf
                                                                {{ method_field('DELETE') }}

                                                                <input class="btn btn-danger" type="submit" value="Borrar">


                                                            </form>
                                                            -->


                                </div>


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>


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

    <script>
        @if (session('cliente_ok') == 'ok')

            Swal.fire(
                'Cliente Creado Con Exito!!!',
                'Continuar',
                'success'
            )
        @endif
    </script>
@stop
