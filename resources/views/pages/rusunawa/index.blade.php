@extends('layouts.main')

@section('title', 'Rusunawa')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Data Rusunawa
                    </h1>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card">
                    <div class="card-header pt-2">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative my-1">
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <!-- ikon search -->
                                </span>
                                <input type="text" data-kt-table-filter="search"
                                    class="form-control form-control-solid w-250px ps-14 filter" placeholder="Search"
                                    id="search" />
                            </div>
                        </div>
                        <div class="card-toolbar">
                            <div class="d-flex align-items-center gap-2 gap-lg-3">
                                <a href="{{ route('pages.rusunawa.create') }}" class="btn fw-bold btn-primary">Add</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-4">
                        <table id="dataTableRusunawa" class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th>#</th>
                                    <th>Nama Rusunawa</th>
                                    <th>Jumlah Tower</th>
                                    <th>Jumlah Blok</th>
                                    <th>Total Unit</th>
                                    <th>Tipe Unit</th>
                                    <th>Unit Kosong</th>
                                    <th>Pengelola</th>
                                    <th>Hotline</th>
                                    <th>Area</th>
                                    <th>Gambar</th>
                                    <th>Status Detail</th>
                                    <th class="text-end min-w-100px">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="text-gray-600 fw-semibold"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        const KTDatatablesRusunawa = function() {
            let table;

            const initDatatable = function() {
                table = new DataTable('#dataTableRusunawa', {
                    searchDelay: 500,
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('pages.rusunawa.index') }}",
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        { data: 'nama', name: 'nama' },
                        { data: 'jumlah_tower', name: 'jumlah_tower' },
                        { data: 'jumlah_blok', name: 'jumlah_blok' },
                        { data: 'total_unit', name: 'total_unit' },
                        { data: 'tipe_unit', name: 'tipe_unit' },
                        { data: 'jumlah_unit_kosong', name: 'jumlah_unit_kosong' },
                        { data: 'pengelola', name: 'pengelola' },
                        { data: 'nomor_hotline', name: 'nomor_hotline' },
                        { data: 'area', name: 'area' },
                        {
                            data: 'gambar',
                            name: 'gambar',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'has_detail',
                            name: 'has_detail',
                            orderable: false,
                            searchable: false
                        },
                        { data: null }
                    ],

                    columnDefs: [{
                        targets: -1,
                        data: null,
                        orderable: false,
                        className: 'text-end',
                        render: function(data, type, row) {
                            let editRoute = "{{ route('pages.rusunawa.edit', ':id') }}".replace(':id', row.id);
                            let deleteUrl = "{{ route('pages.rusunawa.destroy', ':id') }}".replace(':id', row.id);
                            let detailCreateRoute = "{{ route('pages.rusunawa.detail.create', ':id') }}".replace(':id', row.id);
                            let detailEditRoute = "{{ route('pages.rusunawa.detail.edit', ':id') }}".replace(':id', row.id);

                            // Cek apakah sudah ada detail
                            let detailAction = '';
                            if (row.detail) {
                                detailAction = `
                                    <div class="menu-item px-3">
                                        <a href="${detailEditRoute}" class="menu-link px-3">Edit Detail</a>
                                    </div>
                                `;
                            } else {
                                detailAction = `
                                    <div class="menu-item px-3">
                                        <a href="${detailCreateRoute}" class="menu-link px-3">Tambah Detail</a>
                                    </div>
                                `;
                            }

                            return `
                                <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    Actions
                                </a>
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-150px py-4" data-kt-menu="true">
                                    <div class="menu-item px-3">
                                        <a href="${editRoute}" class="menu-link px-3">Edit</a>
                                    </div>
                                    ${detailAction}
                                    <div class="menu-item px-3">
                                        <a href="${deleteUrl}" class="menu-link px-3" data-kt-docs-table-filter="delete_row">Delete</a>
                                    </div>
                                </div>
                            `;
                        },
                    }]
                });
                table.on("draw", function() {
                    KTMenu.createInstances();
                });
            }

            const handleSearchDatatable = function() {
                const filterSearch = document.querySelector('[data-kt-table-filter="search"]');
                filterSearch.addEventListener('keyup', function(e) {
                    table.search(e.target.value).draw();
                });
            }

            return {
                init: function() {
                    initDatatable();
                    handleSearchDatatable();
                }
            }
        }();

        KTUtil.onDOMContentLoaded(function() {
            KTDatatablesRusunawa.init();
        });

        $(document).on('click', '[data-kt-docs-table-filter="delete_row"]', function(e) {
            e.preventDefault();
            const url = $(this).attr('href');

            if (confirm('Yakin ingin menghapus data ini?')) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        alert("Data berhasil dihapus");
                        $('#dataTableRusunawa').DataTable().ajax.reload();
                    },
                    error: function(xhr) {
                        alert("Gagal menghapus data");
                    }
                });
            }
        });
    </script>
@endpush