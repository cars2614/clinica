<a href="{{ url('/clientes/') }}" class="btn btn-info m-2">Volver</a>
<a href="{{ url('/facturas/create') }}" class="btn btn-info m-2">Crear Factura</a>
<br><br>

@section('css')
    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@stop


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


<div class="mb-3">
    <label for="" class="form-label">Telefono: </label>
    <input type="number" class="form-control form-control-lg" name="telefono_cliente" id="telefono_cliente"
        placeholder="Ingrese el numero telefonico" value="{{ $clientes->telefono_cliente ?? '' }}">

</div>

<div class="mb-3">
    <label for="" class="form-label">Nombre: </label>
    <input type="text" class="form-control form-control-lg" name="nombre_cliente" id="nombre_cliente"
        placeholder="Ingrese el nombre" value="{{ $clientes->nombre_cliente ?? '' }}">
</div>

<div class="mb-3">
    <label for="" class="form-label">Direccion: </label>
    <input type="text" class="form-control form-control-lg" name="direccion_cliente" id="direccion_cliente"
        placeholder="Ingrese la direccion" value="{{ $clientes->direccion_cliente ?? '' }}">
</div>

<div class="mb-3">
    <input type="submit" class="form-control form-control-lg btn btn-primary" value="{{ $modo }}">
</div>
