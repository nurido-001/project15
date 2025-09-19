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

    <div class="card">
        <div class="card-body">
            <a href="{{ route('wisata.create') }}" class="btn btn-primary mb-3">
                <i class="ti ti-plus"></i> Tambah Tempat Wisata
            </a>

            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Wisata</th>
                            <th>Lokasi</th>
                            <th>Deskripsi</th>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($wisata as $w)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $w->nama }}</td>
                                <td>{{ $w->lokasi }}</td>
                                <td>{{ $w->deskripsi }}</td>
                                <td>
                                    <a href="{{ route('wisata.show', $w->id) }}" class="btn btn-sm btn-info">Lihat</a>
                                    <a href="{{ route('wisata.edit', $w->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('wisata.destroy', $w->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data wisata.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
