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
        {{-- <!-- Toggle button -->
        <div id="kt_app_sidebar_toggle"
            class="app-sidebar-toggle btn btn-icon btn-sm btn-light position-relative"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="app-sidebar-minimize">
            <i class="bi bi-chevron-double-left fs-5"></i>
        </div> --}}
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
                    {{ Route::is('pages.rusunawa.index') || Route::is('pages.areas.index') ? 'here show' : '' }}"
                    data-kt-menu-trigger="click">
                    <span class="menu-link">
                        <span class="menu-icon"><i class="bi bi-building fs-4"></i></span>
                        <span class="menu-title fw-semibold">Progul</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('pages.rusunawa.index') ? 'active' : '' }}"
                                href="{{ route('pages.rusunawa.index') }}">
                                <span class="menu-bullet"><i class="bi bi-house-door"></i></span>
                                <span class="menu-title">Rusunawa</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('pages.areas.index') ? 'active' : '' }}"
                                href="{{ route('pages.areas.index') }}">
                                <span class="menu-bullet"><i class="bi bi-geo-alt"></i></span>
                                <span class="menu-title">Area</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Profil -->
                <div class="menu-item menu-accordion mb-2 
                    {{ Route::is('profil.visi-misi') || Route::is('pages.struktural.index') ? 'here show' : '' }}"
                    data-kt-menu-trigger="click">
                    <span class="menu-link">
                        <span class="menu-icon"><i class="bi bi-person-badge fs-4"></i></span>
                        <span class="menu-title fw-semibold">Profil</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('profil.visi-misi') ? 'active' : '' }}"
                                href="{{ route('profil.visi-misi') }}">
                                <span class="menu-bullet"><i class="bi bi-lightbulb"></i></span>
                                <span class="menu-title">Visi Misi</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('pages.struktural.index') ? 'active' : '' }}"
                                href="{{ route('pages.struktural.index') }}">
                                <span class="menu-bullet"><i class="bi bi-people"></i></span>
                                <span class="menu-title">Pejabat Struktural</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Informasi Publik -->
                <div class="menu-item menu-accordion mb-2 
                    {{ Route::is('pages.pengumuman.index') || Route::is('pages.berita.index') ? 'here show' : '' }}"
                    data-kt-menu-trigger="click">
                    <span class="menu-link">
                        <span class="menu-icon"><i class="bi bi-megaphone fs-4"></i></span>
                        <span class="menu-title fw-semibold">Informasi Publik</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('pages.pengumuman.index') ? 'active' : '' }}"
                                href="{{ route('pages.pengumuman.index') }}">
                                <span class="menu-bullet"><i class="bi bi-bell"></i></span>
                                <span class="menu-title">Pengumuman</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('pages.berita.index') ? 'active' : '' }}"
                                href="{{ route('pages.berita.index') }}">
                                <span class="menu-bullet"><i class="bi bi-newspaper"></i></span>
                                <span class="menu-title">Berita</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Galeri -->
                <div class="menu-item menu-accordion mb-2 
                    {{ Route::is('pages.galeri.index') || Route::is('pages.video.index') ? 'here show' : '' }}"
                    data-kt-menu-trigger="click">
                    <span class="menu-link">
                        <span class="menu-icon"><i class="bi bi-images fs-4"></i></span>
                        <span class="menu-title fw-semibold">Galeri</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('pages.galeri.index') ? 'active' : '' }}"
                                href="{{ route('pages.galeri.index') }}">
                                <span class="menu-bullet"><i class="bi bi-image"></i></span>
                                <span class="menu-title">Galeri Foto</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('pages.video.index') ? 'active' : '' }}"
                                href="{{ route('pages.video.index') }}">
                                <span class="menu-bullet"><i class="bi bi-camera-reels"></i></span>
                                <span class="menu-title">Galeri Video</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Settings -->
                <div class="menu-item menu-accordion 
                    {{ Route::is('pages.navbar.index') || Route::is('pages.footer.index') ? 'here show' : '' }}"
                    data-kt-menu-trigger="click">
                    <span class="menu-link">
                        <span class="menu-icon"><i class="bi bi-gear fs-4"></i></span>
                        <span class="menu-title fw-semibold">Settings</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('pages.navbar.index') ? 'active' : '' }}"
                                href="{{ route('pages.navbar.index') }}">
                                <span class="menu-bullet"><i class="bi bi-menu-button-wide"></i></span>
                                <span class="menu-title">Navbar</span>
                            </a>
                        </div>
                        {{-- <div class="menu-item">
                            <a class="menu-link {{ Route::is('pages.footer.index') ? 'active' : '' }}"
                                href="{{ route('pages.footer.index') }}">
                                <span class="menu-bullet"><i class="bi bi-window"></i></span>
                                <span class="menu-title">Footer</span>
                            </a>
                        </div> --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
