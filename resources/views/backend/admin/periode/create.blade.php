@extends('layouts.backend.app')

@section('title', 'Periode Baru')

@section('page-title', 'Periode Baru')

@section('content')
<div class="ibox">
    <div class="ibox-body">
        <form action="{{ route('admin.periode.store') }}" method="POST" class="needs-validation" novalidate>
            @csrf
            <div class="form-group">
                <label for="nama_periode">Nama Periode</label>
                <input type="text" class="form-control" id="nama_periode" name="nama_periode" placeholder="Cth: PPDB Gelombang I" required>
                    <div class="invalid-feedback">
                        Field wajib di isi!
                    </div>
              </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="tanggal_mulai">Tanggal Mulai</label>
                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                <div class="invalid-feedback">
                    Field wajib di isi!
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="tanggal_selesai">Tanggal Selesai</label>
                <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required>
                <div class="invalid-feedback">
                    Field wajib di isi!
                </div>
              </div>
            </div>
            <div class="form-group">
                <label for="ket">Keterangan</label>
                <textarea class="form-control" name="ket" id="ket" cols="30" rows="4" required></textarea>
                <div class="invalid-feedback">
                    Field wajib di isi!
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
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
<div class="alert alert-warning" role="alert">
  <h4 class="alert-heading">Perhatian!</h4>
  <p>Menjadwalkan periode baru akan menutup peride yang sedang berjalan saat ini.</p>

</div>
@endsection

@section('modal')

@endsection