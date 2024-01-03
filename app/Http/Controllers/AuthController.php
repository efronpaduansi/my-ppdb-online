<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Alert;

class AuthController extends Controller
{
    public function login()
    {
        
        return view('auth.login');
        
    }

    public function doLogin(Request $request)
    {
        $validated = $request->validate([
            'email'         => 'required|email',
            'password'      => 'required'
        ], [
            'email.required'=> 'Email tidak boleh kosong!',
            'email.email' => 'Format email salah!',
            'password.required' => 'Password tidak boleh kosong!',
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            //cek role_id
            if (auth()->user()->role === 'admin' || auth()->user()->role === 'kepsek') {
                return redirect()->route('admin.index');
            } elseif (auth()->user()->role === 'siswa') {
                return redirect()->route('siswa.index');
            } elseif (auth()->user()->role === 'guest') {
                return redirect()->route('guest.index');
            }
        }else{
            return redirect()->route('auth.login')->with('error', 'Email atau Password salah!.');
        }
    }
    public function register()
    {
        
        return view('auth.register');
        
    }

    public function doRegister(Request $request)
    {
        $validatedData = $request->validate([
            'fname'                 => 'required',
            'email'                 => 'required|email|unique:users',
            'password'              => 'required|min:3',
            'passConf'              => 'required|same:password',
        ], [
            'fname.required' => 'Nama tidak boleh kosong!',
            'email.required' => 'Email tidak boleh kosong!',
            'email.unique' => 'Email sudah digunakan! Silahkan gunakan alamat email lain!',
            'password.required' => 'Password tidak boleh kosong!',
            'password.min' => 'Password minimal 3 karakter',
            'passConf.required' => 'Konfirmasi password tidak boleh kosong!',
            'passConf.same' => 'Konfirmasi password salah!',
        ]);
        User::create([
            'role'      => 'guest',
            'name'      => $request->fname,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);
        return redirect()->route('auth.login')->with('success', 'Berhasil mendaftar, silahkan login.');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('ppdb.index');
    }
}