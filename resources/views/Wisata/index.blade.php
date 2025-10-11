@extends('layouts.app')

@section('content')
<style>
    /* === Background gradasi alami === */
    body {
        background: linear-gradient(135deg, #a8e063, #56ab2f, #00c6ff);
        min-height: 100vh;
    }

    /* === Judul === */
    h3.fw-bold {
        color: #1d5c2e;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
    }

    /* === Tombol tambah === */
    .btn-tambah {
        background: linear-gradient(90deg, #56ab2f, #a8e063);
        border: none;
        color: white;
        font-weight: bold;
        transition: 0.3s;
    }
    .btn-tambah:hover {
        background: linear-gradient(90deg, #4CAF50, #2e7d32);
        transform: scale(1.05);
    }

    /* === Card wisata === */
    .card {
        border-radius: 16px;
        transition: all 0.3s ease;
    }
    .card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 20px rgba(0,0,0,0.15);
    }

    /* === Tombol aksi === */
    .btn-outline-info {
        border-color: #00bcd4;
        color: #00bcd4;
    }
    .btn-outline-info:hover {
        background: #00bcd4;
        color: white;
    }

    .btn-outline-warning {
        border-color: #ff9800;
        color: #ff9800;
    }
    .btn-outline-warning:hover {
        background: #ff9800;
        color: white;
    }

    .btn-outline-danger {
        border-color: #e91e63;
        color: #e91e63;
    }
    .btn-outline-danger:hover {
        background: #e91e63;
        color: white;
    }

    /* === Search box === */
    .search-box {
        max-width: 420px;
        margin-bottom: 1.5rem;
    }
</style>

<div class="container-xxl flex-grow-1 container-p-y">

    {{-- Judul --}}
    <h3 class="fw-bold mb-4">Daftar Tempat Wisata</h3>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- 🔍 Pencarian --}}
    <form action="{{ route('wisata.index') }}" method="GET" class="d-flex search-box">
        <input type="text" name="search" value="{{ request('search') }}" 
               class="form-control me-2" placeholder="Cari wisata (nama, lokasi, deskripsi)...">
        <button class="btn btn-success" type="submit">Cari</button>
    </form>

    {{-- Info hasil pencarian --}}
    @if(isset($notFound))
        <div class="alert alert-warning text-center">{{ $notFound }}</div>
    @elseif(request('search'))
        <div class="alert alert-info text-center">
            Menampilkan hasil pencarian untuk: <strong>{{ request('search') }}</strong>
        </div>
    @endif

    {{-- Tombol tambah data --}}
    <div class="mb-4">
        <a href="{{ route('wisata.create') }}" class="btn btn-tambah">
            <i class="bi bi-plus-circle"></i> Tambah Tempat Wisata
        </a>
    </div>

    {{-- Grid Card --}}
    <div class="row g-4">
        @forelse ($wisatas as $w)
            <div class="col-md-4 col-sm-6">
                <div class="card shadow-sm border-0 h-100">
                    {{-- Foto --}}
                    <img src="{{ $w->foto ? asset('storage/' . $w->foto) : asset('default/opo1.jpg') }}"
                         class="card-img-top"
                         alt="{{ $w->nama }}"
                         style="height:200px; object-fit:cover; border-top-left-radius:16px; border-top-right-radius:16px;">

                    {{-- Isi card --}}
                    <div class="card-body">
                        <h5 class="card-title mb-2">{{ $w->nama }}</h5>
                        <p class="card-text text-muted small mb-1">
                            <strong>Lokasi:</strong> {{ $w->lokasi }}
                        </p>
                        <p class="card-text text-muted small mb-1">
                            <strong>Deskripsi:</strong> {{ \Illuminate\Support\Str::limit($w->deskripsi, 60) }}
                        </p>
                        @if(!is_null($w->harga_tiket))
                            <p class="card-text text-muted small">
                                <strong>Harga:</strong> Rp {{ number_format($w->harga_tiket, 0, ',', '.') }}
                            </p>
                        @endif
                    </div>

                    {{-- Aksi --}}
                    <div class="card-footer bg-white d-flex justify-content-between">
                        <a href="{{ route('wisata.show', $w->id) }}" class="btn btn-sm btn-outline-info">Detail</a>
                        <a href="{{ route('wisata.edit', $w->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                        <form action="{{ route('wisata.destroy', $w->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            @if(!isset($notFound))
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada data wisata.</p>
                </div>
            @endif
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $wisatas->appends(['search' => request('search')])->links() }}
    </div>
</div>
@endsection
