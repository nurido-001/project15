@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    {{-- Judul Halaman --}}
    <h3 class="fw-bold mb-4">Daftar Tempat Wisata</h3>

    {{-- Tombol Tambah --}}
    <a href="{{ route('wisata.create') }}" class="btn btn-primary mb-4">
        <i class="ti ti-plus"></i> Tambah Tempat Wisata
    </a>

    {{-- Grid Card --}}
    <div class="row">
        @if(isset($wisatas) && $wisatas->count() > 0)
            @foreach($wisatas as $wisata)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        {{-- Gambar --}}
                        @if(!empty($wisata->foto))
                            <img src="{{ asset('storage/' . $wisata->foto) }}" 
                                 class="card-img-top" 
                                 style="height:200px; object-fit:cover;" 
                                 alt="{{ $wisata->nama }}">
                        @else
                            <img src="https://via.placeholder.com/400x200?text=No+Image" 
                                 class="card-img-top" 
                                 style="height:200px; object-fit:cover;" 
                                 alt="No Image">
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $wisata->nama }}</h5>
                            <p class="text-muted mb-1"><strong>Lokasi:</strong> {{ $wisata->lokasi }}</p>
                            <p class="card-text flex-grow-1">
                                <strong>Deskripsi:</strong> {{ \Illuminate\Support\Str::limit($wisata->deskripsi, 100) }}
                            </p>

                            {{-- Tombol Aksi --}}
                            <div class="mt-auto d-flex justify-content-between">
                                <a href="{{ route('wisata.show', $wisata->id) }}" class="btn btn-info btn-sm">
                                    <i class="ti ti-eye"></i> Lihat
                                </a>
                                <a href="{{ route('wisata.edit', $wisata->id) }}" class="btn btn-warning btn-sm">
                                    <i class="ti ti-edit"></i> Edit
                                </a>
                                <form action="{{ route('wisata.destroy', $wisata->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="ti ti-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Belum ada data wisata tersedia.
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
