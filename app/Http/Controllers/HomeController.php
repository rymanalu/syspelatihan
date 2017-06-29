<?php

namespace App\Http\Controllers;

use Auth;
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

        $createdPengusulan = Pengusulan::where('id_karyawan', $loggedInUser->id)->get();

        $followedPelatihan = $loggedInUser->pelatihan;

        return view('home', compact('createdPengusulan', 'followedPelatihan'));
    }
}
