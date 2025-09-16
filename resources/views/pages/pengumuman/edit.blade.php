@extends('layouts.main')

@section('title', 'Edit Data Pengumuman')

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
                        Edit Data Pengumuman
                    </h1>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('pages.pengumuman.index') }}" class="btn btn-sm btn-light">
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
                        <form action="{{ route('pages.pengumuman.update', $pengumumanEdit['id']) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Judul Pengumuman</label>
                                <input type="text" name="judul_pengumuman" class="form-control"
                                    value="{{ old('judul_pengumuman', $pengumumanEdit->judul_pengumuman) }}">
                            </div>

                            <div class="form-group">
                                <label>Tanggal Pengumuman</label>
                                <input type="date" name="tanggal" class="form-control"
                                    value="{{ old('tanggal', $pengumumanEdit->tanggal ? \Carbon\Carbon::parse($pengumumanEdit->tanggal)->format('Y-m-d') : '') }}">
                            </div>

                            <div class="form-group">
                                <label>Isi Pengumuman</label>
                                <textarea name="isi_pengumuman" class="form-control summernote">{{ old('isi_pengumuman', $pengumumanEdit->isi_pengumuman) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Jam Mulai</label>
                                <input type="time" name="jam" class="form-control"
                                    value="{{ old('jam', $pengumumanEdit->jam ? \Carbon\Carbon::parse($pengumumanEdit->jam)->format('H:i') : '') }}">
                            </div>
                            <div class="form-group">
                                <label>Jam Selesai</label>
                                <input type="time" name="jam_selesai" class="form-control"
                                    value="{{ old('jam_selesai', $pengumumanEdit->jam_selesai ? \Carbon\Carbon::parse($pengumumanEdit->jam_selesai)->format('H:i') : '') }}">
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

    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300
            });
        });
    </script>
@endpush
