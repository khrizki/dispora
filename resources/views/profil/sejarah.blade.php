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
                        <h2 class="fw-bold">Sekilas Tentang PERKIM Kota Padang</h2>
                        <hr class="my-3">

                        <!-- Paragraf disamakan sejajar dengan judul -->
                        <div style="font-size: 16px; text-align: justify;">
                            <p>
                                Peraturan Daerah Nomor 90 Tahun 2020 Tentang Kedudukan,Susunan,Organisasi,
                                 Tugas, Fungsi dan Tata Kerja Dinas Perumahan Rakyat dan Kawasan Permukiman.
                            </p>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
</section>

@include('landing._footer')