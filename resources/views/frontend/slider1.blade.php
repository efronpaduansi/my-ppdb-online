@extends('layouts.frontend.master')
@section('slider')
<div class="slider1-area overlay-default">
    <div class="bend niceties preview-1">
        <div id="ensign-nivoslider-3" class="slides" style="max-height: 550px; object-fit: cover;">
            <img src="{{asset('frontend/img/slider/4.jpg')}}" alt="slider" title="#slider-direction-1" style="max-height: 550px; object-fit: cover;" />
            <img src="{{asset('frontend/img/slider/2.jpg')}}" alt="slider" title="#slider-direction-2" style="max-height: 550px; object-fit: cover;"  />
        </div>
        <div id="slider-direction-1" class="t-cn slider-direction">
            <div class="slider-content s-tb slide-1">
                <div class="title-container s-tb-c">
                    <div class="title1">SIAP PPDB ONLINE</div>
                    <p>Sukseskan PPDB Online bersama IFiber.</p>
                    <div class="slider-btn-area">
                        <a href="{{ route('auth.login') }}" class="default-big-btn">Daftar</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="slider-direction-2" class="t-cn slider-direction">
            <div class="slider-content s-tb slide-2">
                <div class="title-container s-tb-c">
                    <div class="title1">Penawaran terbaik untukmu</div>
                    <p>Sukseskan PPDB Online bersama IFiber.</p>
                    <div class="slider-btn-area">
                        <a href="{{ route('auth.login') }}" class="default-big-btn">Daftar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="service1-area">
    <div class="service1-inner-area">
        <div class="container">
            <div class="row service1-wrapper">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 service-box1">
                    <div class="service-box-content">
                        <h3><a href="#">Beasiswa</a></h3>
                        <p>Beasiswa untuk murid berprestasi, Akademin atau Non-Akademik.</p>
                    </div>
                    <div class="service-box-icon">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 service-box1">
                    <div class="service-box-content">
                        <h3><a href="#">Pengajar Terampil</a></h3>
                        <p>Guru yang terampil di bidangnya, berpengalaman dan teruji.</p>
                    </div>
                    <div class="service-box-icon">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 service-box1">
                    <div class="service-box-content">
                        <h3><a href="#">Perpustakaan</a></h3>
                        <p>Fasilitas perpustakaan untuk menunjang murid dalam belajar.</p>
                    </div>
                    <div class="service-box-icon">
                        <i class="fa fa-book" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection