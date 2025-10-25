<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPITRA Software Engineering - Admin</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/se.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fc;
            margin: 0;
        }

        /* === SIDEBAR === */
        .sidebar {
            width: 260px;
            height: 100vh;
            background: linear-gradient(180deg, #0342A6 0%, #022B6C 100%);
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            box-shadow: 2px 0 10px rgba(0,0,0,0.15);
            transition: all 0.3s ease;
            z-index: 200;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar-header {
            padding: 25px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        }

        .sidebar-header img {
            height: 50px;
            border-radius: 8px;
            transition: 0.3s;
        }

        .sidebar.collapsed .sidebar-header h4 {
            display: none;
        }

        .sidebar.collapsed .sidebar-header img {
            height: 40px;
        }

        .sidebar-header h4 {
            font-weight: 700;
            margin-top: 12px;
            color: #FFD700;
            font-size: 1.1rem;
            letter-spacing: 0.5px;
        }

        .sidebar nav ul {
            list-style: none;
            padding-left: 0;
            margin: 0;
        }

        .sidebar nav ul li {
            margin: 5px 0;
        }

        .nav-link {
            color: #dbe2ef;
            font-weight: 500;
            padding: 12px 25px;
            display: flex;
            align-items: center;
            border-left: 4px solid transparent;
            transition: all 0.25s ease;
            white-space: nowrap;
        }

        .sidebar.collapsed .nav-link {
            justify-content: center;
            padding: 12px 0;
        }

        .sidebar.collapsed .nav-link span {
            display: none;
        }

        .nav-link i {
            margin-right: 12px;
            font-size: 1.2rem;
            opacity: 0.9;
        }

        .sidebar.collapsed .nav-link i {
            margin-right: 0;
        }

        .nav-link:hover {
            background: rgba(255,255,255,0.1);
            color: #fff;
            border-left: 4px solid #FFD700;
        }

        .nav-link.active {
            background: rgba(255,255,255,0.15);
            color: #FFD700 !important;
            border-left: 4px solid #FFD700;
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 20px;
            border-top: 1px solid rgba(255,255,255,0.15);
            text-align: center;
        }

        .sidebar-footer a {
            color: #FFD700;
            font-size: 1.3rem;
            margin: 0 10px;
            transition: 0.3s;
        }

        .sidebar-footer a:hover {
            color: #fff;
        }

        /* === MAIN CONTENT === */
        .main-content {
            margin-left: 260px;
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        .main-content.expanded {
            margin-left: 80px;
        }

        /* === TOPBAR === */
        .topbar {
            background: white;
            padding: 12px 25px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .toggle-btn {
            background: transparent;
            border: none;
            font-size: 1.5rem;
            color: #03378c;
            cursor: pointer;
            transition: 0.2s;
        }

        .toggle-btn:hover {
            color: #FFD700;
        }

        .topbar h5 {
            color: #03378c;
            font-weight: 600;
            margin: 0;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-info img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            object-fit: cover;
            border: 2px solid #FFD700;
        }

        .logout-btn {
            border: none;
            background: transparent;
            color: #03378c;
            font-weight: 600;
            cursor: pointer;
            transition: color 0.2s;
        }

        .logout-btn:hover {
            color: #FFD700;
        }

        @media (max-width: 991px) {
            .sidebar {
                left: -260px;
            }

            .sidebar.show {
                left: 0;
            }

            .main-content {
                margin-left: 0;
            }

            .main-content.expanded {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <img src="{{ asset('images/se.png') }}" alt="Logo">
            <h4>Admin SE</h4>
        </div>

        <nav class="mt-3 flex-grow-1">
            <ul class="nav flex-column">
                <li>
                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-speedometer2"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ request()->routeIs('admin.berita') ? 'active' : '' }}" href="{{ route('admin.berita') }}">
                        <i class="bi bi-newspaper"></i> <span>Berita</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ request()->routeIs('admin.dokumen') ? 'active' : '' }}" href="{{ route('admin.dokumen') }}">
                        <i class="bi bi-folder2-open"></i> <span>Dokumen</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ request()->routeIs('admin.mahasiswa') ? 'active' : '' }}" href="{{ route('admin.mahasiswa') }}">
                        <i class="bi bi-people-fill"></i> <span>Mahasiswa</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ request()->routeIs('admin.profildosen') ? 'active' : '' }}" href="{{ route('admin.profildosen') }}">
                        <i class="bi bi-person-badge-fill"></i> <span>Profil Dosen</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="sidebar-footer">
            <a href="https://instagram.com/" target="_blank"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-globe2"></i></a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <div class="topbar">
            <div class="topbar-left">
                <button class="toggle-btn" id="toggleBtn"><i class="bi bi-list"></i></button>
                <h5>Dashboard Admin</h5>
            </div>

            <div class="user-info">
                @auth
                    <img src="{{ Auth::user()->profile_photo_url ?? asset('images/se.png') }}" alt="User">
                    <span>{{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <i class="bi bi-box-arrow-right"></i>
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
                @endauth
            </div>
        </div>

        <div class="content mt-4 px-3 px-lg-4">
            @yield('content')
        </div>
    </div>

    <script>
        const toggleBtn = document.getElementById('toggleBtn');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');

        toggleBtn.addEventListener('click', () => {
            // Untuk desktop
            if (window.innerWidth >= 992) {
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('expanded');
            } 
            // Untuk mobile
            else {
                sidebar.classList.toggle('show');
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
