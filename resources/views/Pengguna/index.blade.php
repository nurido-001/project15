@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Kelola Pengguna</h4>

    <div class="card">
        <div class="card-body">
            <p>Halaman ini digunakan untuk mengelola data pengguna yang terdaftar dalam aplikasi.</p>

            {{-- Tombol tambah pengguna --}}
            <a href="{{ route('pengguna.create') }}" class="btn btn-primary mb-3">
                <i class="ti ti-user-plus"></i> Tambah Pengguna
            </a>

            {{-- Notifikasi sukses --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Tabel daftar pengguna --}}
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($penggunas as $pengguna)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pengguna->name }}</td>
                                <td>{{ $pengguna->email }}</td>
                                <td>
                                    <a href="{{ route('pengguna.edit', $pengguna->id) }}" class="btn btn-sm btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ route('pengguna.destroy', $pengguna->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus pengguna ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Belum ada data pengguna.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
