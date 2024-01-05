{{-- Change on frontend branch --}}
@extends('layouts.frontend.master')

<style>
    #alur {
        margin-top: 8em;
    }

    .card {
        background: #ff4517;
    }
</style>

@section('title')
    Alur Pendaftaran
@endsection

@section('studi')
    <div class="container d-block justify-content-center" id="alur">
        <h2 class="text-center mb-3">Alur Pendaftaran</h2>
        <img src="{{ asset('frontend/img/alur_ppdb.png') }}" alt="">
    </div>
    <br> <br>
    <h3 class="text-center">Penjelasan:</h3>
    <br>
    <ul class="text-center">
        <li>1. Calon siswa mengakses portal PPDB Online melalui web browser</li>
        <li>2. Calon siswa melakukan pendaftaran akun pada portal PPDB Online dengan mengklik tombol <strong>DAFTAR</strong></li>
        <li>3. Setelah berhasil mendaftar, calon siswa melakukan login ke dashboard</li>
        <li>4. Calon siswa melakukan mengisi data diri, data orang tua, data sekolah asal serta mengupload berkas yang dibutuhkan pada menu pendaftaran</li>
        <li>5. Setelah data diri di verifikasi oleh Panitia, maka calon siswa diperbolehkan mengikuti ujian seleksi masuk</li>
        <li>6. Panitia pendaftaran akan melakukan validasi dan verifikasi nilai ujian calon siswa</li>
        <li>7. Calon siswa melakukan pengecekan status pendaftaran secara berkala di menu <strong>RIWAYAT PENDAFTARAN</strong></li>
    </ul>
@endsection
