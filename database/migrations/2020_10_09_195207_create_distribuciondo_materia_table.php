<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistribuciondoMateriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distribuciondo_materia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('distribuciondo_id');
            $table->unsignedBigInteger('materia_id');
                     
            $table->timestamps();

            $table->foreign('distribuciondo_id')->references('id')->on('distribuciondos')->onDelete('cascade'); 
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
        Schema::dropIfExists('distribuciondo_materia');
    }
}
