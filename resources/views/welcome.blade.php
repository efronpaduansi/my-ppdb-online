@extends('layouts.frontend.master')
@section('title')
    Penerimaan Peserta Didik Baru
@endsection
@section('content')
    @section('slider')
        @include('frontend.slider')
    @endsection

    @section('studi')
        @include('frontend.studi')
    @endsection

    @section('count')
        @include('frontend.count')
    @endsection

    @section('why')
        @include('frontend.why')
    @endsection

    @section('video')
        @include('frontend.video')
    @endsection
@endsection
