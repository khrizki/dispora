@extends('layouts.main')

@section('title', 'Tambah Area')

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <div class="app-toolbar py-3 py-lg-6">
        <div class="app-container container-xxl d-flex flex-stack">
            <div class="page-title">
                <h1 class="fw-bold fs-3">Tambah Area</h1>
            </div>
            <div>
                <a href="{{ route('pages.areas.index') }}" class="btn btn-sm btn-light">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="app-content flex-column-fluid">
        <div class="app-container container-xxl">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('pages.areas.store') }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label class="form-label fw-semibold">Nama Area</label>
                            <input type="text" name="nama" class="form-control form-control-solid" 
                                value="{{ old('nama') }}" placeholder="Masukkan Nama Area" required>
                            @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
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
