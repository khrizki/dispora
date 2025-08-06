@extends('layouts.main')

@section('title', 'Tambah Data Berita')

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
                    Tambah Data Berita
                </h1>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="{{ route('pages.berita.index') }}" class="btn btn-sm btn-light">
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
                    <form action="{{ route('pages.berita.update', $berita->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Judul Berita</label>
                            <input type="text" name="judul_berita" class="form-control"
                                value="{{ old('judul_berita', $berita->judul_berita) }}">
                        </div>

                        <div class="form-group">
                            <label>Tanggal Berita</label>
                            <input type="date" name="tanggal_berita" class="form-control"
                                value="{{ old('tanggal_berita', $berita->tanggal_berita) }}">
                        </div>

                        <div class="form-group">
                            <label>Foto (biarkan kosong jika tidak ingin mengubah)</label>
                            <input type="file" name="foto" class="form-control">
                            @if ($berita->foto)
                            <img src="{{ asset('storage/' . $berita->foto) }}" width="100" class="mt-2">
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Isi Berita</label>
                            <textarea name="isi_berita"
                                class="form-control summernote">{{ old('isi_berita', $berita->isi_berita) }}</textarea>
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
$('#isi_berita').summernote({
    height: 300,
    callbacks: {
        onImageUpload: function(files) {
            uploadImage(files[0]);
        }
    }
});

function uploadImage(file) {
    let data = new FormData();
    data.append("image", file);
    data.append("_token", '{{ csrf_token() }}');

    $.ajax({
        url: "{{ route('berita.upload-image') }}",
        type: "POST",
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        success: function(url) {
            $('#isi_berita').summernote('insertImage', url);
        },
        error: function() {
            alert("Upload gambar gagal");
        }
    });
}
</script>
<script>
$(document).ready(function() {
    $('.summernote').summernote({
        height: 300
    });
});
</script>
@endpush
