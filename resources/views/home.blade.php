{{-- @extends('layouts.app') --}}

@extends('adminlte::page')



@section('title', 'Inicio')

@section('content_header')
    <h1>Bienvenido</h1>
@stop

@section('content')
    <p>Pagina Inicial</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>

      /* 
      se comenta para que no salga la alerta al inicio
      solo es una prueba de que funciona bien       
        Swal.fire(
            'Bienvenid@!',
            'Ejemplo alert2!',
            'success'
        ) */

    </script>
@stop

{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
