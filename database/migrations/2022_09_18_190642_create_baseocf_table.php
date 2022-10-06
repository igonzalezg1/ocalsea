<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseocfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baseocf', function (Blueprint $table) {
            $table->id();
            $table->string('oc');
            $table->string('remision');
            $table->string('centro_costos');
            $table->unsignedBigInteger('id_tienda');
            $table->string('subtotal');
            $table->string('factura')->nullable();
            $table->string('status');
            $table->string('fecha_ingreso');
            $table->timestamps();
            $table->foreign('id_tienda')->references('id')->on('tiendas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baseocf');
    }
}
