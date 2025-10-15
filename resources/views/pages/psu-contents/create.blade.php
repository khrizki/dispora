@extends('layouts.main')

@section('title', 'Tambah Konten PSU')

@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet">
    <style>
        .gallery-item, .report-item, .program-form, .statistic-form {
            border: 2px dashed #ddd;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            background: #f9f9f9;
        }
        .remove-item {
            float: right;
            cursor: pointer;
            color: #dc3545;
        }
        .image-preview {
            max-width: 150px;
            max-height: 150px;
            margin-top: 10px;
            border-radius: 5px;
        }
    </style>
@endpush

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Tambah Konten PSU
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

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body py-4">
                        <form action="{{ route('pages.psu-contents.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card shadow-sm mb-5">
                                <div class="card-body row">
                                    <div class="col-md-6 mb-5">
                                        <label class="form-label fw-semibold required">Section Key</label>
                                        <input type="text" name="section_key" value="{{ old('section_key') }}"
                                            class="form-control form-control-solid @error('section_key') is-invalid @enderror"
                                            placeholder="Contoh: pengertian, program-jalan-2025" required>
                                        @error('section_key')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <small class="text-muted">Gunakan dash (-) atau underscore (_), tanpa spasi</small>
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <label class="form-label fw-semibold required">Judul Section</label>
                                        <input type="text" name="section_title" value="{{ old('section_title') }}"
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
                                            <option value="program" {{ old('content_type') == 'program' ? 'selected' : '' }}>Program PSU</option>
                                            <option value="statistic" {{ old('content_type') == 'statistic' ? 'selected' : '' }}>Statistik</option>
                                            <option value="report" {{ old('content_type') == 'report' ? 'selected' : '' }}>Laporan/Dokumen</option>
                                            <option value="gallery" {{ old('content_type') == 'gallery' ? 'selected' : '' }}>Gallery</option>
                                            <option value="info" {{ old('content_type') == 'info' ? 'selected' : '' }}>Info/Text</option>
                                        </select>
                                        @error('content_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <label class="form-label fw-semibold">Urutan Tampilan</label>
                                        <input type="number" name="order" value="{{ old('order', 0) }}"
                                            class="form-control form-control-solid @error('order') is-invalid @enderror"
                                            placeholder="0">
                                        @error('order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <!-- Content untuk type info -->
                                    <div class="col-md-12 mb-5" id="content-field" style="display:none;">
                                        <label class="form-label fw-semibold">Konten</label>
                                        <textarea name="content" id="summernote" class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                                        @error('content')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Program Form -->
                                    <div class="col-md-12" id="program-field" style="display:none;">
                                        <div class="program-form">
                                            <h5 class="mb-4">Data Program</h5>
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Deskripsi Program</label>
                                                    <textarea name="content" class="form-control form-control-solid" rows="3" placeholder="Deskripsi lengkap program">{{ old('content') }}</textarea>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Kategori</label>
                                                    <select name="category" class="form-select form-select-solid">
                                                        <option value="">Pilih Kategori</option>
                                                        <option value="Jalan Lingkungan">Jalan Lingkungan</option>
                                                        <option value="Drainase">Drainase</option>
                                                        <option value="Jaringan Listrik">Jaringan Listrik</option>
                                                        <option value="Ruang Terbuka Hijau">Ruang Terbuka Hijau</option>
                                                        <option value="Air Bersih">Air Bersih</option>
                                                        <option value="Lainnya">Lainnya</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Lokasi</label>
                                                    <input type="text" name="location" class="form-control form-control-solid" placeholder="Contoh: Kec. Padang Utara">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Anggaran (Rp)</label>
                                                    <input type="number" name="budget" class="form-control form-control-solid" placeholder="0">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Progress (%)</label>
                                                    <input type="number" name="progress" class="form-control form-control-solid" min="0" max="100" placeholder="0">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Status</label>
                                                    <select name="status" class="form-select form-select-solid">
                                                        <option value="planning">Perencanaan</option>
                                                        <option value="ongoing" selected>Dalam Pengerjaan</option>
                                                        <option value="final_stage">Tahap Akhir</option>
                                                        <option value="completed">Selesai</option>
                                                        <option value="suspended">Ditunda</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Tanggal Mulai</label>
                                                    <input type="date" name="start_date" class="form-control form-control-solid">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Target Selesai</label>
                                                    <input type="date" name="target_date" class="form-control form-control-solid">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Kontraktor</label>
                                                    <input type="text" name="contractor" class="form-control form-control-solid" placeholder="Nama kontraktor">
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Foto Program (Multiple)</label>
                                                    <input type="file" name="images[]" class="form-control form-control-solid" accept="image/*" multiple>
                                                    <small class="text-muted">Bisa upload beberapa foto sekaligus</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Statistic Form -->
                                    <div class="col-md-12" id="statistic-field" style="display:none;">
                                        <div class="statistic-form">
                                            <h5 class="mb-4">Data Statistik</h5>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Total Program</label>
                                                    <input type="number" name="total_programs" class="form-control form-control-solid" placeholder="0">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Program Sedang Berjalan</label>
                                                    <input type="number" name="ongoing_programs" class="form-control form-control-solid" placeholder="0">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Program Selesai</label>
                                                    <input type="number" name="completed_programs" class="form-control form-control-solid" placeholder="0">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Total Lokasi</label>
                                                    <input type="number" name="total_locations" class="form-control form-control-solid" placeholder="0">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Total Anggaran (Rp)</label>
                                                    <input type="number" name="total_budget" class="form-control form-control-solid" placeholder="0">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Tahun</label>
                                                    <input type="number" name="year" class="form-control form-control-solid" value="{{ date('Y') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Gallery Form -->
                                    <div class="col-md-12 mb-5" id="gallery-field" style="display:none;">
                                        <label class="form-label fw-semibold">Gallery Items</label>
                                        <div id="gallery-container"></div>
                                        <button type="button" class="btn btn-sm btn-light-primary" id="add-gallery">
                                            <i class="fa fa-plus"></i> Tambah Gallery Item
                                        </button>
                                    </div>

                                    <!-- Report/Download Form -->
                                    <div class="col-md-12 mb-5" id="report-field" style="display:none;">
                                        <label class="form-label fw-semibold">Laporan/Dokumen</label>
                                        <div id="report-container"></div>
                                        <button type="button" class="btn btn-sm btn-light-primary" id="add-report">
                                            <i class="fa fa-plus"></i> Tambah Dokumen
                                        </button>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="is_active" value="1" 
                                                id="is_active" {{ old('is_active', true) ? 'checked' : '' }}>
                                            <label class="form-check-label fw-semibold" for="is_active">
                                                Aktifkan Konten
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="is_published" value="1" 
                                                id="is_published" {{ old('is_published') ? 'checked' : '' }}>
                                            <label class="form-check-label fw-semibold" for="is_published">
                                                Publikasikan ke Website
                                            </label>
                                        </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            let galleryIndex = 0;
            let reportIndex = 0;

            // Init Summernote
            $('#summernote').summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            // Toggle field based on content_type
            $('#content_type').change(function() {
                const type = $(this).val();
                
                $('#content-field, #program-field, #statistic-field, #gallery-field, #report-field').hide();
                
                if (type === 'info') {
                    $('#content-field').show();
                } else if (type === 'program') {
                    $('#program-field').show();
                } else if (type === 'statistic') {
                    $('#statistic-field').show();
                } else if (type === 'gallery') {
                    $('#gallery-field').show();
                } else if (type === 'report') {
                    $('#report-field').show();
                }
            });

            // Add Gallery Item
            $('#add-gallery').click(function() {
                const html = `
                    <div class="gallery-item" data-index="${galleryIndex}">
                        <span class="remove-item" onclick="$(this).parent().remove()">
                            <i class="fa fa-times-circle"></i> Hapus
                        </span>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Judul</label>
                                <input type="text" name="gallery[${galleryIndex}][title]" class="form-control form-control-solid" placeholder="Judul dokumentasi">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Lokasi</label>
                                <input type="text" name="gallery[${galleryIndex}][location]" class="form-control form-control-solid" placeholder="Lokasi">
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
                                <textarea name="gallery[${galleryIndex}][description]" class="form-control form-control-solid" rows="2" placeholder="Deskripsi singkat"></textarea>
                            </div>
                        </div>
                    </div>
                `;
                $('#gallery-container').append(html);
                galleryIndex++;
            });

            // Add Report Item
            $('#add-report').click(function() {
                const html = `
                    <div class="report-item" data-index="${reportIndex}">
                        <span class="remove-item" onclick="$(this).parent().remove()">
                            <i class="fa fa-times-circle"></i> Hapus
                        </span>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Judul Dokumen</label>
                                <input type="text" name="report[${reportIndex}][title]" class="form-control form-control-solid" placeholder="Judul laporan/dokumen">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Laporan</label>
                                <input type="date" name="report[${reportIndex}][report_date]" class="form-control form-control-solid">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kategori</label>
                                <select name="report[${reportIndex}][category]" class="form-select form-select-solid">
                                    <option value="">Pilih Kategori</option>
                                    <option value="Laporan Tahunan">Laporan Tahunan</option>
                                    <option value="Laporan Keuangan">Laporan Keuangan</option>
                                    <option value="Dokumen Teknis">Dokumen Teknis</option>
                                    <option value="Peraturan">Peraturan</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">File</label>
                                <input type="file" name="report[${reportIndex}][file]" class="form-control form-control-solid" accept=".pdf,.doc,.docx,.xls,.xlsx">
                                <small class="text-muted">Format: PDF, DOC, DOCX, XLS, XLSX</small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Ukuran File (MB)</label>
                                <input type="text" name="report[${reportIndex}][file_size]" class="form-control form-control-solid" placeholder="Contoh: 2.5" readonly>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea name="report[${reportIndex}][description]" class="form-control form-control-solid" rows="2" placeholder="Deskripsi singkat dokumen"></textarea>
                            </div>
                        </div>
                    </div>
                `;
                $('#report-container').append(html);
                reportIndex++;
            });

            // Image Preview
            $(document).on('change', '.image-input', function() {
                const input = this;
                const preview = $(this).siblings('.image-preview');
                
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.attr('src', e.target.result).show();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            });

            // Auto calculate file size
            $(document).on('change', 'input[type="file"][name*="[file]"]', function() {
                const file = this.files[0];
                if (file) {
                    const sizeInMB = (file.size / (1024 * 1024)).toFixed(2);
                    $(this).closest('.row').find('input[name*="[file_size]"]').val(sizeInMB);
                }
            });

            // Trigger on page load if old value exists
            @if(old('content_type'))
                $('#content_type').trigger('change');
            @endif
        });
    </script>
@endpush