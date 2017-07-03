<?php

namespace App\Http\Controllers;

use Auth;
use App\Pelatihan;
use App\Pengusulan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loggedInUser = Auth::user();

        return view('home', [
            'createdPengusulan' => Pengusulan::where('id_karyawan', $loggedInUser->id)->get(),
            'followedPelatihan' => $loggedInUser->pelatihan,
            'unansweredPelatihanQuiz' => Pelatihan::whereDoesntHave('jawabanKuisonerPelatihanKaryawan', function ($query) use ($loggedInUser) {
                $query->where('id_karyawan', $loggedInUser->id);
            })->whereHas('karyawan', function ($query) use ($loggedInUser) {
                $query->where('karyawan.id', $loggedInUser->id);
            })->where('status', true)->get(),
        ]);
    }
}
