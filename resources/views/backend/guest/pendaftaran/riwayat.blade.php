@extends('layouts.backend.app')

@section('title', 'Riwayat Pendaftaran')

@section('page-title', 'Riwayat Pendaftaran')

@section('content')
    <div class="ibox">
        <div class="ibox-body text-center">
            @if ($pendaftaran == null)
                <div class="alert alert-warning">Anda belum memiliki riwayat pendaftaran!</div>
                <img src="{{ asset('backend/img/4042.png') }}" alt="404 Not Found!">
            @else
                <table class="table table-bordered">
                    <tr class="bg-secondary">
                        <th>DATA DIRI PENDAFTAR</th>
                        <td class="bg-secondary"></td>
                    </tr>
                    <tr>
                        <th>No Pendaftaran</th>
                        <td class="text-left">{{ $pendaftaran->no_pendaftaran }}</td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td class="text-left">{{ $pendaftaran->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th>NISN</th>
                        <td class="text-left">{{ $pendaftaran->nisn }}</td>
                    <tr>
                    <tr>
                        <th>NIK</th>
                        <td class="text-left">{{ $pendaftaran->nik }}</td>
                    </tr>
                    <th>Tempat, Tanggal Lahir</th>
                    <td class="text-left">
                        {{ $pendaftaran->tempat_lahir }}, {{ $pendaftaran->tanggal_lahir }}
                    </td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td class="text-left">{{ $pendaftaran->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td class="text-left">{{ $pendaftaran->agama }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td class="text-left">{{ $pendaftaran->alamat }}</td>
                    </tr>
                    <tr>
                        <th>No. HP</th>
                        <td class="text-left">{{ $pendaftaran->no_hp }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td class="text-left">{{ $pendaftaran->email }}</td>
                    </tr>
                    <tr class="bg-secondary">
                        <th>DATA ORANGTUA/WALI</th>
                        <td class="bg-secondary"></td>
                    </tr>
                    <tr>
                        <th>Nama Ayah</th>
                        <td class="text-left">{{ $dataOrangTua->nama_ayah }}</td>
                    </tr>
                    <tr>
                        <th>Nama Ibu</th>
                        <td class="text-left">{{ $dataOrangTua->nama_ibu }}</td>
                    </tr>
                    <tr>
                        <th>Pekerjaan Ayah</th>
                        <td class="text-left">{{ $dataOrangTua->pekerjaan_ayah }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td class="text-left">{{ $dataOrangTua->alamat }}</td>
                    </tr>
                    <tr>
                        <th>No. HP</th>
                        <td class="text-left">{{ $dataOrangTua->no_hp }}</td>
                    </tr>
                    <tr class="bg-secondary">
                        <th>DATA SEKOLAH ASAL</th>
                        <td class="bg-secondary"></td>
                    </tr>
                    <tr>
                        <th>Nama Sekolah Asal</th>
                        <td class="text-left">{{ $dataSekolah->nama_sekolah }}</td>
                    </tr>
                    <tr>
                        <th>Tahun Lulus</th>
                        <td class="text-left">{{ $dataSekolah->tahun_lulus }}</td>
                    </tr>
                    <tr>
                        <th>No. Ijazah</th>
                        <td class="text-left">{{ $dataSekolah->no_ijazah }}</td>
                    </tr>
                    <tr>
                        <th>Status Pendaftaran</th>
                        <td class="text-left">
                            @if ($pendaftaran->status_id == 1)
                                <span class="badge badge-warning">
                                    {{ $pendaftaran->status_pendaftaran->status }}
                                </span>
                            @elseif ($pendaftaran->status_id == 2)
                                <span class="badge badge-success">
                                    {{ $pendaftaran->status_pendaftaran->status }}
                                </span>
                            @elseif ($pendaftaran->status_id == 3)
                                <span class="badge badge-danger">
                                    {{ $pendaftaran->status_pendaftaran->status }}
                                </span>
                            @endif
                        </td>
                    </tr>
                </table>
            @endif
        </div>
    </div>

    {{-- tampil pesan --}}
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <div class="alert-body">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        </div> 
    @endif
@endsection