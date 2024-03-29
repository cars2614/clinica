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
    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
