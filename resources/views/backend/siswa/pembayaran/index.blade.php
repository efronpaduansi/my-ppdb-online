@extends('layouts.backend.app')

@section('title', 'Pembayaran')

@section('page-title', 'Pembayaran')

@section('content')
<div class="ibox">
    <div class="ibox-head">
        <div class="ibox-title">Daftar Tagihan</div>
    </div>
    <div class="ibox-body">
        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Aksi</th>
                    <th>Nama Lengkap</th>
                    <th>NISN</th>
                    <th>TTL</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>No. Hp</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('modal')

@endsection