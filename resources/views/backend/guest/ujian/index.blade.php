@extends('layouts.backend.app')

@section('title', 'Ujian')

@section('page-title', 'Ujian')

@section('content')
    @foreach ($soals as $soal)
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">{{ $loop->iteration }} . {{ $soal->question }}</div>
            </div>
            <div class="ibox-body">
            </div>
        </div>
    @endforeach
@endsection

@section('modal')

@endsection
