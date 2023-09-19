@extends('layouts.backend.app')

@section('title', 'Informasi Akun')

@section('page-title', 'Informasi Akun')

@section('content')
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Informasi Akun</div>
        </div>
        <div class="ibox-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('uploads/berkas/foto/' . $myProfile->foto) }}" alt="Pas Foto" class="rounded-circle"
                        width="220px" height="220px">
                </div>
                <div class="col-md-8">

                    <div class="row mb-3">
                        <label for="" class="col-form-label col-sm-4">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{ Auth()->user()->name }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-form-label col-sm-4">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{ Auth()->user()->email }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-form-label col-sm-4">Role</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control text-capitalize" value="{{ Auth()->user()->role }}"
                                readonly>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#passwordModal">
                        Ubah Kata Sandi
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Kata Sandi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('siswa.profile.change-pass') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ Auth()->user()->id }}">
                        <div class="form-group">
                            <label for="oldPass">Password Lama</label>
                            <input type="password" name="oldPass" id="oldPass" class="form-control"
                                placeholder="Masukan Password Lama" required>
                        </div>
                        <div class="form-group">
                            <label for="newPass">Password Baru</label>
                            <input type="password" name="newPass" id="newPass" class="form-control"
                                placeholder="Masukan Password Baru" required>
                        </div>
                        <div class="form-group">
                            <label for="newPassConf">Konfirmasi Password Baru</label>
                            <input type="password" name="newPassConf" id="newPassConf" class="form-control"
                                placeholder="Masukan Konfirmasi Password Baru" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
