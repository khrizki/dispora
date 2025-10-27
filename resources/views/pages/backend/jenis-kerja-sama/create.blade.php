@extends('layouts.main')

@section('title', isset($jenisKerjaSama) ? 'Edit Jenis Kerja Sama' : 'Tambah Jenis Kerja Sama')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
@endpush

@section('content')
    <div class="container my-10">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        {{ isset($jenisKerjaSama) ? 'Edit Data Jenis Kerja Sama' : 'Tambah Data Jenis Kerja Sama' }}
                    </div>
                    <div class="card-body">
                        <form id="formJenisKerjaSama" enctype="multipart/form-data">
                            @csrf

                            @if(isset($jenisKerjaSama))
                                <input type="hidden" id="id" name="id" value="{{ $jenisKerjaSama->id }}">
                            @endif

                            <!-- Nama Jenis -->
                            <div class="mb-3">
                                <label for="nama_jenis" class="form-label">Nama Jenis Kerja Sama</label>
                                <input type="text" name="nama_jenis" id="nama_jenis" class="form-control"
                                    placeholder="Contoh: Fasilitas Olahraga, Sponsorship, Event"
                                    value="{{ old('nama_jenis', $jenisKerjaSama->nama_jenis ?? '') }}" required>
                            </div>

                            <!-- Deskripsi -->
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control"
                                    placeholder="Masukkan deskripsi jenis kerja sama (opsional)">{{ old('deskripsi', $jenisKerjaSama->deskripsi ?? '') }}</textarea>
                            </div>

                            <!-- Status -->
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select" required>
                                    <option value="aktif" {{ old('status', $jenisKerjaSama->status ?? '') === 'aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="nonaktif" {{ old('status', $jenisKerjaSama->status ?? '') === 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                </select>
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.jenis-kerja-sama.index') }}" class="btn btn-secondary me-2">Kembali</a>
                                <button type="submit" class="btn btn-primary btnSubmit">
                                    {{ isset($jenisKerjaSama) ? 'Update' : 'Simpan' }}
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            let isEdit = "{{ isset($jenisKerjaSama) ? 'true' : 'false' }}" === 'true';
            let url = isEdit
                ? "{{ route('admin.jenis-kerja-sama.update', $jenisKerjaSama->id ?? 0) }}"
                : "{{ route('admin.jenis-kerja-sama.store') }}";
            let btn = $('.btnSubmit');

            $('#formJenisKerjaSama').on('submit', function(e) {
                e.preventDefault();
                startLoading();

                let formData = new FormData(this);
                if (isEdit) formData.append('_method', 'PUT');

                btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Menyimpan...');

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
                            text: response.message ?? 'Data Jenis Kerja Sama berhasil disimpan!',
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href = "{{ route('admin.jenis-kerja-sama.index') }}";
                        });
                    },
                    error: function(xhr) {
                        stopLoading();
                        btn.prop('disabled', false).html(isEdit ? 'Update' : 'Simpan');
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

        function startLoading() {
            Swal.fire({
                title: 'Menyimpan data...',
                text: 'Mohon tunggu sebentar',
                allowOutsideClick: false,
                didOpen: () => Swal.showLoading()
            });
        }

        function stopLoading() {
            Swal.close();
        }
    </script>
@endpush
