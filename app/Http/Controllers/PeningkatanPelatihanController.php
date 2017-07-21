<?php

namespace App\Http\Controllers;

use App\Pelatihan;
use Illuminate\Http\Request;
use App\PeningkatanPelatihan;

class PeningkatanPelatihanController extends Controller
{
    public function index(Request $request)
    {
        $pelatihanId = $request->input('pelatihan');
        $hasPelatihan = $request->has('pelatihan') && ! is_null($pelatihanId);
        $semuaPelatihan = Pelatihan::doesntHave('peningkatan')->where('status', true)->pluck('nama', 'id');

        if ($hasPelatihan) {
            $pelatihan = Pelatihan::find($pelatihanId);
        }

        return view('peningkatan_pelatihan.index', compact('pelatihanId', 'hasPelatihan', 'semuaPelatihan', 'pelatihan'));
    }

    public function store(Request $request, Pelatihan $pelatihan)
    {
        foreach ($request->input('peningkatan_pelatihan') as $karyawan => $hasil) {
            PeningkatanPelatihan::create([
                'id_pelatihan' => $pelatihan->id,
                'id_karyawan' => $karyawan,
                'pre_test' => $hasil['pre_test'],
                'post_test' => $hasil['post_test'],
                'peningkatan' => $hasil['post_test'] - $hasil['pre_test'],
            ]);
        }

        return redirect()->route('peningkatan_pelatihan.index');
    }
}
