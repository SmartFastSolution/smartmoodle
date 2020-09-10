<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('cedula');
            $table->string('fechanacimiento');
            $table->string('name');
            $table->string('sname');
            $table->string('apellido');
            $table->string('sapellido');
            $table->string('domicilio');
            $table->string('telefono');
            $table->string('celular');
            $table->string('titulo', 100)->nullable();
            $table->string('email')->unique();
            $table->boolean('estado')->default("1");
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');     
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
