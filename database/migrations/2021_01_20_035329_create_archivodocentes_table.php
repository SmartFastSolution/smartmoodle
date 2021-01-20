<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivodocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivodocentes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('materia_id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->timestamps();

            $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archivodocentes');
    }
}
