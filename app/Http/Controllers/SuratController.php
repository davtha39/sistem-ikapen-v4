<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Support\Facades\Response;
use File;

class SuratController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->role == "pengurus") {
            $surat = Surat::with('users')->latest()->get();
            return view ('pengurus.surat.index',compact('surat'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        } 
        elseif (Auth::user()->role == "anggota"){
            $surat = Surat::with('users')->latest()->get();
            return view ('anggota.surat.index',compact('surat'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        } 
    }

    public function create()
    {
        return view('pengurus.surat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'=>'required',
            'deskripsi'=>'required',
            'file'=>'required|mimes:pdf,docx,doc,ppt,pptx,xls,xlsx|max:10240'
        ]);

        $surat = new Surat;
        if($request->hasFile('file')) {
            $file = request('file')->getClientOriginalName();
            $ext = $request->file('file')->extension();
            $ukuran = $request->file('file')->getSize();
            request()->file('file')->move(public_path() . '/file_surat', $file);        
            $surat->file = $file;        
            $surat->ext = $ext;
            $surat->ukuran = $ukuran;
        }
        else{
            $surat->file = old('file', $surat->file);
        }

        $surat->judul = $request->judul;
        $surat->deskripsi = $request->deskripsi;
        $surat->users_id = Auth::user()->id;
        $surat->save();
        
        return redirect()->route('surat.index')
            ->with('succes', 'surat berhasil ditambahkan ke database');
    }

    public function show($id)
    { 
        $surat = Surat::findOrFail($id);
        return view('pengurus.surat.show', compact('surat'));
    }

    public function edit($id)
    {
        $surat = Surat::findOrFail($id);
        return view('pengurus.surat.edit', compact('surat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'=>'required',
            'deskripsi'=>'required',
            'file'=>'nullable|mimes:pdf,docx,doc,ppt,pptx,xls,xlsx|max:10240'
        ]);


        $surat = Surat::findOrFail($id);

        if($request->hasFile('file')) {
            File::delete(public_path('file_surat/'.$surat->file));
            $file = request('file')->getClientOriginalName();
            $ext = $request->file('file')->extension();
            $ukuran = $request->file('file')->getSize();
            request()->file('file')->move(public_path() . '/file_surat', $file);        
            $surat->file = $file;        
            $surat->ext = $ext;
            $surat->ukuran = $ukuran;
        }
        else{
            $surat->file = old('file', $surat->file);
        }

        $surat->judul = $request->judul;
        $surat->deskripsi = $request->deskripsi;
        $surat->users_id = Auth::user()->id;
        $surat->save();
        
        return redirect()->route('surat.index')
            ->with('updated', 'surat berhasil diubah');
    }

    public function destroy($id)
    {
        $surat = Surat::findOrFail($id);
        File::delete(public_path('file_surat/'.$surat->file));
        $surat->delete();
        return redirect()->route('surat.index')
            ->with('deleted', 'surat berhasil dihapus');
    }
    
    public function download($id)
    {
        $surat = Surat::findOrFail($id);
        $filesurat = public_path('file_surat/'.$surat->file);
        return Response::download($filesurat);
    }
}
