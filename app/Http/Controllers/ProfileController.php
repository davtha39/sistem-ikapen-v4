<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Anggota;

class ProfileController extends Controller
{
    public function __invoke()
    {
        // Controller logic here
    }
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'gender'=>'required',
            'no_pensiun'=>'required',
            'NIK'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'alamat_lengkap'=>'required',
            'no_telp'=>'required',
            'foto'=>'nullable|image|mimes:png,jpg,jpeg,webp',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->gender = $request->gender;
        $user->no_pensiun = $request->no_pensiun;
        $user->NIK = $request->NIK;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->alamat_lengkap = $request->alamat_lengkap;
        $user->no_telp = $request->no_telp;
        $user->foto = $foto;
        $user->save();
        return redirect()->back()->with('succes', 'Profile berhasil diupdate');
    }
}
