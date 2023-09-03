@extends('layouts.backend.app')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="ibox bg-primary color-white widget-stat">
            <div class="ibox-body">
                <h2 class="m-b-5 font-strong">Hi, {{ Auth::user()->name }}</h2>
                <div class="m-b-5">Selamat datang di Aplikasi PPDB Online</div>
            </div>
        </div>
    </div>
</div>
@endsection