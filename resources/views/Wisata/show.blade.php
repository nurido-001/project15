@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">{{ $wisata->nama }}</h4>
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <img src="{{ asset('img/default/' . $wisata->foto) }}" 
                             alt="{{ $wisata->nama }}" 
                             class="img-fluid rounded shadow-sm" 
                             style="max-height: 400px;">
                    </div>
                    <h5><strong>Lokasi:</strong> {{ $wisata->lokasi }}</h5>
                    <p><strong>Harga Tiket:</strong> Rp {{ number_format($wisata->harga_tiket, 0, ',', '.') }}</p>
                    <p><strong>Deskripsi:</strong></p>
                    <p class="text-muted">{{ $wisata->deskripsi }}</p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('wisata.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                    <div>
                        <a href="{{ route('wisata.edit', $wisata->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('wisata.destroy', $wisata->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
