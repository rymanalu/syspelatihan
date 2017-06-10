<?php

$factory->define(App\UnitKerja::class, function (Faker\Generator $faker) {
    return [
        'id_divisi' => function () {
            return factory(App\Divisi::class)->create()->getKey();
        },
        'nama' => $faker->jobTitle,
    ];
});
