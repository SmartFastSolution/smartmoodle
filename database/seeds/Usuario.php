<?php

use Illuminate\Database\Seeder;

class Usuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plantillas')->insert([
          'nombre' => 'TALLER 1 - COMPLETE EL ENUNCIADO CORRECTAMENTE',
          'descripcion' => 'Taller designado para completar un resultado',
        ]);
    }
}
