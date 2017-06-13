<?php

$factory->define(App\EvaluasiPelatihan::class, function (Faker\Generator $faker) {
    return [
        'id_pelatihan' => $faker->boolean ? function () {
            return factory(App\Pelatihan::class)->create();
        } : null,
        'judul' => $faker->sentence,
        'default' => $faker->boolean,
    ];
});
