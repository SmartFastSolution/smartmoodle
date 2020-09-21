<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTallerPagareResTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taller_pagare_res', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('taller_id');
            $table->unsignedbigInteger('user_id');
            $table->string('enunciado');
            $table->string('cantidad');
            $table->string('resp1');
            $table->string('resp2');
            $table->string('resp3');
            $table->string('resp4');
            $table->string('resp5');
            $table->string('resp6');
            $table->string('resp7');
            $table->string('resp8');
            $table->string('resp9');
            $table->string('resp10');
            $table->string('resp11');
            $table->string('resp12');
            $table->string('resp13');
            $table->string('resp14');
            $table->string('resp15');
            $table->string('resp16');
            $table->string('resp17');
            $table->string('resp18');
            $table->string('resp19');
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
        Schema::dropIfExists('taller_pagare_res');
    }
}
