@extends('layouts.main')

@section('title', 'Tupoksi')

@section('content')
<div class="d-flex flex-column flex-column-fluid">

    <!-- Toolbar -->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Tupoksi
                </h1>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">

            <div class="card">
                <div class="card-header pt-2">
                    <div class="card-title">
                        Data Tupoksi
                    </div>

                    <div class="card-toolbar">
                        <a href="{{ route('pages.tupoksi.create') }}" class="btn fw-bold btn-primary">Tambah</a>
                    </div>
                </div>

                <div class="card-body py-4">
                    @if($tupoksi->count())
                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th>#</th>
                                    <th>Jabatan</th>
                                    <th>Deskripsi</th>
                                    <th>Fungsi</th>
                                    <th>Urutan</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="text-gray-600 fw-semibold">
                                @foreach($tupoksi as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->jabatan }}</td>
                                        <td>{{ Str::limit(strip_tags($item->deskripsi), 50) }}</td>
                                        <td>{{ count(explode("\n", trim($item->fungsi))) }} Poin</td>
                                        <td>{{ $item->urutan }}</td>
                                        <td class="text-end">
                                            <!-- Tombol Actions -->
                                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                                data-kt-menu-trigger="click"
                                                data-kt-menu-placement="bottom-end">
                                                Actions
                                            </a>

                                            <!-- Dropdown menu -->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                data-kt-menu="true">
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('pages.tupoksi.edit', $item->id) }}" class="menu-link px-3">
                                                        Edit
                                                    </a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <form action="{{ route('pages.tupoksi.destroy', $item->id) }}" method="POST"
                                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="menu-link px-3 border-0 bg-transparent text-danger">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-center text-muted">Belum ada data Tupoksi</p>
                    @endif
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
