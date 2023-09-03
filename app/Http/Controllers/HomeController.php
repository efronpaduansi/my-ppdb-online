<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Website;
use App\Models\Siswa;
use App\Models\Staff;
use App\Models\DataDiri;
class HomeController extends Controller
{
    public function index()
    {
        $totalPendaftaran = DataDiri::count();
        $totalSiswa = Siswa::count();
        $totalStaff = Staff::count();
        $totalUsers = User::count();
        $web        = Website::get()->first();
        return view('backend.admin.index', compact('totalPendaftaran', 'web', 'totalSiswa', 'totalStaff', 'totalUsers'));
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
