<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'kepsek')->get();
        return view('backend.admin.users.manage', compact('users'));
    }

    public function changeEmail(Request $request)
    {
        $data = [
            'email' => $request->newEmail,
        ];

        $user = User::where('id', $request->id)->first();
        $update = $user->update($data);

        if(!$update){
            toast('Email gagal diubah!','error')->timerProgressBar();
            return redirect()->back();
        }
        toast('Email berhasil diubah!','success')->timerProgressBar();
        return redirect()->back();

    }

    public function changePassword(Request $request)
    {
        $user = User::where('id', $request->id)->first();

        if(!$user || !Hash::check($request->oldPass, $user->password)){
            toast('Gagal mengubah password. Perhatikan inputan Anda!','error')->timerProgressBar();
            return redirect()->back();
        }

        if($request->newPass != $request->passConf){
            toast('Password Salah!','error')->timerProgressBar();
            return redirect()->back();
        }

        $data = [
            'password' => Hash::make($request->newPass)
        ];
        
        $update = $user->update($data);

        if($update){
            toast('Password telah diubah!','success')->timerProgressBar();
            return redirect()->back();
        }else{
            toast('Gagal mengubah password. Perhatikan inputan Anda!','error')->timerProgressBar();
            return redirect()->back();
        }
    }
}
