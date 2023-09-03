@extends('layouts.backend.app')

@section('title', 'Pendaftaran')

@section('page-title', 'Pendaftaran')

@section('content')
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
        <h1><a class="nav-link bg-success" href="#card-index">1</a></h1>
        </li>
        <li class="nav-item">
        <h1><a class="nav-link active" href="#">2</a></h1>
        </li>
        <li class="nav-item">
            <h1><a class="nav-link bg-secondary" href="#">3</a></h1>
        </li>
        <li class="nav-item">
        <h1><a class="nav-link bg-secondary">4</a></h1>
        </li>
    </ul>
    <div class="card" id="card-second">
        <div class="card-header"><i class="bi bi-person-hearts"></i> DATA ORANG TUA/WALI</div>
        <div class="card-body">
            <form action="{{ route('guest.pendaftaran.data-orangtua') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama_ayah">Nama Ayah</label>
                        <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" id="nama_ayah" name="nama_ayah" autofocus value="{{ old('nama_ayah') }}">
                        @error('nama_ayah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nama_ibu">Nama Ibu</label>
                        <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu') }}">
                        @error('nama_ibu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                        <select name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control @error('pekerjaan_ayah') is-invalid @enderror">
                            <option value="">--Select--</option>
                            <option value="PNS">PNS</option>
                            <option value="TNI/POLRI">TNI/POLRI</option>
                            <option value="Wiraswasta">Wiraswasta</option>
                            <option value="Petani">Petani</option>
                            <option value="Buruh">Buruh</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        @error('pekerjaan_ayah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                        <select name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control @error('pekerjaan_ibu') is-invalid @enderror">
                            <option value="">--Select--</option>
                            <option value="PNS">PNS</option>
                            <option value="TNI/POLRI">TNI/POLRI</option>
                            <option value="Wiraswasta">Wiraswasta</option>
                            <option value="Petani">Petani</option>
                            <option value="Buruh">Buruh</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        @error('pekerjaan_ibu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="4" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="no_hp">No. HP/WhatsApp</label>
                        <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp') }}">
                        @error('no_hp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="penghasilan">Penghasilan Rata-rata per Bulan</label>
                        <select name="penghasilan" id="penghasilan" class="form-control @error('penghasilan') is-invalid @enderror">
                            <option value="">--Select--</option>
                            <option value="Kurang dari Rp. 1.000.000">Kurang dari Rp. 1.000.000</option>
                            <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
                            <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp. 2.000.000 - Rp. 3.000.000</option>
                            <option value="Rp. 3.000.000 - Rp. 4.000.000">Rp. 3.000.000 - Rp. 4.000.000</option>
                            <option value="Rp. 4.000.000 - Rp. 5.000.000">Rp. 4.000.000 - Rp. 5.000.000</option>
                            <option value="Lebih dari Rp. 5.000.000">Lebih dari Rp. 5.000.000</option>
                        </select>
                        @error('penghasilan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="card-header"><small class="text-danger">**Mohon jangan di isi jika tinggal dengan orangtua</small></div> 
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama_wali">Nama Wali</label>
                        <input type="text" class="form-control" id="nama_wali" name="nama_wali" autofocus>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="pekerjaan_wali">Pekerjaan Wali</label>
                       <select name="pekerjaan_wali" id="pekerjaan_wali" class="form-control">
                            <option value="">--Select--</option>
                            <option value="PNS">PNS</option>
                            <option value="TNI/POLRI">TNI/POLRI</option>
                            <option value="Wiraswasta">Wiraswasta</option>
                            <option value="Petani">Petani</option>
                            <option value="Buruh">Buruh</option>
                            <option value="Lainnya">Lainnya</option>
                       </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="alamat_wali">Alamat Wali</label>
                        <textarea name="alamat_wali" id="alamat_wali" cols="30" rows="4" class="form-control"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="no_hp_wali">No. HP Wali</label>
                        <input type="number" class="form-control" id="no_hp_wali" name="no_hp_wali">
                    </div>
                </div>
                <a href="" class="btn btn-danger">Tutup</a>
                <button type="submit" class="btn btn-success">Simpan dan lanjutkan</button>
            </form>
        </div>
    </div>
 
@endsection