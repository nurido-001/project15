@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Tambah Pengguna</h4>

    <form action="{{ route('pengguna.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pengguna.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
