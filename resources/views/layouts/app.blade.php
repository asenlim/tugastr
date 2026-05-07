<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'App')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS kamu -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

    <!-- Navbar -->
    <x-navbar />

    <div class="app-wrapper">

        <!-- Sidebar -->
        <div class="sidebar">
            <x-sidebar />
        </div>

        <!-- Content -->
        <div class="content-area">
            @yield('content')
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>