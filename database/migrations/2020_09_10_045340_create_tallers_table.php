<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTallersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tallers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('plantilla_id');
            $table->string('nombre');
<<<<<<< HEAD
            $table->unsignedbigInteger('contenido_id');
            $table->boolean('estado');
=======
            $table->string('enunciado')->nullable();
            $table->unsignedbigInteger('materia_id');
            $table->enum('estado',['on','off'])->nullable();  
>>>>>>> 7ae4f7003b7e1a558dd1a980d151dcc5d25236b1
            $table->timestamps();

             $table->foreign('plantilla_id')
            ->references('id')
            ->on('plantillas')
            ->onDelete('cascade');

            $table->foreign('contenido_id')
            ->references('id')
            ->on('contenidos')
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
        Schema::dropIfExists('tallers');
    }
}
