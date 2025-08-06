<!DOCTYPE html>
<html lang="en">

@include('landing._head')



<body onload="slider()">

    <div class="preloader" style="background-color: rgb(199, 192, 192)">
        <div class="loading">
            <img src="{{ asset('assets/img/logo-head.png') }}" class="img-fluid" alt="Logo BPKAD" width="600">

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
                            <img class="d-block bg-100" src="{{ asset('assets/img/Intersect.png') }}" id="slideImg"
                                alt="First slide">
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



        <!-- VISI MISI  -->
        <section class="counter text-black" style="padding: 20px; margin-top: 7px;" id="visi">
            <div class="container my-5">
                <!-- Judul -->
                <div class="row text-center mb-4">
                    <div class="col-12">
                        <h2 style="font-weight: bold;">PROFIL</h2>
                        <div style="width: 80px; height: 3px; background-color: #212e60; margin: 10px auto;"></div>
                        <p>Selayang pandang tentang Badan Pengelolaan Keuangan dan Aset Daerah</p>
                    </div>
                </div>

                <!-- Isi Konten -->
                <div class="row align-items-center">
                    <!-- Kiri: Card -->
                    <div class="col-md-6">
                        <!-- Baris Pertama (Kata Sambutan & Profil) -->
                        <div class="row mb-4">
                            <div class="col-md-6 mb-3">
                                <a href="{{ route('profil.sejarah') }}" class="text-decoration-none">
                                    <div class="p-4 text-white text-center rounded h-100 fade-in-up card-animation-delay-2"
                                        style="background-color: #212e60;">
                                        <i class="fas fa-book fa-2x mb-2"></i>
                                        <h5 class="fw-bold">Profil</h5>
                                        <p style="font-size: 14px;">Sekilas Tentang BPKAD Kota Padang
                                            ...</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 mb-3">
                                <a href="{{ route('profil.visi-misi') }}" class="text-decoration-none">
                                    <div class="p-4 text-white text-center rounded h-100 fade-in-up card-animation-delay-4"
                                        style="background-color: #212e60;">
                                        <i class="fas fa-map fa-2x mb-2"></i>
                                        <h5 class="fw-bold">Visi dan Misi</h5>
                                        <p style="font-size: 14px;">Visi dan Misi BPKAD siap melayani ...</p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Baris Kedua (Organisasi & Visi Misi) -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <a href="{{ route('profil.tupoksi') }}" class="text-decoration-none">
                                    <div class="p-4 text-white text-center rounded h-100 fade-in-up card-animation-delay-4"
                                        style="background-color: #212e60;">
                                        <i class="fas fa-map fa-2x mb-2"></i>
                                        <h5 class="fw-bold">Tupoksi</h5>
                                        <p style="font-size: 14px;">Tugas Pokok dan Fungsi BPKAD Kota Padang ...</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 mb-3">
                                <a href="#organisasi" class="text-decoration-none">
                                    <div class="p-4 text-white text-center rounded h-100 fade-in-up card-animation-delay-3"
                                        style="background-color: #212e60;">
                                        <i class="fas fa-chart-pie fa-2x mb-2"></i>
                                        <h5 class="fw-bold">SIPKD</h5>
                                        <p style="font-size: 14px;">Sistem Informasi Pengelolaan Keuangan Daerah ...</p>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>

                    <!-- Kanan: Foto -->
                    <div class="col-md-6 text-center mt-4 mt-md-0">
                        <img src="{{ asset('assets/img/kaban-bpkad.jpg') }}"
                            class="img-fluid fade-in-up image-animation-delay" style="max-height: 450px;"
                            alt="Kepala BPKAD">

                    </div>
                </div>
            </div>
        </section>


    </div>
    </div>

    </div>
    </div>
    </section>

    <!-- ARTIKEL -->
    <section class="my-5">
        <div class="container">
            <div class="text-center mt-5">
                <h3 class="red">Berita Terbaru</h3>
                <p>Berita dan Artikel <b>BPKAD</b> Kota Padang</p>
                <hr class="line">
            </div>
            <div class="row g-4">
                @foreach ($beritaTerbaru as $berita)
                <div class="col-lg-4 col-md-6">
                    <div class="card shadow-sm position-relative h-100">
                        <span class="card-date-badge">
                            {{ \Carbon\Carbon::parse($berita->tanggal_berita)->translatedFormat('d F, Y') }}
                        </span>
                        <img src="{{ asset('storage/' . $berita->foto) }}" alt="..." />

                        <div class="card-body d-flex flex-column">
                            <div class="card-category"><i class="fas fa-tag me-1"></i> Kegiatan</div>
                            <h5 class="card-title">{{ $berita->judul_berita }}</h5>
                            <p class="card-text mt-2">{!! Str::limit(strip_tags($berita->isi_berita), 100) !!}</p>

                            <div class="mt-auto">
                                <a href="{{ route('berita.show', $berita->id) }}" class="btn btn-primary btn-sm mt-2">
                                    Lihat Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- VIDEO -->
    <section class="store-adventeges" id="adventeges">
        <div class="container">
            <div class="row align-content-center">
                <div class="col-12 mt-4 text-center"><br>
                    <h3 class="red">Video Terbaru</h3>
                    <p>Video Terbaru <b>BPKAD</b> Kota Padang </p>
                    <hr class="line">
                </div>

                @forelse ($video as $item)
                <div class="col-md-4 col-sm-12 mb-4 text-center">
                    <h5>{{ $item->judul_video }}</h5>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item"
                            src="https://www.youtube.com/embed/{{ \Illuminate\Support\Str::after($item->video, 'youtu.be/') }}"
                            allowfullscreen></iframe>
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
                    <h3 class="red">Galeri dan Dokumentasi</h3>
                    <p>Galeri dan Dokumentasi Kegiatan <span class="badge bg-warning text-dark">BPKAD</span> Kota Padang
                    </p>
                    <hr class="line">
                </div>
            </div>

            <div class="card p-4 mt-3">
                <div class="slider-galeri">
                    @foreach($galeri as $item)
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



    <!-- KONTAK -->
    <section class="store-adventeges" id="adventeges">
        <div class="container-fluid kontak">
            <div class="row text-center">
                <div class="col-12"><br>
                    <h3 style="color:#212e60;"> Kontak Kami</h3>
                    <h6>bpkad.padang@padang.go.id</h6>
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
                            <div class="row justify-content-center">
                                <div class="container-iframe">


                                    <iframe class="iframe-maps"
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d249.3293020282383!2d100.36135714989892!3d-0.950922487903041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b98a5d0c2c4b%3A0xe17da72ba314994f!2sBadan%20Pengelolaan%20Keuangan%20dan%20Aset%20Daerah%20Kota%20Padang!5e0!3m2!1sid!2sid!4v1751943541611!5m2!1sid!2sid"
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

    {{-- <div id="modal-survey" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title berita-title">Berikan Penilaian Anda</h5>
          <button class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('survey.user.store')}}" id="formSurvey" method="post">
    @csrf


    <hr class="border-bottom border-secondary" />
    <div class="row form-group align-items-center">
        <div class="col-3">
            <label class="form-label mb-0 required">Nama <span class="text-danger">*</span></label>
        </div>
        <div class="col-9">
            <input type="text" class="form-control" name="nama" placeholder="mis. Haryani" required />
        </div>
    </div>

    <div class="row form-group align-items-center">
        <div class="col-3">
            <label class="form-label mb-0">No HP <span class="text-danger">*</span></label>
        </div>
        <div class="col-9">
            <input type="text" class="form-control" name="nohp" required placeholder="mis. 08xxx" type="tel" />
        </div>
    </div>
    <div>
        <div><label class="form-label mb-0">Pesan, Kritik & Saran <span class="text-danger">*</span></label></div>
        <textarea name="pesan" class="form-control" required placeholder="mis. Sangat Membantu.."></textarea>
        <hr class="border-bottom border-secondary" />
    </div>
    <div class="d-grid">
        <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-paper-plane"></i>
            Kirimkan</button>
    </div>

    </form>


    </div>
    <div class="card">
        <img class="card-img-top w-100 berita-img" src="assets/img/1123123 1.png" alt="">
        <div class="card-body">
            <div class="card-text berita-isi">Content</div>
        </div>
        <img class="card-img-bottom" src="" alt="">
    </div>
    <div class="modal-footer berita-tgl">

    </div>
    </div>
    </div>
    </div> --}}

    <!-- Highlight modal artikel -->


    <!-- Bootstrap core JavaScript -->

    <!-- scripts -->
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
        var images = new Array(
            "{{ asset('assets/img/Intersect.png') }}",
            "{{ asset('assets/img/balai_kota_lama.png') }}"
        );

        var len = images.length;
        var i = 0;

        function slider() {
            if (i > len - 1) {
                i = 0;
            }
            slideImg.src = images[i];
            i++;
            setTimeout('slider()', 4000);
        }
    </script>


    @stack('script')
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

</html>