<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\CuadernoPagoController;
use App\Http\Controllers\DetallesEstadoController;
use App\Http\Controllers\FacturasController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\InformesController;
use App\Http\Controllers\PrestamosController;
use App\Http\Controllers\ConsultaCliente;

//use App\Models\DetallesEstado;


/* 
El ->name('welcome') Se utiliza para colocarle un nombre fijo a la rura.... asi cambie de nombre la ruta 
siempre se la podemos llamar como la renombremos.
*/

Route::view('/', 'welcome')->name('welcome');


Auth::routes();


/* 
->middleware('auth') SE UTILIZA PARA DENEGAR EL ACCESO SI NO ESTA LOGEADO
*/

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');


/* ruta de clientes */
/* mostramos todas las rutas del crud */
Route::resource('clientes', ClientesController::class)->middleware('auth');

/* rutas de facturas */

Route::resource('facturas',  FacturasController::class)->middleware('auth');
//Route::get('/facturas/xxx', [FacturasController::class, 'consultaClientes'])->name('facturas.consultaClientes')->middleware('auth');


/* rutas Emplado */
route::resource('empleados', EmpleadoController::class)->middleware('auth');

/* rutas de prestamos */
route::resource('prestamos', PrestamosController::class)->middleware('auth');

/* rutas cuaderno empleados */
route::resource('cuadernoPago', CuadernoPagoController::class)->middleware('auth');

/* rutas cuaderno detalles estados */
route::resource('detallesEstados', DetallesEstadoController::class)->middleware('auth');

/* rutas informes */
route::get('/informes/infoClientes',    [InformesController::class, 'infoClientes'])->name('informes.infoClientes')->middleware('auth');
route::post('/informes/infoClientes',    [InformesController::class, 'consultaClientes'])->name('informes.consultaClientes')->middleware('auth');

/* informes empleados */
route::get('/informes/infoEmpleados',    [InformesController::class, 'infoEmpleados'])->name('informes.infoEmpleados')->middleware('auth');
route::post('/informes/infoEmpleados',    [InformesController::class, 'consultaEmpleados'])->name('informes.consultaEmpleados')->middleware('auth');


route::post('/informes/consultaGeneral', [InformesController::class, 'consultaGeneral'])->name('informes.consultaGeneral')->middleware('auth');
route::resource('informes', InformesController::class)->middleware('auth');
