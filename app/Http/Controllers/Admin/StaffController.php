<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Website;
class StaffController extends Controller
{
    public function index()
    {
        $web        = Website::get()->first();
        $staff = Staff::all();
        return view('backend.admin.staff.index', compact('staff', 'web'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:staff|max:255',
        ]);
        if($validated){
            $staff = new Staff();
            $staff->nama            = $request->nama;
            $staff->email           = $request->email;
            $staff->password        = Hash::make($request->password);
            $staff->role            = 'Staff';
            $success = $staff->save();
            if($success){
                return redirect()->back()->with('success', 'Staff berhasil ditambahkan!');
            }else{
                return redirect()->back()->with('error', 'Staff gagal ditambahkan!');
            }
        }else{
            return redirect()->back()->with('error', 'Email sudah terdaftar!');
        }
    }

    public function show($id)
    {
        $web       = Website::get()->first();
        $staff = Staff::find($id);
        return view('backend.admin.staff.show', compact('staff', 'web'));
    }

    public function update(Request $request, $id)
    {
        $staff = Staff::find($id);
        $staff->nama            = $request->nama;
        $staff->email           = $request->email;
        $staff->password        = Hash::make($request->password);
        $staff->update();
        $id = $staff->id;
        return redirect()->back()->with('success', 'Staff berhasil diupdate!', compact('id'));
    }

    public function destroy($id)
    {
        $staff = Staff::find($id);
        $staff->delete();
        return redirect()->back()->with('success', 'Staff berhasil dihapus!');
    }
}
