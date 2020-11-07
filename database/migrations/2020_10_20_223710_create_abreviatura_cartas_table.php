<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbreviaturaCartasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abreviatura_cartas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('taller_id');
            $table->unsignedbigInteger('user_id');
            $table->string('enunciado');
            $table->string('abreviatura1');
            $table->string('abreviatura2');
            $table->string('abreviatura3');
            $table->string('abreviatura4');
            $table->string('abreviatura5');
            $table->string('abreviatura6');
            $table->string('abreviatura7');
            $table->string('abreviatura8');
            $table->string('abreviatura9');
            $table->string('abreviatura10');
            $table->string('abreviatura11');
            $table->string('abreviatura12');
            $table->string('abreviatura13');
            $table->string('abreviatura14');
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
        Schema::dropIfExists('abreviatura_cartas');
    }
}
