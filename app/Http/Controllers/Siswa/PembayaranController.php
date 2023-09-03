<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Website;
class PembayaranController extends Controller
{
    public function index()
    {
        $web       = Website::get()->first();
        return view('backend.siswa.pembayaran.index', compact('web'));
    }
}
