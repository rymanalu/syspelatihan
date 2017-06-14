<?php

namespace App\Http\Controllers;

use Auth;
use App\Peran;
use App\Karyawan;
use App\Pengusulan;
use App\Http\Requests\PengusulanRequest;

class PengusulanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semuaPengusulan = Pengusulan::with('karyawan')->get();

        return view('pengusulan.index', compact('semuaPengusulan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengusulan.create', ['pengusulan' => new Pengusulan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PengusulanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PengusulanRequest $request)
    {
        $data = $request->only('keterangan_pelatihan', 'target_hasil_pelatihan', 'catatan');

        $data['id_karyawan'] = Auth::user()->id;

        $data['tanggal_pengajuan'] = date('Y-m-d');

        Pengusulan::create($data);

        return redirect()->route('pengusulan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengusulan  $pengusulan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengusulan $pengusulan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengusulan  $pengusulan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengusulan $pengusulan)
    {
        return view('pengusulan.edit', compact('pengusulan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PengusulanRequest  $request
     * @param  \App\Pengusulan  $pengusulan
     * @return \Illuminate\Http\Response
     */
    public function update(PengusulanRequest $request, Pengusulan $pengusulan)
    {
        $pengusulan->update(
            $request->only('keterangan_pelatihan', 'target_hasil_pelatihan', 'catatan')
        );

        return redirect()->route('pengusulan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengusulan  $pengusulan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengusulan $pengusulan)
    {
        $pengusulan->delete();

        return redirect()->route('pengusulan.index');
    }

    public function approve(Pengusulan $pengusulan)
    {
        $peran = Auth::user()->peran->nama;

        $data = [];

        switch ($peran) {
            case Peran::ADMIN:
            case Peran::MANAJER2:
                $data['status'] = Pengusulan::APPROVE_MANAJER2;

                if (is_null($pengusulan->tanggal_approve_1)) {
                    $data['tanggal_approve_1'] = date('Y-m-d');
                }

                if (is_null($pengusulan->tanggal_approve_2)) {
                    $data['tanggal_approve_2'] = date('Y-m-d');
                }

                break;
            case Peran::MANAJER1:
                $data['status'] = Pengusulan::APPROVE_MANAJER1;

                if (is_null($pengusulan->tanggal_approve_1)) {
                    $data['tanggal_approve_1'] = date('Y-m-d');
                }

                break;
            default:
                $data['status'] = Pengusulan::BARU;
                break;
        }

        $pengusulan->update($data);

        return redirect()->route('pengusulan.index');
    }
}
