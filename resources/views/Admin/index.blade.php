@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    {{-- Judul Halaman --}}
    <h4 class="fw-bold py-3 mb-4">✨ Rekomendasi Tempat Wisata</h4>

    {{-- Carousel Foto Utama (ambil 3 wisata teratas) --}}
    @if(isset($wisatas) && $wisatas->count() > 0)
    <div id="carouselWisata" class="carousel slide mb-5 shadow-sm" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($wisatas->take(3) as $index => $wisata)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <img src="{{ asset('storage/' . $wisata->foto) }}" class="d-block w-100 rounded-3" style="max-height: 400px; object-fit: cover;" alt="{{ $wisata->nama }}">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded-2 p-2">
                    <h5>{{ $wisata->nama }}</h5>
                    <p>{{ \Illuminate\Support\Str::limit($wisata->deskripsi, 100) }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselWisata" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselWisata" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    @endif

    {{-- Grid Card Wisata --}}
    <div class="row">
        @forelse($wisatas as $wisata)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('storage/' . $wisata->foto) }}" class="card-img-top" style="height:200px; object-fit:cover;" alt="{{ $wisata->nama }}">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $wisata->nama }}</h5>
                    <p class="text-muted mb-1"><i class="ti ti-map-pin"></i> {{ $wisata->lokasi }}</p>
                    <p class="card-text flex-grow-1">{{ \Illuminate\Support\Str::limit($wisata->deskripsi, 120) }}</p>

                    {{-- Rating (opsional, pastikan ada kolom rating di tabel wisata) --}}
                    @if(!empty($wisata->rating))
                        <p class="mb-2">⭐ {{ number_format($wisata->rating, 1) }} / 5.0</p>
                    @endif

                    {{-- Tombol Aksi --}}
                    <div>
                        <a href="{{ route('wisata.show', $wisata->id) }}" class="btn btn-primary btn-sm">
                            <i class="ti ti-eye"></i> Lihat Detail
                        </a>
                        <a href="{{ route('wisata.rekomendasi', $wisata->id) }}" class="btn btn-outline-success btn-sm">
                            <i class="ti ti-star"></i> Rekomendasikan
                        </a>
                        <a href="{{ route('wisata.favorit', $wisata->id) }}" class="btn btn-outline-danger btn-sm">
                            <i class="ti ti-heart"></i> Favorit
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                Belum ada data wisata tersedia.
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
