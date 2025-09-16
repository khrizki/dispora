@extends('layouts.main')

@section('title', 'Edit Data Dokumen')

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
                        Edit Data Dokumen
                    </h1>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('pages.dokumen.index') }}" class="btn btn-sm btn-light">
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
                        <form action="{{ route('pages.dokumen.update', $dokumenEdit->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" name="judul" class="form-control"
                                    value="{{ old('judul', $dokumenEdit->judul) }}">
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal" class="form-control"
                                    value="{{ old('tanggal', $dokumenEdit->tanggal) }}">
                            </div>

                            <div class="form-group">
                                <label>File (biarkan kosong jika tidak ingin mengubah)</label>
                                <input type="file" name="file" class="form-control">

                                @if ($dokumenEdit->file)
                                    @php
                                        $ext = pathinfo($dokumenEdit->file, PATHINFO_EXTENSION);
                                    @endphp

                                    <div class="mt-2">
                                        @if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif']))
                                            <img src="{{ asset('storage/dokumen/dokumen-anggaran/' . $dokumenEdit->file) }}"
                                                width="150" class="mt-2">
                                        @elseif ($ext == 'pdf')
                                            <embed
                                                src="{{ asset('storage/dokumen/dokumen-anggaran/' . $dokumenEdit->file) }}"
                                                type="application/pdf" width="100%" height="400px" />
                                        @elseif (in_array($ext, ['doc', 'docx']))
                                            <a href="{{ asset('storage/dokumen/dokumen-anggaran/' . $dokumenEdit->file) }}"
                                                target="_blank" class="btn btn-sm btn-primary">
                                                Lihat Dokumen Word
                                            </a>
                                        @else
                                            <a href="{{ asset('storage/dokumen/dokumen-anggaran/' . $dokumenEdit->file) }}"
                                                target="_blank" class="btn btn-sm btn-secondary">
                                                Download File
                                            </a>
                                        @endif
                                    </div>
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
