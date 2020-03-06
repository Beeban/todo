<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LegalContacts;
use Faker\Generator as Faker;

$factory->define(LegalContacts::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'position' => $faker->jobTitle,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
    ];
});
