{{-- Change on frontend branch --}}
@extends('layouts.frontend.master')

<style>
    #pengumuman{
        margin-top: 8em;
    }
</style>

@section('title')
    Pengumuman
@endsection

@section('studi')
   <div class="container" id="pengumuman">
        <div class="row">
            @if ($informasi->isEmpty())
                <div class="container d-flex justify-content-center">
                    <img src="{{ asset('frontend/img/empty.svg') }}" alt="404">
                </div>
            @else
                <div class="container">
                    <div class="row">
                        @foreach ($informasi as $info)    
                            <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center mb-3">
                                <div class="card text-center" style="width: 38rem;">
                                    <img src="{{ asset('uploads/'. $info->gambar) }}" class="card-img-top" alt="Informasi">
                                    <div class="card-body">
                                        <h3 class="card-title">{{ $info->judul }}</h3>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a href="{{ $info->slug }}" class="btn btn-primary mb-4">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>        
   </div>
@endsection

