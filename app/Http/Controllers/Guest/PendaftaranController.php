<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
/* Models update since 25/01/2023 */
use App\Models\Berkas;
use App\Models\DataDiri;
use App\Models\DataOrangTua;
use App\Models\DataSekolahAsal;
use App\Models\Jurusan;
use App\Models\Website;
class PendaftaranController extends Controller
{
    private function _noPendaftaran()
    {
        $kode = rand(100000, 999999);
        return $kode;
    }

    public function index()
    {
        // cek apakah user id yang sedang login sudah ada di table data_diri
        $cek = DataDiri::where('user_id', Auth::user()->id)->first();
        if($cek){
            return redirect()->route('guest.pendaftaran.riwayat');
        }else{
            $web       = Website::get()->first();
            $jurusans = Jurusan::all();
            return view('backend.guest.pendaftaran.index', compact('jurusans', 'web'));
        }
    }

    // Store new data to database
    public function storeIndex(Request $request)
    {
        $validated = $request->validate([
            'nik'               => 'required|unique:data_diri',
            'nisn'              => 'required|unique:data_diri',
            'jurusan'           => 'required',
            'nama_lengkap'      => 'required',
            'tempat_lahir'      => 'required',
            'tanggal_lahir'     => 'required',
            'jenis_kelamin'     => 'required',
            'agama'             => 'required',
            'alamat'            => 'required',
            'no_hp'             => 'required',
            'email'             => 'required|email|unique:data_diri',
            'tinggi_badan'      => 'required|numeric',
            'berat_badan'       => 'required|numeric',
        ]);
        $data = new DataDiri();
        $data->user_id          = $request->user_id;
        $data->status_id        = 1;
        $data->jurusan_id       = $request->jurusan;
        $data->no_pendaftaran   = $this->_noPendaftaran();
        $data->nik              = $request->nik;
        $data->nisn             = $request->nisn;
        $data->nama_lengkap     = $request->nama_lengkap;
        $data->tempat_lahir     = $request->tempat_lahir;
        $data->tanggal_lahir    = $request->tanggal_lahir;
        $data->jenis_kelamin    = $request->jenis_kelamin;
        $data->agama            = $request->agama;
        $data->alamat           = $request->alamat;
        $data->no_hp            = $request->no_hp;
        $data->email            = $request->email;
        $data->tinggi_badan     = $request->tinggi_badan;
        $data->berat_badan      = $request->berat_badan;
        $data->hobi             = $request->hobi;
        $success = $data->save();
        if($success){
            return redirect()->route('guest.pendaftaran.data-orangtua');
        }
    }

    public function dataOrangTua()
    {
        $cek = DataOrangTua::where('user_id', Auth::user()->id)->first();
        if($cek){
            return redirect()->route('guest.pendaftaran.riwayat');
        }else{
            $web      = Website::get()->first();
            return view('backend.guest.pendaftaran.data_orang_tua', compact('web'));
        }
    }

    public function storeDataOrangTua(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'nama_ayah'     => 'required',
            'nama_ibu'      => 'required',
            'pekerjaan_ayah'=> 'required',
            'pekerjaan_ibu' => 'required',
            'alamat'        => 'required',
            'no_hp'         => 'required',
            'penghasilan'   => 'required',
        ]);

        $ortu = new DataOrangTua();
        $ortu->user_id          = $request->user_id;
        $ortu->nama_ayah        = $request->nama_ayah;
        $ortu->nama_ibu         = $request->nama_ibu;
        $ortu->pekerjaan_ayah   = $request->pekerjaan_ayah;
        $ortu->pekerjaan_ibu    = $request->pekerjaan_ibu;
        $ortu->alamat           = $request->alamat;
        $ortu->no_hp            = $request->no_hp;
        $ortu->penghasilan      = $request->penghasilan;
        $ortu->nama_wali        = $request->nama_wali;
        $ortu->pekerjaan_wali   = $request->pekerjaan_wali;
        $ortu->alamat_wali      = $request->alamat_wali;
        $ortu->no_hp_wali       = $request->no_hp_wali;
        $success = $ortu->save();
        if($success){
            return redirect()->route('guest.pendaftaran.data-sekolah');
        }
    }

    public function dataSekolah()
    {
        $cek = DataSekolahAsal::where('user_id', Auth::user()->id)->first();
        if($cek){
            return redirect()->route('guest.pendaftaran.riwayat');
        }else{
            $web      = Website::get()->first();
            return view('backend.guest.pendaftaran.data_sekolah', compact('web'));
        }
    }

    public function storeDataSekolah(Request $request)
    {
        $validated = $request->validate([
            'nama_sekolah'      => 'required',         
            'tahun_lulus'       => 'required|numeric',
        ]);

        $sekolah = new DataSekolahAsal();
        $sekolah->user_id       = $request->user_id;
        $sekolah->nama_sekolah  = $request->nama_sekolah;
        $sekolah->tahun_lulus   = $request->tahun_lulus;
        $sekolah->no_ijazah     = $request->no_ijazah ;
        $success = $sekolah->save();
        if($success){
            return redirect()->route('guest.pendaftaran.berkas');
        }
    }

    public function berkas()
    {
        $cek = Berkas::where('user_id', Auth::user()->id)->first();
        if($cek){
            return redirect()->route('guest.pendaftaran.riwayat');
        }else{
            $web      = Website::get()->first();
            return view('backend.guest.pendaftaran.berkas', compact('web'));
        }
    }

    public function storeBerkas(Request $request)
    {
        $validated = $request->validate([
            'ijazah'        => 'required|mimes:pdf|max:1024',
            'skhun'         => 'required|mimes:pdf|max:1024',
            'kartu_keluarga'=> 'required|mimes:pdf|max:1024',
            'akta_lahir'    => 'required|mimes:pdf|max:1024',
            'foto'          => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ]);

        $ijazahName = rand().'.'.$request->ijazah->extension();
        $request->ijazah->move(public_path('uploads/berkas/ijazah'), $ijazahName);
        $skhunName = rand().'.'.$request->skhun->extension();
        $request->skhun->move(public_path('uploads/berkas/skhun'), $skhunName);
        $kkName = rand().'.'.$request->kartu_keluarga->extension();
        $request->kartu_keluarga->move(public_path('uploads/berkas/kk'), $kkName);
        $aktaName = rand().'.'.$request->akta_lahir->extension();
        $request->akta_lahir->move(public_path('uploads/berkas/akta'), $aktaName);
        $fotoName = rand().'.'.$request->foto->extension();
        $request->foto->move(public_path('uploads/berkas/foto'), $fotoName);

        $berkas = new Berkas();
        $berkas->user_id            = $request->user_id;
        $berkas->ijazah             = $ijazahName;
        $berkas->skhun              = $skhunName;
        $berkas->kartu_keluarga     = $kkName;
        $berkas->akta_lahir         = $aktaName;
        $berkas->foto               = $fotoName;
        $success = $berkas->save();
        if($success){
            $web      = Website::get()->first();
             return view('backend.guest.pendaftaran.success', compact('web')); 
        }
    }

    public function riwayatPendaftaran()
    {   
        $web            = Website::get()->first();
        $user_id        = Auth::user()->id;
        $pendaftaran    = DataDiri::where('user_id', $user_id)->first();
        $dataOrangTua   = DataOrangTua::where('user_id', $user_id)->first();
        $dataSekolah    = DataSekolahAsal::where('user_id', $user_id)->first();
        return view('backend.guest.pendaftaran.riwayat', compact('pendaftaran', 'dataOrangTua', 'dataSekolah', 'web'));
    }


}
