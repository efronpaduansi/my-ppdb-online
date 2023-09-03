<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\MOdels\User;
use App\Models\DataDiri;
use App\Models\DataOrangTua;
use App\Models\DataSekolahAsal;
use App\Models\Berkas;
use App\Models\Website;
class DataPendaftaranController extends Controller
{
    public function index()
    {
        $web        = Website::get()->first();
        $pendaftaran = DataDiri::all();
        return view('backend.admin.pendaftaran.index', compact('pendaftaran', 'web'));
    }

    public function show($user_id)
    {
        $web        = Website::get()->first();
        $pendaftaran    = DataDiri::where('user_id', $user_id)->first();
        $dataOrangTua   = DataOrangTua::where('user_id', $user_id)->first();
        $dataSekolah    = DataSekolahAsal::where('user_id', $user_id)->first();
        $berkas         = Berkas::where('user_id', $user_id)->first();
        return view('backend.admin.pendaftaran.show', compact('pendaftaran', 'dataOrangTua', 'dataSekolah', 'berkas', 'web'));
    }

    public function doaccepted($id)
    {
        $pendaftaran = DataDiri::find($id);
        $pendaftaran->status_id = 2;
        $updatePendaftaran = $pendaftaran->update();

        if($updatePendaftaran){
            $id         = $pendaftaran->user_id;
            $user       = User::find($id);
            $user->role = 'siswa';
            $success    = $user->update();
            if($success)
            {
                $siswa = new Siswa();
                $siswa->added_from      = $pendaftaran->id;
                $siswa->nama_lengkap    = $pendaftaran->nama_lengkap;
                $siswa->nisn            = $pendaftaran->nisn;
                $siswa->tempat_lahir    = $pendaftaran->tempat_lahir;
                $siswa->tanggal_lahir   = $pendaftaran->tanggal_lahir;
                $siswa->jenis_kelamin   = $pendaftaran->jenis_kelamin;
                $siswa->agama           = $pendaftaran->agama;
                $siswa->no_hp           = $pendaftaran->no_hp;
                $siswa->email           = $pendaftaran->email;
                $siswa->save();
                
                return redirect()->route('admin.pendaftaran.index')->with('success', 'Data pendaftaran berhasil di update!');
            }
        }else{
            return redirect()->route('admin.pendaftaran.index')->with('error', 'Data pendaftaran gagal di update!');
        }
       
    }

    public function dorejected($id)
    {
        $pendaftaran = DataDiri::find($id);
        $pendaftaran->status_id = 3;
        $pendaftaran->update();
        return redirect()->route('admin.pendaftaran.index')->with('error', 'Data pendaftaran berhasil di update!');
    }

    public function destroy($id)
    {
        $pendaftaran = DataDiri::find($id);
        $pendaftaran->delete();
        return redirect()->route('admin.pendaftaran.index')->with('success', 'Data pendaftaran berhasil di hapus!');
    }
}
