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
           'name'        => 'Administrador',
           'descripcion' => 'administrador',
           'full-access' => 'yes',
           'estado'      => 'on',
           'created_at'  => now(),
           'updated_at'  => now()
           ]);

           DB::table('roles')->insert([
           'name'        => 'Estudiante',
           'descripcion' => 'estudiante',
           'full-access' => 'no',
           'estado'      => 'on',
           'created_at'  => now(),
           'updated_at'  => now()
           ]);
             DB::table('roles')->insert([
           'name'        => 'Docente',
           'descripcion' => 'docente',
           'full-access' => 'no',
           'estado'      => 'on',
           'created_at'  => now(),
           'updated_at'  => now()
           ]);

           DB::table('users')->insert([
         
           'cedula'          => '0943557611',
           'name'            =>'Juan',
           'apellido'        => 'Perez',
           'domicilio'       => 'La 20 y domingo sabio',
           'telefono'        => '0980727393',
           'celular'         => '044549611',
           'email'           => 'user1@smartmoodle.com',
           'password'        => Hash::make('smartmoodle'),
           'estado'          => 'on',
           'created_at'      => now(),
           'updated_at'      => now()
           ]);


           DB::table('users')->insert([
           'instituto_id'    => 1,
           'cedula'          => '0958784521',
           'name'            =>'Lina',
           'apellido'        => 'Salazar',
           'domicilio'       => '11 y 4 de noviembre',
           'telefono'        => '0654789512',
           'celular'         => '0248759658',
           'email'           => 'user2@smartmoodle.com',
           'password'        => Hash::make('12345678'),
           'estado'          => 'on',
           'created_at'      => now(),
           'updated_at'      => now()
           ]);

           DB::table('users')->insert([
           'instituto_id'    => 1,
           'cedula'          => '0958784521',
           'name'            =>'Eddu',
           'apellido'        => 'Gaspar',
           'domicilio'       => '20 y domingo sabio',
           'telefono'        => '0985474512',
           'celular'         => '0425698452',
           'email'           => 'user3@smartmoodle.com',
           'password'        => Hash::make('12345678'),
           'estado'          => 'on',
           'created_at'      => now(),
           'updated_at'      => now()
           ]);
           DB::table('users')->insert([
            'instituto_id'    => 2,
            'cedula'          => '0958784521',
            'name'            =>'Esteban',
            'apellido'        => 'Gaspar',
            'domicilio'       => '20 y domingo sabio',
            'telefono'        => '0985474512',
            'celular'         => '0425698452',
            'email'           => 'user4@smartmoodle.com',
            'password'        => Hash::make('12345678'),
            'estado'          => 'on',
            'created_at'      => now(),
            'updated_at'      => now()
            ]);

            DB::table('role_user')->insert([
           'role_id'    => 1,
           'user_id'    => 1,
           'created_at' => now(),
           'updated_at' => now()
        ]);

            DB::table('role_user')->insert([
           'role_id'    => 2,
           'user_id'    => 2,
           'created_at' => now(),
           'updated_at' => now()
        ]);

            DB::table('role_user')->insert([
           'role_id'    => 3,
           'user_id'    => 3,
           'created_at' => now(),
           'updated_at' => now()
        ]);
        DB::table('role_user')->insert([
            'role_id'    => 3,
            'user_id'    => 4,
            'created_at' => now(),
            'updated_at' => now()
         ]);
    }
}
