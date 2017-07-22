<?php

namespace App\Http\Controllers;

use DB;
use App\Pelatihan;
use Illuminate\Http\Request;

class HasilPeningkatanPelatihanController extends Controller
{
    public function index()
    {
        $semuaPelatihan = Pelatihan::has('peningkatan')->where('status', true)->pluck('nama', 'id');

        return view('hasil_peningkatan_pelatihan.index', compact('semuaPelatihan'));
    }

    public function data(Pelatihan $pelatihan)
    {
        $labels = $pelatihan->karyawan()->orderBy('nama')->pluck('nama')->toArray();
        $totalKaryawan = count($labels);

        $datasets = [
            [
                'label' => 'Pre Test',
                'data' => DB::table('peningkatan_pelatihan')
                            ->join('karyawan', 'karyawan.id', '=', 'peningkatan_pelatihan.id_karyawan')
                            ->where('id_pelatihan', $pelatihan->id)
                            ->orderBy('karyawan.nama')
                            ->pluck('peningkatan_pelatihan.pre_test')
                            ->toArray(),
                'backgroundColor' => array_fill(0, $totalKaryawan, 'rgba(54, 162, 235, 0.2)'),
                'borderColor' => array_fill(0, $totalKaryawan, 'rgba(54, 162, 235, 1)'),
                'borderWidth' => 1,
            ],
            [
                'label' => 'Post Test',
                'data' => DB::table('peningkatan_pelatihan')
                            ->join('karyawan', 'karyawan.id', '=', 'peningkatan_pelatihan.id_karyawan')
                            ->where('id_pelatihan', $pelatihan->id)
                            ->orderBy('karyawan.nama')
                            ->pluck('peningkatan_pelatihan.post_test')
                            ->toArray(),
                'backgroundColor' => array_fill(0, $totalKaryawan, 'rgba(255, 99, 132, 0.2)'),
                'borderColor' => array_fill(0, $totalKaryawan, 'rgba(255, 99, 132, 1)'),
                'borderWidth' => 1,
            ]
        ];

        return response()->json(compact('labels', 'datasets'));
    }
}
