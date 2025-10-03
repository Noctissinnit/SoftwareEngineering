<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPITRA Software Engineering</title>
     <link rel="icon" type="image/x-icon" href="{{ asset('images/se.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;600&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
        font-family: 'Poppins', sans-serif;
        color: #333;
        }

        h1, h2, h3, h4, h5 {
            font-family: 'poppins', serif;
            font-weight: 600;
            
        }

        .navbar-nav .nav-link {
            font-weight: 600;
            color: #1b2b1f;
        }
        .navbar-nav .nav-link.active {
            color: #03378c !important; /* hijau */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('images/se.png') }}" alt="Logo" height="60">
                <div class="ms-2">
                    <span class="d-block fw-bold">UPITRA</span>
                    <small class="text">Software Engineering</small>
                </div>
            </a>

            <!-- Toggle untuk mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse justify-content-center" id="mainNavbar">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('berita') }}">Berita</a>
                    </li>

                    <!-- Prodi dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Prodi
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('visi-misi')}}">Visi & Misi</a></li>
                            <li><a class="dropdown-item" href="{{ route('sejarah-prodi')}}">Sejarah Prodi</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profildosen') }}">Profil Dosen</a>
                    </li>

                    <!-- Kemahasiswaan dropdown -->
                    <li class="nav-item ">
                        <a class="nav-link " href="{{ route('mahasiswa') }}" >
                            Kemahasiswaan
                        </a>
                       
                    </li>

                    <!-- Dokumen dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Dokumen
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('dokumen')}}">Dokumen</a></li>
                            <li><a class="dropdown-item" href="{{route('rps-index')}}">Rencana Program Studi</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pmb') }}">PMB</a>
                    </li>
                </ul>
            </div>

            <!-- Icon Instagram -->
                    <!-- Icon Instagram -->
          <div class="d-flex align-items-center gap-3">
                <!-- Instagram -->
                <a href="https://instagram.com/" target="_blank" class="nav-link text fs-4">
                    <i class="bi bi-instagram"></i>
                </a>

                @auth
                    <!-- Dropdown User -->
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ Auth::user()->profile_photo_url ?? asset('images/se.png') }}" 
                                alt="Profile" class="rounded-circle" width="40" height="40">
                            <span class="ms-2 fw-semibold">{{ Auth::user()->name }}</span>
                        </a>
                      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    <i class="bi bi-person me-2"></i> Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.berita') }}">
                                    <i class="bi bi-speedometer2 me-2"></i> Dashboard Admin
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>

                    </div>
                @else
                    <!-- Kalau belum login -->
                    <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
                @endauth
            </div>

        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</body>
</html>
