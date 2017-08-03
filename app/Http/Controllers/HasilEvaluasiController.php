<?php

namespace App\Http\Controllers;

use DB;
use App\Pelatihan;
use Illuminate\Http\Request;

class HasilEvaluasiController extends Controller
{
    public function index(Request $request)
    {
        $pelatihanId = $request->input('pelatihan');
        $hasPelatihan = $request->has('pelatihan') && ! is_null($pelatihanId);
        $semuaPelatihan = Pelatihan::where('is_evaluated', true)->pluck('nama', 'id');

        if ($hasPelatihan) {
            $pelatihans =  DB::table('penilaian_evaluasi')
                            ->join('karyawan', 'karyawan.id', '=', 'penilaian_evaluasi.id_karyawan')
                            ->join('evaluasi_pelatihan', 'evaluasi_pelatihan.id', '=', 'penilaian_evaluasi.id_evaluasi_pelatihan')
                            ->select('karyawan.id', 'karyawan.nama', DB::raw('avg(penilaian_evaluasi.nilai) as nilai'))
                            ->orderBy('karyawan.id')
                            ->groupBy('karyawan.id')
                            ->where('penilaian_evaluasi.id_pelatihan', $pelatihanId)
                            ->get();

            $labels = $pelatihans->pluck('nama')->toArray();
            $totalKaryawan = count($labels);
            $datasets = [
                [
                    'label' => 'Persentase',
                    'data' => $pelatihans->map(function ($item) {
                        return (number_format($item->nilai, 2) / 5) * 100;
                    })->toArray(),
                    'backgroundColor' => array_fill(0, $totalKaryawan, 'rgba(54, 162, 235, 0.2)'),
                    'borderColor' => array_fill(0, $totalKaryawan, 'rgba(54, 162, 235, 1)'),
                    'borderWidth' => 1,
                ],
            ];

            $chartData = json_encode(compact('labels', 'datasets'));
        }

        return view('hasil_evaluasi.index', compact('hasPelatihan', 'semuaPelatihan', 'pelatihanId', 'pelatihans', 'chartData'));
    }
}
