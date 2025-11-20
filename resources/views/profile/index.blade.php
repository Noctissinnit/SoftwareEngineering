@extends('layouts.main')

@section('content')
<div class="container py-4">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-body p-4">

                    <h3 class="fw-bold text-primary mb-4 text-center">
                        <i class="bi bi-person-circle me-2"></i> Profil Saya
                    </h3>

                    {{-- Alert Success --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    {{-- Alert Error --}}
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    {{-- =====================
                        FORM UPDATE PROFIL
                    ====================== --}}
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Foto Profil --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Foto Profil</label>
                            <div class="d-flex align-items-center">
                                <img src="{{ $user->profile_photo ? asset('storage/'.$user->profile_photo) : asset('images/se.png') }}"
                                     class="rounded-circle border me-3"
                                     width="90" height="90" style="object-fit: cover;">
                                <input type="file" name="profile_photo" class="form-control">
                            </div>
                            <small class="text-muted">Format: JPG, PNG (max 2MB)</small>
                        </div>

                        {{-- Nama --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                       class="form-control" placeholder="Masukkan nama">
                            </div>
                        </div>

                        {{-- Tombol Update --}}
                        <button type="submit" class="btn btn-primary w-100 fw-semibold mb-3">
                            <i class="bi bi-save me-1"></i> Simpan Perubahan
                        </button>
                    </form>


                    <hr class="my-4">

                    {{-- =================================
                        FORM ADD PORTFOLIO
                    ================================== --}}
                    <h5 class="fw-bold mb-3 text-primary">
                        <i class="bi bi-folder2-open me-2"></i> Tambahkan Portfolio
                    </h5>

                    <form action="{{ route('profile.portfolio.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Jenis</label>
                                <select class="form-select" name="type" required>
                                    <option value="">-- pilih --</option>
                                    <option value="pdf">PDF File</option>
                                    <option value="link">Website / Link</option>
                                    <option value="github">GitHub Repo</option>
                                </select>
                            </div>

                            <div class="col-md-8">
                                <label class="form-label fw-semibold">Judul / Nama Portfolio</label>
                                <input type="text" name="title" class="form-control" placeholder="Misal: Project Laravel">
                            </div>
                        </div>

                        <div class="mt-3">
                            <label class="form-label fw-semibold">Upload File (PDF) atau Masukkan Link</label>
                            <input type="file" name="portfolio_file" class="form-control mb-2">
                            <input type="text" name="portfolio_link" class="form-control" placeholder="Masukkan URL jika berupa link / GitHub">
                        </div>

                        <button class="btn btn-success mt-3 w-100 fw-semibold">
                            <i class="bi bi-plus-circle me-1"></i> Tambahkan Portfolio
                        </button>
                    </form>

                    <hr class="my-4">

                    {{-- ================================
                        LIST PORTFOLIO
                    ================================= --}}
                    <h5 class="fw-bold mb-3 text-primary">
                        <i class="bi bi-collection me-2"></i> Daftar Portfolio Anda
                    </h5>

                    @if($portfolios->count() == 0)
                        <p class="text-muted">Belum ada portfolio yang ditambahkan.</p>
                    @else
                        <ul class="list-group">
                            @foreach($portfolios as $p)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $p->title }}</strong><br>
                                        <small class="text-muted">
                                            Jenis: {{ strtoupper($p->type) }}
                                        </small><br>

                                        {{-- Link PDF / URL --}}
                                        @if($p->type == 'pdf')
                                            <a href="{{ asset('storage/'.$p->file_path) }}" target="_blank">Lihat PDF</a>
                                        @else
                                            <a href="{{ $p->url }}" target="_blank">{{ $p->url }}</a>
                                        @endif
                                    </div>

                                    <form action="{{ route('profile.portfolio.delete', $p->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Hapus portfolio ini?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                </div>
            </div>
        </div>
    </div>

</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
@endsection
