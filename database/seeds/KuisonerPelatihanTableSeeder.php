<?php

use App\KuisonerPelatihan;
use Illuminate\Database\Seeder;

class KuisonerPelatihanTableSeeder extends Seeder
{
    /**
     * Data that will be seeded.
     *
     * @var array
     */
    protected $semuaAspek = [
        'Metode pengajaran yang digunakan',
        'Bahasa yang digunakan',
        'Cara menjawab pertanyaan',
        'Penguasaan materi',
        'Penyampaian materi',
        'Kesesuaian materi dengan modul yang diberikan',
        'Manfaat materi dalam pekerjaan',
        'Modul membantu proses pembelajaran',
        'Sistematika penyajian materi',
        'Kejelasan / kemudahan materi untuk dipahami',
        'Konsumsi',
        'Seminar Kit',
        'Fasilitas ruangan (meja, kursi)',
        'Kualitas dan kesesuaian audio visual / alat peraga',
        'Ruangan (cahaya, luas, akustik, ventilasi)',
        'Ketepatan waktu pelaksanaan pelatihan',
        'Kesediaan panitia dalam membantu peserta',
        'Kesigapan panitia dalam membantu peserta',
        'Suasana kelas selama pelatihan',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->semuaAspek as $judul) {
            factory(KuisonerPelatihan::class)->create(compact('judul'));
        }
    }
}
