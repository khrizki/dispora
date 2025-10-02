@include('landing._head')
@include('landing._navbar')

<section class="py-5 mt-5">
    <div class="container">

        <!-- JUDUL -->
        <div class="text-center mb-4">
            <h3 class="d-inline-block px-4 py-2" 
                style="border:2px solid #1a2b6f; border-radius:8px; background:#f8f9fa; font-family:'Poppins', sans-serif; font-weight:600; box-shadow:0px 4px 6px rgba(0,0,0,0.1);">
                Galeri Foto & Video PERKIM Kota Padang
            </h3>
        </div>

        <!-- FILTER TABS -->
        <div class="text-center mb-4">
            <button class="btn btn-sm filter-btn active" data-filter="all">All</button>
            <button class="btn btn-sm filter-btn" data-filter="foto">Foto</button>
            <button class="btn btn-sm filter-btn" data-filter="video">Video</button>
        </div>

        <!-- GRID -->
        <div class="row" id="galleryContainer">

            {{-- FOTO --}}
            @foreach ($galeriList as $item)
            <div class="col-lg-4 col-md-6 mb-4 gallery-item" data-type="foto">
                <div class="card h-100 border-0 shadow-sm galeri-card" style="background-color: #e3f2fd;">
                    <a href="{{ asset('storage/' . $item->foto_galery) }}" target="_blank">
                        <div class="card-img-container">
                            <img src="{{ asset('storage/' . $item->foto_galery) }}" class="card-img-top" alt="{{ $item->judul_galery }}">
                        </div>
                    </a>
                    <div class="card-body text-center">
                        <h5 class="card-title" style="font-size: 13px">{{ $item->judul_galery }}</h5>
                    </div>
                </div>
            </div>
            @endforeach

            {{-- VIDEO --}}
@foreach ($videoList as $vid)
<div class="col-lg-4 col-md-6 mb-4 gallery-item" data-type="video">
    <div class="card h-100 border-0 shadow-sm galeri-card" style="background-color: #fff;">
        <div class="card-img-container" style="height:220px; overflow:hidden;">
            
            @php
                if (!function_exists('getYoutubeId')) {
                    function getYoutubeId($url) {
                        preg_match('/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|shorts\/))([^\?&"\'<> #]+)/', $url, $matches);
                        return $matches[1] ?? null;
                    }
                }
            @endphp

            <iframe width="100%" height="220" 
                src="https://www.youtube.com/embed/{{ getYoutubeId($vid->video) }}" 
                frameborder="0" allowfullscreen>
            </iframe>

        </div>
        <div class="card-body text-center">
            <h5 class="card-title" style="font-size: 13px">{{ $vid->caption ?? 'Video' }}</h5>
        </div>
    </div>
</div>
@endforeach


        </div>
    </div>
</section>

<!-- FILTER SCRIPT -->
<script>
    document.querySelectorAll('.filter-btn').forEach(button => {
        button.addEventListener('click', () => {
            document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            const filter = button.getAttribute('data-filter');
            document.querySelectorAll('.gallery-item').forEach(item => {
                item.style.display = (filter === 'all' || item.getAttribute('data-type') === filter) ? 'block' : 'none';
            });
        });
    });
</script>


@include('landing._footer')
