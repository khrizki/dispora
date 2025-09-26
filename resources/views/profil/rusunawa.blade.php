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
        align-items: center !important; /* teks tengah */
        position: relative !important;
    }

    /* Teks hasil pilihan */
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 50px !important;   /* samain dengan tinggi */
        padding-left: 35px !important;  /* kasih ruang buat icon */
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
        content: "\f3c5"; /* fa-map-marker-alt */
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
    /* Responsif khusus Search bar */
        @media (max-width: 768px) {
            form .select2-container {
                width: 100% !important;
            }

            form select {
                width: 100% !important;
            }
        }




        /* Supaya teks nggak ketimpa icon */
        .select2-container .select2-selection__rendered {
            padding-left: 5px !important;
        }
</style>


<section class="py-5 mt-5" style="margin-top: 80px !important;">
    <div class="container">
        <h2 class="mb-4">Informasi Ketersediaan Unit Sewa Rusunawa</h2>

        {{-- Dropdown Area --}}
        <form method="GET" action="{{ route('profil.rusunawa') }}" class="mb-4">
            <select name="area_id" id="areaSelect" class="form-select select2-custom w-100">
                <option value="">-- SEMUA AREA --</option>
                @foreach($areas as $area)
                    <option value="{{ $area->id }}" {{ request('area_id') == $area->id ? 'selected' : '' }}>
                        {{ strtoupper($area->nama) }}
                    </option>
                @endforeach
            </select>
        </form>



        <div class="row">
            @foreach($rusunawa as $row)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('storage/' . $row->gambar) }}" 
                         class="card-img-top" 
                         alt="{{ $row->nama }}" 
                         style="height: 200px; object-fit: cover;">
                    
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">{{ strtoupper($row->nama) }}</h5>

                        <table class="table table-sm mb-0" style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td style="width: 60%; white-space: nowrap;">Jumlah Tower</td>
                                    <td>: {{ $row->jumlah_tower ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="white-space: nowrap;">Jumlah Blok</td>
                                    <td>: {{ $row->jumlah_blok ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="white-space: nowrap;">Total Unit</td>
                                    <td>: {{ $row->total_unit ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="white-space: nowrap;">Tipe Unit</td>
                                    <td>: {{ $row->tipe_unit ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="white-space: nowrap;">Jumlah Unit Kosong</td>
                                    <td>: {{ $row->jumlah_unit_kosong ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="white-space: nowrap;">Pengelola</td>
                                    <td>: {{ $row->pengelola ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="white-space: nowrap;">Nomor Hotline</td>
                                    <td>: {{ $row->nomor_hotline ?? '-' }}</td>
                                </tr>
                                {{-- <tr>
                                    <td style="white-space: nowrap;">Area</td>
                                    <td>: {{ $row->area->nama ?? '-' }}</td>
                                </tr> --}}
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            @endforeach
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
            width: 'resolve'
        }).on('change', function() {
            $(this).closest('form').submit();
        });
    });
</script>

@include('landing._footer')
