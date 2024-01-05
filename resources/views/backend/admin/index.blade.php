@extends('layouts.backend.app')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-4 col-md-12">
        <div class="ibox bg-success color-white widget-stat">
            <a href="{{ route('admin.siswa.index') }}">
                <div class="ibox-body text-white">
                    <h2 class="m-b-5 font-strong">{{ $totalSiswa }}</h2>
                    <div class="m-b-5">TOTAL SISWA</div><i class="bi bi-mortarboard-fill widget-stat-icon"></i>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="ibox bg-info color-white widget-stat">
            <a href="{{ route('admin.pendaftaran.index') }}">
                <div class="ibox-body text-white">
                    <h2 class="m-b-5 font-strong">{{ $totalJurusan }}</h2>
                    <div class="m-b-5">TOTAL JURUSAN</div><i class="bi bi-bookmarks-fill widget-stat-icon"></i>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="ibox bg-danger color-white widget-stat">
            <a href="{{ route('admin.bank-soal') }}">
                <div class="ibox-body text-white">
                    <h2 class="m-b-5 font-strong">{{ $totalSoal }}</h2>
                    <div class="m-b-5">TOTAL SOAL</div><i class="bi bi-patch-question-fill widget-stat-icon"></i>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection