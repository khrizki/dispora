<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        referrerpolicy="no-referrer" />

    <!-- Vendor Styles -->
    <link rel="stylesheet" href="{{ asset('assets/backend/vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/vendors/bootstrap-icons/bootstrap-icons.css') }}">

    <!-- ✅ Vite + TailwindCSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('css')
</head>

<body class="bg-gray-50 text-gray-800 font-sans antialiased">

    {{-- Wrapper --}}
    <div id="app" class="flex min-h-screen bg-gray-50">

        {{-- Sidebar --}}
        @include('layouts.partials._sidebar')

        {{-- Main Content --}}
        <main id="main-content"
            class="flex-1 ml-64 min-h-screen p-8 transition-all duration-300 ease-in-out bg-gray-50">
            @yield('content')
        </main>
    </div>

    {{-- Scripts --}}
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/backend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/main.js') }}"></script>

    {{-- ✅ Sidebar Toggle --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            const toggleBtn = document.getElementById('toggleSidebarBtn');

            if (!sidebar || !mainContent || !toggleBtn) return;

            sidebar.classList.add('w-64');
            mainContent.classList.add('ml-64');

            toggleBtn.addEventListener('click', () => {
                const collapsed = sidebar.classList.contains('w-20');

                if (collapsed) {
                    sidebar.classList.remove('w-20');
                    sidebar.classList.add('w-64');
                    mainContent.classList.remove('ml-20');
                    mainContent.classList.add('ml-64');
                    localStorage.removeItem('sidebarCollapsed');
                } else {
                    sidebar.classList.remove('w-64');
                    sidebar.classList.add('w-20');
                    mainContent.classList.remove('ml-64');
                    mainContent.classList.add('ml-20');
                    localStorage.setItem('sidebarCollapsed', 'true');
                }
            });

            if (localStorage.getItem('sidebarCollapsed')) {
                sidebar.classList.remove('w-64');
                sidebar.classList.add('w-20');
                mainContent.classList.remove('ml-64');
                mainContent.classList.add('ml-20');
            }
        });
    </script>

    @stack('js')
</body>
</html>
