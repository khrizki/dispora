@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid py-4">
        <!-- Welcome Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="welcome-card">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div>
                            <h3 class="mb-2 fw-bold">Selamat Datang di Dashboard</h3>
                            <p class="mb-0 opacity-75">
                                <i class="bi bi-calendar-check me-2"></i>{{ now()->translatedFormat('l, d F Y') }}
                            </p>
                        </div>
                        <div class="text-end">
                            <div class="welcome-icon">
                                <i class="bi bi-speedometer2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Statistics -->
        <div class="row g-4 mb-4">
            <!-- Berita -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="stat-card stat-card-primary">
                    <div class="stat-icon">
                        <i class="bi bi-newspaper"></i>
                    </div>
                    <div class="stat-content">
                        <p class="stat-label">Total Berita</p>
                        <h2 class="stat-value">{{ $berita ?? 0 }}</h2>
                        <span class="stat-badge badge-primary">
                            <i class="bi bi-arrow-up-short"></i> Publikasi
                        </span>
                    </div>
                </div>
            </div>

            <!-- Pengumuman -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="stat-card stat-card-success">
                    <div class="stat-icon">
                        <i class="bi bi-megaphone"></i>
                    </div>
                    <div class="stat-content">
                        <p class="stat-label">Total Pengumuman</p>
                        <h2 class="stat-value">{{ $pengumumanDashboard ?? 0 }}</h2>
                        <span class="stat-badge badge-success">
                            <i class="bi bi-bell"></i> Aktif
                        </span>
                    </div>
                </div>
            </div>

            <!-- Rusunawa -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="stat-card stat-card-danger">
                    <div class="stat-icon">
                        <i class="bi bi-building"></i>
                    </div>
                    <div class="stat-content">
                        <p class="stat-label">Total Rusunawa</p>
                        <h2 class="stat-value">{{ $rusunawa ?? 0 }}</h2>
                        <span class="stat-badge badge-danger">
                            <i class="bi bi-house"></i> Unit
                        </span>
                    </div>
                </div>
            </div>

            <!-- Area -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="stat-card stat-card-info">
                    <div class="stat-icon">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <div class="stat-content">
                        <p class="stat-label">Total Area</p>
                        <h2 class="stat-value">{{ $area ?? 0 }}</h2>
                        <span class="stat-badge badge-info">
                            <i class="bi bi-map"></i> Wilayah
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <!-- Content Statistics -->
            <div class="col-xl-8">
                <div class="dashboard-card">
                    <div class="card-header-custom">
                        <h5 class="mb-0 fw-bold">
                            <i class="bi bi-bar-chart-line me-2"></i>Statistik Konten
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <!-- Galeri Foto -->
                            <div class="col-md-6">
                                <div class="mini-stat-card">
                                    <div class="d-flex align-items-center">
                                        <div class="mini-stat-icon bg-warning">
                                            <i class="bi bi-images"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="mini-stat-label">Galeri Foto</p>
                                            <h4 class="mini-stat-value">{{ $galeriDashboard ?? 0 }}</h4>
                                            <div class="mini-progress">
                                                <div class="mini-progress-bar bg-warning" style="width: 75%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Galeri Video -->
                            <div class="col-md-6">
                                <div class="mini-stat-card">
                                    <div class="d-flex align-items-center">
                                        <div class="mini-stat-icon bg-danger">
                                            <i class="bi bi-camera-video"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="mini-stat-label">Galeri Video</p>
                                            <h4 class="mini-stat-value">{{ $videoDashboard ?? 0 }}</h4>
                                            <div class="mini-progress">
                                                <div class="mini-progress-bar bg-danger" style="width: 60%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Konten -->
                            <div class="col-md-12">
                                <div class="total-content-card">
                                    <div class="row g-3 text-center">
                                        <div class="col-4">
                                            <div class="content-metric">
                                                <i class="bi bi-file-earmark-text text-primary"></i>
                                                <h4 class="mb-1">{{ ($berita ?? 0) + ($pengumumanDashboard ?? 0) }}</h4>
                                                <small>Total Publikasi</small>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="content-metric">
                                                <i class="bi bi-camera text-warning"></i>
                                                <h4 class="mb-1">{{ ($galeriDashboard ?? 0) + ($videoDashboard ?? 0) }}</h4>
                                                <small>Total Media</small>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="content-metric">
                                                <i class="bi bi-graph-up text-success"></i>
                                                <h4 class="mb-1">{{ ($berita ?? 0) + ($pengumumanDashboard ?? 0) + ($galeriDashboard ?? 0) + ($videoDashboard ?? 0) }}</h4>
                                                <small>Total Keseluruhan</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Info -->
            <div class="col-xl-4">
                <div class="dashboard-card">
                    <div class="card-header-custom">
                        <h5 class="mb-0 fw-bold">
                            <i class="bi bi-lightning me-2"></i>Info Cepat
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="info-list">
                            <div class="info-item">
                                <div class="info-icon bg-primary">
                                    <i class="bi bi-house-gear"></i>
                                </div>
                                <div class="info-text">
                                    <h6>Perbaikan RTLH</h6>
                                    <small>Program Aktif</small>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon bg-success">
                                    <i class="bi bi-arrow-up-circle"></i>
                                </div>
                                <div class="info-text">
                                    <h6>Peningkatan PSU</h6>
                                    <small>Program Aktif</small>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon bg-info">
                                    <i class="bi bi-droplet"></i>
                                </div>
                                <div class="info-text">
                                    <h6>Sanitasi Rumah</h6>
                                    <small>Program Aktif</small>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon bg-warning">
                                    <i class="bi bi-cup-straw"></i>
                                </div>
                                <div class="info-text">
                                    <h6>Air Minum Perumahan</h6>
                                    <small>Program Aktif</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="system-status mt-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <span><i class="bi bi-circle-fill text-success me-2"></i>Status Sistem</span>
                                <span class="badge bg-success">Normal</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profil Organisasi -->
        <div class="row">
            <div class="col-12">
                <div class="dashboard-card">
                    <div class="card-header-custom">
                        <h5 class="mb-0 fw-bold">
                            <i class="bi bi-info-circle me-2"></i>Profil Organisasi
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-lg-3 col-md-6">
                                <div class="profile-card">
                                    <i class="bi bi-lightbulb"></i>
                                    <h6>Visi Misi</h6>
                                    <p>Arah & Tujuan Organisasi</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="profile-card">
                                    <i class="bi bi-clock-history"></i>
                                    <h6>Sejarah</h6>
                                    <p>Perjalanan Organisasi</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="profile-card">
                                    <i class="bi bi-diagram-3"></i>
                                    <h6>Struktur</h6>
                                    <p>Pejabat Struktural</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="profile-card">
                                    <i class="bi bi-list-check"></i>
                                    <h6>Tugas & Fungsi</h6>
                                    <p>Tupoksi Organisasi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Welcome Card */
        .welcome-card {
            background: linear-gradient(135deg, var(--bs-primary) 0%, var(--bs-primary-dark, #0056b3) 100%);
            color: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .welcome-card:hover {
            transform: translateY(-2px);
        }

        .welcome-icon {
            width: 70px;
            height: 70px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
        }

        /* Stat Cards */
        .stat-card {
            background: var(--bs-card-bg);
            border: 1px solid var(--bs-border-color);
            border-radius: 1rem;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.15);
        }

        .stat-icon {
            width: 70px;
            height: 70px;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            flex-shrink: 0;
        }

        .stat-card-primary .stat-icon {
            background: rgba(13, 110, 253, 0.1);
            color: var(--bs-primary);
        }

        .stat-card-success .stat-icon {
            background: rgba(25, 135, 84, 0.1);
            color: var(--bs-success);
        }

        .stat-card-danger .stat-icon {
            background: rgba(220, 53, 69, 0.1);
            color: var(--bs-danger);
        }

        .stat-card-info .stat-icon {
            background: rgba(13, 202, 240, 0.1);
            color: var(--bs-info);
        }

        .stat-content {
            flex-grow: 1;
        }

        .stat-label {
            color: var(--bs-secondary-color);
            margin-bottom: 0.25rem;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
            color: var(--bs-body-color);
        }

        .stat-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            padding: 0.25rem 0.75rem;
            border-radius: 2rem;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-primary {
            background: rgba(13, 110, 253, 0.1);
            color: var(--bs-primary);
        }

        .badge-success {
            background: rgba(25, 135, 84, 0.1);
            color: var(--bs-success);
        }

        .badge-danger {
            background: rgba(220, 53, 69, 0.1);
            color: var(--bs-danger);
        }

        .badge-info {
            background: rgba(13, 202, 240, 0.1);
            color: var(--bs-info);
        }

        /* Dashboard Card */
        .dashboard-card {
            background: var(--bs-card-bg);
            border: 1px solid var(--bs-border-color);
            border-radius: 1rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            height: 100%;
        }

        .card-header-custom {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--bs-border-color);
        }

        /* Mini Stat Card */
        .mini-stat-card {
            padding: 1.25rem;
            background: var(--bs-light);
            border-radius: 0.75rem;
            border: 1px solid var(--bs-border-color);
            transition: all 0.3s ease;
        }

        .mini-stat-card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }

        .mini-stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            flex-shrink: 0;
        }

        .mini-stat-label {
            margin: 0;
            font-size: 0.875rem;
            color: var(--bs-secondary-color);
        }

        .mini-stat-value {
            margin: 0.25rem 0;
            font-weight: 700;
            color: var(--bs-body-color);
        }

        .mini-progress {
            height: 4px;
            background: var(--bs-border-color);
            border-radius: 2px;
            overflow: hidden;
            margin-top: 0.5rem;
        }

        .mini-progress-bar {
            height: 100%;
            border-radius: 2px;
            transition: width 0.3s ease;
        }

        /* Total Content Card */
        .total-content-card {
            background: linear-gradient(135deg, rgba(13, 110, 253, 0.05) 0%, rgba(13, 202, 240, 0.05) 100%);
            padding: 1.5rem;
            border-radius: 0.75rem;
            border: 1px solid var(--bs-border-color);
        }

        .content-metric i {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .content-metric h4 {
            font-weight: 700;
            color: var(--bs-body-color);
        }

        .content-metric small {
            color: var(--bs-secondary-color);
            font-weight: 500;
        }

        /* Info List */
        .info-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            background: var(--bs-light);
            border-radius: 0.75rem;
            border: 1px solid var(--bs-border-color);
            transition: all 0.3s ease;
        }

        .info-item:hover {
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transform: translateX(5px);
        }

        .info-icon {
            width: 45px;
            height: 45px;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.25rem;
            flex-shrink: 0;
        }

        .info-text h6 {
            margin: 0;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--bs-body-color);
        }

        .info-text small {
            color: var(--bs-secondary-color);
        }

        .system-status {
            padding: 1rem;
            background: rgba(25, 135, 84, 0.05);
            border-radius: 0.75rem;
            border: 1px solid rgba(25, 135, 84, 0.1);
        }

        /* Profile Card */
        .profile-card {
            text-align: center;
            padding: 1.5rem;
            background: var(--bs-light);
            border: 1px solid var(--bs-border-color);
            border-radius: 0.75rem;
            transition: all 0.3s ease;
        }

        .profile-card:hover {
            box-shadow: 0 4px 16px rgba(0,0,0,0.1);
            transform: translateY(-5px);
        }

        .profile-card i {
            font-size: 2.5rem;
            color: var(--bs-primary);
            margin-bottom: 1rem;
        }

        .profile-card h6 {
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--bs-body-color);
        }

        .profile-card p {
            margin: 0;
            font-size: 0.875rem;
            color: var(--bs-secondary-color);
        }

        /* Dark Mode Support */
        [data-bs-theme="dark"] .welcome-card {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
        }

        [data-bs-theme="dark"] .mini-stat-card,
        [data-bs-theme="dark"] .info-item,
        [data-bs-theme="dark"] .profile-card {
            background: rgba(255, 255, 255, 0.05);
        }

        [data-bs-theme="dark"] .total-content-card {
            background: linear-gradient(135deg, rgba(13, 110, 253, 0.1) 0%, rgba(13, 202, 240, 0.1) 100%);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .stat-card {
                flex-direction: column;
                text-align: center;
            }

            .stat-value {
                font-size: 1.75rem;
            }

            .welcome-icon {
                width: 60px;
                height: 60px;
                font-size: 1.75rem;
            }
        }
    </style>
@endsection