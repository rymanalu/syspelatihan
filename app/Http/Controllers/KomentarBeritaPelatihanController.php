<?php

namespace App\Http\Controllers;

use Auth;
use App\BeritaPelatihan;
use App\Http\Requests\KomentarBeritaPelatihanRequest;

class KomentarBeritaPelatihanController extends Controller
{
    public function tambahKomentar(KomentarBeritaPelatihanRequest $request, BeritaPelatihan $beritaPelatihan)
    {
        $beritaPelatihan->komentar()->create([
            'id_karyawan' => Auth::user()->id,
            'komentar' => $request->input('komentar'),
        ]);

        return redirect()->route('berita_pelatihan.show', $beritaPelatihan);
    }
}
