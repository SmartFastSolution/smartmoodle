<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTallerAbreviaturaDatoResTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taller_abreviatura_dato_res', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('taller_abreviatura_re_id');
            $table->string('col_a_res')->nullable();
            $table->string('col_b_res')->nullable();
            $table->timestamps();

            $table->foreign('taller_abreviatura_re_id')
            ->references('id')
            ->on('taller_abreviatura_res')
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
        Schema::dropIfExists('taller_abreviatura_dato_res');
    }
}
