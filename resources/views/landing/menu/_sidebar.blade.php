<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true"
    data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
    data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">

    <!-- Logo -->
    <div class="app-sidebar-logo px-6 py-4 d-flex align-items-center justify-content-between" id="kt_app_sidebar_logo">
        <a href="{{ route('dashboard') }}" class="d-flex align-items-center gap-2">
            <img src="{{ asset('assets/media/logos/logo.png') }}" alt="Logo" class="h-35px" />
            <span class="fw-bold fs-5 text-uppercase">PERKIM PADANG</span>
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
                        <span class="menu-icon"><i class="bi bi-speedometer2 fs-4"></i></span>
                        <span class="menu-title fw-semibold">Dashboard</span>
                    </a>
                </div>

                <!-- Progul -->
                <div class="menu-item menu-accordion mb-2 
                    {{ Route::is('pages.rusunawa.*') || Route::is('pages.areas.*') || Route::is('pages.rtlh.*') || Route::is('pages.psu.*') ? 'here show' : '' }}"
                    data-kt-menu-trigger="click">
                    <span class="menu-link">
                        <span class="menu-icon"><i class="bi bi-building fs-4"></i></span>
                        <span class="menu-title fw-semibold">Progul</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('pages.rusunawa.*') ? 'active' : '' }}"
                                href="{{ route('pages.rusunawa.index') }}">
                                <span class="menu-bullet"><i class="bi bi-house-door"></i></span>
                                <span class="menu-title">Rusunawa</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('pages.areas.*') ? 'active' : '' }}"
                                href="{{ route('pages.areas.index') }}">
                                <span class="menu-bullet"><i class="bi bi-geo-alt"></i></span>
                                <span class="menu-title">Area</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Produk -->
                <div class="menu-item menu-accordion mb-2 
                    {{ Route::is('pages.rtlh-contents.*') || Route::is('pages.sanitasi.*') || Route::is('pages.kumuh.*') || Route::is('pages.airminum.*') || Route::is('pages.psu-contents.*') ? 'here show' : '' }}"
                    data-kt-menu-trigger="click">
                    <span class="menu-link">
                        <span class="menu-icon"><i class="bi bi-briefcase-fill"></i></span>
                        <span class="menu-title fw-semibold">Produk</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('pages.rtlh-contents.*') ? 'active' : '' }}"
                                href="{{ route('pages.rtlh-contents.index') }}">
                                <span class="menu-bullet"><i class="bi bi-house"></i></span>
                                <span class="menu-title">Perbaikan RTLH</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('pages.psu-contents.*') ? 'active' : '' }}"
                                href="{{ route('pages.psu-contents.index') }}">
                                <span class="menu-bullet"><i class="bi bi-signpost"></i></span>
                                <span class="menu-title">Peningkatan PSU</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('pages.kumuh.*') ? 'active' : '' }}"
                                href="#">
                                <span class="menu-bullet"><i class="bi bi-funnel"></i></span>
                                <span class="menu-title">Peningkatan Kualitas Pemukiman Rumah Kumuh</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('pages.sanitasi.*') ? 'active' : '' }}"
                                href="#">
                                <span class="menu-bullet"><i class="bi bi-badge-wc"></i></span>
                                <span class="menu-title">Sanitasi Rumah</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('pages.airminum.*') ? 'active' : '' }}"
                                href="#">
                                <span class="menu-bullet"><i class="bi bi-droplet"></i></span>
                                <span class="menu-title">Air Minum Perumahan</span>
                            </a>
                        </div>
                    </div>
                </div>

                    

                <!-- Profil -->
                <div class="menu-item menu-accordion mb-2 
                {{ Route::is('pages.visimisi.*') || Route::is('pages.struktural.*') || Route::is('pages.info.*') || Route::is('pages.sejarah.*') || Route::is('pages.tupoksi.*') ? 'here show' : '' }}"
                data-kt-menu-trigger="click">
                    <span class="menu-link">
                        <span class="menu-icon"><i class="bi bi-person-badge fs-4"></i></span>
                        <span class="menu-title fw-semibold">Profil</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('pages.visimisi.*') ? 'active' : '' }}"
                                href="{{ route('pages.visimisi.index') }}">
                                <span class="menu-bullet"><i class="bi bi-lightbulb"></i></span>
                                <span class="menu-title">Visi Misi</span>
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
                            <a class="menu-link {{ Route::is('pages.struktural.*') ? 'active' : '' }}"
                                href="{{ route('pages.struktural.index') }}">
                                <span class="menu-bullet"><i class="bi bi-people"></i></span>
                                <span class="menu-title">Pejabat Struktural</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('pages.tupoksi.*') ? 'active' : '' }}"
                                href="{{ route('pages.tupoksi.index') }}">
                                <span class="menu-bullet"><i class="bi bi-folder2-open"></i></span>
                                <span class="menu-title">Tugas & Fungsi</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('pages.info.*') ? 'active' : '' }}"
                                href="{{ route('pages.info.index') }}">
                                <span class="menu-bullet"><i class="bi bi-info-circle"></i></span>
                                <span class="menu-title">Info Bergambar</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Informasi Publik -->
                <div class="menu-item menu-accordion mb-2 
                    {{ Route::is('pages.pengumuman.*') || Route::is('pages.lowongan.*') || Route::is('pages.berita.*') ? 'here show' : '' }}"
                    data-kt-menu-trigger="click">
                    <span class="menu-link">
                        <span class="menu-icon"><i class="bi bi-megaphone fs-4"></i></span>
                        <span class="menu-title fw-semibold">Informasi Publik</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('pages.pengumuman.*') ? 'active' : '' }}"
                                href="{{ route('pages.pengumuman.index') }}">
                                <span class="menu-bullet"><i class="bi bi-bell"></i></span>
                                <span class="menu-title">Pengumuman</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('pages.berita.*') ? 'active' : '' }}"
                                href="{{ route('pages.berita.index') }}">
                                <span class="menu-bullet"><i class="bi bi-newspaper"></i></span>
                                <span class="menu-title">Berita</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('pages.lowongan.*') ? 'active' : '' }}"
                                href="{{ route('pages.lowongan.index') }}">
                                <span class="menu-bullet"><i class="bi bi-briefcase"></i></span>
                                <span class="menu-title">Lowongan</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Galeri -->
                <div class="menu-item menu-accordion mb-2 
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
                                <span class="menu-bullet"><i class="bi bi-image"></i></span>
                                <span class="menu-title">Galeri Foto</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('pages.video.*') ? 'active' : '' }}"
                                href="{{ route('pages.video.index') }}">
                                <span class="menu-bullet"><i class="bi bi-camera-reels"></i></span>
                                <span class="menu-title">Galeri Video</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Settings -->
                <div class="menu-item menu-accordion 
                    {{ Route::is('pages.navbar.*') || Route::is('pages.footer.*') || Route::is('pages.herosection.*') ? 'here show' : '' }}"
                    data-kt-menu-trigger="click">
                    <span class="menu-link">
                        <span class="menu-icon"><i class="bi bi-gear fs-4"></i></span>
                        <span class="menu-title fw-semibold">Settings</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        {{-- <div class="menu-item">
                            <a class="menu-link {{ Route::is('pages.navbar.*') ? 'active' : '' }}"
                                href="#">
                                <span class="menu-bullet"><i class="bi bi-menu-button-wide"></i></span>
                                <span class="menu-title">Navbar</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('pages.footer.*') ? 'active' : '' }}"
                                href="#">
                                <span class="menu-bullet"><i class="bi bi-window"></i></span>
                                <span class="menu-title">Footer</span>
                            </a>
                        </div> --}}
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('pages.herosection.*') ? 'active' : '' }}"
                                href="{{ route('pages.herosection.index') }}">
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
