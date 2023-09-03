@extends('layouts.backend.app')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="ibox bg-primary color-white widget-stat">
            <div class="ibox-body">
                <h2 class="m-b-5 font-strong">Hi, {{ Auth::user()->name }}</h2>
                <div class="m-b-5">Selamat datang di aplikasi PPDB Online</div>
            </div>
        </div>
    </div>
    {{-- <div class="col-lg-3 col-md-6">
        <div class="ibox bg-info color-white widget-stat">
            <div class="ibox-body">
                <h2 class="m-b-5 font-strong">1250</h2>
                <div class="m-b-5">UNIQUE VIEWS</div><i class="ti-bar-chart widget-stat-icon"></i>
                <div><i class="fa fa-level-up m-r-5"></i><small>17% higher</small></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="ibox bg-warning color-white widget-stat">
            <div class="ibox-body">
                <h2 class="m-b-5 font-strong">$1570</h2>
                <div class="m-b-5">TOTAL INCOME</div><i class="fa fa-money widget-stat-icon"></i>
                <div><i class="fa fa-level-up m-r-5"></i><small>22% higher</small></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="ibox bg-danger color-white widget-stat">
            <div class="ibox-body">
                <h2 class="m-b-5 font-strong">108</h2>
                <div class="m-b-5">NEW USERS</div><i class="ti-user widget-stat-icon"></i>
                <div><i class="fa fa-level-down m-r-5"></i><small>-12% Lower</small></div>
            </div>
        </div>
    </div> --}}
</div>
@endsection