<?php

namespace App\Http\Controllers\Guest;

use App\Models\DataDiri;
use  App\Models\BankSoal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UjianController extends Controller
{

    public function index()
    {
        $soals = BankSoal::inRandomOrder()->get();
        return view('backend.guest.ujian.index', compact('soals'));
    }
}
