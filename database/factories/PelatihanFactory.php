<?php

use Carbon\Carbon;

$factory->define(App\Pelatihan::class, function (Faker\Generator $faker) {
    return [
        'id_provider' => function () {
            return factory(App\Provider::class)->create()->getKey();
        },
        'nama' => $faker->sentence,
        'status' => $faker->boolean,
        'tanggal_mulai' => $faker->dateTimeBetween('-5 years')->format('Y-m-d'),
        'tanggal_selesai' => function (array $pelatihan) use ($faker) {
            return $pelatihan['status']
                    ? Carbon::createFromFormat('Y-m-d', $pelatihan['tanggal_mulai'])
                            ->addDays($faker->numberBetween(1, 7))
                            ->format('Y-m-d')
                    : null;
        },
        'biaya_per_orang' => $faker->numberBetween(100000, 999999),
        'brosur' => $faker->imageUrl,
        'catatan' => $faker->boolean ? $faker->text : null,
    ];
});
