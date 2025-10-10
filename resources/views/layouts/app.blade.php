<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin {{ config('app.name', 'Laravel') }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <!-- Fonts -->
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

  <!-- Vuexy / Core CSS (external) -->
  <link rel="stylesheet" href="https://demos.pixinvent.com/vuexy-html-admin-template/assets/vendor/css/core.css">
  <link rel="stylesheet" href="https://demos.pixinvent.com/vuexy-html-admin-template/assets/vendor/css/theme-default.css">
  <link rel="stylesheet" href="https://demos.pixinvent.com/vuexy-html-admin-template/assets/vendor/css/demo.css">
  <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

  <style>
    /* ---------- Base ---------- */
    html,body { height:100%; margin:0; padding:0; }
    body {
      position: relative;
      min-height: 100vh;
      font-family: 'Nunito', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
      color: #e8f0ff;
      overflow-x: hidden;
      background: radial-gradient(circle at 10% 20%, #0d1117 0%, #020b20 80%);
      -webkit-font-smoothing:antialiased; -moz-osx-font-smoothing:grayscale;
    }

    /* ---------- Aurora (background glow) ---------- */
    .aurora {
      position: fixed;
      inset: 0;
      background:
        radial-gradient(600px at 20% 30%, rgba(0,255,255,0.18), transparent 15%),
        radial-gradient(800px at 80% 70%, rgba(255,0,150,0.12), transparent 15%),
        radial-gradient(700px at 50% 40%, rgba(0,255,128,0.10), transparent 18%);
      filter: blur(60px);
      z-index: 0;
      pointer-events: none;
      animation: auroraMove 18s infinite alternate ease-in-out;
      transform-origin: center;
    }
    @keyframes auroraMove {
      0% { transform: translateY(0) rotate(0deg); }
      100% { transform: translateY(-30px) rotate(2deg); }
    }

    /* ---------- Particles (light dots) ---------- */
    .particles { position: fixed; inset:0; z-index:1; pointer-events:none; overflow:hidden; }
    .particle {
      position:absolute; width:4px; height:4px; border-radius:50%;
      background: rgba(0,255,255,0.85);
      opacity:0.45; transform: translateY(0);
      animation: particleFloat linear infinite;
    }
    @keyframes particleFloat {
      0% { transform: translateY(110vh) scale(0.6); opacity:0; }
      10% { opacity:1; }
      90% { opacity:1; }
      100% { transform: translateY(-10vh) scale(1.1); opacity:0; }
    }

    /* ---------- Sidebar (glass) ---------- */
    .sidebar {
      position: fixed;
      top: 0; left: 0;
      width: 250px; height: 100vh;
      background: rgba(12,18,28,0.45);
      -webkit-backdrop-filter: blur(14px);
      backdrop-filter: blur(14px);
      border-right: 1px solid rgba(255,255,255,0.04);
      padding: 1.25rem;
      z-index: 50;
      display:flex; flex-direction:column; justify-content:space-between;
      box-shadow: 4px 0 18px rgba(0,0,0,0.45);
    }
    .sidebar h4 { color:#00e5ff; text-shadow:0 0 8px rgba(0,229,255,0.12); margin:0 0 1rem; font-weight:700; letter-spacing:0.6px; }

    .sidebar .nav-link {
      display:block; color:#cfe8ff; text-decoration:none; padding:10px 12px; border-radius:8px; margin-bottom:6px;
      transition: none; /* NO hover shifting per request */
    }
    /* active only (no hover change) */
    .sidebar .nav-link.active {
      background: rgba(0,229,255,0.12);
      color:#00e5ff;
      box-shadow: 0 0 8px rgba(0,229,255,0.08);
    }

    /* logout button style */
    .sidebar form { margin:0; }
    .sidebar .logout-btn { display:block; padding:10px 12px; background:transparent; border:0; color:#ff6b6b; text-align:left; cursor:pointer; }

    /* ---------- Content ---------- */
    .content {
      margin-left: 250px;
      padding: 2rem;
      min-height: 100vh;
      position: relative;
      z-index: 5;
    }

    /* ---------- Card ---------- */
    .card {
      background: rgba(255,255,255,0.06);
      -webkit-backdrop-filter: blur(10px);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255,255,255,0.04);
      color: #e8f8ff;
      border-radius: 12px;
      box-shadow: 0 6px 18px rgba(0,0,0,0.6);
    }

    /* small animation for entrance */
    .fade-in { animation: fadeIn 900ms ease both; }
    @keyframes fadeIn { from { opacity:0; transform: translateY(10px);} to {opacity:1; transform:none;} }

    /* ---------- Footer ---------- */
    footer { color:#9fb6cf; text-align:center; padding:1rem 0; font-size:0.9rem; margin-top:1.5rem; border-top:1px solid rgba(255,255,255,0.02); }

    /* ---------- Accessibility: reduce motion ---------- */
    @media (prefers-reduced-motion: reduce) {
      .aurora, .particles, .card, .fade-in { animation: none !important; transition: none !important; }
    }
  </style>
</head>

<body>
  {{-- Aurora & Particles (static handful for perf, extended by JS if needed) --}}
  <div class="aurora" aria-hidden="true"></div>
  <div class="particles" aria-hidden="true">
    <div class="particle" style="left:8%; animation-duration:12s; animation-delay:0s;"></div>
    <div class="particle" style="left:25%; animation-duration:14s; animation-delay:3s;"></div>
    <div class="particle" style="left:42%; animation-duration:11s; animation-delay:1s;"></div>
    <div class="particle" style="left:61%; animation-duration:13s; animation-delay:4s;"></div>
    <div class="particle" style="left:78%; animation-duration:15s; animation-delay:2s;"></div>
  </div>

  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

      {{-- include sidebar only if it exists to avoid view errors --}}
      @if (view()->exists('layouts.sidebar'))
        @include('layouts.sidebar')
      @endif

      <div class="layout-page">
        @if (view()->exists('layouts.navbar'))
          @include('layouts.navbar')
        @endif

        <div class="content-wrapper">
          <main class="container-xxl flex-grow-1 container-p-y content">
            @yield('content')
          </main>

          @if (view()->exists('layouts.footer'))
            @include('layouts.footer')
          @else
            <footer>&copy; {{ date('Y') }} {{ config('app.name', 'Wisataku') }}</footer>
          @endif
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts (external) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://demos.pixinvent.com/vuexy-html-admin-template/assets/vendor/js/core.js"></script>
  <script src="https://demos.pixinvent.com/vuexy-html-admin-template/assets/vendor/js/menu.js"></script>
  <script src="https://demos.pixinvent.com/vuexy-html-admin-template/assets/vendor/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  {{-- Stack untuk script child views --}}
  @stack('scripts')

  {{-- Optional: small helper to generate more particles if wanted (kept minimal) --}}
  <script>
    // Minimal: if you want more particles generated dynamically, uncomment and adjust.
    // (kept commented to avoid perf surprises)
    /*
    (function() {
      const container = document.querySelector('.particles');
      for (let i=0;i<12;i++) {
        const d = document.createElement('div');
        d.className = 'particle';
        d.style.left = (Math.random()*100).toFixed(2)+'%';
        d.style.animationDuration = (10 + Math.random()*8).toFixed(2)+'s';
        d.style.animationDelay = (Math.random()*5).toFixed(2)+'s';
        container.appendChild(d);
      }
    })();
    */
  </script>
</body>
</html>
