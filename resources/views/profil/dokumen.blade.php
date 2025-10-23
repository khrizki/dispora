@include('landing._head')
@include('landing._navbar')

<section class="py-5 mt-5" style="margin-top: 80px !important;">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="card shadow">
                    <div class="card-body p-4">

                        <!-- Judul -->
                        <h2 class="fw-bold mb-3">Data Regulasi / Peraturan DISPORA Kota Padang</h2>
                        <hr class="my-3">

                        <!-- Form Filter -->
                        <form method="GET" action="{{ route('profil.dokumen') }}">
                            <div class="row g-2 mb-4">
                                <div class="col-md-5">
                                    <input type="text" name="judul" class="form-control"
                                        value="{{ request('judul') }}" placeholder="Cari berdasarkan Judul...">
                                </div>
                                <div class="col-md-4">
                                    <select name="tanggal" class="form-select form-control" style="height: 100%;">
                                        <option value="">Pilih Tahun</option>
                                        @for ($year = date('Y'); $year >= 2000; $year--)
                                            <option value="{{ $year }}"
                                                {{ request('tanggal') == $year ? 'selected' : '' }}>
                                                {{ $year }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-3 d-grid">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search"></i> Tampilkan
                                    </button>
                                </div>
                            </div>
                        </form>


                        <!-- Hasil Data -->
                        <div class="mb-3 fw-bold">{{ $data->total() }} Data</div>

                        <div id="regulasiList">
                            @foreach ($data as $item)
                                <div class="border rounded p-3 mb-3 d-flex align-items-center gap-3 regulasi-item">
                                    <!-- Icon PDF -->
                                    <div class="me-3">
                                        @php
                                            $ext = strtolower(pathinfo($item->file, PATHINFO_EXTENSION));
                                        @endphp

                                        @if ($ext === 'pdf')
                                            <img src="{{ asset('assets/img/pdf.png') }}" alt="PDF" width="50">
                                        @elseif ($ext === 'zip' || $ext === 'rar')
                                            <img src="{{ asset('assets/img/zip.png') }}" alt="ZIP" width="50">
                                        @else
                                            <img src="{{ asset('assets/img/file-icon.png') }}" alt="File"
                                                width="50">
                                        @endif
                                    </div>

                                    <!-- Detail -->
                                    <div class="flex-grow-1">
                                        <h5 class="mb-1 fw-bold text-dark ms-10 judul-regulasi">
                                            {{ $item->judul }}
                                        </h5>
                                        <small class="text-muted">Tahun:
                                            {{ $item->tanggal ? date('Y', strtotime($item->tanggal)) : '-' }}</small>
                                    </div>


                                    <!-- Tombol -->
                                    <div class="text-end">
                                        <a href="{{ asset('storage/dokumen/dokumen-anggaran/' . $item->file) }}"
                                            target="_blank" class="btn btn-primary btn-sm">Dokumen</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="mt-4 d-flex justify-content-center">
                            {{ $data->withQueryString()->links('pagination::bootstrap-5') }}
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@include('landing._footer')
