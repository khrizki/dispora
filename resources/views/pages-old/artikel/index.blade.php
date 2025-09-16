@extends('layouts.main')

@section('title', 'Artikel')

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row col-12 justify-content-between">
                    <div class="col">
                        <h3 class="card-title">List Artikel</h3>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('artikel.create') }}" class="btn btn-danger">+ Tambah</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                        <tr class="text-center">
                            <th class="w-1">No.</th>
                            <th>Judul</th>
                            <th>Konten</th>
                            <th>Thumbnail</th>
                            <th>Highlight</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data['data'] as $item)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{!! $item->isi !!}</td>
                                <td>
                                    <a href="#" class="btn-show" data-imgname="{{ $item->thumbnail }}"
                                        data-url="{{ asset($item->thumbnail) }}">Preview</a>
                                    {{-- <img src="{{asset('uploads/artikel/' . $item->thumbnail)}}" height="200px" width="200px" alt="" /> --}}
                                </td>
                                <td>
                                    <h2 class="text-center text-{{ $item->is_pinned == true ? 'success' : 'danger' }}">
                                        <i class="fa fa-{{ $item->is_pinned == true ? 'check' : 'times' }}"></i>
                                    </h2>
                                </td>
                                <td>
                                    @php
                                        $param = 'delete-form-' . $item->id;
                                    @endphp
                                    <a href="{{ route('artikel.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm"
                                        onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this data?')) document.getElementById('{{ $param }}').submit();">Hapus</a>
                                    <form id="{{ $param }}" action="{{ route('artikel.destroy', $item->id) }}"
                                        method="post" class="d-none">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex align-items-center">
                {!! $data['paginate'] !!}
            </div>
        </div>
    </div>

@endsection

@push('js_script')
    <script>
        $('.btn-show').on('click', function() {
            let thumbnail = $(this).attr('data-url');
            let thumbnailName = $(this).attr('data-imgname');
            if (!thumbnail) return;
            $('#my-modal-preview').modal('show');

            let titlePreview = $('.preview-title');
            let imgHTML = `<img src="${thumbnail}" alt="Preview" class="img-preview" height="100%" width="100%" />`;
            $('.preview-content').html(imgHTML);
            titlePreview.text(thumbnailName);
        });
    </script>
@endpush
