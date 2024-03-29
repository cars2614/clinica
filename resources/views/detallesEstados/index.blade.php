@extends('adminlte::page')

@section('title', 'Entrega')

@section('content_header')
    <h2>Entrega de Prendas</h2>

    <br>
@stop


@section('content')

    {{-- caja principal --}}
    <div class="row">

        {{-- caja  --}}
        <div class="col-md-12">

            <form action=" {{ url('/detallesEstados') }}" method="post">

                @csrf


                <div class="form-group">

                    <div class="form-group row mb-1">

                        <div class="form-group col-6">

                            <label for="" class="form-label col-6">Numero Factura: </label>
                            <select class="form-control form-control-lg " name=" facturas_id" id="facturas_id" required>
                                <option value="">Seleccione # La Factura</option>
                                @foreach ($facturas as $factura)
                                    <option value=" {{ $factura->id ?? '' }} "> {{ $factura->id ?? '' }}
                                        {{ $factura->nombre_cliente ?? '' }} </option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group col-6">

                            <label for="" class="form-label col-6">Estado: </label>

                            <select class="form-control form-control-lg " name=" estados_id" id="estados_id" required>
                                <option value="">Seleccione # El Estado</option>
                                @foreach ($estados as $estado)
                                    <option value=" {{ $estado->id ?? '' }} "> {{ $estado->estado ?? '' }}</option>
                                @endforeach
                            </select>

                        </div>




                    </div>



                    <div class="form-group row mb-0">
                        <input type="submit" class="btn btn-primary col-12" value="Guardar">
                    </div>

                </div>


            </form>

        </div>




    </div>


    <!-- -->
    <table class="table table-striped ">

        <thead class="thead-striped ">
            <tr>
                <th>Fecha</th>
                <th>Numero de Factura</th>
                <th>Nombre del Cliente</th>
                <th>precio</th>
                <th>Abono</th>
                <th>Estado</th>

            </tr>
        </thead>

        <tbody>

            @foreach ($todasLasacturas as $registros)
                <tr>
                    <td>{{ $registros->fecha ?? '' }}</td>
                    <td>{{ $registros->id ?? '' }}</td>
                    <td>{{ $registros->nombre_cliente ?? '' }}</td>
                    <td>{{ $registros->precio_factura ?? '' }}</td>
                    <td>{{ $registros->abono_factura ?? '' }}</td>
                    <td>{{ $registros->estado ?? '' }}</td>


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
        @if (session('entregado_ok') == 'ok')
            Swal.fire(
                'Entregado Con Exito!!!',
                'Continuar',
                'success'
            )
        @endif
    </script>
@stop
