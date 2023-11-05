@extends('layouts.backend.app')

@section('title', 'Hasil Seleksi')

@section('page-title', 'Hasil Seleksi')

@section('content')
    <div class="ibox">
        <div class="ibox-head d-flex">
            <div class="ibox-title">Hasil Seleksi Calon Siswa</div>
        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <tbody>
                    <tr>
                        <th>Nama Calon Siswa </th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Benar </th>
                        <td>{{ $jmlBenar }} dari {{ $jmlSoal }} soal</td>
                    </tr>
                    <tr>
                        <th>Nilai </th>
                        <td>{{ number_format($nilai, 2, '.', '.') }}</td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ route('admin.ujian') }}" class="btn btn-primary mt-3">Kembali</a>
        </div>
    </div>
@endsection
