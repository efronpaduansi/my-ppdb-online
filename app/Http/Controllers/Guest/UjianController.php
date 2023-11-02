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
        if (session()->has('soals')) {
            $soals = session('soals');
        } else {
            $soals = BankSoal::inRandomOrder()->get();
            session(['soals' => $soals]);
        }

        return view('backend.guest.ujian.index', compact('soals'));
    }

    public function store(Request $request)
    {
        $jawaban = [];

        foreach($request->all() as $key => $value){
            if (strpos($key, 'soal_') === 0) {
                $soalId = substr($key, 1); 
                $jawaban[$soalId] = $value; 
            }
        }

        dd($jawaban);
    }
}
