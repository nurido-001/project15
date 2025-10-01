@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">✏️ Edit Tempat Wisata</h4>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('wisata.update', $wisata->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Nama Wisata --}}
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Wisata</label>
                    <input type="text" name="nama" id="nama"
                           class="form-control @error('nama') is-invalid @enderror"
                           value="{{ old('nama', $wisata->nama) }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Lokasi --}}
                <div class="mb-3">
                    <label for="lokasi" class="form-label">Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi"
                           class="form-control @error('lokasi') is-invalid @enderror"
                           value="{{ old('lokasi', $wisata->lokasi) }}" required>
                    @error('lokasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Harga Tiket --}}
                <div class="mb-3">
                    <label for="harga_tiket" class="form-label">Harga Tiket</label>
                    <input type="number" name="harga_tiket" id="harga_tiket"
                           class="form-control @error('harga_tiket') is-invalid @enderror"
                           value="{{ old('harga_tiket', $wisata->harga_tiket) }}" required>
                    @error('harga_tiket')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4"
                              class="form-control @error('deskripsi') is-invalid @enderror"
                              required>{{ old('deskripsi', $wisata->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Foto Lama --}}
                @if($wisata->foto)
                    <div class="mb-3">
                        <label class="form-label d-block">Foto Lama</label>
                        <img src="{{ asset('storage/' . $wisata->foto) }}"
                             alt="{{ $wisata->nama }}"
                             class="img-thumbnail mb-2" style="max-height: 200px;">
                    </div>
                @endif

                {{-- Ganti Foto --}}
                <div class="mb-3">
                    <label for="foto" class="form-label">Ganti Foto (opsional)</label>
                    <input type="file" name="foto" id="foto"
                           class="form-control @error('foto') is-invalid @enderror">
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombol Aksi --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('wisata.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-warning text-white">💾 Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
