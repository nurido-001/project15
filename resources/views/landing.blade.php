<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wisataku</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      scroll-behavior: smooth;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: url('{{ asset('img/mm.jpg') }}') no-repeat center center fixed;
      background-size: cover;
      color: #fff;
    }

    /* Navbar */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1.2rem 5%;
      position: fixed;
      top: 0;
      width: 100%;
      background: rgba(0, 0, 0, 0.7);
      z-index: 1000;
      transition: background 0.3s ease;
    }

    .navbar .logo {
      font-size: 1.5rem;
      font-weight: 700;
      color: #00e1ff;
    }

    .navbar ul {
      list-style: none;
      display: flex;
      gap: 1.8rem;
    }

    .navbar ul li a {
      text-decoration: none;
      font-weight: 600;
      color: #fff;
      transition: 0.3s;
    }

    .navbar ul li a:hover {
      color: #00e1ff;
    }

    .btn-nav {
      padding: 8px 18px;
      border: 2px solid #0066db;
      border-radius: 5px;
      color: #00bbff;
      font-weight: 600;
      text-decoration: none;
      transition: 0.3s;
    }

    .btn-nav:hover {
      background: #099404;
      color: #000;
    }

    /* Section umum */
    section {
      padding: 100px 10%;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      text-align: left;
      background: linear-gradient(180deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.65));
      border-radius: 15px;
      margin-bottom: 40px;
      opacity: 0;
      transform: translateY(40px);
      transition: all 0.8s ease-out;
    }

    section.show {
      opacity: 1;
      transform: translateY(0);
    }

    section h2 {
      font-size: 2.3rem;
      font-weight: 700;
      background: linear-gradient(to right, #00e1ff, #00ff0d);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 20px;
      position: relative;
    }

    section h2::after {
      content: "";
      position: absolute;
      left: 0;
      bottom: -8px;
      width: 70px;
      height: 3px;
      background: linear-gradient(90deg, #00ff04, #c8ff00);
      border-radius: 3px;
    }

    section p,
    section ul {
      max-width: 750px;
      line-height: 1.7;
      font-size: 1rem;
    }

    section ul {
      margin-top: 15px;
      padding-left: 0;
    }

    section ul li {
      margin-bottom: 12px;
      padding: 10px 15px;
      border-left: 4px solid #009dff;
      background: rgba(255, 255, 255, 0.08);
      border-radius: 8px;
      transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s;
      cursor: pointer;
      list-style: none;
    }

    section ul li:hover {
      transform: translateX(8px) scale(1.03);
      box-shadow: 0 6px 15px rgba(0, 225, 255, 0.4);
      border-left-color: #9dff00;
    }

    /* Hero */
    .hero h2 {
      font-size: 1.5rem;
      font-weight: 400;
      margin-bottom: 10px;
    }

    .hero h1 {
      font-size: 3.5rem;
      font-weight: 700;
      background: linear-gradient(to right, #00e1ff, #00ff73, #ffd700);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      animation: glow 3s ease-in-out infinite alternate;
      margin-bottom: 15px;
    }

    .hero p {
      max-width: 650px;
      font-size: 1rem;
      line-height: 1.6;
    }

    @keyframes glow {
      from {
        text-shadow: 0 0 10px #00ff1e, 0 0 20px #00ff11;
      }

      to {
        text-shadow: 0 0 20px #06a8ed, 0 0 30px #0aa3e4;
      }
    }

    /* Footer */
    footer {
      background: rgba(0, 0, 0, 0.9);
      color: #ddd;
      text-align: center;
      padding: 25px 10px;
      font-size: 0.9rem;
      border-top: 1px solid #00e1ff;
    }

    footer p {
      margin: 5px 0;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar">
    <div class="logo">Wisataku</div>
    <ul>
      <li><a href="#home">Home</a></li>
      <li><a href="#tentang">Tentang</a></li>
      <li><a href="#fitur">Fitur</a></li>
      <li><a href="#panduan">Panduan</a></li>
      <li><a href="#kontak">Kontak</a></li>
    </ul>
    <a href="{{ route('login') }}" class="btn-nav">Login</a>
  </nav>

  <!-- Home -->
 <section class="hero" id="home">
  <h2>Selamat Datang di</h2>
  <h1>Aplikasi Wisataku</h1>
  <p>
    👋 Halo, selamat datang di Wisataku!  
    Di sini kamu bisa cari info tempat-tempat wisata seru sesuai selera kamu.  
    Tinggal pilih, lihat rekomendasi, terus bisa juga share pengalamanmu.  
    Biar liburan makin gampang, asik, dan pastinya lebih berkesan. 🌿
  </p>
</section>


  <!-- Tentang -->
  <section id="tentang">
    <h2>Tentang Aplikasi Wisataku</h2>
    <p>
      Wisataku adalah aplikasi yang membantu pengguna menemukan dan mendapatkan rekomendasi tempat wisata sesuai dengan
      minat dan kebutuhan Anda.
    </p>
    <p>
      👤 Pengguna umum – dapat mencari destinasi wisata, mendapatkan rekomendasi, serta memberi penilaian berdasarkan
      pengalaman kunjungan.
    </p>
    <p>
      🛠️ Administrator – memiliki akses penuh untuk mengelola data wisata, data pengguna, serta melihat laporan
      kunjungan dalam bentuk grafik.
    </p>
    <p>
      Dengan Wisataku, proses pencarian destinasi menjadi lebih mudah, terarah, dan menyenangkan.
      Tujuan utama aplikasi ini adalah memberikan pengalaman wisata yang lebih personal, sekaligus membantu pengelola
      mengatur informasi dengan rapi dan akurat.
    </p>
  </section>

  <!-- Fitur -->
  <section id="fitur">
    <h2>Fitur Utama</h2>
    <p>Berikut beberapa fitur utama yang tersedia dalam aplikasi Wisataku:</p>
    <ul>
      <li>🔍 Pencarian Tempat Wisata</li>
      <li>🌟 Rekomendasi Tempat Wisata</li>
      <li>📝 Ulasan & Penilaian</li>
      <li>👤 Manajemen Pengguna dan Pengunjung</li>
      <li>🛠️ Manajemen Admin (khusus Administrator)</li>
      <li>📊 Grafik & Statistik Kunjungan</li>
    </ul>
  </section>

  <!-- Panduan -->
  <section id="panduan">
    <h2>Panduan Singkat</h2>
    <p>Ikuti langkah berikut untuk menggunakan aplikasi Wisataku:</p>
    <ul>
      <li>🔑 Login menggunakan akun email Anda sendiri.</li>
      <li>🌍 Jelajahi daftar tempat wisata yang tersedia di halaman utama.</li>
      <li>📝 Admin dapat menambahkan, mengedit, atau menghapus data wisata melalui menu dashboard.</li>
      <li>👥 Kelola data pengguna (khusus admin) agar akses aplikasi lebih teratur.</li>
      <li>📊 Lihat grafik kunjungan wisata untuk memantau perkembangan tempat wisata favorit mu.</li>
    </ul>
  </section>

  <!-- Kontak -->
  <section id="kontak">
    <h2>Kontak</h2>
    <p>Jika ada pertanyaan atau kendala, silakan hubungi:</p>
    <ul>
      <li>📞 Telepon: (+62) 812345678</li>
      <li>📧 Email: wisataku@example.com</li>
      <li>📍 Alamat: Jl. Raya Kenangan No.87, Kota Wisata</li>
    </ul>
  </section>

  <!-- Footer -->
  <footer>
    <p>© 2025 Wisataku. Semua hak dilindungi.</p>
    <p>Jl. Raya Kenangan No.87, Kota Wisata | Telp: (+62) 812345678</p>
  </footer>

  <!-- Script animasi scroll -->
  <script>
    const sections = document.querySelectorAll("section");
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("show");
        }
      });
    }, { threshold: 0.2 });
    sections.forEach(sec => observer.observe(sec));
  </script>
</body>

</html>
