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
            $pelatihan =  DB::table('penilaian_evaluasi')
                            ->join('karyawan', 'karyawan.id', '=', 'penilaian_evaluasi.id_karyawan')
                            ->join('evaluasi_pelatihan', 'evaluasi_pelatihan.id', '=', 'penilaian_evaluasi.id_evaluasi_pelatihan')
                            ->select('karyawan.id', 'karyawan.nama', 'evaluasi_pelatihan.judul', 'penilaian_evaluasi.nilai')
                            ->orderBy('karyawan.id')
                            ->where('penilaian_evaluasi.id_pelatihan', $pelatihanId)
                            ->get();

            $pelatihan = $pelatihan->groupBy('id');
        }

        return view('hasil_evaluasi.index', compact('hasPelatihan', 'semuaPelatihan', 'pelatihanId', 'pelatihan'));
    }
}
