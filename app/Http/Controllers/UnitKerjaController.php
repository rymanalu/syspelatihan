<?php

namespace App\Http\Controllers;

use App\Divisi;
use App\UnitKerja;
use App\Http\Requests\UnitKerjaRequest;

class UnitKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semuaUnitKerja = UnitKerja::with('divisi')->get();

        return view('unit_kerja.index', compact('semuaUnitKerja'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unit_kerja.create', [
            'unitKerja' => new UnitKerja,
            'semuaDivisi' => Divisi::orderBy('nama')->pluck('nama', 'id')->toArray(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UnitKerjaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitKerjaRequest $request)
    {
        UnitKerja::create($request->only('id_divisi', 'nama'));

        return redirect()->route('unit_kerja.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UnitKerja  $unitKerja
     * @return \Illuminate\Http\Response
     */
    public function show(UnitKerja $unitKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UnitKerja  $unitKerja
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitKerja $unitKerja)
    {
        $semuaDivisi = Divisi::orderBy('nama')->pluck('nama', 'id')->toArray();

        return view('unit_kerja.edit', compact('unitKerja', 'semuaDivisi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UnitKerjaRequest  $request
     * @param  \App\UnitKerja  $unitKerja
     * @return \Illuminate\Http\Response
     */
    public function update(UnitKerjaRequest $request, UnitKerja $unitKerja)
    {
        $unitKerja->update($request->only('id_divisi', 'nama'));

        return redirect()->route('unit_kerja.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UnitKerja  $unitKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitKerja $unitKerja)
    {
        $unitKerja->delete();

        return redirect()->route('unit_kerja.index');
    }
}
