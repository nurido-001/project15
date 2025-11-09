@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y fade-in">

    {{-- Judul halaman --}}
    <div class="text-center mb-4 fade-in">
        <h3 class="fw-bold text-success">🌍 Rekomendasi Tempat Wisata Dunia</h3>
        <p class="text-muted">Temukan keajaiban dunia dan inspirasi perjalananmu bersama WisataKu</p>
    </div>

    {{-- PETA DUNIA --}}
    <div class="card border-0 shadow-lg rounded-4 mb-4 fade-in">
        <div class="card-body p-0">
            <div style="height: 420px; overflow: hidden; border-radius: 1rem;">
                <img src="{{ asset('img/world map.jpg') }}" 
                     alt="Peta Dunia Wisata" 
                     class="w-100 h-100" 
                     style="object-fit: cover; opacity: 0.9;">
            </div>
        </div>
    </div>

    {{-- REKOMENDASI WISATA --}}
    <div class="row g-4 fade-in">
        @php
            $rekomendasi = [
                [
                    'nama' => 'Taj Mahal',
                    'lokasi' => 'Agra, India',
                    'gambar' => 'img/aa.jpg'
                ],
                [
                    'nama' => 'Pagoda Chureito',
                    'lokasi' => 'Fujiyoshida, Prefektur Yamanashi, Jepang',
                    'gambar' => 'img/japan .jpg'
                ],
                [
                    'nama' => 'Candi Prambanan',
                    'lokasi' => 'Yogyakarta, Indonesia',
                    'gambar' => 'img/prambanan .jpg'
                ],
                [
                    'nama' => 'Menara Eiffel',
                    'lokasi' => 'Paris, Prancis',
                    'gambar' => 'img/jj.jpg'
                ],
                [
                    'nama' => 'Sydney Opera House',
                    'lokasi' => 'Sydney, Australia',
                    'gambar' => 'img/oo (1).jpg'
                ],
                [
                    'nama' => 'Patung Liberty',
                    'lokasi' => 'New York, AS',
                    'gambar' => 'img/yy.jpg'
                ],
            ];

            // Acak dan ambil 4 item saja
            shuffle($rekomendasi);
            $rekomendasi = array_slice($rekomendasi, 0, 4);

            $quotes = [
                ' "Setiap perjalanan adalah kisah baru yang menunggu untuk kamu tulis."',
                ' "Jelajahi dunia, temukan versi terbaik dari dirimu di setiap langkah."',
                ' "Hidup bukan untuk menetap, tapi untuk menjelajah dan belajar dari dunia."',
                ' "Pergilah sejauh mungkin, karena dunia lebih luas dari yang kau bayangkan."'
            ];
            $quote = $quotes[array_rand($quotes)];
        @endphp

        @foreach ($rekomendasi as $r)
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden wisata-card fade-in"
                 style="background: linear-gradient(135deg, #ffffff, #dcfce7, #bbf7d0);">
                <img src="{{ asset($r['gambar']) }}" 
                     alt="{{ $r['nama'] }}" 
                     class="w-100" 
                     style="height: 160px; object-fit: cover; opacity: 0.95;">
                <div class="card-body text-center">
                    <h5 class="fw-bold text-success">{{ $r['nama'] }}</h5>
                    <p class="text-muted small mb-2">{{ $r['lokasi'] }}</p>
                    <a href="#" class="btn btn-sm text-white px-3"
                       style="background: linear-gradient(135deg, #b5d806, #09dc17); border: none;">
                       Jelajahi
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- KUTIPAN MOTIVASI --}}
    <div class="text-center mt-5 fade-in">
        <p class="fw-semibold fst-italic gradient-text text-stroke">{{ $quote }}</p>
    </div>
</div>

{{-- ANIMASI & GRADIENT STYLE --}}
<style>
.fade-in {
  opacity: 0;
  animation: fadeInUp 1s ease-in forwards;
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(15px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.wisata-card {
  transition: all 0.4s ease;
}

.wisata-card:hover {
  transform: translateY(-6px) scale(1.03);
  box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}
.gradient-text {
  background: linear-gradient(90deg, #4ade80, #facc15, #60a5fa);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

/* 🖤 Tambahkan garis hitam di sekitar teks agar mudah dibaca */
.text-stroke {
  text-shadow:
    -1px -1px 2px #00ff08,
     1px -1px 2px #4b06e1,
    -1px  1px 2px #000000,
     1px  1px 2px #ffffff;
}
</style>
@endsection
