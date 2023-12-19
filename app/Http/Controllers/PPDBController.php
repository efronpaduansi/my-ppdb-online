<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Slider;
use App\Models\Gallery;
use App\Models\Jurusan;

/*
* Update since 20/03/2023
* Konfigurasi menu pendaftaran ketika periode pendaftaran sudah ditutup
*/
use App\Models\Website;
use App\Models\Informasi;
use Illuminate\Http\Request;

class PPDBController extends Controller
{
    public function index()
    {
        $web        = Website::get()->first();
        $sliders    = Slider::where('is_active', 1)->get();
        $jurusans   = Jurusan::all();
        $galleries = Gallery::latest()->get();
        
        return view('welcome', compact('web', 'sliders', 'jurusans', 'galleries'));
    }

    // Change one frontend branch
    public function programStudi()
    {
        $web = Website::get()->first();
        $jurusans = Jurusan::all();
        $galleries = Gallery::latest()->get();
        return view('frontend.content.program_studi', compact('jurusans', 'web', 'galleries'));
    }

    public function programStudiShow($slug)
    {
        $jurusan = Jurusan::where('slug', $slug)->first();
        $galleries = Gallery::latest()->get();
        return view('frontend.content.program_studi_show', compact('jurusan', 'galleries'));
    }

    public function alurPendaftaran()
    {
        $web = Website::get()->first();
        $galleries = Gallery::latest()->get();
        return view('frontend.content.alur', compact('web', 'galleries'));
    }

    public function pengumuman()
    {
        $web = Website::get()->first();
        $informasi = Informasi::where('status', 'aktif')->get();
        $dataSiswa = Siswa::orderBy('nama_lengkap', 'asc')->get();
        $galleries = Gallery::latest()->get();
        return view('frontend.content.pengumuman', compact('informasi', 'web', 'dataSiswa', 'galleries'));
    }
}
