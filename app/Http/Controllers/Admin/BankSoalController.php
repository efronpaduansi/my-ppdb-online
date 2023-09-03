<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BankSoal;
Use Alert;
class BankSoalController extends Controller
{

    private function soalNumber(){
        $soal = BankSoal::orderBy('number', 'desc')->first();
        if($soal == null){
            return 1;
        }else{
            return $soal->number + 1;
        }
    }

    public function index(){
        $soalNumber = $this->soalNumber();
        $bankSoal   = BankSoal::all();
        return view('backend.admin.banksoal.index', compact('soalNumber', 'bankSoal'));
    }

    public function store(Request $request){
        $banksoal = new BankSoal();
        $banksoal->number = $request->number;
        $banksoal->question = $request->question;
        $banksoal->option_a = $request->option_a;
        $banksoal->option_b = $request->option_b;
        $banksoal->option_c = $request->option_c;
        $banksoal->option_d = $request->option_d;
        $banksoal->answer = $request->answer;
        if($banksoal->save()){
            toast('Berhasil menambahkan data!','success')->timerProgressBar();
            return redirect()->back();
        }else{
            toast('Gagal menambahkan data!','error')->timerProgressBar();
            return redirect()->back();
        }
    }

    public function edit($id){
        $soal = BankSoal::findOrFail($id);
        return view('backend.admin.banksoal.edit',  compact('soal'));
    }

    public function update(Request $request, $id){
        $banksoal = BankSoal::findOrFail($id);
        
        $banksoal->number = $request->number;
        $banksoal->question = $request->question;
        $banksoal->option_a = $request->option_a;
        $banksoal->option_b = $request->option_b;
        $banksoal->option_c = $request->option_c;
        $banksoal->option_d = $request->option_d;
        if($request->answer != ''){
            $banksoal->answer = $request->answer;
        }
        $banksoal->answer = $banksoal->answer;

        if($banksoal->update()){
            toast('Berhasil mengubah data!','success')->timerProgressBar();;
            return redirect()->route('admin.bank-soal');
        }else{
            toast('Gagal mengubah data!','error')->timerProgressBar();;
            return redirect()->route('admin.bank-soal');
        }
    }

    public function destroy($id){
        $banksoal = BankSoal::findOrFail($id);
        if($banksoal->delete()){
            toast('Berhasil menghapus data!','success')->timerProgressBar();;
            return redirect()->route('admin.bank-soal');
        }else{
            toast('Gagal menghapus data!','error')->timerProgressBar();;
            return redirect()->route('admin.bank-soal');
        }
    }

}
