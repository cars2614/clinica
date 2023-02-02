<a href="{{ url('/empleados/') }}" class="btn btn-info m-2">Volver</a>
<br><br>

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
    <input type="number" class="form-control form-control-lg" name="telefono_empleado" id="telefono_empleado"
        placeholder="Ingrese el numero telefonico" value="{{ $empleados->telefono_empleado ?? '' }}">

</div>

<div class="mb-3">
    <label for="" class="form-label">Nombre: </label>
    <input type="text" class="form-control form-control-lg" name="nombre_empleado" id="nombre_empleado" placeholder="Ingrese el nombre"
        value="{{ $empleados->nombre_empleado ?? '' }}">
</div>

<div class="mb-3">
    <label for="" class="form-label">Direccion: </label>
    <input type="text" class="form-control form-control-lg" name="direccion_empleado" id="direccion_empleado"
        placeholder="Ingrese la direccion" value="{{ $empleados->direccion_empleado ?? '' }}">
</div>

<div class="mb-3">
    <input type="submit" class="form-control form-control-lg btn btn-primary" value="{{ $modo }}">
</div>
