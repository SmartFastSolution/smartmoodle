<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbreviaturaEconomicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abreviatura_economicas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('taller_id');
            $table->unsignedbigInteger('user_id');
            $table->string('enunciado');
            $table->string('abreviaturaI1');
            $table->string('abreviaturaI2');
            $table->string('abreviaturaI3');
            $table->string('abreviaturaI4');
            $table->string('abreviaturaI5');
            $table->string('abreviaturaC1');
            $table->string('abreviaturaC2');
            $table->string('abreviaturaC3');
            $table->string('abreviaturaC4');
            $table->string('abreviaturaC5');
            $table->string('abreviaturaR1');
            $table->string('abreviaturaR2');
            $table->string('abreviaturaR3');
            $table->string('abreviaturaR4');
            $table->string('abreviaturaR5');
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
        Schema::dropIfExists('abreviatura_economicas');
    }
}
