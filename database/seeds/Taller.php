<?php

use Illuminate\Database\Seeder;

class Taller extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('tallers')->insert([
         'id' => 1,
         'plantilla_id' => 28,
         'nombre' => 'Taller 1',
         'enunciado' => 'EN EL PRESENTE TEXTO IDENTIFIQUE LAS ABREVIATURAS COMERCIALES Y ESCRÍBALAS EN LA SIGUIENTE CARTA,  EFICAZMENTE.',
         'materia_id' => 2,
         'estado' => 'on',
         'created_at' => now(),
         'updated_at' => now(),
         ]);

         DB::table('tallers')->insert([
         'id' => 2,
         'plantilla_id' => 29,
         'nombre' => 'Taller 2',
         'enunciado' => 'UTILIZA LAS ABREVIATURAS COMERCIALES EN LA CARTA, CORRECTAMENTE..',
         'materia_id' => 2,
         'estado' => 'on',
         'created_at' => now(),
         'updated_at' => now(),
         ]);

          DB::table('tallers')->insert([
         'id' => 3,
         'plantilla_id' => 30,
         'nombre' => 'Taller 3',
         'enunciado' => 'LOCALIZA LAS ABREVIATURAS EN EL EDITORIAL Y ESCRIBE EL SIGNIFICADO EN EL SIGUIENTE PÁRRAFO, CORRECTAMENTE.',
         'materia_id' => 2,
         'estado' => 'on',
         'created_at' => now(),
         'updated_at' => now(),
         ]);
        DB::table('tallers')->insert([
         'id' => 4,
         'plantilla_id' => 32,
         'nombre' => 'Taller 4',
         'enunciado' => 'ESCRIBA EN EL GUSANILLO ABREVIATURAS ECONÓMICAS SEGÚN EL ORDEN QUE SE INDICA EN FORMA CORRECTA.',
         'materia_id' => 2,
         'estado' => 'on',
         'created_at' => now(),
         'updated_at' => now(),
         ]);
         DB::table('tallers')->insert([
         'id' => 5,
         'plantilla_id' => 35,
         'nombre' => 'Taller 5',
         'enunciado' => 'DESARROLLE FÓRMULAS DE LA ECUACIÓN CONTABLE, CON EXACTITUD.',
         'materia_id' => 2,
         'estado' => 'on',
         'created_at' => now(),
         'updated_at' => now(),
         ]);
    }
}
