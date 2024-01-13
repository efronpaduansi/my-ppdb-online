<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PPDBController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Guest\UjianController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\WebsiteController;
use App\Http\Controllers\Admin\BankSoalController;
use App\Http\Controllers\Admin\DataSiswaController;
use App\Http\Controllers\Admin\HasilUjianController;
use App\Http\Controllers\Siswa\PembayaranController;
use App\Http\Controllers\Guest\PendaftaranController;
use App\Http\Controllers\Admin\DataPendaftaranController;
use App\Http\Controllers\Siswa\ProfileController as ProfileSiswaController;


Route::get('/', [PPDBController::class, 'index'])->name('ppdb.index');
Route::get('/program-studi', [PPDBController::class, 'programStudi'])->name('ppdb.program.studi');
Route::get('/program-studi/{slug}', [PPDBController::class, 'programStudiShow'])->name('ppdb.program.studi.show');
Route::get('/alur-pendaftaran', [PPDBController::class, 'alurPendaftaran'])->name('ppdb.alur.pendaftaran');
Route::get('/pengumuman', [PPDBController::class, 'pengumuman'])->name('ppdb.pengumuman');
// End for frontend branch

Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'doLogin'])->name('auth.dologin');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'doRegister'])->name('auth.doregister');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Route prefix for admin
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('admin.index');

    Route::get('/users', [UserController::class, 'index'])->name('admin.user.index');
    Route::post('/users/email', [UserController::class, 'changeEmail'])->name('admin.user.changeEmail');
    Route::post('/users/password', [UserController::class, 'changePassword'])->name('admin.user.changePassword');
  
    // Jurusan Routes
    Route::get('/jurusan', [JurusanController::class, 'index'])->name('admin.jurusan.index');
    Route::post('/jurusan', [JurusanController::class, 'store'])->name('admin.jurusan.store');
    Route::get('/edit-jurusan/{id}', [JurusanController::class, 'edit'])->name('admin.jurusan.edit');
    Route::put('/jurusan/{id}', [JurusanController::class, 'update'])->name('admin.jurusan.update');
    Route::delete('/jurusan/{id}', [JurusanController::class, 'destroy'])->name('admin.jurusan.destroy');

    // Pendaftaran Routes
    Route::get('/data-pendaftaran', [DataPendaftaranController::class, 'index'])->name('admin.pendaftaran.index');
    Route::get('/detail-pendaftaran/{user_id}', [DataPendaftaranController::class, 'show'])->name('admin.pendaftaran.show');
    Route::put('/verifikasi-data-pendaftaran/{id}', [DataPendaftaranController::class, 'terverifikasi'])->name('admin.pendaftaran.terverifikasi');
    Route::put('/reject-data-pendaftaran/{id}', [DataPendaftaranController::class, 'verifikasi'])->name('admin.pendaftaran.verifikasi');
    Route::put('/accept-data-pendaftaran/{id}', [DataPendaftaranController::class, 'doaccepted'])->name('admin.pendaftaran.accepted');
    Route::put('/doreject-data-pendaftaran/{id}', [DataPendaftaranController::class, 'dorejected'])->name('admin.pendaftaran.dorejected');
    Route::delete('/data-pendaftaran/{id}', [DataPendaftaranController::class, 'destroy'])->name('admin.pendaftaran.destroy');

    //Bank Soal
    Route::get('bank-soal', [BankSoalController::class, 'index'])->name('admin.bank-soal');
    Route::get('bank-soal/format-excel', [BankSoalController::class, 'downloadFormatExcel'])->name('admin.bank-soal.downloadFormatExcel');
    Route::post('bank-soal', [BankSoalController::class, 'store'])->name('admin.bank-soal.store');
    Route::post('bank-soal/import-from-excel', [BankSoalController::class, 'importExcel'])->name('admin.bank-soal.importExcel');
    Route::get('bank-soal/{id}', [BankSoalController::class, 'edit'])->name('admin.bank-soal.edit');
    Route::put('bank-soal/{id}', [BankSoalController::class, 'update'])->name('admin.bank-soal.update');
    Route::delete('bank-soal/{id}', [BankSoalController::class, 'destroy'])->name('admin.bank-soal.destroy');
    

    //Hasil Ujian
    Route::get('ujian', [HasilUjianController::class, 'index'])->name('admin.ujian');
    Route::get('ujian/{id}', [HasilUjianController::class, 'show'])->name('admin.ujian.show');
    

    // Data Siswa Routes
    Route::get('/data-siswa', [DataSiswaController::class, 'index'])->name('admin.siswa.index');
    Route::get('/data-siswa/export-excel', [DataSiswaController::class, 'exportExcel'])->name('admin.siswa.exportExcel');
    Route::get('/data-siswa/export-pdf', [DataSiswaController::class, 'exportPDF'])->name('admin.siswa.exportPDF');
    Route::get('/show-data-siswa/{id}', [DataSiswaController::class, 'show'])->name('admin.siswa.show');
    Route::delete('data-siswa/{id}', [DataSiswaController::class, 'destroy'])->name('admin.siswa.destroy');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile.index');
    Route::post('/profile', [ProfileController::class, 'changeEmail'])->name('admin.profile.changeEmail');
    Route::post('/profile/change-pass', [ProfileController::class, 'changePassword'])->name('admin.profile.changePassword');
    
    // Website Setting
    Route::get('/web-setting', [WebsiteController::class, 'index'])->name('website.setting.index');
    Route::post('/web-setting-company', [WebsiteController::class, 'company'])->name('website.setting.company');
    Route::put('/web-setting-update/{id}', [WebsiteController::class, 'update'])->name('website.setting.update');
    Route::post('web-setting-sliders', [WebsiteController::class, 'sliders'])->name('website.setting.sliders');
    Route::put('web-setting-sliders/{id}', [WebsiteController::class, 'sliderDisable'])->name('website.sliders.disable');
    Route::delete('web-setting-sliders/{id}', [WebsiteController::class, 'sliderDestroy'])->name('website.sliders.destroy');
    
    //Gallery
    Route::post('web-setting/gallery', [GalleryController::class, 'store'])->name('website.gallery.store');
    Route::get('web-setting/gallery/{id}', [GalleryController::class, 'destroy'])->name('website.gallery.destroy');
});
// Route prefix for guest
Route::prefix('guest')->middleware(['auth', 'role:guest'])->group(function () {
    Route::get('/home', [HomeController::class, 'guest'])->name('guest.index');

    Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('guest.pendaftaran.index');
    Route::post('/pendaftaran', [PendaftaranController::class, 'storeIndex'])->name('guest.pendaftaran.index');

    Route::get('/pendaftaran/data-orangtua', [PendaftaranController::class, 'dataOrangTua'])->name('guest.pendaftaran.data-orangtua');
    Route::post('/pendaftaran/data-orangtua', [PendaftaranController::class, 'storeDataOrangTua'])->name('guest.pendaftaran.data-orangtua');

    Route::get('/pendaftaran/data-sekolah', [PendaftaranController::class, 'dataSekolah'])->name('guest.pendaftaran.data-sekolah');
    Route::post('/pendaftaran/data-sekolah', [PendaftaranController::class, 'storeDataSekolah'])->name('guest.pendaftaran.data-sekolah');

    Route::get('/pendaftaran/berkas', [PendaftaranController::class, 'berkas'])->name('guest.pendaftaran.berkas');
    Route::post('/pendaftaran/berkas', [PendaftaranController::class, 'storeBerkas'])->name('guest.pendaftaran.berkas');

    Route::get('/pendaftaran/riwayat', [PendaftaranController::class, 'riwayatPendaftaran'])->name('guest.pendaftaran.riwayat');
    Route::get('/ujian', [UjianController::class, 'index'])->name('guest.ujian.index');
    Route::post('/ujian', [UjianController::class, 'store'])->name('guest.ujian.store');
});

// Route prefix for siswa
Route::prefix('siswa')->middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/home', [HomeController::class, 'siswa'])->name('siswa.index');
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::get('/profile', [ProfileSiswaController::class, 'index'])->name('siswa.profile.index');
    Route::post('/profile/change-pass', [ProfileSiswaController::class, 'changePassword'])->name('siswa.profile.change-pass');
    Route::post('/profile/change-photo', [ProfileSiswaController::class, 'changeProfileImage'])->name('siswa.profile.change-photo');
});

//Route for all users
Route::get('/informasi', [InformasiController::class, 'index'])->name('informasi.index');
Route::get('/new-informasi', [InformasiController::class, 'create'])->name('informasi.create');
Route::post('/informasi', [InformasiController::class, 'store'])->name('informasi.store');