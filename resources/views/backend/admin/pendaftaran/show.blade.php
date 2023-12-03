@extends('layouts.backend.app')

@section('title', 'Detail Pendaftaran')

@section('page-title', 'Detail Pendaftaran')

@section('content')
    <div class="ibox">
        <div class="ibox-body">
            <table class="table table-bordered">
                <tr class="bg-secondary">
                    <th>DATA DIRI PENDAFTAR</th>
                    <td class="bg-secondary"></td>
                </tr>
                <tr>
                    <th>No Pendaftaran</th>
                    <td class="text-left">{{ $pendaftaran->no_pendaftaran }}</td>
                </tr>
                <tr>
                    <th>Nama Lengkap</th>
                    <td class="text-left">{{ $pendaftaran->nama_lengkap }}</td>
                </tr>
                <tr>
                    <th>NISN</th>
                    <td class="text-left">{{ $pendaftaran->nisn }}</td>
                <tr>
                <tr>
                    <th>NIK</th>
                    <td class="text-left">{{ $pendaftaran->nik }}</td>
                </tr>
                <th>Tempat, Tanggal Lahir</th>
                <td class="text-left">
                    {{ $pendaftaran->tempat_lahir }}, {{ $pendaftaran->tanggal_lahir }}
                </td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td class="text-left">{{ $pendaftaran->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <th>Agama</th>
                    <td class="text-left">{{ $pendaftaran->agama }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td class="text-left">{{ $pendaftaran->alamat }}</td>
                </tr>
                <tr>
                    <th>No. HP</th>
                    <td class="text-left">{{ $pendaftaran->no_hp }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td class="text-left">{{ $pendaftaran->email }}</td>
                </tr>
                <tr class="bg-secondary">
                    <th>DATA ORANGTUA/WALI</th>
                    <td class="bg-secondary"></td>
                </tr>
                <tr>
                    <th>Nama Ayah</th>
                    <td class="text-left">{{ $dataOrangTua->nama_ayah }}</td>
                </tr>
                <tr>
                    <th>Nama Ibu</th>
                    <td class="text-left">{{ $dataOrangTua->nama_ibu }}</td>
                </tr>
                <tr>
                    <th>Pekerjaan Ayah</th>
                    <td class="text-left">{{ $dataOrangTua->pekerjaan_ayah }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td class="text-left">{{ $dataOrangTua->alamat }}</td>
                </tr>
                <tr>
                    <th>No. HP</th>
                    <td class="text-left">{{ $dataOrangTua->no_hp }}</td>
                </tr>
                <tr class="bg-secondary">
                    <th>DATA SEKOLAH ASAL</th>
                    <td class="bg-secondary"></td>
                </tr>
                <tr>
                    <th>Nama Sekolah Asal</th>
                    <td class="text-left">{{ $dataSekolah->nama_sekolah }}</td>
                </tr>
                <tr>
                    <th>Tahun Lulus</th>
                    <td class="text-left">{{ $dataSekolah->tahun_lulus }}</td>
                </tr>
                <tr>
                    <th>No. Ijazah</th>
                    <td class="text-left">{{ $dataSekolah->no_ijazah }}</td>
                </tr>
                <tr class="bg-secondary">
                    <th>BERKAS</th>
                    <td class="bg-secondary"></td>
                </tr>
                <tr>
                    <th>Pas Foto</th>
                    <td class="text-left">
                        <a href="" data-toggle="modal" data-target="#fotoModal{{ $berkas->id }}">{{ $berkas->foto }}</a>
                        {{-- Foto Modal --}}
                        <div class="modal fade" id="fotoModal{{ $berkas->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Pas Foto</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <img src="{{ asset('uploads/berkas/foto/' . $berkas->foto) }}" alt="Pas Foto">
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        {{-- End Foto Modal --}}
                    </td>
                </tr>
                <tr>
                    <th>Foto Copy Ijazah</th>
                    <td>
                        <a href="{{ url('uploads/berkas/ijazah/' . $berkas->ijazah) }}" target="_blank">Lihat</a>
                    </td>
                </tr>
                <tr>
                    <th>Foto Copy SKHUN</th>
                    <td>
                        <a href="{{ url('uploads/berkas/skhun/' . $berkas->skhun) }}" target="_blank">Lihat</a>
                    </td>
                </tr>
                <tr>
                    <th>Foto Copy Kartu Keluarga</th>
                    <td>
                        <a href="{{ url('uploads/berkas/kk/' . $berkas->kartu_keluarga) }}" target="_blank">Lihat</a>
                    </td>
                </tr>
                <tr>
                    <th>Foto Copy Akta Kelahiran</th>
                    <td>
                        <a href="{{ url('uploads/berkas/akta/' . $berkas->akta_lahir) }}" target="_blank">Lihat</a>
                    </td>
                </tr>
                <tr>
                    <th>Status Pendaftaran</th>
                    <td class="text-left">
                        @if ($pendaftaran->status_id == 1)
                            <span class="badge badge-warning">
                                {{ $pendaftaran->status_pendaftaran->status }}
                            </span>
                        @elseif ($pendaftaran->status_id == 2)
                            <span class="badge badge-success">
                                {{ $pendaftaran->status_pendaftaran->status }}
                            </span>
                        @elseif ($pendaftaran->status_id == 3)
                            <span class="badge badge-danger">
                                {{ $pendaftaran->status_pendaftaran->status }}
                            </span>
                        @endif
                    </td>
                </tr>
                </table>
                <div class="action-btn d-flex justify-content-center my-4">
                    <a href="{{ route('admin.pendaftaran.index') }}" class="btn btn-primary">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                    @if ($pendaftaran->status_id == 1)
                        {{-- Button Accepted Modal --}}
                        <button type="button" class="btn btn-success ml-2" data-toggle="modal" data-target="#acceptedModal{{ $pendaftaran->id }}">
                            <i class="fa fa-check"></i> Terima
                        </button>
                        {{-- Accepted Modal --}}
                        <div class="modal fade" id="acceptedModal{{ $pendaftaran->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header bg-success text-white">
                                  <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-check-circle-fill"></i> Konfirmasi</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah anda yakin menerima <span class="font-weight-bold">{{ $pendaftaran->nama_lengkap }}</span> dengan nomor pendaftaran <span class="font-weight-bold">{{ $pendaftaran->no_pendaftaran }}</span> ?</p>
                                    <form action="{{ route('admin.pendaftaran.accepted', $pendaftaran->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status_id" value="2">
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-success">Yakin</button>
                                        </div>
                                    </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        {{-- End Accepted Modal --}}
                        {{-- Button Rejected Modal --}}
                        <button type="submit" class="btn btn-danger ml-2" data-toggle="modal" data-target="#rejectedModal{{ $pendaftaran->id }}">
                            <i class="fa fa-times"></i> Tolak
                        </button>
                        {{-- Rejected Modal --}}
                        <div class="modal fade" id="rejectedModal{{ $pendaftaran->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header bg-danger text-white">
                                  <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-check-circle-fill"></i> Konfirmasi</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah anda yakin menolak <span class="font-weight-bold">{{ $pendaftaran->nama_lengkap }}</span> dengan nomor pendaftaran <span class="font-weight-bold">{{ $pendaftaran->no_pendaftaran }}</span> ?</p>
                                    <form action="{{ route('admin.pendaftaran.rejected', $pendaftaran->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status_id" value="3">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Yakin</button>
                                        </div>
                                    </form>
                                </div>
                                
                              </div>
                            </div>
                          </div>
                        {{-- End Rejected Modal --}}
                       {{-- End Updates --}}
                    @endif
                </div>
        </div>
    </div>

    {{-- tampil pesan --}}
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <div class="alert-body">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        </div> 
    @elseif ($message = Session::get('error'))
        <div class="alert alert-danger" role="alert">
            <div class="alert-body">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        </div>
    @endif
@endsection