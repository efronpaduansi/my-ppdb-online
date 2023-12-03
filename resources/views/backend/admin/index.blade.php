@extends('layouts.backend.app')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="ibox bg-success color-white widget-stat">
            <div class="ibox-body">
                <h2 class="m-b-5 font-strong">{{ $totalSiswa }}</h2>
                <div class="m-b-5">TOTAL SISWA</div><i class="bi bi-mortarboard-fill widget-stat-icon"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="ibox bg-info color-white widget-stat">
            <div class="ibox-body">
                <h2 class="m-b-5 font-strong">{{ $totalPendaftaran }}</h2>
                <div class="m-b-5">TOTAL PENDAFTARAN</div><i class="bi bi-person-plus-fill widget-stat-icon"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="ibox bg-warning color-white widget-stat">
            <div class="ibox-body">
                <h2 class="m-b-5 font-strong">{{ $totalStaff }}</h2>
                <div class="m-b-5">TOTAL STAFF</div><i class="bi bi-person-vcard-fill widget-stat-icon"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="ibox bg-danger color-white widget-stat">
            <div class="ibox-body">
                <h2 class="m-b-5 font-strong">{{ $totalUsers }}</h2>
                <div class="m-b-5">TOTAL USERS</div><i class="ti-user widget-stat-icon"></i>
            </div>
        </div>
    </div>
</div>
@endsection