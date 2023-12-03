@extends('layouts.backend.app')

@section('title', 'Ujian')

@section('page-title', 'Ujian')

@section('content')
    @foreach ($soals as $soal)
        <form action="{{ route('guest.ujian.store') }}" method="POST">
            @csrf
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">{{ $loop->iteration }} . {{ $soal->question }}</div>
                </div>
                <div class="ibox-body">
                    <ul>
                        <li>
                            <input type="radio" name="soal_{{ $soal->id }}" id="{{ $soal->id }}" value="A">
                            {{ $soal->option_a }}
                        </li>
                        <li>
                            <input type="radio" name="soal_{{ $soal->id }}" id="{{ $soal->id }}" value="B">
                            {{ $soal->option_b }}
                        </li>
                        <li>
                            <input type="radio" name="soal_{{ $soal->id }}" id="{{ $soal->id }}" value="C">
                            {{ $soal->option_c }}
                        </li>
                        <li>
                            <input type="radio" name="soal_{{ $soal->id }}" id="{{ $soal->id }}" value="D">
                            {{ $soal->option_d }}
                        </li>
                    </ul>
                </div>
            </div>
    @endforeach
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@section('modal')

@endsection
