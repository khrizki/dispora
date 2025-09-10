@include('landing._head')
@include('landing._navbar')

{{-- Konten Visi & Misi --}}
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
                Semua Berita BPKAD Kota Padang
            </h3>
        </div>
        <div class="row">
            @foreach ($beritaList as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="card shadow-sm position-relative h-100">
                        <span class="card-date-badge">
                            {{ \Carbon\Carbon::parse($item->tanggal_berita)->translatedFormat('d F, Y') }}
                        </span>
                        <img src="{{ asset('storage/' . $item->foto) }}" alt="..." class="card-img-top"
                            style="height: 200px; object-fit: cover;" />

                        <div class="card-body d-flex flex-column">
                            <div class="card-category"><i class="fas fa-tag me-1"></i> Kegiatan</div>
                            <h5 class="card-title">{{ $item->judul_berita }}</h5>
                            <p class="card-text mt-2">{!! Str::limit(strip_tags($item->isi_berita), 100) !!}</p>

                            <div class="mt-auto">
                                <a href="{{ route('berita.show', $item->id) }}" class="btn btn-primary btn-sm mt-2">
                                    Lihat Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <style>
            /* ==== UPDATED PAGINATION STYLE ==== */
            .custom-pagination {
                display: flex;
                justify-content: center;
                margin-top: 30px;
                font-family: 'Poppins', sans-serif;
            }

            .custom-pagination .pagination-list {
                display: flex;
                gap: 8px;
                list-style: none;
                padding: 0;
                margin: 0;
                align-items: center;
            }

            .custom-pagination .pagination-item {
                display: flex;
            }

            .custom-pagination .pagination-link,
            .custom-pagination .pagination-ellipsis {
                display: flex;
                align-items: center;
                justify-content: center;
                min-width: 36px;
                height: 36px;
                padding: 0 12px;
                border: 1px solid #ddd;
                border-radius: 6px;
                background-color: #fff;
                color: #333;
                font-size: 14px;
                text-decoration: none;
                transition: all 0.2s ease;
            }

            .custom-pagination .pagination-link:hover {
                background-color: #1a2b6f;
                color: white;
                border-color: #1a2b6f;
            }

            .custom-pagination .pagination-link.active {
                background-color: #1a2b6f;
                color: white;
                border-color: #1a2b6f;
            }

            .custom-pagination .pagination-link.disabled {
                color: #aaa;
                pointer-events: none;
                background-color: #f8f9fa;
            }

            .custom-pagination .pagination-ellipsis {
                border: none;
                background: transparent;
                pointer-events: none;
            }

            /* Card badge style */
        </style>

        <div class="custom-pagination">
            <ul class="pagination-list">
                {{-- Previous Link --}}
                <li class="pagination-item">
                    <a href="{{ $beritaList->previousPageUrl() }}"
                        class="pagination-link {{ $beritaList->onFirstPage() ? 'disabled' : '' }}">
                        Previous
                    </a>
                </li>

                {{-- First Page --}}
                <li class="pagination-item">
                    <a href="{{ $beritaList->url(1) }}"
                        class="pagination-link {{ $beritaList->currentPage() == 1 ? 'active' : '' }}">
                        1
                    </a>
                </li>

                {{-- Middle Pages --}}
                @php
                    $start = max(2, $beritaList->currentPage() - 1);
                    $end = min($beritaList->lastPage() - 1, $beritaList->currentPage() + 2);

                    if ($start > 2) {
                        echo '<li class="pagination-item"><span class="pagination-ellipsis">-</span></li>';
                    }

                    for ($i = $start; $i <= $end; $i++) {
                        echo '<li class="pagination-item">';
                        echo '<a href="' .
                            $beritaList->url($i) .
                            '" class="pagination-link ' .
                            ($beritaList->currentPage() == $i ? 'active' : '') .
                            '">';
                        echo $i;
                        echo '</a>';
                        echo '</li>';
                    }

                    if ($end < $beritaList->lastPage() - 1) {
                        echo '<li class="pagination-item"><span class="pagination-ellipsis">-</span></li>';
                    }
                @endphp

                {{-- Last Page --}}
                @if ($beritaList->lastPage() > 1)
                    <li class="pagination-item">
                        <a href="{{ $beritaList->url($beritaList->lastPage()) }}"
                            class="pagination-link {{ $beritaList->currentPage() == $beritaList->lastPage() ? 'active' : '' }}">
                            {{ $beritaList->lastPage() }}
                        </a>
                    </li>
                @endif

                {{-- Next Link --}}
                <li class="pagination-item">
                    <a href="{{ $beritaList->nextPageUrl() }}"
                        class="pagination-link {{ !$beritaList->hasMorePages() ? 'disabled' : '' }}">
                        Next
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>

@include('landing._footer')
