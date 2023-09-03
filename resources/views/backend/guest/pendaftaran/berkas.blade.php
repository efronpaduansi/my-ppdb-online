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
            <h1><a class="nav-link bg-success" href="#">3</a></h1>
        </li>
        <li class="nav-item">
        <h1><a class="nav-link active">4</a></h1>
        </li>
    </ul>
    <div class="card" id="card-second">
        <div class="card-header"><i class="bi bi-file-earmark-richtext-fill"></i> BERKAS</div>
        <div class="card-body">
            <form action="{{ route('guest.pendaftaran.berkas') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="ijazah">Foto Copy Ijazah</label>
                        <input type="file" class="form-control @error('ijazah') is-invalid @enderror" id="ijazah" name="ijazah" autofocus value="{{ old('ijazah') }}">
                        @error('ijazah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>    
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="skhun">Foto Copy SKHUN/SKL</label>
                        <input type="file" class="form-control @error('skhun') is-invalid @enderror" id="skhun" name="skhun" value="{{ old('skhun') }}">
                        @error('skhun')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="kartu_keluarga">Foto Copy Kartu Keluarga</label>
                        <input type="file" class="form-control @error('kartu_keluarga') is-invalid @enderror" id="kartu_keluarga" name="kartu_keluarga" value="{{ old('kartu_keluarga') }}">
                        @error('kartu_keluarga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="akta_lahir">Foto Copy Akta Kelahiran</label>
                        <input type="file" class="form-control @error('akta_lahir') is-invalid @enderror" id="akta_lahir" name="akta_lahir" value="{{ old('akta_lahir') }}">
                        @error('akta_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>  
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="foto">Foto Pas</label>
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" value="{{ old('foto') }}">
                        @error('foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <a href="" class="btn btn-danger">Tutup</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
 
@endsection