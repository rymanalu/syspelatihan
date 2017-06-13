<?php

namespace App\Http\Controllers;

use App\Peran;
use App\Karyawan;
use App\UnitKerja;
use App\Http\Requests\KaryawanRequest;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semuaKaryawan = Karyawan::with('peran', 'unitKerja')->get();

        return view('karyawan.index', compact('semuaKaryawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan = new Karyawan;
        $karyawan->tanggal_lahir = date('Y-m-d');

        return view('karyawan.create', [
            'karyawan' => $karyawan,
            'semuaPeran' => Peran::orderBy('nama')->pluck('nama', 'id')->toArray(),
            'semuaUnitKerja' => UnitKerja::orderBy('nama')->pluck('nama', 'id')->toArray(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\KaryawanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KaryawanRequest $request)
    {
        $data = $request->only(
            'id_unit_kerja', 'id_peran', 'nik', 'nama', 'username','jenis_kelamin', 'tempat_lahir', 'tanggal_lahir'
        );

        $data['password'] = bcrypt($request->input('password'));

        Karyawan::create($data);

        return redirect()->route('karyawan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        $semuaPeran = Peran::orderBy('nama')->pluck('nama', 'id')->toArray();

        $semuaUnitKerja = UnitKerja::orderBy('nama')->pluck('nama', 'id')->toArray();

        return view('karyawan.edit', compact('karyawan', 'semuaPeran', 'semuaUnitKerja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\KaryawanRequest  $request
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(KaryawanRequest $request, Karyawan $karyawan)
    {
        $karyawan->update($request->only(
            'id_unit_kerja', 'id_peran', 'nik', 'nama', 'username','jenis_kelamin', 'tempat_lahir', 'tanggal_lahir'
        ));

        return redirect()->route('karyawan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();

        return redirect()->route('karyawan.index');
    }
}
