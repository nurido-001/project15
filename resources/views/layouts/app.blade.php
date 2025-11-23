<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', config('app.name', 'Wisataku'))</title>

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css" rel="stylesheet">

  <style>
    /* Menggunakan font Poppins dari Google Fonts */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    
    body {
      font-family: 'Poppins', sans-serif;
      color: #243b2f;
      overflow-x: hidden;
      transition: opacity 0.5s ease;
      position: relative;
      z-index: 0;
    }

    /* Background utama */
    body::before {
      content: "";
      position: fixed;
      inset: 0;
      /* Ganti URL gambar dengan URL yang ada di environment Anda */
      background: url('/default/opo1.jpg') center/cover no-repeat; 
      z-index: -1;
      filter: brightness(0.9) blur(1px);
      opacity: 0.95;
    }

    /* Overlay transisi dengan efek fade + zoom */
    #transition-overlay {
      position: fixed;
      inset: 0;
       /* Ganti URL gambar dengan URL yang ada di environment Anda */
      background: url('/default/loading 01 .jpg') center/cover no-repeat; 
      z-index: 9999;
      opacity: 0;
      pointer-events: none;
      transform: scale(1);
      transition: opacity 0.7s ease, transform 1.2s ease;
    }

    #transition-overlay.active {
      opacity: 1;
      transform: scale(1.08); /* efek zoom lembut */
      pointer-events: all;
    }

    /* Sidebar */
    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      height: 100vh;
      width: 250px;
      /* Disesuaikan untuk kontras yang lebih baik pada teks putih */
      background: linear-gradient(180deg, #001ca8, #00a859, #f1c40f); 
      padding-top: 1rem;
      box-shadow: 4px 0 25px rgba(0, 0, 0, 0.25);
      backdrop-filter: blur(8px);
    }

    .sidebar .app-brand {
      text-align: center;
      font-weight: 700;
      font-size: 22px;
      color: #fff;
      margin-bottom: 1.5rem;
    }

    .sidebar .menu-item {
      margin: 8px 12px;
    }

    .sidebar .menu-link {
      display: flex;
      align-items: center;
      padding: 10px 15px;
      border-radius: 12px;
      color: #fff;
      font-weight: 500;
      text-decoration: none;
      background: rgba(255, 255, 255, 0.12);
      transition: all 0.3s ease;
    }

    .sidebar .menu-link:hover,
    .sidebar .menu-item.active .menu-link {
      background: linear-gradient(90deg, #ae00ff, #000dff, #00ffcc);
      transform: translateX(6px);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
    }

    /* Navbar */
    .navbar-custom {
      /* Mengganti warna agar lebih konsisten */
      background: linear-gradient(90deg, #05d024, #ddff00, #05d024); 
      color: #000000;
      border: none;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
      backdrop-filter: blur(6px);
    }

    .navbar-custom .navbar-brand {
      font-weight: 700;
      color: #004d40;
    }

    .navbar-custom .nav-link {
      color: #004d40;
      font-weight: 500;
      margin: 0 8px;
      transition: 0.3s;
    }

    .navbar-custom .nav-link:hover {
      color: #0d47a1;
      transform: scale(1.05);
    }

    /* Search box */
    .search-box input {
      background: rgba(255, 255, 255, 0.25);
      border: 1px solid rgba(255, 255, 255, 0.4);
      border-radius: 25px;
      color: #00332b;
      padding: 6px 15px;
      width: 230px;
      transition: all 0.3s ease;
    }

    .search-box input:focus {
      background: rgba(255, 255, 255, 0.3);
      box-shadow: 0 0 10px rgba(0, 188, 212, 0.6);
      outline: none;
      width: 270px;
    }

    .search-box button {
      border: none;
      background: linear-gradient(135deg, #0dff00, #c3ff00, #0dff00 );
      border-radius: 50%;
      width: 36px;
      height: 36px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: rgb(0, 0, 0);
      transition: all 0.3s ease;
    }

    .search-box button:hover {
      transform: scale(1.15);
      box-shadow: 0 0 10px rgba(0, 188, 212, 0.6);
    }

    /* Konten utama */
    .main-content {
      margin-left: 250px;
      padding: 2rem;
      min-height: 100vh;
      /* Sesuaikan agar tidak tumpang tindih dengan navbar */
      padding-top: 5rem; 
      border-radius: 20px 0 0 0;
      background: rgba(255, 255, 255, 0.35);
      backdrop-filter: blur(10px);
      animation: fadeIn 0.8s ease;
    }

    /* Media query untuk mobile (responsiveness) */
    @media (max-width: 992px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
            box-shadow: none;
        }
        .main-content {
            margin-left: 0;
            padding: 1rem;
            padding-top: 5rem; /* Pastikan konten tidak tertutup navbar */
            border-radius: 0;
        }
        .navbar-custom {
            margin-left: 0 !important;
        }
    }


    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Tombol */
    .btn {
      border-radius: 10px;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .btn-tambah {
      background: linear-gradient(135deg, #f1c40f, #ffb300);
      color: #fff;
      border: none;
    }

    .btn-edit {
      background: linear-gradient(135deg, #0035d4, #0660dd);
      color: #fff;
      border: none;
    }

    .btn-hapus {
      background: linear-gradient(135deg, #ff4b2b, #ff6f61);
      color: #fff;
      border: none;
    }

    .btn:hover {
      transform: translateY(-2px) scale(1.05);
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }
  </style>
</head>

<body>
  <div id="transition-overlay"></div>

  @include('layouts.sidebar')

  <nav class="navbar navbar-expand-lg navbar-custom fixed-top" style="margin-left:250px;">
    <div class="container-fluid">
      <span class="navbar-brand">Dashboard Wisataku</span>

      <form action="{{ route('wisata.index') }}" method="GET" class="search-box d-flex align-items-center ms-auto me-3">
        <input type="text" name="search" placeholder="Cari tempat wisata..." value="{{ request('search') }}">
        <button type="submit"><i class="ti ti-search"></i></button>
      </form>

      <div class="d-flex align-items-center">
        <i class="ti ti-bell me-3"></i>
        <img src="https://ui-avatars.com/api/?name=User" class="rounded-circle border" width="35" height="35" alt="avatar">
      </div>
    </div>
  </nav>

  <main class="main-content">
    @yield('content')
  </main>

  <!-- Efek transisi antar halaman -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const overlay = document.getElementById("transition-overlay");
      const links = document.querySelectorAll("a");

      links.forEach(link => {
        if (link.href && !link.href.includes('#') && !link.target) {
          link.addEventListener("click", function(e) {
            e.preventDefault();
            overlay.classList.add("active");
            setTimeout(() => {
              window.location = this.href;
            }, 600);
          });
        }
      });

      // Hilangkan overlay saat halaman dimuat
      setTimeout(() => overlay.classList.remove("active"), 300);
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- BARIS PENTING YANG HILANG: Inilah yang akan menjalankan kode Chart.js Anda -->
  @stack('scripts') 

</body>
</html>