<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use File;
use PDF;

class AnggotaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:pengurus']);
    }

    public function index()
    {
        $anggota = User::where('role', 'anggota')->get();
        return view ('pengurus.anggota.index',compact('anggota'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        return view ('pengurus.anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|min:8',
            //'role'=>'required',
            'gender'=>'required',
            'no_pensiun'=>'required',
            'NIK'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'alamat_lengkap'=>'required',
            'no_telp'=>'required',
            'foto'=>'nullable|image|mimes:png,jpg,jpeg,webp',
        ]);
        
        $anggota = new User;
        $anggota->name = $request->name;
        $anggota->email = $request->email;
        $anggota->password = Hash::make($request->password);
        //$anggota->role = $request->role;
        $anggota->gender = $request->gender;
        $anggota->no_pensiun = $request->no_pensiun;
        $anggota->NIK = $request->NIK;
        $anggota->tempat_lahir = $request->tempat_lahir;
        $anggota->tanggal_lahir = $request->tanggal_lahir;
        $anggota->alamat_lengkap = $request->alamat_lengkap;
        $anggota->no_telp = $request->no_telp;
        if ($request->hasFile('foto')) {
            $foto = request('foto')->getClientOriginalName();
            request()->file('foto')->move(public_path() . '/foto_user', $foto);
            $anggota->foto = $foto;
        }
        $anggota->save();

        if ($anggota) {
            return redirect()->route('anggota.index')
            ->with('succes', 'Data anggota berhasil ditambahkan ke database');
        }
    }

    public function show($id)
    {
        $anggota = User::findOrFail($id);
        return view('pengurus.anggota.show', compact('anggota'));
    }
    
    public function jadiPengurus(Request $request, $id)
    {
        $value = "pengurus";
        $anggota = User::findOrFail($id);
        $anggota->role = $value;
        $anggota->save();
        return redirect()->route('anggota.index')
        ->with('updated','Anggota berhasil dijadikan pengurus');
    }

    public function edit($id)
    {
        $anggota = User::findOrFail($id);
        return view('pengurus.anggota.edit', compact('anggota'));
    }

    public function update(Request $request, $id)
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
        $foto = request('foto')->getClientOriginalName();
        request()->file('foto')->move(public_path() . '/foto_user', $foto);

        $anggota = User::findOrFail($id);
        if ($request->hasFile('foto')) {
            File::delete(public_path('foto_user/'.$anggota->foto));
        }
        $anggota->name = $request->name;
        $anggota->email = $request->email;
        $anggota->password = Hash::make($request->password);
        $anggota->gender = $request->gender;
        $anggota->no_pensiun = $request->no_pensiun;
        $anggota->NIK = $request->NIK;
        $anggota->tempat_lahir = $request->tempat_lahir;
        $anggota->tanggal_lahir = $request->tanggal_lahir;
        $anggota->alamat_lengkap = $request->alamat_lengkap;
        $anggota->no_telp = $request->no_telp;
        $anggota->foto = $foto;
        $anggota->save();

        return redirect()->route('anggota.index')
        ->with('updated','Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $anggota = User::findOrFail($id);  
        File::delete(public_path('foto_user/'.$anggota->foto));
        $anggota->delete();
        return redirect()->route('anggota.index')
            ->with('deleted','Data berhasil dihapus');
    }
}