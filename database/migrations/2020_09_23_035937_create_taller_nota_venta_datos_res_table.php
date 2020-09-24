<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTallerNotaVentaDatosResTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taller_nota_venta_datos_res', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('taller_nota_venta_re_id');
            $table->string('cantidad')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('precio')->nullable();
            $table->string('valor_venta')->nullable();
            $table->timestamps();

            $table->foreign('taller_nota_venta_re_id')
            ->references('id')
            ->on('taller_nota_venta_res')
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
        Schema::dropIfExists('taller_nota_venta_datos_res');
    }
}
