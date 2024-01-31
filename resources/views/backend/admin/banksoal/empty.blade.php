@extends('layouts.backend.app')

@section('title', 'Bank Soal')

@section('page-title', 'Bank Soal')

@section('content')
    <div class="ibox">
        <div class="ibox-body text-center">
            <p>Tekan tombol untuk mulai membuat soal!</h5> <br> <br>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createSoalModal">Buat Soal</button>
        </div>
    </div>

    {{-- Create Soal Modal --}}
    <div class="modal fade" id="createSoalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Buat Soal</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('admin.bank-soal') }}" method="get">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="jurusan_id" class="form-label">Pilih Jurusan</label>
                        <select name="jurusan_id" id="jurusan_id" class="form-control" required>
                            @foreach ($jurusan as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_jurusan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary">Lanjut</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    {{-- End Soal Modal --}}
@endsection
