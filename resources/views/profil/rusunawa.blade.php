@include('landing._head')
@include('landing._navbar')

<section class="py-5 mt-5" style="margin-top: 80px !important;">
    <div class="container">
        <h2 class="mb-4">Informasi Ketersediaan Unit Sewa Rusunawa</h2>

        {{-- Dropdown Area --}}
        <form method="GET" action="{{ route('profil.rusunawa') }}" class="mb-4">
                <select name="area_id" id="areaSelect" class="form-select" style="width: 600px;">
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

                        <table class="table table-sm table-borderless mb-0">
                            <tr>
                                <td width="50%">Jumlah Tower</td>
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
                                <td>Jumlah Unit Kosong</td>
                                <td>: {{ $row->jumlah_unit_kosong ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Pengelola</td>
                                <td>: {{ $row->pengelola ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Nomor Hotline</td>
                                <td>: {{ $row->nomor_hotline ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Area</td>
                                <td>: {{ $row->area->nama ?? '-' }}</td>
                            </tr>
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
            allowClear: true,
            width: 'resolve'
        }).on('change', function() {
            $(this).closest('form').submit();
        });
    });
</script>

@include('landing._footer')
