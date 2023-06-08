<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use File;
use PDF;

class PengurusController extends Controller
{
    public function __construct()
    {
    $this->middleware(['auth', 'role:pengurus']);
    }

    public function index()
    {
        $pengurus = User::where('role', 'pengurus')->get();
        return view ('pengurus.pengurus.index',compact('pengurus'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function show($id)
    {
        $pengurus = User::findOrFail($id);
        return view('pengurus.pengurus.show', compact('pengurus'));
    }

    public function jadiAnggota(Request $request, $id)
    {
        $value = "anggota";
        $anggota = User::findOrFail($id);
        $anggota->role = $value;
        $anggota->save();
        return redirect()->route('pengurus.index')
        ->with('updated','Pengurus berhasil diubah menjadi anggota biasa');
    }

    public function edit($id)
    {
        $pengurus = User::findOrFail($id);
        return view('pengurus.pengurus.edit', compact('pengurus'));
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

        $pengurus = User::findOrFail($id);
        if ($request->hasFile('foto')) {
            File::delete(public_path('foto_user/'.$pengurus->foto));
        }
        $pengurus->name = $request->name;
        $pengurus->email = $request->email;
        $pengurus->password = Hash::make($request->password);
        $pengurus->gender = $request->gender;
        $pengurus->no_pensiun = $request->no_pensiun;
        $pengurus->NIK = $request->NIK;
        $pengurus->tempat_lahir = $request->tempat_lahir;
        $pengurus->tanggal_lahir = $request->tanggal_lahir;
        $pengurus->alamat_lengkap = $request->alamat_lengkap;
        $pengurus->no_telp = $request->no_telp;
        $pengurus->foto = $foto;
        $pengurus->save();

        return redirect()->route('pengurus.index')
        ->with('updated','Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $pengurus = User::findOrFail($id);  
        File::delete(public_path('foto_user/'.$pengurus->foto));
        $pengurus->delete();
        return redirect()->route('pengurus.index')
            ->with('deleted','Data berhasil dihapus');
    }
}