@extends('layouts.main')

@section('title', 'Edit Data Info Bergambar')

@push('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <!-- Toolbar -->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Edit Data Info Bergambar
                    </h1>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('pages.info.index') }}" class="btn btn-sm btn-light">
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
                        <form action="{{ route('pages.info.update', $InfoEdit->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" name="judul_gambar" class="form-control"
                                    value="{{ old('judul_gambar', $InfoEdit->judul_gambar) }}">
                            </div>

                            <div class="form-group">
                                <label>Foto (biarkan kosong jika tidak ingin mengubah)</label>
                                <input type="file" name="gambar" class="form-control">
                                @if ($InfoEdit->gambar)
                                    <img src="{{ asset('storage/' . $InfoEdit->gambar) }}" width="100" class="mt-2">
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>
@endpush
