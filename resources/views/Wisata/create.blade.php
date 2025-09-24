@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Tambah Tempat Wisata</h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('wisata.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Nama Wisata --}}
                <div class="mb-3">
                    <label class="form-label">Nama Wisata</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                    @error('nama') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                {{-- Lokasi --}}
                <div class="mb-3">
                    <label class="form-label">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi') }}" required>
                    @error('lokasi') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                {{-- Harga Tiket --}}
                <div class="mb-3">
                    <label class="form-label">Harga Tiket</label>
                    <input type="number" name="harga_tiket" class="form-control" value="{{ old('harga_tiket') }}" required>
                    @error('harga_tiket') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                {{-- Deskripsi --}}
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3" required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                {{-- Upload Foto --}}
                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <input type="file" name="foto" class="form-control">
                    @error('foto') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('wisata.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
