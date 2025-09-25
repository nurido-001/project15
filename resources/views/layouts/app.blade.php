<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Wisataku') }}</title>

  <!-- Bootstrap / Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body { background-color: #f8f9fa; }
    .sidebar {
      width: 250px;
      min-height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      background: #fff;
      border-right: 1px solid #ddd;
      padding: 1rem;
    }
    .content {
      margin-left: 250px;
      padding: 2rem;
    }
    .sidebar .nav-link {
      padding: 0.6rem 1rem;
      color: #333;
      border-radius: 8px;
      margin-bottom: 5px;
    }
    .sidebar .nav-link.active,
    .sidebar .nav-link:hover {
      background-color: #e9ecef;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar">
      <h4 class="fw-bold mb-4">🌍 Wisataku</h4>
      <nav class="nav flex-column">
        <a class="nav-link {{ request()->is('home') ? 'active' : '' }}" href="{{ route('home') }}">
          <i class="bi bi-house"></i> Home
        </a>
        <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
          <i class="bi bi-speedometer2"></i> Dashboard
        </a>
        <a class="nav-link {{ request()->is('dashboard/cards') ? 'active' : '' }}" href="{{ route('dashboard.cards') }}">
          <i class="bi bi-grid-3x3-gap"></i> Dashboard Cards
        </a>
        <a class="nav-link {{ request()->is('admin*') ? 'active' : '' }}" href="{{ route('admin.index') }}">
          <i class="bi bi-person-gear"></i> Kelola Admin
        </a>
        <a class="nav-link {{ request()->is('pengguna*') ? 'active' : '' }}" href="{{ route('pengguna.index') }}">
          <i class="bi bi-people"></i> Kelola Pengguna
        </a>
        <a class="nav-link {{ request()->is('wisata*') ? 'active' : '' }}" href="{{ route('wisata.index') }}">
          <i class="bi bi-map"></i> Kelola Tempat Wisata
        </a>
        <a class="nav-link {{ request()->is('grafik*') ? 'active' : '' }}" href="{{ route('grafik.index') }}">
          <i class="bi bi-bar-chart-line"></i> Lihat Grafik Pengguna
        </a>
      </nav>
    </div>

    <!-- Content -->
    <div class="content">
      @yield('content')
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
