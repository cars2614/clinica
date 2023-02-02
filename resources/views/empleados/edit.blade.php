@extends('adminlte::page')

@section('title', 'Empleado Editar')

@section('content_header')
    <h1> Editar Empleado</h1>
@stop

@section('content')

<form action="{{ url('/empleados/'.$empleados->id) }}" method="post">
@csrf
{{ method_field('PATCH') }}

    @include('empleados.form', ['modo'=>'Editar'] )

</form>

    


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
