<?php

namespace App\Http\Controllers;

use DB;
use App\Pelatihan;
use Illuminate\Http\Request;

class HasilKuisonerController extends Controller
{
    public function index(Request $request)
    {
        $pelatihanId = $request->input('pelatihan');
        $hasPelatihan = $request->has('pelatihan') && ! is_null($pelatihanId);
        $semuaPelatihan = Pelatihan::where('status', true)->pluck('nama', 'id');

        if ($hasPelatihan) {
            $pelatihans =  DB::table('jawaban_kuisoner_pelatihan')
                            ->join('karyawan', 'karyawan.id', '=', 'jawaban_kuisoner_pelatihan.id_karyawan')
                            ->join('kuisoner_pelatihan', 'kuisoner_pelatihan.id', '=', 'jawaban_kuisoner_pelatihan.id_kuisoner_pelatihan')
                            ->select('karyawan.id', 'karyawan.nama', DB::raw('avg(jawaban_kuisoner_pelatihan.jawaban) as jawaban'))
                            ->orderBy('karyawan.id')
                            ->groupBy('karyawan.id')
                            ->where('jawaban_kuisoner_pelatihan.id_pelatihan', $pelatihanId)
                            ->get();

            $labels = $pelatihans->pluck('nama')->toArray();
            $totalKaryawan = count($labels);
            $datasets = [
                [
                    'label' => 'Persentase',
                    'data' => $pelatihans->map(function ($item) {
                        return (number_format($item->jawaban, 2) / 5) * 100;
                    })->toArray(),
                    'backgroundColor' => array_fill(0, $totalKaryawan, 'rgba(54, 162, 235, 0.2)'),
                    'borderColor' => array_fill(0, $totalKaryawan, 'rgba(54, 162, 235, 1)'),
                    'borderWidth' => 1,
                ],
            ];

            $chartData = json_encode(compact('labels', 'datasets'));
        }

        return view('hasil_kuisoner.index', compact('hasPelatihan', 'semuaPelatihan', 'pelatihanId', 'pelatihans', 'chartData'));
    }
}
