<?php

$factory->define(App\KuisonerPelatihan::class, function (Faker\Generator $faker) {
    return ['judul' => $faker->sentence];
});
