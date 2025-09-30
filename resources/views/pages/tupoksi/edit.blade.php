@extends('layouts.main')

@section('title', 'Edit Tupoksi')

@section('content')
<div class="d-flex flex-column flex-column-fluid">

    <!-- Toolbar -->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Edit Tupoksi
                </h1>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="{{ route('pages.tupoksi.index') }}" class="btn btn-sm btn-light">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="row">
                <!-- Form -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body py-4">
                            <form action="{{ route('pages.tupoksi.update', $tupoksi->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Jabatan</label>
                                    <input type="text" name="jabatan" id="jabatan"
                                           class="form-control form-control-solid"
                                           value="{{ old('jabatan', $tupoksi->jabatan) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi"
                                              class="form-control form-control-solid" rows="4">{{ old('deskripsi', $tupoksi->deskripsi) }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Fungsi (pisahkan dengan baris baru)</label>
                                    <textarea name="fungsi" id="fungsi"
                                              class="form-control form-control-solid" rows="5">{{ old('fungsi', $tupoksi->fungsi) }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Urutan</label>
                                    <input type="number" name="urutan" id="urutan"
                                           class="form-control form-control-solid"
                                           value="{{ old('urutan', $tupoksi->urutan) }}">
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

                <!-- Preview -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header pt-2">
                            <h3 class="card-title">Preview</h3>
                        </div>
                        <div class="card-body" id="previewBox">
                            <h4 class="text-primary">Jabatan</h4>
                            <p id="previewJabatan">{{ old('jabatan', $tupoksi->jabatan) }}</p>

                            <h4 class="text-primary mt-4">Deskripsi</h4>
                            <p id="previewDeskripsi">{{ old('deskripsi', $tupoksi->deskripsi) }}</p>

                            <h4 class="text-primary mt-4">Fungsi</h4>
                            <ol id="previewFungsi">
                                @foreach(explode("\n", trim(old('fungsi', $tupoksi->fungsi ?? ''))) as $f)
                                    @if($f)
                                        <li>{{ $f }}</li>
                                    @endif
                                @endforeach
                            </ol>

                            <h4 class="text-primary mt-4">Urutan</h4>
                            <p id="previewUrutan">{{ old('urutan', $tupoksi->urutan) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    function updatePreview() {
        document.getElementById('previewJabatan').innerText = document.getElementById('jabatan').value;
        document.getElementById('previewDeskripsi').innerText = document.getElementById('deskripsi').value;

        let fungsiText = document.getElementById('fungsi').value.trim();
        let fungsiList = fungsiText ? fungsiText.split("\n").map(f => `<li>${f}</li>`).join('') : '<li>-</li>';
        document.getElementById('previewFungsi').innerHTML = fungsiList;

        document.getElementById('previewUrutan').innerText = document.getElementById('urutan').value;
    }

    document.getElementById('jabatan').addEventListener('input', updatePreview);
    document.getElementById('deskripsi').addEventListener('input', updatePreview);
    document.getElementById('fungsi').addEventListener('input', updatePreview);
    document.getElementById('urutan').addEventListener('input', updatePreview);
</script>
@endpush
