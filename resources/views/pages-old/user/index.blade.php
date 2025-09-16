@extends('layouts.main')

@section('title', 'User')

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row col-12 justify-content-between">
                    <div class="col">
                        <h3 class="card-title">List User</h3>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                        <tr>
                            <th class="w-1">No.</th>
                            <th>NIP</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data['data'] as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nip }}</td>
                                <td>{{ $item->Role->deskripsi }}</td>
                                <td>
                                    @php
                                        $message = 'Apa anda yakin untuk reset password akun ' . $item->nip . ' ?';
                                    @endphp
                                    <a href="{{ route('user.password.reset', $item->nip) }}" class="btn btn-warning btn-sm"
                                        onclick="return confirm('{{ $message }}')">Reset Password</a>
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
