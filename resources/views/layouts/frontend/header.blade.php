<header>
    <div id="header1" class="header1-area">
        <div class="main-menu-area bg-primary" id="sticker">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-3">
                        <div class="logo-area">
                             {{-- <a href="{{ route('ppdb.index') }}"><img class="img-responsive" src="{{ asset('uploads/frontend/'. $web->logo) }}" alt="logo"></a> --}}
                             <a href="{{ route('ppdb.index') }}" style="font-size: 20px; color:white;">PPDB ONLINE</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-9">
                        <nav id="desktop-nav">
                            <ul>
                                <li><a href="{{ route('ppdb.program.studi') }}" class="{{ (request()->is('program-studi')) ? 'active' : '' }}">Jurusan</a></li>
                                <li><a href="{{ route('ppdb.alur.pendaftaran') }}" class="{{ (request()->is('alur-pendaftaran')) ? 'active' : '' }}">Alur Pendaftaran</a></li>
                                <li><a href="{{ route('ppdb.pengumuman') }}" class="{{ (request()->is('pengumuman')) ? 'active' : '' }}">Pengumuman</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-4 col-md-4 hidden-sm">
                        <div class="apply-btn-area">
                            @auth
                                @if (Auth::user()->role == 'admin')
                                    <a href="{{route('admin.index')}}" class="apply-now-btn3">Home</a>
                                @elseif (Auth::user()->role == 'siswa')
                                    <a href="{{route('siswa.index')}}" class="apply-now-btn3">Home</a>
                                @elseif (Auth::user()->role == 'guest')
                                    <a href="{{route('guest.index')}}" class="apply-now-btn3">Home</a>
                                @endif
                            @else
                                <a href="{{ route('auth.login') }}" class="apply-now-btn3">Login</a>
                                <a href="{{ route('auth.register') }}" class="apply-now-btn">Daftar</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area Start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul>
                                <li>
                                    <a href="{{ route('ppdb.program.studi') }}" class="{{ (request()->is('program-studi')) ? 'active' : '' }}">Jurusan</a>
                                </li>
                                <li>
                                    <a href="{{ route('ppdb.alur.pendaftaran') }}" class="{{ (request()->is('alur-pendaftaran')) ? 'active' : '' }}">Alur Pendaftaran</a>
                                </li>
                                <li>
                                    <a href="{{ route('ppdb.pengumuman') }}" class="{{ (request()->is('pengumuman')) ? 'active' : '' }}">Pengumuman</a>
                                    <div class="col-lg-4 col-md-4 hidden-sm">
                                        <div class="apply-btn-area">
                                            @auth
                                                @if (Auth::user()->role == 'admin')
                                                    <a href="{{route('admin.index')}}" class="apply-now-btn3">Home</a>
                                                @elseif (Auth::user()->role == 'siswa')
                                                    <a href="{{route('siswa.index')}}" class="apply-now-btn3">Home</a>
                                                @elseif (Auth::user()->role == 'guest')
                                                    <a href="{{route('guest.index')}}" class="apply-now-btn3">Home</a>
                                                @endif
                                            @else
                                                <a href="{{ route('auth.login') }}" class="apply-now-btn3">Login</a>
                                                <a href="{{ route('auth.register') }}" class="apply-now-btn">Daftar</a>
                                            @endauth
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area End -->
</header>