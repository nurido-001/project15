@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Kelola Admin</h4>

    <div class="card">
        <div class="card-body">
            <p>Halaman ini digunakan untuk mengelola data admin yang memiliki akses ke aplikasi.</p>

            {{-- Contoh tombol tambah admin --}}
            <a href="{{ route('admin.create') }}" class="btn btn-primary mb-3">
                <i class="ti ti-plus"></i> Tambah Admin
            </a>

            {{-- Tabel daftar admin (sementara statis, nanti bisa diganti dengan data dari controller) --}}
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Admin Utama</td>
                            <td>admin@example.com</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                        {{-- Looping data admin dari database bisa ditambahkan di sini --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
