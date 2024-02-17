<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;

class ConsultaCliente extends Controller
{
    //

    public function consultaCli(Request $request)
    {

        $temporal = $request->get('temporal');

        $clientes = Clientes::where('nombre_cliente',  'LIKE', '%'.$temporal . '%')->get();


        $data = [];
        foreach ($clientes as $cliente) {
            

            $data[] = [

                'label' => $cliente->nombre_cliente  

            ];

        }


        /* return view('facturas/create', compact('data')); */



    }














}
