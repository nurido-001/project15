@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow-lg border-0">
                
                {{-- Header --}}
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">{{ $wisata->nama }}</h4>
                </div>

                {{-- Body --}}
                <div class="card-body">
                    <div class="text-center mb-4">
                        @if($wisata->foto)
                            <img src="{{ asset('storage/' . $wisata->foto) }}" 
                                 alt="{{ $wisata->nama }}" 
                                 class="img-fluid rounded shadow-sm" 
                                 style="max-height: 400px; object-fit: cover;">
                        @else
                            <img src="{{ asset('default/opo1.jpg') }}" 
                                 alt="Default Image" 
                                 class="img-fluid rounded shadow-sm" 
                                 style="max-height: 400px; object-fit: cover;">
                        @endif
                    </div>

                    <h5><strong>Lokasi:</strong></h5>
                    <p class="text-muted">{{ $wisata->lokasi }}</p>

                    <h5><strong>Harga Tiket:</strong></h5>
                    <p class="text-muted">
                        @if(!is_null($wisata->harga_tiket))
                            Rp {{ number_format($wisata->harga_tiket, 0, ',', '.') }}
                        @else
                            -
                        @endif
                    </p>

                    <h5><strong>Deskripsi:</strong></h5>
                    <p class="text-muted">{{ $wisata->deskripsi }}</p>
                </div>

                {{-- Footer --}}
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('wisata.index') }}" class="btn btn-outline-secondary">
                        <i class="ti ti-arrow-left"></i> Kembali
                    </a>
                    <div>
                        <a href="{{ route('wisata.edit', $wisata->id) }}" class="btn btn-outline-warning">
                            <i class="ti ti-edit"></i> Edit
                        </a>
                        <form action="{{ route('wisata.destroy', $wisata->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="ti ti-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
