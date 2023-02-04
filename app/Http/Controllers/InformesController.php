<?php

namespace App\Http\Controllers;

use App\Models\Informes;
use Illuminate\Http\Request;

class InformesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        return view('informes/index');
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
