<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablasaltoocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tablasaltooc', function (Blueprint $table) {
            $table->id();
            $table->string('unidad_negocio');
            $table->string('compania');
            $table->string('moneda');
            $table->integer('no_proveedor');
            $table->string('nombre_proveedor');
            $table->string('sitio');
            $table->string('tienda')->nullable();
            $table->string('ubicacion_envio');
            $table->integer('no_orden');
            $table->string('status_orden');
            $table->string('fecha_orden');
            $table->integer('no_linea');
            $table->string('articulo')->nullable();
            $table->string('descripcion');
            $table->string('unidad_medida');
            $table->string('precio_unitario');
            $table->string('cantidad');
            $table->string('cantidad_recibida');
            $table->string('total_por_linea');
            $table->string('status_linea')->nullable();
            $table->string('status_aprobacion')->nullable();
            $table->string('fecha_aprobacion')->nullable();
            $table->string('factura')->nullable();
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
        Schema::dropIfExists('tablasaltooc');
    }
}
