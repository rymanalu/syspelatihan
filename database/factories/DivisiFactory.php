<?php

$factory->define(App\Divisi::class, function (Faker\Generator $faker) {
    return [
        'nama' => $faker->company,
    ];
});
