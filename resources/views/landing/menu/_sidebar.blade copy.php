<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Toggle Example</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet">

    <style>
        /* ===== SIDEBAR STYLE ===== */
        .sporty-sidebar {
            width: 250px;
            transition: all 0.3s ease;
            background: #fff;
            border-right: 1px solid #e5e5e5;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1040;
        }

        .sporty-sidebar.collapsed {
            margin-left: -250px;
        }

        /* ===== MAIN CONTENT ===== */
        .app-main {
            margin-left: 250px;
            transition: all 0.3s ease;
            padding: 20px;
        }

        .collapsed + .app-main {
            margin-left: 0;
        }

        .sporty-title {
            color: #004aad;
        }

        .sporty-icon i {
            color: #004aad;
        }

        .menu-link.active {
            background-color: #004aad;
            color: #fff !important;
            border-radius: 0.475rem;
        }

        .menu-link.active i {
            color: #fff;
        }

        /* Hover efek */
        .menu-link:hover {
            background: rgba(0, 74, 173, 0.08);
            border-radius: 0.475rem;
        }
    </style>
</head>

<body>

    <!-- ====== TOGGLE BUTTON ====== -->
    <button id="sidebarToggle"
        class="btn btn-primary position-fixed top-0 start-0 m-3 shadow rounded-circle z-1050"
        style="width: 45px; height: 45px;">
        <i class="bi bi-list fs-4"></i>
    </button>

    <!-- ====== SIDEBAR ====== -->
    <div id="kt_app_sidebar" class="app-sidebar flex-column sporty-sidebar"
        data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
        data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
        data-kt-drawer-width="250px" data-kt-drawer-direction="start"
        data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">

        <!-- Logo -->
        <div class="app-sidebar-logo px-6 py-4 d-flex align-items-center justify-content-between border-bottom">
            <a href="{{ route('dashboard') }}" class="d-flex align-items-center gap-2 text-decoration-none">
                <img src="{{ asset('assets/media/logos/logo.png') }}" alt="Logo" class="h-35px" />
                <span class="fw-bold fs-5 text-uppercase sporty-title">DISPORA PADANG</span>
            </a>
        </div>

        <!-- Menu -->
        <div class="app-sidebar-menu flex-column-fluid">
            <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y py-3"
                data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px">

                <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                    data-kt-menu="true" data-kt-menu-expand="false">

                    <!-- Dashboard -->
                    <div class="menu-item mb-2">
                        <a class="menu-link {{ Route::is('dashboard') ? 'active' : '' }}"
                            href="{{ route('dashboard') }}">
                            <span class="menu-icon sporty-icon"><i class="bi bi-speedometer2 fs-4"></i></span>
                            <span class="menu-title fw-semibold">Dashboard</span>
                        </a>
                    </div>

                    <!-- Pengelolaan Teratai -->
                    <div class="menu-item menu-accordion mb-2" data-kt-menu-trigger="click">
                        <span class="menu-link">
                            <span class="menu-icon sporty-icon"><i class="fa-solid fa-water"></i></span>
                            <span class="menu-title fw-semibold">Pengelolaan Teratai</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="#">
                                    <span class="menu-bullet"><i class="fa-solid fa-calendar-xmark"></i></span>
                                    <span class="menu-title">Jadwal Sewa</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link" href="#">
                                    <span class="menu-bullet"><i class="fa-solid fa-clock-rotate-left"></i></span>
                                    <span class="menu-title">History Sewa</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Organisasi -->
                    <div class="menu-item menu-accordion mb-2" data-kt-menu-trigger="click">
                        <span class="menu-link">
                            <span class="menu-icon sporty-icon"><i class="bi bi-building fs-4"></i></span>
                            <span class="menu-title fw-semibold">Organisasi</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="#">
                                    <span class="menu-bullet"><i class="bi bi-house-door"></i></span>
                                    <span class="menu-title">Komi</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link" href="#">
                                    <span class="menu-bullet"><i class="bi bi-geo-alt"></i></span>
                                    <span class="menu-title">Korni</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Produk -->
                    <div class="menu-item menu-accordion mb-2" data-kt-menu-trigger="click">
                        <span class="menu-link">
                            <span class="menu-icon sporty-icon"><i class="bi bi-briefcase-fill"></i></span>
                            <span class="menu-title fw-semibold">Produk</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="#">
                                    <span class="menu-bullet"><i class="bi bi-water"></i></span>
                                    <span class="menu-title">Kolam Renang Teratai</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Publik -->
                    <div class="menu-item menu-accordion mb-2" data-kt-menu-trigger="click">
                        <span class="menu-link">
                            <span class="menu-icon sporty-icon"><i class="bi bi-megaphone fs-4"></i></span>
                            <span class="menu-title fw-semibold">Informasi Publik</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="#">
                                    <span class="menu-bullet"><i class="bi bi-bell"></i></span>
                                    <span class="menu-title">Pengumuman</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link" href="#">
                                    <span class="menu-bullet"><i class="bi bi-newspaper"></i></span>
                                    <span class="menu-title">Berita</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Galeri -->
                    <div class="menu-item menu-accordion mb-2" data-kt-menu-trigger="click">
                        <span class="menu-link">
                            <span class="menu-icon sporty-icon"><i class="bi bi-images fs-4"></i></span>
                            <span class="menu-title fw-semibold">Galeri</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="#">
                                    <span class="menu-bullet"><i class="bi bi-image"></i></span>
                                    <span class="menu-title">Galeri Foto</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link" href="#">
                                    <span class="menu-bullet"><i class="bi bi-camera-reels"></i></span>
                                    <span class="menu-title">Galeri Video</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Settings -->
                    <div class="menu-item menu-accordion mb-2" data-kt-menu-trigger="click">
                        <span class="menu-link">
                            <span class="menu-icon sporty-icon"><i class="bi bi-gear fs-4"></i></span>
                            <span class="menu-title fw-semibold">Settings</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="#">
                                    <span class="menu-bullet"><i class="bi bi-layout-text-window-reverse"></i></span>
                                    <span class="menu-title">Background Landing</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- ====== MAIN CONTENT ====== -->
    <div class="app-main">
        <h1>Konten Utama</h1>
        <p>Ini adalah area konten. Klik tombol ☰ di kiri atas untuk membuka/tutup sidebar.</p>
    </div>

    <!-- ====== SCRIPT ====== -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const sidebar = document.getElementById("kt_app_sidebar");
            const toggleBtn = document.getElementById("sidebarToggle");

            toggleBtn.addEventListener("click", function () {
                sidebar.classList.toggle("collapsed");
            });
        });
    </script>
</body>
</html>
