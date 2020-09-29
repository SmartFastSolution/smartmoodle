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
        DB::table('materias')->insert([
          'nombre' => 'Matematicas',
          'slug' => 'matematicas',
          'descripcion' => 'Materia de matematicas',
          'estado' => 'on',
        ]);
        DB::table('materias')->insert([
          'nombre' => 'Contabilidad',
          'slug' => 'contabilidad',
          'descripcion' => 'Materia de contabilidad',
          'estado' => 'on',
        ]);
        DB::table('materias')->insert([
          'nombre' => 'Lenguaje',
          'slug' => 'lenguaje',
          'descripcion' => 'Materia de lenguaje',
          'estado' => 'on',
        ]);
    }
}
