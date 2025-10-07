@include('landing._head')
@include('landing._navbar')

<section class="py-5 mt-5" style="margin-top: 80px !important;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                @php
                    // Warna cycling otomatis
                    $colors = ['primary', 'success', 'warning', 'danger', 'info', 'secondary'];
                @endphp

                @forelse($tupoksi as $index => $item)
                    @php
                        // Ambil warna berdasarkan urutan index
                        $badgeColor = $colors[$index % count($colors)];
                    @endphp

                    <div class="card shadow mb-5">
                        <div class="card-body p-4">

                            <!-- Badge dari Jabatan + warna otomatis -->
                            <span class="badge rounded-pill border border-{{ $badgeColor }} text-{{ $badgeColor }} px-3 py-1 mb-3">
                                {{ strtoupper($item->jabatan) }}
                            </span>

                            <!-- Judul -->
                            <h2 class="fw-bold">Tugas dan Fungsi {{ $item->jabatan }}</h2>
                            <hr class="my-3">

                            <!-- Deskripsi -->
                            <div style="font-size: 16px; text-align: justify;">
                                @if($item->deskripsi)
                                    <p>{{ $item->deskripsi }}</p>
                                @endif

                                @if($item->fungsi)
                                    <p>Untuk menyelenggarakan tugas tersebut, {{ $item->jabatan }} memiliki fungsi sebagai berikut:</p>
                                    <ol style="padding-left: 20px; line-height: 1.8;">
                                        @foreach(explode("\n", trim($item->fungsi)) as $f)
                                            @if($f)
                                                <li>{{ $f }}</li>
                                            @endif
                                        @endforeach
                                    </ol>
                                @endif
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="alert alert-info">Belum ada data Tupoksi.</div>
                @endforelse

            </div>
        </div>
    </div>
</section>

@include('landing._footer')
