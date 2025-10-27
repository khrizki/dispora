<div id="kt_app_sidebar" class="app-sidebar flex-column sporty-sidebar" data-kt-drawer="true"
    data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">

    <!-- Logo -->
    <div class="app-sidebar-logo px-6 py-4 d-flex align-items-center justify-content-between">
        <a href="{{ route('dashboard') }}" class="d-flex align-items-center gap-2">
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
                    <a class="menu-link {{ Route::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <span class="menu-icon sporty-icon"><i class="bi bi-speedometer2 fs-4"></i></span>
                        <span class="menu-title fw-semibold">Dashboard</span>
                    </a>
                </div>

                <!-- Pengelolaan Kerjasama -->
                <div class="menu-item menu-accordion mb-2 {{ Route::is('admin.kerja-sama.*') ? 'here show' : '' }}"
                    data-kt-menu-trigger="click">
                    <span class="menu-link">
                        <span class="menu-icon sporty-icon"><i class="fa-solid fa-handshake"></i></span>
                        <span class="menu-title fw-semibold">Pengelolaan Kerjasama</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('admin.kerja-sama.*') ? 'active' : '' }}"
                                href="{{ route('admin.kerja-sama.index') }}">
                                <span class="menu-bullet"><i class="bi bi-building"></i></span>
                                <span class="menu-title">Kerja Sama</span>
                            </a>
                        </div>
                    </div>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('admin.kerja-sama.*') ? 'active' : '' }}"
                                href="{{ route('admin.jenis-kerja-sama.index') }}">
                                <span class="menu-bullet"><i class="bi bi-building"></i></span>
                                <span class="menu-title">Jenis Kerja Sama</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Pengelolaan Publikasi -->
                <div class="menu-item menu-accordion mb-2
                 {{ Route::is('pages.profil.*') || Route::is('pages.berita.*') || Route::is('pages.struktural.*') ? 'here show' : '' }}"
                    data-kt-menu-trigger="click">
                    <span class="menu-link">
                        <span class="menu-icon"><i class="bi bi-megaphone fs-4"></i></span>
                        <span class="menu-title fw-semibold">Pengelolaan Publikasi</span>
                        <span class="menu-arrow"></span>
                    </span>

                    <div class="menu-sub menu-sub-accordion">

                        <!-- Submenu: Profil -->
                        <div class="menu-item menu-accordion {{ Route::is('pages.visimisi.*') || Route::is('pages.sejarah.*') || Route::is('pages.tupoksi.*') || Route::is('pages.info.*') ? 'here show' : '' }}"
                            data-kt-menu-trigger="click">
                            <span class="menu-link">
                                <span class="menu-bullet"><i class="bi bi-person-circle"></i></span>
                                <span class="menu-title">Profil</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion">
                                <div class="menu-item">
                                    <a class="menu-link {{ Route::is('pages.visimisi.*') ? 'active' : '' }}"
                                        href="{{ route('pages.visimisi.index') }}">
                                        <span class="menu-bullet"><i class="bi bi-lightbulb"></i></span>
                                        <span class="menu-title">Visi & Misi</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link {{ Route::is('pages.sejarah.*') ? 'active' : '' }}"
                                        href="{{ route('pages.sejarah.index') }}">
                                        <span class="menu-bullet"><i class="bi bi-journal-text"></i></span>
                                        <span class="menu-title">Sejarah</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link {{ Route::is('pages.tupoksi.*') ? 'active' : '' }}"
                                        href="{{ route('pages.tupoksi.index') }}">
                                        <span class="menu-bullet"><i class="bi bi-list-check"></i></span>
                                        <span class="menu-title">Tugas & Fungsi</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link {{ Route::is('pages.info.*') ? 'active' : '' }}"
                                        href="{{ route('pages.info.index') }}">
                                        <span class="menu-bullet"><i class="bi bi-image"></i></span>
                                        <span class="menu-title">Info Bergambar</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Submenu: Berita -->
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('pages.berita.*') ? 'active' : '' }}"
                                href="{{ route('pages.berita.index') }}">
                                <span class="menu-bullet"><i class="bi bi-newspaper"></i></span>
                                <span class="menu-title">Berita</span>
                            </a>
                        </div>

                        <!-- Submenu: Struktur Organisasi -->
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('pages.struktural.*') ? 'active' : '' }}"
                                href="{{ route('pages.struktural.index') }}">
                                <span class="menu-bullet"><i class="bi bi-diagram-3"></i></span>
                                <span class="menu-title">Struktur Organisasi</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Galeri -->
                {{-- <div class="menu-item menu-accordion mb-2
                    {{ Route::is('pages.galeri.*') || Route::is('pages.video.*') ? 'here show' : '' }}"
                    data-kt-menu-trigger="click">
                    <span class="menu-link">
                        <span class="menu-icon"><i class="bi bi-images fs-4"></i></span>
                        <span class="menu-title fw-semibold">Galeri</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('pages.galeri.*') ? 'active' : '' }}"
                                href="{{ route('pages.galeri.index') }}">
                                <span class="menu-bullet"><i class="bi bi-card-image"></i></span>
                                <span class="menu-title">Galeri Foto</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('pages.video.*') ? 'active' : '' }}"
                                href="{{ route('pages.video.index') }}">
                                <span class="menu-bullet"><i class="bi bi-camera-video"></i></span>
                                <span class="menu-title">Galeri Video</span>
                            </a>
                        </div>
                    </div>
                </div> --}}

                <!-- Pengelolaan Kegiatan -->
                <div class="menu-item menu-accordion mb-2" data-kt-menu-trigger="click">
                    <span class="menu-link">
                        <span class="menu-icon"><i class="bi bi-calendar-event fs-4"></i></span>
                        <span class="menu-title fw-semibold">Pengelolaan Kegiatan</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-bullet"><i class="bi bi-calendar2-week"></i></span>
                                <span class="menu-title">Jadwal / Kalender Kegiatan</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-bullet"><i class="bi bi-trophy"></i></span>
                                <span class="menu-title">Lomba</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Pengelolaan Pramuka -->
                <div class="menu-item menu-accordion mb-2" data-kt-menu-trigger="click">
                    <span class="menu-link">
                        <span class="menu-icon"><i class="bi bi-flag fs-4"></i></span>
                        <span class="menu-title fw-semibold">Pengelolaan Pramuka</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-bullet"><i class="bi bi-people"></i></span>
                                <span class="menu-title">Pelatihan</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-bullet"><i class="bi bi-trophy-fill"></i></span>
                                <span class="menu-title">Lomba</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Pengelolaan Komunitas -->
                <div class="menu-item menu-accordion mb-2" data-kt-menu-trigger="click">
                    <span class="menu-link">
                        <span class="menu-icon"><i class="bi bi-people-fill fs-4"></i></span>
                        <span class="menu-title fw-semibold">Pengelolaan Komunitas</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-bullet"><i class="bi bi-dribbble"></i></span>
                                <span class="menu-title">Club Futsal</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-bullet"><i class="bi bi-circle"></i></span>
                                <span class="menu-title">Club Mini Soccer</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
