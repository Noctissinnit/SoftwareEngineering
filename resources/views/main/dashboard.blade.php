@extends('layouts.main')

@section('content')
    <section class="hero-section text-white" style="background: linear-gradient(135deg, #03378c 0%, #0056d2 100%); padding: 100px 0; width: 100vw; position: relative; left: 50%; right: 50%; margin-left: -50vw; margin-right: -50vw;">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-3">Program Studi Sistem Informasi</h1>
            <p class="lead mb-5">Mempersiapkan lulusan yang unggul, kreatif & profesional berbasis teknologi informasi.</p>
            <a href="#" class="btn btn-light text-primary px-5 py-3 fw-semibold shadow-sm" style="transition: background-color 0.3s ease;">
            Kenali Kami Lebih Dalam
            </a>
        </div>
    </section>

    <section class="info-stats py-5">
        <div class="container">
            <div class="row text-center g-4">
                @php
                    $stats = [
                        ['icon' => 'bi-people-fill', 'number' => '120+', 'label' => 'Mahasiswa Aktif'],
                        ['icon' => 'bi-person-badge-fill', 'number' => '30', 'label' => 'Dosen & Tenaga Pengajar'],
                        ['icon' => 'bi-laptop-fill', 'number' => '5', 'label' => 'Laboratorium TI & Jaringan'],
                        ['icon' => 'bi-graph-up-arrow', 'number' => '95%', 'label' => 'Lulusan Bekerja (1 tahun)']
                    ];
                @endphp

                @foreach($stats as $stat)
                    <div class="col-md-3">
                        <div class="stat-card p-4 border rounded shadow-sm d-flex flex-column align-items-center">
                            <i class="bi {{ $stat['icon'] }} fs-1 mb-2" style="color: #03378c;"></i>
                            <h2 class="stat-number fw-bold" style="color: #03378c; font-size: 2.5rem;">{{ $stat['number'] }}</h2>
                            <p class="stat-label text-muted mb-0">{{ $stat['label'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

   <section class="visi-misi py-5 bg-light" style="width: 100vw; position: relative; left: 50%; right: 50%; margin-left: -50vw; margin-right: -50vw;">
        <div class="container">
            <div class="row align-items-center gy-4">
                <div class="col-lg-6">
                    <h3 style="color: #03378c;">
                        <i class="bi bi-eye-fill me-2"></i>Visi Prodi
                    </h3>
                    <p class="fs-5" style="line-height: 1.6;">
                        Mewujudkan Program Studi S1 Sistem Informasi yang memiliki reputasi nasional di bidang Pendidikan, penelitian dan pengabdian masyarakat berkarakter Ahlusunnah wal jamaah dalam pengembangan sistem informasi cerdas.
                    </p>
                </div>
                <div class="col-lg-6">
                    <h3 style="color: #03378c;">
                        <i class="bi bi-flag-fill me-2"></i>Misi Prodi
                    </h3>
                    <ol class="fs-5" style="line-height: 1.6;">
                        <li>Menyelenggarakan pendidikan program sarjana berstandar nasional di bidang sistem informasi berbasis teknologi cerdas.</li>
                        <li>Melaksanakan penelitian inovatif di bidang sistem informasi.</li>
                        <li>Memfasilitasi implementasi hasil penelitian untuk masyarakat.</li>
                        <li>Menjalin kolaborasi dengan institusi dan industri relevan.</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>


    <section class="berita-home py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 style="color: #03378c;">Berita Terbaru</h3>
                <a href="{{ route('berita') }}" class="text-decoration-none" style="color: #03378c;">Lihat Semua →</a>
            </div>
            <div class="row g-4">
                {{-- @foreach($latestNews as $news)
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 rounded overflow-hidden" style="transition: transform 0.3s ease;">
                            @if($news->thumbnail)
                                <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="{{ $news->title }}" class="card-img-top" style="object-fit: cover; height: 200px;">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ Str::limit($news->title, 60) }}</h5>
                                <p class="card-text small text-muted">{{ $news->created_at->format('d M Y') }}</p>
                                <a href="{{ url('/berita/' . $news->slug) }}" class="stretched-link text-primary">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach --}}
            </div>
        </div>
    </section>
@endsection
