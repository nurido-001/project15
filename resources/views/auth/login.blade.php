@extends('layouts.auth')

@section('content')
<style>
  body {
    background: url('{{ asset('img/mm.jpg') }}') no-repeat center center fixed;
    background-size: cover;
    font-family: "Poppins", sans-serif;
  }

  body::before {
    content: "";
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.7);
    z-index: -1;
  }
.authentication-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  color: #fff;
  padding: 0 1rem;
  position: relative;
}

/* Tambahan: pastikan isi di tengah viewport */
.authentication-inner {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
}


  .card {
    background: rgba(0, 0, 0, 0.75);
    border: 1px solid rgba(0, 255, 255, 0.2);
    box-shadow: 0 0 25px rgba(0, 255, 255, 0.15);
    border-radius: 18px;
    width: 440px; /* 💡 lebih besar dari sebelumnya */
    transition: all 0.3s ease;
  }

  .card:hover {
    box-shadow: 0 0 40px rgba(0, 255, 255, 0.35);
    transform: translateY(-6px);
  }

  .card-body {
    padding: 2.5rem;
    text-align: center;
  }

  h4 {
    font-weight: 700;
    font-size: 1.8rem;
    background: linear-gradient(90deg, #00e1ff, #00ff73);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  p {
    color: #bdefff;
  }

  .form-control {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(0, 255, 255, 0.25);
    color: #fff;
    height: 45px;
  }

  .form-control:focus {
    border-color: #00e1ff;
    box-shadow: 0 0 12px rgba(0, 225, 255, 0.4);
    background: rgba(255, 255, 255, 0.08);
  }

  label {
    float: left;
    color: #bdefff;
    font-weight: 500;
  }

  .btn-primary {
    background: linear-gradient(90deg, #00e1ff, #00ff73);
    border: none;
    color: #000;
    font-weight: 600;
    font-size: 1.1rem;
    height: 48px;
    border-radius: 10px;
    box-shadow: 0 0 14px rgba(0, 225, 255, 0.3);
    transition: 0.3s;
  }

  .btn-primary:hover {
    background: linear-gradient(90deg, #00ff9f, #00d0ff);
    box-shadow: 0 0 25px rgba(0, 225, 255, 0.6);
  }

  a {
    color: #00e1ff;
    text-decoration: none;
  }

  a:hover {
    color: #00ff73;
    text-shadow: 0 0 6px #00ff73;
  }

  .alert {
    background: rgba(255, 0, 0, 0.15);
    color: #ff9b9b;
    border: 1px solid rgba(255, 0, 0, 0.3);
    border-radius: 8px;
    padding: 10px;
    margin-bottom: 15px;
  }

  .alert-success {
    background: rgba(0, 255, 120, 0.15);
    color: #b4ffcd;
    border-color: rgba(0, 255, 150, 0.3);
  }
</style>

<div class="authentication-wrapper">
  <div class="authentication-inner">
    <div class="card">
      <div class="card-body">
        <h4 class="mb-3">Selamat Datang 👋</h4>
        <p class="mb-4">Silakan login untuk melanjutkan ke dashboard Anda</p>

        {{-- Pesan sukses atau error --}}
        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
          <div class="alert">
            {{ $errors->first() }}
          </div>
        @endif

        {{-- Form login --}}
        <form method="POST" action="{{ route('login.post') }}">
          @csrf
          <div class="mb-3 text-start">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" class="form-control" required autofocus value="{{ old('email') }}">
            @error('email')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

          <div class="mb-3 text-start">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" class="form-control" required>
            @error('password')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary w-100 mt-2">Login</button>
        </form>

        <p class="text-center mt-4">
          Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
        </p>
      </div>
    </div>
  </div>
</div>
@endsection
