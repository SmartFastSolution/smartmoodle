<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistribucionmacusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distribucionmacus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('curso_id');
            $table->string('descripcion'); 
            $table->enum('estado',['on','off'])->nullable();
            $table->timestamps();
            $table->foreign('curso_id')->references('id')->on('cursos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('distribucionmacus');
    }
}
