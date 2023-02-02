<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Faker\Core\Number;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Notify;


class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datosEmpleado['empleados'] = Empleado::paginate(10000);
        return view('empleados.index', $datosEmpleado);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleados.create');
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
         /* validamos que los campos telefono y nombre sean agregados desde el backend */
       
         $request->validate([
            'telefono_empleado'   => 'required|min:7|max:10|unique:empleados',
            'nombre_empleado'     => 'required|min:3|max:100'
        ]);


        /* recepciona todos los datos 
        exepto el toquen, lo hacemos con el fin que no se guarde en la 
        base de datos
        */
        $datosEmpleado = request()->except('_token');

        /* tomamos el modelo  'Clientes' y le decimos que inserte 
         todos los datos que esten almacenados en la variable
        */
        Empleado::insert($datosEmpleado);

        /*  Notify::success('Empleado','agregado'); */

        /* return response()->json($datosClientes); */
        return redirect('/empleados/')->with('empleado_ok', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleados =  Empleado::findOrFail($id);

        return view('empleados.edit', compact('empleados'));
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosEmpleados = request()->except(['_token', '_method']);
        Empleado::where('id', '=', $id)->update($datosEmpleados);

        $clientes =  Empleado::findOrFail($id);
        
        return redirect('empleados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Empleado::destroy($id);
        return redirect('empleados')->with('eliminar', 'ok');

    }
}
