@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow-lg">
                <div class="card-header bg-warning text-white">
                    <h4 class="mb-0">Edit Tempat Wisata</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('wisata.update', $wisata->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Nama Wisata --}}
                        <div class="mb-3">
                            <label class="form-label">Nama Wisata</label>
                            <input type="text" name="nama" class="form-control"
                                   value="{{ old('nama', $wisata->nama) }}" required>
                            @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Lokasi --}}
                        <div class="mb-3">
                            <label class="form-label">Lokasi</label>
                            <input type="text" name="lokasi" class="form-control"
                                   value="{{ old('lokasi', $wisata->lokasi) }}" required>
                            @error('lokasi') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Harga Tiket --}}
                        <div class="mb-3">
                            <label class="form-label">Harga Tiket</label>
                            <input type="number" name="harga_tiket" class="form-control"
                                   value="{{ old('harga_tiket', $wisata->harga_tiket) }}" required>
                            @error('harga_tiket') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Deskripsi --}}
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" rows="4" class="form-control" required>{{ old('deskripsi', $wisata->deskripsi) }}</textarea>
                            @error('deskripsi') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Preview Foto Lama --}}
                        @if($wisata->foto)
                            <div class="mb-3">
                                <label class="form-label d-block">Foto Saat Ini:</label>
                                <img src="{{ asset('storage/' . $wisata->foto) }}"
                                     alt="{{ $wisata->nama }}"
                                     width="200" class="mb-2 rounded shadow-sm">
                            </div>
                        @endif

                        {{-- Upload Foto Baru --}}
                        <div class="mb-3">
                            <label class="form-label">Ganti Foto (opsional)</label>
                            <input type="file" name="foto" class="form-control">
                            @error('foto') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Tombol --}}
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('wisata.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-warning text-white">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
