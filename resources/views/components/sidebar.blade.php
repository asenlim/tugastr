<div class="sidebar shadow-sm">
    <div class="nav flex-column mt-3">
        <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
            🏠 Dashboard
        </a>
        <a href="/tasks" class="nav-link {{ Request::is('tasks*') ? 'active' : '' }}">
            ✅ To-Do List
        </a>
    </div>
</div>

<style>
    .sidebar {
        width: 240px;
        height: 100vh;
        position: fixed;
        top: 60px; /* Sesuai tinggi navbar */
        left: 0;
        background: white;
        padding-top: 20px;
        border-right: 1px solid #eee;
    }
    .sidebar .nav-link {
        color: #333;
        padding: 12px 25px;
        transition: 0.3s;
        text-decoration: none;
    }
    .sidebar .nav-link:hover {
        background: #f8f9fa;
        color: #0d6efd;
    }
    .sidebar .nav-link.active {
        background: #e7f1ff;
        color: #0d6efd;
        border-right: 4px solid #0d6efd;
        font-weight: bold;
    }
</style>
