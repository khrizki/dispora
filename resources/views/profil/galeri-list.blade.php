@include('landing._head')
@include('landing._navbar')

<style>
    .hero-section {
        background: linear-gradient(135deg, #1a2b6f 0%, #2c5aa0 100%);
        padding: 80px 0 60px;
        position: relative;
        overflow: hidden;
    }
    
    .hero-section::before {
        content: '';
        position: absolute;
        width: 300px;
        height: 300px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
        top: -100px;
        right: -100px;
    }
    
    .hero-section::after {
        content: '';
        position: absolute;
        width: 200px;
        height: 200px;
        background: rgba(255,255,255,0.08);
        border-radius: 50%;
        bottom: -50px;
        left: -50px;
    }
    
    .hero-title {
        color: white;
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        font-size: 2.5rem;
        margin-bottom: 15px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
    }
    
    .hero-subtitle {
        color: rgba(255,255,255,0.9);
        font-size: 1.1rem;
        font-weight: 300;
    }
    
    .filter-container {
        background: white;
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        margin: -30px auto 50px;
        max-width: 600px;
        position: relative;
        z-index: 10;
    }
    
    .filter-btn {
        background: #f8f9fa;
        border: 2px solid #e0e0e0;
        color: #555;
        padding: 12px 30px;
        margin: 5px;
        border-radius: 25px;
        font-weight: 600;
        transition: all 0.3s ease;
        font-size: 0.95rem;
    }
    
    .filter-btn:hover {
        background: #e3f2fd;
        border-color: #2c5aa0;
        color: #1a2b6f;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(44,90,160,0.2);
    }
    
    .filter-btn.active {
        background: linear-gradient(135deg, #1a2b6f 0%, #2c5aa0 100%);
        border-color: #1a2b6f;
        color: white;
        box-shadow: 0 4px 15px rgba(26,43,111,0.3);
    }
    
    .gallery-item {
        opacity: 0;
        animation: fadeInUp 0.6s forwards;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .galeri-card {
        border-radius: 15px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        height: 100%;
        background: white;
    }
    
    .galeri-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.15) !important;
    }
    
    .card-img-container {
        position: relative;
        overflow: hidden;
        height: 250px;
        background: #f5f5f5;
    }
    
    .card-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .galeri-card:hover .card-img-container img {
        transform: scale(1.1);
    }
    
    .card-img-overlay-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: rgba(26,43,111,0.9);
        color: white;
        padding: 8px 15px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        z-index: 2;
        backdrop-filter: blur(10px);
    }
    
    .video-play-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 70px;
        height: 70px;
        background: rgba(255,255,255,0.95);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        color: #1a2b6f;
        transition: all 0.3s ease;
        z-index: 2;
        cursor: pointer;
        box-shadow: 0 5px 20px rgba(0,0,0,0.3);
    }
    
    .galeri-card:hover .video-play-icon {
        transform: translate(-50%, -50%) scale(1.1);
        background: #1a2b6f;
        color: white;
    }
    
    .card-body {
        padding: 20px;
    }
    
    .card-title {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        font-size: 0.95rem;
        color: #1a2b6f;
        margin-bottom: 0;
        line-height: 1.5;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .video-iframe-wrapper {
        position: relative;
        width: 100%;
        height: 100%;
    }
    
    .video-iframe-wrapper iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
    }
    
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #999;
    }
    
    .empty-state i {
        font-size: 4rem;
        margin-bottom: 20px;
        opacity: 0.3;
    }
    
    @media (max-width: 768px) {
        .hero-title {
            font-size: 1.8rem;
        }
        
        .filter-container {
            margin: -20px 15px 30px;
            padding: 20px 15px;
        }
        
        .filter-btn {
            padding: 10px 20px;
            font-size: 0.85rem;
        }
        
        .card-img-container {
            height: 200px;
        }
    }
</style>

<!-- HERO SECTION -->
<section class="hero-section">
    <div class="container">
        <div class="text-center">
            <h1 class="hero-title">Galeri PERKIM Kota Padang</h1>
            <p class="hero-subtitle">Dokumentasi Kegiatan & Program Kami</p>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">

        <!-- FILTER TABS -->
        <div class="filter-container">
            <div class="text-center">
                <button class="btn filter-btn active" data-filter="all">
                    <i class="fas fa-th me-1"></i> Semua
                </button>
                <button class="btn filter-btn" data-filter="foto">
                    <i class="fas fa-image me-1"></i> Foto
                </button>
                <button class="btn filter-btn" data-filter="video">
                    <i class="fas fa-video me-1"></i> Video
                </button>
            </div>
        </div>

        <!-- GRID GALLERY -->
        <div class="row g-4" id="galleryContainer">

            {{-- FOTO --}}
            @foreach ($galeriList as $index => $item)
            <div class="col-lg-4 col-md-6 gallery-item" data-type="foto" style="animation-delay: {{ $index * 0.1 }}s;">
                <div class="card border-0 shadow-sm galeri-card">
                    <a href="{{ asset('storage/' . $item->foto_galery) }}" target="_blank" class="text-decoration-none">
                        <div class="card-img-container">
                            <span class="card-img-overlay-badge">
                                <i class="fas fa-camera me-1"></i> Foto
                            </span>
                            <img src="{{ asset('storage/' . $item->foto_galery) }}" 
                                 class="card-img-top" 
                                 alt="{{ $item->judul_galery }}"
                                 loading="lazy">
                        </div>
                    </a>
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $item->judul_galery }}</h5>
                    </div>
                </div>
            </div>
            @endforeach

            {{-- VIDEO --}}
            @foreach ($videoList as $index => $vid)
            <div class="col-lg-4 col-md-6 gallery-item" data-type="video" style="animation-delay: {{ ($index + count($galeriList)) * 0.1 }}s;">
                <div class="card border-0 shadow-sm galeri-card">
                    <div class="card-img-container">
                        <span class="card-img-overlay-badge">
                            <i class="fas fa-play-circle me-1"></i> Video
                        </span>
                        
                        @php
                            if (!function_exists('getYoutubeId')) {
                                function getYoutubeId($url) {
                                    preg_match('/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|shorts\/))([^\?&"\'<> #]+)/', $url, $matches);
                                    return $matches[1] ?? null;
                                }
                            }
                            $videoId = getYoutubeId($vid->video);
                        @endphp

                        <div class="video-iframe-wrapper">
                            <img src="https://img.youtube.com/vi/{{ $videoId }}/maxresdefault.jpg" 
                                 style="width:100%; height:100%; object-fit:cover;"
                                 alt="{{ $vid->caption ?? 'Video' }}">
                            <div class="video-play-icon" onclick="loadVideo(this, '{{ $videoId }}')">
                                <i class="fas fa-play"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $vid->caption ?? 'Video PERKIM' }}</h5>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <!-- Empty State (hidden by default, shown by JS if needed) -->
        <div id="emptyState" class="empty-state" style="display:none;">
            <i class="fas fa-folder-open"></i>
            <h4>Tidak ada item ditemukan</h4>
            <p>Coba pilih kategori lain</p>
        </div>

    </div>
</section>

<!-- SCRIPTS -->
<script>
    // Filter functionality
    document.querySelectorAll('.filter-btn').forEach(button => {
        button.addEventListener('click', () => {
            // Update active state
            document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            const filter = button.getAttribute('data-filter');
            const items = document.querySelectorAll('.gallery-item');
            let visibleCount = 0;

            items.forEach((item, index) => {
                const shouldShow = filter === 'all' || item.getAttribute('data-type') === filter;
                
                if (shouldShow) {
                    item.style.display = 'block';
                    item.style.animationDelay = `${visibleCount * 0.1}s`;
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            // Show/hide empty state
            document.getElementById('emptyState').style.display = visibleCount === 0 ? 'block' : 'none';
        });
    });

    // Load YouTube video on click
    function loadVideo(element, videoId) {
        const container = element.parentElement;
        container.innerHTML = `
            <iframe width="100%" height="100%" 
                src="https://www.youtube.com/embed/${videoId}?autoplay=1" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
            </iframe>
        `;
    }

    // Smooth scroll animation on load
    window.addEventListener('load', () => {
        document.querySelectorAll('.gallery-item').forEach((item, index) => {
            setTimeout(() => {
                item.style.opacity = '1';
            }, index * 50);
        });
    });
</script>

@include('landing._footer')