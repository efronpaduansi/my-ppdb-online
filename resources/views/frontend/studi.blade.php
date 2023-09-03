@extends('layouts.frontend.master')

@section('studi')
<div class="programs">
    <div class="container d-flex justify-content-center">
     <h2 class="about-title">Jurusan</h2>
     <p class="about-sub-title">Kami menyediakan beberapa jurusan, pilih Passion kamu!</p>
     <div class="row">
         {{-- Since update 03/02/2023 --}}
         @foreach ($jurusans as $jurusan)
             <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeIn">
                 <div class="card shadow shadow-lg" style="width: 28rem;">
                     <img src="{{ asset('uploads/img/' . $jurusan->thumbnail) }}" class="card-img-top" alt="Thumbnail">
                     <div class="card-body">
                     <h4 class="text-center">{{ $jurusan->nama_jurusan }}</h4>
                     </div>
                 </div>
             </div>
         @endforeach
     </div>
    </div>
 </div>
 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#DEDEDE" fill-opacity="1" d="M0,160L60,154.7C120,149,240,139,360,128C480,117,600,107,720,112C840,117,960,139,1080,133.3C1200,128,1320,96,1380,80L1440,64L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
@endsection