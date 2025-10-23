@extends('layouts.main')

@section('title', 'Tambah Lowongan Kerja')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">

        <!-- Toolbar -->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Tambah Lowongan Kerja
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
                        <form action="{{ route('pages.lowongan.store') }}" method="POST">
                            @csrf

                            <div class="card shadow-sm mb-5">
                                <div class="row g-5">

                                    <!-- Judul -->
                                    <div class="col-md-12">
                                        <label class="form-label fw-semibold">Judul Lowongan</label>
                                        <input type="text" name="judul" class="form-control form-control-solid"
                                            required>
                                    </div>

                                    <!-- Posisi -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Posisi (Opsional)</label>
                                        <input type="text" name="posisi" class="form-control form-control-solid">
                                    </div>

                                    <!-- Lokasi -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Lokasi</label>
                                        <input type="text" name="lokasi" class="form-control form-control-solid"
                                            placeholder="Contoh: Padang / Dinas DISPORA Kota Padang">
                                    </div>

                                    <!-- Tipe -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Tipe Pekerjaan</label>
                                        <select name="tipe" class="form-select form-select-solid">
                                            <option value="kontrak">Kontrak</option>
                                            <option value="magang">Magang</option>
                                        </select>
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Status</label>
                                        <select name="status" class="form-select form-select-solid">
                                            <option value="aktif">Aktif</option>
                                            <option value="ditutup">Ditutup</option>
                                        </select>
                                    </div>

                                    <!-- Deskripsi -->
                                    <div class="col-md-12">
                                        <label class="form-label fw-semibold">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control form-control-solid" rows="6" required
                                            placeholder="Tulis detail lowongan..."></textarea>
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

            </div>
        </div>
    </div>
@endsection
