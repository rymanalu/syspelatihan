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
            $pelatihan =  DB::table('jawaban_kuisoner_pelatihan')
                            ->join('karyawan', 'karyawan.id', '=', 'jawaban_kuisoner_pelatihan.id_karyawan')
                            ->join('kuisoner_pelatihan', 'kuisoner_pelatihan.id', '=', 'jawaban_kuisoner_pelatihan.id_kuisoner_pelatihan')
                            ->select('karyawan.id', 'karyawan.nama', 'kuisoner_pelatihan.judul', 'jawaban_kuisoner_pelatihan.jawaban')
                            ->orderBy('karyawan.id')
                            ->where('jawaban_kuisoner_pelatihan.id_pelatihan', $pelatihanId)
                            ->get();

            $pelatihan = $pelatihan->groupBy('id');
        }

        return view('hasil_kuisoner.index', compact('hasPelatihan', 'semuaPelatihan', 'pelatihanId', 'pelatihan'));
    }
}
