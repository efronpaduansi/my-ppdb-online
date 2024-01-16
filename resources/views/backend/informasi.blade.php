@extends('layouts.backend.app')

@section('title', 'Informasi')

@section('page-title', 'Informasi')

@section('content')
    {{-- <div class="tombol">
        @if (Auth::user()->role == 'admin')
            <a href="{{ route('informasi.create') }}" class="btn btn-primary mb-5"><i class="bi bi-megaphone"></i> Tambah
                Informasi</a>
        @endif
    </div> --}}
    <div class="row">
        @if ($dataSiswa->isEmpty())
            <div class="col-12 d-flex justify-content-center">
                <div class="card" style="width: 70%;">
                    <div class="card-body text-center">
                        <h5 class="card-title
                    ">Belum ada informasi yang ditampilkan</h5>
                        <img src="{{ asset('backend/img/4042.png') }}" alt="404 Not Found!">
                    </div>
                </div>
            </div>
        @endif
        <div class="col-md-12">
            @if(Auth::user()->role == 'admin' || Auth::user()->role == 'kepsek')
                <hr>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NISN</th>
                            <th>TTL</th>
                            <th>JENIS KELAMIN</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataSiswa as $siswa)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $siswa->nisn }}</td>
                                <td>{{ $siswa->tempat_lahir . ", " . date('d-m-Y', strtotime($siswa->tanggal_lahir)) }}</td>
                                <td>{{ $siswa->jenis_kelamin }}</td>
                                <td>LULUS</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @elseif(Auth::user()->role == 'guest' || Auth::user()->role == 'siswa')
                <h4 class="text-center alert {{ $info == 'Selamat Anda Lulus' ? 'alert-success' : 'alert-danger' }}">{{ $info }}</h4>
            @endif
        </div>
    </div>

@endsection
