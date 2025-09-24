@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Edit Pengguna</h4>

    <form action="{{ route('pengguna.update', $pengguna->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name">Nama</label>
            <input type="text" name="name" value="{{ $pengguna->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ $pengguna->email }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('pengguna.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
