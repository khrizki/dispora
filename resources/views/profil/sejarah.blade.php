@include('landing._head')
@include('landing._navbar')

<section class="py-5 mt-5" style="margin-top: 80px !important;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                @if($sejarah)

                    @php
                        $label = $sejarah->label ?? 'PROFIL';
                        $labelKey = strtolower($label);
                        $badgeClass = match($labelKey) {
                            'profil' => 'danger',
                            'sejarah' => 'primary',
                            default => 'secondary'
                        };
                    @endphp

                    <div class="card shadow mb-4">
                        <div class="card-body p-4">

                            <span class="badge rounded-pill border border-{{ $badgeClass }} text-{{ $badgeClass }} px-3 py-1 mb-3">
                                {{ strtoupper($label) }}
                            </span>

                            <h2 class="fw-bold">{{ $sejarah->judul }}</h2>
                            <hr class="my-3">

                            <div style="font-size: 16px; text-align: justify;">
                                {!! nl2br(e($sejarah->konten)) !!}
                            </div>

                        </div>
                    </div>

                @else
                    <div class="alert alert-info">Belum ada data Sejarah.</div>
                @endif

            </div>
        </div>
    </div>
</section>

@include('landing._footer')
