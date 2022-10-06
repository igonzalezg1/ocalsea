<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablasaltoocgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tablasaltoocg', function (Blueprint $table) {
            $table->id();
            $table->string('anio');
            $table->string('presupuesto')->nullable();
            $table->string('no_proveedor')->nullable();
            $table->string('semana')->nullable();
            $table->string('folio_remision')->nullable();
            $table->string('clave')->nullable();
            $table->string('tipo')->nullable();
            $table->string('razon_social')->nullable();
            $table->string('fecha_entrega')->nullable();
            $table->string('cantidad')->nullable();
            $table->string('unidad_medida')->nullable();
            $table->string('costo_unitario')->nullable();
            $table->string('costo_total_s_iva')->nullable();
            $table->string('concepto_breve',4000)->nullable();
            $table->string('no_tienda')->nullable();
            $table->string('no_ticket')->nullable();
            $table->string('nombre_tienda')->nullable();
            $table->string('region_mtto')->nullable();
            $table->string('coordinador_mtto')->nullable();
            $table->string('marca')->nullable();
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
        Schema::dropIfExists('tablasaltoocg');
    }
}
