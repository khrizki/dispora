@extends('layouts.main')

@section('content')
  ok
@endsection


@push('script')
  <script>
    $(document).ready(function(){
      $('#dataTable').DataTable({
          "autoWidth": false,
          "processing": true,
          "serverSide": true,
          "orderable": true,
          "ajax": {
              "url": "{{route('dashboard')}}",
              "dataType": "json",
              "type": "GET",
              "data": function(d) {
                  d._token = "{{csrf_token()}}"
              },
          },
          "columns": [
            {
              data: 'DT_RowIndex',
              name: 'DT_RowIndex',
              orderable: false,
              searchable: false
            },
            {
                data: 'label'
            },
          ]
      });

    });
  </script>
@endpush