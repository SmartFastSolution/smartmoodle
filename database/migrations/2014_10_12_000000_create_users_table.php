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
            $table->string('fcontrato');
            $table->string('titulo', 100)->nullable();
            $table->string('email')->unique();
            $table->enum('estado',['on','off'])->nullable();
            $table->string('password');    
            $table->timestamp('email_verified_at')->nullable();
            $table->string('cirepre');
            $table->string('namerepre');        
            $table->string('namema');    
            $table->string('namepa');    
            $table->string('telefonorep');    
            $table->string('fregistro');    
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
