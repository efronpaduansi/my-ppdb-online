<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Website;
use App\Models\Slider;
use App\Models\Informasi;
use App\Models\Jurusan;
/*
* Update since 20/03/2023
* Konfigurasi menu pendaftaran ketika periode pendaftaran sudah ditutup
*/
use App\Models\Periode;
class PPDBController extends Controller
{
    public function index()
    {
        $web        = Website::get()->first();
        $sliders    = Slider::where('is_active', 1)->get();
        $jurusans   = Jurusan::all();
        //ambil data terakhir dari tabel periode
        $periode = Periode::orderBy('id', 'desc')->first();
        return view('welcome', compact('web', 'sliders', 'jurusans', 'periode'));
    }

    // Change one frontend branch
    public function programStudi()
    {
        $web = Website::get()->first();
        $jurusans = Jurusan::all();
        return view('frontend.content.program_studi', compact('jurusans', 'web'));
    }

    public function alurPendaftaran()
    {
        $web = Website::get()->first();
        return view('frontend.content.alur', compact('web'));
    }

    public function pengumuman()
    {
        $web = Website::get()->first();
        $informasi = Informasi::where('status', 'aktif')->get();
        return view('frontend.content.pengumuman', compact('informasi', 'web'));
    }
}
