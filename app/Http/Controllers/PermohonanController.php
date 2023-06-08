<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Models\Permohonan;
use App\Models\Approvalpermohonan;
use DB;

class PermohonanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->role == "pengurus"){
            $permohonan = Permohonan::with('users')->latest()->get();
            return view('pengurus.permohonan.index', compact('permohonan'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }
        elseif (Auth::user()->role == "anggota") {       
            $permohonan = Permohonan::with('users')
            //->join('approvalpermohonan', 'permohonan.id', '=', 'approvalpermohonan.permohonan_id')
            //->select('permohonan.*', 'approvalpermohonan.approval')
            ->latest()
            ->get();
            return view('anggota.permohonan.index', compact('permohonan'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }

    /*public function create()
    {
        $user = Auth::user()->name;
        dd($user);
    }*/

    public function store(Request $request, $id)
    {
        if (Auth::user()->role == "anggota") {      
            $request->validate([
                'jenis_permohonan'=>'required',
                'catatan'=>'nullable',
            ]);
            
            $permohonan = new Permohonan;
            $permohonan->jenis_permohonan = $request->jenis_permohonan;
            $permohonan->catatan = $request->catatan;
            $permohonan->users_id = Auth::user()->id;
            $permohonan->save();
            return back()->with('succes', 'Permohonan berhasil');
        }
        elseif (Auth::user()->role == "pengurus") {
            
        }
    }

    public function approve(Request $request)
    {
        if ($request->permohonan()->where('users_id', Auth::user()->id)->exists()) {
            
        }
    }

    public function edit($id)
    {
        $permohonan = Permohonan::findOrFail($id);
        return view('pengurus.permohonan.edit', compact('permohonan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'penguruscomment'=>'nullable'
        ]);

        $permohonan = Permohonan::findOrFail($id);
        $approved_by = Auth::user()->name;

        if(Input::get('Setujui')) {
            $approval = 'Disetujui';
        }
        elseif(Input::get('Tolak')) {
            $approval = 'Ditolak';
        }

        $permohonan->update([
            'approval'=>$approval,
            'approved_by'=>$approved_by,
            'penguruscomment'=>$request->penguruscomment,
        ]);

        if (Input::get('Setujui')) {
            return view('pengurus.permohonan.index')
                ->with('accept', 'Permohonan berhasil disetujui');
        }
        else if (Input::get('Tolak')) {
            return view('anggota.permohonan.index')
                ->with('decline', 'Permohonan berhasil ditolak');
        }
        
    }
}
