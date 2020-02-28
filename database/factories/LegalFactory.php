<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Legal;
use Faker\Generator as Faker;

$factory->define(Legal::class, function (Faker $faker) {
    $name = $faker->company;
    return [
        'name' => $name,
        'full_name' => $faker->companyPrefix . ' ' . $name . ' ' . $faker->companySuffix,
        'address' => $faker->address,
        'inn' => $faker->inn,
        'opp' => $faker->numerify('%########'),
        'kpp' => $faker->kpp,
        'ogrn' => $faker->numerify('%############'),
    ];
});
