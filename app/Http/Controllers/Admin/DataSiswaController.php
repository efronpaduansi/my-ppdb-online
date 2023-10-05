<?php

namespace App\Http\Controllers\Admin;

use App\Models\Siswa;
use App\Models\Berkas;
use App\Models\Website;
use App\Exports\SiswaExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class DataSiswaController extends Controller
{
    public function index()
    {
        $web        = Website::get()->first();
        $siswa = Siswa::all();
        return view('backend.admin.siswa.index', compact('siswa', 'web'));
    }

    public function show($id)
    {
        $web        = Website::get()->first();
        $siswa = Siswa::find($id);
        return view('backend.admin.siswa.show', compact('siswa', 'web'));
    }

    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil dihapus');
    }

    //export data siswa to excel file
    public function exportExcel()
    {
        return Excel::download(new SiswaExport, 'data_siswa.xlsx');
    }
}
