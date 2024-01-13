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
        $web            = Website::get()->first();
        
        //Mengambil data pendaftaran yang status_id = 1 atau 2
        $pendaftaran = DataDiri::query()
                        ->where(function ($query) {
                            $query->where('status_id', 1)
                                ->orWhere('status_id', 2)
                                ->orWhere('status_id', 3)
                                ->orWhere('status_id', 5);
                        })->latest()->get();

        // $pendaftaran = User::with('dataDiri', 'jawaban')
        //                 ->where('role', 'guest')
        //                 ->get();
        return view('backend.admin.pendaftaran.index', compact('pendaftaran', 'web'));
    }

    public function show($user_id)
    {
        $web            = Website::get()->first();
        $pendaftaran    = DataDiri::where('user_id', $user_id)->first();
        $dataOrangTua   = DataOrangTua::where('user_id', $user_id)->first();
        $dataSekolah    = DataSekolahAsal::where('user_id', $user_id)->first();
        $berkas         = Berkas::where('user_id', $user_id)->orderby('id', 'desc')->first();
        return view('backend.admin.pendaftaran.show', compact('pendaftaran', 'dataOrangTua', 'dataSekolah', 'berkas', 'web'));
    }

    public function doaccepted($id)
    {
        $pendaftaran = DataDiri::find($id);
        $pendaftaran->status_id = 4;
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
                $siswa->no_hp           = $pendaftaran->no_hp;
                $siswa->email           = $pendaftaran->email;
                $siswa->save();
                
                return redirect()->route('admin.pendaftaran.index')->with('success', 'Data pendaftaran berhasil di update!');
            }
        }else{
            return redirect()->route('admin.pendaftaran.index')->with('error', 'Data pendaftaran gagal di update!');
        }
       
    }

    public function terverifikasi($id)
    {
        $pendaftaran = DataDiri::find($id);
        $pendaftaran->status_id = 3;
        $pendaftaran->catatan = '';
        $pendaftaran->update();
        return redirect()->route('admin.pendaftaran.index')->with('success', 'Data pendaftaran berhasil di update!');
    }

    public function verifikasi($id, Request $request)
    {
        $pendaftaran = DataDiri::find($id);
        $pendaftaran->status_id = 2;
        $pendaftaran->catatan = $request->catatan;
        $pendaftaran->update();
        return redirect()->route('admin.pendaftaran.index')->with('success', 'Data pendaftaran berhasil di update!');
    }

    public function dorejected($id)
    {
        $pendaftaran = DataDiri::find($id);
        $pendaftaran->status_id = 5;
        $pendaftaran->update();
        return redirect()->route('admin.pendaftaran.index')->with('success', 'Data pendaftaran berhasil di update!');
    }

    public function destroy($id)
    {
        $deleteUser = User::where('id', $id)->delete();
        $deleteDataDiri = DataDiri::where('user_id', $id)->delete();
        $deleteDataOrangTua = DataOrangTua::where('user_id', $id)->delete();
        $deleteDataSekolahAsal = DataSekolahAsal::where('user_id', $id)->delete();
        $deleteBerkas = Berkas::where('user_id', $id)->delete();
        return redirect()->route('admin.pendaftaran.index')->with('success', 'Data pendaftaran berhasil di hapus!');
    }
}
