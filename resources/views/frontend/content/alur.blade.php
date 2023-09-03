{{-- Change on frontend branch --}}
@extends('layouts.frontend.master')

<style>
    #alur{
        margin-top: 8em;
    }
</style>

@section('title')
    Alur Pendaftaran
@endsection

@section('studi')
   <div class="container d-block justify-content-center" id="alur">
    <h2 class="text-center mb-3">Alur Pendaftaran</h2>
        <img src="{{ asset('frontend/img/alur-pendaftaran.png') }}" alt="">
   </div>
@endsection

