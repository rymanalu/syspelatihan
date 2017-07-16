<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Pelatihan;
use App\EvaluasiPelatihan;
use App\Http\Requests\JawabEvaluasiPelatihanRequest;

class JawabEvaluasiPelatihanController extends Controller
{
    /**
     * Show the evaluasi form.
     *
     * @param  \App\Pelatihan  $pelatihan
     * @return \Illuminate\Http\Response
     */
    public function create(Pelatihan $pelatihan)
    {
        $semuaEvaluasi = EvaluasiPelatihan::where('default', true)->get();

        $semuaEvaluasi = $semuaEvaluasi->merge($pelatihan->evaluasi);

        $semuaKaryawan = $pelatihan->karyawan;

        return view('jawab_evaluasi.create', compact('pelatihan', 'semuaEvaluasi', 'semuaKaryawan'));
    }

    /**
     * Save the answers of evaluasi.
     *
     * @param  \App\Http\Requests\JawabEvaluasiPelatihanRequest  $request
     * @param  \App\Pelatihan  $pelatihan
     * @return \Illuminate\Http\Response
     */
    public function store(JawabEvaluasiPelatihanRequest $request, Pelatihan $pelatihan)
    {
        foreach ($request->input('evaluasi') as $evaluasi) {
            foreach ($evaluasi['jawaban'] as $aspek => $nilai) {
                DB::table('penilaian_evaluasi')
                    ->insert([
                        'nilai' => $nilai,
                        'id_evaluasi_pelatihan' => $aspek,
                        'id_karyawan' => $evaluasi['karyawan'],
                    ]);
            }
        }

        $pelatihan->update(['is_evaluated' => true]);

        return redirect()->route('home');
    }
}
