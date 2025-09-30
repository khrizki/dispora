@extends('layouts.main')

@section('title', 'Edit Visi & Misi')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <!-- Toolbar -->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Edit Visi & Misi
                    </h1>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('pages.visimisi.index') }}" class="btn btn-sm btn-light">
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
                        <form action="{{ route('pages.visimisi.update', $visimisi->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="card shadow-sm mb-5">
                                <div class="row g-5">
                                    <!-- Visi -->
                                    <div class="col-md-12">
                                        <label class="form-label fw-semibold">Visi</label>
                                        <textarea id="visi" name="visi" class="form-control form-control-solid" rows="4" required>{{ old('visi', $visimisi->visi) }}</textarea>
                                    </div>

                                    <!-- Misi -->
                                    <div class="col-md-12">
                                        <label class="form-label fw-semibold">Misi (pisahkan dengan baris baru)</label>
                                        <textarea id="misi" name="misi" class="form-control form-control-solid" rows="6">{{ old('misi', $visimisi->misi) }}</textarea>
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

                <!-- Preview -->
                <div class="card mt-5">
                    <div class="card-header pt-2">
                        <h3 class="card-title">Preview</h3>
                    </div>
                    <div class="card-body" id="previewBox">
                        <h4 class="text-primary">VISI</h4>
                        <p id="previewVisi">{{ old('visi', $visimisi->visi) }}</p>
                        <h4 class="text-primary mt-4">MISI</h4>
                        <ol id="previewMisi">
                            @foreach(explode("\n", trim(old('misi', $visimisi->misi))) as $m)
                                @if(!empty($m))
                                    <li>{{ $m }}</li>
                                @endif
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script>
    function updatePreview() {
        document.getElementById('previewVisi').innerText = document.getElementById('visi').value;

        let misiText = document.getElementById('misi').value.trim();
        let misiList = misiText ? misiText.split("\n").map(m => `<li>${m}</li>`).join('') : '<li>-</li>';
        document.getElementById('previewMisi').innerHTML = misiList;
    }

    document.getElementById('visi').addEventListener('input', updatePreview);
    document.getElementById('misi').addEventListener('input', updatePreview);
</script>
@endpush
