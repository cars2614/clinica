<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetallesEstado;

use App\Models\Facturas;
use App\Models\Clientes;
use App\Models\Empleado;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $numeroFactura = DB::select('SELECT COUNT(*)AS cantidad FROM facturas');
        $numeroClientes = DB::select('SELECT COUNT(*)AS cantidad FROM clientes');
        $numeroEmpleados = DB::select('SELECT COUNT(*)AS cantidad FROM empleados');
        

        //dd($numeroFactura);
        return view('home', compact('numeroFactura', 'numeroClientes', 'numeroEmpleados'));
    }
}
