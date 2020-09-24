<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTallerFacturaResTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taller_factura_res', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('taller_id');
            $table->unsignedbigInteger('user_id');
            $table->string('enunciado');
            $table->string('nombre');
            $table->string('fecha_emision');
            $table->string('ruc');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('email');
            $table->string('subtotal_12');
            $table->string('subtotal_0');
            $table->string('subtotal_iva');
            $table->string('subtotal_siniva');
            $table->string('subtotal_sin_imp');
            $table->string('descuento_total');
            $table->string('ice');
            $table->string('iva12');
            $table->string('irbpnr');
            $table->string('propina');
            $table->string('valor_total');
            $table->timestamps();
            
            $table->foreign('taller_id')
            ->references('id')
            ->on('tallers')
            ->onDelete('cascade');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taller_factura_res');
    }
}
