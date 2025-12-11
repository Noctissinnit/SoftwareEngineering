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
                box-shadow: 2px 0 18px rgba(2,43,108,0.35);
                transition: all 0.28s cubic-bezier(.2,.9,.3,1);
                z-index: 200;

                overflow-y: auto;
                overflow-x: hidden;
            }


        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar-header {
            padding: 18px 14px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: space-between;
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
            margin: 0 0 0 6px;
            color: #FFD700;
            font-size: 1rem;
            letter-spacing: 0.4px;
        }
        .sidebar-toggle-small {
            background: transparent;
            border: none;
            color: rgba(255,255,255,0.95);
            font-size: 1.15rem;
            cursor: pointer;
            padding: 6px;
            border-radius: 6px;
            transition: background 0.18s;
        }
        .sidebar-toggle-small:hover { background: rgba(255,255,255,0.05); }
        .sidebar nav {
            overflow-y: auto;
            flex-grow: 1;
        }

        /* Search input */
        .sidebar-search {
            padding: 10px 16px;
            border-bottom: 1px solid rgba(255,255,255,0.04);
        }
        .sidebar-search input {
            width: 100%;
            padding: 8px 10px;
            border-radius: 8px;
            border: none;
            outline: none;
            font-size: 0.95rem;
            background: rgba(255,255,255,0.06);
            color: #fff;
        }
        .sidebar-search input::placeholder { color: rgba(255,255,255,0.6); }

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
            padding: 10px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-left: 4px solid transparent;
            transition: all 0.22s cubic-bezier(.2,.9,.3,1);
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

        .nav-link .nav-text { flex: 1; }
        .nav-link .nav-badge { font-size: 0.72rem; background: rgba(255,255,255,0.08); color: #fff; padding: 2px 8px; border-radius: 999px; }

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

        .sidebar nav::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar nav::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.3);
            border-radius: 10px;
        }

        .sidebar nav::-webkit-scrollbar-thumb:hover {
            background: rgba(255,255,255,0.5);
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
        /* Global admin page helpers */
        .admin-page {
            padding: 1.25rem 1.5rem;
        }
        .admin-header { margin-bottom: 1.75rem; }
        .admin-header h1 { color: #0d6efd; font-weight:700; font-size:1.4rem; margin:0; }
        .admin-header p { color: #6c757d; margin:0.25rem 0 0; }

        .admin-stats .card { border-radius:12px; box-shadow:0 6px 18px rgba(2,43,108,0.06); border:none; }
        .admin-stats .icon-box { width:56px;height:56px;border-radius:10px;background:#e8f0ff;color:#0d6efd;display:flex;align-items:center;justify-content:center;font-size:1.4rem;margin:0 auto 8px; }
        .admin-card { border-radius:12px; box-shadow:0 6px 18px rgba(2,43,108,0.04); border:none; }
        .admin-card .card-title { color:#0d6efd; font-weight:600; }
        .admin-actions { display:flex; gap:8px; align-items:center; }
        .admin-page .table thead { background:#fff; }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('images/se.png') }}" alt="Logo">
                    <h4>Dashboard SE</h4>
                </div>
                <button id="sidebarToggleSmall" class="sidebar-toggle-small" title="Toggle sidebar" aria-label="Toggle sidebar"><i class="bi bi-chevron-left"></i></button>
            </div>

            <div class="sidebar-search">
                <input id="sidebarSearch" type="text" placeholder="Cari menu..." aria-label="Cari menu" />
            </div>

        <nav class="mt-3 flex-grow-1">
            <ul class="nav flex-column">
                @role('admin')
                <li>
                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard">
                        <i class="bi bi-speedometer2"></i> <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                   <li>
                    <a class="nav-link {{ request()->routeIs('admin.dokumen') ? 'active' : '' }}" href="{{ route('admin.dokumen') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Dokumen">
                        <i class="bi bi-folder2-open"></i> <span class="nav-text">Dokumen</span>
                    </a>
                </li>

                <li>
                    <a class="nav-link {{ request()->routeIs('admin.mahasiswa') ? 'active' : '' }}" href="{{ route('admin.mahasiswa') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Mahasiswa">
                        <i class="bi bi-people-fill"></i> <span class="nav-text">Mahasiswa</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ request()->routeIs('admin.profildosen') ? 'active' : '' }}" href="{{ route('admin.profildosen') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Profil Dosen">
                        <i class="bi bi-person-badge-fill"></i> <span class="nav-text">Profil Dosen</span>
                    </a>
                </li>
                 <li>
                    <a class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}" href="{{ route('users.index') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Daftar User (Portofolio)">
                        <i class="bi bi-folder2-open"></i> 
                        <span class="nav-text">Daftar User (Portofolio)</span>
                    </a>
                </li>
                                    <li>
                                        <a class="nav-link {{ request()->routeIs('admin.galeri.index') ? 'active' : '' }}" href="{{ route('admin.galeri.index') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Galeri">
                                                <i class="bi bi-images"></i>
                                                <span class="nav-text">Galeri</span>
                                        </a>
                                </li>
                                <li>
                                    <a class="nav-link {{ request()->routeIs('admin.program-content.index') ? 'active' : '' }}" href="{{ route('admin.program-content.index') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Konten Program Studi">
                                            <i class="bi bi-file-earmark-text"></i>
                                            <span class="nav-text">Konten Prodi</span>
                                    </a>
                                </li>
                 <li>
                    <a class="nav-link {{ request()->routeIs('admin.berita.index') ? 'active' : '' }}" href="{{ route('admin.berita.index') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Berita">
                        <i class="bi bi-newspaper"></i> <span class="nav-text">Berita</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ request()->routeIs('acara.index') ? 'active' : '' }}" href="{{ route('admin.acara.index') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Acara">
                    <i class="bi bi-newspaper"></i> <span class="nav-text">Acara</span>
                    </a>
                </li>

                <li>
                    <a class="nav-link {{ request()->routeIs('admin.portfolio.index') ? 'active' : '' }}" href="{{ route('admin.portfolio.index') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Portofolio">
                        <i class="bi bi-folder2-open"></i> 
                        <span class="nav-text">Portofolio</span>
                    </a>
                </li>         
                @endrole

                @role('dosen')
                <li>
                    <a class="nav-link {{ request()->routeIs('dosen.dashboard') ? 'active' : '' }}" href="{{ route('dosen.dashboard') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard Dosen">
                        <i class="bi bi-speedometer2"></i> <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}" href="{{ route('users.index') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Daftar User (Portofolio)">
                        <i class="bi bi-folder2-open"></i> 
                        <span class="nav-text">Daftar User (Portofolio)</span>
                    </a>
                </li>

                 <li>
                    <a class="nav-link {{ request()->routeIs('admin.berita.index') ? 'active' : '' }}" href="{{ route('admin.berita.index') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Berita">
                        <i class="bi bi-newspaper"></i> <span class="nav-text">Berita</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ request()->routeIs('acara.index') ? 'active' : '' }}" href="{{ route('acara.index') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Acara">
                    <i class="bi bi-newspaper"></i> <span class="nav-text">Acara</span>
                    </a>
                </li>
                @endrole
               
              
                @role('mahasiswa')
                 <li>
                    <a class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}" href="{{ route('users.index') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Daftar User (Portofolio)">
                        <i class="bi bi-folder2-open"></i> 
                        <span class="nav-text">Daftar User (Portofolio)</span>
                    </a>
                </li>
                @endrole
               
                

             
             
             
            </ul>
        </nav>

        <div class="sidebar-footer">
            <a href="https://instagram.com/" target="_blank"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-globe2"></i></a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <div class="topbar d-flex justify-content-between align-items-center px-3">
            <div class="topbar-left d-flex align-items-center">
                <button class="toggle-btn me-3" id="toggleBtn"><i class="bi bi-list"></i></button>
                <h5 class="m-0">Dashboard Admin</h5>
            </div>

            <div class="user-info d-flex align-items-center gap-3">
                @auth
                    <!-- Ikon Home -->
                    <a href="{{ route('home') }}" class="nav-link text-dark" title="Home">
                        <i class="bi bi-house fs-5"></i>
                    </a>

                    <!-- Foto dan Nama User -->
                    <div class="d-flex align-items-center gap-2">
                        <img src="{{ Auth::user()->profile_photo_url ?? asset('images/se.png') }}" alt="User" width="32" height="32" class="rounded-circle">
                        <span>{{ Auth::user()->name }}</span>
                    </div>

                    <!-- Tombol Logout -->
                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="logout-btn btn btn-link text-danger p-0">
                            <i class="bi bi-box-arrow-right fs-5"></i>
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
        const sidebarToggleSmall = document.getElementById('sidebarToggleSmall');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const sidebarSearch = document.getElementById('sidebarSearch');

        // Topbar toggle behavior (desktop: collapse, mobile: show/hide)
        toggleBtn.addEventListener('click', () => {
            if (window.innerWidth >= 992) {
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('expanded');
            } else {
                sidebar.classList.toggle('show');
            }
        });

        // Small toggle inside sidebar (for quick collapse)
        sidebarToggleSmall.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
            const icon = sidebarToggleSmall.querySelector('i');
            if (sidebar.classList.contains('collapsed')) {
                icon.className = 'bi bi-chevron-right';
            } else {
                icon.className = 'bi bi-chevron-left';
            }
        });

        // Initialize bootstrap tooltips for sidebar links
        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('.nav-link[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.forEach(function (el) {
                new bootstrap.Tooltip(el, { container: 'body' });
            });
        });

        // Sidebar search/filter
        if (sidebarSearch) {
            sidebarSearch.addEventListener('input', function (e) {
                const q = e.target.value.toLowerCase().trim();
                document.querySelectorAll('#sidebar nav ul li').forEach(function (li) {
                    const textEl = li.querySelector('.nav-text');
                    const text = textEl ? textEl.textContent.toLowerCase() : li.textContent.toLowerCase();
                    if (!q || text.indexOf(q) !== -1) {
                        li.style.display = '';
                    } else {
                        li.style.display = 'none';
                    }
                });
            });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
