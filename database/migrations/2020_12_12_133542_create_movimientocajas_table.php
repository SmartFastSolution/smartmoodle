<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientocajasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientocajas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('arqueocaja_id');
            $table->string('cuenta');
            $table->string('comentario')->nullable();
            $table->string('debe')->nullable();
            $table->string('haber')->nullable();
            $table->timestamps();
            $table->foreign('arqueocaja_id')
            ->references('id')
            ->on('arqueocajas')
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
        Schema::dropIfExists('movimientocajas');
    }
}
