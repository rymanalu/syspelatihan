<?php

namespace App\Http\Controllers;

use App\Provider;
use App\Pelatihan;
use App\Http\Requests\PelatihanRequest;

class PelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semuaPelatihan = Pelatihan::with('provider')->get();

        return view('pelatihan.index', compact('semuaPelatihan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelatihan.create', [
            'pelatihan' => new Pelatihan,
            'semuaProvider' => Provider::orderBy('nama')->pluck('nama', 'id')->toArray(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PelatihanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PelatihanRequest $request)
    {
        $data = $request->only(
            'id_provider', 'nama', 'tanggal_mulai', 'tanggal_selesai', 'biaya_per_orang', 'catatan', 'status'
        );

        if ($request->hasFile('brosur')) {
            $data['brosur'] = $request->file('brosur')->storePublicly('brosur');
        }

        Pelatihan::create($data);

        return redirect()->route('pelatihan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pelatihan  $pelatihan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelatihan $pelatihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pelatihan  $pelatihan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelatihan $pelatihan)
    {
        $semuaProvider = Provider::orderBy('nama')->pluck('nama', 'id')->toArray();

        return view('pelatihan.edit', compact('pelatihan', 'semuaProvider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PelatihanRequest  $request
     * @param  \App\Pelatihan  $pelatihan
     * @return \Illuminate\Http\Response
     */
    public function update(PelatihanRequest $request, Pelatihan $pelatihan)
    {
        $data = $request->only(
            'id_provider', 'nama', 'tanggal_mulai', 'tanggal_selesai', 'biaya_per_orang', 'catatan', 'status'
        );

        if ($request->hasFile('brosur')) {
            $data['brosur'] = $request->file('brosur')->storePublicly('brosur');
        }

        $pelatihan->update($data);

        return redirect()->route('pelatihan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pelatihan  $pelatihan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelatihan $pelatihan)
    {
        $pelatihan->delete();

        return redirect()->route('pelatihan.index');
    }
}