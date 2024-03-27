<?php

namespace App\Http\Controllers;

use App\Models\DetallesEstado;

use App\Models\Facturas;
use App\Models\Clientes;
use App\Models\Empleado;
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

        $datoFactura = array('lista_factura' => $factura);
        return response()->view('facturas/index', $datoFactura);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        //$lista_clientes = DB::select('SELECT * FROM clientes');

        $lista_empleados = DB::select('SELECT * FROM empleados');

        $numeroFactura = DB::select('SELECT COUNT(*)AS cantidad FROM facturas');

        //dd($numeroFactura,  $lista_empleados);

        return view('facturas/create', compact('numeroFactura', 'lista_empleados'));
    }




    /* controlador de consulta de clientes */
    public function consultaClientes(Request $request)
    {


        $term = $request->get('term');


        $clientes = Clientes::where('nombre_cliente', 'LIKE', '%' . $term . '%')->get();

        $data = [];

        foreach ($clientes as $cliente) {


            $data[] = [

                'label' => $cliente->nombre_cliente,
                'telefono_cliente' => $cliente->telefono_cliente,
                'id' => $cliente->id

            ];
        }


        return response()->json($data);
        //return $data;
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {

        //dd($request->all());
        $request->validate([

            //'fecha_factura'     => 'required',

            'clientes_id'         => 'required',
            'num_prendas'         => 'required|min:1',
            'descripcion_factura' => 'required',
            'fec_entrega'         => 'required',
            'precio_factura'      => 'required|min:1',
            'abono_factura'       => 'required',
            'empleados_id'       => 'required',

        ]);



        $datosFacturas = request()->except('_token');

        // Imprimir datos para depuración
        //dd($datosFacturas);

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
