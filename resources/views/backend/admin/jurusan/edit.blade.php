@extends('layouts.backend.app')

@section('title', 'Jurusan')

@section('page-title', 'Edit Jurusan')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">
       <div class="ibox">
            <div class="ibox-body">
                <form action="{{ route('admin.jurusan.update', $jurusan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="kode_jurusan" class="col-sm-2 col-form-label">Kode Jurusan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="kode_jurusan" name="kode_jurusan" value="{{ $jurusan->kode_jurusan }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="nama_jurusan" class="col-sm-2 col-form-label">Nama Jurusan</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control @error('nama_jurusan') is-invalid @enderror" id="nama_jurusan" name="nama_jurusan" value="{{ $jurusan->nama_jurusan }}">
                        @error('nama_jurusan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="singkatan" class="col-sm-2 col-form-label">Singkatan</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control @error('singkatan') is-invalid @enderror" id="singkatan" name="singkatan" value="{{ $jurusan->singkatan }}">
                        @error('singkatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3">{{ $jurusan->deskripsi }}</textarea>
                            @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                      </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <a href="{{ route('admin.jurusan.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                      </div>
                    </div>
                  </form>
            </div>
       </div>
    </div>
</div>
<style>
    .profile-social a {
        font-size: 16px;
        margin: 0 10px;
        color: #999;
    }

    .profile-social a:hover {
        color: #485b6f;
    }

    .profile-stat-count {
        font-size: 22px
    }
</style>
@endsection

