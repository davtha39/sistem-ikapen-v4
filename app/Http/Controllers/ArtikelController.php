<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class ArtikelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->role == "pengurus") {
            $artikel = Artikel::with('users')->latest()->get();
            return view ('pengurus.artikel.index',compact('artikel'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        } 
        elseif (Auth::user()->role == "anggota") {
            $artikel = Artikel::with('users')->latest()->get();
            return view ('anggota.artikel.index',compact('artikel'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        } 
    }

    public function create()
    {
        if (Auth::user()->role == "pengurus") {
            return view ('pengurus.artikel.create');
        } 
        elseif (Auth::user()->role == "anggota"){
            return view ('anggota.artikel.create');
        } 
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'=>'required',
            'isi'=>'required',
            'foto'=>'required|mimes:jpg,jpeg,png,gif,bmp|max:10240'
        ]);

        $artikel = new Artikel;
        if($request->hasFile('foto')) {
            $foto = request('foto')->getClientOriginalName();
            request()->file('foto')->move(public_path() . '/foto_artikel', $foto);        
            $artikel->foto = $foto;        
        }
        else{
            $artikel->foto = old('foto', $artikel->foto);
        }

        $artikel->judul = $request->judul;
        $artikel->isi = $request->isi;
        $artikel->users_id = Auth::user()->id;
        $artikel->save();
        
        return redirect()->route('artikel.index')
            ->with('succes', 'artikel berhasil ditambahkan ke database');
    }

    public function show($id)
    { 
        $artikel = Artikel::findOrFail($id);
        if (Auth::user()->role == "pengurus") {
            return view ('pengurus.artikel.show',compact('artikel'));
        }
        elseif (Auth::user()->role == "anggota"){
            return view('anggota.artikel.show', compact('artikel'));
        }
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('pengurus.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'=>'required',
            'isi'=>'required',
            'foto'=>'required|mimes:jpg,jpeg,png,gif,bmp|max:10240'
        ]);

        $artikel = Artikel::findOrFail($id);
        if($request->hasFile('foto')) {
            File::delete(public_path('foto_artikel/'.$artikel->foto));
            $foto = request('foto')->getClientOriginalName();
            request()->file('foto')->move(public_path() . '/foto_artikel', $foto);        
            $artikel->foto = $foto;        
        }
        else{
            $artikel->foto = old('foto', $artikel->foto);
        }

        $artikel->judul = $request->judul;
        $artikel->isi = $request->isi;
        $artikel->users_id = Auth::user()->id;
        $artikel->save();
        
        return redirect()->route('artikel.index')
            ->with('updated', 'artikel berhasil diubah');
    }
}
