<?php

namespace App\Http\Controllers;

use App\Divisi;
use App\Http\Requests\DivisiRequest;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semuaDivisi = Divisi::all();

        return view('divisi.index', compact('semuaDivisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('divisi.create', ['divisi' => new Divisi]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\DivisiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DivisiRequest $request)
    {
        Divisi::create($request->only('nama'));

        return redirect()->route('divisi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function show(Divisi $divisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function edit(Divisi $divisi)
    {
        return view('divisi.edit', compact('divisi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\DivisiRequest  $request
     * @param  \App\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function update(DivisiRequest $request, Divisi $divisi)
    {
        $divisi->update($request->only('nama'));

        return redirect()->route('divisi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Divisi $divisi)
    {
        $divisi->delete();

        return redirect()->route('divisi.index');
    }
}
