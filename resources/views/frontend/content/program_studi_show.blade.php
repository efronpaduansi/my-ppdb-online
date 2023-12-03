@extends('layouts.frontend.master')

<style>
    .programs {
        margin-top: 8em;
    }
</style>

@section('title')
    {{ $jurusan->nama_jurusan }}
@endsection

@section('studi')
    <div class="programs">
        <div class="container d-flex justify-content-center">
            <h2 class="about-title">{{ $jurusan->nama_jurusan }}</h2>
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('uploads/img/' . $jurusan->thumbnail) }}" alt="Thumbnail">
                    <h3 class="text-center my-3">{{ $jurusan->nama_jurusan }} | {{ $jurusan->singkatan }}</h3>
                </div>
                <div class="col-md-6">
                    <p>
                        {{ $jurusan->deskripsi }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
