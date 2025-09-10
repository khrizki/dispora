@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid py-4">

        <div class="row">
            <!-- Card 1 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="card-title text-muted">Total Berita</h6>
                        <h3 class="fw-bold text-primary">{{ $berita ?? 0 }}</h3>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="card-title text-muted">Total Pengumuman</h6>
                        <h3 class="fw-bold text-success">{{ $pengumumanDashboard ?? 0 }}</h3>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="card-title text-muted">Total Regulasi / Peraturan</h6>
                        <h3 class="fw-bold text-warning">{{ $dokumenDashboard ?? 0 }}</h3>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="card-title text-muted">Data Transparansi</h6>
                        <h3 class="fw-bold text-danger">{{ $transparansiDashboard ?? 0 }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="card-title text-muted">Total Galeri Foto</h6>
                        <h3 class="fw-bold text-danger">{{ $galeriDashboard ?? 0 }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="card-title text-muted">Total Galeri Video</h6>
                        <h3 class="fw-bold text-danger">{{ $videoDashboard ?? 0 }}</h3>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
