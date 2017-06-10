<?php

use Carbon\Carbon;
use App\Pengusulan;

$factory->define(Pengusulan::class, function (Faker\Generator $faker) {
    return [
        'id_karyawan' => function () {
            return factory(App\Karyawan::class)->create()->getKey();
        },
        'keterangan_pelatihan' => $faker->text,
        'target_hasil_pelatihan' => $faker->text,
        'catatan' => $faker->text,
        'status' => $faker->randomElement([
            Pengusulan::BARU, Pengusulan::APPROVE_MANAJER1, Pengusulan::APPROVE_MANAJER2,
        ]),
        'tanggal_pengajuan' => $faker->dateTimeBetween('-5 years')->format('Y-m-d'),
        'tanggal_approve_1' => function (array $pengusulan) use ($faker) {
            return $pengusulan['status'] === Pengusulan::APPROVE_MANAJER1 || $pengusulan['status'] === Pengusulan::APPROVE_MANAJER2
                    ? Carbon::createFromFormat('Y-m-d', $pengusulan['tanggal_pengajuan'])
                            ->addDays($faker->numberBetween(1, 7))
                            ->format('Y-m-d')
                    : null;
        },
        'tanggal_approve_2' => function (array $pengusulan) use ($faker) {
            return $pengusulan['status'] === Pengusulan::APPROVE_MANAJER2
                    ? Carbon::createFromFormat('Y-m-d', $pengusulan['tanggal_approve_1'])
                            ->addDays($faker->numberBetween(1, 7))
                            ->format('Y-m-d')
                    : null;
        },
    ];
});
