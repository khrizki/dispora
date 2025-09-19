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
                Semua Galeri PERKIM Kota Padang
            </h3>
        </div>
        <div class="row">
            @foreach ($galeriList as $item)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card galeri-card h-100 border-0 shadow-sm" style="background-color: #e3f2fd;">
                        <div class="card-img-container">
                            <img src="{{ asset('storage/' . $item->foto_galery) }}" alt="{{ $item->judul_galery }}"
                                class="card-img-top" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center" style="font-size: 13px">{{ $item->judul_galery }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <style>
            .galeri-card {
                border-radius: 12px;
                overflow: hidden;
                background-color: #f9fafc;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                box-shadow: 0 3px 8px rgba(0, 0, 0, 0.05);
            }

            .galeri-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
                background-color: #ffffff;
            }

            .card-img-container {
                height: 220px;
                overflow: hidden;
            }

            .card-img-container img {
                height: 100%;
                width: 100%;
                object-fit: cover;
                transition: transform 0.4s ease;
            }

            .galeri-card:hover .card-img-container img {
                transform: scale(1.05);
            }

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
        </style>

        <div class="custom-pagination">
            <ul class="pagination-list">
                {{-- Previous Link --}}
                <li class="pagination-item">
                    <a href="{{ $galeriList->previousPageUrl() }}"
                        class="pagination-link {{ $galeriList->onFirstPage() ? 'disabled' : '' }}">
                        Previous
                    </a>
                </li>

                {{-- First Page --}}
                <li class="pagination-item">
                    <a href="{{ $galeriList->url(1) }}"
                        class="pagination-link {{ $galeriList->currentPage() == 1 ? 'active' : '' }}">
                        1
                    </a>
                </li>

                {{-- Middle Pages --}}
                @php
                    $start = max(2, $galeriList->currentPage() - 1);
                    $end = min($galeriList->lastPage() - 1, $galeriList->currentPage() + 2);

                    if ($start > 2) {
                        echo '<li class="pagination-item"><span class="pagination-ellipsis">-</span></li>';
                    }

                    for ($i = $start; $i <= $end; $i++) {
                        echo '<li class="pagination-item">';
                        echo '<a href="' .
                            $galeriList->url($i) .
                            '" class="pagination-link ' .
                            ($galeriList->currentPage() == $i ? 'active' : '') .
                            '">';
                        echo $i;
                        echo '</a>';
                        echo '</li>';
                    }

                    if ($end < $galeriList->lastPage() - 1) {
                        echo '<li class="pagination-item"><span class="pagination-ellipsis">-</span></li>';
                    }
                @endphp

                {{-- Last Page --}}
                @if ($galeriList->lastPage() > 1)
                    <li class="pagination-item">
                        <a href="{{ $galeriList->url($galeriList->lastPage()) }}"
                            class="pagination-link {{ $galeriList->currentPage() == $galeriList->lastPage() ? 'active' : '' }}">
                            {{ $galeriList->lastPage() }}
                        </a>
                    </li>
                @endif

                {{-- Next Link --}}
                <li class="pagination-item">
                    <a href="{{ $galeriList->nextPageUrl() }}"
                        class="pagination-link {{ !$galeriList->hasMorePages() ? 'disabled' : '' }}">
                        Next
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>

@include('landing._footer')
