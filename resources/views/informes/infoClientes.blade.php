@extends('adminlte::page')

@section('css')

   <link rel="stylesheet" href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">

@stop

@section('title', 'infoClientes')



@section('content')


    <div id="container">
        <div id="row">


            <form action=" {{ route('informes.consultaClientes')  }}" method="post">
                @csrf
                <div>
                    <h2>Consulta de Clientes Por Fechas</h2>
                </div>
                <br>


                <div class="form-group row mb-0">

                    <div class="mb-3 col-4">
                        <label class="form-label" for="fechaInicio">Fecha Inicial</label>
                        <input type="date" class="form-control form-control-lg" id="fechaInicio" name="fechaInicio"
                            value="{{ $fechaInicio ?? '' }}" required>
                    </div>

                    <div class="mb-3 col-4">
                        <label class="form-label" for="fechaFin">Fecha Final</label>
                        <input type="date" class="form-control form-control-lg" id="fechaFin" name="fechaFin"
                            value="{{ $fechaFin ?? '' }}" required>

                    </div>

                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Telefono Cliente:</label>

                        <select name="clientes_id" id="clientes_id" class="form-control form-control-lg">
                            <option value="">Seleccione Cliente</option>

                            @if (isset($consulaClientes))

                                @foreach ($consulaClientes as $cliente)
                                    <option value= "{{ $cliente->id }}"> {{ $cliente->telefono_cliente }}
                                        {{ $cliente->nombre_cliente }}
                                    </option>
                                @endforeach

                        </select>
                        @error('clientes_id')
                            <br>
                            <small class="alert-danger"> *{{ $message }}</small>
                            <br>
                        @enderror

                        @endif

                    </div>

                    <div class="mb-3 col-12">
                        <br>

                        <input type="submit" class="form-control form-control-lg btn btn-primary" value="Consultar">

                    </div>




                </div>

            </form>

        </div>{{-- Fin contenedor ROW --}}



        <div id="row">
            <div class="card">
                <div class="card-body">




                    <table id="infoClientes" class="table table-striped">
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
                                <th>Fecha Estado</th>
                            </tr>
                        </thead>

                        <!-- Mostrar resultados de la consulta -->
                        @if (isset($clientesInformeGeneral))

                            <tbody>
                                @foreach ($clientesInformeGeneral as $factura)
                                    <tr>
                                        <td>{{ $factura->id_factura }}</td>
                                        <td>{{ $factura->fecha_factura }}</td>
                                        <td>{{ $factura->nombre_cliente }}</td>
                                        <td>{{ $factura->num_prendas }}</td>
                                        <td>{{ $factura->descripcion_factura }}</td>
                                        <td>{{ $factura->fec_entrega }}</td>
                                        <td>{{ $factura->precio_factura }}</td>
                                        <td>{{ $factura->abono_factura }}</td>
                                        <td>{{ $factura->estado }}</td>
                                        <td>{{ $factura->fecha_estados }}</td>





                                    </tr>
                                @endforeach
                                <?php //var_dump($lista_factura);
                                ?>
                            </tbody>



                    </table>


                </div>
            </div>



            @endif


        </div>



    </div>{{-- Fin del CONTAINER  --}}



@stop



@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $('#infoClientes').DataTable();
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
