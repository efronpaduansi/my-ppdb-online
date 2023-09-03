<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\BankSoal;
class UjianController extends Controller
{
    public function index()
    {
        $soals = BankSoal::orderBy('number', 'asc')->get();
        return view('backend.guest.ujian.index', compact('soals'));
    }
}
