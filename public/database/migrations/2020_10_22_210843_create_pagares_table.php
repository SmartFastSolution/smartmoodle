<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagares', function (Blueprint $table) {
         $table->bigIncrements('id');
            $table->unsignedbigInteger('taller_id');
            $table->unsignedbigInteger('user_id');
            $table->text('enunciado');
            $table->string('cantidad');
            $table->string('resp1');
            $table->string('resp2');
            $table->string('resp3');
            $table->string('resp4');
            $table->string('resp5');
            $table->string('resp6');
            $table->string('resp7');
            $table->string('resp8');
            $table->string('resp9');
            $table->string('resp10');
            $table->string('resp11');
            $table->string('resp12');
            $table->string('resp13');
            $table->string('resp14');
            $table->string('resp15');
            $table->string('resp16');
            $table->string('resp17');
            $table->string('resp18');
            $table->string('resp19');
            $table->string('resp20')->nullable();
            $table->string('resp21')->nullable();
            $table->string('resp22')->nullable();
            $table->string('resp23')->nullable();
            $table->string('resp24')->nullable();
            $table->string('resp25')->nullable();
            $table->string('resp26')->nullable();
            $table->string('resp27')->nullable();
            $table->string('resp28')->nullable();
            $table->string('resp29')->nullable();
            $table->string('resp30')->nullable();
            $table->string('resp31')->nullable();
            $table->string('resp32')->nullable();
            $table->string('resp33')->nullable();
            $table->string('resp34')->nullable();
            $table->string('resp35')->nullable();
            $table->string('fecha_vencimiento')->nullable();
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
        Schema::dropIfExists('pagares');
    }
}
