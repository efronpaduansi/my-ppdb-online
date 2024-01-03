@extends('layouts.backend.app')

@section('title', 'Data Siswa')

@section('page-title', 'Data Siswa')

@section('content')
    <div class="ibox">
        <div class="ibox-head flex">
            <div class="ibox-title">Data Siswa</div>
            <div class="export-btn ml-auto">
                <a href="{{ route('admin.siswa.exportExcel') }}" class="btn btn-success"><i class="fa fa-file-excel-o"
                        aria-hidden="true"></i>
                    Export Excel</a>

                <a href="{{ route('admin.siswa.exportPDF') }}" class="btn btn-secondary"><i class="fa fa-file-pdf-o"
                        aria-hidden="true"></i>
                    Export PDF</a>
            </div>
        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>NISN</th>
                        <th>TTL</th>
                        <th>Jenis Kelamin</th>
                        <th>No. Hp</th>
                        <th>Email</th>
                        @if (Auth::user()->role == 'admin')
                            <th>Aksi</th>
                        @endif
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $item)
                        <tr>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->nisn }}</td>
                            <td>{{ $item->tempat_lahir }}, {{ $item->tanggal_lahir }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->no_hp }}</td>
                            <td>{{ $item->email }}</td>
                            @if (Auth::user()->role == 'admin')
                                <td>
                                    <a href="{{ route('admin.siswa.show', $item->id) }}" class="btn btn-primary btn-sm"><i
                                            class="fa fa-eye"></i></a>
                                    <form action="{{ route('admin.siswa.destroy', $item->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('modal')

@endsection
