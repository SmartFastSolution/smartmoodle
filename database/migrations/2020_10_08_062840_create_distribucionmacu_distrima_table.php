<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistribucionmacuDistrimaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distribucionmacu_distrima', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('distribucionmacu_id');
            $table->unsignedBigInteger('distrima_id');
                     
            $table->timestamps();

            $table->foreign('distribucionmacu_id')->references('id')->on('distribucionmacus')->onDelete('cascade'); 
            $table->foreign('distrima_id')->references('id')->on('distrimas')->onDelete('cascade');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('distribucionmacu_distrima');
    }
}
