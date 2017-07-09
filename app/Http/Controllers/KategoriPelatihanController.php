<?php

namespace App\Http\Controllers;

use App\KategoriPelatihan;
use App\Http\Requests\KategoriPelatihanRequest;

class KategoriPelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semuaKategoriPelatihan = KategoriPelatihan::all();

        return view('kategori_pelatihan.index', compact('semuaKategoriPelatihan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori_pelatihan.create', ['kategoriPelatihan' => new KategoriPelatihan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\KategoriPelatihanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KategoriPelatihanRequest $request)
    {
        KategoriPelatihan::create($request->only('nama'));

        return redirect()->route('kategori_pelatihan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KategoriPelatihan  $kategoriPelatihan
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriPelatihan $kategoriPelatihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KategoriPelatihan  $kategoriPelatihan
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriPelatihan $kategoriPelatihan)
    {
        return view('kategori_pelatihan.edit', compact('kategoriPelatihan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\KategoriPelatihanRequest  $request
     * @param  \App\KategoriPelatihan  $kategoriPelatihan
     * @return \Illuminate\Http\Response
     */
    public function update(KategoriPelatihanRequest $request, KategoriPelatihan $kategoriPelatihan)
    {
        $kategoriPelatihan->update($request->only('nama'));

        return redirect()->route('kategori_pelatihan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KategoriPelatihan  $kategoriPelatihan
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriPelatihan $kategoriPelatihan)
    {
        $kategoriPelatihan->delete();

        return redirect()->route('kategori_pelatihan.index');
    }
}
