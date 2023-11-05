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
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Calon Siswa</th>
                        <th>Tgl Ujian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $user)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ date('d/m/Y', strtotime($user['jawaban'][0]['created_at'])) }}</td>
                            <td>
                                <a href="{{ route('admin.ujian.show', $user->id) }}" class="btn btn-sm btn-primary">Lihat
                                    Hasil</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
