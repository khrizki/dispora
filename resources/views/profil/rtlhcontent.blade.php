@include('landing._head')
@include('landing._navbar')

<section class="py-5 mt-5" style="margin-top: 80px !important;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11">

                <!-- Header -->
                <div class="card shadow mb-4">
                    <div class="card-body p-4">
                        <span class="badge rounded-pill border border-danger text-danger px-3 py-1 mb-3">PROGRAM</span>
                        <h2 class="fw-bold mb-1">Program Perbaikan RTLH</h2>
                        <p class="text-muted mb-0">Rumah Tidak Layak Huni</p>
                    </div>
                </div>

                @if($contents && $contents->count() > 0)
                    
                    @foreach($contents as $content)
                        
                        @if($content->content_type == 'text')
                            <!-- Section Text -->
                            <div class="card shadow mb-4">
                                <div class="card-body p-4">
                                    <h5 class="fw-bold text-primary mb-3">
                                        <i class="bi bi-info-circle me-2"></i>{{ $content->section_title }}
                                    </h5>
                                    <div style="font-size: 15px; line-height: 1.8; text-align: justify;">
                                        {!! $content->content !!}
                                    </div>
                                </div>
                            </div>

                        @elseif($content->content_type == 'faq')
                            <!-- Section FAQ -->
                            <div class="card shadow mb-4">
                                <div class="card-body p-4">
                                    <h5 class="fw-bold text-primary mb-3">
                                        <i class="bi bi-question-circle me-2"></i>{{ $content->section_title }}
                                    </h5>
                                    <div class="accordion accordion-flush" id="faqAccordion{{ $loop->index }}">
                                        {!! str_replace(
                                            ['<div class="accordion"', 'accordion-button"', 'accordion-body"'],
                                            ['<div class="accordion accordion-flush"', 'accordion-button fw-semibold" style="font-size: 14px; padding: 0.75rem 0;"', 'accordion-body" style="font-size: 14px; padding: 0.75rem 0;"'],
                                            $content->content
                                        ) !!}
                                    </div>
                                </div>
                            </div>

                        @elseif($content->content_type == 'gallery')
                            <!-- Section Gallery -->
                            <div class="card shadow mb-4">
                                <div class="card-body p-4">
                                    <h5 class="fw-bold text-primary mb-4">
                                        <i class="bi bi-images me-2"></i>{{ $content->section_title }}
                                    </h5>
                                    
                                    @php
                                        $galleryItems = is_string($content->data) ? json_decode($content->data, true) : $content->data;
                                    @endphp

                                    @if($galleryItems && is_array($galleryItems) && count($galleryItems) > 0)
                                        <div class="row g-3">
                                            @foreach($galleryItems as $item)
                                                <div class="col-md-6">
                                                    <div class="card border h-100">
                                                        <div class="card-body p-3">
                                                            <h6 class="fw-bold mb-1" style="font-size: 15px;">{{ $item['nama'] ?? '-' }}</h6>
                                                            <p class="text-muted mb-3" style="font-size: 13px;">
                                                                <i class="bi bi-geo-alt"></i> {{ $item['lokasi'] ?? '-' }} | 
                                                                <i class="bi bi-calendar"></i> {{ $item['tahun'] ?? '-' }}
                                                            </p>
                                                            
                                                            <div class="row g-2 mb-3">
                                                                <div class="col-6">
                                                                    <p class="mb-1 fw-semibold" style="font-size: 13px;">Sebelum:</p>
                                                                    @if(isset($item['foto_sebelum']) && $item['foto_sebelum'] && file_exists(public_path('storage/' . $item['foto_sebelum'])))
                                                                        <img src="{{ asset('storage/' . $item['foto_sebelum']) }}" 
                                                                             class="img-fluid rounded shadow-sm" 
                                                                             alt="Foto Sebelum"
                                                                             style="height: 150px; width: 100%; object-fit: cover;">
                                                                    @else
                                                                        <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 150px;">
                                                                            <span class="text-muted" style="font-size: 12px;">Foto tidak tersedia</span>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <div class="col-6">
                                                                    <p class="mb-1 fw-semibold" style="font-size: 13px;">Sesudah:</p>
                                                                    @if(isset($item['foto_sesudah']) && $item['foto_sesudah'] && file_exists(public_path('storage/' . $item['foto_sesudah'])))
                                                                        <img src="{{ asset('storage/' . $item['foto_sesudah']) }}" 
                                                                             class="img-fluid rounded shadow-sm" 
                                                                             alt="Foto Sesudah"
                                                                             style="height: 150px; width: 100%; object-fit: cover;">
                                                                    @else
                                                                        <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 150px;">
                                                                            <span class="text-muted" style="font-size: 12px;">Foto tidak tersedia</span>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            @if(isset($item['testimoni']) && $item['testimoni'])
                                                                <div class="alert alert-light border-start border-primary border-3 mb-0 py-2 px-3">
                                                                    <small class="fst-italic" style="font-size: 13px;">"{{ $item['testimoni'] }}"</small>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="alert alert-light text-center" role="alert">
                                            <i class="bi bi-images" style="font-size: 2rem; color: #ddd;"></i>
                                            <p class="text-muted mt-2 mb-0">Galeri belum tersedia.</p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        @elseif($content->content_type == 'download')
                            <!-- Section Download -->
                            <div class="card shadow mb-4">
                                <div class="card-body p-4">
                                    <h5 class="fw-bold text-primary mb-3">
                                        <i class="bi bi-download me-2"></i>{{ $content->section_title }}
                                    </h5>
                                    
                                    @php
                                        $downloadFiles = is_string($content->data) ? json_decode($content->data, true) : $content->data;
                                    @endphp

                                    @if($downloadFiles && is_array($downloadFiles) && count($downloadFiles) > 0)
                                        <div class="row g-3">
                                            @foreach($downloadFiles as $file)
                                                <div class="col-md-6">
                                                    <div class="card border h-100">
                                                        <div class="card-body p-3 d-flex justify-content-between align-items-center">
                                                            <div class="flex-grow-1">
                                                                <h6 class="mb-1 fw-semibold" style="font-size: 14px;">
                                                                    @php
                                                                        $extension = isset($file['file']) ? pathinfo($file['file'], PATHINFO_EXTENSION) : '';
                                                                        $iconClass = 'bi-file-earmark';
                                                                        $iconColor = 'text-secondary';
                                                                        
                                                                        if (in_array(strtolower($extension), ['pdf'])) {
                                                                            $iconClass = 'bi-file-earmark-pdf';
                                                                            $iconColor = 'text-danger';
                                                                        } elseif (in_array(strtolower($extension), ['doc', 'docx'])) {
                                                                            $iconClass = 'bi-file-earmark-word';
                                                                            $iconColor = 'text-primary';
                                                                        } elseif (in_array(strtolower($extension), ['xls', 'xlsx'])) {
                                                                            $iconClass = 'bi-file-earmark-excel';
                                                                            $iconColor = 'text-success';
                                                                        }
                                                                    @endphp
                                                                    <i class="bi {{ $iconClass }} {{ $iconColor }} me-1"></i> 
                                                                    {{ $file['title'] ?? 'Dokumen' }}
                                                                </h6>
                                                                @if(isset($file['description']) && $file['description'])
                                                                    <p class="mb-0 text-muted" style="font-size: 12px;">
                                                                        {{ $file['description'] }}
                                                                    </p>
                                                                @endif
                                                                @if(isset($file['file']) && $file['file'] && file_exists(public_path('storage/' . $file['file'])))
                                                                    @php
                                                                        $fileSize = filesize(public_path('storage/' . $file['file']));
                                                                        $fileSizeFormatted = $fileSize < 1024 ? $fileSize . ' B' : 
                                                                                           ($fileSize < 1048576 ? round($fileSize / 1024, 2) . ' KB' : 
                                                                                           round($fileSize / 1048576, 2) . ' MB');
                                                                    @endphp
                                                                    <span class="badge bg-secondary mt-2" style="font-size: 11px;">
                                                                        {{ strtoupper($extension) }} • {{ $fileSizeFormatted }}
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <div class="ms-3">
                                                                @if(isset($file['file']) && $file['file'] && file_exists(public_path('storage/' . $file['file'])))
                                                                    <a href="{{ asset('storage/' . $file['file']) }}" 
                                                                       class="btn btn-sm btn-primary" 
                                                                       download
                                                                       title="Download {{ $file['title'] ?? 'file' }}">
                                                                        <i class="bi bi-download"></i>
                                                                    </a>
                                                                @else
                                                                    <button class="btn btn-sm btn-secondary" disabled title="File tidak tersedia">
                                                                        <i class="bi bi-x-circle"></i>
                                                                    </button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="alert alert-light text-center" role="alert">
                                            <i class="bi bi-file-earmark-arrow-down" style="font-size: 2rem; color: #ddd;"></i>
                                            <p class="text-muted mt-2 mb-0">Dokumen belum tersedia.</p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        @endif

                    @endforeach

                @else
                    <div class="card shadow">
                        <div class="card-body text-center py-5">
                            <i class="bi bi-inbox" style="font-size: 3rem; color: #ddd;"></i>
                            <p class="text-muted mt-3 mb-0">Konten belum tersedia.</p>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</section>

@include('landing._footer')