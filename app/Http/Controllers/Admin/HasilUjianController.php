<?php

namespace App\Http\Controllers\Admin;


use App\Models\User;
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
}
