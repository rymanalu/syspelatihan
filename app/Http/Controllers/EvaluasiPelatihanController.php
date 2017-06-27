<?php

namespace App\Http\Controllers;

use App\Pelatihan;
use App\EvaluasiPelatihan;
use App\Http\Requests\EvaluasiPelatihanRequest;

class EvaluasiPelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semuaEvaluasiPelatihan = EvaluasiPelatihan::with('pelatihan')->get();

        return view('evaluasi_pelatihan.index', compact('semuaEvaluasiPelatihan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('evaluasi_pelatihan.create', [
            'evaluasiPelatihan' => new EvaluasiPelatihan,
            'semuaPelatihan' => Pelatihan::orderBy('nama')->pluck('nama', 'id')->toArray(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EvaluasiPelatihanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EvaluasiPelatihanRequest $request)
    {
        EvaluasiPelatihan::create($request->only('id_pelatihan', 'judul', 'default'));

        return redirect()->route('evaluasi_pelatihan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EvaluasiPelatihan  $evaluasiPelatihan
     * @return \Illuminate\Http\Response
     */
    public function show(EvaluasiPelatihan $evaluasiPelatihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EvaluasiPelatihan  $evaluasiPelatihan
     * @return \Illuminate\Http\Response
     */
    public function edit(EvaluasiPelatihan $evaluasiPelatihan)
    {
        $semuaPelatihan = Pelatihan::orderBy('nama')->pluck('nama', 'id')->toArray();

        return view('evaluasi_pelatihan.edit', compact('evaluasiPelatihan', 'semuaPelatihan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EvaluasiPelatihanRequest  $request
     * @param  \App\EvaluasiPelatihan  $evaluasiPelatihan
     * @return \Illuminate\Http\Response
     */
    public function update(EvaluasiPelatihanRequest $request, EvaluasiPelatihan $evaluasiPelatihan)
    {
        $evaluasiPelatihan->update($request->only('id_pelatihan', 'judul', 'default'));

        return redirect()->route('evaluasi_pelatihan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EvaluasiPelatihan  $evaluasiPelatihan
     * @return \Illuminate\Http\Response
     */
    public function destroy(EvaluasiPelatihan $evaluasiPelatihan)
    {
        $evaluasiPelatihan->delete();

        return redirect()->route('evaluasi_pelatihan.index');
    }
}
