{{-- Change on frontend branch --}}
@extends('layouts.frontend.master')

<style>
    #pengumuman {
        margin-top: 8em;
    }
</style>

@section('title')
    Pengumuman
@endsection

@section('studi')
    <div class="container" id="pengumuman">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-center">INFORMASI PPDB ONLINE 2023</h3>
                        <h2 class="text-center">DAFTAR SISWA YANG LULUS PPDB</h2>
                        <hr>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NISN</th>
                                    <th>TTL</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>AGAMA</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataSiswa as $siswa)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $siswa->nisn }}</td>
                                        <td>{{ $siswa->tempat_lahir . ', ' . date('d-m-Y', strtotime($siswa->tanggal_lahir)) }}
                                        </td>
                                        <td>{{ $siswa->jenis_kelamin }}</td>
                                        <td>{{ $siswa->agama }}</td>
                                        <td>LULUS</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
