<?php

namespace App\Http\Controllers;

use DB;
use App\Karyawan;
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
                            ->select('karyawan.id as id_karyawan', 'karyawan.nama', DB::raw('avg(penilaian_evaluasi.nilai) as nilai'), 'penilaian_evaluasi.id_pelatihan')
                            ->orderBy('karyawan.id')
                            ->groupBy('karyawan.id', 'penilaian_evaluasi.id_pelatihan', 'karyawan.nama')
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

    public function detail(Pelatihan $pelatihan, Karyawan $karyawan)
    {
        $detail = DB::table('penilaian_evaluasi')
                    ->join('karyawan', 'karyawan.id', '=', 'penilaian_evaluasi.id_karyawan')
                    ->join('evaluasi_pelatihan', 'evaluasi_pelatihan.id', '=', 'penilaian_evaluasi.id_evaluasi_pelatihan')
                    ->join('pelatihan', 'pelatihan.id', '=', 'penilaian_evaluasi.id_pelatihan')
                    ->select('karyawan.id', 'karyawan.nama', 'evaluasi_pelatihan.judul', 'penilaian_evaluasi.nilai', 'pelatihan.nama as nama_pelatihan')
                    ->orderBy('karyawan.id')
                    ->where('penilaian_evaluasi.id_pelatihan', $pelatihan->id)
                    ->where('penilaian_evaluasi.id_karyawan', $karyawan->id)
                    ->get();

        $karyawan = $detail->first();

        $avg = number_format($detail->avg('nilai'), 2);

        return view('hasil_evaluasi.detail', compact('detail', 'karyawan', 'avg'));
    }
}
