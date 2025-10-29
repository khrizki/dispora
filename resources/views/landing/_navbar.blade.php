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

<nav class="navbar navbar-expand-lg navbar-light {{ Route::is($route) ? 'navbar-store-download' : 'navbar-store' }} fixed-top">
    <div class="container d-flex justify-content-between align-items-center">

        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('beranda') }}">
            <img src="{{ asset('assets/img/logo-head-DISPORA.png') }}" alt="DISPORA Kota Padang"
                 class="animate__animated animate__backInLeft" style="max-height:50px;">
        </a>

        <!-- Hamburger -->
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">

                <!-- BERANDA -->
                <li class="nav-item {{ Route::is('beranda') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('beranda') }}">Beranda</a>
                </li>

                <!-- PROFIL -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="profilDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        Profil
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Struktur Organisasi</a>
                        <div class="dropdown-divider"></div>
                        <h6 class="dropdown-header text-muted">ORMAS</h6>
                        <a class="dropdown-item" href="#">KONI</a>
                        <a class="dropdown-item" href="#">KORMI</a>
                        <a class="dropdown-item" href="#">KNPI</a>
                        <a class="dropdown-item" href="#">Pramuka</a>
                    </div>
                </li>

                <!-- PAD -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="padDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        PAD (Teratai)
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Jadwal Sewa</a>
                        <a class="dropdown-item" href="#">Kalender Sewa</a>
                        <a class="dropdown-item" href="#">Booking</a>
                    </div>
                </li>

                <!-- KEGIATAN -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="kegiatanDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        Kegiatan
                    </a>
                    <div class="dropdown-menu">
                        <h6 class="dropdown-header text-muted">Event</h6>
                        <a class="dropdown-item" href="#">Event Tahunan</a>
                        <a class="dropdown-item" href="#">Kalender Olahraga</a>
                        <div class="dropdown-divider"></div>
                        <h6 class="dropdown-header text-muted">Lomba</h6>
                        <a class="dropdown-item" href="#">POPDA</a>
                        <a class="dropdown-item" href="#">Peparpeda</a>
                        <div class="dropdown-divider"></div>
                        <h6 class="dropdown-header text-muted">Pemuda</h6>
                        <a class="dropdown-item" href="#">Pemuda Pelopor</a>
                        <a class="dropdown-item" href="#">Kewirausahaan Pemuda</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Atlet Binaan</a>
                    </div>
                </li>

                <!-- BERITA -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="beritaDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        Berita
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('profil.list') }}">Artikel</a>
                        <a class="dropdown-item" href="#">Facebook</a>
                        <a class="dropdown-item" href="#">Instagram</a>
                    </div>
                </li>

                <!-- KERJA SAMA -->
                <li class="nav-item">
                    <a class="nav-link" href="#">Kerja Sama</a>
                </li>

                <!-- SPORT CENTER -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="sportDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        Sport Center
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Komunitas</a>
                        <a class="dropdown-item" href="#">Club Sport</a>
                    </div>
                </li>

                <!-- CONTACT -->
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Center</a>
                </li>

                <!-- LOGIN -->
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-primary text-white px-3" href="{{ route('login') }}">
                        <i class="fa fa-sign-in-alt"></i> Login
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar-nav .dropdown-menu {
        border-radius: 0.5rem;
        border: none;
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }
    .navbar-nav .dropdown-header {
        font-size: 0.85rem;
        font-weight: 600;
        color: #6c757d;
    }
    .navbar-nav .nav-link.active,
    .navbar-nav .nav-link:hover {
        color: #6c757d !important;
    }
    .navbar-store {
        background-color: white;
        transition: 0.3s;
    }
</style>
