<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="{{ asset('backend/img/admin-avatar.png') }}" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong">{{ Auth()->user()->name }}</div><small>{{ Auth()->user()->role }}</small>
            </div>
        </div>
        <ul class="side-menu metismenu">
            {{-- Menu for Admin --}}
            @if (Auth::user()->role === 'admin')
                <li class="{{ request()->is('admin/home') ? 'active' : '' }}">
                    <a href="{{ route('admin.index') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                        <span class="nav-label">Dashboard</span>
                    </a>
                </li>
                <li
                    class="{{ request()->is('admin/jurusan') || request()->is('admin/edit-jurusan/') || request()->is('admin/periode') || request()->is('admin/periode/create') ? 'active' : '' }}">
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-cogs"></i>
                        <span class="nav-label">Master</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="{{ route('admin.jurusan.index') }}"
                                class="{{ request()->is('admin/jurusan') ? 'active' : '' }}">Jurusan</a>
                        </li>
                    </ul>
                </li>
                <li
                    class="{{ request()->is('admin/data-pendaftaran') || request()->is('admin/detail-pendaftaran') ? 'active' : '' }}">
                    <a href="{{ route('admin.pendaftaran.index') }}"><i class="sidebar-item-icon fa fa-users"></i>
                        <span class="nav-label">Data Pendaftaran</span>
                    </a>
                </li>
                <li class="{{ request()->is('admin/bank-soal') ? 'active' : '' }}">
                    <a href="{{ route('admin.bank-soal') }}"><i class="sidebar-item-icon bi bi-bank"></i>
                        <span class="nav-label">Bank Soal</span>
                    </a>
                </li>
                {{-- <li class="{{ request()->is('admin/ujian') ? 'active' : '' }}">
                    <a href="{{ route('admin.ujian') }}"><i class="sidebar-item-icon bi bi-pen fill"></i>
                        <span class="nav-label">Hasil Seleksi</span>
                    </a>
                </li> --}}
                <li class="{{ request()->is('admin/data-siswa') ? 'active' : '' }}">
                    <a href="{{ route('admin.siswa.index') }}"><i class="sidebar-item-icon bi bi-mortarboard-fill"></i>
                        <span class="nav-label">Data Siswa</span>
                    </a>
                </li>
                <li
                    class="{{ request()->is('admin/staff') || request()->is('informasi') || request()->is('new-informasi') || request()->is('admin/profile') || request()->is('admin/web-setting') ? 'active' : '' }}">
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-cog"></i>
                        <span class="nav-label">Setup</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="{{ route('informasi.index') }}"
                                class="{{ request()->is('informasi') || request()->is('new-informasi') ? 'active' : '' }}">Informasi</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.profile.index') }}"
                                class="{{ request()->is('admin/profile') ? 'active' : '' }}">Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('website.setting.index') }}"
                                class="{{ request()->is('admin/web-setting') ? 'active' : '' }}">Website</a>
                        </li>
                    </ul>
                </li>

                {{-- Menu for Guest --}}
            @elseif(Auth::user()->role == 'guest')
                <li class="{{ request()->is('guest/home') ? 'active' : '' }}">
                    <a href="{{ route('guest.index') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                        <span class="nav-label">Dashboard</span>
                    </a>
                </li>
                <li
                    class="{{ request()->is('guest/pendaftaran') || request()->is('guest/pendaftaran/data-orangtua') || request()->is('guest/pendaftaran/data-sekolah') || request()->is('guest/pendaftaran/berkas') ? 'active' : '' }}">
                    <a href="{{ route('guest.pendaftaran.index') }}"><i class="sidebar-item-icon fa fa-calendar"></i>
                        <span class="nav-label">Pendaftaran</span>
                    </a>
                </li>
                <li class="{{ request()->is('guest/pendaftaran/riwayat') ? 'active' : '' }}">
                    <a href="{{ route('guest.pendaftaran.riwayat') }}"><i class="sidebar-item-icon fa fa-history"></i>
                        <span class="nav-label">Riwayat Pendaftaran</span>
                    </a>
                </li>
                @php
                    $userId = auth()->user()->id;
                    $getDataDiri = App\Models\DataDiri::where('user_id', $userId)
                                ->where('status_id', '!=', 1)   
                                ->first();
                @endphp
                @if ($getDataDiri)
                    <li class="{{ request()->is('guest/ujian') ? 'active' : '' }}">
                        <a href="{{ route('guest.ujian.index') }}"><i class="sidebar-item-icon fa fa-edit"></i>
                            <span class="nav-label">Ujian</span>
                        </a>
                    </li>
                @endif
                <li class="{{ request()->is('informasi') ? 'active' : '' }}">
                    <a href="{{ route('informasi.index') }}"><i class="sidebar-item-icon bi bi-megaphone"></i>
                        <span class="nav-label">Informasi</span>
                    </a>
                </li>
                {{-- Menu for siswa --}}
            @elseif(Auth::user()->role == 'siswa')
                <li class="{{ request()->is('siswa/home') ? 'active' : '' }}">
                    <a href="{{ route('siswa.index') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                        <span class="nav-label">Dashboard</span>
                    </a>
                </li>
                <li class="{{ request()->is('informasi') ? 'active' : '' }}">
                    <a href="{{ route('informasi.index') }}"><i class="sidebar-item-icon bi bi-megaphone"></i>
                        <span class="nav-label">Informasi</span>
                    </a>
                </li>
                <li class="{{ request()->is('siswa/profile') ? 'active' : '' }}">
                    <a href="{{ route('siswa.profile.index') }}"><i class="sidebar-item-icon bi bi-person"></i>
                        <span class="nav-label">Informasi Akun</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>
