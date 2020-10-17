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
         DB::table('roles')->insert([
           'name'      => 'Administrador',
           'descripcion' => 'El que administra',
           'full-access'   => 'yes',
           'estado'      => 'on',
           'created_at'  => now(),
           'updated_at'  => now()
        ]);

        DB::table('institutos')->insert([
           'nombre'      => 'Instituto Superior Tecnologico Vicente Rocafuerte',
           'descripcion' => 'El Mejor Colegio Del Ecuador',
           'provincia'   => 'Guayas',
           'canton'      => 'Guayaquil',
           'direccion'   => 'La  20 y domingo sabio',
           'telefono'    => '09452514524',
           'email'       => 'itsvr@itsvr.com',
           'estado'      => 'on',
           'created_at'  => now(),
           'updated_at'  => now()
        ]);

           DB::table('users')->insert([
           'instituto_id'          => 1,
           'cedula'          => '0943557611',
           'fechanacimiento' => '17/11/1998',
           'name'            =>'Jean',
           'sname'           => 'Anthony',
           'apellido'        => 'Medina',
           'sapellido'       => 'Sandoval',
           'domicilio'       => 'La 20 y domingo sabio',
           'telefono'        => '0980727393',
           'celular'         => '044549611',
           'titulo'          => 'Tecnologo',
           'email'           => 'thony918@outlook.com',
           'password'        => Hash::make('smartmoodle'),
           'estado'          => 'on',
           'fcontrato'       => '12/11/1998',
           'cirepre'         => '0989500440',
           'namerepre'       => 'Angela Narcisa Sandoval Quiñonez',
           'namema'          => 'Angela Narcisa Sandoval Quiñonez',
           'namepa'          => 'Wilmer Wahshington Medina Sandoval',
           'telefonorep'     => '09500440',
           'fregistro'       => '19/78/1998',
           'created_at'      => now(),
           'updated_at'      => now()
           ]);

            DB::table('role_user')->insert([
           'role_id'      => 1,
           'user_id' => 1,
           'created_at'  => now(),
           'updated_at'  => now()
        ]);
    }
}
