<?php

namespace App\Http\Controllers;

use App\Models\Facturas;
use App\Models\DetallesEstado;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class DetallesEstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factura = DB::select(
            'SELECT f.id, c.nombre_cliente  
        FROM facturas f         
        INNER JOIN clientes c 
        on f.clientes_id=c.id
        INNER JOIN detalles_estados d_e
        ON f.id = d_e.facturas_id
        INNER JOIN estados e 
        ON d_e.estados_id = e.id
        WHERE d_e.estados_id  = (SELECT MAX(estados_id) FROM detalles_estados WHERE facturas_id = f.id)     
        AND d_e.estados_id =2
        GROUP BY f.id, c.nombre_cliente;'
        );

        $estado = DB::select(
            'SELECT estados.id, estados.estado FROM estados
                WHERE estados.id >2  ' );

        $todasLasacturas = DB::select('SELECT d_e.fecha, f.id, c.nombre_cliente, f.precio_factura, f.abono_factura, 	           e.estado    
        FROM facturas f         
        INNER JOIN clientes c 
        on f.clientes_id=c.id
        INNER JOIN detalles_estados d_e
        ON f.id = d_e.facturas_id
        INNER JOIN estados e
        ON d_e.estados_id = e.id
        WHERE d_e.estados_id >= 3 
        
        ');
        
        
       return response()->view('detallesEstados.index', 
       ['facturas' => $factura, 'estados' => $estado, 'todasLasacturas'=> $todasLasacturas] );

       
        
        
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
        

        $detallesEstado = request()->except('_token');

        DetallesEstado::insert($detallesEstado);


        return redirect('/detallesEstados')->with('entregado_ok', 'ok'); 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetallesEstado  $detallesEstado
     * @return \Illuminate\Http\Response
     */
    public function show(DetallesEstado $detallesEstado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetallesEstado  $detallesEstado
     * @return \Illuminate\Http\Response
     */
    public function edit(DetallesEstado $detallesEstado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetallesEstado  $detallesEstado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetallesEstado $detallesEstado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetallesEstado  $detallesEstado
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetallesEstado $detallesEstado)
    {
        //
    }
}