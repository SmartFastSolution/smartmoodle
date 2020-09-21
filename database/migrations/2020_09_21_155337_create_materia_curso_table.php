<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriaCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materia_curso', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('materia_id');
            $table->unsignedBigInteger('curso_id');
            $table->timestamps();
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade'); 
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materia_curso');
    }
}
