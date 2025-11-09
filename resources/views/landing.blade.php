<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wisataku</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    * {
      margin: 0; padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
      scroll-behavior: smooth;
    }

    body {
      background: url('{{ asset('img/mm.jpg') }}') no-repeat center center fixed;
      background-size: cover;
      color: #fff;
      overflow-x: hidden;
    }

    body::before {
      content: "";
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.6);
      z-index: -1;
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
      background: rgba(0, 0, 0, 0.6);
      backdrop-filter: blur(6px);
      z-index: 1000;
      box-shadow: 0 2px 10px rgba(0, 255, 200, 0.15);
      transition: all 0.3s ease;
    }

    .navbar:hover {
      box-shadow: 0 0 20px rgba(0, 255, 200, 0.3);
    }

    .navbar .logo {
      font-size: 1.6rem;
      font-weight: 700;
      color: #00e1ff;
      text-shadow: 0 0 8px rgba(0, 255, 255, 0.6);
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
      text-shadow: 0 0 6px #00e1ff;
    }

    /* Tombol login */
    .btn-login {
      padding: 8px 16px;
      border: 2px solid #00c3ff;
      border-radius: 8px;
      color: #00c3ff;
      font-weight: 600;
      text-decoration: none;
      transition: 0.3s;
      background: rgba(255, 255, 255, 0.05);
    }

    .btn-login:hover {
      background: #00e1ff;
      color: #000;
      box-shadow: 0 0 15px rgba(0, 225, 255, 0.5);
    }

    /* Section */
    section {
      padding: 120px 10%;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      background: rgba(0, 0, 0, 0.55);
      border-radius: 18px;
      margin: 80px auto;
      max-width: 1100px;
      opacity: 0;
      transform: translateY(60px);
      transition: all 0.8s ease-out;
      box-shadow: 0 0 20px rgba(0, 255, 255, 0.05);
    }

    section.show {
      opacity: 1;
      transform: translateY(0);
      box-shadow: 0 0 30px rgba(0, 255, 255, 0.15);
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

    section p, section ul {
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
      border-left: 4px solid #00baff;
      background: rgba(255, 255, 255, 0.08);
      border-radius: 8px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      cursor: pointer;
      list-style: none;
    }

    section ul li:hover {
      transform: translateX(8px) scale(1.03);
      box-shadow: 0 6px 15px rgba(0, 225, 255, 0.4);
      border-left-color: #9dff00;
    }

    /* Hero Section */
    .hero {
      text-align: center;
      margin-top: 100px;
    }

    .hero h2 {
      font-size: 1.5rem;
      font-weight: 400;
      margin-bottom: 10px;
    }

    .hero h1 {
      font-size: 3.8rem;
      font-weight: 700;
      background: linear-gradient(to right, #00e1ff, #00ff73, #ffd700);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      animation: glow 3s ease-in-out infinite alternate;
      margin-bottom: 15px;
    }

    @keyframes glow {
      from { text-shadow: 0 0 10px #00ff1e, 0 0 20px #00ff11; }
      to { text-shadow: 0 0 20px #06a8ed, 0 0 30px #0aa3e4; }
    }

    footer {
      background: rgba(0, 0, 0, 0.9);
      color: #ddd;
      text-align: center;
      padding: 25px 10px;
      font-size: 0.9rem;
      border-top: 1px solid #00e1ff;
    }

    /* Efek Ketikan */
    .typing {
      display: inline-block;
      border-right: 3px solid #00e1ff;
      animation: blink 0.8s infinite;
      white-space: nowrap;
      overflow: hidden;
    }

    @keyframes blink {
      50% { border-color: transparent; }
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
    <a href="{{ route('login') }}" class="btn-login">Login</a>
  </nav>

  <!-- Hero Section -->
  <section class="hero" id="home">
    <h2>Selamat Datang di</h2>
    <h1><span class="typing"></span></h1>
    <p>
       Temukan keindahan dan pengalaman baru di setiap perjalanan.  
      Dengan <strong>Wisataku</strong>, kamu bisa menjelajahi berbagai destinasi wisata terbaik di berbagai belahan dunia,  
      membaca ulasan pengunjung, serta merencanakan perjalananmu dengan mudah dan cepat .
    </p>
  </section>

  <section id="tentang">
    <h2>Tentang Wisataku</h2>
    <p>
      <strong>Wisataku</strong> adalah aplikasi berbasis web yang dirancang untuk memudahkan pengguna dalam mencari, menilai, dan 
      mengelola informasi tentang tempat wisata di seluruh dunia.  
      Aplikasi ini menyediakan tampilan sederhana namun interaktif, sehingga cocok untuk pengguna biasa maupun pemula.
    </p>
  </section>

  <section id="fitur">
    <h2>Fitur Utama</h2>
    <ul>
      <li>🔍 Pencarian & rekomendasi berbagai tempat wisata</li>
      <li>⭐ Ulasan & rating dari pengguna lain</li>
      <li>📊 Statistik kunjungan dan grafik data wisata</li>
      <li>👤 Pengelolaan data pengguna dan destinasi wisata</li>
      <li>🛠️ Fitur admin untuk memantau seluruh aktivitas aplikasi</li>
    </ul>
  </section>

  <section id="panduan">
    <h2>Panduan Penggunaan</h2>
    <ul>
      <li> Tekan tombol <strong>login</strong> pada bagian kanan atas lalu masukan email dan password </li>
      <li>Setelah berhasil, anda bisa menekan menu <strong>Dashboard</strong> untuk melihat jumlah Admin, Pengguna hingga total wisata yang ada </li>
      <li>tak hanya itu, ada juga menu untuk melihat rekomendasi & menjelajahi wisata yang berbeda serta menu grafik untuk melihat jumlah pengunjung selama 30 hari terakhir</li>
    </ul>
  </section>

  <section id="kontak">
    <h2>Kontak</h2>
    <ul>
      <li>📞 (+62) 812-3456-7890</li>
      <li>📧 info@wisataku.id</li>
      <li>📍 Jl. Raya Kenangan No.87, Kota Wisata, Indonesia</li>
    </ul>
  </section>

  <footer>
    <p>© 2025 Wisataku. Semua hak dilindungi.</p>
  </footer>

  <script>
    // Efek muncul saat scroll
    const sections = document.querySelectorAll("section");
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) entry.target.classList.add("show");
      });
    }, { threshold: 0.2 });
    sections.forEach(sec => observer.observe(sec));

    // Efek mengetik
    const text = "Aplikasi Wisataku";
    const typingSpan = document.querySelector(".typing");
    let index = 0;
    function typeEffect() {
      if (index < text.length) {
        typingSpan.textContent += text.charAt(index);
        index++;
        setTimeout(typeEffect, 120);
      }
    }
    window.onload = typeEffect;
  </script>

</body>
</html>
