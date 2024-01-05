<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $web        = Website::get()->first();
        return view('backend.admin.profile.index', compact('web'));
    }

    public function changeEmail(Request $request)
    {
        $profile = User::where('id', auth()->user()->id)->first();
        $newEmail = $request->email;
        $data['email'] = $newEmail;

        $update = $profile->update($data);

        if(!$update){
            toast('Profil gagal di ubah!','error')->timerProgressBar();
            return redirect()->back();
        }
        toast('Profil telah di ubah!','success')->timerProgressBar();
        return redirect()->back();
    }    

    /* Change user pass */
    public function changePassword(Request $request)
    {
        $user = User::where('id', $request->id)->first();

        if(!$user || !Hash::check($request->oldPass, $user->password)){
            toast('Gagal mengubah password. Perhatikan inputan Anda!','error')->timerProgressBar();
            return redirect()->back();
        }

        if($request->newPass != $request->passConf){
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
