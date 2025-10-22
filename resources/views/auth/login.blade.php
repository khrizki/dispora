<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="icon" href="{{ asset('assets/img/logo.png') }}" type="image/icon type">
  <title>Sign In | DISPORA Kota Padang</title>

  <!-- Libraries -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <link href="{{ asset('assets/style/main.css') }}" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

  <style>
    /* Layout utama */
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: 'Poppins', sans-serif;
    }

    .page-auth {
      position: relative;
      min-height: 100vh;
      background: url('{{ asset('assets/img/DJI_0069.JPG') }}') center center / cover no-repeat;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    /* Lapisan semi-transparan di belakang form */
    .form-overlay {
      background: rgba(255, 255, 255, 0.9);
      border-radius: 20px;
      padding: 40px 30px;
      box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.25);
      backdrop-filter: blur(8px);
      width: 100%;
      max-width: 400px;
      z-index: 2;
    }

    /* Header kiri (judul besar) */
    .header-text {
      text-align: right;
      color: white;
      text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.6);
    }

    .header-text h1 {
      font-size: 3rem;
      margin-bottom: -5px;
      font-weight: 700;
    }

    .header-text h3 {
      font-size: 1.8rem;
      font-weight: 400;
    }

    /* Form */
    .form-overlay label {
      display: block;
      text-align: left;
      color: #333;
      font-weight: 600;
      margin-bottom: 5px;
    }

    .input-cari {
      width: 100%;
      padding: 10px 12px;
      border-radius: 8px;
      border: 1px solid #ccc;
      outline: none;
      transition: 0.3s;
      margin-bottom: 15px;
    }

    .input-cari:focus {
      border-color: #dc3545;
      box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
    }

    .btn-danger {
      width: 100%;
      padding: 10px;
      border-radius: 8px;
      font-weight: 600;
    }

    /* Responsive Layout */
    .login-container {
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 40px;
      width: 90%;
      max-width: 1100px;
    }

    @media (max-width: 992px) {
      .login-container {
        flex-direction: column;
        text-align: center;
      }

      .header-text {
        text-align: center;
      }

      .header-text h1 {
        font-size: 2.3rem;
      }

      .header-text h3 {
        font-size: 1.4rem;
      }

      .form-overlay {
        margin-top: 20px;
        padding: 30px 25px;
      }
    }

    @media (max-width: 576px) {
      .header-text h1 {
        font-size: 1.9rem;
      }

      .header-text h3 {
        font-size: 1.2rem;
      }

      .form-overlay {
        padding: 25px;
      }
    }
  </style>
</head>

<body>

  <!-- Preloader -->
  <div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>

  <!-- Halaman utama -->
  <div class="page-home page-auth">
    <div class="login-container">
      <!-- Kiri: Judul -->
      <div class="row align-items-center row-login"> 
        <!-- img --> 
         <div class="col-lg-7 text-end"> 
            <!-- <div class="typewriter"> --> 
                <h1 class="text-right text-stroke animate__animated animate__backInDown" style="margin-bottom:-8px;color: #FFFFFF;">
                    DISPORA
                </h1>
                <h3 class="text-right animate__animated animate__backInDown" style="margin-bottom:-8px;color: #FFFFFF;">
                    Kota Padang 
                </h3> 
            <!-- </div> --> 
        </div>

    <!-- Kanan: Form Login -->
    <div class="col-lg-5"> 
        <div class="card-login"> 
            <!-- <a href="{{ route('landing') }}"> --> 
                <img src="{{ asset('assets/img/logo-head-DISPORA.png') }}" alt="Logo DISPORA" class="m6666666b-4 d-block mx-auto" style="width: 1000px; max-width: 100%; height: auto;"> 
            <!-- </a> --> 
            <!-- {
                {-- @include('includes.alert') --}
            }  -->
            <form action="{{ route('login') }}" method="POST" class="mt-3"> 
                @csrf 
                <div class="form-group"> 
                    <label style="float: left; color: #FFFFFF" for="nip">Email</label>
                    <input type="email" value="{{ old('email') }}" name="email" id="nip" placeholder="Masukkan Email" class="w-100 input-cari" required /> @error('email')
                    <span class="invalid-feedback" role="alert"> 
                        <strong>
                            {
                                { $message }
                            }
                        </strong> 
                    </span> 
                    @enderror
                </div> 
                <div class="form-group"> 
                    <label style="float: left; color: #FFFFFF" for="nip">Password</label>
                    <input type="password" name="password" id="password" placeholder="Masukkan Password" class="w-100 input-cari" required />
                 </div> 
                 <button 
                    type="submit" 
                    name="login" 
                    class="btn btn-danger w-100 mt-2 py-2">
                    Sign In
                </button> 
                </form> 
            </div> 
        </div> 
    </div> 
</div>
</div>

  <!-- Script -->
  <script src="{{ asset('assets/vendor/jquery/jquery.slim.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>
    AOS.init();

    var sessionSuccess = "{{ session('success') }}";
    var sessionError = "{{ session('error') }}";
    if (sessionSuccess) toastr.success(sessionSuccess);
    if (sessionError) toastr.warning(sessionError);

    toastr.options = {
      "progressBar": true,
      "positionClass": "toast-top-right",
      "timeOut": "3500"
    }

    document.addEventListener("DOMContentLoaded", () => {
      setTimeout(() => document.body.classList.add("loaded"), 10);
    });
  </script>

</body>
</html>
