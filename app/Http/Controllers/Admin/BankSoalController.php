<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jurusan;
use App\Models\BankSoal;
use Illuminate\Http\Request;
use App\Imports\BankSoalImport;
use App\Exports\FormatSoalExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
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

    public function index(Request $request){

        $jurusanId = $request->jurusan_id;

        if(!empty($jurusanId)){
            $soalNumber = $this->soalNumber();
            $bankSoal   = BankSoal::where('jurusan_id', $jurusanId)->get();
            return view('backend.admin.banksoal.index', compact('soalNumber', 'bankSoal', 'jurusanId'));
        }else{
            $cekSoal   = BankSoal::oldest()->first();
            $jurusan = Jurusan::oldest()->get();
            return view('backend.admin.banksoal.empty', compact('jurusan'));
        }

    }

    //Download format excel
    public function downloadFormatExcel()
    {
        return Excel::download(new FormatSoalExport, 'format_bank_soal.xlsx');
    }

    public function store(Request $request){
        
        $data = [
            'number' => $request->number,
            'question' => $request->question,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'answer' => $request->answer,
            'jurusan_id' => $request->jurusan,
        ];
      
        if(BankSoal::create($data)){
            toast('Berhasil menambahkan data!','success')->timerProgressBar();
            return redirect()->back();
        }else{
            toast('Gagal menambahkan data!','error')->timerProgressBar();
            return redirect()->back();
        }
    }

    //store data from excel
    public function importExcel(Request $request)
    {
        //Validate
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
		$file = $request->file('file');

        // membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
		$file->move('files_uploaded',$nama_file);

        //import data
        Excel::import(new BankSoalImport, public_path('/files_uploaded/' . $nama_file));

        toast('Import Sukses!','success')->timerProgressBar();
        return redirect()->back();
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
