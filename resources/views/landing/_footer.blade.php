<footer class="text-center text-lg-start">
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-1">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-2 text-left"> PERKIM KOTA PADANG </h6>
                    <p class="text-left text-white">{{ $setting['alamat'] ?? '' }}</p>
                    <p class="text-left text-white"><i class="bi bi-telephone-forward-fill"></i>
                        (0751)890757
                    </p>
                    <p class="text-left text-white"><i class="bi bi-envelope-at-fill"></i> disprkpp@padang.go.id
                    </p>
                    <h6 class="text-uppercase fw-bold mb-2 text-left">media sosial: </h6>
                    <h5 class="text-left">
                        <a href="#" class="me-4 pl-1 text-white"> <i class="bi bi-facebook"></i> </a>
                        <a href="#" class="me-4 pl-1 text-white"> <i class="bi bi-twitter"></i> </a>
                        <a href="#" class="me-4 pl-1 text-white"> <i class="bi bi-google"></i></a>
                        <a href="https://www.instagram.com/dinas_perkim_kotapadang/" class="me-4 pl-1 text-white"> <i class="bi bi-instagram"></i> </a>
                        <a href="#" class="me-4 pl-1 text-white"> <i class="bi bi-linkedin"></i> </a>
                        <a href="#" class="me-4 pl-1 text-white"> <i class="bi bi-whatsapp"></i> </a>
                    </h5>
                </div> <!-- Grid column -->
                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase text-left fw-bold mb-4">Useful Links</h6>
                    <a href="https://perkim.padang.go.id" target="_blank" rel="noopener noreferrer" class="">
                        <p class="text-left text-white">Website Dinas PERKIM Padang
                        </p>
                    </a>
                    <a href="https://sirumahkita.padang.go.id/geoportal/" target="_blank" rel="noopener noreferrer" class="">
                        <p class="text-left text-white">Geoportal
                        </p>
                    </a>
                    <a href="https://sirumahkita.padang.go.id/pelaporan/buatlaporan/" target="_blank" rel="noopener noreferrer" class="">
                        <p class="text-left text-white">Pelaporan
                        </p>
                    </a>
                </div> <!-- Grid column -->
                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->

                    <h6 class="text-uppercase text-left fw-bbold mb-4"> Other Website </h6>
                    <a href="https://sirumahkita.padang.go.id" target="_blank" rel="noopener noreferrer" class="">
                        <p class="text-left text-white">SIRUMAH KITA </p>
                    </a>
                    <a href="https://sikasper.padang.go.id/" target="_blank" rel="noopener noreferrer" class="">
                        <p class="text-left text-white">SIKASPER </p>
                    </a>

                </div> <!-- Grid column -->
                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase text-left fw-bold mb-4">Informasi Terkait</h6>
                    <a href="https://padang.go.id/" target="_blank" rel="noopener noreferrer" class="">
                        <p class="text-left text-white">Pemkot Padang</p>
                    </a>

                </div> <!-- Grid column -->
            </div> <!-- Grid row -->
        </div>
    </section> <!-- Section: Links  -->
    <!-- Copyright -->

    <div class="text-center p-2"> &copy; Copyright {{ date('Y') }}
        <a href="#" target="_blank" rel="noopener noreferrer" class="text-white">DISKOMINFO KOTA PADANG</a>
    </div> <!-- Copyright -->

    <a href="#" class="back-to-top" id="backToTop">
        <i class="fas fa-arrow-up"></i>
    </a>
    <script>
        // Back to top button untuk semua halaman
        document.addEventListener('DOMContentLoaded', function() {
            const backToTopButton = document.getElementById('backToTop');

            if (backToTopButton) {
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
            }
        });
    </script>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
