<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDetallesEstadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_estados', function (Blueprint $table) {
            
            $table->id();
            $table->timestamp('fecha')->default(DB::raw('CURRENT_TIMESTAMP'));

            
            $table->foreignId('facturas_id')->constrained('facturas');
            $table->foreignId('estados_id')->constrained('estados');
            
            //$table->string('detalle')->nullable();            

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
        Schema::dropIfExists('detalles_estados');
    }
}