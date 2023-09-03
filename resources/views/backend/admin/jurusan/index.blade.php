@extends('layouts.backend.app')

@section('title', 'Jurusan')

@section('page-title', 'Jurusan')

@section('content')
<div class="ibox">
    <div class="ibox-head">
        <div class="ibox-title">Data Jurusan</div>
        <div class="ibox-title ml-auto">
            <button class="btn btn-primary rounded" data-toggle="modal" data-target="#jurusanModal"><i class="bi bi-plus-circle"></i> Tambah Jurusan</button>
        </div>
    </div>
    <div class="ibox-body">
        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Aksi</th>
                    <th>Thumbnail</th>
                    <th>Kode Jurusan</th>
                    <th>Nama Jurusan</th>
                    <th>Singkatan</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jurusans as $jurusan)
                <tr>
                    <td>
                        <a href="{{ route('admin.jurusan.edit', $jurusan->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('admin.jurusan.destroy', $jurusan->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus data ini?')"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                    <td><img src="{{ asset('uploads/img/' . $jurusan->thumbnail) }}" alt="thumbnail" height="75"></td>
                    <td>{{ $jurusan->kode_jurusan }}</td>
                    <td>{{ $jurusan->nama_jurusan }}</td>
                    <td>{{ $jurusan->singkatan }}</td>
                    <td>{{ $jurusan->deskripsi }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="jurusanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Jurusan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.jurusan.store') }}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                @csrf
                @method('POST')
                {{-- Since update 03/03/2023 --}}
                <div class="form-group">
                    <label for="thumbnail">Thumbnail <small class="text-danger">*</small></label>
                    <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail" id="thumbnail" required>
                    @error('thumbnail')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_jurusan">Nama Jurusan <small class="text-danger">*</small></label>
                    <input type="text" name="nama_jurusan" id="nama_jurusan" class="form-control" required>
                    <div class="invalid-feedback">
                        Baris ini wajib di isi.
                    </div>
                </div>
                <div class="form-group">
                    <label for="singkatan">Singkatan <small class="text-danger">*</small></label>
                    <input type="text" name="singkatan" id="singkatan" class="form-control" required>
                    <div class="invalid-feedback">
                        Baris ini wajib di isi.
                    </div>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi <small class="text-danger">*</small></label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
                    <div class="invalid-feedback">
                        Baris ini wajib di isi.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
    </script>

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

@section('modal')

@endsection