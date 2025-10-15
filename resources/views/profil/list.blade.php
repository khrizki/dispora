@include('landing._head')
@include('landing._navbar')

{{-- Konten Berita --}}
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
                Semua Berita PERKIM Kota Padang
            </h3>
        </div>
        <div class="row g-4">
            @foreach ($beritaList as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="news-card">
                        <div class="news-card-image">
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul_berita }}" />
                            <div class="news-card-overlay"></div>
                            <span class="news-card-date">
                                <i class="far fa-calendar-alt"></i>
                                {{ \Carbon\Carbon::parse($item->tanggal_berita)->translatedFormat('d M Y') }}
                            </span>
                        </div>
                        <div class="news-card-content">
                            <div class="news-card-category">
                                <i class="fas fa-tag"></i> Kegiatan
                            </div>
                            <h5 class="news-card-title">{{ $item->judul_berita }}</h5>
                            <p class="news-card-text">{!! Str::limit(strip_tags($item->isi_berita), 100) !!}</p>
                            <a href="{{ route('berita.show', $item->id) }}" class="news-card-button">
                                Selengkapnya
                                <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <style>
            /* ==== NEWS CARD STYLES ==== */
            .news-card {
                background: #fff;
                border-radius: 16px;
                overflow: hidden;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                height: 100%;
                display: flex;
                flex-direction: column;
            }

            .news-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 12px 24px rgba(26, 43, 111, 0.15);
            }

            .news-card-image {
                position: relative;
                width: 100%;
                height: 240px;
                overflow: hidden;
            }

            .news-card-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.5s ease;
            }

            .news-card:hover .news-card-image img {
                transform: scale(1.08);
            }

            .news-card-overlay {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.4) 100%);
                opacity: 0;
                transition: opacity 0.3s ease;
            }

            .news-card:hover .news-card-overlay {
                opacity: 1;
            }

            .news-card-date {
                position: absolute;
                top: 16px;
                right: 16px;
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
                padding: 8px 16px;
                border-radius: 20px;
                font-size: 13px;
                font-weight: 500;
                color: #1a2b6f;
                display: flex;
                align-items: center;
                gap: 6px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            }

            .news-card-content {
                padding: 24px;
                display: flex;
                flex-direction: column;
                flex-grow: 1;
            }

            .news-card-category {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                background: linear-gradient(135deg, #1a2b6f 0%, #2d4a9e 100%);
                color: white;
                padding: 6px 14px;
                border-radius: 20px;
                font-size: 12px;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                width: fit-content;
                margin-bottom: 16px;
            }

            .news-card-title {
                font-family: 'Poppins', sans-serif;
                font-size: 18px;
                font-weight: 600;
                color: #1a1a1a;
                margin-bottom: 12px;
                line-height: 1.4;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .news-card-text {
                font-size: 14px;
                color: #666;
                line-height: 1.6;
                margin-bottom: 20px;
                flex-grow: 1;
            }

            .news-card-button {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                background: linear-gradient(135deg, #1a2b6f 0%, #2d4a9e 100%);
                color: white;
                padding: 12px 24px;
                border-radius: 8px;
                text-decoration: none;
                font-size: 14px;
                font-weight: 600;
                transition: all 0.3s ease;
                width: 100%;
                text-align: center;
            }

            .news-card-button:hover {
                background: linear-gradient(135deg, #152354 0%, #1a2b6f 100%);
                color: white;
                transform: translateX(4px);
                box-shadow: 0 4px 12px rgba(26, 43, 111, 0.3);
            }

            .news-card-button i {
                transition: transform 0.3s ease;
            }

            .news-card-button:hover i {
                transform: translateX(4px);
            }

            /* ==== PAGINATION STYLE ==== */
            .custom-pagination {
                display: flex;
                justify-content: center;
                margin-top: 50px;
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
                min-width: 40px;
                height: 40px;
                padding: 0 12px;
                border: 2px solid #e0e0e0;
                border-radius: 8px;
                background-color: #fff;
                color: #333;
                font-size: 14px;
                font-weight: 500;
                text-decoration: none;
                transition: all 0.3s ease;
            }

            .custom-pagination .pagination-link:hover {
                background: linear-gradient(135deg, #1a2b6f 0%, #2d4a9e 100%);
                color: white;
                border-color: #1a2b6f;
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(26, 43, 111, 0.2);
            }

            .custom-pagination .pagination-link.active {
                background: linear-gradient(135deg, #1a2b6f 0%, #2d4a9e 100%);
                color: white;
                border-color: #1a2b6f;
                box-shadow: 0 4px 12px rgba(26, 43, 111, 0.3);
            }

            .custom-pagination .pagination-link.disabled {
                color: #aaa;
                pointer-events: none;
                background-color: #f8f9fa;
                border-color: #e0e0e0;
            }

            .custom-pagination .pagination-ellipsis {
                border: none;
                background: transparent;
                pointer-events: none;
            }

            /* Responsive */
            @media (max-width: 768px) {
                .news-card-image {
                    height: 200px;
                }

                .news-card-title {
                    font-size: 16px;
                }

                .news-card-text {
                    font-size: 13px;
                }
            }
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