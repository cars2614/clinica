@extends('adminlte::page')

@section('title', 'Empleado')

@section('content_header')
    <h2>Empleado</h2>
    <a href="{{ url('/empleados/create/') }}" class="btn btn-info m-2">Agregar Empleado</a>
    <br>
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
                    @foreach ($empleados as $empleado)
                        <tr>
                          
                            <td>{{ $empleado->telefono_empleado }}</td>
                            <td>{{ $empleado->nombre_empleado }}</td>
                            <td>{{ $empleado->direccion_empleado }}</td>

                            <td>


                                <div class="btn-group" role="group" aria-label="Button group">

                                    <a class="btn btn-primary" href="{{ url('/empleados/' . $empleado->id . '/edit') }}">
                                        Editar
                                    </a>
                                    <!--

    <p>||</p>

    <form action="{{ url('/empleados/' . $empleado->id) }}" method="post"
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
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
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

        /*     */
    </script>

    <script>
        @if (session('empleado_ok') == 'ok')

            Swal.fire(
                'Empleado Creado Con Exito!!!',
                'Continuar',
                'success'
            )
        @endif
    </script>
@stop
