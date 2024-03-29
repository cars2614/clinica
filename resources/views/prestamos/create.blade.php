@extends('adminlte::page')

@section('title', 'Prestamos')

@section('content_header')

    <div class="container-header">

        <h2>Prestamos</h2> <br>
        <a href="{{ url('/prestamos') }}" class="btn btn-info m-2">Total Prestamos</a>

    </div>


@stop





@section('content')

    <div class="container">


        {{-- FORMULARIO DE INGRESO DE PRENDAS --}}

        <div div class="col-sm-12">

            <form action=" {{ url('/prestamos') }}" method="post" id="formPrestamos">

                @csrf

                <div class="form-group row mb-0">



                    <div class="mb-6 col-6">
                        <label for="" class="form-label">Codigo Empleado:</label>
                        <select name="empleados_id" class="form-control form-control-lg">
                            <option value="">Seleccione Empleado</option>

                            @foreach ($lista_empleados as $empleado)
                                <option value="{{ $empleado->id }}"> {{ $empleado->telefono_empleado }}
                                    {{ $empleado->nombre_empleado }}
                                </option>
                            @endforeach
                        </select>

                        @error('empleados_id')
                            <br>
                            <small class="alert-danger"> *{{ $message }}</small>
                            <br>
                        @enderror



                    </div>

                    <div class="mb-6 col-6">
                        <label for="" class="form-label">Precio: </label>
                        <input type="number" class="form-control form-control-lg" name="precio_prestamo"
                            id="precio_prestamo" placeholder="Ingrese el valor prestado" value="" required>
                        @error('precio')
                            <br>
                            <small> *{{ $message }}</small>
                            <br>
                        @enderror
                    </div>

                </div>


                <div class="mb-3">
                    <label for="" class="form-label">Description: </label>
                    <input type="textarea" class="form-control form-control-lg" name="descripcion_prestamo"
                        id="descripcion_prestamo" placeholder="Describa el motivo del prestamo" value="" required>
                    @error('descripcion')
                        <br>
                        <small> *{{ $message }}</small>
                        <br>
                    @enderror
                </div>


                <div class="mb-3">
                    <input type="submit" class="form-control form-control-lg btn btn-primary" value="Guardar">
                </div>



            </form>


        </div>




    </div>

    </div>



@stop





@section('css')
    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@stop

@section('js')

    <link rel="stylesheet" href="../../js/formularios/validacionPrestamos.js">

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
