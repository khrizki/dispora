@extends('layouts.main')

@section('title', 'Tambah Data Transparansi Anggaran')

@push('css')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Tambah Data Transparansi Anggaran
                </h1>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="{{ route('pages.transparansi.index') }}" class="btn btn-sm btn-light">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="card">
                <div class="card-body py-4">
                    <form action="{{ route('pages.transparansi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card shadow-sm mb-5">

                            <div class="card-body row">
                                <div class="col-md-6 mb-5">
                                    <label class="form-label fw-semibold">Judul Dokumen Transparansi</label>
                                    <input type="text" name="judul" value="{{ old('judul') }}"
                                        class="form-control form-control-solid" placeholder="Masukkan Judul Dokumen"
                                        required>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <label class="form-label fw-semibold">Tahun Dokumen</label>
                                    <input type="date" name="tahun" value="{{ old('tahun') }}"
                                        class="form-control form-control-solid" placeholder="Masukkan Tahun" required>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <label class="form-label fw-semibold">Upload File Transparansi Anggaran</label>
                                    <input type="file" name="file" class="form-control form-control-solid" required>
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

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const rupiahInputs = document.querySelectorAll('.rupiah');

        rupiahInputs.forEach(function(input) {
            input.addEventListener('input', function(e) {
                let value = e.target.value.replace(/[^,\d]/g, '').toString();
                let split = value.split(',');
                let sisa = split[0].length % 3;
                let rupiah = split[0].substr(0, sisa);
                let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    let separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                e.target.value = 'Rp ' + rupiah;
            });

            let initial = input.value.replace(/[^,\d]/g, '');
            if (initial) {
                input.dispatchEvent(new Event('input'));
            }
        });
    });
</script>
@endpush