<?php

$factory->define(App\Provider::class, function (Faker\Generator $faker) {
    return [
        'nama' => $faker->company,
        'alamat' => $faker->address,
        'telepon' => $faker->e164PhoneNumber,
        'email' => $faker->safeEmail,
    ];
});
