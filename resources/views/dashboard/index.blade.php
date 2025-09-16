<!-- resources/views/dashboard/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    <p>Halo, {{ Auth::user()->name }}! Selamat datang di aplikasi Wisataku.</p>
</div>
@endsection
