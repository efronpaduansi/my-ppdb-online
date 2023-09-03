<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Informasi;
use App\Models\Website;
class InformasiController extends Controller
{
    public function index()
    {
        $web        = Website::get()->first();
        $informasi = Informasi::all();
        return view('backend.informasi', compact('informasi', 'web'));
    }

    public function create()
    {
        $web        = Website::get()->first();
        return view('backend.informasi_create', compact('web'));
    }

    public function store(Request $request)
    {
        $informasi = new Informasi();
        $informasi->penulis = $request->penulis;
        $informasi->judul   = $request->judul;
        $informasi->slug    = Str::slug($request->judul);
        $informasi->isi     = htmlspecialchars(strip_tags($request->isi));
        $informasi->kategori = $request->kategori;
        $informasi->status = $request->status;
        
          // Upload Gambar
          $this->validate($request, [
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('uploads'), $imageName);
        $informasi->gambar = $imageName;
        $informasi->save();
        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil terkitim!');
    }
}
