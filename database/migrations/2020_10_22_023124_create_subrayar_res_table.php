<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubrayarResTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subrayar_res', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('subrayar_id');
            $table->string('concepto');
            $table->string('respuesta');
            $table->timestamps();

            $table->foreign('subrayar_id')
            ->references('id')
            ->on('subrayars')
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
        Schema::dropIfExists('subrayar_res');
    }
}
