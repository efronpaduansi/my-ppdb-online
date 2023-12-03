@extends('layouts.backend.app')

@section('title', 'Edit Soal')

@section('page-title', 'Edit Soal')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">
       <div class="ibox">
            <div class="ibox-body">
                <form action="{{ route('admin.bank-soal.update', $soal->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="number" class="col-sm-2 col-form-label">No. Soal</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="number" name="number" value="{{ $soal->number }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="question" class="col-sm-2 col-form-label">Pertanyaan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="question" name="question" value="{{ $soal->question }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="option_a" class="col-sm-2 col-form-label">Pilihan A</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="option_a" name="option_a" value="{{ $soal->option_a }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="option_b" class="col-sm-2 col-form-label">Pilihan B</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="option_b" name="option_b" value="{{ $soal->option_b }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="option_c" class="col-sm-2 col-form-label">Pilihan C</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="option_c" name="option_c" value="{{ $soal->option_c }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="option_d" class="col-sm-2 col-form-label">Pilihan D</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="option_d" name="option_d" value="{{ $soal->option_d }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="answer" class="col-sm-2 col-form-label">Jawaban</label>
                        <div class="col-sm-10">
                            <select name="answer" id="answer" class="form-control">
                                <option value="" disabled selected hidden>{{ $soal->answer }}</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <a href="{{ route('admin.jurusan.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                      </div>
                    </div>
                  </form>
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