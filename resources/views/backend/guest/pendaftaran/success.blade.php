@extends('layouts.backend.app')

@section('title', 'Pendaftaran')

@section('page-title', 'Pendaftaran')

@section('content')
    <div class="card">
        <div class="card-body text-center">
            <img src="{{ asset('backend/img/success.gif') }}" alt="success">
            <h1 class="text-center">Pendaftaran Berhasil</h1>
            <p>Selamat! {{ Auth::user()->name }}, data anda berhasil terkirim. Silahkan cek status pendaftaran di halaman <span class="font-weight-bold">Riwayat Pendaftaran</span> </p>
            <a href="{{ route('guest.pendaftaran.riwayat') }}" class="btn btn-success">Cek status pendaftaran</a>
        </div>
    </div>
@endsection