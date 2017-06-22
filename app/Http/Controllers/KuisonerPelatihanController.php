<?php

namespace App\Http\Controllers;

use App\KuisonerPelatihan;
use App\Http\Requests\KuisonerPelatihanRequest;

class KuisonerPelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semuaKuisonerPelatihan = KuisonerPelatihan::all();

        return view('kuisoner_pelatihan.index', compact('semuaKuisonerPelatihan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kuisoner_pelatihan.create', ['kuisonerPelatihan' => new KuisonerPelatihan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\KuisonerPelatihanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KuisonerPelatihanRequest $request)
    {
        KuisonerPelatihan::create($request->only('judul'));

        return redirect()->route('kuisoner_pelatihan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KuisonerPelatihan  $kuisonerPelatihan
     * @return \Illuminate\Http\Response
     */
    public function show(KuisonerPelatihan $kuisonerPelatihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KuisonerPelatihan  $kuisonerPelatihan
     * @return \Illuminate\Http\Response
     */
    public function edit(KuisonerPelatihan $kuisonerPelatihan)
    {
        return view('kuisoner_pelatihan.edit', compact('kuisonerPelatihan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\KuisonerPelatihanRequest  $request
     * @param  \App\KuisonerPelatihan  $kuisonerPelatihan
     * @return \Illuminate\Http\Response
     */
    public function update(KuisonerPelatihanRequest $request, KuisonerPelatihan $kuisonerPelatihan)
    {
        $kuisonerPelatihan->update($request->only('judul'));

        return redirect()->route('kuisoner_pelatihan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KuisonerPelatihan  $kuisonerPelatihan
     * @return \Illuminate\Http\Response
     */
    public function destroy(KuisonerPelatihan $kuisonerPelatihan)
    {
        $kuisonerPelatihan->delete();

        return redirect()->route('kuisoner_pelatihan.index');
    }
}
