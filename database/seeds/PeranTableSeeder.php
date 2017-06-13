<?php

use App\Peran;
use Illuminate\Database\Seeder;

class PeranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $semuaPeran = [
            Peran::ADMIN, PERAN::MANAJER1, PERAN::MANAJER2, Peran::USER,
        ];

        foreach ($semuaPeran as $peran) {
            Peran::create(['nama' => $peran]);
        }
    }
}
