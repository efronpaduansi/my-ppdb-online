<?php

namespace App\Http\Controllers\Admin;


use App\Models\User;
use App\Models\BankSoal;
use App\Models\JawabanSoal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HasilUjianController extends Controller
{
    public function index()
    {
        $role = 'guest';
        $data = User::with('jawaban')->where('role', $role)->get();

        return view('backend.admin.ujian.index', compact('data'));
    }

    public function show($id){
        $user = User::where('id', $id)->first();
        $jmlSoal = BankSoal::count();
        $jmlBenar = JawabanSoal::where('user_id', $id)->where('status', 'benar')->count();
        $nilai = ($jmlBenar / $jmlSoal) * 100;

        return view('backend.admin.ujian.show', compact('user', 'jmlSoal', 'jmlBenar', 'nilai'));
    }

}
