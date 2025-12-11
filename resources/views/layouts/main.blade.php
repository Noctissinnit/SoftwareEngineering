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
            transition: background-color .3s ease, color .3s ease;
        }

        /* DARK MODE AUTO */
        @media (prefers-color-scheme: dark) {
            body { color: #e6e6e6; background: #111; }
            .navbar-modern {
                background: rgba(20, 20, 20, 0.75) !important;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
            }
            .navbar-nav .nav-link { color: #eee !important; }
            .navbar-nav .nav-link.active::after,
            .navbar-nav .nav-link:hover::after {
                background: #4da3ff !important;
            }
            .dropdown-menu {
                background: #1d1d1d;
                color: #eee;
            }
            .dropdown-menu .dropdown-item:hover {
                background: #2b2b2b;
                color: #4da3ff;
            }
        }

        /* NAVBAR MODERN */
        .navbar-modern {
            position: sticky;
            top: 0;
            z-index: 999;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            transition: all .3s ease;
            padding: 18px 0;
        }

        /* shrink saat scroll */
        .navbar-shrink {
            padding: 8px 0;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            box-shadow: 0 4px 20px rgba(0,0,0,0.06);
        }

        .navbar-brand span {
            font-size: 1.3rem;
            letter-spacing: 0.5px;
        }

        .navbar-brand small {
            font-size: 0.75rem;
            opacity: 0.75;
        }

        .navbar-nav .nav-link {
            font-weight: 600;
            margin: 0 10px;
            padding: 6px 8px;
            position: relative;
            color: #1a1a1a;
            transition: .25s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #003d9c;
            transform: translateY(-1px);
        }

        .navbar-nav .nav-link::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -3px;
            width: 0%;
            height: 2px;
            background: #003d9c;
            border-radius: 50px;
            transition: width .25s ease;
        }

        .navbar-nav .nav-link:hover::after,
        .navbar-nav .nav-link.active::after {
            width: 100%;
        }

        .dropdown-menu {
            border-radius: 16px;
            border: none;
            padding: 8px 0;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            animation: fadeSlide .25s ease;
        }

        .dropdown-item {
            font-weight: 500;
            padding: 10px 20px;
        }

        .dropdown-item:hover {
            background: #f0f4ff;
            color: #003d9c;
        }

        @keyframes fadeSlide {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .profile-thumb {
            border-radius: 50%;
            object-fit: cover;
            box-shadow: 0px 2px 8px rgba(0,0,0,0.12);
            transition: .25s ease;
        }
        .profile-thumb:hover {
            transform: scale(1.05);
        }

        .btn-login {
            font-weight: 600;
            border-radius: 30px;
            padding: 6px 18px;
            transition: .3s ease;
        }
        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
    </style>

</head>
<body>
    @php
        function isActive($routeName)
        {
            return request()->routeIs($routeName) ? 'active' : '';
        }
    @endphp

    <nav id="mainNavbar" class="navbar navbar-expand-lg navbar-modern">
        <div class="container">

            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('images/se.png') }}" alt="Logo" height="55">
                <div class="ms-2">
                    <span class="fw-bold">UPITRA</span>
                    <small class="d-block">Software Engineering</small>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="mainNavbarCollapse">
                <ul class="navbar-nav mb-2 mb-lg-0">

                    <li class="nav-item"><a class="nav-link {{ isActive('home') }}" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ isActive('acaramain') }}" href="{{ route('acaramain') }}">Event</a></li>
                    <li class="nav-item"><a class="nav-link {{ isActive('berita') }}" href="{{ route('berita') }}">Berita</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle 
                            {{ isActive('visi-misi') }} {{ isActive('sejarah-prodi') }}"
                        href="#" data-bs-toggle="dropdown">
                        Prodi
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('visi-misi') }}">Visi & Misi</a></li>
                            <li><a class="dropdown-item" href="{{ route('sejarah-prodi') }}">Tujuan Prodi</a></li>
                        </ul>
                    </li>

                    <li class="nav-item"><a class="nav-link {{ isActive('profildosen') }}" href="{{ route('profildosen') }}">Profil Dosen</a></li>
                    <li class="nav-item"><a class="nav-link {{ isActive('galeri') }}" href="{{ route('galeri') }}">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link {{ isActive('mahasiswa') }}" href="{{ route('mahasiswa') }}">Kemahasiswaan</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle 
                            {{ isActive('dokumen') }} {{ isActive('rps-index') }}"
                        href="#" data-bs-toggle="dropdown">
                            Dokumen
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('dokumen')}}">Dokumen</a></li>
                            <li><a class="dropdown-item" href="{{route('rps-index')}}">RPS</a></li>
                        </ul>
                    </li>

                    <li class="nav-item"><a class="nav-link {{ isActive('pmb') }}" href="{{ route('pmb') }}">PMB</a></li>

                </ul>
            </div>

            <!-- Right Actions -->
            <div class="d-flex align-items-center gap-3">

                <a href="https://instagram.com/" target="_blank" class="text-dark fs-4">
                    <i class="bi bi-instagram"></i>
                </a>

                @auth
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown">

                        <img src="{{ Auth::user()->profile_photo_url ?? asset('images/se.png') }}"
                            width="42" height="42"
                            class="profile-thumb">

                        <span class="ms-2 fw-semibold">{{ Auth::user()->name }}</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow">
                        <li><a class="dropdown-item" href="{{ route('profile.index') }}">Profile</a></li>
                        @role('admin')
                          <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
                        @endrole

                        @role('mahasiswa')
                          <li><a class="dropdown-item" href="{{ route('mahasiswa.dashboard') }}">Dashboard Mahasiswa</a></li>
                        @endrole

                        @role('dosen')
                          <li><a class="dropdown-item" href="{{ route('dosen.dashboard') }}">Dashboard Dosen</a></li>
                        @endrole
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">@csrf
                                <button class="dropdown-item text-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary btn-login">Login</a>
                @endauth

            </div>

        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script>
        const navbar = document.getElementById("mainNavbar");
        window.addEventListener("scroll", () => {
            if (window.scrollY > 60) navbar.classList.add("navbar-shrink");
            else navbar.classList.remove("navbar-shrink");
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</body>
</html>
