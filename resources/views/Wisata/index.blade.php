@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    {{-- Judul --}}
    <h3 class="fw-bold mb-4">Daftar Tempat Wisata</h3>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Tombol tambah data --}}
    <div class="mb-4">
        <a href="{{ route('wisata.create') }}" class="btn btn-primary">
            <i class="ti ti-plus"></i> Tambah Tempat Wisata
        </a>
    </div>

    {{-- Grid Card --}}
    <div class="row g-4">
        @forelse ($wisatas as $w)
            <div class="col-md-4 col-sm-6">
                <div class="card shadow-sm border-0 h-100">

                    {{-- Foto --}}
                    @if($w->foto)
                        <img src="{{ asset('storage/' . $w->foto) }}" 
                             class="card-img-top" 
                             alt="{{ $w->nama }}" 
                             style="height:200px; object-fit:cover;">
                    @else
                        {{-- Default sesuai nama wisata --}}
                        @php
                            $defaultImage = 'opo1.jpg'; // default umum
                            if (stripos($w->nama, 'hutan hijau') !== false) {
                                $defaultImage = 'opo1.jpg';
                            } elseif (stripos($w->nama, 'hutan dingin') !== false) {
                                $defaultImage = 'opo2.jpg';
                            } elseif (stripos($w->nama, 'danau biru') !== false) {
                                $defaultImage = 'opo3.jpg';
                            }
                        @endphp
                        <img src="{{ asset('default/' . $defaultImage) }}" 
                             class="card-img-top" 
                             alt="Default Image" 
                             style="height:200px; object-fit:cover;">
                    @endif

                    {{-- Isi card --}}
                    <div class="card-body">
                        <h5 class="card-title mb-2">{{ $w->nama }}</h5>
                        <p class="card-text text-muted small">
                            <strong>Lokasi:</strong> {{ $w->lokasi }} <br>
                            <strong>Deskripsi:</strong> {{ \Illuminate\Support\Str::limit($w->deskripsi, 60) }} <br>
                            @if(!is_null($w->harga_tiket))
                                <strong>Harga:</strong> Rp {{ number_format($w->harga_tiket, 0, ',', '.') }}
                            @endif
                        </p>
                    </div>

                    {{-- Aksi --}}
                    <div class="card-footer bg-white d-flex justify-content-between">
                        <a href="{{ route('wisata.show', $w->id) }}" class="btn btn-sm btn-outline-info">Lihat</a>
                        <a href="{{ route('wisata.edit', $w->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                        <form action="{{ route('wisata.destroy', $w->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada data wisata.</p>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $wisatas->links() }}
    </div>
</div>
@endsection
