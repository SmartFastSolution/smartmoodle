<?php

use Illuminate\Database\Seeder;

class Plantilla extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('plantillas')->insert([
          'id' => 1,
          'nombre' => 'TALLER 1 - COMPLETE EL ENUNCIADO CORRECTAMENTE',
          'descripcion' => 'Taller designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
       DB::table('plantillas')->insert([
        'id' => 2,
          'nombre' => 'TALLER 2 - CLASIFICAR CON ORIGINALIDAD',
          'descripcion' => 'Taller designado para clasificar',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
        DB::table('plantillas')->insert([
          'id' => 3,
          'nombre' => 'TALLER 3 - COMPLETAR ENUNCIADOS CORRECTAMENTE',
          'descripcion' => 'Taller designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
         DB::table('plantillas')->insert([
          'id' => 4,
          'nombre' => 'TALLER 4 - ESCRIBIR DIFERENCIAS',
          'descripcion' => 'Taller designado para escribir diferencias',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
          DB::table('plantillas')->insert([
            'id' => 5,
          'nombre' => 'TALLER 5 - SEÑALAR LA ALTERNATIVA CORRECTA',
          'descripcion' => 'Taller designado para señalar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
           DB::table('plantillas')->insert([
            'id' => 6,
          'nombre' => 'TALLER 6 - IDENTIFICAR CORRECTAMENTE',
          'descripcion' => 'Taller designado para identificar de manera correcta',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
            DB::table('plantillas')->insert([
              'id' => 7,
          'nombre' => 'TALLER 7 - ESCRIBIR EN GUSANILLO',
          'descripcion' => 'Taller designado para escribir en gusanillo',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
             DB::table('plantillas')->insert([
              'id' => 8,
          'nombre' => 'TALLER 8 - ESCRIBIR EN CIRCULOS',
          'descripcion' => 'Taller designado para escribir en circulos ',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
              DB::table('plantillas')->insert([
                'id' => 9,
          'nombre' => 'TALLER 9 - SUBRAYAR LA ALTERNATIVA',
          'descripcion' => 'Taller designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
               DB::table('plantillas')->insert([
                'id' => 10,
          'nombre' => 'TALLER 10 - RELACIONAR ENUNCIADOS',
          'descripcion' => 'Taller designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                DB::table('plantillas')->insert([
                  'id' => 11,
          'nombre' => 'TALLER 11 - RELACIONAR ENUNCIADOS - MODELO 2',
          'descripcion' => 'Taller designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                 DB::table('plantillas')->insert([
                  'id' => 12,
          'nombre' => 'TALLER 12 - COMPLETE EL ENUNCIADO',
          'descripcion' => 'Taller designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                  DB::table('plantillas')->insert([
                    'id' => 13,
          'nombre' => 'TALLER 13 - DEFINIR ENUNCIADOS',
          'descripcion' => 'Taller designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                   DB::table('plantillas')->insert([
                    'id' => 14,
          'nombre' => 'TALLER 14 - IDENTIFICAR PERSONAS',
          'descripcion' => 'Taller designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                    DB::table('plantillas')->insert([
                      'id' => 15,
          'nombre' => 'TALLER 15 - LLENAR CHEQUE',
          'descripcion' => 'Taller designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                     DB::table('plantillas')->insert([
                      'id' => 16,
          'nombre' => 'TALLER 16 - ENDOSAR CHEQUE',
          'descripcion' => 'Taller designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                      DB::table('plantillas')->insert([
                        'id' => 17,
          'nombre' => 'TALLER 17 - CONVERTIR CHEQUES',
          'descripcion' => 'Taller designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                   DB::table('plantillas')->insert([
                    'id' => 18,
          'nombre' => 'TALLER 18 - LETRA  DE  CAMBIO',
          'descripcion' => 'Taller designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                   DB::table('plantillas')->insert([
                    'id' => 19,
          'nombre' => 'TALLER 19 - CERTIFICADO DE DEPOSITO',
          'descripcion' => 'Taller designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                   DB::table('plantillas')->insert([
                    'id' => 20,
                          
          'nombre' => 'TALLER 20 - PAGARE',
          'descripcion' => 'Taller designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                   DB::table('plantillas')->insert([
                    'id' => 21,
          'nombre' => 'TALLER 21 - VALE DE CAJA',
          'descripcion' => 'Taller designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                   DB::table('plantillas')->insert([
                    'id' => 22,
          'nombre' => 'TALLER 22 - NOTA DE PEDIDO',
          'descripcion' => 'Taller designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                   DB::table('plantillas')->insert([
                    'id' => 23,
          'nombre' => 'TALLER 23 - RECIBO',
          'descripcion' => 'Taller designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                   DB::table('plantillas')->insert([
                    'id' => 24,
          'nombre' => 'TALLER 24 - ORDEN DE PAGO',
          'descripcion' => 'Taller designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                   DB::table('plantillas')->insert([
                    'id' => 25,
          'nombre' => 'TALLER 25 - FACTURA',
          'descripcion' => 'Taller designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                   DB::table('plantillas')->insert([
                    'id' => 26,
          'nombre' => 'TALLER 26 - NOTA DE VENTA',
          'descripcion' => 'Taller designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
          DB::table('plantillas')->insert([
            'id' => 27,
          'nombre' => 'TALLER 27 - SIGNIFICADO DE ABREVIATURA',
          'descripcion' => 'Taller designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
          DB::table('plantillas')->insert([
          'id' => 34,
          'nombre' => 'TALLER 28 - COLLAGE',
          'descripcion' => 'Taller designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);

         

    }
}