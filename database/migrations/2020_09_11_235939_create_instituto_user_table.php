<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutoUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instituto_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('instituto_id');
            $table->unsignedBigInteger('user_id');

            $table->timestamps();  

            $table->foreign('instituto_id')->references('id')->on('institutos')->onDelete('cascade'); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instituto_user');
    }
}