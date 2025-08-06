@include('landing._head')
@include('landing._navbar')

{{-- Konten Visi & Misi --}}
<section class="py-5 mt-5" style="margin-top: 80px !important;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="container">
                <h2 class="mb-3">{{ $berita->judul_berita }}</h2>
                <p class="text-muted">{{ \Carbon\Carbon::parse($berita->tanggal_berita)->translatedFormat('d F, Y') }}
                </p>

                <div>
                    {!! $berita->isi_berita !!}
                </div>
            </div>
        </div>
    </div>
</section>

@include('landing._footer')