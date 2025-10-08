@extends('layouts.app')
@section('content')

<div class="container py-5">

    <h1 class="text-center text-primary mb-5">
        Berita Software Engineering UPITRA
    </h1>

    {{-- Tombol Tambah Acara --}}
    <div class="mb-3 text-end">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahAcara">
            Tambah Acara
        </button>
    </div>

    {{-- Modal Tambah Acara --}}
    <div class="modal fade" id="modalTambahAcara" tabindex="-1" aria-labelledby="modalTambahAcaraLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form action="{{ route('acara.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalTambahAcaraLabel">Tambah Acara</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Acara</label>
                    <input type="text" class="form-control" name="judul" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" required>
                </div>
                <div class="mb-3">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input type="text" class="form-control" name="penulis" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Acara</label>
                    <textarea class="form-control" name="deskripsi" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Acara</label>
                    <input type="file" class="form-control" name="foto" accept="image/*">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
        </form>
      </div>
    </div>

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
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($acaras as $acara)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $acara->judul }}</td>
                            <td>{{ \Carbon\Carbon::parse($acara->tanggal)->format('d M Y') }}</td>
                            <td>{{ $acara->penulis }}</td>
                            <td>{{ $acara->deskripsi }}</td>
                            <td class="text-center">
                                {{-- Tombol Edit --}}
                                <button class="btn btn-sm btn-warning me-1" data-bs-toggle="modal" data-bs-target="#modalEditAcara{{ $acara->id }}">Edit</button>
                                {{-- Modal Edit --}}
                                <div class="modal fade" id="modalEditAcara{{ $acara->id }}" tabindex="-1" aria-labelledby="modalEditAcaraLabel{{ $acara->id }}" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <form action="{{ route('acara.update', $acara->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="modalEditAcaraLabel{{ $acara->id }}">Edit Acara</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="judul" class="form-label">Judul Acara</label>
                                                <input type="text" class="form-control" name="judul" value="{{ $acara->judul }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tanggal" class="form-label">Tanggal</label>
                                                <input type="date" class="form-control" name="tanggal" value="{{ $acara->tanggal }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="penulis" class="form-label">Penulis</label>
                                                <input type="text" class="form-control" name="penulis" value="{{ $acara->penulis }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="deskripsi" class="form-label">Deskripsi Acara</label>
                                                <textarea class="form-control" name="deskripsi" rows="3" required>{{ $acara->deskripsi }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="foto" class="form-label">Foto Acara</label>
                                                <input type="file" class="form-control" name="foto" accept="image/*">
                                                @if($acara->foto)
                                                    <img src="{{ asset('storage/' . $acara->foto) }}" alt="Foto Acara" class="img-fluid mt-2" style="max-height:120px;">
                                                @endif
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                          </div>
                                        </div>
                                    </form>
                                  </div>
                                </div>
                                {{-- Tombol Hapus --}}
                                <form action="{{ route('acara.destroy', $acara->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus acara ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
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
