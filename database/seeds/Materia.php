<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Materia extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        // $institutos = \App\Instituto::pluck('id');
        // $institutos->each(function ($instituto) {
        //    $materias = array('LENGUA Y LITERATURA', 'MATEMATICA', 'HISTORIA', 'EDUCACION FISICA', 'FISICA', 'QUIMICA', 'BIOLOGIA', 'MF FORMACION Y ORIENTACION LABORAL', 'MF APLICACIONES OFIMATICAS LOCALES Y EN LINEA', 'MF SISTEMAS OPERATIVOS Y REDES', 'MF PROGRAMACIO Y BASE DE DATOS', 'MF SOPORTE TECNICO', 'MF DISEÑO Y DESARROLLO WEB', 'INGLES', 'EMPRENDIMIENTO Y GESTION');
       
        //   foreach ($materias as $materia) {
        //    DB::table('materias')->insert([
        //          'instituto_id' => $instituto,
        //          'nombre'       => $materia,
        //          'slug'         =>  Str::slug($materia),
        //          'descripcion'  => 'Descripcion de Materia',
        //          'estado'       => 'on',
        //     ]);
        // }
        // });


        // $materias = \App\Materia::pluck('id');
        // $materias->each(function ($materia) {
        //    $unidades = array('UNIDAD 1 ', 'UNIDAD 2', 'UNIDAD 3', 'UNIDAD 4', 'UNIDAD 5', 'UNIDAD 6', 'UNIDAD 7', 'UNIDAD 8', 'UNIDAD 9', 'UNIDAD 10');
       
        //   foreach ($unidades as $unidad) {
        //    DB::table('contenidos')->insert([
        //          'materia_id'  => $materia,
        //          'nombre'      => $unidad,
        //          'descripcion' => 'Descripcion de Unidad',
        //          'estado'      => 'on',
        //     ]);
        // }
        // });


          DB::table('materias')->insert([
          'nombre'       => 'Contabilidad',
          'instituto_id' => 1,
          'slug'         => 'contabilidad',
          'descripcion'  => 'Materia de contabilidad',
          'estado'       => 'on',
        ]);
         DB::table('materias')->insert([
          'nombre'       => 'Matematica',
          'instituto_id' => 1,
          'slug'         => 'matematica',
          'descripcion'  => 'Materia de matematicas',
          'estado'       => 'on',
        ]);
       
        DB::table('materias')->insert([
          'nombre'       => 'Lenguaje',
          'instituto_id' => 1,
          'slug'         => 'lenguaje',
          'descripcion'  => 'Materia de lenguaje',
          'estado'       => 'on',
        ]);
          DB::table('contenidos')->insert([
          'materia_id'  => 1,
          'nombre'      => 'UNIDAD 1',
         
          'descripcion' => 'Unidad # 1',
          'estado'      => 'on',
        ]);
          DB::table('archivos')->insert([
          'url'              => 'prueba',
          'archivoable_type' => 'App\Contenido',
          'archivoable_id'   => 1,
        ]);


    }
}