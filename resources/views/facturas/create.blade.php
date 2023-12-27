@extends('adminlte::page')

@section('title', 'Facturas')

@section('content_header')

    <div class="card">
        <div class="card-body">


            <div class="container-header">

                <h2>Facturar</h2> <br>
                <a href="{{ url('/facturas') }}" class="btn btn-info m-2">Total Facturas Del Dia</a>
                <a href="{{ url('/clientes/create') }}" class="btn btn-info m-2">Agregar Cliente Nuevo</a>
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



                    <div class="mb-3 col-9">
                        <label for="" class="form-label">Codigo Cliente:</label>

                        <select name="clientes_id" id="clientes_id" class="form-control form-control-lg">
                            <option value="">Seleccione Cliente</option>
                            @foreach ($lista_clientes as $cliente)
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

                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Fecha Entrega: </label>
                        <input type="datetime-local" class="form-control form-control-lg" name="fec_entrega"
                            id="fec_entrega" value="" required>
                        @error('fec_entrega')
                            <br>
                            <small class="alert-danger"> *{{ $message }}</small>
                            <br>
                        @enderror
                    </div>

                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Precio: </label>
                        <input type="number" class="form-control form-control-lg" name="precio_factura" id="precio_factura"
                            placeholder="Ingrese el precio total" value="" required>
                        @error('precio_factura')
                            <br>
                            <small class="alert-danger"> *{{ $message }}</small>
                            <br>
                        @enderror
                    </div>

                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Abono: </label>
                        <input type="number" class="form-control form-control-lg" name="abono_factura" id="abono_factura"
                            placeholder="Ingrese el abono" value="" required>
                        @error('abono_factura')
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





@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
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
        @if (session('factura_ok') == 'ok')

            Swal.fire(
                'Registro Creado Con Exito!!!',
                'Continuar',
                'success'
            )
        @endif
    </script>
@stop
