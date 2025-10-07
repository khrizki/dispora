<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}" type="image/png">
    <title>PERKIM Kota Padang</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- WAJIB UNTUK RESPONSIVE -->
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            background-color: #f5f5f5;
            text-align: center; /* Agar teks di tengah */
        }

        .header {
            display: flex;
            align-items: center;
            gap: 20px;
            animation: slideFromTop 1.5s ease-out forwards;
            opacity: 0;
        }

        .header img {
            width: 80px;
        }

        .text-logo .title {
            font-size: 28px;
            color: #000;
        }

        .text-logo .subtitle {
            font-size: 18px;
            font-weight: bold;
            color: #888;
            margin-top: 5px;
        }

        .line {
            width: 60%;
            height: 2px;
            background: linear-gradient(to right, red, black, gold);
            margin: 30px auto;
        }

        .btn-hal-utama {
            display: inline-block;
            padding: 10px 24px;
            font-weight: bold;
            color: red;
            background-color: white;
            border: 1px solid #aaa;
            border-radius: 999px;
            text-decoration: none;
            font-size: 14px;
            animation: slideFromBottom 1.5s ease-out forwards;
            opacity: 0;
            margin-bottom: 20px; /* Tambahan biar tidak mepet bawah */
        }

        .btn-hal-utama:hover {
            background-color: #212e60;
            color: white;
        }

        /* RESPONSIVE UNTUK MOBILE */
        @media (max-width: 600px) {
            .header {
                flex-direction: column;
                gap: 10px;
            }

            .header img {
                width: 60px;
            }

            .text-logo .title {
                font-size: 22px;
            }

            .text-logo .subtitle {
                font-size: 14px;
            }

            .line {
                width: 80%;
            }

            .btn-hal-utama {
                padding: 12px 30px;
                font-size: 16px;
            }
        }

        @keyframes slideFromTop {
            0% { transform: translateY(-100vh); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }

        @keyframes slideFromBottom {
            0% { transform: translateY(100vh); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo BPKAD">
        <div class="text-logo">
            <div class="title">perkim.padang.go.id</div>
            <div class="subtitle">PORTAL RESMI PERKIM KOTA PADANG</div>
        </div>
    </div>

    <div class="line"></div>

    <a href="{{ route('beranda') }}" class="btn-hal-utama">HALAMAN UTAMA</a>
</body>
<script async src="//www.instagram.com/embed.js"></script>

</html>
