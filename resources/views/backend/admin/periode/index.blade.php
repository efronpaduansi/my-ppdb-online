@extends('layouts.backend.app')

@section('title', 'Periode')

@section('page-title', 'Periode')

@section('content')
<div class="ibox">
    <div class="ibox-head">
        <div class="ibox-title">Periode</div>
        <div class="ibox-title ml-auto">
            <a href="{{ route('admin.periode.create') }}" class="btn btn-primary"><i class="bi bi-calendar-date"></i> Jadwal Baru</a>
        </div>
    </div>
    <div class="ibox-body">
        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Periode</th>
                    <th>Tgl Mulai</th>
                    <th>Tgl Selesai</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($periodes as $periode)
                <tr>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#periodeModal{{ $periode->id }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    <td>{{ $periode->nama_periode }}</td>
                    {{-- Show Periode Modal --}}
                    <div class="modal fade" id="periodeModal{{ $periode->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">{{ $periode->nama_periode }}</h5>
                              <form action="{{ route('admin.periode.closed', $periode->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                 <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin?')">Tutup Pendaftaran</button>
                              </form>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('admin.periode.update', $periode->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                   <div class="form-group">
                                        <label for="nama_periode">Nama Periode</label>
                                        <input type="text" name="nama_periode" id="nama_periode" class="form-control" value="{{ $periode->nama_periode }}">
                                   </div>
                                   <div class="form-group">
                                        <label for="tanggal_mulai">Tanggal Mulai</label>
                                        <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" value="{{ $periode->tanggal_mulai }}">
                                   </div>
                                   <div class="form-group">
                                        <label for="tanggal_selesai">Tanggal Selesai</label>
                                        <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" value="{{ $periode->tanggal_selesai }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="ket">Keterangan</label>
                                        <textarea name="ket" id="ket" cols="30" rows="4" class="form-control">{{ $periode->keterangan }}</textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    {{-- End Periode Modal --}}
                    <td>{{ date('d M Y', strtotime($periode->tanggal_mulai))}}</td>
                    <td>{{ date('d M Y', strtotime($periode->tanggal_selesai))}}</td>
                    <td>{{ $periode->keterangan }}</td>
                    <td>
                        @if ($periode->status_periode == 'Buka')
                            <span class="badge badge-success"><i class="bi bi-check-circle"></i> {{ $periode->status_periode }}</span>
                        @elseif ($periode->status_periode == 'Tutup')
                            <span class="badge badge-danger"><i class="bi bi-x-circle-fill"></i> {{ $periode->status_periode }}</span>
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

@section('modal')

@endsection