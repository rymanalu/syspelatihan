<?php

use App\Peran;
use App\Karyawan;
use Illuminate\Database\Seeder;

class KaryawanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $peran = Peran::first();

        factory(Karyawan::class)->create([
            'id_unit_kerja' => null,
            'id_peran' => $peran->getKey(),
            'nama' => 'Administrator',
            'username' => 'admin',
            'jenis_kelamin' => 1,
        ]);
    }
}
