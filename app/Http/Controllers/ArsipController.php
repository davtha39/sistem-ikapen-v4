<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Support\Facades\Response;
use File;

class ArsipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->role == "pengurus") {
            $arsip = Arsip::with('users')->latest()->get();
            return view ('pengurus.arsip.index',compact('arsip'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        } 
        elseif (Auth::user()->role == "anggota"){
            $arsip = Arsip::with('users')->latest()->get();
            return view ('anggota.arsip.index',compact('arsip'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        } 
    }

    public function create()
    {
        return view('pengurus.arsip.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'=>'required',
            'deskripsi'=>'required',
            'file'=>'required|mimes:pdf,docx,doc,ppt,pptx,xls,xlsx|max:10240'
        ]);

        $arsip = new Arsip;
        if($request->hasFile('file')) {
            $file = request('file')->getClientOriginalName();
            $ext = $request->file('file')->extension();
            $ukuran = $request->file('file')->getSize();
            request()->file('file')->move(public_path() . '/file_arsip', $file);        
            $arsip->file = $file;        
            $arsip->ext = $ext;
            $arsip->ukuran = $ukuran;
        }
        else{
            $arsip->file = old('file', $arsip->file);
        }

        $arsip->judul = $request->judul;
        $arsip->deskripsi = $request->deskripsi;
        $arsip->users_id = Auth::user()->id;
        $arsip->save();
        
        return redirect()->route('arsip.index')
            ->with('succes', 'Arsip berhasil ditambahkan ke database');
    }

    public function show($id)
    { 
        $arsip = Arsip::findOrFail($id);
        return view('pengurus.arsip.show', compact('arsip'));
    }

    public function edit($id)
    {
        $arsip = Arsip::findOrFail($id);
        return view('pengurus.arsip.edit', compact('arsip'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'=>'required',
            'deskripsi'=>'required',
            'file'=>'nullable|mimes:pdf,docx,doc,ppt,pptx,xls,xlsx|max:10240'
        ]);


        $arsip = Arsip::findOrFail($id);

        if($request->hasFile('file')) {
            File::delete(public_path('file_arsip/'.$arsip->file));
            $file = request('file')->getClientOriginalName();
            $ext = $request->file('file')->extension();
            $ukuran = $request->file('file')->getSize();
            request()->file('file')->move(public_path() . '/file_arsip', $file);        
            $arsip->file = $file;        
            $arsip->ext = $ext;
            $arsip->ukuran = $ukuran;
        }
        else{
            $arsip->file = old('file', $arsip->file);
        }

        $arsip->judul = $request->judul;
        $arsip->deskripsi = $request->deskripsi;
        $arsip->users_id = Auth::user()->id;
        $arsip->save();
        
        return redirect()->route('arsip.index')
            ->with('updated', 'Arsip berhasil diubah');
    }

    public function destroy($id)
    {
        $arsip = Arsip::findOrFail($id);
        File::delete(public_path('file_arsip/'.$arsip->file));
        $arsip->delete();
        return redirect()->route('arsip.index')
            ->with('deleted', 'Arsip berhasil dihapus');
    }
    
    public function download($id)
    {
        $arsip = Arsip::findOrFail($id);
        $filearsip = public_path('file_arsip/'.$arsip->file);
        return Response::download($filearsip);
    }
}
