{{-- @extends('layouts.app') --}}

@extends('adminlte::page')



@section('title', 'Inicio')

@section('content_header')
    <h1>Bienvenido</h1>
@stop

@section('content')


    <div class="row">
        {{-- Tarjeta Registros --}}
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-econdary card-header-icon">
                    <div class="card-icon">


                        <i class="fas fa-users"></i>
                    </div>
                    <a href="{{ url('/facturas/create') }}" class="card-category text-dark font-weight-bold">
                        Totos Nuestros Registros
                    </a>

                    <h2>

                        @foreach ($numeroFactura as $num)
                            <b>
                                {{ $num->cantidad }}
                            </b>
                        @endforeach

                    </h2>

                </div>

                <div class="card-footer bg-dark text-dark">
                </div>

            </div>
        </div>
        {{-- Fin Tarjeta --}}



        {{-- Tarjeta Clientes --}}
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-econdary card-header-icon">
                    <div class="card-icon">


                        <i class="fas fa-user-check"></i>
                    </div>
                    <a href="{{ url('/clientes') }}" class="card-category text-dark font-weight-bold">
                        Totos Nuestros Clientes
                    </a>

                    <h2>

                        @foreach ($numeroClientes as $num)
                            <b>
                                {{ $num->cantidad }}
                            </b>
                        @endforeach

                    </h2>

                </div>

                <div class="card-footer bg-dark text-dark">
                </div>

            </div>
        </div>
        {{-- Fin Tarjeta --}}



        {{-- Tarjeta Empleados --}}
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-econdary card-header-icon">
                    <div class="card-icon">


                        <i class="fas fa-id-card-alt"></i>
                    </div>
                    <a href="{{ url('/empleados') }}" class="card-category text-dark font-weight-bold">
                        Totos Nuestros Empleados
                    </a>

                    <h2>

                        @foreach ($numeroEmpleados as $num)
                            <b>
                                {{ $num->cantidad }}
                            </b>
                        @endforeach

                    </h2>

                </div>

                <div class="card-footer bg-dark text-dark">
                </div>

            </div>
        </div>
        {{-- Fin Tarjeta --}}




    </div>





@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
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
