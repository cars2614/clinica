<?php

use Illuminate\Support\Facades\Route;
use app\Controller\ClientController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/* Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 */


/* ruta de clientes */
/* mostramos todas las rutas del crud */
Route::resource('clientes', ClientesController::class);

/* rutas de facturas */
Route::resource('facturas',  FacturasController::class);

/* rutas Emplado */
route::resource('empleados', EmpleadoController::class );

/* rutas de prestamos */
route::resource('prestamos', PrestamosController::class );

/* rutas cuaderno empleados */
route::resource('cuadernoPago', CuadernoPagoController::class );

/* rutas cuaderno detalles estados */
route::resource('detallesEstados', DetallesEstadoController::class);

/* rutas informes */
route::resource('informes', InformesController::class);