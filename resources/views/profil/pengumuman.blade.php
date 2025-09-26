@include('landing._head')
@include('landing._navbar')

<section class="py-5 mt-5" style="margin-top: 80px !important;">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="card shadow">
                    <div class="card-body p-4">

                        <!-- Judul -->
                        <h2 class="fw-bold mb-3">Pengumuman PERKIM Kota Padang</h2>
                        <hr class="my-3">

                        <!-- Form Filter -->
                        <form method="GET" action="{{ route('profil.pengumuman') }}"> 
                            <div class="row g-2 mb-4">
                                <div class="col-md-6">
                                    <input type="text" name="judul" class="form-control"
                                        value="{{ request('judul') }}" placeholder="Cari berdasarkan Judul...">
                                </div>
                                <div class="col-md-4">
                                    <input type="date" name="tanggal" class="form-control"
                                        value="{{ request('tanggal') }}">
                                </div>
                                <div class="col-md-2 d-grid">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search"></i> Cari
                                    </button>
                                </div>
                            </div>
                        </form>

                     @if($pengumuman->count())
    <div class="mb-3 fw-bold">{{ $pengumuman->total() }} Pengumuman</div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengumuman as $item)
                    <tr>
                        <td>{{ $item->judul_pengumuman }}</td>
                        <td>{{ $item->isi_pengumuman }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ $item->jam }} - {{ $item->jam_selesai }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $pengumuman->withQueryString()->links('pagination::bootstrap-5') }}
    </div>
@else
    <div class="alert alert-info">Tidak ada pengumuman ditemukan.</div>
@endif


                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@include('landing._footer')
