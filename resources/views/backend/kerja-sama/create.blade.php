@extends('layouts.main')

@section('title', isset($kerjasama) ? 'Edit Kerja Sama' : 'Tambah Kerja Sama')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
@endpush

@section('content')
    <div class="container my-10">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        {{ isset($kerjasama) ? 'Edit Data Kerja Sama' : 'Tambah Data Kerja Sama' }}
                    </div>
                    <div class="card-body">
                        <form id="formKerjasama" enctype="multipart/form-data">
                            @csrf

                            @if(isset($kerjasama))
                                <input type="hidden" id="id" name="id" value="{{ $kerjasama->id }}">
                            @endif

                            <div class="mb-3">
                                <label for="nama_mitra" class="form-label">Nama Mitra</label>
                                <input type="text" name="nama_mitra" id="nama_mitra" class="form-control"
                                    placeholder="Nama mitra kerja sama"
                                    value="{{ old('nama_mitra', $kerjasama->nama_mitra ?? '') }}">
                            </div>

                            <div class="mb-3">
                                <label for="jenis_kerjasama" class="form-label">Jenis Kerja Sama</label>
                                <input type="text" name="jenis_kerjasama" id="jenis_kerjasama" class="form-control"
                                    placeholder="Contoh: Sponsorship, Pelatihan, dsb"
                                    value="{{ old('jenis_kerjasama', $kerjasama->jenis_kerjasama ?? '') }}">
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control"
                                        value="{{ old('tanggal_mulai', $kerjasama->tanggal_mulai ?? '') }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                                    <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control"
                                        value="{{ old('tanggal_selesai', $kerjasama->tanggal_selesai ?? '') }}">
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.kerja-sama.index') }}" class="btn btn-secondary me-2">Kembali</a>
                                <button type="submit" class="btn btn-primary btnSubmit">
                                    {{ isset($kerjasama) ? 'Update' : 'Simpan' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <!-- ✅ Library dasar -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            // ✅ Tentukan mode (create / edit)
            let submit_method = "{{ isset($kerjasama) ? 'edit' : 'create' }}";
            let url = "{{ isset($kerjasama) ? route('admin.kerja-sama.update', $kerjasama->id ?? 0) : route('admin.kerja-sama.store') }}";
            let method = submit_method === 'edit' ? 'PUT' : 'POST';

            $('#formKerjasama').on('submit', function(e) {
                e.preventDefault();
                startLoading();

                let formData = new FormData(this);
                let btn = $('.btnSubmit');

                btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Menyimpan...');

                if (submit_method === 'edit') {
                    formData.append('_method', 'PUT');
                }

                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    url: url,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        stopLoading();
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: response.message ?? 'Data kerja sama berhasil disimpan!',
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href = "{{ route('admin.kerja-sama.index') }}";
                        });
                    },
                    error: function(xhr) {
                        stopLoading();
                        btn.prop('disabled', false).html('{{ isset($kerjasama) ? "Update" : "Simpan" }}');
                        let err = xhr.responseJSON?.message ?? 'Terjadi kesalahan saat menyimpan data.';
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: err
                        });
                        console.error(xhr.responseText);
                    }
                });
            });
        });

        // ✅ Fungsi loading global
        function startLoading() {
            Swal.fire({
                title: 'Menyimpan data...',
                text: 'Mohon tunggu sebentar',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
        }

        function stopLoading() {
            Swal.close();
        }
    </script>
@endpush
