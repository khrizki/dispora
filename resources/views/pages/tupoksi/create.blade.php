@extends('layouts.main')

@section('title', 'Tambah Tupoksi')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <!-- Toolbar -->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Tambah Tupoksi
                    </h1>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('pages.tupoksi.index') }}" class="btn btn-sm btn-light">
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
                        <form action="{{ route('pages.tupoksi.store') }}" method="POST">
                            @csrf
                            <div class="card shadow-sm mb-5">
                                <div class="row g-5">
                                    <!-- Jabatan -->
                                    <div class="col-md-12">
                                        <label class="form-label fw-semibold">Jabatan</label>
                                        <input type="text" name="jabatan" class="form-control form-control-solid" placeholder="Tulis jabatan..." value="{{ old('jabatan') }}" required>
                                    </div>

                                    <!-- Deskripsi -->
                                    <div class="col-md-12">
                                        <label class="form-label fw-semibold">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control form-control-solid" rows="4" placeholder="Tulis deskripsi...">{{ old('deskripsi') }}</textarea>
                                    </div>

                                    <!-- Fungsi -->
                                    <div class="col-md-12">
                                        <label class="form-label fw-semibold">Fungsi (pisahkan dengan baris baru)</label>
                                        <textarea name="fungsi" class="form-control form-control-solid" rows="6" placeholder="Fungsi 1&#10;Fungsi 2&#10;Fungsi 3">{{ old('fungsi') }}</textarea>
                                    </div>

                                    <!-- Urutan -->
                                    <div class="col-md-4">
                                        <label class="form-label fw-semibold">Urutan</label>
                                        <input type="number" name="urutan" class="form-control form-control-solid" placeholder="Misal: 1" value="{{ old('urutan', 0) }}">
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
