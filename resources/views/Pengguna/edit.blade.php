@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Edit Pengguna</h4>

    <div class="card">
        <div class="card-body">
            {{-- Tampilkan error validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pengguna.update', $pengguna->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Nama --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" 
                           name="name" 
                           id="name"
                           value="{{ old('name', $pengguna->name) }}"
                           class="form-control @error('name') is-invalid @enderror"
                           required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" 
                           name="email" 
                           id="email"
                           value="{{ old('email', $pengguna->email) }}"
                           class="form-control @error('email') is-invalid @enderror"
                           required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Password (opsional) --}}
                <div class="mb-3">
                    <label for="password" class="form-label">Password (opsional, isi jika ingin mengganti)</label>
                    <input type="password" 
                           name="password" 
                           id="password"
                           class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('pengguna.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
