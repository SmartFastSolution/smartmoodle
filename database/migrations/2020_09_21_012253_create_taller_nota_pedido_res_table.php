<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTallerNotaPedidoResTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taller_nota_pedido_res', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('taller_id');
            $table->unsignedbigInteger('user_id');
            $table->string('enunciado');
            $table->string('no');
            $table->string('fecha');
            $table->string('dependencia');
            $table->string('destino');
            $table->string('plazo_entrega');
            $table->string('cantidad');
            $table->string('codigo');
            $table->string('descripcion');
            $table->string('precio_unit');
            $table->string('total');
            $table->string('observaciones');
            $table->string('fabrica');
            $table->string('recibido');
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
        Schema::dropIfExists('taller_nota_pedido_res');
    }
}
