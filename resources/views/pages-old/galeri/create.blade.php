@extends('layouts.main')

@section('title', 'Tambah Galeri')

@section('content')

    <div class="col-12">
        <form action="{{ route('galeri.store') }}" method="post" class="card" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row row-cards">

                    <div class="col-sm-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" class="form-control" name="judul" placeholder="Judul" />
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="row flex mb-3">
                            <label class="form-label">Gambar</label>
                            <div class="col">
                                <input type="file" class="form-control gambar" name="gambar" />
                            </div>
                            <div class="col-auto">
                                <a href="#" class="btn btn-icon btn-preview" aria-label="Button">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path
                                            d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-outline-danger">Simpan</button>
            </div>
        </form>
    </div>
@endsection

@push('js_script')
    <script src="{{ asset('dist/libs/tinymce/tinymce.min.js') }}" defer></script>
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function() {
            let options = {
                selector: '#tinymce-mytextarea',
                height: 300,
                menubar: false,
                statusbar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat',
                content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }'
            }
            if (localStorage.getItem("tablerTheme") === 'dark') {
                options.skin = 'oxide-dark';
                options.content_css = 'dark';
            }
            tinyMCE.init(options);

        });
        // @formatter:on
    </script>
@endpush
