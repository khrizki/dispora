@php
    $route = [
        'landing.search',
        'landing.artikel',
        'landing.download',
        'landing.konsultasi',
        'landing.pengaduan',
        'landing.pengaduan.masyarakat',
        'profil.*',
    ];
@endphp
<div class="info-banner">
    @if (isset($pengumuman))
        <marquee behavior="scroll" direction="left" scrollamount="5">
            🔴 Sedang berlangsung: {{ $pengumuman->judul_pengumuman }}
            | Lokasi: {{ $pengumuman->isi_pengumuman }}
            | Waktu: {{ \Carbon\Carbon::parse($pengumuman->jam)->format('H.i') }} -
            {{ \Carbon\Carbon::parse($pengumuman->jam_selesai)->format('H.i') }} WIB
        </marquee>
    @endif
</div>
<nav
    class="navbar navbar-expand-lg navbar-light {{ Route::is($route) ? 'navbar-store-download' : 'navbar-store' }} fixed-top navbar-fixed-top ">

    <div class="container">

        <a class="navbar-brand" href="{{ route('landing') }}"> <img src="{{ asset('assets/img/logo-head.png') }}"
                class="w-50 animate__animated animate__backInLeft" alt="logo" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ Route::is('beranda') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('beranda') }}">Home</a>
                </li>

                <li class="nav-item dropdown {{ Route::is('landing.download') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Profil
                    </a>

                    <div class="dropdown-content dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('profil.visi-misi') }}">Visi & Misi</a>
                        <a class="dropdown-item" href="{{ route('profil.sejarah') }}">Sejarah</a>
                        <a class="dropdown-item" href="{{ route('profil.pejabat') }}">Pejabat Struktural </a>
                        <a class="dropdown-item" href="{{ route('profil.tupoksi') }}">Tugas & Fungsi</a>
                    </div>

                </li>
                <li class="nav-item dropdown {{ Route::is('landing.download') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Produk
                    </a>

                    <div class="dropdown-content dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Perbaikan RTLH (Rumah Tidak Layah Huni)</a>
                        <a class="dropdown-item" href="#">SIKASPER</a>
                        <a class="dropdown-item" href="#">SI RUMAH KITA</a>
                        <a class="dropdown-item" href="#">Peningkatan Prasarana, Sarana, dan Utilitas Umum</a>
                        <a class="dropdown-item" href="#">Peningkatan Kualitas Perumahan Kumuh dan Pemukiman Kumuh</a>
                        <a class="dropdown-item" href="#">Sanitasi Rumah</a>
                        <a class="dropdown-item" href="#">Air Minum Perumahan</a>

                    </div>

                </li>
                <li class="nav-item dropdown {{ Route::is('landing.download') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Informasi Publik
                    </a>

                    <div class="dropdown-content dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Pengumuman</a>
                        <a class="dropdown-item" href="{{ route('profil.list') }}">Berita & Artikel</a>
                        {{-- <a class="dropdown-item" href="{{ route('profil.dokumen') }}">Regulasi / Peraturan</a>
                        HAPUS OOP DOKUMEN --}}
                        <a class="dropdown-item" href="#">Lowongan</a>
                        <a class="dropdown-item" href="{{ route('profil.galeriList') }}">Galeri Foto</a>

                    </div>

                </li>
                <li class="nav-item dropdown {{ Route::is('landing.download') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Galeri
                    </a>
                    <div class="dropdown-content dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('profil.galeriList') }}">Galeri Foto & Video</a>
                    </div>

                </li>


            </ul>

        </div>
    </div>
</nav>
