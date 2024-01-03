@extends('layouts.backend.app')

@section('title', 'Data Pendaftaran')

@section('page-title', 'Data Pendaftaran')

@section('content')
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Data Pendaftaran</div>
        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover table-responsive" id="example-table" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th>No Pendaftaran</th>
                        <th>Nama Lengkap</th>
                        <th>NIK</th>
                        <th>NISN</th>
                        <th>TTL</th>
                        <th>Jenis Kelamin</th>
                        <th>Nilai Ujian</th>
                        <th>Status</th>
                        @if(Auth::user()->role == 'admin')
                         <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendaftaran as $item)
                        <tr>
                            <td>{{ $item->dataDiri->no_pendaftaran }}</td>
                            <td>{{ $item->dataDiri->nama_lengkap }}</td>
                            <td>{{ $item->dataDiri->nik }}</td>
                            <td>{{ $item->dataDiri->nisn }}</td>
                            <td>{{ $item->dataDiri->tempat_lahir }}, {{ $item->dataDiri->tanggal_lahir }}</td>
                            <td>{{ $item->dataDiri->jenis_kelamin }}</td>
                            <td>{{ number_format($item->dataDiri->nilai_ujian, 2, '.', '.') }}</td>
                            <td>
                                @if ($item->dataDiri->status_id == 1)
                                    <span class="badge badge-warning">
                                        {{ $item->dataDiri->status_pendaftaran->status }}
                                    </span>
                                @elseif ($item->dataDiri->status_id == 2)
                                    <span class="badge badge-warning">
                                        {{ $item->dataDiri->status_pendaftaran->status }}
                                    </span>
                                @elseif ($item->dataDiri->status_id == 3)
                                    <span class="badge badge-info">
                                        {{ $item->dataDiri->status_pendaftaran->status }}
                                    </span>
                                @elseif ($item->dataDiri->status_id == 4)
                                    <span class="badge badge-success">
                                        {{ $item->dataDiri->status_pendaftaran->status }}
                                    </span>
                                @elseif ($item->dataDiri->status_id == 5)
                                    <span class="badge badge-danger">
                                        {{ $item->dataDiri->status_pendaftaran->status }}
                                    </span>
                                @endif
                            </td>
                            @if(Auth::user()->role == 'admin')
                            <td class="d-flex inline">
                                <a href="{{ route('admin.pendaftaran.show', $item->id) }}"
                                    class="btn btn-sm btn-primary mr-2">
                                    <i class="fa fa-eye"></i>
                                </a>
                                {{-- Tombol hapus --}}
                                <form action="{{ route('admin.pendaftaran.destroy', $item->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Anda yakin menghapus data ini? klik BATAL jika anda tidak yakin!')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
    @elseif ($message = Session::get('error'))
        <div class="alert alert-danger" role="alert">
            <div class="alert-body">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        </div>
    @endif
@endsection
