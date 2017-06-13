<?php

use App\Peran;

$factory->define(Peran::class, function (Faker\Generator $faker) {
    return [
        'nama' => $faker->randomElement([
            Peran::ADMIN, PERAN::MANAJER1, PERAN::MANAJER2, Peran::USER,
        ]),
    ];
});
