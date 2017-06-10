<?php

$factory->define(App\Karyawan::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'id_unit_kerja' => function () {
            return factory(App\UnitKerja::class)->create()->getKey();
        },
        'id_peran' => function () {
            return factory(App\Peran::class)->create()->getKey();
        },
        'nik' => $faker->randomNumber(9, true),
        'nama' => $faker->name,
        'username' => $faker->userName,
        'password' => $password ?: $password = bcrypt('1234567890'),
        'jenis_kelamin' => $faker->randomElement([1, 2]),
        'tempat_lahir' => $faker->city,
        'tanggal_lahir' => $faker->dateTimeBetween('-40 years', '-20 years')->format('Y-m-d'),
    ];
});
