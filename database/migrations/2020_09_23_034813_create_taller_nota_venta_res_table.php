<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTallerNotaVentaResTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taller_nota_venta_res', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('taller_id');
            $table->unsignedbigInteger('user_id');
            $table->string('enunciado');
            $table->string('nombre');
            $table->string('ruc');
            $table->string('fecha');
            $table->string('total');
            $table->string('valido');
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
        Schema::dropIfExists('taller_nota_venta_res');
    }
}
