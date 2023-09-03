@extends('layouts.backend.app')

@section('title', 'Pendaftaran')

@section('page-title', 'Pendaftaran')

@section('content')
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
        <h1><a class="nav-link bg-success" href="#card-index">1</a></h1>
        </li>
        <li class="nav-item">
        <h1><a class="nav-link bg-success" href="#">2</a></h1>
        </li>
        <li class="nav-item">
            <h1><a class="nav-link active" href="#">3</a></h1>
        </li>
        <li class="nav-item">
        <h1><a class="nav-link bg-secondary">4</a></h1>
        </li>
    </ul>
    <div class="card" id="card-second">
        <div class="card-header"><i class="bi bi-bank"></i> DATA SEKOLAH ASAL</div>
        <div class="card-body">
            <form action="{{ route('guest.pendaftaran.data-sekolah') }}" method="POST" >
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="nama_sekolah">Nama Sekolah Asal</label>
                        <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror" id="nama_sekolah" name="nama_sekolah" autofocus value="{{ old('nama_sekolah') }}">
                        @error('nama_sekolah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>    
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="tahun_lulus">Tahun Lulus</label>
                        <input type="text" class="form-control @error('tahun_lulus') is-invalid @enderror" id="tahun_lulus" name="tahun_lulus" value="{{ old('tahun_lulus') }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="no_ijazah">No Ijazah</label>
                        <input type="text" class="form-control" id="no_ijazah" name="no_ijazah">
                    </div>
                </div>
                <a href="" class="btn btn-danger">Tutup</a>
                <button type="submit" class="btn btn-success">Simpan dan lanjutkan</button>
            </form>
        </div>
    </div>
 
@endsection