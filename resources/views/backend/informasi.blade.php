@extends('layouts.backend.app')

@section('title', 'Informasi')

@section('page-title', 'Informasi')

@section('content')
<div class="tombol">
    @if (Auth::user()->role == 'admin')
    <a href="{{ route('informasi.create') }}" class="btn btn-primary mb-5"><i class="bi bi-megaphone"></i> Tambah Informasi</a>
    @endif
</div>
<div class="row">
    @if($informasi->isEmpty())
        <div class="col-12 d-flex justify-content-center">
            <div class="card" style="width: 70%;">
                <div class="card-body text-center">
                    <h5 class="card-title
                    ">Belum ada informasi yang ditampilkan</h5>
                    <img src="{{ asset('backend/img/4042.png') }}" alt="404 Not Found!">
                </div>
            </div>
        </div>
    @endif
    @foreach ($informasi as $info)
        <div class="col-12 d-flex justify-content-center">
            <div class="card" style="width: 70%;">
                <img src="{{ asset('uploads/'. $info->gambar) }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $info->judul }}</h5>
                  <h6><i class="bi bi-tag-fill text-warning"></i> {{ $info->kategori }} by {{ $info->user->name }}</h6>
                  <p class="card-text">{{ $info->isi }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>

{{-- tampil pesan --}}
@if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    <div class="alert-body">
        <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert">×</button>
    </div>
</div> 
@elseif ($message = Session::get('error'))
<div class="alert alert-danger" role="alert">
    <div class="alert-body">
        <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert">×</button>
    </div>
</div>
@endif
@endsection