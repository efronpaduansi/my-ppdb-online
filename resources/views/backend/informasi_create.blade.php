@extends('layouts.backend.app')

@section('title', 'Informasi')

@section('page-title', 'Informasi')

@section('content')
<div class="ibox">
    <div class="ibox-head">
        <div class="ibox-title">Create New Information</div>
        <div class="ibox-tools">
            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
        </div>
    </div>
    <div class="ibox-body">
        <form action="{{ route('informasi.store') }}" method="POST" id="form-informasi" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="penulis" value="{{ Auth::user()->id }}">
            <div class="form-group row">
                <label for="judul" class="col-sm-2 col-form-label">Judul <small class="text-danger">*</small></label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="judul" name="judul" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="gambar" class="col-sm-2 col-form-label">Thumbnail <small class="text-danger">*</small></label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" id="gambar" name="gambar">
                </div>
            </div>
            <div class="form-group row">
                <label for="kategori" class="col-sm-2 col-form-label">Kategori <small class="text-danger">*</small></label>
                <div class="col-sm-10">
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="Informasi PPDB">Informasi PPDB</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="status" class="col-sm-2 col-form-label">Status <small class="text-danger">*</small></label>
                <div class="col-sm-10">
                    <select name="status" id="status" class="form-control" required>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="summernote" class="col-sm-2 col-form-label">Isi <small class="text-danger">*</small></label>
                <div class="col-sm-10">
                    <textarea name="isi" id="summernote" data-plugin="summernote" data-air-mode="true" cols="30" rows="4" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $('#form-informasi').validate({
            errorClass: "help-block",
            rules: {
                judul: {
                    required: true,
                },
                gambar: {
                    required: true,
                },
                kategori: {
                    required: true
                },
                status: {
                    required: true, 
                },
                isi: {
                    required: true,
                },

            },
            highlight: function(e) {
                $(e).closest(".form-group").addClass("has-error")
            },
            unhighlight: function(e) {
                $(e).closest(".form-group").removeClass("has-error")
            },
        });
    });
</script>
@endsection