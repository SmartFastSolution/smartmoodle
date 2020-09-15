<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTallersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tallers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('plantilla_id');
            $table->string('nombre');
            $table->unsignedbigInteger('id_materia');
            $table->boolean('estado');
            $table->timestamps();

             $table->foreign('plantilla_id')
            ->references('id')
            ->on('plantillas')
            ->onDelete('cascade');


        });       
            Schema::create('taller_clasificar_res', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('taller_id');
            $table->unsignedbigInteger('user_id');
            $table->string('enunciado');
            $table->string('resp1');
            $table->string('resp2');
            $table->string('resp3');
            $table->string('resp4');
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
        Schema::dropIfExists('tallers');
        Schema::dropIfExists('taller_completar');
    }
}
