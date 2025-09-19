<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}" type="image/png">

    <!-- Title -->
    <title>PERKIM KOTA PADANG</title>

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="{{ asset('assets/style/main.css') }}" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- jCarousel CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/jquery/jcarousel.responsive.css') }}">

    <!-- jQuery & jCarousel Scripts -->
    <script src="{{ asset('assets/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery/jquery.jcarousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery/jcarousel.responsive.js') }}"></script>


    {{-- <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/css/star-rating.min.css" media="all"
    rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/themes/krajee-svg/theme.css"
    media="all" rel="stylesheet" type="text/css" /> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

    <link rel="preload" href="{{ asset('assets/img/logo-head.png') }}" as="image">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/3.2.0/jquery.rateyo.min.css">

    <!-- JS RateYo -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/3.2.0/jquery.rateyo.min.js"></script>
    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />


    <style type="text/css">
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: #fff;
        }

        .preloader .loading {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font: 14px arial;
        }

        .info-banner {
            background-color: transparent;
            color: #dc3545;
            /* ubah warna teks jadi merah agar tetap terlihat */
            padding: 6px 0;
            font-size: 15px;
            font-weight: bold;
            text-align: center;
            z-index: 1040;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
        }

        .slider-galeri .slick-slide {
            padding: 0 10px;
        }

        .slider-galeri img.galeri-img {
            height: 200px;
            object-fit: cover;
        }

        .red {
            color: #93192C;
        }

        .line {
            width: 100px;
            height: 3px;
            background-color: #93192C;
            margin: 10px auto;
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .card-date-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: red;
            color: white;
            padding: 4px 8px;
            font-size: 13px;
            font-weight: bold;
            border-radius: 3px;
        }

        .card-category {
            color: red;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .card-title {
            font-weight: 700;
            font-size: 18px;
        }

        .card-text {
            font-size: 14px;
            color: #666;
        }

        .custom-table tbody tr:nth-child(odd) {
            background-color: #f8f9fa;
            /* abu muda */
        }

        .custom-table tbody tr:nth-child(even) {
            background-color: #e9ecef;
            /* abu agak gelap */
        }

        /* Hover effect */
        .custom-table tbody tr:hover {
            background-color: #cce5ff !important;
            /* biru muda saat hover */
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        /* Judul tabel */
        .custom-table thead {
            background-color: #004085;
            color: #fff;
        }

        /* Border tabel lebih halus */
        .custom-table th,
        .custom-table td {
            border: 1px solid #dee2e6;
            vertical-align: middle;
        }
    </style>
    <!-- Font Awesome untuk icon panah -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
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
            display: none;
            /* Awalnya disembunyikan */
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            opacity: 0;
            transition: all 0.3s ease;
            z-index: 999;
        }

        .back-to-top:hover {
            background-color: #0f1a4b;
            transform: translateY(-3px);
        }

        .back-to-top.active {
            opacity: 1;
            display: flex;
            /* Muncul saat aktif */
        }
    </style>
</head>
