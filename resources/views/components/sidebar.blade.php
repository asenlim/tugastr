<div class="sidebar shadow-sm">
    <div class="nav flex-column mt-3">

        <a href="{{ route('dashboard') }}"
           class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            🏠 Dashboard
        </a>

        <a href="{{ route('tasks.index') }}"
           class="nav-link {{ request()->routeIs('tasks.index') ? 'active' : '' }}">
            ✅ To-Do List
        </a>

        <a href="{{ route('tasks.history') }}"
           class="nav-link {{ request()->routeIs('tasks.history') ? 'active' : '' }}">
            📜 Task History
        </a>

    </div>
</div>

<style>
  .sidebar { 
    width: 240px; 
    height: 100vh; 
    position: fixed; 
    top: 60px; 
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
    border-right: 4px solid transparent;
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

  .nav:has(a[href*="/tasks"]:hover) a[href*="/tasks"] {
    background: #e7f1ff !important; 
    color: #0d6efd !important; 
    border-right: 4px solid #0d6efd !important;
  }
</style>

