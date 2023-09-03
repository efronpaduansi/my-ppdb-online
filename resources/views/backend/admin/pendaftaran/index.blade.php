@extends('layouts.backend.app')

@section('title', 'Data Pendaftaran')

@section('page-title', 'Data Pendaftaran')

@section('content')
<div class="ibox">
    <div class="ibox-head">
        <div class="ibox-title">Data Pendaftaran</div>
    </div>
    <div class="ibox-body">
        <table class="table table-striped table-bordered table-hover table-responsive" id="example-table" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Aksi</th>
                    <th>No Pendaftaran</th>
                    <th>Nama Lengkap</th>
                    <th>NIK</th>
                    <th>NISN</th>
                    <th>TTL</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pendaftaran as $item)   
                <tr>
                    <td class="d-flex inline">
                        <a href="{{ route('admin.pendaftaran.show', $item->user->id) }}" class="btn btn-sm btn-primary mr-2">
                            <i class="fa fa-eye"></i>
                        </a>
                        {{-- Tombol hapus --}}
                        <form action="{{ route('admin.pendaftaran.destroy', $item->user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin menghapus data ini? klik BATAL jika anda tidak yakin!')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                    <td>{{ $item->no_pendaftaran }}</td>
                    <td>{{ $item->nama_lengkap }}</td>
                    <td>{{ $item->nik }}</td>
                    <td>{{ $item->nisn }}</td>
                    <td>{{ $item->tempat_lahir }}, {{ $item->tanggal_lahir }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->agama }}</td>
                    <td>
                        @if ($item->status_id == 1)
                            <span class="badge badge-warning">
                                {{ $item->status_pendaftaran->status }}
                            </span>
                        @elseif ($item->status_id == 2)
                            <span class="badge badge-success">
                                {{ $item->status_pendaftaran->status }}
                            </span>
                        @elseif ($item->status_id == 3)
                            <span class="badge badge-danger">
                                {{ $item->status_pendaftaran->status }}
                            </span>
                        @endif
                    </td>
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