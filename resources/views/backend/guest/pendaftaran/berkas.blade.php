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
        @if(isset($catatan) && !empty($catatan))
           <div class="alert alert-warning"> {{ $catatan }}</div>
        @endif
     
        <div class="card-header"><i class="bi bi-file-earmark-richtext-fill"></i> BERKAS</div>
        <div class="card-body">
            <form action="{{ route('guest.pendaftaran.berkas') }}" method="POST" enctype="multipart/form-data"
                id="#fileForm">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="ijazah">Foto Copy Ijazah (.pdf)</label>
                        <input type="file" class="form-control @error('ijazah') is-invalid @enderror" id="ijazah"
                            name="ijazah" autofocus value="{{ old('ijazah') }}" accept=".pdf">
                        @error('ijazah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="skhun">Foto Copy SKHUN/SKL (.pdf)</label>
                        <input type="file" class="form-control @error('skhun') is-invalid @enderror" id="skhun"
                            name="skhun" value="{{ old('skhun') }}" accept=".pdf">
                        @error('skhun')
                            <div class="invalid-feedback" accept=".pdf">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="kartu_keluarga">Foto Copy Kartu Keluarga (.pdf)</label>
                        <input type="file" class="form-control @error('kartu_keluarga') is-invalid @enderror"
                            id="kartu_keluarga" name="kartu_keluarga" value="{{ old('kartu_keluarga') }}" accept=".pdf">
                        @error('kartu_keluarga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="akta_lahir">Foto Copy Akta Kelahiran (.pdf)</label>
                        <input type="file" class="form-control @error('akta_lahir') is-invalid @enderror" id="akta_lahir"
                            name="akta_lahir" value="{{ old('akta_lahir') }}" accept=".pdf">
                        @error('akta_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="foto">Foto Pas (.png, .jpeg, .jpg)</label>
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto"
                            name="foto" value="{{ old('foto') }}" accept=".png, .jpeg, .jpg">
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

@push('customjs')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('validator/lib/jquery.js') }}"></script>
    <script src="{{ asset('validator/dist/jquery.validate.js') }}"></script>
    <script src="{{ asset('validator/dist/additional-methods.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#fileForm").validate();
        });
    </script>
@endpush
