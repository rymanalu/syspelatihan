<?php

namespace App\Http\Controllers;

use Auth;
use App\Pelatihan;
use App\KuisonerPelatihan;
use App\Http\Requests\JawabKuisonerPelatihanRequest;

class JawabKuisonerPelatihanController extends Controller
{
    /**
     * Show the kuisoner form.
     *
     * @param  \App\Pelatihan  $pelatihan
     * @return \Illuminate\Http\Response
     */
    public function create(Pelatihan $pelatihan)
    {
        $semuaKuisoner = KuisonerPelatihan::all();

        return view('jawab_kuisoner.create', compact('pelatihan', 'semuaKuisoner'));
    }

    /**
     * Save the answers of kuisoner.
     *
     * @param  \App\Http\Requests\JawabKuisonerPelatihanRequest  $request
     * @param  \App\Pelatihan  $pelatihan
     * @return \Illuminate\Http\Response
     */
    public function store(JawabKuisonerPelatihanRequest $request, Pelatihan $pelatihan)
    {
        foreach ($request->input('kuis') as $aspek => $jawaban) {
            $pelatihan->kuisonerPelatihan()->attach(
                $aspek, ['id_karyawan' => Auth::user()->id, 'jawaban' => $jawaban]
            );
        }

        return redirect()->route('home');
    }
}
