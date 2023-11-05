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
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
