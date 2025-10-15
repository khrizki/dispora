@include('landing._head')
@include('landing._navbar')

<section class="py-5 mt-5" style="margin-top: 80px !important;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11">

                <!-- Header -->
                <div class="card shadow mb-4">
                    <div class="card-body p-4">
                        <span class="badge rounded-pill border border-primary text-primary px-3 py-1 mb-3">PROGRAM</span>
                        <h2 class="fw-bold mb-1">Prasarana, Sarana, dan Utilitas (PSU)</h2>
                        <p class="text-muted mb-0">Program Pembangunan & Pemeliharaan Infrastruktur</p>
                    </div>
                </div>

                @if($contents && $contents->count() > 0)
                    
                    @foreach($contents as $content)
                        
                        @if($content->content_type == 'info')
                            <!-- Section Info/Text -->
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

                        @elseif($content->content_type == 'program')
                            <!-- Section Program -->
                            <div class="card shadow mb-4">
                                <div class="card-body p-4">
                                    <h5 class="fw-bold text-primary mb-4">
                                        <i class="bi bi-clipboard-check me-2"></i>{{ $content->section_title }}
                                    </h5>
                                    
                                    <div class="row g-3 mb-4">
                                        <!-- Info Grid -->
                                        <div class="col-md-6">
                                            <div class="border rounded p-3 h-100">
                                                <small class="text-muted d-block mb-1">Kategori</small>
                                                <p class="mb-0 fw-semibold">
                                                    <i class="bi bi-tag text-primary"></i> 
                                                    {{ $content->category ?? '-' }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="border rounded p-3 h-100">
                                                <small class="text-muted d-block mb-1">Lokasi</small>
                                                <p class="mb-0 fw-semibold">
                                                    <i class="bi bi-geo-alt text-danger"></i> 
                                                    {{ $content->location ?? '-' }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="border rounded p-3 h-100">
                                                <small class="text-muted d-block mb-1">Anggaran</small>
                                                <p class="mb-0 fw-semibold text-success">
                                                    <i class="bi bi-currency-dollar"></i> 
                                                    Rp {{ $content->budget ? number_format($content->budget, 0, ',', '.') : '-' }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="border rounded p-3 h-100">
                                                <small class="text-muted d-block mb-1">Status</small>
                                                <p class="mb-0">
                                                    @php
                                                        $statusMap = [
                                                            'planning' => ['text' => 'Perencanaan', 'badge' => 'secondary'],
                                                            'ongoing' => ['text' => 'Dalam Pengerjaan', 'badge' => 'info'],
                                                            'final_stage' => ['text' => 'Tahap Akhir', 'badge' => 'warning'],
                                                            'completed' => ['text' => 'Selesai', 'badge' => 'success'],
                                                            'suspended' => ['text' => 'Ditunda', 'badge' => 'danger'],
                                                        ];
                                                        $status = $statusMap[$content->status ?? 'ongoing'] ?? ['text' => '-', 'badge' => 'secondary'];
                                                    @endphp
                                                    <span class="badge bg-{{ $status['badge'] }}">{{ $status['text'] }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Progress Bar -->
                                    @if($content->progress !== null)
                                        <div class="mb-4">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <span class="fw-semibold" style="font-size: 14px;">Progress Pengerjaan</span>
                                                <span class="badge bg-primary">{{ $content->progress }}%</span>
                                            </div>
                                            <div class="progress" style="height: 25px;">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" 
                                                     role="progressbar" 
                                                     style="width: {{ $content->progress }}%;" 
                                                     aria-valuenow="{{ $content->progress }}" 
                                                     aria-valuemin="0" 
                                                     aria-valuemax="100">
                                                    {{ $content->progress }}%
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Timeline -->
                                    @if($content->start_date || $content->target_date)
                                        <div class="row g-3 mb-4">
                                            @if($content->start_date)
                                                <div class="col-md-6">
                                                    <div class="border-start border-primary border-3 ps-3">
                                                        <small class="text-muted d-block">Tanggal Mulai</small>
                                                        <p class="mb-0 fw-semibold">
                                                            <i class="bi bi-calendar-event"></i> 
                                                            {{ \Carbon\Carbon::parse($content->start_date)->format('d F Y') }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($content->target_date)
                                                <div class="col-md-6">
                                                    <div class="border-start border-success border-3 ps-3">
                                                        <small class="text-muted d-block">Target Selesai</small>
                                                        <p class="mb-0 fw-semibold">
                                                            <i class="bi bi-calendar-check"></i> 
                                                            {{ \Carbon\Carbon::parse($content->target_date)->format('d F Y') }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endif

                                    <!-- Description -->
                                    @if($content->content)
                                        <div class="alert alert-light border-start border-primary border-3 mb-4">
                                            <h6 class="fw-bold mb-2">Deskripsi Program:</h6>
                                            <p class="mb-0" style="font-size: 14px; line-height: 1.6;">
                                                {{ $content->content }}
                                            </p>
                                        </div>
                                    @endif

                                    <!-- Contractor -->
                                    @if($content->contractor)
                                        <div class="mb-4">
                                            <small class="text-muted d-block mb-1">Kontraktor Pelaksana</small>
                                            <p class="mb-0 fw-semibold">
                                                <i class="bi bi-building"></i> {{ $content->contractor }}
                                            </p>
                                        </div>
                                    @endif

                                    <!-- Images -->
                                    @if($content->images)
                                        @php
                                            $images = is_string($content->images) ? json_decode($content->images, true) : $content->images;
                                        @endphp
                                        @if($images && is_array($images) && count($images) > 0)
                                            <div>
                                                <h6 class="fw-bold mb-3">Dokumentasi Program:</h6>
                                                <div class="row g-3">
                                                    @foreach($images as $image)
                                                        @if(file_exists(public_path('storage/' . $image)))
                                                            <div class="col-md-4 col-6">
                                                                <img src="{{ asset('storage/' . $image) }}" 
                                                                     class="img-fluid rounded shadow-sm" 
                                                                     alt="Foto Program"
                                                                     style="height: 200px; width: 100%; object-fit: cover; cursor: pointer;"
                                                                     data-bs-toggle="modal" 
                                                                     data-bs-target="#imageModal{{ $loop->parent->index }}_{{ $loop->index }}">
                                                                
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="imageModal{{ $loop->parent->index }}_{{ $loop->index }}" tabindex="-1">
                                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-body p-0">
                                                                                <img src="{{ asset('storage/' . $image) }}" class="img-fluid w-100" alt="Foto Program">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>

                        @elseif($content->content_type == 'statistic')
                            <!-- Section Statistik -->
                            <div class="card shadow mb-4">
                                <div class="card-body p-4">
                                    <h5 class="fw-bold text-primary mb-4">
                                        <i class="bi bi-graph-up me-2"></i>{{ $content->section_title }}
                                    </h5>
                                    
                                    <div class="row g-3 text-center">
                                        <!-- Total Programs -->
                                        <div class="col-md-4 col-6">
                                            <div class="card border-primary h-100">
                                                <div class="card-body p-3">
                                                    <i class="bi bi-clipboard-data text-primary" style="font-size: 2rem;"></i>
                                                    <h3 class="fw-bold mb-0 mt-2 text-primary">
                                                        {{ $content->total_programs ?? 0 }}
                                                    </h3>
                                                    <small class="text-muted">Total Program</small>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Ongoing Programs -->
                                        <div class="col-md-4 col-6">
                                            <div class="card border-info h-100">
                                                <div class="card-body p-3">
                                                    <i class="bi bi-hourglass-split text-info" style="font-size: 2rem;"></i>
                                                    <h3 class="fw-bold mb-0 mt-2 text-info">
                                                        {{ $content->ongoing_programs ?? 0 }}
                                                    </h3>
                                                    <small class="text-muted">Sedang Berjalan</small>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Completed Programs -->
                                        <div class="col-md-4 col-6">
                                            <div class="card border-success h-100">
                                                <div class="card-body p-3">
                                                    <i class="bi bi-check-circle text-success" style="font-size: 2rem;"></i>
                                                    <h3 class="fw-bold mb-0 mt-2 text-success">
                                                        {{ $content->completed_programs ?? 0 }}
                                                    </h3>
                                                    <small class="text-muted">Program Selesai</small>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Total Locations -->
                                        <div class="col-md-6">
                                            <div class="card border-warning h-100">
                                                <div class="card-body p-3">
                                                    <i class="bi bi-geo-alt text-warning" style="font-size: 2rem;"></i>
                                                    <h3 class="fw-bold mb-0 mt-2 text-warning">
                                                        {{ $content->total_locations ?? 0 }}
                                                    </h3>
                                                    <small class="text-muted">Total Lokasi</small>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Total Budget -->
                                        <div class="col-md-6">
                                            <div class="card border-danger h-100">
                                                <div class="card-body p-3">
                                                    <i class="bi bi-cash-stack text-danger" style="font-size: 2rem;"></i>
                                                    <h3 class="fw-bold mb-0 mt-2 text-danger">
                                                        {{ $content->total_budget ? 'Rp ' . number_format($content->total_budget / 1000000000, 1) . 'M' : 'Rp 0' }}
                                                    </h3>
                                                    <small class="text-muted">Total Anggaran (Miliar)</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @if($content->year)
                                        <div class="text-center mt-3">
                                            <span class="badge bg-secondary">Data Tahun {{ $content->year }}</span>
                                        </div>
                                    @endif
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
                                                            <h6 class="fw-bold mb-2" style="font-size: 15px;">
                                                                {{ $item['title'] ?? 'Dokumentasi' }}
                                                            </h6>
                                                            <p class="text-muted mb-3" style="font-size: 13px;">
                                                                <i class="bi bi-geo-alt"></i> {{ $item['location'] ?? '-' }}
                                                                @if(isset($item['date']) && $item['date'])
                                                                    | <i class="bi bi-calendar"></i> {{ \Carbon\Carbon::parse($item['date'])->format('d M Y') }}
                                                                @endif
                                                            </p>
                                                            
                                                            @if(isset($item['image']) && $item['image'] && file_exists(public_path('storage/' . $item['image'])))
                                                                <img src="{{ asset('storage/' . $item['image']) }}" 
                                                                     class="img-fluid rounded shadow-sm mb-3" 
                                                                     alt="{{ $item['title'] ?? 'Foto' }}"
                                                                     style="height: 200px; width: 100%; object-fit: cover; cursor: pointer;"
                                                                     data-bs-toggle="modal" 
                                                                     data-bs-target="#galleryModal{{ $loop->parent->index }}_{{ $loop->index }}">
                                                                
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="galleryModal{{ $loop->parent->index }}_{{ $loop->index }}" tabindex="-1">
                                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h6 class="modal-title">{{ $item['title'] ?? 'Dokumentasi' }}</h6>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                            </div>
                                                                            <div class="modal-body p-0">
                                                                                <img src="{{ asset('storage/' . $item['image']) }}" class="img-fluid w-100" alt="{{ $item['title'] ?? 'Foto' }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="bg-light rounded d-flex align-items-center justify-content-center mb-3" style="height: 200px;">
                                                                    <span class="text-muted">Foto tidak tersedia</span>
                                                                </div>
                                                            @endif

                                                            @if(isset($item['description']) && $item['description'])
                                                                <p class="mb-0 text-muted" style="font-size: 13px; line-height: 1.5;">
                                                                    {{ $item['description'] }}
                                                                </p>
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

                        @elseif($content->content_type == 'report')
                            <!-- Section Report/Download -->
                            <div class="card shadow mb-4">
                                <div class="card-body p-4">
                                    <h5 class="fw-bold text-primary mb-3">
                                        <i class="bi bi-file-earmark-text me-2"></i>{{ $content->section_title }}
                                    </h5>
                                    
                                    @php
                                        $reportFiles = is_string($content->data) ? json_decode($content->data, true) : $content->data;
                                    @endphp

                                    @if($reportFiles && is_array($reportFiles) && count($reportFiles) > 0)
                                        <div class="row g-3">
                                            @foreach($reportFiles as $file)
                                                <div class="col-md-6">
                                                    <div class="card border h-100">
                                                        <div class="card-body p-3">
                                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                                <div class="flex-grow-1">
                                                                    <h6 class="mb-1 fw-semibold" style="font-size: 14px;">
                                                                        @php
                                                                            $extension = isset($file['file']) ? pathinfo($file['file'], PATHINFO_EXTENSION) : '';
                                                                            $iconClass = 'bi-file-earmark-text';
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
                                                                    @if(isset($file['category']) && $file['category'])
                                                                        <span class="badge bg-light text-dark border mb-2" style="font-size: 11px;">
                                                                            {{ $file['category'] }}
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            
                                                            @if(isset($file['report_date']) && $file['report_date'])
                                                                <p class="mb-2 text-muted" style="font-size: 12px;">
                                                                    <i class="bi bi-calendar3"></i> {{ \Carbon\Carbon::parse($file['report_date'])->format('d F Y') }}
                                                                </p>
                                                            @endif
                                                            
                                                            @if(isset($file['description']) && $file['description'])
                                                                <p class="mb-3 text-muted" style="font-size: 13px; line-height: 1.5;">
                                                                    {{ $file['description'] }}
                                                                </p>
                                                            @endif
                                                            
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                @if(isset($file['file']) && $file['file'] && file_exists(public_path('storage/' . $file['file'])))
                                                                    @php
                                                                        $fileSize = filesize(public_path('storage/' . $file['file']));
                                                                        $fileSizeFormatted = $fileSize < 1024 ? $fileSize . ' B' : 
                                                                                           ($fileSize < 1048576 ? round($fileSize / 1024, 2) . ' KB' : 
                                                                                           round($fileSize / 1048576, 2) . ' MB');
                                                                    @endphp
                                                                    <span class="badge bg-secondary" style="font-size: 11px;">
                                                                        {{ strtoupper($extension) }} • {{ $file['file_size'] ?? $fileSizeFormatted }}
                                                                    </span>
                                                                    <a href="{{ asset('storage/' . $file['file']) }}" 
                                                                       class="btn btn-sm btn-primary" 
                                                                       download
                                                                       title="Download {{ $file['title'] ?? 'file' }}">
                                                                        <i class="bi bi-download me-1"></i> Download
                                                                    </a>
                                                                @else
                                                                    <span class="text-muted" style="font-size: 12px;">File tidak tersedia</span>
                                                                    <button class="btn btn-sm btn-secondary" disabled>
                                                                        <i class="bi bi-x-circle me-1"></i> Tidak Tersedia
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