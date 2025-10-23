<div id="kt_app_sidebar"
    class="app-sidebar flex-column sporty-sidebar"
    data-kt-drawer="true"
    data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}"
    data-kt-drawer-overlay="true"
    data-kt-drawer-width="250px"
    data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">

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

                <!-- Progul -->
                <div class="menu-item menu-accordion mb-2
                    {{ Route::is('admin.kerja-sama.*') || Route::is('pages.areas.*') || Route::is('pages.rtlh.*') || Route::is('pages.psu.*') ? 'here show' : '' }}"
                    data-kt-menu-trigger="click">
                    <span class="menu-link">
                        <span class="menu-icon sporty-icon"><i class="fa-solid fa-water"></i></span>
                        <span class="menu-title fw-semibold">Pengelolaan Kerjasama</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ Route::is('admin.kerja-sama.*') ? 'active' : '' }}"
                                href="{{ route('admin.kerja-sama.index') }}">
                                <span class="menu-bullet"><i class="fa-solid fa-calendar-xmark"></i></span>
                                <span class="menu-title">Kerja Sama</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
