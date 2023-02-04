<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /* 4. abajo hacemos la referencia del campo en el que se va a relacionar: 
        $table->foreing("campoRelacionado")->references("id")->on("otraTabla")->onDelete("cascade"); */


        Schema::create('facturas', function (Blueprint $table) {
           
            $table->id();
            $table->timestamp('fecha_factura')->default(DB::raw('CURRENT_TIMESTAMP'));

            //nueva forma de relacionar 
            $table->foreignId('clientes_id')->constrained('clientes'); 

            $table->integer('num_prendas');            
            $table->text('descripcion_factura')->nullable();
            $table->datetime('fec_entrega');
            $table->integer('precio_factura');
            $table->integer('abono_factura');  
           //$table->foreignId('estado_id')->constrained('estados');        
           
            /* $table-> */
            $table->timestamps();
           
            /* manera antigua de relacionar tablas
            $table->unsignedBigInteger('clientes_id');            
            $table->foreign('clientes_id')->references('id')->on('clientes'); */
  
       
        });
            /*
            SE IMPLEMENTA EL TRIGGER PARA QUE CUANDO SE RECIBA UNA FACTURA SE 
            GUARDE AUTOMATICAMENTE EN TA TABLE detalles_estados Y LLEVAR UN CONTROL
            */
            DB::unprepared('
            
            CREATE TRIGGER recibido
            AFTER INSERT ON facturas
            FOR EACH ROW
            BEGIN
                SET @recibido = (SELECT MAX(facturas.id) FROM facturas);
                INSERT INTO detalles_estados (facturas_id, estados_id)
                SELECT @recibido, 1 FROM facturas WHERE facturas.id = @recibido;
            END
            ');


        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

       // DB::unprepared('DROP TRIGGER recibido');

        Schema::dropIfExists('facturas');       

        
    }
}