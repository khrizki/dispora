<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar" id="sidebarContent">
        <a class="sidebar-brand" href="{{ url('/') }}">
            <span class="align-middle">{{ env('APP_NAME') }}</span>
        </a>

        <ul class="sidebar-nav">

            <li class="sidebar-item {{ Route::is('dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('dashboard') }}">
                    <i class="align-middle " data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>


            <li class="sidebar-header">
                Master Data
            </li>

            <li class="sidebar-item {{ Route::is('user.*') ? 'active' : '' }}">
                <a class="sidebar-link" href="#">
                    <i class="align-middle " data-feather="users"></i> <span class="align-middle">User</span>
                </a>
            </li>
            <li class="sidebar-item {{ Route::is('pages.transparansi.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('pages.transparansi.index') }}">
                    <i class="align-middle " data-feather="users"></i> <span class="align-middle">Transparansi
                        Keuangan Daerah</span>
                </a>
            </li>


            <li class="sidebar-header">
                WBS
            </li>

            <li class="sidebar-item {{ Route::is('wbs.*') ? 'active' : '' }}">
                <a class="sidebar-link" href="#">
                    <i class="align-middle " data-feather="sliders"></i> <span class="align-middle">Whistleblowing
                        System</span>
                </a>
            </li>

            <li class="sidebar-item {{ Route::is('tindak-lanjut.wbs.*') ? 'active' : '' }}">
                <a class="sidebar-link" href="#">
                    <i class="align-middle " data-feather="sliders"></i> <span class="align-middle">Tindak Lanjut</span>
                </a>
            </li>


            {{-- <li class="sidebar-header">
                Pengaduan Masyarakat
            </li> --}}

        </ul>

    </div>
</nav>
