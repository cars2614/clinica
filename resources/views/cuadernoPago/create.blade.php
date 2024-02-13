@extends('adminlte::page')

@section('title', 'Cuaderno Empleado Crear')

@section('content_header')
    <h2>Cuaderno Empleado</h2>
    <a href="{{ url('/cuadernoPago/') }}" class="btn btn-info m-2">Todos Los Registro</a>
    <br>
@stop

@section('content')

    {{-- caja principal --}}
    <div class="row">

        {{-- caja  --}}
        <div class="col-md-12">

            <form action=" {{ url('/cuadernoPago') }}" method="post">

                @csrf

                @php
                    date_default_timezone_set('America/bogota');
                    
                    $hora = date('Y-m-d H:i');
                    
                @endphp

                <div class="form-group">


                    <div class="form-group row mb-1">

                        <div class="form-group col-12">

                            <label for="" class="form-label col-12">Fecha: </label>
                            <input type="text" class="form-control form-control-lg" name="fecha_cuaderno_pago"
                                id="fecha_cuaderno_pago" value="{{ $hora }}" readonly>

                        </div>


                        <div class="form-group col-6">
                            <label for="" class="form-label col-12">Nombre Empleado:</label>

                            <select class="form-control form-control-lg " name=" empleados_id" id="empleados_id" required>
                                <option value="">Seleccione Empleado</option>

                                @foreach ($empleados as $empleado)
                                    <option value=" {{ $empleado->id ?? '' }} "> {{ $empleado->nombre_empleado ?? '' }}
                                    </option>
                                @endforeach
                            </select>

                        </div>


                        <div class="form-group  col-6">
                            <label for="" class="form-label col-12">Codigo Factura"Cuaderno":</label>

                            <select class="form-control form-control-lg " name=" facturas_id" id="facturas_id" required>
                                <option value="">Seleccione # Cuaderno</option>
                                @foreach ($facturas as $factura)
                                    
                                    <option value=" {{ $factura->id  ?? '' }} ">
                                         {{ $factura->id ?? '' }}
                                         |*|{{ $factura->nombre_cliente ?? '' }} 
                                         |*|{{$factura->estado ?? ''}} 
                                         |*|{{$factura->fecha ?? ''}} </option>
                                @endforeach
                            </select>


                            
                        </div>
                        
                            {{-- prueba --}}
                            @php
                                
                                // echo  var_dump($facturas ?? '');  
                            @endphp

                    </div>

                    <div class="form-group row mb-1">

                        <!--div del detalle -->
                        <div class="form-group  col-12">

                            <label for="" class="form-label col-12">Detalle:</label>
                            <input type="text" class="form-control form-control-lg" name="detalle_cuaderno_pago"
                             id="detalle_cuaderno_pago" placeholder="Escriba el detalle">

                        </div>

                    </div> 
                    
                    <div  class="form-group row mb-0">
                    <input type="submit" class="btn btn-primary col-12" value="Guardar">

                </div>

        </div>


        </form>

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
        @if (session('cuaderno_pago_ok') == 'ok')

            Swal.fire(
                'Agregado Al Cuaderno De Pago con Exito!!!',
                'Continuar',
                'success'
            )
        @endif
    </script>
@stop
