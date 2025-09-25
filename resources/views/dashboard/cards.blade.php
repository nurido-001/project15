@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Dashboard Cards</h4>

    <div class="row">
        {{-- Card info login --}}
        <div class="col-md-4 mb-3">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Halo, {{ Auth::user()->name }}</h5>
                    <p class="text-muted">Selamat datang di aplikasi WisataKu.</p>
                </div>
            </div>
        </div>

        {{-- Card akses cepat ke wisata --}}
        <div class="col-md-4 mb-3">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Kelola Wisata</h5>
                    <p class="text-muted">Tambah atau edit tempat wisata.</p>
                    <a href="{{ route('wisata.index') }}" class="btn btn-sm btn-primary">Lihat Data</a>
                </div>
            </div>
        </div>

        {{-- Card akses cepat ke pengguna --}}
        <div class="col-md-4 mb-3">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Kelola Pengguna</h5>
                    <p class="text-muted">Atur daftar user aplikasi.</p>
                    <a href="{{ route('pengguna.index') }}" class="btn btn-sm btn-success">Lihat Data</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
