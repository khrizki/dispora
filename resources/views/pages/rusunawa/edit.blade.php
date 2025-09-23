@extends('layouts.main')

@section('title', 'Edit Data Rusunawa')

@push('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <!-- Toolbar -->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Edit Data Rusunawa
                    </h1>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('pages.rusunawa.index') }}" class="btn btn-sm btn-light">
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
                        <form action="{{ route('pages.rusunawa.update', $rusunawa->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-5">
                                <!-- Nama Rusunawa -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Nama Rusunawa</label>
                                    <input type="text" name="nama" class="form-control form-control-solid"
                                        value="{{ old('nama', $rusunawa->nama) }}" required>
                                </div>

                                <!-- Jumlah Tower -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Jumlah Tower</label>
                                    <input type="number" name="jumlah_tower" class="form-control form-control-solid"
                                        value="{{ old('jumlah_tower', $rusunawa->jumlah_tower) }}">
                                </div>

                                <!-- Jumlah Blok -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Jumlah Blok</label>
                                    <input type="number" name="jumlah_blok" class="form-control form-control-solid"
                                        value="{{ old('jumlah_blok', $rusunawa->jumlah_blok) }}">
                                </div>

                                <!-- Total Unit -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Total Unit</label>
                                    <input type="number" name="total_unit" class="form-control form-control-solid"
                                        value="{{ old('total_unit', $rusunawa->total_unit) }}">
                                </div>

                                <!-- Tipe Unit -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Tipe Unit</label>
                                    <input type="text" name="tipe_unit" class="form-control form-control-solid"
                                        value="{{ old('tipe_unit', $rusunawa->tipe_unit) }}">
                                </div>

                                <!-- Jumlah Unit Kosong -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Jumlah Unit Kosong</label>
                                    <input type="number" name="jumlah_unit_kosong" class="form-control form-control-solid"
                                        value="{{ old('jumlah_unit_kosong', $rusunawa->jumlah_unit_kosong) }}">
                                </div>

                                <!-- Pengelola -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Pengelola</label>
                                    <input type="text" name="pengelola" class="form-control form-control-solid"
                                        value="{{ old('pengelola', $rusunawa->pengelola) }}">
                                </div>

                                <!-- Nomor Hotline -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Nomor Hotline</label>
                                    <input type="text" name="nomor_hotline" class="form-control form-control-solid"
                                        value="{{ old('nomor_hotline', $rusunawa->nomor_hotline) }}">
                                </div>

                                <!-- Area -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Area</label>
                                    <select name="area_id" class="form-select form-select-solid" required>
                                        <option value="">-- Pilih Area --</option>
                                        @foreach($areas as $area)
                                            <option value="{{ $area->id }}" {{ old('area_id', $rusunawa->area_id) == $area->id ? 'selected' : '' }}>
                                                {{ $area->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Gambar -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Gambar Rusunawa</label>
                                    @if($rusunawa->gambar)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $rusunawa->gambar) }}" alt="Rusunawa" class="img-thumbnail" width="200">
                                        </div>
                                    @endif
                                    <input type="file" name="gambar" class="form-control form-control-solid" accept="image/*">
                                    <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
                                </div>
                            </div>

                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Update
                                </button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
