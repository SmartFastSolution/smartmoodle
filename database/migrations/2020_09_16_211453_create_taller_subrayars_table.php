<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTallerSubrayarsTable extends Migration
{    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taller_subrayars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('taller_id');
            $table->string('enunciado')->nullable();
            $table->string('concepto1')->nullable();
            $table->string('alternativas1')->nullable();
            $table->string('concepto2')->nullable();
            $table->string('alternativas2')->nullable();
            $table->string('concepto3')->nullable();
            $table->string('alternativas3')->nullable();
            $table->string('concepto4')->nullable();
            $table->string('alternativas4')->nullable();
            $table->string('concepto5')->nullable();
            $table->string('alternativas5')->nullable();
            $table->string('concepto6')->nullable();
            $table->string('alternativas6')->nullable();
            $table->timestamps();
            
            $table->foreign('taller_id')
            ->references('id')
            ->on('tallers')
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
        Schema::dropIfExists('taller_subrayars');
    }
}
