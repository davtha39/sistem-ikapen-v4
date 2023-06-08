<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->role == "pengurus") {
            $pengumuman = Pengumuman::with('users')->latest()->get();
            return view ('pengurus.pengumuman.index',compact('pengumuman'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        } 
        elseif (Auth::user()->role == "anggota"){
            $pengumuman = Pengumuman::with('users')->latest()->get();
            return view ('anggota.pengumuman.index',compact('pengumuman'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        } 
    }

    public function create()
    {
        return view('pengurus.pengumuman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'=>'required',
            'deskripsi'=>'required',
            'file'=>'nullable|mimes:pdf,docx,doc,ppt,pptx,xls,xlsx|max:10240'
        ]);

        $pengumuman = new Pengumuman;
        if($request->hasFile('file')) {
            $file = request('file')->getClientOriginalName();
            $ext = $request->file('file')->extension();
            $ukuran = $request->file('file')->getSize();
            request()->file('file')->move(public_path() . '/file_pengumuman', $file);        
            $pengumuman->file = $file;        
            $pengumuman->ext = $ext;
            $pengumuman->ukuran = $ukuran;
        }
        else{
            $pengumuman->file = old('file', $pengumuman->file);
        }

        $pengumuman->judul = $request->judul;
        $pengumuman->deskripsi = $request->deskripsi;
        $pengumuman->users_id = Auth::user()->id;
        $pengumuman->save();
        
        return redirect()->route('pengumuman.index')
            ->with('succes', 'Pengumuman berhasil ditambahkan ke database');
    }

    public function show($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('pengurus.pengumuman.show', compact('pengumuman'));
    }

    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('pengurus.pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'=>'required',
            'deskripsi'=>'required',
            'file'=>'nullable|mimes:pdf,docx,doc,ppt,pptx,xls,xlsx|max:10240'
        ]);

        $pengumuman = Pengumuman::findOrFail($id);

        if($request->hasFile('file')) {
            File::delete(public_path('file_pengumuman/'.$pengumuman->file));
            $file = request('file')->getClientOriginalName();
            $ext = $request->file('file')->extension();
            $ukuran = $request->file('file')->getSize();
            request()->file('file')->move(public_path() . '/file_pengumuman', $file);        
            $pengumuman->file = $file;        
            $pengumuman->ext = $ext;
            $pengumuman->ukuran = $ukuran;
        }
        else{
            $pengumuman->file = old('file', $pengumuman->file);
        }

        $pengumuman->judul = $request->judul;
        $pengumuman->deskripsi = $request->deskripsi;
        $pengumuman->users_id = Auth::user()->id;
        $pengumuman->save();
        
        return redirect()->route('pengumuman.index')
            ->with('updated', 'pengumuman berhasil diupdate');
    }

    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        File::delete(public_path('file_pengumuman/'.$pengumuman->file));
        $pengumuman->delete();
        return redirect()->route('pengumuman.index')
            ->with('deleted', 'Pengumuman berhasil dihapus');
    }
}
