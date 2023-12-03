@extends('layouts.backend.app')

@section('title', 'Ujian')

@section('page-title', 'Ujian')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-center">
                    <h3>Jawaban Anda telah di rekam!</h3>
                    <p>Terima kasih telah mengikuti ujian seleksi.</p>
                    <a href="{{ route('guest.index') }}" class="btn btn-primary mt-4 mb-2">Kembali ke Dashboard</a>
                </div>
            </div>
        </div>
    </div>
@endsection
