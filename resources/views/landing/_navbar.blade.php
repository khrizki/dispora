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
    <marquee behavior="scroll" direction="left" scrollamount="5">
        🔴 Sedang berlangsung: Seminar Nasional Keuangan Daerah | Lokasi: Aula BPKAD | Waktu: 09.00 - 12.00 WIB
    </marquee>
</div>
<nav
    class="navbar navbar-expand-lg navbar-light {{Route::is($route) ? 'navbar-store-download' : 'navbar-store'}} fixed-top navbar-fixed-top ">

    <div class="container">

        <a class="navbar-brand" href="{{route('landing')}}"> <img src="{{ asset('assets/img/logo-head.png') }}"
                class="w-50 animate__animated animate__backInLeft" alt="logo" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{Route::is('landing') ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('landing')}}">Beranda</a>
                </li>

                <li class="nav-item dropdown {{Route::is('landing.download') ? 'active' : ''}}">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Profil
                    </a>

                    <div class="dropdown-content dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#visi-misi">Visi & Misi</a>
                        <a class="dropdown-item" href="{{ route('profil.sejarah') }}">Sejarah</a>
                        <a class="dropdown-item" href="{{ route('profil.pejabat') }}">Struktur Organisasi</a>
                        <a class="dropdown-item" href="{{ route('profil.tupoksi') }}">Tugas & Fungsi</a>
                    </div>

                </li>
                <li class="nav-item dropdown {{Route::is('landing.download') ? 'active' : ''}}">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Publikasi
                    </a>

                    <div class="dropdown-content dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#visi-misi">Pengumuman</a>
                        <a class="dropdown-item" href="{{ route('profil.sejarah') }}">Berita & Artikel</a>
                        <a class="dropdown-item" href="{{ route('profil.pejabat') }}">Layanan</a>
                        <a class="dropdown-item" href="{{ route('profil.tupoksi') }}">Dokumen</a>
                        <a class="dropdown-item" href="{{ route('profil.tupoksi') }}">Agenda</a>
                        <a class="dropdown-item" href="{{ route('profil.tupoksi') }}">Galeri Foto</a>

                    </div>

                </li>
                <li class="nav-item {{Route::is('landing.konsultasi') ? 'active' : ''}}">
                    <a class="nav-link" href="{{ route('profil.transparansi') }}">Transparansi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://dashboard.padang.go.id/dashboard/pbj/e-purchasing">
                        <i class="fas fa-external-link-alt"></i> E-Purchasing
                    </a>
                </li>


            </ul>

        </div>
    </div>
</nav>