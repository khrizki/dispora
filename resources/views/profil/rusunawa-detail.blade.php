@include('landing._head')
@include('landing._navbar')

<style>
    .detail-section {
        background: #fff;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .detail-row {
        display: flex;
        padding: 12px 0;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .detail-row:last-child {
        border-bottom: none;
    }
    
    .detail-label {
        flex: 0 0 250px;
        font-weight: 500;
        color: #333;
    }
    
    .detail-separator {
        margin: 0 15px;
        color: #999;
    }
    
    .detail-value {
        flex: 1;
        color: #666;
    }
    
    .gallery-slider {
        position: relative;
        height: 400px;
        overflow: hidden;
        border-radius: 8px;
        background: #f5f5f5;
    }
    
    .gallery-slider img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .slider-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255,255,255,0.9);
        border: none;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        cursor: pointer;
        font-size: 20px;
        z-index: 10;
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    }
    
    .slider-nav:hover {
        background: #fff;
    }
    
    .slider-nav.prev {
        left: 20px;
    }
    
    .slider-nav.next {
        right: 20px;
    }
    
    .slider-indicators {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 8px;
        z-index: 10;
    }
    
    .slider-indicator {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: rgba(255,255,255,0.6);
        border: 2px solid rgba(255,255,255,0.8);
        cursor: pointer;
    }
    
    .slider-indicator.active {
        background: #fff;
    }
    
    .map-container {
        height: 400px;
        border-radius: 8px;
        overflow: hidden;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .map-container iframe {
        width: 100%;
        height: 100%;
        border: none;
    }
    
    .info-card {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
        border: 1px solid #e0e0e0;
        margin-bottom: 15px;
    }
    
    .fasilitas-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .fasilitas-table thead {
        background: #f5f5f5;
    }
    
    .fasilitas-table th,
    .fasilitas-table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .fasilitas-table th {
        font-weight: 600;
        color: #333;
        text-transform: uppercase;
        font-size: 14px;
    }

    .fasilitas-table td {
        color: #666;
    }
    
    .page-header {
        background: #fff;
        padding: 20px;
        margin-bottom: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .page-title {
        font-size: 24px;
        font-weight: 700;
        color: #333;
        margin: 0;
    }
    
    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        background: #f5f5f5;
        color: #333;
        text-decoration: none;
        border-radius: 6px;
        font-weight: 500;
        transition: all 0.3s;
    }
    
    .back-button:hover {
        background: #e0e0e0;
        color: #000;
    }

    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            gap: 15px;
            text-align: center;
        }

        .detail-label {
            flex: 0 0 150px;
            font-size: 14px;
        }

        .gallery-slider {
            height: 250px;
        }

        .map-container {
            height: 300px;
        }
    }
    nav.navbar,
    .navbar {
        background: #0e3761 !important;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1) !important;
    }
</style>

<section class="py-5 mt-5" style="margin-top: 80px !important;">
    <div class="container">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">{{ strtoupper($rusunawa->nama) }}</h1>
            <a href="{{ route('profil.rusunawa') }}" class="back-button">
                <i class="fa fa-arrow-left"></i>
                Kembali
            </a>
        </div>

        <div class="row">
            <!-- Left Column -->
            <div class="col-lg-6">
                <!-- Gallery Slider -->
                @if($rusunawa->detail && $rusunawa->detail->galeri_foto && count($rusunawa->detail->galeri_foto) > 0)
                <div class="detail-section">
                    <div class="gallery-slider" id="gallerySlider">
                        @foreach($rusunawa->detail->galeri_foto as $index => $foto)
                        <img src="{{ asset('storage/' . $foto['path']) }}" 
                             alt="{{ $foto['caption'] ?? 'Foto ' . ($index + 1) }}" 
                             class="slider-image {{ $index === 0 ? 'active' : '' }}" 
                             style="display: {{ $index === 0 ? 'block' : 'none' }};">
                        @endforeach
                        
                        @if(count($rusunawa->detail->galeri_foto) > 1)
                        <button class="slider-nav prev" onclick="changeSlide(-1)">
                            <i class="fa fa-chevron-left"></i>
                        </button>
                        <button class="slider-nav next" onclick="changeSlide(1)">
                            <i class="fa fa-chevron-right"></i>
                        </button>
                        
                        <div class="slider-indicators">
                            @foreach($rusunawa->detail->galeri_foto as $index => $foto)
                            <span class="slider-indicator {{ $index === 0 ? 'active' : '' }}" 
                                  onclick="goToSlide({{ $index }})"></span>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                @endif

                <!-- Informasi Dasar -->
                <div class="detail-section">
                    <div class="detail-row">
                        <div class="detail-label">Kode</div>
                        <div class="detail-separator">:</div>
                        <div class="detail-value">{{ $rusunawa->detail->kode ?? '-' }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Nama Rusun</div>
                        <div class="detail-separator">:</div>
                        <div class="detail-value">{{ strtoupper($rusunawa->nama) }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">UPRS</div>
                        <div class="detail-separator">:</div>
                        <div class="detail-value">{{ $rusunawa->detail->uprs ?? '-' }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Kepala UPRS</div>
                        <div class="detail-separator">:</div>
                        <div class="detail-value">{{ $rusunawa->detail->kepala_uprs ?? '-' }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Luas Area M²</div>
                        <div class="detail-separator">:</div>
                        <div class="detail-value">{{ $rusunawa->detail->luas_area_m2 ?? '-' }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Kartu Inventaris Barang</div>
                        <div class="detail-separator">:</div>
                        <div class="detail-value">-</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Nomor IMB</div>
                        <div class="detail-separator">:</div>
                        <div class="detail-value">{{ $rusunawa->detail->nomor_imb ?? '-' }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Nomor SLF</div>
                        <div class="detail-separator">:</div>
                        <div class="detail-value">{{ $rusunawa->detail->nomor_slf ?? '-' }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Dana Pembangunan</div>
                        <div class="detail-separator">:</div>
                        <div class="detail-value">{{ $rusunawa->detail->dana_pembangunan ?? '0' }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Status Serah Terima</div>
                        <div class="detail-separator">:</div>
                        <div class="detail-value">{{ $rusunawa->detail->status_serah_terima ?? '-' }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Tahun Pembuatan</div>
                        <div class="detail-separator">:</div>
                        <div class="detail-value">{{ $rusunawa->detail->tahun_pembuatan ?? '-' }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Tarif Unit Terprogram</div>
                        <div class="detail-separator">:</div>
                        <div class="detail-value">{{ number_format($rusunawa->detail->tarif_unit_terprogram ?? 0, 0, ',', '.') }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Tarif Unit Umum</div>
                        <div class="detail-separator">:</div>
                        <div class="detail-value">{{ number_format($rusunawa->detail->tarif_unit_umum ?? 0, 0, ',', '.') }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Batas Maksimum Gaji Boleh Sewa</div>
                        <div class="detail-separator">:</div>
                        <div class="detail-value">{{ number_format($rusunawa->detail->batas_maksimum_gaji ?? 0, 0, ',', '.') }}</div>
                    </div>
                </div>

                <!-- Fasilitas -->
                @if($rusunawa->detail && $rusunawa->detail->fasilitas && count($rusunawa->detail->fasilitas) > 0)
                <div class="detail-section">
                    <h5 style="margin-bottom: 20px; font-weight: 600;">Daftar Fasilitas Penunjang</h5>
                    <table class="fasilitas-table">
                        <thead>
                            <tr>
                                <th style="width: 80px;">NO.</th>
                                <th>NAMA FASILITAS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rusunawa->detail->fasilitas as $index => $fasilitas)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ strtoupper($fasilitas['nama'] ?? '-') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>

            <!-- Right Column -->
            <div class="col-lg-6">
                <!-- Google Maps -->
                @if($rusunawa->detail && $rusunawa->detail->embed_gmaps_url)
                <div class="map-container">
                    <iframe src="{{ $rusunawa->detail->embed_gmaps_url }}" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <!-- Info Card dengan Nama Rusunawa dan Alamat -->
                <div class="info-card">
                    <h6 style="font-weight: 600; margin-bottom: 15px;">
                        {{ strtoupper($rusunawa->nama) }}
                    </h6>
                    <div style="color: #666; line-height: 1.6;">
                        {{ strtoupper($rusunawa->detail->alamat ?? '-') }}
                    </div>
                </div>
                @endif

                <!-- Lokasi Detail -->
                <div class="detail-section">
                    <div class="detail-row">
                        <div class="detail-label">Alamat</div>
                        <div class="detail-separator">:</div>
                        <div class="detail-value">{{ strtoupper($rusunawa->detail->alamat ?? '-') }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Deskripsi</div>
                        <div class="detail-separator">:</div>
                        <div class="detail-value">{{ $rusunawa->detail->deskripsi ?? '-' }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Kelurahan</div>
                        <div class="detail-separator">:</div>
                        <div class="detail-value">{{ strtoupper($rusunawa->detail->kelurahan ?? '-') }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Kecamatan</div>
                        <div class="detail-separator">:</div>
                        <div class="detail-value">{{ strtoupper($rusunawa->detail->kecamatan ?? '-') }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Kota/Kabupaten</div>
                        <div class="detail-separator">:</div>
                        <div class="detail-value">{{ strtoupper($rusunawa->detail->kota_kabupaten ?? '-') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slider-image');
    const indicators = document.querySelectorAll('.slider-indicator');

    function showSlide(n) {
        if (slides.length === 0) return;
        
        if (n >= slides.length) {
            currentSlide = 0;
        }
        if (n < 0) {
            currentSlide = slides.length - 1;
        }
        
        slides.forEach((slide, index) => {
            slide.style.display = index === currentSlide ? 'block' : 'none';
        });
        
        indicators.forEach((indicator, index) => {
            if (index === currentSlide) {
                indicator.classList.add('active');
            } else {
                indicator.classList.remove('active');
            }
        });
    }

    function changeSlide(n) {
        currentSlide += n;
        showSlide(currentSlide);
    }

    function goToSlide(n) {
        currentSlide = n;
        showSlide(currentSlide);
    }

    // Auto slide (optional) - setiap 5 detik
    setInterval(() => {
        changeSlide(1);
    }, 5000);
</script>

@include('landing._footer')