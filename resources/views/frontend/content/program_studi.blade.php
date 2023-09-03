{{-- Change on frontend branch --}}
@extends('layouts.frontend.master')

<style>
    .programs{
        margin-top: 8em;
    }
</style>

@section('title')
    Jurusan
@endsection

@section('studi')
    <div class="programs">
       <div class="container d-flex justify-content-center">
        <h2 class="about-title">Jurusan</h2>
        <p class="about-sub-title">Kami menyediakan beberapa jurusan, pilih Passion kamu!</p>
        <div class="row">
            {{-- Since update 03/02/2023 --}}
            @foreach ($jurusans as $jurusan)
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 wow fadeIn">
                    <div class="card shadow-lg" style="width: 28rem;">
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
@endsection

