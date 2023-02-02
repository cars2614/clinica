@extends('adminlte::page')

@section('title', 'Cliente Editar')

@section('content_header')
    <h1> Editar Cliente</h1>
@stop

@section('content')

<form action="{{ url('/clientes/'.$clientes->id) }}" method="post">
@csrf
{{ method_field('PATCH') }}

    @include('clientes.form', ['modo'=>'Editar'] )

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
