@extends('layouts.main')

@section('title', 'Tambah Hero Section')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div class="card">
            <div class="card-body py-4">
                <form action="{{ route('pages.herosection.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-10">
                        <label class="required form-label">Pilih Gambar</label>
                        <input type="file" name="image" class="form-control" accept="image/*" required>
                        <div class="form-text">Rekomendasi 1920x1080. Format JPG/PNG/WEBP.</div>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('pages.herosection.index') }}" class="btn btn-light">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
