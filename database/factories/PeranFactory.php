<?php

$factory->define(App\Peran::class, function (Faker\Generator $faker) {
    return [
        'nama' => $faker->randomElement([
            'Admin', 'Manager 1', 'Manager 2',
        ]),
    ];
});
