<?php

namespace App\Http\Controllers;

use App\Provider;
use App\BeritaPelatihan;
use App\KategoriPelatihan;
use App\Http\Requests\BeritaPelatihanRequest;

class BeritaPelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semuaBeritaPelatihan = BeritaPelatihan::with('provider', 'kategoriPelatihan')->get();

        return view('berita_pelatihan.index', compact('semuaBeritaPelatihan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('berita_pelatihan.create', [
            'beritaPelatihan' => new BeritaPelatihan,
            'semuaProvider' => Provider::orderBy('nama')->pluck('nama', 'id')->toArray(),
            'semuaKategoriPelatihan' => KategoriPelatihan::orderBy('nama')->pluck('nama', 'id')->toArray(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BeritaPelatihanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BeritaPelatihanRequest $request)
    {
        $data = $request->only(
            'id_provider', 'id_kategori_pelatihan', 'nama', 'tanggal_mulai', 'tanggal_selesai', 'biaya_per_orang', 'catatan'
        );

        if ($request->hasFile('brosur')) {
            $data['brosur'] = $request->file('brosur')->storePublicly('brosur');
        }

        BeritaPelatihan::create($data);

        return redirect()->route('berita_pelatihan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BeritaPelatihan  $beritaPelatihan
     * @return \Illuminate\Http\Response
     */
    public function show(BeritaPelatihan $beritaPelatihan)
    {
        return view('berita_pelatihan.show', compact('beritaPelatihan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BeritaPelatihan  $beritaPelatihan
     * @return \Illuminate\Http\Response
     */
    public function edit(BeritaPelatihan $beritaPelatihan)
    {
        return view('berita_pelatihan.edit', [
            'beritaPelatihan' => $beritaPelatihan,
            'semuaProvider' => Provider::orderBy('nama')->pluck('nama', 'id')->toArray(),
            'semuaKategoriPelatihan' => KategoriPelatihan::orderBy('nama')->pluck('nama', 'id')->toArray(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BeritaPelatihanRequest  $request
     * @param  \App\BeritaPelatihan  $beritaPelatihan
     * @return \Illuminate\Http\Response
     */
    public function update(BeritaPelatihanRequest $request, BeritaPelatihan $beritaPelatihan)
    {
        $data = $request->only(
            'id_provider', 'id_kategori_pelatihan', 'nama', 'tanggal_mulai', 'tanggal_selesai', 'biaya_per_orang', 'catatan'
        );

        if ($request->hasFile('brosur')) {
            $data['brosur'] = $request->file('brosur')->storePublicly('brosur');
        }

        $beritaPelatihan->update($data);

        return redirect()->route('berita_pelatihan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BeritaPelatihan  $beritaPelatihan
     * @return \Illuminate\Http\Response
     */
    public function destroy(BeritaPelatihan $beritaPelatihan)
    {
        $beritaPelatihan->delete();

        return redirect()->route('berita_pelatihan.index');
    }
}
