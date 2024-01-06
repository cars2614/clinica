<?php

namespace App\Http\Controllers;

use App\Models\Informes;


use App\Models\Facturas;
use App\Models\Clientes;
use Illuminate\Http\Request;

use App\Http\Controllers\FacturasController;
use Illuminate\Support\Facades\DB;

class InformesController extends Controller
{


    public function consultaGeneral(Request $request)
    {


        $consultaG = new Informes;

        $fechaInicio = $consultaG->fechaInicio = $request->fechaInicio;
        $fechaFin = $consultaG->fechaFin = $request->fechaFin;

        // dd($fechaInicio, $fechaFin);  /*Compruebo que las variables lleguen*/


        $facturasInformeGeneral = DB::select(
            'SELECT f.id AS id_factura,  f.fecha_factura, c.nombre_cliente, f.num_prendas, f.descripcion_factura,
            f.fec_entrega, f.precio_factura, f.abono_factura, es.estado, d_e.fecha AS fecha_estados
            FROM facturas as f 
            INNER JOIN detalles_estados as d_e
            ON f.id = d_e.facturas_id 
            INNER JOIN estados AS es
            ON es.id = d_e.estados_id
            INNER JOIN clientes as c 
            ON c.id = f.clientes_id
            
            WHERE DATE(fecha_factura)>= ? AND DATE(fecha_factura)<= ?
            ORDER BY  id_factura DESC',
            [$fechaInicio, $fechaFin]
        );




        // Retornar la vista con las facturas

        return view('informes.index', compact('facturasInformeGeneral'));
    }


    public function infoClientes()
    {

        $consulaClientes = DB::select('SELECT * FROM clientes');


        return view('informes.infoClientes', compact('consulaClientes'));
    }

    public function consultaClientes(Request $request)
    {


        $consultaClie = new Informes;

        $fechaInicio = $consultaClie->fechaInicio = $request->fechaInicio;
        $fechaFin = $consultaClie->fechaFin = $request->fechaFin;
        $clientes_id = $consultaClie->clientes_id = $request->clientes_id;

        // dd($fechaInicio, $fechaFin);  Compruebo que las variables lleguen


        $clientesInformeGeneral = DB::select(
            'SELECT f.id AS id_factura,  f.fecha_factura, c.nombre_cliente, f.num_prendas, f.descripcion_factura,
            f.fec_entrega, f.precio_factura, f.abono_factura, es.estado, d_e.fecha AS fecha_estados
            FROM facturas as f 
            INNER JOIN detalles_estados as d_e
            ON f.id = d_e.facturas_id 
            INNER JOIN estados AS es
            ON es.id = d_e.estados_id
            INNER JOIN clientes as c 
            ON c.id = f.clientes_id
            
            WHERE DATE(fecha_factura)>= ? AND DATE(fecha_factura)<= ? AND c.id= ?
            ORDER BY  id_factura DESC',
            [$fechaInicio, $fechaFin, $clientes_id]
        );

        $consulaClientes = DB::select('SELECT * FROM clientes');



        // Retornar la vista con las facturas

        return view('informes.infoClientes', compact('clientesInformeGeneral'), compact('consulaClientes'));
    }











    /* MODULO DE CONSULTAS EMPLEADOS */
    public function infoEmpleados()
    {
        $consulaEmpleados = DB::select('SELECT id as emp_id, telefono_empleado as emp_telefono_empleado, nombre_empleado as emp_nombre_empleado
                                        FROM empleados ');


        return view('informes.infoEmpleados', compact('consulaEmpleados'));
    }

    public function consultaEmpleados(Request $request)
    {

        $consultaEmp = new Informes;

        $fechaInicio = $consultaEmp->fechaInicio = $request->fechaInicio;
        $fechaFin = $consultaEmp->fechaFin = $request->fechaFin;
        $empleados_id = $consultaEmp->empleados_id = $request->empleados_id;

        // dd($fechaInicio, $fechaFin, $empleados_id ); // Compruebo que las variables lleguen


        $empleadosInformeGeneral = DB::select(
            'SELECT f.id AS id_factura,  f.fecha_factura, c.nombre_cliente, f.num_prendas, f.descripcion_factura,
            f.fec_entrega, f.precio_factura, f.abono_factura, es.estado, d_e.fecha AS fecha_estados
            FROM facturas as f 
            INNER JOIN detalles_estados as d_e
            ON f.id = d_e.facturas_id 
            INNER JOIN estados AS es
            ON es.id = d_e.estados_id
            INNER JOIN clientes as c 
            ON c.id = f.clientes_id
            INNER JOIN cuaderno_pagos as cp
            ON cp.facturas_id = f.id
            INNER JOIN empleados as e
            ON cp.empleados_id = e.id
            
            WHERE DATE(fecha_factura)>= ? AND DATE(fecha_factura)<= ? AND e.id= ?
            ORDER BY  id_factura DESC',
            [$fechaInicio, $fechaFin, $empleados_id]
        );

        $consulaEmpleados = DB::select('SELECT id as emp_id, telefono_empleado as emp_telefono_empleado, nombre_empleado as emp_nombre_empleado
                                        FROM empleados ');



        // Retornar la vista con las facturas

        return view('informes.infoEmpleados', compact('empleadosInformeGeneral'), compact('consulaEmpleados'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('informes.index');
    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Informes  $informes
     * @return \Illuminate\Http\Response
     */
    public function show(Informes $informes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Informes  $informes
     * @return \Illuminate\Http\Response
     */
    public function edit(Informes $informes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Informes  $informes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Informes $informes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Informes  $informes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Informes $informes)
    {
        //
    }
}
