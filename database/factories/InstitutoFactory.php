<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Instituto;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Instituto::class, function (Faker $faker) {
    return [
		'nombre'      => $faker->company(),
		'descripcion' => $faker->sentence(),
		'provincia'   => $faker->randomElement(['GUAYAS','ESMERALDA','PICHINCHA','MANABI','CARCHI', 'LOJA', 'COTOPAXI', 'AZUAY']),
		'canton'      => $faker->randomElement(['GUAYAQUIL','MANTA','SALINAS','QUITO','LOJA', 'ESMERALDAS', 'SUCUMBIOS', 'AMBATO']),
		'direccion'   => $faker->address(),
		'telefono'    => '09'.$faker->unique()->randomNumber($nbDigits = 8),
		'email'       => $faker->unique()->safeEmail,
		'estado'      => 'on',
		
    ];
});
