{{-- sidebar --}}
<aside id="sidebar"
    class="fixed top-0 left-0 h-screen w-64 bg-white shadow-lg border-r border-gray-200 transition-all duration-300 ease-in-out flex flex-col z-30">

    {{-- Header --}}
    <div class="flex items-center justify-between p-4 border-b">
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/img/logo-head-DISPORA.png') }}" alt="Logo" class="h-20">
        </a>

        {{-- Tombol toggle sidebar --}}
        <button id="toggleSidebarBtn"
            class="text-gray-700 hover:text-gray-900 border border-gray-300 rounded-md p-2 transition-colors duration-150"
            title="Tutup / Buka Sidebar">
            <i class="bi bi-list text-xl"></i>
        </button>
    </div>

    {{-- Menu --}}
    <nav class="flex-1 overflow-y-auto">
        <ul class="space-y-2 p-4 text-gray-700">
            {{-- Judul --}}
            <li class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Menu</li>

            {{-- Dashboard --}}
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-gray-100 {{ Route::is('dashboard') ? 'bg-gray-200 font-semibold' : '' }}">
                    <i class="bi bi-grid-fill text-2xl"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            {{-- Pengelolaan Teratai --}}
            <li>
                <details class="group">
                    <summary
                        class="flex items-center gap-2 px-3 py-2 cursor-pointer rounded-md hover:bg-gray-100 group-open:bg-gray-200">
                        <i class="bi bi-droplet-fill text-2xl"></i>
                        <span>Pengelolaan Teratai</span>
                    </summary>
                    <ul class="ml-6 mt-1 space-y-1">
                        <li><a href="#" class="block px-2 py-1 text-sm hover:text-blue-600">
                            <i class="bi bi-calendar-event text-xl"></i> Jadwal Sewa</a></li>
                        <li><a href="#" class="block px-2 py-1 text-sm hover:text-blue-600">
                            <i class="bi bi-clock-history text-xl"></i> History Sewa</a></li>
                    </ul>
                </details>
            </li>

            {{-- Pengelolaan Publikasi --}}
            <li>
                <details class="group"
                    {{ Route::is('pages.visimisi.*') || Route::is('pages.tupoksi.*') || Route::is('pages.sejarah.*') || Route::is('pages.struktural.*') || Route::is('pages.info.*') || Route::is('pages.video.*') || Route::is('pages.berita.*') ? 'open' : '' }}>
                    <summary
                        class="flex items-center gap-2 px-3 py-2 cursor-pointer rounded-md hover:bg-gray-100 group-open:bg-gray-200">
                        <i class="bi bi-journal-richtext text-2xl"></i>
                        <span>Pengelolaan Publikasi</span>
                    </summary>
                    <ul class="ml-6 mt-1 space-y-1 text-sm">
                        <li><a href="{{ route('pages.visimisi.index') }}" class="hover:text-blue-600">
                            <i class="bi bi-bullseye text-xl"></i> Visi & Misi</a></li>
                        <li><a href="{{ route('pages.tupoksi.index') }}" class="hover:text-blue-600">
                            <i class="bi bi-diagram-3 text-xl"></i> Tupoksi</a></li>
                        <li><a href="{{ route('pages.sejarah.index') }}" class="hover:text-blue-600">
                            <i class="bi bi-hourglass-split text-xl"></i> Sejarah</a></li>
                        <li><a href="{{ route('pages.struktural.index') }}" class="hover:text-blue-600">
                            <i class="bi bi-diagram-3-fill text-xl"></i> Struktur Organisasi</a></li>
                        <li><a href="{{ route('pages.info.index') }}" class="hover:text-blue-600">
                            <i class="bi bi-image text-xl"></i> Info Bergambar</a></li>
                        <li><a href="{{ route('pages.video.index') }}" class="hover:text-blue-600">
                            <i class="bi bi-play-btn text-xl"></i> Video</a></li>
                        <li><a href="{{ route('pages.berita.index') }}" class="hover:text-blue-600">
                            <i class="bi bi-newspaper text-xl"></i> Berita</a></li>
                    </ul>
                </details>
            </li>

            {{-- Pengelolaan Kegiatan --}}
            <li>
                <details class="group">
                    <summary
                        class="flex items-center gap-2 px-3 py-2 cursor-pointer rounded-md hover:bg-gray-100 group-open:bg-gray-200">
                        <i class="fa-solid fa-chart-line text-2xl"></i>
                        <span>Pengelolaan Kegiatan</span>
                    </summary>
                    <ul class="ml-6 mt-1 space-y-1 text-sm">
                        <li><a href="#" class="hover:text-blue-600">
                            <i class="bi bi-trophy-fill text-xl"></i> Lomba</a></li>
                        <li><a href="#" class="hover:text-blue-600">
                            <i class="bi bi-book-half text-xl"></i> Pelatihan</a></li>
                    </ul>
                </details>
            </li>

            {{-- Pengelolaan Komunitas --}}
            <li>
                <details class="group">
                    <summary
                        class="flex items-center gap-2 px-3 py-2 cursor-pointer rounded-md hover:bg-gray-100 group-open:bg-gray-200">
                        <i class="bi bi-people-fill text-2xl"></i>
                        <span>Pengelolaan Komunitas</span>
                    </summary>
                    <ul class="ml-6 mt-1 space-y-1 text-sm">
                        <li><a href="#" class="hover:text-blue-600"><i class="bi bi-person-bounding-box"></i> Club Futsal</a></li>
                        <li><a href="#" class="hover:text-blue-600"><i class="bi bi-person-bounding-box"></i> Club Mini Soccer</a></li>
                        <li><a href="#" class="hover:text-blue-600"><i class="bi bi-three-dots"></i> Lainnya</a></li>
                    </ul>
                </details>
            </li>

            {{-- Pengelolaan Kerjasama --}}
            <li>
                <details class="group">
                    <summary
                        class="flex items-center gap-2 px-3 py-2 cursor-pointer rounded-md hover:bg-gray-100 group-open:bg-gray-200">
                        <i class="fa-solid fa-handshake text-2xl"></i>
                        <span>Pengelolaan Kerjasama</span>
                    </summary>
                    <ul class="ml-6 mt-1 space-y-1 text-sm">
                        <li><a href="#" class="hover:text-blue-600"><i class="bi bi-building"></i> Sport Center</a></li>
                        <li><a href="#" class="hover:text-blue-600"><i class="bi bi-dribbble"></i> Mini Soccer</a></li>
                        <li><a href="#" class="hover:text-blue-600"><i class="bi bi-droplet"></i> Renang</a></li>
                        <li><a href="#" class="hover:text-blue-600"><i class="bi bi-lightning"></i> Badminton</a></li>
                    </ul>
                </details>
            </li>

            {{-- Logout --}}
            <li>
                <form action="{{ route('logout') }}" method="POST" id="logout-form">
                    @csrf
                    <button type="submit"
                        class="flex items-center gap-2 w-full text-left px-3 py-2 rounded-md hover:bg-red-100 hover:text-red-600">
                        <i class="bi bi-box-arrow-right text-2xl"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</aside>
