<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTallerFacturaDatosResTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taller_factura_datos_res', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('taller_factura_re_id');
            $table->string('codigo')->nullable();
            $table->string('cod_aux')->nullable();
            $table->string('cantidad')->nullable();
            $table->string('precio')->nullable();
            $table->string('descuento')->nullable();
            $table->string('valor')->nullable();
            $table->timestamps();

            $table->foreign('taller_factura_re_id')
            ->references('id')
            ->on('taller_factura_res')
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
        Schema::dropIfExists('taller_factura_datos_res');
    }
}
