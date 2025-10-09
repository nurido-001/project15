<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Admin {{ config('app.name', 'Laravel') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Vuexy / Core CSS via CDN -->
    <link rel="stylesheet" href="https://demos.pixinvent.com/vuexy-html-admin-template/assets/vendor/css/core.css">
    <link rel="stylesheet"
        href="https://demos.pixinvent.com/vuexy-html-admin-template/assets/vendor/css/theme-default.css">
    <link rel="stylesheet" href="https://demos.pixinvent.com/vuexy-html-admin-template/assets/vendor/css/demo.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Tabler Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

  
</head>

<style>
  /* 🌌 Background halaman utama */
  body {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef, #dee2e6); /* tetap terang */
    background-attachment: fixed;
    min-height: 100vh;
    font-family: 'Segoe UI', sans-serif;
    color: #212529;
  }

  /* 🌑 Sidebar Dark Gradient */
  .sidebar {
    width: 250px;
    min-height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    background: linear-gradient(180deg, #0d0d0d, #001f3f, #2f3640);
    padding: 1rem;
    color: #e0e0e0;
    box-shadow: 4px 0 12px rgba(0,0,0,0.6);
    z-index: 1000;
  }

  .sidebar h4 {
    color: #f8f9fa;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.6);
  }

  /* 🌟 Link menu */
  .sidebar .nav-link {
    padding: 0.7rem 1rem;
    color: #cfd8dc;
    border-radius: 8px;
    margin-bottom: 6px;
    transition: all 0.3s ease;
    position: relative;
    display: block;
  }

  /* Hover dengan efek garis neon di kiri */
  .sidebar .nav-link:hover {
    background: rgba(0, 229, 255, 0.08);
    color: #fff;
    transform: translateX(4px);
  }

  .sidebar .nav-link:hover::before,
  .sidebar .nav-link.active::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 4px;
    background: #00e5ff;
    box-shadow: 0 0 8px #00e5ff, 0 0 16px #00e5ff;
    border-radius: 2px;
  }

  /* Aktif dengan cyan glow */
  .sidebar .nav-link.active {
    background: rgba(0, 229, 255, 0.15);
    font-weight: bold;
    color: #00e5ff;
  }

  /* 🌌 Konten terang */
  .content {
    margin-left: 250px;
    padding: 2rem;
    min-height: 100vh;
    background: #ffffff; /* fix biar jelas */
    animation: fadeIn 0.8s ease;
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
  }

  /* ✨ Card efek */
  .card {
    border: none;
    border-radius: 14px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    transition: transform 0.3s, box-shadow 0.3s;
    overflow: hidden;
    background: #fff;
    color: #212529;
    position: relative;
    z-index: 1; /* penting */
    will-change: transform, box-shadow;
  }

  .card:hover {
    transform: translateY(-6px) scale(1.03);
    box-shadow: 0 0 20px rgba(0, 229, 255, 0.6);
  }

  .card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background: linear-gradient(45deg, #00e5ff, #ff6a00, #ee0979, #00c6ff);
    z-index: -1;
    border-radius: inherit;
    opacity: 0;
    transition: opacity 0.4s;
    filter: blur(12px);
  }

  .card:hover::before {
    opacity: 1;
  }
</style>


<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            @include('layouts.sidebar')

            <div class="layout-page">

                @include('layouts.navbar')

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                        @yield('scripts')
                    </div>
                    @include('layouts.footer')
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://demos.pixinvent.com/vuexy-html-admin-template/assets/vendor/js/core.js"></script>
    <script src="https://demos.pixinvent.com/vuexy-html-admin-template/assets/vendor/js/menu.js"></script>
    <script src="https://demos.pixinvent.com/vuexy-html-admin-template/assets/vendor/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   

    @stack('scripts')
</body>


</html>