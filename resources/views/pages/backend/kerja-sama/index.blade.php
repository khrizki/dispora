@extends('layouts.main')

@section('title', 'Kerja Sama DISPORA Kota Padang')

@push('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="flex flex-col min-h-screen min-w-sc text-gray-800">
        {{-- 🧭 Header --}}
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-6 border-b border-gray-200 pb-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Data Kerja Sama</h1>
                <p class="text-gray-500 text-sm mt-1">Menampilkan seluruh data kerja sama antara DISPORA dan mitra terkait.</p>
            </div>

            <div class="mt-3 md:mt-0 flex gap-3">
                <div class="relative">
                    <input type="text" data-kt-table-filter="search" id="search"
                        placeholder="Cari kerja sama..."
                        class="block w-64 rounded-md border border-gray-300 pl-10 pr-3 py-2 text-sm placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <i class="fa fa-search text-sm"></i>
                    </span>
                </div>

                <a href="{{ route('admin.kerja-sama.create') }}"
                   class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded-md hover:bg-blue-700 transition-all duration-200">
                    <i class="bi bi-plus-circle"></i> Tambah Data
                </a>
            </div>
        </div>

        {{-- 📊 Card Data Table --}}
        <div class="bg-white rounded-xl shadow-md border border-gray-100">
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table id="dataTableKerjasama" class="min-w-full text-sm text-left text-gray-700">
                        <thead class="border-b bg-gray-50 text-gray-600 uppercase text-xs font-semibold">
                            <tr>
                                <th class="py-3 px-4">#</th>
                                <th class="py-3 px-4">Nama Mitra</th>
                                <th class="py-3 px-4">Jenis Kerja Sama</th>
                                <th class="py-3 px-4">Tanggal Mulai</th>
                                <th class="py-3 px-4">Tanggal Selesai</th>
                                <th class="py-3 px-4 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-gray-800 fw-semibold"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        const KTDatatablesKerjasama = function() {
            let table;

            const initDatatable = function() {
                table = new DataTable('#dataTableKerjasama', {
                    searchDelay: 500,
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    ajax: "{{ route('admin.kerja-sama.index') }}",
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        { data: 'nama_mitra', name: 'nama_mitra' },
                        { data: 'nama_jenis', name: 'nama_jenis' },
                        { data: 'tanggal_mulai', name: 'tanggal_mulai' },
                        { data: 'tanggal_selesai', name: 'tanggal_selesai' },
                        { data: null }
                    ],
                    columnDefs: [{
                        targets: -1,
                        data: null,
                        orderable: false,
                        className: 'text-right',
                        render: function(data, type, row) {
                            let editRoute = "{{ route('admin.kerja-sama.edit', ':slug') }}".replace(':slug', row.slug);
                            let deleteUrl = "{{ route('admin.kerja-sama.destroy', ':slug') }}".replace(':slug', row.slug);

                            return `
                                <div class="flex justify-end gap-2">
                                    <a href="${editRoute}" class="text-blue-600 hover:text-blue-800" title="Edit">
                                        <i class="bi bi-pencil-square text-lg"></i>
                                    </a>
                                    <a href="${deleteUrl}" class="text-red-600 hover:text-red-800" title="Hapus"
                                        data-kt-docs-table-filter="delete_row">
                                        <i class="bi bi-trash text-lg"></i>
                                    </a>
                                </div>
                            `;
                        },
                    }]
                });

                // Refresh after redraw
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
                        data: { _token: '{{ csrf_token() }}' },
                        success: function(response) {
                            Swal.fire('Berhasil!', response.message, 'success');
                            $('#dataTableKerjasama').DataTable().ajax.reload();
                        },
                        error: function(xhr) {
                            Swal.fire('Gagal!', xhr.responseJSON?.message || 'Terjadi kesalahan.', 'error');
                        }
                    });
                }
            });
        });
    </script>
@endpush
