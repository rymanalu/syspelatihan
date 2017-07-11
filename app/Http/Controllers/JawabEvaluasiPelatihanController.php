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

        return view('jawab_evaluasi.create', compact('pelatihan', 'semuaEvaluasi'));
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
        foreach ($request->input('evaluasi') as $aspek => $jawaban) {
            DB::table('penilaian_evaluasi')
                ->insert([
                    'id_evaluasi_pelatihan' => $aspek,
                    'id_karyawan' => Auth::user()->id,
                    'nilai' => $jawaban,
                ]);
        }

        $pelatihan->update(['is_evaluated' => true]);

        return redirect()->route('home');
    }
}
