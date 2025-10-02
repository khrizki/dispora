@extends('layouts.main')

@section('title', 'Tambah Sejarah')

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Tambah Sejarah
                </h1>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="{{ route('pages.sejarah.index') }}" class="btn btn-sm btn-light">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">

            <div class="card">
                <div class="card-body py-4">
                    <form action="{{ route('pages.sejarah.store') }}" method="POST">
                        @csrf
                        <div class="card shadow-sm mb-5">
                            <div class="row g-5">
                                <!-- Judul -->
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">Judul</label>
                                    <input type="text" name="judul" class="form-control form-control-solid" value="{{ old('judul') }}" placeholder="Tulis judul..." required>
                                </div>

                                 <!-- Deskripsi -->
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">Deskripsi</label>
                                    <textarea name="konten" class="form-control form-control-solid" rows="6" placeholder="Tulis deskripsi...">{{ old('konten') }}</textarea>
                                </div>
                                
                                <!-- Label -->
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">Label</label>
                                    <input type="text" name="label" class="form-control form-control-solid" value="{{ old('label') }}">
                                    {{-- <textarea name="label" class="form-control form-control-solid" placeholder="misal : profil">{{ old('label') }}</textarea> --}}
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
