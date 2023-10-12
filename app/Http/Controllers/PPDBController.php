<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Slider;
use App\Models\Jurusan;
use App\Models\Periode;
use App\Models\Website;
/*
* Update since 20/03/2023
* Konfigurasi menu pendaftaran ketika periode pendaftaran sudah ditutup
*/
use App\Models\Informasi;
use Illuminate\Http\Request;

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

    public function programStudiShow($slug)
    {
        $jurusan = Jurusan::where('slug', $slug)->first();
        return view('frontend.content.program_studi_show', compact('jurusan'));
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
        $dataSiswa = Siswa::orderBy('nama_lengkap', 'asc')->get();
        return view('frontend.content.pengumuman', compact('informasi', 'web', 'dataSiswa'));
    }
}
