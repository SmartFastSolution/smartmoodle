<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBIPasivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_i_pasivos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('balance_inicial_id');
            $table->string('nom_cuenta');
            $table->string('saldo');
            $table->string('tipo');
            $table->timestamps();


            $table->foreign('balance_inicial_id')
            ->references('id')
            ->on('balance_inicials')
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
        Schema::dropIfExists('b_i_pasivos');
    }
}
