@extends('layouts.main')

@section('title', 'Kerja Sama DISPORA Kota Padang')

@push('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Data Kerja Sama DISPORA Kota Padang
                    </h1>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card">
                    <div class="card-header pt-2">
                        <div class="card-title">
                            <!-- Search -->
                            <div class="d-flex align-items-center position-relative my-1">
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <i class="fa fa-search"></i>
                                </span>
                                <input type="text" data-kt-table-filter="search"
                                    class="form-control form-control-solid w-250px ps-14 filter"
                                    placeholder="Cari Kerja Sama" id="search" />
                            </div>
                        </div>

                        <div class="card-toolbar">
                            <div class="d-flex align-items-center gap-2 gap-lg-3">
                                <a href="{{ route('admin.kerja-sama.create') }}" class="btn fw-bold btn-primary">
                                    Tambah Data
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body py-4">
                        <!--begin::Datatable-->
                        <table id="dataTableKerjasama" class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th>#</th>
                                    <th>Nama Mitra</th>
                                    <th>Jenis Kerja Sama</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th class="text-end min-w-100px">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold"></tbody>
                        </table>
                        <!--end::Datatable-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        const KTDatatablesKerjasama = function() {
            let table;

            const initDatatable = function() {
                table = new DataTable('#dataTableKerjasama', {
                    searchDelay: 500,
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('admin.kerja-sama.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'nama_mitra',
                            name: 'nama_mitra'
                        },
                        {
                            data: 'jenis_kerjasama',
                            name: 'jenis_kerjasama'
                        },
                        {
                            data: 'tanggal_mulai',
                            name: 'tanggal_mulai'
                        },
                        {
                            data: 'tanggal_selesai',
                            name: 'tanggal_selesai'
                        },
                        {
                            data: null
                        }
                    ],
                    columnDefs: [{
                        targets: -1,
                        data: null,
                        orderable: false,
                        className: 'text-end',
                        render: function(data, type, row) {
                            let editRoute = "{{ route('admin.kerja-sama.edit', ':slug') }}"
                                .replace(':slug', row.slug);
                            let deleteUrl = "{{ route('admin.kerja-sama.destroy', ':slug') }}"
                                .replace(':slug', row.slug);

                            return `
                                <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                :
                                </a>

                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded
                                            menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                    data-kt-menu="true">
                                    <div class="menu-item px-3">
                                        <a href="${editRoute}" class="menu-link px-3">Edit</a>
                                    </div>
                                    <div class="menu-item px-3">
                                        <a href="${deleteUrl}" class="menu-link px-3 text-danger"
                                        data-kt-docs-table-filter="delete_row">Delete</a>
                                    </div>
                                </div>
                            `;
                        },
                    }]
                });

                // Refresh dropdown menu
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
            KTDatatablesKerjasama.init();
        });

        // Delete confirmation
        $(document).on('click', '[data-kt-docs-table-filter="delete_row"]', function(e) {
            e.preventDefault();
            const url = $(this).attr('href');

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: 'Data yang dihapus tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire('Berhasil!', response.message, 'success');
                            $('#dataTableKerjasama').DataTable().ajax.reload();
                        },
                        error: function(xhr) {
                            Swal.fire('Gagal!', xhr.responseJSON?.message ||
                                'Terjadi kesalahan.', 'error');
                        }
                    });
                }
            });
        });
    </script>
@endpush
