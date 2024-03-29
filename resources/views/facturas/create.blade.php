@extends('adminlte::page')

@section('title', 'Facturas')



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

    <link rel="stylesheet" href="{{ asset('/vendor/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}">
@stop


@section('content_header')

    <div class="card">
        <div class="card-body">

            <div class="form-group row mb-0">

                <div class="mb-6 col-3">

                    <a href="{{ url('/facturas') }}" class="btn btn-info m-2">Total Facturas Del Dia</a>
                    {{--  <a href="{{ url('/clientes/create') }}" class="btn btn-info m-2">Agregar Cliente Nuevo</a> --}}

                </div>

                <div class="mb-6 col-3">

                    <form action="{{ url('/clientes') }}" method="post">





                        @csrf
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- cabecera del modal -->
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Datos Del Cliente</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <!-- Cuerpo del modal -->
                                    <div class="modal-body">

                                        <div class="form-row">


                                            <div class="mb-3">
                                                <label for="" class="form-label">Telefono: </label>
                                                <input type="number" class="form-control form-control-lg"
                                                    name="telefono_cliente" id="telefono_cliente"
                                                    placeholder="Ingrese el numero telefonico" required>

                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="form-label">Nombre: </label>
                                                <input type="text" class="form-control form-control-lg"
                                                    name="nombre_cliente" id="nombre_cliente"
                                                    placeholder="Ingrese el nombre" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="form-label">Direccion: </label>
                                                <input type="text" class="form-control form-control-lg"
                                                    name="direccion_cliente" id="direccion_cliente"
                                                    placeholder="Ingrese la direccion">
                                            </div>


                                        </div>
                                    </div>

                                    <!-- Pie/Footer del modal -->
                                    <div class="modal-footer">


                                        <div class="col-12 mb-12">
                                            <input type="submit" class="form-control form-control-lg btn btn-primary"
                                                value="Guardar">
                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-info m-2" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Agregar Cliente Nuevo
                        </button>

                        {{-- mostramos si ya se agrego el numero de telefono y lo mostramos en una caja  --}}
                        @if ($errors->any())

                            <div class="alert alert-danger">

                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li> {{ $error }}</li>
                                    @endforeach
                                </ul>

                            </div>
                        @endif


                    </form>
                </div>



                <div class="card-body">
                    @foreach ($numeroFactura as $num)
                        <h3>Proximo Codigo
                            <b>
                                {{ $num->cantidad + 1 }}
                            </b>
                        </h3>
                    @endforeach
                </div>


            </div>
        </div>
    </div>



@stop

@section('content')

    <div class="card">
        <div class="card-body">

            {{-- FORMULARIO DE INGRESO DE PRENDAS --}}

            <form action=" {{ url('/facturas') }}" method="post">

                <!--llave de seguridad... sin esta el fomulario no se envia-->
                @csrf


                <div class="form-group row mb-0">

                    <div class="mb-3 col-6">
                        <label for="clientes_id" class="form-label">Nombre del Cliente</label>

                        <input type="hidden" id="clientes_id" name="clientes_id"class="form-control form-control-lg"
                            required>
                        <input type="text" id="nombre" class="form-control form-control-lg"
                            placeholder="Ingrese nombre del cliente">



                        @error('clientes_id')
                            <br>
                            <small class="alert-danger"> *{{ $message }}</small>
                            <br>
                        @enderror

                    </div>

                    <div class="mb-3 col-3">
                        <label for="telefono" class="form-label">Telefono del Cliente</label>
                        <input type="text" id="telefono" class="form-control form-control-lg" readonly>

                    </div>

                    <div class="mb-3 col-3">
                        <label for="" class="form-label"># Prendas: </label>
                        <input type="number" class="form-control form-control-lg" name="num_prendas" id="num_prendas"
                            placeholder="# prendas" value="" required>
                        @error('num_prendas')
                            <br>
                            <small class="alert-danger"> *{{ $message }}</small>
                            <br>
                        @enderror
                    </div>


                </div>


                <div class="mb-3">
                    <label for="" class="form-label">Description: </label>
                    <textarea type="textarea" class="form-control form-control-lg" name="descripcion_factura" id="descripcion_factura"
                        placeholder="Describa todo lo que deja el cliente" value="" required></textarea>
                    @error('descripcion_factura')
                        <br>
                        <small class="alert-danger"> *{{ $message }}</small>
                        <br>
                    @enderror
                </div>

                <div class="form-group row mb-0">

                    <div class="mb-3 col-3">
                        <label for="" class="form-label">Fecha Entrega: </label>
                        <input type="datetime-local" class="form-control form-control-lg" name="fec_entrega"
                            id="fec_entrega" value="" required>
                        @error('fec_entrega')
                            <br>
                            <small class="alert-danger"> *{{ $message }}</small>
                            <br>
                        @enderror
                    </div>

                    <div class="mb-3 col-3">
                        <label for="" class="form-label">Precio: </label>
                        <input type="number" class="form-control form-control-lg" name="precio_factura"
                            id="precio_factura" placeholder="Ingrese el precio total" value="" required>
                        @error('precio_factura')
                            <br>
                            <small class="alert-danger"> *{{ $message }}</small>
                            <br>
                        @enderror
                    </div>

                    <div class="mb-3 col-3">
                        <label for="" class="form-label">Abono: </label>
                        <input type="number" class="form-control form-control-lg" name="abono_factura"
                            id="abono_factura" placeholder="Ingrese el abono" value="" required>
                        @error('abono_factura')
                            <br>
                            <small class="alert-danger"> *{{ $message }}</small>
                            <br>
                        @enderror
                    </div>


                    {{-- EMPLEADO --}}

                    <div class="mb-3 col-3">
                        <label for="" class="form-label">Empleado que recibe:</label>

                        <select name="empleados_id" id="empleados_id" class="form-control form-control-lg" required>
                            <option value="">Seleccione Empleado</option>
                            @foreach ($lista_empleados as $empleado)
                                <option value= "{{ $empleado->id }}">
                                    {{ $empleado->telefono_empleado }} {{ $empleado->nombre_empleado }}
                                </option>
                            @endforeach
                        </select>
                        @error('empleados_id')
                            <br>
                            <small class="alert-danger"> *{{ $message }}</small>
                            <br>
                        @enderror

                    </div>



                </div>

                <div class="mb-3">
                    <input type="submit" class="form-control form-control-lg btn btn-primary" value="Guardar">
                </div>



            </form>







        </div>
    </div>


@stop







@section('js')

    <script src="{{ asset('/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/vendor/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


    <script>
        @if (session('factura_ok') == 'ok')

            Swal.fire(
                'Registro Creado Con Exito!!!',
                'Continuar',
                'success'
            )
        @endif
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


    <script>
        $('#nombre').autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{ route('consultaClientes') }}",
                    dataType: 'json',
                    data: {
                        term: request.term
                    },
                    success: function(data) {


                        response(data)
                    }

                });

            },
            select: function(event, ui) {

                // Rellenar el campo visible con el nombre del cliente
                $('#cliente_nombre').val(ui.item.nombre);
                // Asignar el ID del cliente al campo oculto
                $('#clientes_id').val(ui.item.id);
                // Agrega más campos según sea necesario
                $('#telefono').val(ui.item.telefono);
            }
        });






        //Prueba 
        /*  let nombre = ['css', 'html', 'javascript', 'php'];

         $('#nombrejs').autocomplete({
             source: nombre
         }); */
        //Fin de la prueba
    </script>

@stop
