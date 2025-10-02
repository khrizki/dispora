@extends('layouts.main')

@section('title', 'Sejarah')

@section('content')
<div class="d-flex flex-column flex-column-fluid">

    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Sejarah
                </h1>
            </div>
        </div>
    </div>

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">

            <div class="card">
                <div class="card-header pt-2">
                    <div class="card-title">Data Sejarah</div>

                    <div class="card-toolbar">
                        @if(!$sejarah)
                            <a href="{{ route('pages.sejarah.create') }}" class="btn fw-bold btn-primary">Tambah</a>
                        @endif
                    </div>
                </div>

                <div class="card-body py-4">
                    @if($sejarah)
                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th>#</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Label</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="text-gray-600 fw-semibold">
                                <tr>
                                    <td>1</td>
                                    <td>{{ Str::limit($sejarah->judul, 50) }}</td>
                                    <td>{{ Str::limit(strip_tags($sejarah->konten), 80) }}</td>
                                    <td>{{ Str::limit(strip_tags($sejarah->label), 80) }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('pages.sejarah.edit', $sejarah->id) }}" class="btn btn-light btn-active-light-primary btn-sm">Edit</a>

                                        <form action="{{ route('pages.sejarah.destroy', $sejarah->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-light-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @else
                        <p class="text-center text-muted">Belum ada data sejarah</p>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
