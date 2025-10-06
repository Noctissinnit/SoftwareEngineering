@extends('layouts.app')
@section('content')

<div class="container py-5">

    <h1 class="text-center text-primary mb-5">
        Berita Software Engineering UPITRA
    </h1>

    {{-- Navbar Tab --}}
    <ul class="nav nav-tabs mb-4 justify-content-center" id="beritaTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="acara-tab" data-bs-toggle="tab" data-bs-target="#acara" type="button" role="tab" aria-controls="acara" aria-selected="true">
                Acara
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="visi-tab" data-bs-toggle="tab" data-bs-target="#visi" type="button" role="tab" aria-controls="visi" aria-selected="false">
                Visi & Misi
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="akreditasi-tab" data-bs-toggle="tab" data-bs-target="#akreditasi" type="button" role="tab" aria-controls="akreditasi" aria-selected="false">
                Akreditasi
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profil-tab" data-bs-toggle="tab" data-bs-target="#profil" type="button" role="tab" aria-controls="profil" aria-selected="false">
                Tujan Prodi
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="keahlian-tab" data-bs-toggle="tab" data-bs-target="#keahlian" type="button" role="tab" aria-controls="keahlian" aria-selected="false">
                Keahlian
            </button>
        </li>
    </ul>

    <div class="tab-content" id="beritaTabContent">
        {{-- Tab Acara --}}
        <div class="tab-pane fade show active" id="acara" role="tabpanel" aria-labelledby="acara-tab">
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
                            <td>Proses Perangkat Lunak</td>
                            <td>6 Okt 2025</td>
                            <td>Said Hirzi Hadi S.Kom., M.Eng</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-info me-1">Lihat</button>
                                <button class="btn btn-sm btn-warning me-1">Edit</button>
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>Jaringan Komunikasi Data</td>
                            <td>06 Okt 2025</td>
                            <td>Bagas Dwi Yulianto S.Kom., M.Kom</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-info me-1">Lihat</button>
                                <button class="btn btn-sm btn-warning me-1">Edit</button>
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>Ujian Tengah Semester</td>
                            <td>20 Okt 2025</td>
                            <td>Dosen Masing Masing Mata Kuliah</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-info me-1">Lihat</button>
                                <button class="btn btn-sm btn-warning me-1">Edit</button>
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Visi & Misi --}}
        <div class="tab-pane fade" id="visi" role="tabpanel" aria-labelledby="visi-tab">
            <section class="mb-5 mt-4">
                <h2 class="text-primary">Visi & Misi</h2>
                <p><strong>Visi:</strong> Program studi yang unggul dalam bidang rekayasa perangkat lunak, berorientasi global, menjunjung tinggi nilai-nilai integritas dan bersemangat kebhinekaan.</p>
                <p><strong>Misi:</strong></p>
                <ul>
                    <li>Menyelenggarakan program studi Rekayasa Perangkat Lunak secara efektif dan efisien untuk mendukung terlaksananya Tri Dharma perguruan tinggi.</li>
                    <li>Menghasilkan sarjana di bidang rekayasa perangkat lunak yang kompeten, solutif, berpola pikir logis dan sistematis, memiliki kedalaman spiritual, menjunjung kemanusiaan, rendah hati, berintegritas dan profesional dalam memanfaatkan ilmu rekayasa perangkat lunak di lingkungan kerja maupun kehidupan bermasyarakat.</li>
                    <li>Menghasilkan penelitian yang unggul, solutif, inovatif dan transformatif bagi masyarakat dibidang rekayasa perangkat lunak.</li>
                    <li>Memanfaatkan ilmu rekayasa perangkat lunak yang berdaya guna dan berhasil guna bagi masyarakat.</li>
                    <li>Membangun kerja sama dan mengelola jejaring berkelanjutan dengan dunia pendidikan, masyarakat, pemerintah dan industri untuk mewujudkan keunggulan transformatif dibidang rekayasa perangkat lunak.</li>
                </ul>
            </section>
        </div>

        {{-- Akreditasi --}}
        <div class="tab-pane fade" id="akreditasi" role="tabpanel" aria-labelledby="akreditasi-tab">
            <section class="mb-5 mt-4">
                <h2 class="text-primary">Akreditasi Program Studi</h2>
                <div class="alert alert-light border-start border-4 border-primary shadow-sm">
                    Program Studi Software Engineering UPITRA telah terakreditasi oleh BAN-PT nomor: 101/SK/LAM-INFOKOM/Ak.P/S/XII/2024 dengan peringkat 
                    <strong>Baik Sekali</strong>.
                </div>
            </section>
        </div>

        {{-- Tujuan Prodi --}}
        <div class="tab-pane fade" id="profil" role="tabpanel" aria-labelledby="profil-tab">
            <section class="mb-5 mt-4">
                <h2 class="text-primary">Tujuan Program Studi</h2>
               <ul class="list-group">
                    <li class="list-group-item">Berkontribusi dalam memperluas akses pendidikan tinggi yang berkualitas dan terjangkau bagi masyarakat di bidang rekayasa perangkat lunak.</li>
                    <li class="list-group-item">Menghasilkan sarjana bidang Rekayasa Perangkat Lunak yang bermoral, berintegritas, profesional, bertanggung jawab, dan mampu berkarya dengan keahliannya di bidang rekayasa perangkat lunak.</li>
                    <li class="list-group-item">Berkontribusi dalam pengembangan dan penelitian perangkat lunak yang unggul, solutif, inovatif dan transformatif bagi masyarakat dan kehidupan.</li>
                    <li class="list-group-item">Menerapkan ilmu rekayasa perangkat lunak yang berdaya guna dan berhasil guna bagi masyarakat.</li>
                    <li class="list-group-item">Menjalin kerja sama dengan dunia pendidikan, masyarakat, pemerintah dan industri yang berkelanjutan, beretika, dan bermanfaat di bidang rekayasa perangkat lunak.</li>
                </ul>
            </section>
        </div>

        {{-- Keahlian --}}
        <div class="tab-pane fade" id="keahlian" role="tabpanel" aria-labelledby="keahlian-tab">
            <section class="mb-5 mt-4">
                <h2 class="text-primary">Keahlian di Dunia Software Engineering</h2>
                <ul class="list-group">
                    <li class="list-group-item">Pengembangan aplikasi web dan mobile</li>
                    <li class="list-group-item">Analisis dan desain sistem</li>
                    <li class="list-group-item">Manajemen proyek perangkat lunak</li>
                    <li class="list-group-item">Keamanan data</li>
                </ul>
            </section>
        </div>
    </div>

</div>

@endsection
