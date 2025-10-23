@include('landing._head')
@include('landing._navbar')

<style>
    nav.navbar,
    .navbar {
        background: #0e3761 !important;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1) !important;
    }

    /* Hero Image Section */
    .berita-hero-img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    /* Article Header */
    .article-header {
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 2px solid #f0f0f0;
    }

    .article-title {
        font-size: 2rem;
        font-weight: 700;
        color: #1a1a1a;
        line-height: 1.3;
        margin-bottom: 1rem;
    }

    .article-meta {
        display: flex;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
        color: #666;
        font-size: 14px;
    }

    .article-meta i {
        color: #0e3761;
    }

    /* Article Content */
    .article-content {
        font-size: 16px;
        line-height: 1.8;
        color: #333;
        text-align: justify;
    }

    .article-content p {
        margin-bottom: 1.2rem;
    }

    .article-content img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 1.5rem 0;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .article-content h2,
    .article-content h3,
    .article-content h4 {
        margin-top: 2rem;
        margin-bottom: 1rem;
        font-weight: 600;
        color: #1a1a1a;
    }

    .article-content ul,
    .article-content ol {
        margin-bottom: 1.5rem;
        padding-left: 2rem;
    }

    .article-content li {
        margin-bottom: 0.5rem;
    }

    /* Back Button */
    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 1.5rem;
        padding: 10px 20px;
        background: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        color: #495057;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .back-button:hover {
        background: #0e3761;
        color: white;
        border-color: #0e3761;
        transform: translateX(-5px);
    }

    /* Share Buttons */
    .share-section {
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 2px solid #f0f0f0;
    }

    .share-buttons {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .share-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        border-radius: 6px;
        text-decoration: none;
        color: white;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .share-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        color: white;
    }

    .share-btn.facebook {
        background: #1877f2;
    }

    .share-btn.twitter {
        background: #1da1f2;
    }

    .share-btn.whatsapp {
        background: #25d366;
    }

    .share-btn.copy {
        background: #6c757d;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .berita-hero-img {
            height: 250px;
        }

        .article-title {
            font-size: 1.5rem;
        }

        .article-content {
            font-size: 15px;
        }

        section.py-5 {
            margin-top: 60px !important;
            padding-top: 2rem !important;
            padding-bottom: 2rem !important;
        }

        .article-meta {
            font-size: 13px;
        }
    }

    @media (max-width: 576px) {
        .berita-hero-img {
            height: 200px;
            border-radius: 8px;
        }

        .article-title {
            font-size: 1.3rem;
        }

        .article-content {
            font-size: 14px;
            text-align: left;
        }

        .back-button {
            padding: 8px 16px;
            font-size: 14px;
        }

        .share-buttons {
            flex-direction: column;
        }

        .share-btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<section class="py-5 mt-5" style="margin-top: 80px !important;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Back Button -->
                <a href="{{ url()->previous() }}" class="back-button">
                    <i class="bi bi-arrow-left"></i>
                    <span>Kembali</span>
                </a>

                <!-- Article Header -->
                <div class="article-header">
                    <h1 class="article-title">{{ $berita->judul_berita }}</h1>
                    <div class="article-meta">
                        <span>
                            <i class="bi bi-calendar3"></i>
                            {{ \Carbon\Carbon::parse($berita->tanggal_berita)->translatedFormat('d F Y') }}
                        </span>
                        <span>
                            <i class="bi bi-person"></i>
                            Admin Dinas DISPORA
                        </span>
                        @if ($berita->kategori ?? false)
                            <span>
                                <i class="bi bi-tag"></i>
                                {{ $berita->kategori }}
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Hero Image -->
                @if ($berita->foto)
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $berita->foto) }}" alt="{{ $berita->judul_berita }}"
                            class="berita-hero-img" loading="lazy">
                    </div>
                @endif

                <!-- Article Content -->
                <div class="article-content">
                    {!! $berita->isi_berita !!}
                </div>

                <!-- Share Section -->
                <div class="share-section">
                    <h6 class="fw-semibold mb-3">Bagikan Berita Ini:</h6>
                    <div class="share-buttons">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                            target="_blank" class="share-btn facebook">
                            <i class="bi bi-facebook"></i>
                            <span>Facebook</span>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($berita->judul_berita) }}"
                            target="_blank" class="share-btn twitter">
                            <i class="bi bi-twitter"></i>
                            <span>Twitter</span>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($berita->judul_berita . ' - ' . url()->current()) }}"
                            target="_blank" class="share-btn whatsapp">
                            <i class="bi bi-whatsapp"></i>
                            <span>WhatsApp</span>
                        </a>
                        <button onclick="copyLink()" class="share-btn copy">
                            <i class="bi bi-link-45deg"></i>
                            <span>Salin Link</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function copyLink() {
        const url = window.location.href;
        navigator.clipboard.writeText(url).then(() => {
            alert('Link berhasil disalin!');
        }).catch(err => {
            console.error('Gagal menyalin link:', err);
        });
    }
</script>

@include('landing._footer')
