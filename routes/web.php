<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\CuadernoPagoController;
use App\Http\Controllers\DetallesEstadoController;
use App\Http\Controllers\FacturasController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\InformesController;
use App\Http\Controllers\PrestamosController;
//use App\Models\DetallesEstado;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');


/* ->middleware('auth') SE UTILIZA PARA DENEGAR EL ACCESO SI NO ESTA LOGEADO*/


/* ruta de clientes */
/* mostramos todas las rutas del crud */
Route::resource('clientes', ClientesController::class)->middleware('auth');

/* rutas de facturas */
Route::resource('facturas',  FacturasController::class)->middleware('auth');

/* rutas Emplado */
route::resource('empleados', EmpleadoController::class)->middleware('auth');

/* rutas de prestamos */
route::resource('prestamos', PrestamosController::class)->middleware('auth');

/* rutas cuaderno empleados */
route::resource('cuadernoPago', CuadernoPagoController::class)->middleware('auth');

/* rutas cuaderno detalles estados */
route::resource('detallesEstados', DetallesEstadoController::class)->middleware('auth');

/* rutas informes */
route::resource('informes', InformesController::class)->middleware('auth');