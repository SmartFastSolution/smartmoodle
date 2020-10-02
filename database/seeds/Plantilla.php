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
          'nombre' => 'Plantilla 1 - COMPLETE EL ENUNCIADO CORRECTAMENTE',
          'descripcion' => 'Plantilla designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
       DB::table('plantillas')->insert([
        'id' => 2,
          'nombre' => 'Plantilla 2 - CLASIFICAR CON ORIGINALIDAD',
          'descripcion' => 'Plantilla designado para clasificar',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
        DB::table('plantillas')->insert([
          'id' => 3,
          'nombre' => 'Plantilla 3 - COMPLETAR ENUNCIADOS CORRECTAMENTE',
          'descripcion' => 'Plantilla designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
         DB::table('plantillas')->insert([
          'id' => 4,
          'nombre' => 'Plantilla 4 - ESCRIBIR DIFERENCIAS',
          'descripcion' => 'Plantilla designado para escribir diferencias',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
          DB::table('plantillas')->insert([
            'id' => 5,
          'nombre' => 'Plantilla 5 - SEÑALAR LA ALTERNATIVA CORRECTA',
          'descripcion' => 'Plantilla designado para señalar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
           DB::table('plantillas')->insert([
            'id' => 6,
          'nombre' => 'Plantilla 6 - IDENTIFICAR CORRECTAMENTE',
          'descripcion' => 'Plantilla designado para identificar de manera correcta',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
            DB::table('plantillas')->insert([
              'id' => 7,
          'nombre' => 'Plantilla 7 - ESCRIBIR EN GUSANILLO',
          'descripcion' => 'Plantilla designado para escribir en gusanillo',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
             DB::table('plantillas')->insert([
              'id' => 8,
          'nombre' => 'Plantilla 8 - ESCRIBIR EN CIRCULOS',
          'descripcion' => 'Plantilla designado para escribir en circulos ',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
              DB::table('plantillas')->insert([
                'id' => 9,
          'nombre' => 'Plantilla 9 - SUBRAYAR LA ALTERNATIVA',
          'descripcion' => 'Plantilla designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
               DB::table('plantillas')->insert([
                'id' => 10,
          'nombre' => 'Plantilla 10 - RELACIONAR ENUNCIADOS',
          'descripcion' => 'Plantilla designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                DB::table('plantillas')->insert([
                  'id' => 11,
          'nombre' => 'Plantilla 11 - RELACIONAR ENUNCIADOS - MODELO 2',
          'descripcion' => 'Plantilla designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                 DB::table('plantillas')->insert([
                  'id' => 12,
          'nombre' => 'Plantilla 12 - COMPLETE EL ENUNCIADO',
          'descripcion' => 'Plantilla designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                  DB::table('plantillas')->insert([
                    'id' => 13,
          'nombre' => 'Plantilla 13 - DEFINIR ENUNCIADOS',
          'descripcion' => 'Plantilla designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                   DB::table('plantillas')->insert([
                    'id' => 14,
          'nombre' => 'Plantilla 14 - IDENTIFICAR PERSONAS',
          'descripcion' => 'Plantilla designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                    DB::table('plantillas')->insert([
                      'id' => 15,
          'nombre' => 'Plantilla 15 - LLENAR CHEQUE',
          'descripcion' => 'Plantilla designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                     DB::table('plantillas')->insert([
                      'id' => 16,
          'nombre' => 'Plantilla 16 - ENDOSAR CHEQUE',
          'descripcion' => 'Plantilla designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                      DB::table('plantillas')->insert([
                        'id' => 17,
          'nombre' => 'Plantilla 17 - CONVERTIR CHEQUES',
          'descripcion' => 'Plantilla designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                   DB::table('plantillas')->insert([
                    'id' => 18,
          'nombre' => 'Plantilla 18 - LETRA  DE  CAMBIO',
          'descripcion' => 'Plantilla designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                   DB::table('plantillas')->insert([
                    'id' => 19,
          'nombre' => 'Plantilla 19 - CERTIFICADO DE DEPOSITO',
          'descripcion' => 'Plantilla designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                   DB::table('plantillas')->insert([
                    'id' => 20,
                          
          'nombre' => 'Plantilla 20 - PAGARE',
          'descripcion' => 'Plantilla designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                   DB::table('plantillas')->insert([
                    'id' => 21,
          'nombre' => 'Plantilla 21 - VALE DE CAJA',
          'descripcion' => 'Plantilla designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                   DB::table('plantillas')->insert([
                    'id' => 22,
          'nombre' => 'Plantilla 22 - NOTA DE PEDIDO',
          'descripcion' => 'Plantilla designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                   DB::table('plantillas')->insert([
                    'id' => 23,
          'nombre' => 'Plantilla 23 - RECIBO',
          'descripcion' => 'Plantilla designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                   DB::table('plantillas')->insert([
                    'id' => 24,
          'nombre' => 'Plantilla 24 - ORDEN DE PAGO',
          'descripcion' => 'Plantilla designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                   DB::table('plantillas')->insert([
                    'id' => 25,
          'nombre' => 'Plantilla 25 - FACTURA',
          'descripcion' => 'Plantilla designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
                   DB::table('plantillas')->insert([
                    'id' => 26,
          'nombre' => 'Plantilla 26 - NOTA DE VENTA',
          'descripcion' => 'Plantilla designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
          DB::table('plantillas')->insert([
            'id' => 27,
          'nombre' => 'Plantilla 27 - SIGNIFICADO DE ABREVIATURA',
          'descripcion' => 'Plantilla designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);
          DB::table('plantillas')->insert([
          'id' => 34,
          'nombre' => 'Plantilla 28 - COLLAGE',
          'descripcion' => 'Plantilla designado para completar un resultado',
          'created_at' => now(),
          'updated_at' => now(),
        ]);

         

    }
}