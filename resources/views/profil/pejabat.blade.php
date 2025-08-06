@include('landing._head')
@include('landing._navbar')

{{-- Konten Visi & Misi --}}
<section class="py-5 mt-5" style="margin-top: 80px !important;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="card shadow">
                    <div class="card-body p-4">

                        <!-- Label "Profil" -->
                        <span class="badge rounded-pill border border-danger text-danger px-3 py-1 mb-3">PROFIL</span>

                        <div class="text-center mb-4">
                            <h4 class="fw-bold text-primary">PEJABAT STRUKTURAL</h4>
                            <hr class="mx-auto" style="width: 100px; border: 2px solid #00bcd4;">
                        </div>

                        <div class="row text-center">
                            <!-- Kepala BPKAD -->
                            <div class="col-md-4 mb-4">
                                <div class="position-relative">
                                    <img src="{{ asset('assets/img/kaban-bpkad.jpg') }}" class="img-fluid rounded w-100"
                                        style="height: 300px; object-fit: cover;" alt="Kepala BPKAD">

                                    <div class="fw-bold text-uppercase bottom-0 w-100 text-white py-2 px-3"
                                        style="background-color: rgba(0, 0, 0, 0.5);">
                                        RAJU MINROPA, S.STP, M.Si</div>
                                </div>
                                <div>
                                    <div class="mt-2 fw-bold text-danger"><strong>KEPALA BPKAD</strong></div>
                                </div>

                            </div>

                            <!-- Sekretaris -->
                            <div class="col-md-4 mb-4">
                                <div class="position-relative">
                                    <img src="{{ asset('assets/img/sekretaris.jpg') }}" class="img-fluid rounded w-100"
                                        style="height: 300px; object-fit: cover;" alt="Sekretaris">
                                    <div class="fw-bold text-uppercase bottom-0 w-100 text-white py-2 px-3"
                                        style="background-color: rgba(0, 0, 0, 0.5);">
                                        ELVIRA, SE, Akt, M.Si</div>
                                </div>
                                <div>
                                    <div class="mt-2 fw-bold text-danger"><strong>SEKRETARIS</strong></div>
                                </div>

                            </div>

                            <!-- Kabid Anggaran -->
                            <div class="col-md-4 mb-4">
                                <div class="position-relative">
                                    <img src="{{ asset('assets/img/kabid-anggaran.jpg') }}" class="img-fluid rounded"
                                        alt="Kabid Anggaran BPKAD">
                                    <div class="position-absolute bottom-0 w-100 text-white py-2 px-3"
                                        style="background-color: rgba(0, 0, 0, 0.5);">
                                        <div class="fw-bold text-uppercase">AFIRDAL, SE</div>
                                    </div>
                                </div>
                                <div class="mt-2 fw-bold text-danger">KEPALA BIDANG ANGGARAN</div>
                            </div>
                        </div>





                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('landing._footer')