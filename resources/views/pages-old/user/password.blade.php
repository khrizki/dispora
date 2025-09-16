@extends('layouts.main')

@section('title', 'Update Password')

@section('content')
    
<div class="col-12">
    <form action="{{route('user.password.update')}}" method="post" class="card" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="row row-cards">

            <div class="row d-flex col-sm-12 col-md-12">
              <div class="col-6 my-3">
                  <label class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password Baru" required/>
              </div>
              <div class="col-6 my-3">
                  <label class="form-label">Konfirmasi Password</label>
                  <input type="password" class="form-control" name="konfirmasi_password" placeholder="Konfirmasi Password" required />
              </div>
          </div>
            
            <div class="d-grid">
              <button class="btn btn-primary rounded-pill" type="submit">
                  <i class="fa fa-save"></i> &nbsp; Simpan
              </button>
            </div>

        </div>
      </div>
    </form>
  </div>
@endsection

@push('js_script')
    <script src="{{asset('dist/libs/tinymce/tinymce.min.js')}}" defer></script>
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
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