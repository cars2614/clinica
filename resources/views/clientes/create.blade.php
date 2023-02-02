@extends('adminlte::page')

@section('title', 'Cliente crear')

@section('content_header')
    <h1>Crear Cliente</h1>
   
@stop

@section('content')

    <form action="{{ url('/clientes') }}" method="post">
        @csrf {{-- llave de seguridad --}}

        @include('clientes.form', ['modo'=>'Crear'])

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
