<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\Pengurus;
use App\Models\User;
use App\Models\Arsip;
use App\Models\Pengumuman;
use App\Models\Artikel;
use App\Models\Surat;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function pengurusHome()
    {
        $totalpengurus = User::where('role', 'pengurus')->count();
        $totalanggota = User::where('role', 'anggota')->count();
        $totalarsip = Arsip::count();
        $totalpengumuman = Pengumuman::count();
        $totalartikel = Artikel::count();
        $totalsurat = Surat::count();
        return view('pengurus.home', [
            'totalpengurus' => $totalpengurus,
            'totalanggota' => $totalanggota,
            'totalarsip' => $totalarsip,
            'totalpengumuman' => $totalpengumuman,
            'totalartikel' => $totalartikel,
            'totalsurat' => $totalsurat
        ]);
    }

    public function anggotaHome()
    {
        $totalarsip = Arsip::count();
        $totalpengumuman = Pengumuman::count();
        $totalartikel = Artikel::count();
        $totalsurat = Surat::count();
        return view('anggota.home', [
            'totalarsip' => $totalarsip,
            'totalpengumuman' => $totalpengumuman,
            'totalartikel' => $totalartikel,
            'totalsurat' => $totalsurat
        ]);
    }
}
