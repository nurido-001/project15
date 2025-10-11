@extends('layouts.app')

@section('content')
<style>
    /* 🌿 Tema cerah lembut khas wisata */
    body {
        background: linear-gradient(135deg, #f6ffed, #e8f7ff, #fffaf0);
        min-height: 100vh;
    }

    h4.fw-bold {
        color: #2e7d32;
    }

    /* 🎨 Kartu utama */
    .card {
        border: none;
        border-radius: 16px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        background: #ffffffcc;
        backdrop-filter: blur(5px);
    }

    /* 🧍 Tombol tambah pengguna */
    .btn-primary {
        background: linear-gradient(90deg, #43cea2, #185a9d);
        border: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        transform: scale(1.05);
        background: linear-gradient(90deg, #2ebf91, #8360c3);
    }

    /* 📋 Tabel */
    table {
        border-radius: 10px;
        overflow: hidden;
    }

    thead {
        background: linear-gradient(90deg, #00c6ff, #0072ff);
        color: white;
        font-weight: 600;
    }

    tbody tr:hover {
        background-color: rgba(0, 255, 170, 0.1);
        transition: 0.2s ease-in-out;
    }

    /* ✨ Tombol edit dan hapus */
    .btn-warning {
        background: linear-gradient(90deg, #f9d423, #ff4e50);
        border: none;
        color: white;
        transition: all 0.3s ease;
    }
    .btn-warning:hover {
        transform: scale(1.05);
        opacity: 0.9;
    }

    .btn-danger {
        background: linear-gradient(90deg, #ff512f, #dd2476);
        border: none;
        color: white;
        transition: all 0.3s ease;
    }
    .btn-danger:hover {
        transform: scale(1.1);
        box-shadow: 0 0 10px rgba(255, 99, 132, 0.5);
    }

    .table > :not(caption) > * > * {
        vertical-align: middle;
    }
</style>

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
                <table class="table table-bordered align-middle text-center">
                    <thead>
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
                                        <i class="ti ti-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('pengguna.destroy', $pengguna->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus pengguna ini?')">
                                            <i class="ti ti-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">Belum ada data pengguna.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
