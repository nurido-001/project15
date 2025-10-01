@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">➕ Tambah Tempat Wisata</h4>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('wisata.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Nama Wisata --}}
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Wisata</label>
                    <input type="text" name="nama" id="nama"
                           class="form-control @error('nama') is-invalid @enderror"
                           value="{{ old('nama') }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Lokasi --}}
                <div class="mb-3">
                    <label for="lokasi" class="form-label">Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi"
                           class="form-control @error('lokasi') is-invalid @enderror"
                           value="{{ old('lokasi') }}" required>
                    @error('lokasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Harga Tiket --}}
                <div class="mb-3">
                    <label for="harga_tiket" class="form-label">Harga Tiket</label>
                    <input type="number" name="harga_tiket" id="harga_tiket"
                           class="form-control @error('harga_tiket') is-invalid @enderror"
                           value="{{ old('harga_tiket') }}" required>
                    @error('harga_tiket')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4"
                              class="form-control @error('deskripsi') is-invalid @enderror"
                              required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Upload Foto --}}
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" name="foto" id="foto"
                           class="form-control @error('foto') is-invalid @enderror">
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombol Aksi --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('wisata.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">💾 Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
