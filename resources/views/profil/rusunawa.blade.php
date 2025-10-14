@include('landing._head')
@include('landing._navbar')

<style>
    /* Wrapper */
    .select2-container--default .select2-selection--single {
        height: 50px !important;
        border: 1px solid #ddd !important;
        border-radius: 10px !important;
        background: #f7f7f7 !important;
        font-size: 16px !important;
        display: flex !important;
        align-items: center !important;
        position: relative !important;
    }

    /* Teks hasil pilihan */
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 50px !important;
        padding-left: 35px !important;
        padding-right: 40px !important;
        margin: 0 !important;
    }

    /* Placeholder */
    .select2-container--default .select2-selection--single .select2-selection__placeholder {
        line-height: 50px !important;
        margin: 0 !important;
    }

    /* Icon lokasi */
    .select2-container--default .select2-selection--single::before {
        content: "\f3c5";
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 18px;
        color: #000000;
    }

    /* Hilangkan arrow default Select2 */
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        display: none !important;
    }

    /* Supaya teks nggak ketimpa icon */
    .select2-container .select2-selection__rendered {
        padding-left: 5px !important;
    }

    /* Card responsif */
    .rusunawa-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .rusunawa-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
    }

    .rusunawa-img {
        height: 200px;
        object-fit: cover;
        border-radius: 8px 8px 0 0;
    }

    /* Table responsif */
    .info-table {
        font-size: 14px;
    }

    .info-table td {
        padding: 6px 0 !important;
        vertical-align: top;
    }

    .info-table td:first-child {
        width: 50%;
        color: #666;
    }

    /* Responsive */
    @media (max-width: 768px) {
        /* Select2 full width di mobile */
        .select2-container {
            width: 100% !important;
        }

        /* Margin top section */
        section.py-5 {
            margin-top: 60px !important;
            padding-top: 2rem !important;
            padding-bottom: 2rem !important;
        }

        /* Heading lebih kecil */
        h2.mb-4 {
            font-size: 1.5rem !important;
            margin-bottom: 1.5rem !important;
        }

        /* Card di mobile jadi 1 kolom */
        .col-md-4 {
            margin-bottom: 1.5rem !important;
        }

        /* Gambar lebih pendek di mobile */
        .rusunawa-img {
            height: 180px;
        }

        /* Card title lebih kecil */
        .card-body h5 {
            font-size: 1.1rem !important;
        }

        /* Table font lebih kecil */
        .info-table {
            font-size: 13px;
        }

        /* Button lebih compact */
        .btn {
            padding: 10px 16px;
            font-size: 14px;
        }

        /* Padding card body */
        .card-body {
            padding: 1rem !important;
        }
    }

    @media (max-width: 576px) {
        /* Extra small devices */
        h2.mb-4 {
            font-size: 1.3rem !important;
        }

        .rusunawa-img {
            height: 160px;
        }

        .info-table {
            font-size: 12px;
        }

        .info-table td:first-child {
            width: 55%;
        }

        /* Select2 height lebih kecil di mobile kecil */
        .select2-container--default .select2-selection--single {
            height: 45px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 45px !important;
            font-size: 14px !important;
        }
    }
</style>

<section class="py-5 mt-5" style="margin-top: 80px !important;">
    <div class="container">
        <h2 class="mb-4">Informasi Ketersediaan Unit Sewa Rusunawa</h2>

        {{-- Dropdown Area --}}
        <form method="GET" action="{{ route('profil.rusunawa') }}" class="mb-4">
            <select name="area_id" id="areaSelect" class="form-select w-100">
                <option value="">-- SEMUA AREA --</option>
                @foreach($areas as $area)
                    <option value="{{ $area->id }}" {{ request('area_id') == $area->id ? 'selected' : '' }}>
                        {{ strtoupper($area->nama) }}
                    </option>
                @endforeach
            </select>
        </form>

        {{-- Cards --}}
        <div class="row">
            @forelse($rusunawa as $row)
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm rusunawa-card">
                    <img src="{{ asset('storage/' . $row->gambar) }}" 
                         class="rusunawa-img" 
                         alt="{{ $row->nama }}"
                         loading="lazy">
                    
                    <div class="card-body d-flex flex-column">
                        <h5 class="fw-bold mb-3">{{ strtoupper($row->nama) }}</h5>

                        <table class="table table-sm table-borderless info-table mb-3 flex-grow-1">
                            <tbody>
                                <tr>
                                    <td>Jumlah Tower</td>
                                    <td>: {{ $row->jumlah_tower ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Blok</td>
                                    <td>: {{ $row->jumlah_blok ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Total Unit</td>
                                    <td>: {{ $row->total_unit ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Tipe Unit</td>
                                    <td>: {{ $row->tipe_unit ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Unit Kosong</td>
                                    <td>: {{ $row->jumlah_unit_kosong ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Pengelola</td>
                                    <td>: {{ $row->pengelola ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Hotline</td>
                                    <td>: <a href="tel:{{ $row->nomor_hotline }}" class="text-decoration-none">{{ $row->nomor_hotline ?? '-' }}</a></td>
                                </tr>
                            </tbody>
                        </table>

                        @if($row->detail)
                            <a href="{{ route('rusunawa.detail', $row->id) }}" class="btn btn-primary w-100 mt-auto">
                                <i class="bi bi-eye me-1"></i> Lihat Detail
                            </a>
                        @else
                            <button class="btn btn-secondary w-100 mt-auto" disabled>
                                <i class="bi bi-x-circle me-1"></i> Belum Ada Detail
                            </button>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-light text-center py-5">
                    <i class="bi bi-inbox" style="font-size: 3rem; color: #ddd;"></i>
                    <p class="text-muted mt-3 mb-0">Belum ada data Rusunawa tersedia.</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- Select2 CSS & JS --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#areaSelect').select2({
            placeholder: "Pilih Area",
            allowClear: false,
            width: '100%'
        }).on('change', function() {
            $(this).closest('form').submit();
        });
    });
</script>

@include('landing._footer')