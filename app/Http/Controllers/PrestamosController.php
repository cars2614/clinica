<?php

namespace App\Http\Controllers;

use App\Models\Prestamos;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrestamosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        /* $prestamo = Prestamos::all(); */
        

        $prestamo = DB::select('SELECT p.id, p.fecha_prestamo, e.nombre_empleado, p.precio_prestamo, p.descripcion_prestamo 
        FROM prestamos p 
        INNER JOIN empleados e 
        on p.empleados_id=e.id;');
        
        $datoPrestamo = array('lista_prestamo'=>$prestamo);

        return response()->view('prestamos/index', $datoPrestamo );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $empleado = Empleado::all();
        $datos = array("lista_empleados" => $empleado);

        return response()->view("prestamos/create", $datos, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //validacion del formulario
        
       $request->validate([

            //'fecha_prestamo'        => 'required',
            'empleados_id'          => 'required',
            'precio_prestamo'       => 'required',
            'descripcion_prestamo'  => 'required'
            
        ]); 


        $datosPrestamos = request()->except('_token');
        Prestamos::insert($datosPrestamos);
        return redirect('/prestamos/create/'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prestamos  $prestamos
     * @return \Illuminate\Http\Response
     */
    public function show(Prestamos $prestamos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prestamos  $prestamos
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestamos $prestamos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prestamos  $prestamos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prestamos $prestamos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prestamos  $prestamos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestamos $prestamos)
    {
        //
    }
}