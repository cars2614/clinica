<?php

namespace App\Http\Controllers;

use App\Models\DetallesEstado;

use App\Models\Facturas;
use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        /* $factura = Facturas::all(); */

        $factura = DB::select('SELECT f.id, f.fecha_factura, c.nombre_cliente, f.num_prendas, f.descripcion_factura, f.fec_entrega, f.precio_factura, f.abono_factura, e.estado
            FROM facturas f 
            INNER JOIN clientes c on f.clientes_id = c.id 
            INNER JOIN detalles_estados d_e ON f.id = d_e.facturas_id
            INNER JOIN estados e ON e.id = d_e.estados_id
            WHERE d_e.estados_id = (SELECT MAX(estados_id) FROM detalles_estados WHERE facturas_id = f.id)
            ORDER BY f.id DESC;');

        $datoFactura = array('lista_factura'=>$factura);
        return response()->view('facturas/index', $datoFactura );

      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cliente = Clientes::all();
        $datos = array("lista_clientes" => $cliente);

        return response()->view("facturas/create", $datos, 200);
        

        /* return view('facturas.create'); */
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {

        $request->validate([

            //'fecha_factura'     => 'required',

            'clientes_id'         => 'required',
            'num_prendas'         => 'required|min:1',
            'descripcion_factura' => 'required',
            'fec_entrega'         => 'required',
            'precio_factura'      => 'required|min:1',
            'abono_factura'       => 'required'
            
        ]);    
       

        $datosFacturas = request()->except('_token');

       Facturas::insert($datosFacturas);

        /*codigo de prueba... aqui se envian nuevamente los datos recepcionados 
        por el formulario de creacion de facturas
        */


        //return response()->json($datosFacturas); 
        return redirect('/facturas/create/')->with('factura_ok', 'ok'); 
        
       

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facturas  $facturas
     * @return \Illuminate\Http\Response
     */
    public function show(Facturas $facturas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facturas  $facturas
     * @return \Illuminate\Http\Response
     */
    public function edit(Facturas $facturas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facturas  $facturas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facturas $facturas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facturas  $facturas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facturas $facturas)
    {
        //
    }
}