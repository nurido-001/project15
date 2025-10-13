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
                       style="background: linear-gradient(135deg, #22c55e, #16a34a); border: none;">
                       Jelajahi
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- KUTIPAN MOTIVASI --}}
    <div class="text-center mt-5 fade-in">
        <p class="fw-semibold fst-italic text-primary">{{ $quote }}</p>
    </div>
</div>

{{-- ANIMASI FADE-IN --}}
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
</style>
@endsection
