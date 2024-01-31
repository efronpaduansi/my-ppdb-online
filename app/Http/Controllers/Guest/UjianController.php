<?php

namespace App\Http\Controllers\Guest;

use App\Models\DataDiri;
use  App\Models\BankSoal;
use App\Models\JawabanSoal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class UjianController extends Controller
{

    public function index()
    {
        $userId = auth()->user()->id;
        $data = DataDiri::where('user_id', $userId)->get(['jurusan_id'])->first();
        // dd($data->jurusan_id);
        $soals = BankSoal::where('jurusan_id', $data->jurusan_id)->get();
        
        // if (session()->has('soals')) {
        //     $soals = session('soals');
        // } else {
        //     $soals = BankSoal::where('jurusan_id', $data->jurusan_id)->get();
        //     session(['soals' => $soals]);
        // }

        $getUserId = JawabanSoal::where('user_id', $userId)->first();

        if($getUserId){
            return view('backend.guest.ujian.confirm');
        }
        return view('backend.guest.ujian.index', compact('soals'));
    }

    public function store(Request $request)
    {
        $jawaban = [];

        foreach($request->all() as $key => $value){
            if (strpos($key, 'soal_') === 0) {
                $soalId = substr($key, 5); 
                $jawaban[$soalId] = $value; 
            }
        }
        
        //Store jawaban soal
        foreach ($jawaban as $soalId => $nilai) {
            $data = [
                'soal_id' => $soalId,
                'user_id' => auth()->user()->id,
                'answer' => $nilai,
            ];

            //get answer from bank_soal table
            $getAnswer = BankSoal::where('id', $soalId)->first();

            $key = $getAnswer->answer;

            if($key == $nilai){
                $data['status'] = 'benar';
            }else{
                $data['status'] = 'salah';
            }

            $storeJawaban = JawabanSoal::create($data);
        }

        $id =  auth()->user()->id;
        
        //Hitung nilai ujian
        $jmlSoal    = BankSoal::count();
        $jmlBenar   = JawabanSoal::where('user_id', $id)->where('status', 'benar')->count();
        $nilai = ($jmlBenar / $jmlSoal) * 100;


        //Update tabel data_diri
        $update = DataDiri::where('user_id', $id)->update(array('nilai_ujian' => $nilai));

        toast('Terima kasih! Jawaban Anda telah direkam.','success')->timerProgressBar();
        return view('backend.guest.ujian.confirm');
    }
}
