<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}" type="image/icon type">
    <title>Sign In | PERKIM Kota Padang</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="{{ asset('assets/style/main.css') }}" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>
    <!-- start preloader -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- end preloader -->

    <!-- page content -->
    <div class="page-home page-auth">
        <section class="store-auth">
            <div class="container-background">
                <img class="d-block bg-100" src="{{ asset('assets/img/DJI_0069.JPG') }}" alt="First slide"
                    id="lg-img">
            </div>
            <div class="landing-page-container">

                <div class="row align-items-center row-login">
                    <!-- img -->
                    <div class="col-lg-7 text-end">
                        <!-- <div class="typewriter"> -->
                        <h1 class="text-right text-stroke animate__animated animate__backInDown"
                            style="margin-bottom:-8px;color: #FFFFFF;">PERKIM</h1>
                        <h3 class="text-right animate__animated animate__backInDown"
                            style="margin-bottom:-8px;color: #FFFFFF;">Kota Padang
                        </h3>
                        <!-- </div> -->
                    </div>
                    <div class="col-lg-5">
                        <div class="card-login">
                            <a href="{{ route('landing') }}">
                                <img src="{{ asset('assets/img/logo-head.png') }}" class="w-100 mb-5" alt="">
                            </a>


                            {{-- @include('includes.alert') --}}
                            <form action="{{ route('login') }}" method="POST" class="mt-3">
                                @csrf
                                <div class="form-group">

                                    <label style="float: left; color: #FFFFFF" for="nip">Email</label>
                                    <input type="email" value="{{ old('email') }}" name="email" id="nip"
                                        placeholder="Masukkan Email" class="w-100 input-cari" required />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="form-group">

                                    <label style="float: left; color: #FFFFFF" for="nip">Password</label>
                                    <input type="password" name="password" id="password"
                                        placeholder="Masukkan Password" class="w-100 input-cari" required />
                                </div>
                                <button type="submit" name="login" class="btn btn-danger w-75 mt-2">Sign In</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

    <!-- footer -->

    <!-- akhir footer -->

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('assets/vendor/jquery/jquery.slim.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        AOS.init();
    </script>
    <!-- preloader -->
    <script>
        var sessionSuccess = "{{ session('success') }}";
        var sessionError = "{{ session('error') }}";
        if (sessionSuccess != '') {
            toastr.success(sessionSuccess);
        }
        if (sessionError != '') {
            toastr.warning(sessionError);
        }

        // toast options
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "2500",
            "timeOut": "3500",
            "extendedTimeOut": "5000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() {
                document.querySelector("body").classList.add("loaded");
            }, 10)
        });
    </script>
    <script src="{{ asset('assets/js/navbar-scroll.js') }}"></script>
</body>

</html>
