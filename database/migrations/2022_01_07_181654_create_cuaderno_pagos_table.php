<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuadernoPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuaderno_pagos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_cuaderno_pago');

            $table->foreignId('empleados_id')->constrained('empleados');
            $table->foreignId('facturas_id')->constrained('facturas');
                 
            $table->string('detalle_cuaderno_pago')->nullable();

            $table->timestamps();


             //$table->foreignId('clientes_id')->constrained('clientes'); ejemplo

            
        });
    }

/* 
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuaderno_pagos');
    }
}
