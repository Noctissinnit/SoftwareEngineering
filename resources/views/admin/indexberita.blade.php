@extends('layouts.app')
@section('content')

<div class="container py-5">

    <h1 class="text-center text-primary mb-5">
        Berita Software Engineering UPITRA
    </h1>

    {{-- Visi Misi --}}
    <section class="mb-5">
        <h2 class="text-primary">Visi & Misi</h2>
        <p><strong>Visi:</strong> Menjadi program studi unggulan di bidang Software Engineering yang berdaya saing nasional dan internasional.</p>
        <p><strong>Misi:</strong></p>
        <ul>
            <li>Menyelenggarakan pendidikan berkualitas di bidang rekayasa perangkat lunak.</li>
            <li>Mengembangkan penelitian inovatif dan aplikatif.</li>
            <li>Berperan aktif dalam pengabdian kepada masyarakat berbasis teknologi.</li>
        </ul>
    </section>

    {{-- Akreditasi --}}
    <section class="mb-5">
        <h2 class="text-primary">Akreditasi Program Studi</h2>
        <div class="alert alert-light border-start border-4 border-primary shadow-sm">
            Program Studi Software Engineering UPITRA telah terakreditasi oleh BAN-PT dengan peringkat 
            <strong>Baik Sekali</strong>.
        </div>
    </section>

    {{-- Informasi Lomba --}}
    <section class="mb-5">
        <h2 class="text-primary">Informasi Lomba</h2>
        <div class="alert alert-primary shadow-sm fw-bold">
            🚀 Coming Soon: Info lomba akan segera hadir di halaman ini.
        </div>
    </section>

    {{-- Profil Singkat --}}
    <section class="mb-5">
        <h2 class="text-primary">Profil Singkat Program Studi</h2>
        <p>
            Program Studi Software Engineering Universitas Pignatelli Triputra (UPITRA) berfokus pada pengembangan perangkat lunak, inovasi teknologi, dan pembentukan lulusan yang siap bersaing di dunia industri digital.
        </p>
    </section>

    {{-- Keahlian --}}
    <section class="mb-5">
        <h2 class="text-primary">Keahlian di Dunia Software Engineering</h2>
        <ul class="list-group">
            <li class="list-group-item">Pengembangan aplikasi web dan mobile</li>
            <li class="list-group-item">Analisis dan desain sistem</li>
            <li class="list-group-item">Manajemen proyek perangkat lunak</li>
            <li class="list-group-item">Keamanan siber</li>
            <li class="list-group-item">Data science dan kecerdasan buatan</li>
        </ul>
    </section>

    {{-- Daftar Acara --}}
    <h2 class="text-primary mb-3">Daftar Acara</h2>
    <div class="table-responsive shadow-sm">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-primary text-center">
                <tr>
                    <th>Nomor</th>
                    <th>Judul Acara</th>
                    <th>Tanggal</th>
                    <th>Penulis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">1</td>
                    <td>Seminar AI</td>
                    <td>10 Okt 2025</td>
                    <td>Admin</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-sm btn-primary">Lihat</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

@endsection
