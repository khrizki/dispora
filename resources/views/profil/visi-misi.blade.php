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

                        <!-- Judul -->
                        <h2 class="fw-bold">Visi dan Misi PERKIM Kota Padang</h2>
                        <hr class="my-3">

                        <!-- Visi -->
                        <h5 class="fw-bold text-primary">VISI</h5>
                        <p style="font-size: 16px;">
                            “Terwujudnya Sarana dan Prasarana Pemerintahan, Perumahan dan Kawasan Permukiman Yang Berkualitas”
                        </p>

                        <!-- Misi -->
                        <h5 class="fw-bold text-primary mt-4">MISI</h5>
                        <ol class="ps-3" style="line-height: 1.8; font-size: 16px;">
                            <li>Mewujudkan Perumahan Rakyat dan Kawasan Permukiman yang Serasi, Selaras dan Seimbang.</li>
                            <li>Mewujudkan Sarana Prasarana Bangunan Pemerintah yang Serasi, Selaras dan Seimbang.</li>
                        </ol>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@include('landing._footer')
