@extends('adminlte::page')

@section('title', 'Cliente Editar')

@section('content_header')
    <h1> Editar Cliente</h1>
@stop

@section('css')

    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}">
@stop

@section('content')

    <form action="{{ url('/clientes/' . $clientes->id) }}" method="post">
        @csrf
        {{ method_field('PATCH') }}

        @include('clientes.form', ['modo' => 'Editar'])

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
