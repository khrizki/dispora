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

        /* Delay untuk animasi berurutan */
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

        .video-title:hover {
            white-space: normal;
            overflow: visible;
            text-overflow: unset;
            background-color: #fff;
            position: relative;
            z-index: 1;
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

        .video-title {
            font-size: 14px;
            /* perkecil font */
            font-weight: 600;
            /* tebal sedang */
            min-height: 45px;
            /* tinggi minimal agar sejajar */
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            line-height: 1.3;
        }

        .embed-responsive {
            border-radius: 10px;
            overflow: hidden;
        }

        #galeriCarousel,
        #galeriCarousel * {
            border: none !important;
            outline: none !important;
            box-shadow: none !important;
        }

        .carousel-control-prev,
        .carousel-control-next {
            border: none !important;
            outline: none !important;
            box-shadow: none !important;
            background: transparent !important;
        }

        .col-md-6 {
            border: none !important;
            box-shadow: none !important;
        }

        #galeriCarousel img {
            height: 200px;
            /* tinggi tetap */
            object-fit: cover;
            /* biar tetap proporsional */
        }
        .hover-scale {
                transition: transform 0.3s ease;
            }
            .hover-scale:hover {
                transform: translateY(-5px);
            }

    .map-container {
        position: relative;
        overflow: hidden;
        width: 100%;
        max-width: 900px;
        aspect-ratio: 16 / 9;
        border-radius: 15px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        background: #f9f9f9;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .map-container:hover {
        transform: scale(1.02);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }

    .map-container iframe {
        position: absolute;
        width: 100%;
        height: 100%;
        border: none;
        border-radius: 15px;
    }

    /* Responsif untuk layar kecil */
    @media (max-width: 768px) {
        .map-container {
            max-width: 100%;
            aspect-ratio: 4 / 3;
            border-radius: 10px;
        }
    }
    </style>

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
                            <img class="d-block bg-100" src="{{ asset('assets/img/kolam.png') }}" id="slideImg"
                                alt="First slide">

                            <div class="carousel-caption d-flex flex-column justify-content-center align-items-start text-start"
                                style="top: 0; bottom: 0; left: 10%; right: auto; padding: 20px; text-align: left !important;">
                                <h6 class="text-white fw-bold">DISPORA Kota Padang</h6>
                                <h1 class="text-white fw-bold mb-3" style="font-size: 2rem; line-height: 1.3;">
                                    Dinas Pemuda dan Olahraga<br>
                                    Kota Padang
                                </h1>
                                <p class="text-white mb-3" style="max-width: 500px;">
                                    Mewujudkan Pemuda yang Berkarakter, Kreatif, dan Mandiri <br>
                                    serta Masyarakat yang Gemar Berolahraga <br>
                                    menuju Kota Padang yang Sehat dan Berprestasi
                                </p>
                                <!-- <a href="{{ route('profil.rusunawa') }}" class="btn btn-success px-3 py-1">
                                    Cari Rusunawa
                                </a> -->
                            </div>
                        </div>
                    </div>

                </div>

                <div class="landing-page-container">
                    <div id="particles-js"></div>
                    
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="about mb-2">
                                <a href="#visi" title="Scroll">
                                    <img src="{{ asset('assets/img/Group 8801.png') }}"
                                        class="animate__animated animate__heartBeat" alt="Group 8801">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- Info Bergambar  -->
        <section class="counter text-black" style="padding: 20px; margin-top: 7px;" id="visi">
            <div class="container my-5">
                <!-- Judul -->
                <div class="row text-center mb-4">
                    <div class="col-12">
                        <h2 style="font-weight: bold;">PROFIL</h2>
                        <div style="width: 80px; height: 3px; background-color: #212e60; margin: 10px auto;"></div>
                        <p>Sekilas tentang Dinas Pemuda dan Olahraga Kota Padang</p>
                    </div>
                </div>

                <!-- Isi Konten -->
                <div class="row align-items-center">
                    <!-- Kiri: Card -->
                    <div class="col-md-6 text-center mt-4 mt-md-0">
                        @if ($pejabat && $pejabat->foto)
                            <img src="{{ asset('storage/' . $pejabat->foto) }}"
                                class="img-fluid fade-in-up image-animation-delay" style="max-height: 450px;"
                                alt="{{ $pejabat->nama }}">
                        @else
                            <img src="{{ asset('assets/img/logo.png') }}"
                                class="img-fluid fade-in-up image-animation-delay" style="max-height: 450px;"
                                alt="Foto Pejabat">
                        @endif
                    </div>
                    <div class="col-md-6 text-center mt-4 mt-md-0">
                        <div id="galeriCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">

                            <!-- Indikator titik -->
                            <div class="carousel-indicators">
                                @foreach ($infoBergambar as $key => $item)
                                    <button type="button" data-bs-target="#galeriCarousel"
                                        data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}">
                                    </button>
                                @endforeach
                            </div>

                            <!-- Isi carousel -->
                            <div class="carousel-inner">
                                @foreach ($infoBergambar as $key => $item)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <div class="card text-center text-white"
                                            style="background-color:#212e60; min-height: 450px; border:none;">
                                            <div class="card-body d-flex flex-column justify-content-center">

                                                <!-- Trigger Modal -->
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#detailModal"
                                                    data-title="{{ $item->judul_gambar }}"
                                                    data-image="{{ asset('storage/' . $item->gambar) }}"
                                                    data-date="{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}">

                                                    <div class="card"
                                                        style="height: 400px; border-radius: 10px; overflow: hidden;">
                                                        <img src="{{ asset('storage/' . $item->gambar) }}"
                                                            alt="{{ $item->judul_gambar }}"
                                                            style="width: 100%; height: 100%; object-fit: cover; object-position: center; border-radius: 10px;">
                                                    </div>
                                                </a>


                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Tombol Navigasi -->
                            <button class="carousel-control-prev" type="button" data-bs-target="#galeriCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#galeriCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>

                    </div>
                    <div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitle"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <img id="modalImage" src="" class="img-fluid mb-3 rounded"
                                        style="max-height:400px; object-fit:contain;">
                                    <p id="modalDate" class="text-muted"></p>
                                </div>
                            </div>
                        </div>
                    </div>





                    <!-- Kanan: Foto -->

                </div>
            </div>
        </section>


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
                    <!-- Progul 1 -->
                    <div class="col-md-3 col-6 mb-3">
                        <a href="https://sikasper.padang.go.id/" class="text-decoration-none">
                            <div class="card shadow-sm border-0 p-3 hover-scale">
                                <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid mb-2" alt="Bedah Rumah">
                                <h6 class="text-dark">SIKASPER</h6>
                            </div>
                        </a>
                    </div>

                    <!-- Progul 2 -->
                    <div class="col-md-3 col-6 mb-3">
                        <a href="https://sirumahkita.padang.go.id/" class="text-decoration-none">
                            <div class="card shadow-sm border-0 p-3 hover-scale">
                                <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid mb-2" alt="Rusunawa">
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
                            <img src="{{ asset('storage/' . $berita->foto) }}" alt="..." class="card-img-top"
                                style="height: 200px; object-fit: cover;" />

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
                    style="border-radius: 30px; font-weight: 600; box-shadow: 0 4px 6px rgba(0,0,0,0.1); transition: all 0.3s ease;">
                    Lihat Semua Berita
                </a>
            </div>

            <style>
                .btn-primary:hover {
                    background-color: #0056b3 !important;
                    transform: translateY(-2px);
                    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
                }
            </style>

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
                    function getYoutubeId($url) {
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
                        <h5 class="video-title mb-2" title="{{ $item->judul_video }}">{{ $item->judul_video }}</h5>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item"
                                src="https://www.youtube.com/embed/{{ getYoutubeId($item->video) }}" allowfullscreen>
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
    <!-- SECTION GALERI -->
    <section class="store-adventeges" id="adventeges">
        <div class="container">
            <div class="row text-center">
                <div class="col-12 mt-5">
                    <h3 class="red" style="color: #212e60;">Galeri dan Dokumentasi</h3>
                    <p>Galeri dan Dokumentasi Kegiatan <span class="badge bg-warning text-dark">DISPORA</span> Kota
                        Padang
                    </p>
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
    <section class="store-adventeges" id="adventeges">
        <div class="container">
            <div class="row text-center">
                <div class="col-12 mt-5">
                    <h3 class="red" style="color: #212e60;">Jumlah Pengunjung</h3>
                    <p>Jumlah Pengunjung Website
                        <span class="badge bg-warning text-dark">DISPORA</span> Kota Padang
                    </p>
                    <hr class="line">
                </div>
            </div>

            <div class="row justify-content-center mt-4">
                <!-- Card Hari Ini -->
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center">
                            <h5 class="card-title text-muted">Hari Ini</h5>
                            <h2 class="fw-bold text-success">{{ $todayVisitors }}</h2>
                        </div>
                    </div>
                </div>

                <!-- Card Bulan Ini -->
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center">
                            <h5 class="card-title text-muted">Bulan Ini</h5>
                            <h2 class="fw-bold text-primary">{{ $monthVisitors }}</h2>
                        </div>
                    </div>
                </div>

                <!-- Card Bulan Lalu -->
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center">
                            <h5 class="card-title text-muted">Bulan Lalu</h5>
                            <h2 class="fw-bold text-secondary">{{ $lastMonthVisitors }}</h2>
                        </div>
                    </div>
                </div>

                <!-- Card Total Pengunjung -->
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
                    <h6>dispora@padang.go.id</h6>
                    <hr class="line">
                </div>
            </div>
            <div class="row justify-content-center">
                {{-- <div class="col-4 text-center">
                        <div class="input-cari w-auto">
                            <img src="assets/img/Whatsapp.png" class="w-75" alt="">
                        </div>

                    </div> --}}
                <div class="col-12">
                    <div class="container">
                        <div class="w-auto mb-2">
                            <div class="row justify-content-center mt-4 mb-5">
                                <div class="map-container">
                                    <iframe 
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.2924143682485!2d100.35506569678957!3d-0.9302933000000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b9fc64bb2319%3A0xb15951765177e7a9!2sKantor%20Dinas%20Pemuda%20Dan%20Olahraga%20Kota%20Padang!5e0!3m2!1sen!2sid!4v1760935522338!5m2!1sen!2sid"
                                        allowfullscreen=""
                                        loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
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
    <!-- akhir footer -->

    <!-- modal -->
    <div id="modalBerita" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title berita-title">Contoh</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <img class="card-img-top w-100 berita-img" src="assets/img/1123123 1.png" alt="">
                        <div class="card-body">
                            <div class="card-text berita-isi">Content</div>
                        </div>
                        <img class="card-img-bottom" src="" alt="">
                    </div>
                </div>
                <div class="modal-footer berita-tgl">

                </div>
            </div>
        </div>
    </div>
    <!-- modal -->



    <!-- Highlight modal artikel -->


    <!-- Bootstrap core JavaScript -->

    <!-- scripts -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/particles.js"></script>
    <script src="assets/app.js"></script>
    {{-- <script src="{{asset('assets/vendor/jquery/jquery.slim.min.js')}}"></script> --}}

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/js/star-rating.min.js"
        type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/themes/krajee-svg/theme.js"></script> --}}
    <script>
        AOS.init();
    </script>
    <script src="assets/js/navbar-scroll.js"></script>


    <script>
        $(document).ready(function() {
            $('.preloader').fadeOut(1000);

            $('.berita').on('click', function() {
                $('#modal-berita').modal('show');
                $('.berita-title').text($(this).attr('data-judul'));
                $('.berita-img').attr('src', $(this).attr('data-thumbnail'));
                $('.berita-isi').html($(this).attr('data-isi'));
                $('.berita-tgl').text($(this).attr('data-tgl'));
            });
        });
    </script>
   <script>
        var slideImg = document.getElementById("slideImg");
        var images = [
            "{{ asset('assets/img/intersect.png') }}", // default image
            @foreach($hero as $h)
                "{{ asset('storage/'.$h->image) }}",
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

        // start langsung
        slider();
    </script>


    <script async src="//www.instagram.com/embed.js"></script>


    @stack('script')
    <!-- Back to top button -->
    <a href="#" class="back-to-top" id="backToTop">
        <i class="fas fa-arrow-up"></i>
    </a>

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
</body>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Slick Carousel JS -->
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!-- Inisialisasi Slider -->
<script>
    $(document).ready(function() {
        console.log('slider aktif');
        $('.slider-galeri').slick({
            slidesToShow: 2.8,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            infinite: true, // ✅ tambahkan ini
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var myCarousel = document.querySelector('#galeriCarousel');
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 3000,
            ride: 'carousel'
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var detailModal = document.getElementById('detailModal');
        detailModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;

            var title = button.getAttribute('data-title');
            var image = button.getAttribute('data-image');
            var date = button.getAttribute('data-date');

            detailModal.querySelector('#modalTitle').textContent = title;
            detailModal.querySelector('#modalImage').src = image;
            detailModal.querySelector('#modalDate').textContent = date;
        });
    });
</script>

</html>
