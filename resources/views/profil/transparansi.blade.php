@include('landing._head')
@include('landing._navbar')

{{-- Konten Visi & Misi --}}
<section class="py-5 mt-5" style="margin-top: 80px !important;">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="card shadow">
                    <div class="card-body p-4">

                        <!-- Judul -->
                        <h2 class="fw-bold">Data Transparansi Keuangan Daerah BPKAD Kota Padang</h2>
                        <hr class="my-3">

                        <!-- Tabel Transparansi Anggaran -->
                        <div class="table-responsive">
                            <table id="tabelAnggaran" class="table custom-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>File</th>
                                        <th>Tahun</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $i => $item)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $item->judul }}</td>
                                            <td>
                                                <a href="{{ asset('storage/' . $item->file) }}"
                                                    target="_blank">Download</a>
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($item->tahun)->format('Y') }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>



            </div>
        </div>
    </div>
</section>

@include('landing._footer')
<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tabelAnggaran').DataTable();
    });
</script>
