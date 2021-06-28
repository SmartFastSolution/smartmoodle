<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ActualizacionesModulosContables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mayor_generals', function (Blueprint $table) {
            $table->longText('registros')->nullable();
        });
        Schema::table('diario_generals', function (Blueprint $table) {
            $table->longText('datos')->nullable()->change();
        });
        Schema::table('balance_inicials', function (Blueprint $table) {
            $table->longText('datos')->nullable()->change();
        });
        Schema::table('kardex_fifos', function (Blueprint $table) {
            $table->longText('transacciones')->nullable()->change();
        });
        Schema::table('completars', function (Blueprint $table) {
            $table->longText('respuesta')->nullable()->change();
        });
        Schema::table('rueda_logicas', function (Blueprint $table) {
            $table->longText('persona_natural')->nullable()->change();
        });
        Schema::table('celda_clasificados', function (Blueprint $table) {
            $table->unsignedbigInteger('taller_celda_clasificacion_id')->nullable()->change();
        });
        Schema::table('asiento_cierres', function (Blueprint $table) {
            $table->longText('registros')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
