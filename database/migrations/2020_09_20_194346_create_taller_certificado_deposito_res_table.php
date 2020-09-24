<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTallerCertificadoDepositoResTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taller_certificado_deposito_res', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('taller_id');
            $table->unsignedbigInteger('user_id');
            $table->string('enunciado');
            $table->string('valor_inicial');
            $table->string('caracter');
            $table->string('beneficiario');
            $table->string('cantidad');
            $table->string('plazo');
            $table->string('interes_anual');
            $table->string('fecha_emision');
            $table->string('plazo_de_vencimiento');
            $table->string('fecha_de_vencimiento');
            $table->string('lugar_fecha_emision');
            
            $table->timestamps();
            
            $table->foreign('taller_id')
            ->references('id')
            ->on('tallers')
            ->onDelete('cascade');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('taller_certificado_deposito_res');
    }
}
