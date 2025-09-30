@extends('layouts.main')

@section('title', 'Visi & Misi')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Visi & Misi
                    </h1>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="row">
                    <!-- Form -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header pt-2">
                                <h3 class="card-title">Edit Visi & Misi</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ isset($visimisi) ? route('pages.visimisi.update', $visimisi->id) : route('pages.visimisi.store') }}" method="POST">
                                    @csrf
                                    @if(isset($visimisi))
                                        @method('PUT')
                                    @endif

                                    <div class="mb-3">
                                        <label class="form-label">Visi</label>
                                        <<textarea id="visi" name="visi" class="form-control" rows="4">{{ old('visi', $visimisi->visi ?? '') }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Misi (pisahkan dengan baris baru)</label>
                                        <textarea id="misi" name="misi" class="form-control" rows="6">{{ old('misi', $visimisi->misi ?? '') }}</textarea>

                                    </div>

                                    <button type="submit" class="btn btn-primary">Simpan</button>
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
                                <h4 class="text-primary">VISI</h4>
                               <p id="previewVisi">{{ old('visi', $visimisi->visi ?? '-') }}</p>
                                <h4 class="text-primary mt-4">MISI</h4>
                                <ol id="previewMisi">
                                    @if(isset($visimisi))
                                        @foreach(explode("\n", trim(old('misi', $visimisi->misi ?? ''))) as $m)
                                            <li>{{ $m }}</li>
                                        @endforeach
                                    @else
                                        <li>-</li>
                                    @endif
                                </ol>
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
        document.getElementById('previewVisi').innerText = document.getElementById('visi').value;

        let misiText = document.getElementById('misi').value.trim();
        let misiList = misiText ? misiText.split("\n").map(m => `<li>${m}</li>`).join('') : '<li>-</li>';
        document.getElementById('previewMisi').innerHTML = misiList;
    }

    document.getElementById('visi').addEventListener('input', updatePreview);
    document.getElementById('misi').addEventListener('input', updatePreview);
</script>
@endpush
