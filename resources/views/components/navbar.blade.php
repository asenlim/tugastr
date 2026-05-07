<nav class="navbar navbar-expand-lg navbar-dark custom-navbar fixed-top">
    <div class="container-fluid px-4">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="/">
            <span class="brand-icon">TR</span>
            <span class="ms-2">TugasTR</span>
        </a>
            
            <div class="d-flex align-items-center">
                <span class="text-light me-3 small">Halo, <span class="fw-bold">{{ Auth::user()->name ?? 'Tamu' }}</span></span>
                <button class="btn btn-logout btn-sm">Logout</button>
            </div>
        </div>
    </div>
</nav>

<style>
    .custom-navbar {
        background: #1a1c2d; /* Warna gelap elegan */
        backdrop-filter: blur(10px);
        height: 70px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .brand-icon {
        background: #0d6efd;
        color: white;
        padding: 5px 10px;
        border-radius: 8px;
        font-size: 0.9rem;
    }

    .navbar-brand {
        font-size: 1.4rem;
        letter-spacing: -0.5px;
    }

    .nav-link {
        color: rgba(0, 0, 0, 0.7) !important;
        font-weight: 500;
        margin: 0 10px;
        transition: 0.3s;
    }

    .nav-link:hover, .nav-link.active {
        color: #000000 !important;
    }

    .nav-link.active {
        border-bottom: 2px solid #0d6efd;
    }

    .btn-logout {
        background: rgba(255, 255, 255, 0.1);
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 6px 15px;
        border-radius: 6px;
        transition: 0.3s;
    }

    .btn-logout:hover {
        background: #dc3545;
        border-color: #dc3545;
        color: white;
    }
</style>
