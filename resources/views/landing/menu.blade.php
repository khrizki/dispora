<!DOCTYPE html>
<html lang="en">

@include('landing._head')

<body>

    <div class="preloader" style="background-color: rgb(199, 192, 192)">
        <div class="loading">
            <img src="assets/img/logo-head1.png" width="600px">
        </div>
    </div>
    <!-- NAVBAR -->
    @include('landing._navbar')

    <div class="page-home">

        {!!$data!!}

    </div>
    <!-- footer -->
    @include('landing._footer')
    <!-- akhir footer -->

    <!-- modal -->
    <div id="modal-berita" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
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

    <div id="modal-survey" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title berita-title">Berikan Penilaian Anda</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="mb-2">
                        <div class="text-center small fw-bold">Waktu Tunggu</div>
                        <div class="text-center">
                            <input name="" class="my-rating rating-loading" data-show-clear="false" data-step="1"
                                required>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="text-center small fw-bold">Keramahan</div>
                        <div class="text-center">
                            <input name="" class="my-rating rating-loading" data-show-clear="false" data-step="1"
                                required>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="text-center small fw-bold">Pelayanan</div>
                        <div class="text-center">
                            <input name="" class="my-rating rating-loading" data-show-clear="false" data-step="1"
                                required>
                        </div>
                    </div>

                    <hr class="border-bottom border-secondary" />
                    <div class="row form-group align-items-center">
                        <div class="col-3">
                            <label class="form-label mb-0 required">Nama<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control" name="nama" placeholder="mis. Haryani" required />
                        </div>
                    </div>

                    <div class="row form-group align-items-center">
                        <div class="col-3">
                            <label class="form-label mb-0">No HP</label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control" name="phone" placeholder="mis. 08xxx" type="tel" />
                        </div>
                    </div>
                    <div>
                        <div><label class="form-label mb-0">Pesan, Kritik & Saran</label></div>
                        <textarea name="message" class="form-control" placeholder="mis. Sangat Membantu.."></textarea>
                        <hr class="border-bottom border-secondary" />
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-paper-plane"></i>
                            Kirimkan</button>
                    </div>

                </div>
                {{-- <div class="card">
            <img class="card-img-top w-100 berita-img" src="assets/img/1123123 1.png" alt="">
            <div class="card-body">
              <div class="card-text berita-isi">Content</div>
            </div>
            <img class="card-img-bottom" src="" alt="">
          </div> --}}
            </div>
            <div class="modal-footer berita-tgl">

            </div>
        </div>
    </div>
    </div>

    <!-- Bootstrap core JavaScript -->

    <!-- scripts -->
    <script src="assets/particles.js"></script>
    <script src="assets/app.js"></script>
    {{-- <script src="{{asset('assets/vendor/jquery/jquery.slim.min.js')}}"></script> --}}

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/js/star-rating.min.js"
        type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/themes/krajee-svg/theme.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="assets/js/navbar-scroll.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('.preloader').fadeOut(1000);

            $('.my-rating').rating({
                clearCaption: 'Berikan penilaian',
                starCaptions: {
                    1: 'Sangat Tidak Puas',
                    2: 'Tidak Puas',
                    3: 'Cukup',
                    4: 'Puas',
                    5: 'Sangat Puas'
                }
            })
        })
    </script>
    @stack('script')
</body>
<script async src="//www.instagram.com/embed.js"></script>

</html>