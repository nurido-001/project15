@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow border-0">
                
                {{-- Header --}}
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Selamat Datang 👋</h4>
                    <span class="small">{{ auth()->user()->name ?? 'Pengguna' }}</span>
                </div>

                {{-- Body --}}
                <div class="card-body text-center py-5">
                    <h3 class="fw-bold mb-3">Selamat Datang di <span class="text-primary">Wisataku</span></h3>
                    <p class="text-muted mb-4">
                        Aplikasi pengelolaan data wisata, pengguna, dan penilaian wisata secara interaktif.
                    </p>

                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ route('dashboard') }}" class="btn btn-primary">
                            <i class="ti ti-dashboard"></i> Buka Dashboard
                        </a>
                        <a href="{{ route('wisata.index') }}" class="btn btn-outline-success">
                            <i class="ti ti-map"></i> Lihat Daftar Wisata
                        </a>
                    </div>

                    {{-- Pesan sukses login --}}
                    @if (session('status'))
                        <div class="alert alert-success mt-4 mb-0" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                {{-- Footer --}}
                <div class="card-footer text-center text-muted small">
                    <em>Wisataku © {{ date('Y') }} - Dibuat untuk belajar Laravel</em>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
