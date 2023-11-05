<?php

namespace App\Http\Controllers\Admin;

use App\Models\JawabanSoal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HasilUjianController extends Controller
{
    public function index()
    {
        $data = JawabanSoal::get(['id', 'soal_id', 'user_id']);

        return view('backend.admin.ujian.index', compact('data'));
    }
}
