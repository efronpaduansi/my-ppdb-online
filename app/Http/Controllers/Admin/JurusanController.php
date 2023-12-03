<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Jurusan;
use App\Models\Website;
/*
* Since Update 24/01/2023
*/
class JurusanController extends Controller
{
    public function index()
    {
        $web        = Website::get()->first();
        $jurusans = Jurusan::all();
        return view('backend.admin.jurusan.index', compact('jurusans', 'web'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
           'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($validated){
            $imgName = time().'.' .rand() .$request->thumbnail->extension();
            $request->thumbnail->move(public_path('uploads/img/'), $imgName);

            $jurusan                = new Jurusan();
            $jurusan->thumbnail     = $imgName;
            $jurusan->kode_jurusan  = "JUR-".rand(1000, 9999);
            $jurusan->nama_jurusan  = htmlspecialchars(strip_tags($request->nama_jurusan));
            $jurusan->slug          = Str::slug(strip_tags($request->nama_jurusan));
            $jurusan->singkatan     = htmlspecialchars($request->singkatan);
            $jurusan->deskripsi     = htmlspecialchars($request->deskripsi);
            $success = $jurusan->save();
            if($success){
                return redirect()->back()->with('success', 'Jurusan berhasil ditambahkan');
            }else{
                return erorr;
            }
        }
    }
    
    public function edit($id)
    {
        $web        = Website::get()->first();
        $jurusan    = Jurusan::find($id);
        return view('backend.admin.jurusan.edit', compact('jurusan', 'web'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_jurusan'      => 'required',
            'singkatan'         => 'required',
            'deskripsi'         => 'required|min:10',
        ]);
        if($validatedData){
            $jurusan                = Jurusan::find($id);
            $jurusan->nama_jurusan  = htmlspecialchars($request->nama_jurusan);
            $jurusan->slug          = Str::slug(strip_tags($request->nama_jurusan));
            $jurusan->singkatan     = htmlspecialchars($request->singkatan);
            $jurusan->deskripsi     = htmlspecialchars($request->deskripsi);
            $jurusan->update();
            return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil diubah');
        }
    }

    public function destroy($id)
    {
        $jurusan = Jurusan::find($id);
        $jurusan->delete();
        return redirect()->back()->with('success', 'Jurusan berhasil dihapus');
    }
}
