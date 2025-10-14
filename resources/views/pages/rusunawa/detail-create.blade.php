@extends('layouts.main')

@section('title', 'Tambah Detail Rusunawa')

@push('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .fasilitas-row {
            margin-bottom: 10px;
        }
    </style>
@endpush

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Tambah Detail Rusunawa: {{ $rusunawa->nama }}
                    </h1>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('pages.rusunawa.index') }}" class="btn btn-sm btn-light">
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

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body py-4">
                        <form action="{{ route('pages.rusunawa.detail.store', $rusunawa->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Informasi Dasar -->
                            <div class="card shadow-sm mb-5">
                                <div class="card-header">
                                    <h3 class="card-title">Informasi Dasar</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row g-5">
                                        <!-- Kode -->
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Kode</label>
                                            <input type="text" name="kode" class="form-control form-control-solid" 
                                                value="{{ old('kode') }}" placeholder="Contoh: 128">
                                        </div>

                                        <!-- UPRS -->
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">UPRS</label>
                                            <input type="text" name="uprs" class="form-control form-control-solid" 
                                                value="{{ old('uprs') }}" placeholder="Contoh: UPRS VIII">
                                        </div>

                                        <!-- Kepala UPRS -->
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Kepala UPRS</label>
                                            <input type="text" name="kepala_uprs" class="form-control form-control-solid" 
                                                value="{{ old('kepala_uprs') }}" placeholder="Nama Kepala UPRS">
                                        </div>

                                        <!-- Luas Area -->
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Luas Area (M²)</label>
                                            <input type="number" step="0.01" name="luas_area_m2" class="form-control form-control-solid" 
                                                value="{{ old('luas_area_m2') }}" placeholder="0.00">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Kartu Inventaris Barang -->
                            <div class="card shadow-sm mb-5">
                                <div class="card-header">
                                    <h3 class="card-title">Kartu Inventaris Barang</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row g-5">
                                        <!-- Nomor IMB -->
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Nomor IMB</label>
                                            <input type="text" name="nomor_imb" class="form-control form-control-solid" 
                                                value="{{ old('nomor_imb') }}" placeholder="Nomor IMB">
                                        </div>

                                        <!-- Nomor SLF -->
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Nomor SLF</label>
                                            <input type="text" name="nomor_slf" class="form-control form-control-solid" 
                                                value="{{ old('nomor_slf') }}" placeholder="Nomor SLF">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Dana Pembangunan & Tahun -->
                            <div class="card shadow-sm mb-5">
                                <div class="card-header">
                                    <h3 class="card-title">Dana Pembangunan & Tahun</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row g-5">
                                        <!-- Dana Pembangunan -->
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Dana Pembangunan (Rp)</label>
                                            <input type="number" step="0.01" name="dana_pembangunan" class="form-control form-control-solid" 
                                                value="{{ old('dana_pembangunan') }}" placeholder="0">
                                        </div>

                                        <!-- Status Serah Terima -->
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Status Serah Terima</label>
                                            <select name="status_serah_terima" class="form-select form-select-solid">
                                                <option value="Belum" {{ old('status_serah_terima') == 'Belum' ? 'selected' : '' }}>Belum</option>
                                                <option value="Sudah" {{ old('status_serah_terima') == 'Sudah' ? 'selected' : '' }}>Sudah</option>
                                            </select>
                                        </div>

                                        <!-- Tahun Pembuatan -->
                                        <div class="col-md-12">
                                            <label class="form-label fw-semibold">Tahun Pembuatan</label>
                                            <input type="text" name="tahun_pembuatan" class="form-control form-control-solid" 
                                                value="{{ old('tahun_pembuatan') }}" placeholder="Contoh: 2017 - 2018">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tarif Unit -->
                            <div class="card shadow-sm mb-5">
                                <div class="card-header">
                                    <h3 class="card-title">Tarif Unit</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row g-5">
                                        <!-- Tarif Unit Terprogram -->
                                        <div class="col-md-4">
                                            <label class="form-label fw-semibold">Tarif Unit Terprogram (Rp)</label>
                                            <input type="number" step="0.01" name="tarif_unit_terprogram" class="form-control form-control-solid" 
                                                value="{{ old('tarif_unit_terprogram') }}" placeholder="505000">
                                        </div>

                                        <!-- Tarif Unit Umum -->
                                        <div class="col-md-4">
                                            <label class="form-label fw-semibold">Tarif Unit Umum (Rp)</label>
                                            <input type="number" step="0.01" name="tarif_unit_umum" class="form-control form-control-solid" 
                                                value="{{ old('tarif_unit_umum') }}" placeholder="765000">
                                        </div>

                                        <!-- Batas Maksimum Gaji -->
                                        <div class="col-md-4">
                                            <label class="form-label fw-semibold">Batas Maksimum Gaji (Rp)</label>
                                            <input type="number" step="0.01" name="batas_maksimum_gaji" class="form-control form-control-solid" 
                                                value="{{ old('batas_maksimum_gaji') }}" placeholder="7000000">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Lokasi -->
                            <div class="card shadow-sm mb-5">
                                <div class="card-header">
                                    <h3 class="card-title">Lokasi</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row g-5">
                                        <!-- Alamat -->
                                        <div class="col-md-12">
                                            <label class="form-label fw-semibold">Alamat</label>
                                            <textarea name="alamat" class="form-control form-control-solid" rows="3" 
                                                placeholder="Alamat lengkap">{{ old('alamat') }}</textarea>
                                        </div>

                                        <!-- Kelurahan -->
                                        <div class="col-md-4">
                                            <label class="form-label fw-semibold">Kelurahan</label>
                                            <input type="text" name="kelurahan" class="form-control form-control-solid" 
                                                value="{{ old('kelurahan') }}" placeholder="Kelurahan">
                                        </div>

                                        <!-- Kecamatan -->
                                        <div class="col-md-4">
                                            <label class="form-label fw-semibold">Kecamatan</label>
                                            <input type="text" name="kecamatan" class="form-control form-control-solid" 
                                                value="{{ old('kecamatan') }}" placeholder="Kecamatan">
                                        </div>

                                        <!-- Kota/Kabupaten -->
                                        <div class="col-md-4">
                                            <label class="form-label fw-semibold">Kota/Kabupaten</label>
                                            <input type="text" name="kota_kabupaten" class="form-control form-control-solid" 
                                                value="{{ old('kota_kabupaten') }}" placeholder="Kota/Kabupaten">
                                        </div>

                                        <!-- Embed Google Maps -->
                                        <div class="col-md-12">
                                            <label class="form-label fw-semibold">Embed Google Maps URL</label>
                                            <textarea name="embed_gmaps_url" class="form-control form-control-solid" rows="3" 
                                                placeholder="Paste link embed Google Maps disini">{{ old('embed_gmaps_url') }}</textarea>
                                            <small class="text-muted">Copy link dari Google Maps → Share → Embed a map</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Fasilitas -->
                            <div class="card shadow-sm mb-5">
                                <div class="card-header">
                                    <h3 class="card-title">Fasilitas</h3>
                                </div>
                                <div class="card-body">
                                    <div id="fasilitas-container">
                                        <div class="row g-3 fasilitas-row">
                                            <div class="col-md-5">
                                                <input type="text" name="fasilitas[0][nama]" class="form-control form-control-solid" 
                                                    placeholder="Nama Fasilitas">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" name="fasilitas[0][jumlah]" class="form-control form-control-solid" 
                                                    placeholder="Jumlah" value="1">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" name="fasilitas[0][keterangan]" class="form-control form-control-solid" 
                                                    placeholder="Keterangan (opsional)">
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button" class="btn btn-icon btn-danger remove-fasilitas">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <button type="button" class="btn btn-sm btn-primary" id="add-fasilitas">
                                            <i class="fa fa-plus"></i> Tambah Fasilitas
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Galeri Foto -->
                            <div class="card shadow-sm mb-5">
                                <div class="card-header">
                                    <h3 class="card-title">Galeri Foto</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="form-label fw-semibold">Upload Foto (Multiple)</label>
                                            <input type="file" name="galeri_foto[]" class="form-control form-control-solid" 
                                                accept="image/*" multiple>
                                            <small class="text-muted">Anda bisa upload beberapa foto sekaligus</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Deskripsi -->
                            <div class="card shadow-sm mb-5">
                                <div class="card-header">
                                    <h3 class="card-title">Deskripsi</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <textarea name="deskripsi" class="form-control form-control-solid" rows="5" 
                                                placeholder="Deskripsi detail tentang rusunawa">{{ old('deskripsi') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Simpan Detail
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
        let fasilitasIndex = 1;

        // Add Fasilitas
        $('#add-fasilitas').on('click', function() {
            const html = `
                <div class="row g-3 fasilitas-row">
                    <div class="col-md-5">
                        <input type="text" name="fasilitas[${fasilitasIndex}][nama]" class="form-control form-control-solid" 
                            placeholder="Nama Fasilitas">
                    </div>
                    <div class="col-md-3">
                        <input type="number" name="fasilitas[${fasilitasIndex}][jumlah]" class="form-control form-control-solid" 
                            placeholder="Jumlah" value="1">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="fasilitas[${fasilitasIndex}][keterangan]" class="form-control form-control-solid" 
                            placeholder="Keterangan (opsional)">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-icon btn-danger remove-fasilitas">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>
            `;
            $('#fasilitas-container').append(html);
            fasilitasIndex++;
        });

        // Remove Fasilitas
        $(document).on('click', '.remove-fasilitas', function() {
            if ($('.fasilitas-row').length > 1) {
                $(this).closest('.fasilitas-row').remove();
            } else {
                alert('Minimal harus ada 1 fasilitas');
            }
        });
    </script>
@endpush