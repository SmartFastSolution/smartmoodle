<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTallerSenalarOpcionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taller_senalar_opcions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('taller_senalar_id');
            $table->string('concepto');
            $table->string('alternativa1');
            $table->string('alternativa2');
            $table->timestamps();


            $table->foreign('taller_senalar_id')
            ->references('id')
            ->on('taller_senalars')
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
        Schema::dropIfExists('taller_senalar_opcions');
    }
}
