<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablasaltopagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tablasaltopagos', function (Blueprint $table) {
            $table->id();
            $table->string('folio_interno');
            $table->string('folio_fiscal');
            $table->string('nombre');
            $table->string('rfc');
            $table->string('subtotal');
            $table->string('iva');
            $table->string('isr');
            $table->string('total');
            $table->string('fecha_timbrado');
            $table->string('fecha_de_pago');
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
        Schema::dropIfExists('tablasaltopagos');
    }
}
