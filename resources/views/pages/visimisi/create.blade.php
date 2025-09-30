@extends('layouts.main')

@section('title', 'Tambah Visi & Misi')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Tambah Visi & Misi
                    </h1>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('pages.visimisi.index') }}" class="btn btn-sm btn-light">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">

                <div class="card">
                    <div class="card-body py-4">
                        <form action="{{ route('pages.visimisi.store') }}" method="POST">
                            @csrf
                            <div class="card shadow-sm mb-5">
                                <div class="row g-5">
                                    <!-- Visi -->
                                    <div class="col-md-12">
                                        <label class="form-label fw-semibold">Visi</label>
                                        <textarea name="visi" class="form-control form-control-solid" rows="4" placeholder="Tulis visi..." required>{{ old('visi') }}</textarea>
                                    </div>

                                    <!-- Misi -->
                                    <div class="col-md-12">
                                        <label class="form-label fw-semibold">Misi (pisahkan dengan baris baru)</label>
                                        <textarea name="misi" class="form-control form-control-solid" rows="6" placeholder="Misi 1&#10;Misi 2&#10;Misi 3">{{ old('misi') }}</textarea>
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
