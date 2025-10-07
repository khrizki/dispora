@extends('layouts.main')

@section('title', 'Edit Lowongan Kerja')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">

        <!-- Toolbar -->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Edit Lowongan Kerja
                    </h1>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('pages.lowongan.index') }}" class="btn btn-sm btn-light">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card">
                    <div class="card-body py-4">
                        <form action="{{ route('pages.lowongan.update', $lowongan->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="card shadow-sm mb-5">
                                <div class="row g-5">

                                    <!-- Judul -->
                                    <div class="col-md-12">
                                        <label class="form-label fw-semibold">Judul Lowongan</label>
                                        <input type="text" name="judul" class="form-control form-control-solid" 
                                            value="{{ old('judul', $lowongan->judul) }}" required>
                                    </div>

                                    <!-- Posisi -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Posisi</label>
                                        <input type="text" name="posisi" class="form-control form-control-solid" 
                                            value="{{ old('posisi', $lowongan->posisi) }}">
                                    </div>

                                    <!-- Lokasi -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Lokasi</label>
                                        <input type="text" name="lokasi" class="form-control form-control-solid" 
                                            value="{{ old('lokasi', $lowongan->lokasi) }}">
                                    </div>

                                    <!-- Tipe Pekerjaan -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Tipe Pekerjaan</label>
                                        <select name="tipe" class="form-select form-select-solid">
                                            <option value="kontrak" {{ old('tipe', $lowongan->tipe) == 'kontrak' ? 'selected' : '' }}>Kontrak</option>
                                            <option value="magang" {{ old('tipe', $lowongan->tipe) == 'magang' ? 'selected' : '' }}>Magang</option>
                                        </select>
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Status</label>
                                        <select name="status" class="form-select form-select-solid">
                                            <option value="aktif" {{ old('status', $lowongan->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                            <option value="ditutup" {{ old('status', $lowongan->status) == 'ditutup' ? 'selected' : '' }}>Ditutup</option>
                                        </select>
                                    </div>

                                    <!-- Deskripsi -->
                                    <div class="col-md-12">
                                        <label class="form-label fw-semibold">Deskripsi</label>
                                        <textarea name="deskripsi" id="deskripsi" class="form-control form-control-solid" rows="6" required>{{ old('deskripsi', $lowongan->deskripsi) }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Preview -->
                <div class="card mt-5">
                    <div class="card-header pt-2">
                        <h3 class="card-title">Preview</h3>
                    </div>
                    <div class="card-body" id="previewBox">
                        <h4 class="text-primary">{{ old('judul', $lowongan->judul) }}</h4>
                        <p class="mb-1"><strong>Posisi:</strong> <span id="previewPosisi">{{ old('posisi', $lowongan->posisi) }}</span></p>
                        <p class="mb-1"><strong>Tipe:</strong> <span id="previewTipe">{{ old('tipe', $lowongan->tipe) }}</span></p>
                        <p class="mb-1"><strong>Lokasi:</strong> <span id="previewLokasi">{{ old('lokasi', $lowongan->lokasi) }}</span></p>
                        <hr>
                        <p id="previewDeskripsi">{{ old('deskripsi', $lowongan->deskripsi) }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('script')
<script>
    function updatePreview() {
        document.getElementById('previewPosisi').innerText = document.querySelector('[name="posisi"]').value;
        document.getElementById('previewTipe').innerText = document.querySelector('[name="tipe"]').value;
        document.getElementById('previewLokasi').innerText = document.querySelector('[name="lokasi"]').value;
        document.getElementById('previewDeskripsi').innerText = document.getElementById('deskripsi').value;
    }

    document.querySelectorAll('[name="posisi"], [name="tipe"], [name="lokasi"], #deskripsi')
        .forEach(el => el.addEventListener('input', updatePreview));
</script>
@endpush
