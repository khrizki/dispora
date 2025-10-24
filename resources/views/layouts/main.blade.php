<!DOCTYPE html>
<html lang="en">

<head>
    <title>DISPORA KOTA PADANG</title>
    <meta charset="utf-8" />
    <meta name="description" content="Bantuan Sosial Tidak Terencana" />
    <meta name="keywords" content="boiler, plate, boilerplate" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Bantuan Sosial Tidak Terencana" />
    <meta property="og:url" content="{{ url('') }}" />
    <meta property="og:site_name" content="BSTT | Kota Padang" />
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/logo.png') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--begin::Vendor Stylesheets(used for this page only)-->
    @stack('css')
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- Summernote CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" rel="stylesheet">

</head>

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">

    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-theme-mode");
            } else {
                if (localStorage.getItem("data-theme") !== null) {
                    themeMode = localStorage.getItem("data-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-theme", themeMode);
        }
    </script>

    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            @include('landing.menu._header')
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                @include('landing.menu._sidebar')
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    @include('landing.menu._alert')
                    @yield('content')
                </div>
            </div>
            @include('landing.menu._footer')
        </div>
    </div>

    <!--start::Modal-->
    <div class="modal fade" id="modal-form" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content rounded">
                <div class="modal-header">
                    <h2 id="modal-title"></h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body scroll-y py-10 py-lg-10 px-10 px-lg-15 pt-0 pb-15"></div>
            </div>
        </div>
    </div>

    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!--begin::Custom Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- jQuery + Summernote JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>

    <script>
        function setModalForm(title, element) {
            $('#modal-form').find('#modal-title').html(title);
            $('#modal-form').find('.modal-body').html(element);
            $('#modal-form').modal('show');
        }
    </script>
    @stack('js')

    <style>
        /* ✅ Fix dropdown DataTables ukuran select "Show entries" */
        .dataTables_length select {
            padding: 6px 28px 6px 10px !important;
            min-width: 65px;
            height: 35px;
            line-height: 1.5;
            background-position: right 8px center !important;
            background-repeat: no-repeat !important;
            border-radius: 6px;
        }

        /* ✅ Fix posisi panah agar tidak ketimpa Metronic */
        .dataTables_length select.form-select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23666' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C2.028 5.164 2.478 4.5 3.204 4.5h9.592c.726 0 1.176.664.753 1.158L8.753 11.14a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E") !important;
            appearance: none !important;
        }
    </style>


</body>

</html>
