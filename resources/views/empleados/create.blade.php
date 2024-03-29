@extends('adminlte::page')

@section('title', 'Empleado crear')

@section('content_header')
    <h1>Crear Empleado</h1>

@stop

@section('content')

    <form action="{{ url('/empleados') }}" method="post">
        @csrf {{-- llave de seguridad --}}

        @include('empleados.form', ['modo' => 'Crear'])

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
