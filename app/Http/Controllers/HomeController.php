<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Jurusan;
use App\Models\Website;
use App\Models\BankSoal;
use App\Models\DataDiri;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $totalJurusan = Jurusan::count();
        $totalSiswa = Siswa::count();
        $totalSoal = BankSoal::count();
        $web        = Website::get()->first();
        return view('backend.admin.index', compact('totalJurusan', 'web', 'totalSiswa', 'totalSoal'));
    }

    public function guest()
    {
        $web = Website::get()->first(); 
        return view('backend.guest.index', compact('web'));
    }

    public function siswa()
    {
        $web = Website::get()->first(); 
        return view('backend.siswa.index', compact('web'));
    }
}
