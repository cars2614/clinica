@extends('adminlte::page')

@section('title', 'Empleado crear')

@section('content_header')
    <h1>Crear Empleado</h1>
   
@stop

@section('content')

    <form action="{{ url('/empleados') }}" method="post">
        @csrf {{-- llave de seguridad --}}

        @include('empleados.form', ['modo'=>'Crear'])

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
