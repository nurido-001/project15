@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Daftar Tempat Wisata</h4>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Tombol tambah data --}}
    <div class="mb-3">
        <a href="{{ route('wisata.create') }}" class="btn btn-primary">
            <i class="ti ti-plus"></i> Tambah Tempat Wisata
        </a>
    </div>

    {{-- Card list wisata --}}
    <div class="row">
        @forelse ($wisata as $w)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($w->foto)
                        <img src="{{ asset('storage/' . $w->foto) }}" 
                             class="card-img-top" 
                             alt="{{ $w->nama }}" 
                             style="height:200px; object-fit:cover;">
                    @else
                        <img src="{{ asset('default/opo.jpg') }}" 
                             class="card-img-top" 
                             alt="Default Image" 
                             style="height:200px; object-fit:cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $w->nama }}</h5>
                        <p class="card-text">
                            <strong>Lokasi:</strong> {{ $w->lokasi }} <br>
                            <strong>Deskripsi:</strong> {{ \Illuminate\Support\Str::limit($w->deskripsi, 100) }} <br>
                            @if(isset($w->harga_tiket))
                                <strong>Harga:</strong> Rp {{ number_format($w->harga_tiket, 0, ',', '.') }}
                            @endif
                        </p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('wisata.show', $w->id) }}" class="btn btn-sm btn-info">Lihat</a>
                            <a href="{{ route('wisata.edit', $w->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('wisata.destroy', $w->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p>Belum ada data wisata.</p>
            </div>
        @endforelse
    </div>

    {{-- Tabel data wisata --}}
    <hr>
    <h5 class="fw-bold mt-4">Tabel Data Wisata</h5>
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama Wisata</th>
                    <th>Lokasi</th>
                    <th>Deskripsi</th>
                    <th>Harga Tiket</th>
                    <th>Foto</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($wisata as $w)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $w->nama }}</td>
                        <td>{{ $w->lokasi }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($w->deskripsi, 50) }}</td>
                        <td>
                            @if(isset($w->harga_tiket))
                                Rp {{ number_format($w->harga_tiket, 0, ',', '.') }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($w->foto)
                                <img src="{{ asset('storage/' . $w->foto) }}" alt="{{ $w->nama }}" width="60">
                            @else
                                <img src="{{ asset('default/opo.jpg') }}" alt="Default Image" width="60">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('wisata.show', $w->id) }}" class="btn btn-sm btn-info">Lihat</a>
                            <a href="{{ route('wisata.edit', $w->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('wisata.destroy', $w->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada data wisata.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
