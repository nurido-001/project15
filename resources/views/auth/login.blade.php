@extends('layouts.auth')

@section('content')
<div class="authentication-wrapper authentication-basic container-p-y">
  <div class="authentication-inner">
    <div class="card">
      <div class="card-body">
        <h4 class="mb-2">Selamat Datang 👋</h4>
        <p class="mb-4">Silakan login untuk melanjutkan</p>

        {{-- Form login --}}
        <form method="POST" action="{{ route('login.post') }}">
          @csrf
          <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required autofocus value="{{ old('email') }}">
            @error('email')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

          <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
            @error('password')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

        {{-- Link register (redirect ke login, karena register dimatikan di routes) --}}
        <p class="text-center mt-3">
          Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
        </p>
      </div>
    </div>
  </div>
</div>
@endsection
