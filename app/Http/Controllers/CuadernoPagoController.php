<?php

namespace App\Http\Controllers;


use App\Models\Clientes;
use App\Models\CuadernoPago;

use App\Models\Estado;
use App\Models\DetallesEstado;

use App\Models\Facturas;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CuadernoPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //funciona correcto; pero se puede mejorar
       // $datosCuadernoPago['cuadernoPago'] = CuadernoPago::paginate(10000);
        //return view('cuadernoPago.index',$datosCuadernoPago);

        /*
        ! EN PROCESO.
        
        */
        $CuadernoPago = DB::select('SELECT cuaderno_pagos.fecha_cuaderno_pago, 
        empleados.nombre_empleado, facturas.id, clientes.nombre_cliente, facturas.precio_factura
        FROM cuaderno_pagos
        INNER JOIN empleados ON cuaderno_pagos.empleados_id = empleados.id
        INNER JOIN facturas ON cuaderno_pagos.facturas_id = facturas.id
        INNER JOIN clientes ON facturas.clientes_id = clientes.id  
        ORDER BY fecha_cuaderno_pago DESC');

        $datosCuadernoPago = array('lista_cuaderno'=>$CuadernoPago);

        return response()->view('cuadernoPago/index', $datosCuadernoPago );

        //return view('cuadernoPago.index',$datosCuadernoPago);

        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //EMPLEADO
        $empleado = Empleado::all();
        $datosEmpleados = array("lista_empleados" => $empleado);

        //CODIGO FACTURA 
        /* Se hace la consulta para que aparezcan solo los pendientes */

        //la consulta si funciona
        
        $factura = DB::select('SELECT facturas.id, clientes.nombre_cliente, detalles_estados.facturas_id, estados.estado, detalles_estados.fecha
            FROM detalles_estados
            INNER JOIN estados ON detalles_estados.estados_id = estados.id
            INNER JOIN facturas ON detalles_estados.facturas_id = facturas.id
            INNER JOIN clientes ON clientes.id = facturas.clientes_id
            WHERE estados.id = 1
            AND NOT EXISTS (
                SELECT 1
                FROM detalles_estados as de2
                INNER JOIN estados as e2 ON de2.estados_id = e2.id
                WHERE de2.facturas_id = facturas.id
                AND e2.id > 1
  )
                GROUP BY facturas.id, clientes.nombre_cliente, detalles_estados.facturas_id, estados.estado, detalles_estados.fecha;'); 


        return response()->view('cuadernoPago.create', ['empleados' => $empleado, 'facturas' => $factura] );
        
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* 
       UPDATE `facturas` SET `estado`='trabajado' WHERE `id`=1
       */

        /* 
        Facturas $actualizar_factura_estado = DB::update(
            'UPDATE facturas 
            SET estado="trabajado" 
            WHERE id= facturas_id');
             */

        //validaremos e ingresaremos los registros  
        $datosCuadernoPago = request()->except('_token');
        
        CuadernoPago::insert($datosCuadernoPago);
        return redirect('/cuadernoPago/create');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CuadernoPago  $cuadernoPago
     * @return \Illuminate\Http\Response
     */
    public function show(CuadernoPago $cuadernoPago)
    {
        //PRUEBA

        //CODIGO FACTURA 
        $factura = Facturas::all();
        $datosFacturas = array("lista_facturas => $factura ");


        return response()->view("cuadernoPago/create", $datosFacturas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CuadernoPago  $cuadernoPago
     * @return \Illuminate\Http\Response
     */
    public function edit(CuadernoPago $cuadernoPago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CuadernoPago  $cuadernoPago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CuadernoPago $cuadernoPago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CuadernoPago  $cuadernoPago
     * @return \Illuminate\Http\Response
     */
    public function destroy(CuadernoPago $cuadernoPago)
    {
        //
    }
}