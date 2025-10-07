@include('landing._head')
@include('landing._navbar')

<section class="py-5 mt-5" style="margin-top: 80px !important;">
    <div class="container">

        <div style="text-align:center;">
            <h3
                style="
                    display:inline-block;
                    padding:10px 20px;
                    border:2px solid #1a2b6f;
                    border-radius:8px;
                    background-color:#f8f9fa;
                    font-family:'Poppins', sans-serif;
                    font-weight:600;
                    box-shadow:0px 4px 6px rgba(0,0,0,0.1);
                    margin:20px auto;
                ">
                Lowongan Kerja PERKIM Kota Padang
            </h3>
        </div>

        <div class="row">
            @forelse ($lowonganList as $item)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-sm position-relative h-100">

                        {{-- Badge Tipe --}}
                        <span class="position-absolute top-0 start-0 m-2 px-3 py-1 text-white rounded"
                            style="background-color: {{ $item->tipe == 'magang' ? '#28a745' : '#1a2b6f' }};">
                            {{ ucfirst($item->tipe) }}
                        </span>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <p class="text-muted mb-1"><i class="fas fa-briefcase me-1"></i> {{ $item->posisi ?? '-' }}</p>
                            <p class="text-muted mb-2"><i class="fas fa-map-marker-alt me-1"></i> {{ $item->lokasi ?? '-' }}</p>

                            <p class="card-text mt-2">
                                {!! Str::limit(strip_tags($item->deskripsi), 100) !!}
                            </p>

                            <div class="mt-auto">
                                <button class="btn btn-primary btn-sm mt-2" data-toggle="modal"
                                    data-target="#lowonganModal{{ $item->id }}">
                                    More
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Modal Detail --}}
                <div class="modal fade" id="lowonganModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ $item->judul }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Posisi:</strong> {{ $item->posisi ?? '-' }}</p>
                                <p><strong>Lokasi:</strong> {{ $item->lokasi ?? '-' }}</p>
                                <p><strong>Tipe:</strong> {{ ucfirst($item->tipe) }}</p>
                                <hr>
                                {!! $item->deskripsi !!}
                            </div>~
                            <div class="modal-footer">
                                <a href="perkim@padang.go.id" class="btn btn-success">Kirim Lamaran via Email</a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>

            @empty
                <div class="col-12 text-center">
                    <p>Belum ada lowongan tersedia.</p>
                </div>
            @endforelse
        </div>

    </div>
</section>

@include('landing._footer')
