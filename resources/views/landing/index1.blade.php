<!DOCTYPE html>
<html lang="en">

@include('landing._head')

<body onload="slider()">

    <div class="preloader" style="background-color: rgb(199, 192, 192)">
        <div class="loading">
            <img src="{{ asset('assets/img/logo-head-DISPORA.png') }}" class="img-fluid" alt="Logo DISPORA" width="600">
        </div>
    </div>

    <style>
        /* Animasi CSS */
        .fade-in-up {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-animation-delay-1 {
            animation-delay: 0.2s;
        }

        .card-animation-delay-2 {
            animation-delay: 0.4s;
        }

        .card-animation-delay-3 {
            animation-delay: 0.6s;
        }

        .card-animation-delay-4 {
            animation-delay: 0.8s;
        }

        .image-animation-delay {
            animation-delay: 1s;
        }

        /* Back to top button */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background-color: #1a2b6f;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
        }

        .back-to-top:hover {
            background-color: #0f1a4b;
            transform: translateY(-3px);
        }

        .back-to-top.active {
            opacity: 1;
            visibility: visible;
        }

        .hover-scale {
            transition: transform 0.3s ease;
        }

        .hover-scale:hover {
            transform: translateY(-5px);
        }

        /* Before After Auto Carousel Styles */
        .before-after-wrapper {
            position: relative;
        }

        .before-after-carousel {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            height: 450px;
        }

        .before-after-item {
            display: none;
            position: relative;
            width: 100%;
            height: 100%;
        }

        .before-after-item.active {
            display: block;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .before-after-slider {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .before-after-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .after-image {
            clip-path: polygon(0 0, 50% 0, 50% 100%, 0 100%);
            animation: slideReveal 8s ease-in-out infinite;
        }

        @keyframes slideReveal {

            0%,
            100% {
                clip-path: polygon(0 0, 0% 0, 0% 100%, 0 100%);
            }

            50% {
                clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
            }
        }

        .slider-handle {
            position: absolute;
            top: 0;
            left: 0%;
            width: 4px;
            height: 100%;
            background: white;
            z-index: 10;
            animation: handleMove 8s ease-in-out infinite;
        }

        @keyframes handleMove {

            0%,
            100% {
                left: 0%;
            }

            50% {
                left: 100%;
            }
        }

        .slider-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 50%;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .slider-button::before {
            content: '⟨';
            position: absolute;
            left: 12px;
            font-size: 20px;
            color: #212e60;
        }

        .slider-button::after {
            content: '⟩';
            position: absolute;
            right: 12px;
            font-size: 20px;
            color: #212e60;
        }

        .before-label,
        .after-label {
            position: absolute;
            top: 20px;
            background: rgba(33, 46, 96, 0.9);
            color: white;
            padding: 8px 20px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 14px;
            z-index: 5;
        }

        .before-label {
            left: 20px;
        }

        .after-label {
            right: 20px;
        }

        .before-after-info {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
            color: white;
            padding: 30px 20px 20px;
            z-index: 5;
        }

        /* Carousel Indicators */
        .before-after-indicators {
            position: absolute;
            bottom: 15px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 8px;
            z-index: 15;
        }

        .indicator-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .indicator-dot.active {
            background: white;
            width: 30px;
            border-radius: 5px;
        }

        /* Profile Section Modern */
        .profile-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            padding: 40px;
            color: white;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
        }

        .profile-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .profile-card-content {
            position: relative;
            z-index: 2;
        }

        .profile-name {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .profile-position {
            font-size: 1.1rem;
            font-weight: 500;
            opacity: 0.9;
            margin-bottom: 1.5rem;
        }

        .profile-quote {
            font-size: 0.95rem;
            line-height: 1.8;
            opacity: 0.95;
            font-style: italic;
            border-left: 4px solid rgba(255, 255, 255, 0.5);
            padding-left: 20px;
            margin-top: 20px;
        }

        .profile-image-wrapper {
            position: relative;
            display: inline-block;
        }

        .profile-image-wrapper::after {
            content: '';
            position: absolute;
            top: -10px;
            right: -10px;
            bottom: -10px;
            left: -10px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            z-index: -1;
            animation: pulse 3s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 0.5;
                transform: scale(1);
            }

            50% {
                opacity: 0.8;
                transform: scale(1.05);
            }
        }

        .profile-img {
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease;
        }

        .profile-img:hover {
            transform: scale(1.05) rotate(2deg);
        }
    </style>

    <!-- NAVBAR -->
    @include('landing._navbar')

    <div class="page-home">
        <!-- LANDING PAGE -->
        <section class="store-landing">
            <div class="container-background">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block bg-100" src="{{ asset('assets/img/intersect.png') }}" id="slideImg"
                                alt="First slide">
                            <div class="carousel-caption d-flex flex-column justify-content-center align-items-start text-start"
                                style="top: 0; bottom: 0; left: 10%; right: auto; padding: 20px; text-align: left !important;">
                                <h6 class="text-white fw-bold">DISPORA Kota Padang</h6>
                                <h1 class="text-white fw-bold mb-3" style="font-size: 2rem; line-height: 1.3;">
                                    Dinas Perumahan Rakyat dan<br>
                                    Kawasan Permukiman <br>
                                    Kota Padang
                                </h1>
                                <p class="text-white mb-3" style="max-width: 500px;">
                                    Mewujudkan Perumahan Rakyat dan Kawasan <br>
                                    Permukiman Kota Padang yang layak huni <br>
                                    terjangkau, aman, terpadu, dan berkelanjutan
                                </p>
                                <a href="{{ route('profil.rusunawa') }}" class="btn btn-success px-3 py-1">
                                    Cari Rusunawa
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="landing-page-container">
                    <div id="particles-js"></div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="about mb-2">
                                <a href="#transformasi" title="Scroll">
                                    <img src="{{ asset('assets/img/Group 8801.png') }}"
                                        class="animate__animated animate__heartBeat" alt="Group 8801">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- BEFORE AFTER AUTO CAROUSEL SECTION -->
        <section class="py-5" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);"
            id="transformasi">
            <div class="container">
                <div class="row text-center mb-5">
                    <div class="col-12">
                        <h2 style="font-weight: bold; color: #212e60;">TRANSFORMASI PERUMAHAN</h2>
                        <div style="width: 80px; height: 3px; background-color: #212e60; margin: 10px auto;"></div>
                        <p class="text-muted">Lihat perubahan sebelum dan sesudah program DISPORA</p>
                    </div>
                </div>

                @if ($infoBergambar && $infoBergambar->count() > 0)
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="before-after-wrapper">
                                <div class="before-after-carousel">
                                    @foreach ($infoBergambar as $index => $item)
                                        <div class="before-after-item {{ $index == 0 ? 'active' : '' }}"
                                            data-index="{{ $index }}">
                                            <div class="before-after-slider">
                                                <!-- Before Image -->
                                                <img src="{{ asset('storage/' . $item->gambar) }}"
                                                    class="before-after-image before-image" alt="Before">

                                                <!-- After Image (Same image with filter for demo) -->
                                                <img src="{{ asset('storage/' . $item->gambar) }}"
                                                    class="before-after-image after-image" alt="After"
                                                    style="filter: brightness(1.1) contrast(1.1) saturate(1.2);">

                                                <!-- Slider Handle -->
                                                <div class="slider-handle">
                                                    <div class="slider-button"></div>
                                                </div>

                                                <!-- Labels -->
                                                <div class="before-label">SEBELUM</div>
                                                <div class="after-label">SESUDAH</div>

                                                <!-- Info -->
                                                <div class="before-after-info">
                                                    <h5 class="fw-bold mb-1">{{ $item->judul_gambar }}</h5>
                                                    <small><i class="bi bi-calendar3"></i>
                                                        {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <!-- Indicators -->
                                    <div class="before-after-indicators">
                                        @foreach ($infoBergambar as $index => $item)
                                            <div class="indicator-dot {{ $index == 0 ? 'active' : '' }}"
                                                data-index="{{ $index }}"></div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="text-center">
                        <p class="text-muted">Belum ada data transformasi tersedia</p>
                    </div>
                @endif
            </div>
        </section>

        <!-- PROFIL PEJABAT MODERN -->
        <section class="py-5" id="visi">
            <div class="container">
                <div class="row text-center mb-5">
                    <div class="col-12">
                        <h2 style="font-weight: bold; color: #212e60;">SAMBUTAN KEPALA DINAS</h2>
                        <div style="width: 80px; height: 3px; background-color: #212e60; margin: 10px auto;"></div>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-lg-5 text-center mb-4 mb-lg-0">
                        <div class="profile-image-wrapper">
                            @if ($pejabat && $pejabat->foto)
                                <img src="{{ asset('storage/' . $pejabat->foto) }}" class="img-fluid profile-img"
                                    style="max-height: 400px; max-width: 100%;" alt="{{ $pejabat->nama }}">
                            @else
                                <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid profile-img"
                                    style="max-height: 400px;" alt="Foto Pejabat">
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="profile-card">
                            <div class="profile-card-content">
                                @if ($pejabat)
                                    <div class="profile-name">{{ $pejabat->nama }}</div>
                                    <div class="profile-position">{{ $pejabat->jabatan }}</div>

                                    @if ($pejabat->sambutan)
                                        <div class="profile-quote">
                                            "{{ Str::limit($pejabat->sambutan, 350) }}"
                                        </div>
                                    @endif

                                    <div class="mt-4">
                                        <a href="{{ route('profil.sambutan') }}"
                                            class="btn btn-light btn-lg px-4 shadow">
                                            <i class="bi bi-arrow-right-circle me-2"></i> Baca Selengkapnya
                                        </a>
                                    </div>
                                @else
                                    <div class="profile-name">Kepala Dinas DISPORA</div>
                                    <div class="profile-position">Kota Padang</div>
                                    <div class="profile-quote">
                                        "Informasi pejabat akan segera ditampilkan"
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- PROGRAM UNGGULAN -->
        <section class="my-5">
            <div class="container text-center">
                <h3 style="color:#212e60;">Program Unggulan</h3>
                <p>Pilihan Layanan Unggulan <b>DISPORA</b> Kota Padang</p>
                <hr class="line">

                <div class="row justify-content-center mt-4">
                    <div class="col-md-3 col-6 mb-3">
                        <a href="https://sikasper.padang.go.id/" class="text-decoration-none">
                            <div class="card shadow-sm border-0 p-3 hover-scale">
                                <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid mb-2" alt="SIKASPER">
                                <h6 class="text-dark">SIKASPER</h6>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3 col-6 mb-3">
                        <a href="https://sirumahkita.padang.go.id/" class="text-decoration-none">
                            <div class="card shadow-sm border-0 p-3 hover-scale">
                                <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid mb-2"
                                    alt="SIRUMAHKITA">
                                <h6 class="text-dark">SIRUMAHKITA</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- ARTIKEL -->
        <section class="my-5">
            <div class="container">
                <div class="text-center mt-5">
                    <h3 class="red" style="color: #212e60;">Berita Terbaru</h3>
                    <p>Berita dan Artikel <b>DISPORA</b> Kota Padang</p>
                    <hr class="line">
                </div>
                <div class="row g-4">
                    @foreach ($beritaTerbaru as $berita)
                        <div class="col-lg-4 col-md-6">
                            <div class="card shadow-sm position-relative h-100">
                                <span class="card-date-badge">
                                    {{ \Carbon\Carbon::parse($berita->tanggal_berita)->translatedFormat('d F, Y') }}
                                </span>
                                <img src="{{ asset('storage/' . $berita->foto) }}" alt="..."
                                    class="card-img-top" style="height: 200px; object-fit: cover;" />

                                <div class="card-body d-flex flex-column">
                                    <div class="card-category"><i class="fas fa-tag me-1"></i> Kegiatan</div>
                                    <h5 class="card-title">{{ $berita->judul_berita }}</h5>
                                    <p class="card-text mt-2">{!! Str::limit(strip_tags($berita->isi_berita), 100) !!}</p>

                                    <div class="mt-auto">
                                        <a href="{{ route('berita.show', $berita->id) }}"
                                            class="btn btn-primary btn-sm mt-2">
                                            Lihat Selengkapnya
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('profil.list') }}" class="btn btn-primary px-4 py-2"
                        style="border-radius: 30px; font-weight: 600; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                        Lihat Semua Berita
                    </a>
                </div>
            </div>
        </section>

        <!-- INSTAGRAM -->
        <section class="store-adventeges" id="adventeges">
            <div class="container">
                <div class="row align-content-center">
                    <div class="col-12 mt-4 text-center"><br>
                        <h3 class="red" style="color: #212e60;">Instagram</h3>
                        <p>Post Instagram Terbaru <b>DISPORA</b> Kota Padang</p>
                        <hr class="line">
                    </div>

                    @forelse ($instagram as $item)
                        <div class="col-md-4 col-sm-12 mb-4 text-center">
                            <h5>{{ $item->judul }}</h5>
                            <div class="instagram-embed-wrapper" style="max-width: 350px; margin: 0 auto;">
                                {!! $item->embed_code !!}
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p>Tidak ada post Instagram tersedia.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- VIDEO -->
        <section class="store-adventeges" id="adventeges">
            <div class="container">
                <div class="row align-content-center">
                    <div class="col-12 mt-4 text-center"><br>
                        <h3 class="red" style="color: #212e60;">Video Terbaru</h3>
                        <p>Video Terbaru <b>DISPORA</b> Kota Padang </p>
                        <hr class="line">
                    </div>
                    @php
                        if (!function_exists('getYoutubeId')) {
                            function getYoutubeId($url)
                            {
                                preg_match(
                                    '/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|shorts\/))([^\?&"\'<> #]+)/',
                                    $url,
                                    $matches,
                                );
                                return $matches[1] ?? null;
                            }
                        }
                    @endphp

                    @forelse ($video as $item)
                        <div class="col-md-4 col-sm-12 mb-4 text-center">
                            <h5 class="video-title mb-2" title="{{ $item->judul_video }}">{{ $item->judul_video }}
                            </h5>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item"
                                    src="https://www.youtube.com/embed/{{ getYoutubeId($item->video) }}"
                                    allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p>Tidak ada video tersedia.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- GALERI -->
        <section class="store-adventeges" id="adventeges">
            <div class="container">
                <div class="row text-center">
                    <div class="col-12 mt-5">
                        <h3 class="red" style="color: #212e60;">Galeri dan Dokumentasi</h3>
                        <p>Galeri dan Dokumentasi Kegiatan <span class="badge bg-warning text-dark">DISPORA</span> Kota
                            Padang</p>
                        <hr class="line">
                    </div>
                </div>

                <div class="card p-4 mt-3">
                    <div class="slider-galeri">
                        @foreach ($galeri as $item)
                            <div class="col-md-4 mb-4">
                                <img src="{{ asset('storage/' . $item->foto_galery) }}" alt="..."
                                    style="width: 100%; height: 250px; object-fit: cover;" />
                                <p class="mt-2 text-center">{{ $item->judul_galery }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- STATISTIK PENGUNJUNG -->
        <section class="store-adventeges" id="adventeges">
            <div class="container">
                <div class="row text-center">
                    <div class="col-12 mt-5">
                        <h3 class="red" style="color: #212e60;">Jumlah Pengunjung</h3>
                        <p>Jumlah Pengunjung Website <span class="badge bg-warning text-dark">DISPORA</span> Kota
                            Padang</p>
                        <hr class="line">
                    </div>
                </div>

                <div class="row justify-content-center mt-4">
                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="card shadow-sm border-0">
                            <div class="card-body text-center">
                                <h5 class="card-title text-muted">Hari Ini</h5>
                                <h2 class="fw-bold text-success">{{ $todayVisitors }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="card shadow-sm border-0">
                            <div class="card-body text-center">
                                <h5 class="card-title text-muted">Bulan Ini</h5>
                                <h2 class="fw-bold text-primary">{{ $monthVisitors }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="card shadow-sm border-0">
                            <div class="card-body text-center">
                                <h5 class="card-title text-muted">Bulan Lalu</h5>
                                <h2 class="fw-bold text-secondary">{{ $lastMonthVisitors }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="card shadow-sm border-0">
                            <div class="card-body text-center">
                                <h5 class="card-title text-muted">Total Pengunjung</h5>
                                <h2 class="fw-bold text-danger">{{ $totalVisitors }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- KONTAK -->
        <section class="store-adventeges" id="adventeges">
            <div class="container-fluid kontak">
                <div class="row text-center">
                    <div class="col-12"><br>
                        <h3 style="color:#212e60;"> Kontak Kami</h3>
                        <h6>DISPORA@padang.go.id</h6>
                        <hr class="line">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="container">
                            <div class="w-auto mb-2">
                                <div class="row justify-content-center">
                                    <div class="container-iframe">
                                        <iframe class="iframe-maps"
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1232.5863090840842!2d100.36281818197402!3d-0.9294804460660874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b92708346ea9%3A0xa676f8ae7633e2d5!2sDinas%20Perumahan%20Rakyat%2C%20Kawasan%20Permukiman%20Dan%20Pertanahan%20Prov.%20Sumbar!5e0!3m2!1sid!2sid!4v1758242998956!5m2!1sid!2sid"
                                            allowfullscreen="" loading="lazy"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- footer -->
    @include('landing._footer')

    <!-- Back to top button -->
    <a href="#" class="back-to-top" id="backToTop">
        <i class="fas fa-arrow-up"></i>
    </a>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/particles.js"></script>
    <script src="assets/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>

    <script src="assets/js/navbar-scroll.js"></script>

    <script>
        $(document).ready(function() {
            $('.preloader').fadeOut(1000);
        });
    </script>

    <script>
        var slideImg = document.getElementById("slideImg");
        var images = [
            "{{ asset('assets/img/intersect.png') }}",
            @foreach ($hero as $h)
                "{{ asset('storage/' . $h->image) }}",
            @endforeach
        ];

        var len = images.length;
        var i = 0;

        function slider() {
            if (i > len - 1) {
                i = 0;
            }
            slideImg.src = images[i];
            i++;
            setTimeout(slider, 6000);
        }

        slider();
    </script>

    <!-- Before After Slider Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const containers = document.querySelectorAll('.before-after-container');

            containers.forEach(container => {
                const slider = container.querySelector('.slider-handle');
                const afterImage = container.querySelector('.after-image');
                const sliderContainer = container.querySelector('.before-after-slider');

                let isDragging = false;

                function updateSlider(e) {
                    if (!isDragging && e.type !== 'click') return;

                    const rect = sliderContainer.getBoundingClientRect();
                    let x = e.clientX - rect.left;

                    // Batasi slider antara 0 dan lebar container
                    x = Math.max(0, Math.min(x, rect.width));

                    const percentage = (x / rect.width) * 100;

                    slider.style.left = percentage + '%';
                    afterImage.style.clipPath =
                        `polygon(0 0, ${percentage}% 0, ${percentage}% 100%, 0 100%)`;
                }

                slider.addEventListener('mousedown', () => {
                    isDragging = true;
                });

                document.addEventListener('mouseup', () => {
                    isDragging = false;
                });

                document.addEventListener('mousemove', updateSlider);
                sliderContainer.addEventListener('click', updateSlider);

                // Touch events for mobile
                slider.addEventListener('touchstart', (e) => {
                    isDragging = true;
                    e.preventDefault();
                });

                document.addEventListener('touchend', () => {
                    isDragging = false;
                });

                document.addEventListener('touchmove', (e) => {
                    if (isDragging) {
                        const touch = e.touches[0];
                        updateSlider(touch);
                    }
                });
            });
        });
    </script>

    <script async src="//www.instagram.com/embed.js"></script>

    @stack('script')

    <script>
        // Back to top button
        const backToTopButton = document.getElementById('backToTop');

        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.add('active');
            } else {
                backToTopButton.classList.remove('active');
            }
        });

        backToTopButton.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>

    <!-- jQuery & Slick Carousel -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.slider-galeri').slick({
                slidesToShow: 2.8,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                infinite: true,
                centerMode: true,
                centerPadding: '40px',
                arrows: true,
                dots: true,
                responsive: [{
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
        });
    </script>
</body>

</html>
