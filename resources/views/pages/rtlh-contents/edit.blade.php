@extends('layouts.main')

@section('title', 'Edit Konten RTLH')

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
                        Edit Konten RTLH
                    </h1>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('pages.rtlh-contents.index') }}" class="btn btn-sm btn-light">
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
                        <form action="{{ route('pages.rtlh-contents.update', $rtlhContent->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card shadow-sm mb-5">
                                <div class="card-body row">
                                    <div class="col-md-6 mb-5">
                                        <label class="form-label fw-semibold required">Section Key</label>
                                        <input type="text" name="section_key" 
                                            value="{{ old('section_key', $rtlhContent->section_key) }}"
                                            class="form-control form-control-solid @error('section_key') is-invalid @enderror"
                                            placeholder="Contoh: pengertian, syarat, cara_pengajuan" required>
                                        @error('section_key')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <small class="text-muted">Gunakan underscore untuk spasi, tanpa spasi</small>
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <label class="form-label fw-semibold required">Judul Section</label>
                                        <input type="text" name="section_title" 
                                            value="{{ old('section_title', $rtlhContent->section_title) }}"
                                            class="form-control form-control-solid @error('section_title') is-invalid @enderror"
                                            placeholder="Contoh: Pengertian RTLH" required>
                                        @error('section_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <label class="form-label fw-semibold required">Tipe Konten</label>
                                        <select name="content_type" id="content_type"
                                            class="form-select form-select-solid @error('content_type') is-invalid @enderror" required>
                                            <option value="">Pilih Tipe</option>
                                            <option value="text" {{ old('content_type', $rtlhContent->content_type) == 'text' ? 'selected' : '' }}>Text/HTML</option>
                                            <option value="gallery" {{ old('content_type', $rtlhContent->content_type) == 'gallery' ? 'selected' : '' }}>Gallery</option>
                                            <option value="download" {{ old('content_type', $rtlhContent->content_type) == 'download' ? 'selected' : '' }}>Download</option>
                                            <option value="faq" {{ old('content_type', $rtlhContent->content_type) == 'faq' ? 'selected' : '' }}>FAQ</option>
                                        </select>
                                        @error('content_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <label class="form-label fw-semibold">Urutan Tampilan</label>
                                        <input type="number" name="order" 
                                            value="{{ old('order', $rtlhContent->order) }}"
                                            class="form-control form-control-solid @error('order') is-invalid @enderror"
                                            placeholder="0">
                                        @error('order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <!-- Content untuk type text & faq -->
                                    <div class="col-md-12 mb-5" id="content-field">
                                        <label class="form-label fw-semibold">Konten</label>
                                        <textarea name="content" id="summernote" class="form-control @error('content') is-invalid @enderror">{{ old('content', $rtlhContent->content) }}</textarea>
                                        @error('content')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Gallery Form -->
                                    <div class="col-md-12 mb-5" id="gallery-field" style="display:none;">
                                        <label class="form-label fw-semibold">Gallery Items</label>
                                        <div id="gallery-container"></div>
                                        <button type="button" class="btn btn-sm btn-light-primary" id="add-gallery">
                                            <i class="fa fa-plus"></i> Tambah Gallery Item
                                        </button>
                                    </div>

                                    <!-- Download Form -->
                                    <div class="col-md-12 mb-5" id="download-field" style="display:none;">
                                        <label class="form-label fw-semibold">Download Items</label>
                                        <div id="download-container"></div>
                                        <button type="button" class="btn btn-sm btn-light-primary" id="add-download">
                                            <i class="fa fa-plus"></i> Tambah Download Item
                                        </button>
                                    </div>

                                    <div class="col-md-12 mb-5">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="is_active" value="1" 
                                                id="is_active" {{ old('is_active', $rtlhContent->is_active) ? 'checked' : '' }}>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            let galleryIndex = 0;
            let downloadIndex = 0;

            // Existing data from database
            let existingData = @json($rtlhContent->data ?? []);
            const contentType = '{{ $rtlhContent->content_type }}';
            
            // Parse if string
            if (typeof existingData === 'string') {
                try {
                    existingData = JSON.parse(existingData);
                } catch (e) {
                    console.error('Failed to parse existing data:', e);
                    existingData = [];
                }
            }
            
            // Ensure it's an array
            if (!Array.isArray(existingData)) {
                existingData = [];
            }
            
            console.log('Content Type:', contentType);
            console.log('Existing Data:', existingData);

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

            // Load existing gallery data
            function loadGalleryData() {
                if (contentType === 'gallery' && existingData && existingData.length > 0) {
                    existingData.forEach((item, index) => {
                        const html = `
                            <div class="gallery-item" data-index="${galleryIndex}">
                                <span class="remove-item" onclick="$(this).parent().remove()">
                                    <i class="fa fa-times-circle"></i>
                                </span>
                                <input type="hidden" name="gallery[${galleryIndex}][existing_id]" value="${index}">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Penerima</label>
                                        <input type="text" name="gallery[${galleryIndex}][nama]" class="form-control form-control-solid" value="${item.nama || ''}" placeholder="Nama penerima bantuan">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Lokasi</label>
                                        <input type="text" name="gallery[${galleryIndex}][lokasi]" class="form-control form-control-solid" value="${item.lokasi || ''}" placeholder="Lokasi/Alamat">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tahun</label>
                                        <input type="text" name="gallery[${galleryIndex}][tahun]" class="form-control form-control-solid" value="${item.tahun || ''}" placeholder="Tahun">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Foto Sebelum</label>
                                        ${item.foto_sebelum ? `
                                            <div class="mb-2">
                                                <img src="{{ asset('storage') }}/${item.foto_sebelum}" class="existing-image">
                                                <input type="hidden" name="gallery[${galleryIndex}][foto_sebelum_old]" value="${item.foto_sebelum}">
                                            </div>
                                            <small class="text-muted d-block mb-2">Upload gambar baru untuk menggantinya</small>
                                        ` : ''}
                                        <input type="file" name="gallery[${galleryIndex}][foto_sebelum]" class="form-control form-control-solid image-input" accept="image/*">
                                        <img class="image-preview" style="display:none;">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Foto Sesudah</label>
                                        ${item.foto_sesudah ? `
                                            <div class="mb-2">
                                                <img src="{{ asset('storage') }}/${item.foto_sesudah}" class="existing-image">
                                                <input type="hidden" name="gallery[${galleryIndex}][foto_sesudah_old]" value="${item.foto_sesudah}">
                                            </div>
                                            <small class="text-muted d-block mb-2">Upload gambar baru untuk menggantinya</small>
                                        ` : ''}
                                        <input type="file" name="gallery[${galleryIndex}][foto_sesudah]" class="form-control form-control-solid image-input" accept="image/*">
                                        <img class="image-preview" style="display:none;">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Testimoni</label>
                                        <textarea name="gallery[${galleryIndex}][testimoni]" class="form-control form-control-solid" rows="3" placeholder="Testimoni penerima bantuan">${item.testimoni || ''}</textarea>
                                    </div>
                                </div>
                            </div>
                        `;
                        $('#gallery-container').append(html);
                        galleryIndex++;
                    });
                }
            }

            // Load existing download data
            function loadDownloadData() {
                if (contentType === 'download' && existingData && existingData.length > 0) {
                    existingData.forEach((item, index) => {
                        const html = `
                            <div class="download-item" data-index="${downloadIndex}">
                                <span class="remove-item" onclick="$(this).parent().remove()">
                                    <i class="fa fa-times-circle"></i>
                                </span>
                                <input type="hidden" name="download[${downloadIndex}][existing_id]" value="${index}">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Judul File</label>
                                        <input type="text" name="download[${downloadIndex}][title]" class="form-control form-control-solid" value="${item.title || ''}" placeholder="Judul dokumen">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">File</label>
                                        ${item.file ? `
                                            <div class="file-info mb-2">
                                                <i class="fa fa-file"></i> File saat ini: <strong>${item.file.split('/').pop()}</strong>
                                                <input type="hidden" name="download[${downloadIndex}][file_old]" value="${item.file}">
                                            </div>
                                            <small class="text-muted d-block mb-2">Upload file baru untuk menggantinya</small>
                                        ` : ''}
                                        <input type="file" name="download[${downloadIndex}][file]" class="form-control form-control-solid" accept=".pdf,.doc,.docx,.xls,.xlsx">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Deskripsi</label>
                                        <textarea name="download[${downloadIndex}][description]" class="form-control form-control-solid" rows="2" placeholder="Deskripsi singkat">${item.description || ''}</textarea>
                                    </div>
                                </div>
                            </div>
                        `;
                        $('#download-container').append(html);
                        downloadIndex++;
                    });
                }
            }

            // Add new gallery item
            $('#add-gallery').click(function() {
                const html = `
                    <div class="gallery-item" data-index="${galleryIndex}">
                        <span class="remove-item" onclick="$(this).parent().remove()">
                            <i class="fa fa-times-circle"></i>
                        </span>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Penerima</label>
                                <input type="text" name="gallery[${galleryIndex}][nama]" class="form-control form-control-solid" placeholder="Nama penerima bantuan">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Lokasi</label>
                                <input type="text" name="gallery[${galleryIndex}][lokasi]" class="form-control form-control-solid" placeholder="Lokasi/Alamat">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tahun</label>
                                <input type="text" name="gallery[${galleryIndex}][tahun]" class="form-control form-control-solid" placeholder="Tahun">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Foto Sebelum</label>
                                <input type="file" name="gallery[${galleryIndex}][foto_sebelum]" class="form-control form-control-solid image-input" accept="image/*">
                                <img class="image-preview" style="display:none;">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Foto Sesudah</label>
                                <input type="file" name="gallery[${galleryIndex}][foto_sesudah]" class="form-control form-control-solid image-input" accept="image/*">
                                <img class="image-preview" style="display:none;">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Testimoni</label>
                                <textarea name="gallery[${galleryIndex}][testimoni]" class="form-control form-control-solid" rows="3" placeholder="Testimoni penerima bantuan"></textarea>
                            </div>
                        </div>
                    </div>
                `;
                $('#gallery-container').append(html);
                galleryIndex++;
            });

            // Add new download item
            $('#add-download').click(function() {
                const html = `
                    <div class="download-item" data-index="${downloadIndex}">
                        <span class="remove-item" onclick="$(this).parent().remove()">
                            <i class="fa fa-times-circle"></i>
                        </span>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Judul File</label>
                                <input type="text" name="download[${downloadIndex}][title]" class="form-control form-control-solid" placeholder="Judul dokumen">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">File</label>
                                <input type="file" name="download[${downloadIndex}][file]" class="form-control form-control-solid" accept=".pdf,.doc,.docx,.xls,.xlsx">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea name="download[${downloadIndex}][description]" class="form-control form-control-solid" rows="2" placeholder="Deskripsi singkat"></textarea>
                            </div>
                        </div>
                    </div>
                `;
                $('#download-container').append(html);
                downloadIndex++;
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

            // Toggle field based on content_type
            $('#content_type').change(function() {
                const type = $(this).val();
                
                $('#content-field, #gallery-field, #download-field').hide();
                
                if (type === 'text' || type === 'faq') {
                    $('#content-field').show();
                } else if (type === 'gallery') {
                    $('#gallery-field').show();
                } else if (type === 'download') {
                    $('#download-field').show();
                }
            });

            // Load existing data and trigger change
            loadGalleryData();
            loadDownloadData();
            $('#content_type').trigger('change');
        });
    </script>
@endpush