<?php

namespace App\Http\Controllers;


use App\Models\Clientes;
use Faker\Core\Number;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /* consultamos los datos del cliente y lo almacenamos en 
        un avariable    $datosCliente['clientes'] con una paginacion de 
        5 registros, despues retornamos la vista y le pasamos los 
        datos en la variable   $datosCliente*/
        $datosCliente['clientes'] = Clientes::paginate(10000);
        return view('clientes.index', $datosCliente);

        

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */




     /* La funcion store: es la que recepciona la informacion enviada 
     desde el formulario  */
    public function store(Request $request)
    {
       
        /* validamos que los campos telefono y nombre sean agregados desde el backend */
       
        $request->validate([
            'telefono_cliente'   => 'required|min:7|max:10|unique:clientes',
            'nombre_cliente'     => 'required|min:3|max:100'
        ]);


        /* recepciona todos los datos 
        exepto el toquen, lo hacemos con el fin que no se guarde en la 
        base de datos
        */
        $datosClientes = request()->except('_token');


        /* tomamos el modelo  'Clientes' y le decimos que inserte 
         todos los datos que esten almacenados en la variable '$datosClientes' 
        */
        Clientes::insert($datosClientes);

        /* return response()->json($datosClientes); */
        return redirect('/clientes/')->with('cliente_ok','ok');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $clientes =  Clientes::findOrFail($id);

        return view('clientes.edit', compact('clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $datosClientes = request()->except(['_token', '_method']);
        Clientes::where('id', '=', $id)->update($datosClientes);

        $clientes =  Clientes::findOrFail($id);
        /* return view('clientes.edit', compact('clientes')); */
        return redirect('clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //despues de eliminar el registro se redirecciona correctamente
        Clientes::destroy($id);
        return redirect('clientes')->with('eliminar', 'ok');
    }
}