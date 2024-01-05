@extends('layouts.backend.app')

@section('title', 'Profile')

@section('page-title', 'Profile')

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-4">
        <div class="ibox">
            <div class="ibox-body text-center">
                <div class="m-t-20">
                    <img class="img-circle" src="" />
                </div>
                <h5 class="font-strong m-b-10 m-t-10">{{ Auth::user()->name }}</h5>
                <div class="m-b-20 text-muted">{{ Auth::user()->email }}</div>
                <div class="profile-social m-b-20">
                    <a href="javascript:;"><i class="fa fa-twitter"></i></a>
                    <a href="javascript:;"><i class="fa fa-facebook"></i></a>
                    <a href="javascript:;"><i class="fa fa-pinterest"></i></a>
                    <a href="javascript:;"><i class="fa fa-dribbble"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-8">
        <div class="ibox">
            <div class="ibox-body">
                <ul class="nav nav-tabs tabs-line">
                    <li class="nav-item">
                        <a class="nav-link active" href="#tab-1" data-toggle="tab"><i class="ti-bar-chart"></i> Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tab-2" data-toggle="tab"><i class="bi bi-envelope-at"></i> Ubah Email</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tab-3" data-toggle="tab"><i class="bi bi-key"></i> Ubah Kata Sandi</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-1">
                        <div class="row">
                            <div class="col-md-6" style="border-right: 1px solid #eee;">
                                <h5 class="text-info m-b-20 m-t-10"><i class="fa fa-user"></i> Biodata</h5>
                                <div class="m-b-20">
                                    <form action="">
                                        <div class="form-group">
                                            <label for="">Nama Lengkap</label>
                                            <input type="text" value="{{ Auth::user()->name }}" class="form-control" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="">NISN</label>
                                            <input type="text" value="{{ Auth::user()->email }}" class="form-control" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Jenis Kelamin</label>
                                            <input type="text" value="{{ Auth::user()->role }}" class="form-control" readonly>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="tab-pane fade" id="tab-2">
                        <form action="{{ route('admin.profile.changeEmail') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-8 form-group">
                                    <label>Email Aktif</label>
                                    <input class="form-control" type="email" name="email" placeholder="Masukan Email Aktif" required>
                                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="tab-3">
                        <h5 class="text-info m-b-20 m-t-20">Ubah Kata Sandi</h5>
                         <form action="{{ route('admin.profile.changePassword') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label for="oldPass">Kata Sandi Saat ini</label>
                                    <input type="password" name="oldPass" id="oldPass" class="form-control" required>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="newPass">Kata Sandi Baru</label>
                                    <input type="password" name="newPass" id="newPass" class="form-control" required>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="passConf">Konfirmasi Kata Sandi Baru</label>
                                    <input type="password" name="passConf" id="passConf" class="form-control" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                         </form>
                    </div>
                </div>
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

