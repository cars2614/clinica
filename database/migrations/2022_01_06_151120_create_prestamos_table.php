<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();

            $table->timestamp('fecha_prestamo')->default(DB::raw('CURRENT_TIMESTAMP'));

            //nueva forma de relacionar 
            $table->foreignId('empleados_id')->constrained('empleados');  
            $table->integer('precio_prestamo');     
            $table->text('descripcion_prestamo')->nullable();            
            
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamos');
    }
}