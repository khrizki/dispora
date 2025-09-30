@include('landing._head')
@include('landing._navbar')

<section class="py-5 mt-5" style="margin-top: 80px !important;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="card shadow">
                    <div class="card-body p-4">

                        <span class="badge rounded-pill border border-danger text-danger px-3 py-1 mb-3">PROFIL</span>

                        <h2 class="fw-bold">Visi dan Misi PERKIM Kota Padang</h2>
                        <hr class="my-3">

                        @if($data)
                            <!-- Visi -->
                            <h5 class="fw-bold text-primary">VISI</h5>
                            <p style="font-size: 16px;">
                                {{ $data->visi ?? '-' }}
                            </p>

                            <!-- Misi -->
                            @if($data->misi)
                                <h5 class="fw-bold text-primary mt-4">MISI</h5>
                                <ol class="ps-3" style="line-height: 1.8; font-size: 16px;">
                                    @foreach(explode("\n", $data->misi) as $item)
                                        @if(trim($item) !== '')
                                            <li>{{ trim($item) }}</li>
                                        @endif
                                    @endforeach
                                </ol>
                            @endif
                        @else
                            <p class="text-muted">Data visi & misi belum tersedia.</p>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@include('landing._footer')
