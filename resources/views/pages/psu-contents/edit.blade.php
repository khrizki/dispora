@extends('layouts.main')

@section('title', 'Edit Konten PSU')

@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet">
<style>
    .gallery-item, .download-item {
        border: 2px dashed #ddd;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 15px;
        background: #f9f9f9;
        position: relative;
    }
    .remove-item {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
        color: #dc3545;
        font-size: 18px;
    }
    .image-preview {
        max-width: 150px;
        max-height: 150px;
        margin-top: 10px;
        border-radius: 5px;
    }
    .existing-image {
        max-width: 150px;
        max-height: 150px;
        border-radius: 5px;
        margin-top: 10px;
    }
    .file-info {
        background: #e3f2fd;
        padding: 8px 12px;
        border-radius: 5px;
        margin-top: 10px;
        font-size: 13px;
    }
</style>
@endpush

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Edit Konten PSU
                </h1>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="{{ route('pages.psu-contents.index') }}" class="btn btn-sm btn-light">
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
                    <form action="{{ route('pages.psu-contents.update', $psuContent->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card shadow-sm mb-5">
                            <div class="card-body row">
                                <div class="col-md-6 mb-5">
                                    <label class="form-label fw-semibold required">Section Key</label>
                                    <input type="text" name="section_key"
                                        value="{{ old('section_key', $psuContent->section_key) }}"
                                        class="form-control form-control-solid @error('section_key') is-invalid @enderror"
                                        placeholder="Contoh: pengertian, manfaat, tahapan" required>
                                    @error('section_key')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Gunakan underscore untuk spasi (tanpa spasi)</small>
                                </div>

                                <div class="col-md-6 mb-5">
                                    <label class="form-label fw-semibold required">Judul Section</label>
                                    <input type="text" name="section_title"
                                        value="{{ old('section_title', $psuContent->section_title) }}"
                                        class="form-control form-control-solid @error('section_title') is-invalid @enderror"
                                        placeholder="Contoh: Pengertian PSU" required>
                                    @error('section_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-5">
                                    <label class="form-label fw-semibold required">Tipe Konten</label>
                                    <select name="content_type" id="content_type"
                                        class="form-select form-select-solid @error('content_type') is-invalid @enderror" required>
                                        <option value="">Pilih Tipe</option>
                                        <option value="text" {{ old('content_type', $psuContent->content_type) == 'text' ? 'selected' : '' }}>Text/HTMLi</option>
                                        <option value="gallery" {{ old('content_type', $psuContent->content_type) == 'gallery' ? 'selected' : '' }}>Gallery</option>
                                        <option value="download" {{ old('content_type', $psuContent->content_type) == 'download' ? 'selected' : '' }}>Download</option>
                                        <option value="faq" {{ old('content_type', $psuContent->content_type) == 'faq' ? 'selected' : '' }}>FAQ</option>
                                    </select>
                                    @error('content_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-5">
                                    <label class="form-label fw-semibold">Urutan Tampilan</label>
                                    <input type="number" name="order"
                                        value="{{ old('order', $psuContent->order) }}"
                                        class="form-control form-control-solid @error('order') is-invalid @enderror"
                                        placeholder="0">
                                    @error('order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Konten untuk text / faq -->
                                <div class="col-md-12 mb-5" id="content-field">
                                    <label class="form-label fw-semibold">Konten</label>
                                    <textarea name="content" id="summernote" class="form-control @error('content') is-invalid @enderror">{{ old('content', $psuContent->content) }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Gallery -->
                                <div class="col-md-12 mb-5" id="gallery-field" style="display:none;">
                                    <label class="form-label fw-semibold">Gallery PSU</label>
                                    <div id="gallery-container"></div>
                                    <button type="button" class="btn btn-sm btn-light-primary" id="add-gallery">
                                        <i class="fa fa-plus"></i> Tambah Gallery Item
                                    </button>
                                </div>

                                <!-- Download -->
                                <div class="col-md-12 mb-5" id="download-field" style="display:none;">
                                    <label class="form-label fw-semibold">Download Dokumen</label>
                                    <div id="download-container"></div>
                                    <button type="button" class="btn btn-sm btn-light-primary" id="add-download">
                                        <i class="fa fa-plus"></i> Tambah File
                                    </button>
                                </div>

                                <div class="col-md-12 mb-5">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                            id="is_active" {{ old('is_active', $psuContent->is_active) ? 'checked' : '' }}>
                                        <label class="form-check-label fw-semibold" for="is_active">
                                            Aktifkan Konten
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
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

@push('script')
<script>
    $(document).ready(function () {
        const psuContent = @json($psuContent);

        // Tampilkan atau sembunyikan bagian konten sesuai tipe
        function toggleSections(contentType) {
            $('#info-section, #program-section, #statistic-section, #gallery-section, #report-section').hide();
            switch (contentType) {
                case 'info':
                    $('#info-section').show();
                    break;
                case 'program':
                    $('#program-section').show();
                    break;
                case 'statistic':
                    $('#statistic-section').show();
                    break;
                case 'gallery':
                    $('#gallery-section').show();
                    break;
                case 'report':
                    $('#report-section').show();
                    break;
            }
        }

        // Inisialisasi tampilan berdasarkan tipe konten yang tersimpan
        toggleSections(psuContent.content_type);

        // Event: ubah tampilan jika tipe konten diganti
        $('#content-type').change(function () {
            const selectedType = $(this).val();
            toggleSections(selectedType);
        });

        // Preview gambar umum
        $(document).on('change', 'input[type="file"][accept="image/*"]', function () {
            const input = this;
            const reader = new FileReader();
            reader.onload = function (e) {
                $(input).siblings('.image-preview').attr('src', e.target.result).show();
            };
            reader.readAsDataURL(input.files[0]);
        });

        // Preview file laporan
        $(document).on('change', 'input[type="file"][accept=".pdf,.doc,.docx,.xls,.xlsx,.csv"]', function () {
            const input = this;
            const file = input.files[0];
            if (file) {
                $(input).siblings('.file-name').text(file.name);
                const sizeKB = (file.size / 1024).toFixed(2);
                $(input).siblings('.file-size').text(sizeKB + ' KB');
            }
        });

        // ==== Load Gallery Data ====
        function loadGalleryData() {
            const galleryData = psuContent.data || [];
            const container = $('#gallery-container');
            container.empty();

            if (galleryData.length === 0) {
                container.append('<p class="text-muted">Belum ada data gallery.</p>');
                return;
            }

            galleryData.forEach((item, index) => {
                const html = `
                    <div class="gallery-item border rounded p-3 mb-4">
                        <h6>Item Gallery ${index + 1}</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Judul</label>
                                <input type="text" name="gallery[${index}][title]" class="form-control form-control-solid" value="${item.title || ''}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Lokasi</label>
                                <input type="text" name="gallery[${index}][location]" class="form-control form-control-solid" value="${item.location || ''}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal</label>
                                <input type="date" name="gallery[${index}][date]" class="form-control form-control-solid" value="${item.date || ''}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Foto</label>
                                <input type="file" name="gallery[${index}][image]" class="form-control form-control-solid image-input" accept="image/*">
                                <img src="${item.image_url || ''}" class="image-preview ${item.image_url ? '' : 'd-none'}" style="max-height: 150px; display: block;">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea name="gallery[${index}][description]" class="form-control form-control-solid" rows="2">${item.description || ''}</textarea>
                            </div>
                        </div>
                    </div>
                `;
                container.append(html);
            });
        }

        // ==== Load Report Data ====
        function loadReportData() {
            const reportData = psuContent.data || [];
            const container = $('#report-container');
            container.empty();

            if (reportData.length === 0) {
                container.append('<p class="text-muted">Belum ada data laporan.</p>');
                return;
            }

            reportData.forEach((item, index) => {
                const html = `
                    <div class="report-item border rounded p-3 mb-4">
                        <h6>Laporan ${index + 1}</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Judul</label>
                                <input type="text" name="report[${index}][title]" class="form-control form-control-solid" value="${item.title || ''}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal</label>
                                <input type="date" name="report[${index}][date]" class="form-control form-control-solid" value="${item.date || ''}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">File Laporan</label>
                                <input type="file" name="report[${index}][file]" class="form-control form-control-solid" accept=".pdf,.doc,.docx,.xls,.xlsx,.csv">
                                <small class="text-muted file-name">${item.file_name || 'Belum ada file'}</small><br>
                                <small class="text-muted file-size"></small>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea name="report[${index}][description]" class="form-control form-control-solid" rows="2">${item.description || ''}</textarea>
                            </div>
                        </div>
                    </div>
                `;
                container.append(html);
            });
        }

        // ==== Tambah Item Gallery ====
        let galleryIndex = psuContent.data ? psuContent.data.length : 0;
        $('#add-gallery').on('click', function () {
            const html = `
                <div class="gallery-item border rounded p-3 mb-4">
                    <h6>Item Gallery ${galleryIndex + 1}</h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" name="gallery[${galleryIndex}][title]" class="form-control form-control-solid">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Lokasi</label>
                            <input type="text" name="gallery[${galleryIndex}][location]" class="form-control form-control-solid">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tanggal</label>
                            <input type="date" name="gallery[${galleryIndex}][date]" class="form-control form-control-solid">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Foto</label>
                            <input type="file" name="gallery[${galleryIndex}][image]" class="form-control form-control-solid image-input" accept="image/*">
                            <img class="image-preview" style="display:none;">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="gallery[${galleryIndex}][description]" class="form-control form-control-solid" rows="2"></textarea>
                        </div>
                    </div>
                </div>
            `;
            $('#gallery-container').append(html);
            galleryIndex++;
        });

        // ==== Tambah Item Report ====
        let reportIndex = psuContent.data ? psuContent.data.length : 0;
        $('#add-report').on('click', function () {
            const html = `
                <div class="report-item border rounded p-3 mb-4">
                    <h6>Laporan ${reportIndex + 1}</h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" name="report[${reportIndex}][title]" class="form-control form-control-solid">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tanggal</label>
                            <input type="date" name="report[${reportIndex}][date]" class="form-control form-control-solid">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">File Laporan</label>
                            <input type="file" name="report[${reportIndex}][file]" class="form-control form-control-solid" accept=".pdf,.doc,.docx,.xls,.xlsx,.csv">
                            <small class="text-muted file-name">Belum ada file</small><br>
                            <small class="text-muted file-size"></small>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="report[${reportIndex}][description]" class="form-control form-control-solid" rows="2"></textarea>
                        </div>
                    </div>
                </div>
            `;
            $('#report-container').append(html);
            reportIndex++;
        });

        // Panggil fungsi load awal
        if (psuContent.content_type === 'gallery') loadGalleryData();
        if (psuContent.content_type === 'report') loadReportData();
    });
</script>
@endpush
