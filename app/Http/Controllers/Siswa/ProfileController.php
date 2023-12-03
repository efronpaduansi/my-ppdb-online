<?php

namespace App\Http\Controllers\Siswa;

use Alert;
use App\Models\User;
use App\Models\Berkas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $myProfile = Berkas::where('user_id', auth()->user()->id)->first();

        return view('backend.siswa.profile.manage', compact('myProfile'));
    }

    public function changePassword(Request $request)
    {
        $user = User::where('id', $request->id)->first();

        if(!$user || !Hash::check($request->oldPass, $user->password)){
            toast('Gagal mengubah password. Perhatikan inputan Anda!','error')->timerProgressBar();
            return redirect()->back();
        }

        if($request->newPass != $request->newPassConf){
            toast('Gagal mengubah password. Perhatikan inputan Anda!','error')->timerProgressBar();
            return redirect()->back();
        }

        $data = [
            'password' => Hash::make($request->newPass)
        ];

        if(User::where('id', $request->id)->update($data)){
            toast('Kata Sandi Anda telah diubah!','success')->timerProgressBar();
            return redirect()->back();
        }else{
            toast('Gagal mengubah password. Perhatikan inputan Anda!','error')->timerProgressBar();
            return redirect()->back();
        }
    }
}
