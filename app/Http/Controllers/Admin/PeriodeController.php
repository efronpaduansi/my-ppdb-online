<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Website;
/*
* Since Update 24/01/2023
*/
use App\Models\Periode;

class PeriodeController extends Controller
{
    public function index()
    {
        $web        = Website::get()->first();
        $periodes = Periode::orderBy('id', 'desc')->get();
        return view('backend.admin.periode.index', compact('periodes', 'web'));
    }

    public function create()
    {
        $web        = Website::get()->first();
        return view('backend.admin.periode.create', compact('web'));
    }

    public function store(Request $request)
    {
        $periode = new Periode();
        $count = Periode::count();
      
        if($count == 0){
            $periode->nama_periode          = $request->nama_periode;
            $periode->tanggal_mulai         = $request->tanggal_mulai;
            $periode->tanggal_selesai       = $request->tanggal_selesai;
            $periode->status_periode        = 'Buka';
            $periode->keterangan            = $request->ket;
            $success                        = $periode->save();
        }else{
            $periode_terakhir = Periode::orderBy('id', 'desc')->first();
            $periode_terakhir->status_periode = 'Tutup';
            $closed = $periode_terakhir->update();
            if($closed){
                $periode->nama_periode          = $request->nama_periode;
                $periode->tanggal_mulai         = $request->tanggal_mulai;
                $periode->tanggal_selesai       = $request->tanggal_selesai;
                $periode->status_periode        = 'Buka';
                $periode->keterangan            = $request->ket;
                $periode->save();
            }
        }
        return redirect()->route('admin.periode.index')->with('success', 'Periode berhasil ditambahkan');
        
    }

    public function update(Request $request, $id)
    {
        $periode = Periode::find($id);
        $periode->nama_periode          = $request->nama_periode;
        $periode->tanggal_mulai         = $request->tanggal_mulai;
        $periode->tanggal_selesai       = $request->tanggal_selesai;
        $periode->keterangan            = $request->ket;
        $success                        = $periode->update();
        if($success){
            return redirect()->route('admin.periode.index')->with('success', 'Periode berhasil diupdate');
        }
    }

    public function closed($id)
    {
        $periode = Periode::find($id);
        $periode->status_periode        = 'Tutup';
        $success                        = $periode->update();
        if($success){
            return redirect()->route('admin.periode.index')->with('success', 'Periode berhasil ditutup');
        }
    }
}
