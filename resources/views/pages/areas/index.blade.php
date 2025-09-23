@extends('layouts.main')

@section('title', 'Area')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Data Area
                    </h1>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                        <a href="{{ route('pages.areas.create') }}" class="btn fw-bold btn-primary">Tambah Area</a>
                    </div>
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
                    </div>

                    <div class="card-body py-4">
                        <table id="dataTableArea" class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th>#</th>
                                    <th>Nama Area</th>
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
        const KTDatatablesArea = function() {
            let table;

            const initDatatable = function() {
                table = new DataTable('#dataTableArea', {
                    searchDelay: 500,
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('pages.areas.index') }}",
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        { data: 'nama', name: 'nama' },
                        { data: null }
                    ],
                    columnDefs: [{
                        targets: -1,
                        data: null,
                        orderable: false,
                        className: 'text-end',
                        render: function(data, type, row) {
                            let editRoute = "{{ route('pages.areas.edit', ':id') }}".replace(':id', row.id);
                            let deleteUrl = "{{ route('pages.areas.destroy', ':id') }}".replace(':id', row.id);

                            return `
                                <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    Actions
                                </a>
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                    <div class="menu-item px-3">
                                        <a href="${editRoute}" class="menu-link px-3">Edit</a>
                                    </div>
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
            KTDatatablesArea.init();
        });

        // handle delete via ajax
        $(document).on('click', '[data-kt-docs-table-filter="delete_row"]', function(e) {
            e.preventDefault();
            const url = $(this).attr('href');

            if (confirm('Yakin ingin menghapus area ini?')) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: { _token: '{{ csrf_token() }}' },
                    success: function(response) {
                        alert("Area berhasil dihapus");
                        $('#dataTableArea').DataTable().ajax.reload();
                    },
                    error: function(xhr) {
                        alert("Gagal menghapus area");
                    }
                });
            }
        });
    </script>
@endpush
