@extends('layouts.backend.app')

@section('title', 'Bank Soal')

@section('page-title', 'Bank Soal')

@section('content')
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Bank Soal</div>
            <div class="ibox-title ml-auto">
                <button class="btn btn-primary rounded" data-toggle="modal" data-target="#soalModal"><i
                        class="bi bi-plus-circle"></i> Tambah Soal</button>
            </div>
        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover table-responsive" id="example-table" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th>Aksi</th>
                        <th>No. Soal</th>
                        <th>Pertanyaan</th>
                        <th>Pilihan A</th>
                        <th>Pilihan B</th>
                        <th>Pilihan C</th>
                        <th>Pilihan D</th>
                        <th>Jawaban</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bankSoal as $soal)
                        <tr>
                            <td>
                                <a href="{{ route('admin.bank-soal.edit', $soal->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('admin.bank-soal.destroy', $soal->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus data ini?')"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                            <td>{{ $soal->number }}</td>
                            <td>{{ $soal->question }}</td>
                            <td>{{ $soal->option_a }}</td>
                            <td>{{ $soal->option_b }}</td>
                            <td>{{ $soal->option_c }}</td>
                            <td>{{ $soal->option_d }}</td>
                            <td>{{ $soal->answer }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Soal Modal --}}
    <div class="modal fade" id="soalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Soal Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.bank-soal.store') }}" method="POST" id="myForm">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="number">No. Soal</label>
                            <input type="text" name="number" id="number" class="form-control" value="{{ $soalNumber }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="question">Pertanyaan <small class="text-danger">*</small></label>
                            <input type="text" name="question" id="question" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="option_a">Pilihan A <small class="text-danger">*</small></label>
                            <input type="text" name="option_a" id="option_a" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="option_b">Pilihan B <small class="text-danger">*</small></label>
                            <input type="text" name="option_b" id="option_b" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="option_c">Pilihan C <small class="text-danger">*</small></label>
                            <input type="text" name="option_c" id="option_c" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="option_d">Pilihan D <small class="text-danger">*</small></label>
                            <input type="text" name="option_d" id="option_d" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="answer">Jawaban <small class="text-danger">*</small></label>
                            <select name="answer" id="answer" class="form-control" required>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
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
