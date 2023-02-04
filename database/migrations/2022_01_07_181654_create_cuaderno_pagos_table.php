<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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

            /*
            SE REALIZA ESTE TRIGGER PARA LLEVAR EL CONTROL DE LOS DETALLES DE LA FACTURA Y ASI 
            PODER LLEVAR UN CONTROL MAS EXACTO
            */
            DB::unprepared('
        
            CREATE TRIGGER realizado 
            AFTER INSERT ON cuaderno_pagos
            FOR EACH ROW 
            BEGIN
                SET @realizado = (SELECT cuaderno_pagos.facturas_id 
                FROM cuaderno_pagos 
		    	WHERE id =  (SELECT MAX(id) FROM cuaderno_pagos) );
        
                INSERT INTO detalles_estados (facturas_id, estados_id)
                SELECT @realizado, 2 FROM facturas WHERE facturas.id = @realizado;
    
            END
            ');
    }

/* 
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        //DB::unprepared('DROP TRIGGER realizado');
             
        Schema::dropIfExists('cuaderno_pagos');
        
    }
}