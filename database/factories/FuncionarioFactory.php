<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Funcionario;
use Faker\Generator as Faker;

$factory->define(Funcionario::class, function (Faker $faker) {

    $sexo = $faker->randomElement(['male', 'female']);

    return [
        'nome' => $faker->firstName($sexo),
        'sobrenome' => $faker->lastName($sexo),
        'data_nascimento' => $faker->dateTimeBetween($startDate = '-100 years', $endDate = '-18 years')->format("Y-m-d"),
        'sexo' => substr($sexo, 0, 1),
    ];

});
