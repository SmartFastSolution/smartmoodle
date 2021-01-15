<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapaConceptualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapa_conceptuals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('taller_id');
            $table->unsignedbigInteger('user_id');
            $table->longText('enunciado');
            $table->string('vender');
            $table->string('comprar');
            $table->string('seccion1a');
            $table->string('seccion1b');
            $table->string('seccion2a');
            $table->string('seccion2b');
            $table->string('seccion3a');
            $table->string('seccion3b');
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
        Schema::dropIfExists('mapa_conceptuals');
    }
}
